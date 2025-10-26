<?php 
require "../config/conexion.php";
Class Productos{
    public function __construct(){}
    public function listar_productos(){
        $sql = "SELECT IdProducto,Nombre,Descripcion,Medidas,Precio,Material,Categoria,Rating,Imagen_url
        FROM producto;";
        return ejecutarConsulta($sql);
    }
}
?>