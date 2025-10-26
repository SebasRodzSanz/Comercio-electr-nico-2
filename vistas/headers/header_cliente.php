<?php
# la vista del header del cliente
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tlacuache Art</title>

  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <link rel="stylesheet" href="./public/css/estilos.css">
</head>
<body>

<nav>
  <div class="nav-top">
    <div class="nav-left">
      <img src="./public/img/logo/logo.jpg" alt="Logo">
      <div class="logo-text">Tlacuache Art</div>
    </div>
    <div class="search-box">
      <input type="text" id="searchBar" placeholder="Buscar cuadros...">
      <button id="searchBtn">Buscar</button>
    </div>
    <div class="user-actions">
          <div class="dropdown">
            <button id="btn-drop" class="mg-right"><i class="fas fa-user"></i> </button>
            <div  id="mydropdown" class="dropdown-content">
              <a class="option-list" id="infop"  data-seccion="informacion_personal" >Perfil</a>
              <a class="option-list" id="cls_sesion" >Cerrar Sesión</a>
            </div>
          </div>
      <button class="cart-btn" id="cartBtn"><i class="fas fa-shopping-cart"></i><span id="cartCount" class="cart-count">0</span></button>
    </div>
  </div>
  <div class="nav-bottom">
    <a href="#" class="active" data-seccion="inicio">Inicio</a>
    <a href="#" data-seccion="productos">Productos</a>
    <a href="#" data-seccion="ofertas">Ofertas</a>
    <a href="#" data-seccion="contacto">Contacto</a>
  </div>
</nav>
