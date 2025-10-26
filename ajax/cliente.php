<?php
require_once "../modelo/Cliente.php";
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
    default:
        # code...
        break;
}

?>