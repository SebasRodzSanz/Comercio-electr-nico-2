<?php 
require "../config/conexion.php";
Class Venta{
    public function __construct(){}
    public function insertarVenta(){
        $sql = "SELECT IdProducto,Nombre,Descripcion,Medidas,Precio,Material,Categoria,Rating,Imagen_url
        FROM producto;";
        return ejecutarConsulta($sql);
    }
    public function insertarPago(){
        $sql = "SELECT IdProducto,Nombre,Descripcion,Medidas,Precio,Material,Categoria,Rating,Imagen_url
        FROM producto;";
        return ejecutarConsulta($sql);
    }
    public function insertarEnvio(){
        $sql = "SELECT IdProducto,Nombre,Descripcion,Medidas,Precio,Material,Categoria,Rating,Imagen_url
        FROM producto;";
        return ejecutarConsulta($sql);
    }
    public function visualizarCompras(){
        $sql = "SELECT IdProducto,Nombre,Descripcion,Medidas,Precio,Material,Categoria,Rating,Imagen_url
        FROM producto;";
        return ejecutarConsulta($sql);
    }
}
?>