<?php 
require_once "../config/conexion.php";
Class Venta{
    public function __construct(){}
    public function insertarPago($metodoPago,$estadoPago,$total){
        $sql = "INSERT INTO pago(MetodoPago,EstadoPago,TotalPago) VALUES ('{$metodoPago}', '{$estadoPago}',{$total});";
        return ejecutarConsultaRetornaId($sql);
    }
    public function insertarVenta($idProducto,$idUsuario,$folioPago,$cantidad,$fechaVenta){
        $sql = "INSERT INTO Venta (IdProducto,IdUsuario,FolioPago,Cantidad,FechaVenta) VALUES ({$idProducto},{$idUsuario},{$folioPago},{$cantidad},'{$fechaVenta}');";
        return ejecutarConsultaRetornaId($sql);
    }
    public function insertarEnvio($folioVenta,$fechaEntrega,$nota){
        $sql = "insert into Envio (FolioVenta,FechaEntrega,Nota) values ({$folioVenta},'{$fechaEntrega}','{$nota}');";
        return ejecutarConsulta($sql);
    }
    public function visualizarCompras(){
        $sql = "SELECT IdProducto,Nombre,Descripcion,Medidas,Precio,Material,Categoria,Rating,Imagen_url
        FROM producto;";
        return ejecutarConsulta($sql);
    }
}
?>