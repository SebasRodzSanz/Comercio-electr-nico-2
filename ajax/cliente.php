<?php
require_once "../modelo/Cliente.php";
$cliente = new Cliente ();

#Verificamos si se envia idDepartemento y lo limpiamos. De lo contrario ponemos una cadena vacia
$nombre = isset($_POST['nombre'])?limpiarCadenas($_POST['nombre']):"";
$apellido_p = isset($_POST['apellido_pa'])?limpiarCadenas($_POST['apellido_pa']):"";
$apellido_m = isset($_POST['apellido_ma'])?limpiarCadenas($_POST['apellido_ma']):"";
$correo = isset($_POST['correo'])?limpiarCadenas($_POST['correo']):"";
$direccion = isset($_POST['direccion'])?limpiarCadenas($_POST['direccion']):"";
$telefono = isset($_POST['telefono'])?limpiarCadenas($_POST['telefono']):"";
$contrasenia = isset($_POST['contrasenia'])?limpiarCadenas($_POST['contrasenia']):"";

switch ($_GET['op']) {
    case 'actualizar':
        if(!empty($nombre) && !empty($apellido_p) && !empty($apellido_m)&& !empty($correo)&& !empty($direccion)&& !empty($telefono)&& !empty($contrasenia)){
            #nuevo usuario
            session_start();
            $id = $_SESSION['usuario']["Id_usuario"];
            $rps = $cliente ->actualizar_info($id,$nombre,$apellido_p,$apellido_m,$correo,$direccion,$telefono,$contrasenia);
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