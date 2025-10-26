<?php
require_once "../modelo/Producto.php";
$productos = new Productos ();

#Verificamos si se envia idDepartemento y lo limpiamos. De lo contrario ponemos una cadena vacia


switch ($_GET['op']) {
    case 'listarProductos':
        $rpse = $productos->listar_productos();
        $json = array();
        while($row = $rpse->fetch_object()){
            $json[]=array(
                "IdProducto"=> $row ->IdProducto,
                "Nombre"=> $row -> Nombre,
                "Descripcion"=> $row->Descripcion,
                "Medidas"=>$row-> Medidas,
                "Precio"=> $row -> Precio,
                "Material"=>$row-> Material,
                "Categoria"=> $row -> Categoria,
                "Rating"=>$row->Rating,
                "Imagen_url"=> $row -> Imagen_url
            );
        }
        $jsonString = json_encode($json);
        echo $jsonString;
    break;
    default:
        # code...
        break;
}

?>