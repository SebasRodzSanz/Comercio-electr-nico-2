<?php
require_once "../config/conexion.php";
class Cliente{
    public function __construct(){}
    public function verificar_usurio($id_usuario){
        $sql = "SELECT Nombre FROM usuario 
        WHERE IdUsuario ={$id_usuario};";
        return ejecutarConsulta($sql);
    }
    public function solicitarInformacion($id_usuario){
        $sql = "SELECT Nombre,Apellido_paterno,Apellido_materno,Direccion,Estado,Municipio,Codigo_postal,
        Telefono,Email,contrasenia FROM usuario WHERE IdUsuario = {$id_usuario};";
        return ejecutarConsulta($sql);
    }
    public function consultarUsuario($correo, $contrasenia){
        $sql = "SELECT us.Id_usuario, us.Nombre, us.Apellido_paterno, usr.Id_rol FROM usuario us 
        INNER JOIN usuario_rol usr ON us.Id_usuario = usr.Id_usuario INNER JOIN roles ro ON usr.Id_rol = ro.Id_rol
        WHERE us.Correo = '{$correo}' AND us.Contrasenia ='{$contrasenia}';";
        return ejecutarConsultaSimpleFila($sql);
    }
    public function actualizar_info($id,$nombre,$apellidop,$apellidom,$direccion,$municipio,$estado,$cp,$telefono,$email,$contrasenia){
        $cp = intval($cp);
        $contrasenia = ($contrasenia == 'contrasenia')?"":",Contrasenia='{$contrasenia}'";
        $sql = "UPDATE usuario SET Nombre='{$nombre}',Apellido_paterno='{$apellidop}',Apellido_materno='{$apellidom}',
        Direccion='{$direccion}',Estado='{$estado}',Municipio='{$municipio}',Codigo_postal={$cp},Telefono='{$telefono}',Email='{$email}'
        {$contrasenia} WHERE IdUsuario ={$id};";
        return ejecutarConsulta($sql);
    }
    // public function visualizarCompras($id_usuario){
    //     $sql = "SELECT uspr.Codigo_compra, pro.Nombre, uspr.Cantidad_productos, ve.Monto, ve.Metodo_pago, ve.Fecha FROM usuario_producto uspr 
    //     INNER JOIN producto pro ON uspr.Id_producto = pro.Id_producto
    //     INNER JOIN usuario us ON uspr.Id_usuario = us.Id_usuario
    //     INNER JOIN ventas ve ON uspr.Codigo_compra = ve.Codigo_compra
    //     WHERE us.Id_usuario ={$id_usuario};";
    //     return ejecutarConsulta($sql);
    // }
}
?>