<?php
require_once "../modelo/Usuario.php";
$usuario = new Usuario ();

#Verificamos y limpiamos. De lo contrario ponemos una cadena vacia
$idUsuario = isset($_POST['idUsuario'])?limpiarCadenas($_POST['idUsuario']):"";
$nombre = isset($_POST['nombre'])?limpiarCadenas($_POST['nombre']):"";
$apellido_p = isset($_POST['apellidop'])?limpiarCadenas($_POST['apellidop']):"";
$apellido_m = isset($_POST['apellidom'])?limpiarCadenas($_POST['apellidom']):"";
$correo = isset($_POST['correo'])?limpiarCadenas($_POST['correo']):"";
$contrasenia = isset($_POST['contrasenia'])?limpiarCadenas($_POST['contrasenia']):"";
#valores de sesion
$correoSession = isset($_POST['emailSesion'])?limpiarCadenas($_POST['emailSesion']):"";
$contraseniaSession = isset($_POST['passwordSesion'])?limpiarCadenas($_POST['passwordSesion']):"";

switch ($_GET['op']) {
    case 'guardar':
        if(empty($idUsuario)){
            #nuevo usuario
            $rps = $usuario ->nuevo_usuario($nombre,$apellido_p,$apellido_m,$correo,$contrasenia);
            $mensaje = ($rps != 0)?"Se creo su cuenta en Tlacuache ART :)": "Error, al ingresar un nuevo usuario";
            echo $mensaje;
        }else{
            #editar datos usuario
            echo "Error, al ingresar un nuevo usuario: datos vacios";
        }
        break;
    case 'sesion':
        if(!empty($correoSession) && !empty($contraseniaSession)){
            $rpse = $usuario->verificar_usuario($correoSession,$contraseniaSession);
            if($rpse->num_rows > 0){
                #abrimos la sesión del usuario
                $data = $usuario->consultarUsuario($correoSession,$contraseniaSession);
                session_start();
                $_SESSION['usuario'] =[
                    'Id_usuario' => $data['IdUsuario'],
                    'Nombre' => $data['Nombre'],
                    'Apellido_pa' => $data['Apellido_paterno'],
                    'Id_rol' => $data['rol']
                ];
                echo "Inicio de sesión";
            }else{
                #mandamos un mensaje de error por datos no encontrados
                echo "ERROR, al iniciar sesión: el usuario no existe";
            }
        }else{
            #datos vacios
            echo "ERROR, al iniciar sesión: datos vacios";
        }
    break;
    default:
        # code...
        break;
}

?>