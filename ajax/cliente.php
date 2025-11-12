<?php
require_once "../modelo/Cliente.php";
require_once "../modelo/PaypalP.php";
require_once "../modelo/Venta.php";
$cliente = new Cliente ();

#Verificamos si se envia idDepartemento y lo limpiamos. De lo contrario ponemos una cadena vacia
$nombre = isset($_POST['nombre'])?limpiarCadenas($_POST['nombre']):"";
$apellidop = isset($_POST['apellidop'])?limpiarCadenas($_POST['apellidop']):"";
$apellidom = isset($_POST['apellidom'])?limpiarCadenas($_POST['apellidom']):"";
$direccion = isset($_POST['direccion'])?limpiarCadenas($_POST['direccion']):"";
$municipio = isset($_POST['municipio'])?limpiarCadenas($_POST['municipio']):"";
$estado = isset($_POST['estado'])?limpiarCadenas($_POST['estado']):"";
$cp = isset($_POST['cp'])?limpiarCadenas($_POST['cp']):"";
$telefono = isset($_POST['telefono'])?limpiarCadenas($_POST['telefono']):"";
$email = isset($_POST['email'])?limpiarCadenas($_POST['email']):"";
$contrasenia = isset($_POST['contrasenia'])?limpiarCadenas($_POST['contrasenia']):"";

switch ($_GET['op']) {
    case 'actualizar':
        if(!empty($nombre) && !empty($apellidop) && !empty($apellidom)&& !empty($direccion)&& !empty($municipio)&& !empty($estado)&& !empty($cp)&& !empty($telefono)&& !empty($email)&& !empty($contrasenia)){
            #nuevo usuario
            session_start();
            $id = $_SESSION['usuario']["Id_usuario"];
            $rps = $cliente ->actualizar_info($id,$nombre,$apellidop,$apellidom,$direccion,$municipio,$estado,$cp,$telefono,$email,$contrasenia);
            $mensaje = ($rps != 0)?"Datos actualizados": "ERROR, Datos no actualizados";
            echo $mensaje;
        }else{
            #editar datos usuario
            echo "Error, al ingresar actualizar usuario: datos vacios";
        }
        break;
    case 'sesion':
        session_start();
        session_unset();
        session_destroy();
        echo 'Sesión Cerrada';
    break;
    case 'listarCom':
        session_start();
        $id = $_SESSION['usuario']["Id_usuario"];
        $rps = $cliente->verificar_usurio($id);
        if($rps->num_rows != 0 ){
            $rpse = $cliente->visualizarCompras($id);
            $json = array();
            if($rpse->num_rows != 0){
                while($row = $rpse->fetch_object()){
                    $json[]=array(
                        "Codigo_compra"=> $row ->Codigo_compra ,
                        "Nombre"=> $row ->Nombre ,
                        "Cantidad_productos"=> $row ->Cantidad_productos ,
                        "Monto"=> $row ->Monto ,
                        "Metodo_pago"=> $row ->Metodo_pago,
                        "Fecha"=> $row ->Fecha
                    );
                }
                $jsonString = json_encode($json);
                echo $jsonString;
            }else{
                echo "Error no hay registros de compra";
            }
        }else{
            echo ("Algo anda mal con la sesión");
        }
    break;
    case 'listarInfo':
        session_start();
        $id = $_SESSION['usuario']["Id_usuario"];
        $rps = $cliente->verificar_usurio($id);
        if($rps->num_rows != 0 ){
            $rpse = $cliente->solicitarInformacion($id);
            $json = array();
            while($row = $rpse->fetch_object()){
                $json[]=array(
                    "Nombre"=> $row ->Nombre ,
                    "Apellido_paterno"=> $row ->Apellido_paterno ,
                    "Apellido_materno"=> $row ->Apellido_materno ,
                    "Direccion"=> $row->Direccion,
                    "Estado"=> $row->Estado,
                    "Municipio"=> $row->Municipio,
                    "Codigo_postal"=> $row->Codigo_postal,
                    "Telefono"=> $row ->Telefono ,
                    "Email"=> $row ->Email ,
                    "contrasenia"=> $row ->contrasenia 
                );
            }
            $jsonString = json_encode($json);
            echo $jsonString;
        }else{
            echo ("Algo anda mal con la sesión");
        }
    break;
    case 'listarInfoPersonal':
        session_start();
        $id = $_SESSION['usuario']["Id_usuario"];
        $rps = $cliente->verificar_usurio($id);
        if($rps->num_rows != 0 ){
            $rpse = $cliente->solicitarInformacionCompra($id);
            $json = array();
            while($row = $rpse->fetch_object()){
                $json[]=array(
                    "Nombre"=> $row ->Nombre ,
                    "Apellido_paterno"=> $row ->Apellido_paterno ,
                    "Apellido_materno"=> $row ->Apellido_materno ,
                    "Direccion"=> $row->Direccion,
                    "Estado"=> $row->Estado,
                    "Municipio"=> $row->Municipio,
                    "Codigo_postal"=> $row->Codigo_postal,
                    "Telefono"=> $row ->Telefono ,
                    "Email"=> $row ->Email ,
                );
            }
            $jsonString = json_encode($json);
            echo $jsonString;
        }else{
            echo ("Algo anda mal con la sesión");
        }
    break;
    case 'crearOrden':
        // $precio = json_decode($_POST['precio']);
        // $descripcion = json_decode($_POST['descripcion']));
        // $moneda =json_decode($_POST['moneda']);
        $input = json_decode(file_get_contents("php://input"), true);
        $precio = $input['precio'];
        $descripcion = $input['descripcion'];
        $moneda = $input['moneda'];
        if(!empty($precio) && !empty($descripcion) && !empty($moneda)){
            $payp = new PaypalP();
            $payp->__crearOrden($precio,$moneda,$descripcion);
            // $payp->__crearOrden(100.00,"MXN","HOLA, test.");
        }
    break;
    case 'capturaOrden':
        // $orderID = json_decode($_POST['orderID']);
        $data = json_decode(file_get_contents("php://input"), true);
        $orderID = $data['orderID'];
        if(!empty($orderID)){
            $payp = new PaypalP();
            $payp->__capturarOrden($orderID);
        }
    break;
    case 'registroVenta':
        session_start();
        $idUsuario = $_SESSION['usuario']["Id_usuario"];
        $rps = $cliente->verificar_usurio($idUsuario);
        if($rps->num_rows != 0 ){
            $totalVenta = isset($_POST['totalVenta'])?limpiarCadenas($_POST['totalVenta']):"";
            $fechaV = isset($_POST['fechaV'])?limpiarCadenas($_POST['fechaV']):"";
            $productos = json_decode($_POST['productos'],true);
            $metodoPago = isset($_POST['metodoPago'])?limpiarCadenas($_POST['metodoPago']):"";
            $nombrev = isset($_POST['nombrev'])?limpiarCadenas($_POST['nombrev']):"";
            $apellidopv = isset($_POST['apellidopv'])?limpiarCadenas($_POST['apellidopv']):"";
            $apellidomv = isset($_POST['apellidomv'])?limpiarCadenas($_POST['apellidomv']):"";
            $direccionv = isset($_POST['direccionv'])?limpiarCadenas($_POST['direccionv']):"";
            $municipiov = isset($_POST['municipiov'])?limpiarCadenas($_POST['municipiov']):"";
            $estadov = isset($_POST['estadov'])?limpiarCadenas($_POST['estadov']):"";
            $cod_postv = isset($_POST['cod_postv'])?limpiarCadenas($_POST['cod_postv']):"";
            $emailv = isset($_POST['emailv'])?limpiarCadenas($_POST['emailv']):"";
            $notav = isset($_POST['notav'])?limpiarCadenas($_POST['notav']):"";
            $celularv = isset($_POST['celularv'])?limpiarCadenas($_POST['celularv']):"";

            if(!empty($totalVenta) && !empty($fechaV) && !empty($metodoPago)&& !empty($nombrev)&& !empty($apellidopv)&& 
            !empty($apellidomv)&& !empty($direccionv)&& !empty($municipiov)&& !empty($estadov)&& !empty($cod_postv)&& 
            !empty($emailv)&& !empty($celularv)){
                $cliente ->actualizar_info($idUsuario,$nombrev,$apellidopv,$apellidomv,$direccionv,$municipiov,$estadov,$cod_postv,$celularv,$emailv,"contrasenia");
                $venta = new Venta();
                $folioPago = $venta->insertarPago($metodoPago,'Completado',$totalVenta);
                if($folioPago != 0){
                    #Registro de productos comprados
                    foreach($productos as $pr){
                        $folioVenta = $venta->insertarVenta($pr['idProducto'],$idUsuario,$folioPago,$pr['cantidad'],$fechaV);
                        $venta->insertarEnvio($folioVenta,'2025-12-01',$notav);
                    }
                    echo "Tu compra y pedido han sido registrados. Verifica tu historial de compras";
                }else{
                    echo "Error, en el registro de venta: pago no registrado";
                }
            }else{
                echo "Error, en el registro de venta: Datos enviados no son validos";
            }
            
        }else{
            echo ("Algo anda mal con la sesión");
        }
    break;
    default:
        # code...
        break;
}

?>