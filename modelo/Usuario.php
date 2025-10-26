<?php
require "../config/conexion.php";

Class Usuario {
    public function __construct(){}
    public function nuevo_usuario($nombre,$apellido_p,$apellido_m,$correo,$contrasenia){
        $sql = "INSERT INTO Usuario (Nombre,Apellido_paterno,Apellido_materno,Email,Contrasenia) VALUES
        ('{$nombre}','{$apellido_p}','{$apellido_m}','{$correo}','{$contrasenia}');";
        $id = ejecutarConsultaRetornaId($sql);
        if($id != 0){
            #asignamos su rol como usuario.
            $sql = "INSERT INTO Usuario_rol (IdUsuario,IdRol) VALUES({$id},2)";
            return ejecutarConsulta($sql);
        }
        return 0; #error de registro
    }
    public function verificar_usuario($correo, $contrasenia){
        $sql = "SELECT Nombre FROM usuario WHERE Email = '{$correo}' AND Contrasenia ='{$contrasenia}';";
        return ejecutarConsulta($sql);
    }
    public function consultarUsuario($correo, $contrasenia){
        $sql = "SELECT us.IdUsuario, us.Nombre, us.Apellido_paterno, ro.IdRol AS 'rol' FROM usuario us 
        INNER JOIN usuario_rol usr ON us.IdUsuario = usr.IdUsuario 
        INNER JOIN rol ro ON usr.IdRol = ro.IdRol 
        WHERE us.Email = '{$correo}' AND us.Contrasenia ='{$contrasenia}';";
        return ejecutarConsultaSimpleFila($sql);
    }
}
?>