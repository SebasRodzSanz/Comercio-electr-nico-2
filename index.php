<?php 
/*   Verificación de inicio de sesión en cada página */
session_start();

if (!isset($_SESSION['usuario'])) {
    #sesión no abierta
    include_once "vistas/usuario/vista_usuario.php";
?>
<?php

}else {     
    #Sesión abierta
switch ($_SESSION['usuario']['Id_rol']){
    case (1):
        include_once "vistas/administrador/vista_administrador.php";
    break;
    case (2):
            include_once "vistas/cliente/vista_cliente.php";
    break;
    default:
        include_once "vistas/usuario/vista_usuario.php";
    break;
}
    /* print_r($_SESSION['usuario']); */
    //  session_unset(); // Eliminar todas las variables de sesión.
    //  session_destroy(); // Destruir la sesión.
    // exit; 
}
?>