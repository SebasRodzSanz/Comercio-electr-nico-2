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

<section id="acerca" class="seccion py-5" style="background-color: #f7f7f7;">
    <div class="container">

        <header class="text-center mb-5 pb-3">
            <h2 class="display-5 fw-bold text-dark-emphasis">Nuestra Historia: Tlacuache Art ✨</h2>
            <p class="lead text-secondary-emphasis">Democratizando el arte mexicano con estilo y accesibilidad.</p>
        </header>

        <div class="card p-4 shadow-lg mb-5 border-0" style="background-color: #fffaf0;">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <h3 class="h4 text-danger-emphasis mb-3"><i class="fas fa-scroll me-2"></i> Raíces de Tlacuache Art</h3>
                        <p class="lead">
                            Todo comenzó el **22 de septiembre de 2021** en Tlalnepantla de Baz, fundado por **Edson Cordova, Sebastian Rodriguez, Carlos Yescas e Ilich Leal**.
                        </p>
                        <hr>
                        <h4 class="h6 text-danger-emphasis">Anécdota Fundacional</h4>
                        <p class="small text-muted">
                            "Fue durante una caminata en Coyoacán que surgió la idea. Inspirados por la experiencia de **Koenji** (la marca de ropa de Ilich y Carlos que lleva el estilo al precio accesible), decidimos que si podíamos democratizar la moda, podíamos democratizar el arte. Romper las barreras tradicionales era nuestro único objetivo."
                        </p>
                    </div>
                  <div class="col-lg-5 text-center mt-3 mt-lg-0">
    <div style="border-radius: 8px; overflow: hidden; display: flex; align-items: center; justify-content: center;">
        <img src="public/img/fundacion/koenji.jpeg" alt="Imagen de Fundación Koenji" style="width: 100%; height: auto; object-fit: contain; border-radius: 8px;">
    </div>
</div>
                </div>
            </div>
        </div>
        
        <h3 class="text-center mb-4 pt-3 fw-bold text-dark-emphasis"><i class="fas fa-users me-2"></i> Conoce a los Creadores</h3>
        <div class="table-responsive mb-5">
            <table class="table table-striped table-hover shadow-sm border-2">
                <thead class="table-primary">
                    <tr>
                        <th>Foto</th>
                        <th>Fundador</th>
                        <th>Dónde Vive</th>
                        <th>Hobbies</th>
                        <th>Detalle Relevante</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img src="public/img/creadores/creador1.jpg" alt="Foto de Edson" class="creator-photo"></td>
                        <td>Edson Cordova</td>
                        <td>Naucalpan, Estado de México.</td>
                        <td>Diseño 3D, desarrollo de videojuegos *indie*.</td>
                        <td>Liderazgo en el desarrollo web.</td>
                    </tr>
                    <tr>
                        <td><img src="public/img/creadores/creador4.jpg" alt="Foto de Sebastian" class="creator-photo"></td>
                        <td>Sebastian Rodriguez</td>
                        <td>Santa Monica, Naucalpan.</td>
                        <td>Programador (Especialista en Back-End).</td>
                        <td>Especialista en la estructura digital de la plataforma.</td>
                    </tr>
                    <tr>
                        <td><img src="public/img/creadores/creador2.jpg" alt="Foto de Carlos" class="creator-photo"></td>
                        <td>Carlos Yescas</td>
                        <td>Tlalnepantla de Baz.</td>
                        <td>Fotografía de paisaje y urbano.</td>
                        <td>Co-fundador de **Koenji** (Ropa accesible con estilo).</td>
                    </tr>
                    <tr>
                        <td><img src="public/img/creadores/creador3.jpg" alt="Foto de Ilich" class="creator-photo"></td>
                        <td>Ilich Leal</td>
                        <td>Coacalco.</td>
                        <td>Dibujante y Tatuador.</td>
                        <td>Co-fundador de **Koenji** (Ropa accesible con estilo).</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h3 class="text-center mb-4 pt-3 fw-bold text-dark-emphasis">Ventajas para el Cliente</h3>
        <div class="row row-cols-1 row-cols-md-3 g-4 mb-5 text-center">
            
            <div class="col">
                <div class="p-3 border rounded shadow-sm h-100 bg-white advantage-item">
                    <i class="fas fa-shield-alt fa-2x text-success mb-2"></i>
                    <h5 class="h6 fw-bold">Calidad</h5>
                    <p class="small text-muted mb-0">Autenticidad y originalidad garantizada en cada obra de artistas verificados.</p>
                </div>
            </div>
            
            <div class="col">
                <div class="p-3 border rounded shadow-sm h-100 bg-white advantage-item">
                    <i class="fas fa-tag fa-2x text-primary mb-2"></i>
                    <h5 class="h6 fw-bold">Precios Justos</h5>
                    <p class="small text-muted mb-0">Conexión directa con el artista para eliminar intermediarios costosos.</p>
                </div>
            </div>
            
            <div class="col">
                <div class="p-3 border rounded shadow-sm h-100 bg-white advantage-item">
                    <i class="fas fa-magnifying-glass-dollar fa-2x text-info mb-2"></i>
                    <h5 class="h6 fw-bold">Transparencia Total</h5>
                    <p class="small text-muted mb-0">Precios que incluyen el IVA. Sin sorpresas al finalizar el carrito.</p>
                </div>
            </div>
            
            <div class="col">
                <div class="p-3 border rounded shadow-sm h-100 bg-white advantage-item">
                    <i class="fas fa-undo-alt fa-2x text-warning mb-2"></i>
                    <h5 class="h6 fw-bold">Garantía de Satisfacción</h5>
                    <p class="small text-muted mb-0">Facilitamos la devolución o el cambio si la obra no cumple tus expectativas.</p>
                </div>
            </div>
            
            <div class="col">
                <div class="p-3 border rounded shadow-sm h-100 bg-white advantage-item">
                    <i class="fas fa-hand-holding-heart fa-2x text-danger mb-2"></i>
                    <h5 class="h6 fw-bold">Impacto Social</h5>
                    <p class="small text-muted mb-0">Cada compra apoya directamente la carrera de un artista mexicano emergente.</p>
                </div>
            </div>

            <div class="col d-none d-md-block"></div>
        </div>

        <div class="row g-4">
            <div class="col-lg-6">
                <h3 class="h5 fw-bold text-dark-emphasis mb-3"><i class="fas fa-star me-2"></i> 5 Experiencias Destacadas</h3>
                <div class="table-responsive">
                    <table class="table table-bordered table-sm shadow-sm bg-white text-start experience-table">
                        <thead style="background-color: #c55b11; color: white;">
                            <tr>
                                <th style="width: 50px;">Foto</th> <th style="width: 100px;">Rating</th>
                                <th>Experiencia y Detalle</th>
                                <th style="width: 80px;">Producto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="client-photo-cell">
                                    <img src="public/img/Experiencias/foto1.jpg" alt="Angel Alcala" class="client-review-photo">
                                </td>
                                <td>
                                    <div class="text-warning rating-stars">
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                    </div>
                                </td>
                                <td>
                                    <span class="fw-bold">Angel Alcala: 🏡 La pieza que cambió mi sala.</span>
                                    <p class="small text-muted mb-0">Cliente de Coacalco: La pintura abstracta se convirtió en el centro de atención de todas sus reuniones.</p>
                                </td>
                                <td class="product-cell">
                                    <img src="public/img/productos/Ciberpunk1.jpg" alt="Producto 1" class="product-review-photo">
                                </td>
                            </tr>
                            <tr>
                                <td class="client-photo-cell">
                                    <img src="public/img/Experiencias/foto2.jpg" alt="Esteban Arzate" class="client-review-photo">
                                </td>
                                <td>
                                    <div class="text-warning rating-stars">
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                                    </div>
                                </td>
                                <td>
                                    <span class="fw-bold">Esteban Arzate: 📦 El envío a tiempo récord.</span>
                                    <p class="small text-muted mb-0">Cliente de Villa de Cortes: Logística rápida para que su grabado llegara un día antes de la fecha límite.</p>
                                </td>
                                <td class="product-cell">
                                    <img src="public/img/productos/mesi1.jpg" alt="Producto 2" class="product-review-photo">
                                </td>
                            </tr>
                            <tr>
                                <td class="client-photo-cell">
                                    <img src="public/img/Experiencias/foto3.jpg" alt="Victor Santana" class="client-review-photo">
                                </td>
                                <td>
                                    <div class="text-warning rating-stars">
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>
                                    </div>
                                </td>
                                <td>
                                    <span class="fw-bold">Victor Santana: 📈 Inversión que creció.</span>
                                    <p class="small text-muted mb-0">Comprador satisfecho: El valor de la obra que descubrió en Tlacuache Art se duplicó en dos años.</p>
                                </td>
                                <td class="product-cell">
                                    <img src="public/img/productos/Surrealismo1.png" alt="Producto 3" class="product-review-photo">
                                </td>
                            </tr>
                            <tr>
                                <td class="client-photo-cell">
                                    <img src="public/img/Experiencias/foto4.jpg" alt="Lionel Messi" class="client-review-photo">
                                </td>
                                <td>
                                    <div class="text-warning rating-stars">
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                    </div>
                                </td>
                                <td>
                                    <span class="fw-bold">Lionel Messi: 💬 Conexión con el artista.</span>
                                    <p class="small text-muted mb-0">Cliente de California: Facilitamos una videollamada para que discutiera la obra con el artista de Oaxaca.</p>
                                </td>
                                <td class="product-cell">
                                    <img src="public/img/productos/cubismo2.png" alt="Producto 4" class="product-review-photo">
                                </td>
                            </tr>
                            <tr>
                                <td class="client-photo-cell">
                                    <img src="public/img/Experiencias/foto5.jpg" alt="Paco Palencia" class="client-review-photo">
                                </td>
                                <td>
                                    <div class="text-warning rating-stars">
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                    </div>
                                </td>
                                <td>
                                    <span class="fw-bold">Paco Palencia: 🆘 Soporte 24/7.</span>
                                    <p class="small text-muted mb-0">Problema con un cupón resuelto en menos de 10 minutos a medianoche.</p>
                                </td>
                                <td class="product-cell">
                                    <img src="public/img/productos/Ciberpunk2.jpg" alt="Producto 5" class="product-review-photo">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-6">
                <h3 class="h5 fw-bold text-dark-emphasis mb-3"><i class="fas fa-people-carry-box me-2"></i> Nuestro Equipo Interno</h3>
                <div class="p-3 border rounded shadow-sm bg-white h-100">
                    <p class="fw-bold mb-1">El motor de Tlacuache Art:</p>
                    <p class="small text-muted">Aseguramos que cada pieza tenga el tratamiento que merece, desde la logística anti-impacto hasta el soporte técnico. Nuestro equipo es la extensión humana de nuestra promesa.</p>
                    <ul class="list-unstyled small mt-3">
                        <li><i class="fas fa-palette me-2 text-info"></i> **Curador de Artistas:** Certifica la calidad.</li>
                        <li><i class="fas fa-truck-fast me-2 text-info"></i> **Especialista en Logística:** Envío seguro y rápido.</li>
                        <li><i class="fas fa-headset me-2 text-info"></i> **Soporte al Cliente:** Cara humana para resolver dudas.</li>
                        <li><i class="fas fa-code me-2 text-info"></i> **Desarrollador Web:** Mantenimiento de la plataforma.</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
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

    <div class="cart-summary">
        <p>Subtotal: <span id="cartSubtotal">$0.00</span></p>
        <p>IVA (16%): <span id="cartIVA">$0.00</span></p>
        <div class="cart-total">Total: <span id="cartTotal">$0.00</span></div>
    </div>

    <!-- <div class="cart-shipping-info">
        <h4>Dirección de Envío</h4>
        <div class="form-elemento">
            <input type="radio" id="defaultAddress" name="shippingAddress" value="default" checked>
            <label for="defaultAddress" id="defaultAddressLabel">Usar mi dirección registrada</label>
            <p id="currentAddress" style="font-size: 0.9em; margin-left: 25px; color: #666;"></p>
        </div>
        <div class="form-elemento">
            <input type="radio" id="newAddressOption" name="shippingAddress" value="new">
            <label for="newAddressOption">Ingresar una nueva dirección</label>
        </div>
        <div id="newAddressFields" style="display: none; margin-left: 25px; margin-top: 10px;">
            <input type="text" id="newDireccion" placeholder="Dirección, Colonia, Municipio, Estado, C.P." style="width: 90%; padding: 6px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; margin-bottom: 5px;">
        </div>
        
        <h4>Nota Especial (Horarios de Entrega)</h4>
        <div class="form-elemento">
            <textarea id="specialNote" placeholder="Ej: Entregar de 9am a 5pm. Llamar al llegar para localizarme."></textarea>
        </div>
    </div> -->
    
    <button id="checkout-btn">Finalizar compra</button>
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