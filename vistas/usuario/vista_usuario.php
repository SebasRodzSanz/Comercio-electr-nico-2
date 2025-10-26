<?php
# mandar a llamar al header del usuario
require "./vistas/headers/header_usuario.php";
?>
<section id="inicio" class="seccion activa">
  <h1>Tlacuache Art</h1>
  <p><em>"De los dioses a tu casa."</em></p>
  <p>El nombre Tlacuache Art nace de la idea de vincular la identidad cultural
mexicana con el mundo del arte. El tlacuache es un animal muy representativo
de nuestro entorno, conocido por su astucia, adaptabilidad y su papel en
leyendas populares. Al usarlo como símbolo, buscamos darle un toque cercano,
auténtico y diferente a nuestra empresa, generando curiosidad y simpatía.
Además, el nombre es sencillo de recordar, atractivo y transmite una
personalidad divertida y creativa, lo que ayuda a que la marca se posicione
fácilmente en la mente de los clientes.
.</p>
<div class="destacados">
  <img src="./public/img/arte/arte1.jpg" alt="Noche Estrellada" class="animate__animated animate__zoomInRight">
  <img src="./public/img/arte/arte2.jpg" alt="Fuerte Hermosura" class="animate__animated animate__zoomInRight">
  <img src="./public/img/arte/arte3.jpg" alt="Girasoles Bonitos" class="animate__animated animate__zoomInRight">
</div>
</section>

<section id="productos" class="seccion">
  <h2 class="productos-header">Nuestros Cuadros</h2>
  <div class="contenedor" id="productGrid">
    </div>

  <div class="pagination" id="pagination"></div>
</section>

<section id="ofertas" class="seccion">
  <h2 class="productos-header">Ofertas</h2>
  <div class="contenedor" id="offersGrid"></div>
</section>

<section id="identidad" class="seccion">
  <h2 class="productos-header">Identidad</h2>
  <p>Arte auténtico y original con inspiración mexicana.</p>
</section>

<section id="acerca" class="seccion">
  <h2 class="productos-header">Acerca de</h2>
  <p>Compren Koenjis camisas arriba las chivas</p>
</section>

<section id="contacto" class="seccion">
  <h2 class="productos-header">Contacto</h2>
  <p>Email: contacto@tlacuacheart.com</p>
</section>

<section id="condiciones" class="seccion">
  <h2 class="productos-header">Condiciones de compra</h2>
  <p>Todos los cuadros incluyen certificado de autenticidad.</p>
</section>

<section id="crear_cuenta"  class="seccion">
  <h2 class="form-titulo">Tlacuache ART</h2>
    <div class="formuCrearCuenta">
      <h3>Ingresa tus datos</h3>
      <form id="formCrearCuenta"  autocomplete="off">
      <div class="form-elemento">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre"  placeholder="Escribe tu nombre" required>
      </div>
      <div class="form-elemento">
        <label for="apellidop">Apellido Paterno</label>
        <input type="text" id="apellidop"  placeholder="Escribe tu apellido paterno" required>
      </div>
      <div class="form-elemento">
        <label for="apellidom">Apellido Materno</label>
        <input type="text" id="apellidom"  placeholder="Escribe tu apellido materno" required>
      </div>
      <div class="form-elemento">
        <label for="correo">Correo</label>
        <input type="email" id="correo"  placeholder="Escribe tu correo" required>
      </div>
      <div class="form-elemento">
        <label for="contrasenia">Contraseña</label>
        <input type="password" id="contrasenia"  placeholder="Escribe tu contraseña" required>
      </div>
      <div class="form-elemento">
        <button type="submit">Registrarse</button>
      </div>
      </form>
    </div>
</section>

<div class="offcanvas" id="cartOffcanvas">
  <div class="offcanvas-header">
    <h3><i class="fas fa-shopping-cart"></i> Carrito</h3>
    <button id="closeCart">X</button>
  </div>
  <div class="offcanvas-body">
    <div id="cartList"></div>
    <div class="cart-total">Total: $0.00</div>
    <button class="checkout-btn">Finalizar compra</button>
  </div>
</div>

<div class="floating-cart" id="floatingCart">
  <i class="fas fa-shopping-cart"></i>
  <span id="floatingCartCount">0</span>
</div>

<footer>
  <div class="footer-columns">
    <div>
      <h6>Compañía</h6>
      <ul>
        <li><a href="#" class="footer-link" data-seccion="identidad">Identidad</a></li>
        <li><a href="#" class="footer-link" data-seccion="acerca">Acerca de</a></li>
      </ul>
    </div>
    <div>
      <h6>Atención</h6>
      <ul>
        <li><a href="#" class="footer-link" data-seccion="contacto">Contacto</a></li>
        <li><a href="mailto:contacto@tlacuacheart.com">Email</a></li>
      </ul>
    </div>
    <div>
      <h6>Legal</h6>
      <ul>
        <li><a href="#" class="footer-link" data-seccion="condiciones">Condiciones de compra</a></li>
        <li><a href="#" class="footer-link" data-seccion="aviso">Aviso legal</a></li>
      </ul>
    </div>
    <div>
      <h6>Síguenos</h6>
      <ul>
        <li><a href="https://www.instagram.com/koenji.clo/" target="_blank">Instagram</a></li>
        <li><a href="https://www.facebook.com/profile.php?id=61564100555181" target="_blank">Facebook</a></li>
      </ul>
    </div>
  </div>
  <div class="legal-note">
    © <span id="year">2025</span> Tlacuache Art — Todos los derechos reservados.
  </div>
</footer>

<div id="productModal" class="modal">
    <div class="modal-content">
        <span class="modal-close-btn">&times;</span>
        <div class="modal-header">
            <h2 id="modalTitle"></h2>
        </div>
        <div class="modal-body">
            <img id="modalImage" src="" alt="">
            <div class="modal-info">
                <p id="modalDescription"></p>
                <div id="modalRating" class="rating modal-rating"></div>
                <p id="modalPrice" class="modal-price"></p>
                <button class="btn btn-add" id="modalAddToCart">Agregar al carrito</button>
            </div>
        </div>
    </div>
</div>

<div id="loginModal" class="modal">
    <div class="modal-content modal-login">
        <span class="modal-close-btn">&times;</span>
        <div class="modal-header">
            <h2>Iniciar Sesión</h2>
        </div>
        <form id="loginForm" autocomplete="off">
            <label for="emailSesion">Email:</label>
            <input type="email" id="emailSesion" required placeholder="Ingresa tu correo electronico">
            <label for="passwordSesion">Contraseña:</label>
            <input type="password" id="passwordSesion"  required placeholder="Ingresa tu password">
            <p>Eres nuevo en Tlacuache ART <a href="#" id="cuentaNueva" data-seccion="crear_cuenta">Crea cuenta</a> </p>
            <button type="submit">Entrar</button>
        </form>
    </div>
</div>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="./scripts/usuario.js"></script>
</body>
</html>