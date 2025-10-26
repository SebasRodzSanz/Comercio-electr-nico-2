  // --- Datos de productos ---
const productos = [
    ["Ciberpunk1.jpg", "Neón Metropolitano", 2600, "Un viaje visual por la ciudad iluminada por luces de neón."], 
    ["Ciberpunk2.jpg", "Ecos del Futuro", 3100, "Fusión entre tecnología y humanidad en un entorno cibernético."], 
    ["Ciberpunk3.jpg", "Sombras Digitales", 2900, "Una visión oscura del futuro urbano."], 
    ["Ciberpunk4.jpg", "Ciudad Infinita", 3400, "Inspiración en la expansión sin fin de las urbes futuristas."], 
    ["Ciberpunk5.jpg", "Ritmo Eléctrico", 2700, "Reflejo del movimiento urbano y la energía nocturna."], 
    ["Ciberpunk6.jpg", "Luz Sintética", 3200, "Tonos eléctricos que representan la vida artificial."], 
    ["Ciberpunk7.jpg", "Caos Programado", 3800, "La belleza del desorden dentro del control tecnológico."], 
    ["Ciberpunk8.jpg", "Metrópolis Azul", 3300, "Un horizonte urbano envuelto en brillos cobalto."], 
    ["Ciberpunk9.jpg", "Reflejo Digital", 3100, "Reflexión moderna del alma digital."], 
    ["Ciberpunk10.jpg", "Noche Cibernética", 3500, "La calma dentro del ruido tecnológico."], 
    ["Clasico1.png", "Renacimiento Dorado", 5600, "Inspiración en la luz y armonía del arte clásico."], 
    ["Clasico2.png", "Cielos Eternos", 5900, "Representación de la divinidad en la pintura tradicional."], 
    ["Clasico3.png", "El Jardín de los Dioses", 6200, "Escena mitológica con detalles barrocos."], 
    ["Clasico4.png", "Majestad Antigua", 5800, "El poder y la gloria de una época perdida."], 
    ["Clasico5.png", "Virtud y Belleza", 5400, "Equilibrio entre humanidad y divinidad."], 
    ["Clasico6.png", "El Banquete de los Héroes", 6000, "Recreación de una escena épica."], 
    ["Clasico7.png", "Sombras del Imperio", 5700, "Representación dramática del poder clásico."], 
    ["Clasico8.png", "Aurora del Arte", 6100, "El amanecer del arte como expresión eterna."], 
    ["Clasico9.png", "Melodía de Mármol", 5500, "La suavidad de la piedra convertida en emoción."], 
    ["Clasico10.png", "Revelación", 6300, "Una mirada espiritual desde el arte antiguo."], 
    ["cubismo1.png", "Fragmentos del Pensamiento", 2700, "Formas geométricas que revelan el alma humana."], 
    ["cubismo2.png", "Composición Urbana", 3000, "Líneas que se cruzan en un caos armonioso."], 
    ["cubismo3.png", "Rostros de Cristal", 3300, "El reflejo del ser descompuesto en figuras."], 
    ["cubismo4.png", "Dimensión Fragmentada", 3200, "Exploración del tiempo y la forma."], 
    ["cubismo5.png", "Equilibrio Abstracto", 3100, "Simetría imposible dentro del desorden."], 
    ["cubismo6.png", "Visión Interna", 2800, "El ojo que mira más allá de lo visible."], 
    ["cubismo7.png", "Ecos Geométricos", 3500, "Movimiento en planos y perspectivas."], 
    ["cubismo8.png", "Ruptura y Síntesis", 3600, "Una colisión entre el color y la estructura."], 
    ["cubismo9.png", "Códigos del Arte", 3400, "Composición visual que reta la lógica."], 
    ["cubismo10.png", "Punto y Línea", 3000, "La simplicidad de lo esencial."], 
    ["Luminismo1.png", "Atardecer Dorado", 2400, "La luz del sol en su máxima expresión pictórica."], 
    ["Luminismo2.png", "Bruma de Invierno", 2300, "Tonos suaves y atmósfera melancólica."], 
    ["Luminismo3.png", "Resplandor del Alba", 2500, "Juego de luces entre la noche y el amanecer."], 
    ["Luminismo4.png", "Luz del Horizonte", 2600, "La naturaleza bañada en destellos cálidos."], 
    ["Luminismo5.png", "Claridad Serena", 2700, "Paz y pureza en la luz de un nuevo día."], 
    ["Surrealismo1.png", "Sueño y Realidad", 3900, "Exploración del subconsciente en colores vivos."], 
    ["Surrealismo2.png", "Puerta al Infinito", 4100, "Una conexión entre mundos imposibles."], 
    ["Surrealismo3.png", "Silencio de los Relojes", 4200, "El tiempo detenido en la mente del artista."], 
    ["Surrealismo4.png", "El Ojo del Caos", 4000, "Una mirada a la locura del pensamiento."], 
    ["Surrealismo5.png", "Universo Interior", 4300, "El alma representada en metáforas visuales."], 
    ["Surrealismo6.png", "Geometría del Sueño", 4400, "El equilibrio entre lo real y lo ilusorio."], 
    ["Surrealismo7.png", "Ecos del Desierto", 4500, "Paisaje onírico que refleja soledad y grandeza."], 
    ["Surrealismo8.png", "Sombras Transparentes", 4700, "La luz y la oscuridad en diálogo eterno."], 
    ["Surrealismo9.png", "Memoria Líquida", 4600, "El pasado y el presente fundidos en un instante."], 
    ["Surrealismo10.png", "Dimensión Oculta", 4800, "La puerta hacia lo desconocido."], 
    ["producto1.jpg", "Forma y Silencio", 3100, "Exploración contemporánea del espacio vacío."], 
    ["producto 2.jpg", "Trama de Colores", 2900, "Ritmo visual entre textura y movimiento."], 
    ["producto3.jpg", "Mirada Intangible", 3300, "Retrato introspectivo con enfoque minimalista."], 
    ["mesi1.jpg", "Movimiento Perfecto", 2800, "La fuerza y precisión del instante deportivo."], 
    ["mesi2.jpg", "Inspiración en el Juego", 2700, "Captura del talento en movimiento."], 
    ["mesi3.jpg", "Pasión y Gloria", 2900, "La energía del deporte convertida en arte."]];

  // Mapeamos los datos para que tengan el mismo formato que el código original
  const allProducts = productos.map((p, i) => {
    return {
        id: 'p' + i,
        img: `./public/img/productos/${p[0]}`, // Usamos el nombre de la imagen de tu array
        title: p[1],
        price: p[2],
        description: p[3],
        rating: Math.floor(Math.random() * 3) + 3 // Asignamos una calificación aleatoria para las estrellas
    };
  });

  const offers = allProducts.slice(0, 10).map(p => {
    const discountPerc = 10 + Math.floor(Math.random() * 21);
    const oldPrice = p.price;
    const newPrice = Math.round(oldPrice * (1 - discountPerc / 100));
    return { ...p, oldPrice, price: newPrice, discountPerc };
  });

  // --- Manejo del DOM ---
  const productGrid = document.getElementById('productGrid');
  const offersGrid = document.getElementById('offersGrid');
  const paginationEl = document.getElementById('pagination');
  const ITEMS_PER_PAGE = 12;

  let currentPage = 1;
  let currentFilter = '';

  function formatMoney(n) {
    return '$' + n.toLocaleString() + ' MXN';
  }

  function getStarsHtml(rating) {
    let stars = '';
    for (let i = 1; i <= 5; i++) {
      stars += `<i class="fa ${i <= rating ? 'fa-star' : 'fa-star-o'}"></i>`;
    }
    return `<div class="rating">${stars}</div>`;
  }

  function renderProductsPage(page, filter='') {
    const filtered = allProducts.filter(p => p.title.toLowerCase().includes(filter.toLowerCase()));
    const totalPages = Math.max(1, Math.ceil(filtered.length / ITEMS_PER_PAGE));
    if (page < 1) page = 1;
    if (page > totalPages) page = totalPages;
    currentPage = page;

    const start = (page - 1) * ITEMS_PER_PAGE;
    const pageItems = filtered.slice(start, start + ITEMS_PER_PAGE);

    productGrid.innerHTML = pageItems.map(p => `
      <div class="producto" data-id="${p.id}" data-title="${p.title}" data-price="${p.price}" data-img="${p.img}" data-rating="${p.rating}" data-description="${p.description}">
        <img src="${p.img}" alt="${p.title}">
        <h3>${p.title}</h3>
        <p class="price">${formatMoney(p.price)}</p>
        ${getStarsHtml(p.rating)}
        <div class="controls">
          <button class="btn btn-add">Agregar</button>
          <button class="btn secondary btn-info">Ver más</button>
        </div>
      </div>
    `).join('');

    renderPagination(filtered.length, page);
  }

  function renderPagination(totalItems, page) {
    const totalPages = Math.max(1, Math.ceil(totalItems / ITEMS_PER_PAGE));
    let html = '';
    html += `<button id="prevPage" ${page===1?'disabled':''}>Anterior</button>`;
    for (let i = 1; i <= totalPages; i++) {
      html += `<button class="${i===page?'active':''}" data-page="${i}">${i}</button>`;
      if (i>=8) {
        if (totalPages > 8) { html += `<span>...</span> <button data-page="${totalPages}">${totalPages}</button>`; }
        break;
      }
    }
    html += `<button id="nextPage" ${page===totalPages?'disabled':''}>Siguiente</button>`;
    paginationEl.innerHTML = html;
  }

  function renderOffers() {
    offersGrid.innerHTML = offers.map(p => `
      <div class="producto" data-id="${p.id}" data-title="${p.title}" data-price="${p.price}" data-img="${p.img}" data-rating="${p.rating}" data-description="${p.description}">
        <img src="${p.img}" alt="${p.title}">
        <h3>${p.title}</h3>
        <p><del>${formatMoney(p.oldPrice)}</del> ${formatMoney(p.price)}</p>
        ${getStarsHtml(p.rating)}
        <div class="controls">
          <button class="btn btn-add">Agregar</button>
          <button class="btn secondary btn-info">Ver más</button>
        </div>
      </div>
    `).join('');
  }

  renderProductsPage(1);
  renderOffers();

  // --- Delegación de eventos: añadir al carrito y ver más ---
  let cart = [];
  const cartBtn = document.getElementById("cartBtn");
  const cartOffcanvas = document.getElementById("cartOffcanvas");
  const closeCart = document.getElementById("closeCart");
  const cartList = document.getElementById("cartList");
  const cartCount = document.getElementById("cartCount");
  const floatingCart = document.getElementById("floatingCart");
  const floatingCartCount = document.getElementById("floatingCartCount");

  cartBtn.addEventListener("click", () => cartOffcanvas.classList.add("show"));
  floatingCart.addEventListener("click", () => cartOffcanvas.classList.add("show"));
  closeCart.addEventListener("click", () => cartOffcanvas.classList.remove("show"));

  function renderCart() {
    cartList.innerHTML = "";
    let total = 0, count = 0;
    cart.forEach((item, i) => {
      total += item.price * item.qty;
      count += item.qty;
      cartList.innerHTML += `
        <div class="cart-item">
          <img src="${item.img}" alt="${item.title}">
          <div class="cart-item-info">
            <strong>${item.title}</strong><br>
            ${formatMoney(item.price)}
          </div>
          <div class="cart-item-actions">
            <button onclick="changeQty(${i}, -1)">-</button>
            <span class="item-qty">${item.qty}</span>
            <button onclick="changeQty(${i}, 1)">+</button>
            <button class="remove-btn" onclick="removeItem(${i})">❌</button>
          </div>
        </div>
      `;
    });
    document.querySelector(".cart-total").textContent = "Total: " + formatMoney(total);
    cartCount.textContent = count;
    floatingCartCount.textContent = count;
    cartCount.style.display = count > 0 ? "inline-block" : "none";
    floatingCartCount.style.display = count > 0 ? "inline-block" : "none";
  }

  function removeItem(i) {
    cart.splice(i, 1);
    renderCart();
  }
  function changeQty(i, change) {
    if (cart[i]) {
      cart[i].qty += change;
      if (cart[i].qty <= 0) removeItem(i);
      else renderCart();
    }
  }
  window.removeItem = removeItem;
  window.changeQty = changeQty;

  function handleAddClick(btn) {
    const productEl = btn.closest('.producto');
    const title = productEl.dataset.title;
    const price = parseFloat(productEl.dataset.price);
    const img = productEl.dataset.img;
    const found = cart.find(item => item.title === title);
    if (found) found.qty++;
    else cart.push({ title, price, img, qty: 1 });
    renderCart();
    cartOffcanvas.classList.add("show");
  }

  function handleInfoClick(btn) {
    const productEl = btn.closest('.producto');
    const title = productEl.dataset.title;
    const description = productEl.dataset.description;
    const price = productEl.dataset.price;
    const img = productEl.dataset.img;
    const rating = productEl.dataset.rating;

    modalTitle.textContent = title;
    modalDescription.textContent = description;
    modalPrice.textContent = formatMoney(parseFloat(price));
    modalImage.src = img;
    modalRating.innerHTML = getStarsHtml(rating);

    modalAddToCartBtn.dataset.title = title;
    modalAddToCartBtn.dataset.price = price;
    modalAddToCartBtn.dataset.img = img;

    productModal.style.display = "flex";
  }

  document.addEventListener('click', function(e) {
    const addBtn = e.target.closest('.btn-add');
    if (addBtn) {
      handleAddClick(addBtn);
      return;
    }
    const infoBtn = e.target.closest('.btn-info');
    if (infoBtn) {
      handleInfoClick(infoBtn);
      return;
    }

    const pageBtn = e.target.closest('#pagination button[data-page]');
    if (pageBtn) {
      const page = parseInt(pageBtn.dataset.page);
      renderProductsPage(page, currentFilter);
      return;
    }
    if (e.target.closest('#prevPage')) {
      renderProductsPage(currentPage - 1, currentFilter);
      return;
    }
    if (e.target.closest('#nextPage')) {
      renderProductsPage(currentPage + 1, currentFilter);
      return;
    }
  });

  const modalAddToCartBtn = document.getElementById("modalAddToCart");
  const productModal = document.getElementById("productModal");
  const modalTitle = document.getElementById("modalTitle");
  const modalDescription = document.getElementById("modalDescription");
  const modalPrice = document.getElementById("modalPrice");
  const modalImage = document.getElementById("modalImage");
  const modalRating = document.getElementById("modalRating");

  modalAddToCartBtn.addEventListener("click", e => {
    const title = e.target.dataset.title;
    const price = parseFloat(e.target.dataset.price);
    const img = e.target.dataset.img;
    
    const found = cart.find(item => item.title === title);
    if (found) found.qty++;
    else cart.push({ title, price, img, qty: 1 });
    
    renderCart();
    productModal.style.display = "none";
    cartOffcanvas.classList.add("show");
  });

  document.querySelectorAll(".modal-close-btn").forEach(btn => {
    btn.addEventListener("click", e => {
      e.target.closest('.modal').style.display = 'none';
    });
  });
  window.addEventListener("click", e => {
    if (e.target === productModal) productModal.style.display = 'none';
    if (e.target === document.getElementById('loginModal')) document.getElementById('loginModal').style.display = 'none';
  });

  const searchBar = document.getElementById('searchBar');
  const searchBtn = document.getElementById('searchBtn');

  function filtrarYMostrar() {
    const q = searchBar.value.trim();
    currentFilter = q;
    renderProductsPage(1, currentFilter);
  }

  searchBar.addEventListener('input', filtrarYMostrar);
  searchBtn.addEventListener('click', filtrarYMostrar);

  document.querySelectorAll(".footer-link").forEach(link => {
    link.addEventListener("click", e => {
      e.preventDefault();
      const target = link.dataset.seccion;
      if (target) {
        mostrarSeccion(target);
        window.scrollTo({ top: 0, behavior: 'smooth' });
      }
    });
  });
  function mostrarSeccion(id) {
    document.querySelectorAll('.seccion').forEach(s => s.classList.remove('activa'));
    const el = document.getElementById(id);
    if (el) el.classList.add('activa');
    document.querySelectorAll('.nav-bottom a').forEach(l => l.classList.remove('active'));
    const link = document.querySelector(`[data-seccion="${id}"]`);
    if (link) link.classList.add('active');
  }
  document.querySelectorAll('.nav-bottom a').forEach(link => {
    link.addEventListener('click', e => {
      e.preventDefault();
      mostrarSeccion(link.dataset.seccion);
    });
  });

//   const cuentaLink = document.getElementById('cuentaNueva');
//   cuentaLink.addEventListener('click',(e)=>{
//     e.preventDefault();
//     // console.log(cuentaLink.dataset.seccion);
//     mostrarSeccion(cuentaLink.dataset.seccion);
//     document.getElementById('loginModal').style.display = 'none';
//   });

  document.getElementById("year").textContent = new Date().getFullYear();


  //LOGIN MODAL 
//   const loginModal = document.getElementById("loginModal");
//   const loginBtn = document.getElementById("loginBtn");
//   loginBtn.addEventListener("click", () => loginModal.style.display = 'flex');


//JQUERY FUNCIONES
$(document).ready(()=>{
  // console.log('jquery funciona');
  //consultas iniciales de info
  function init(){
    // listarProductos();
  }
  //función listar productos de la base de datos ajax

//Editar datos de la cuenta

//Solicitar datos del usuario
  $("#formSolicitarDatos").submit((e)=>{
    e.preventDefault();
    $.ajax({
      url:"ajax/cliente.php?op=listarInfo",
      type:"POST",
      success:(response)=>{
        let infoUser = JSON.parse(response);
        // console.log(infoUser);
        $("#nombre").val(infoUser[0].Nombre);
        $("#apellidop").val(infoUser[0].Apellido_paterno);
        $("#apellidom").val(infoUser[0].Apellido_materno);
        $("#direccion").val(infoUser[0].Direccion);
        $("#municipio").val(infoUser[0].Municipio);
        $("#estado").val(infoUser[0].Estado);
        $("#cod_postal").val(infoUser[0].Codigo_postal);
        $("#telefono").val(infoUser[0].Telefono);
        $("#email").val(infoUser[0].Email);
        $("#contrasenia").val('contrasenia');

        //mostrar formu
        let dsecion = $("#infop").data('seccion');
        // console.log(dsecion);
        mostrarSeccion(dsecion);
        // document.getElementById('loginModal').style.display = 'none';
      }
    });
  });

//Cerrar sesion
  $("#FormLogOut").submit((e)=>{
    e.preventDefault();
    if(confirm("¿Deseas cerrar sesión?")){
        $.ajax({
            url: "ajax/cliente.php?op=sesion",
            type:'POST',
            success:(response)=>{
                alert(response);
                window.location.href="index.php";
            }
        });
    }
  });
});//fin del document ready




