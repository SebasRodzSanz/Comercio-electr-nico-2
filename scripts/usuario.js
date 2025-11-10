//VARIABLES
  let allProducts,offers;

  // --- Manejo del DOM ---
  const productGrid = document.getElementById('productGrid');
  const offersGrid = document.getElementById('offersGrid');
  const paginationEl = document.getElementById('pagination');
  const ITEMS_PER_PAGE = 12;

  let currentPage = 1;
  let currentFilter = '';
  
  const IVA_RATE = 0.16; // 16% IVA para cálculo de totales (3.4)
  let savedAddress = 'No has iniciado sesión. Ingresa una dirección manual.'; // Dirección por defecto para usuarios no logueados (3.5)
  let shippingNote = ''; // Nota especial (3.5)

  // --- Cart DOM Elements for totals and shipping (3.4 y 3.5) ---
  const cartSubtotalEl = document.getElementById('cartSubtotal');
  const cartIVAEl = document.getElementById('cartIVA');
  const cartTotalEl = document.getElementById('cartTotal');
  const currentAddressEl = document.getElementById('currentAddress');
  const newAddressFields = document.getElementById('newAddressFields');
  const newDireccionInput = document.getElementById('newDireccion');
  const specialNoteTextarea = document.getElementById('specialNote');
  const defaultAddressRadio = document.getElementById('defaultAddress');
  const newAddressOptionRadio = document.getElementById('newAddressOption');


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

  // Event listeners for shipping address selection (3.5)
  defaultAddressRadio.addEventListener('change', () => {
      if (defaultAddressRadio.checked) newAddressFields.style.display = 'none';
  });
  newAddressOptionRadio.addEventListener('change', () => {
      if (newAddressOptionRadio.checked) newAddressFields.style.display = 'block';
  });
  specialNoteTextarea.addEventListener('input', (e) => {
      shippingNote = e.target.value;
  });

  // Función auxiliar para actualizar totales y UI de envío
  function updateCartTotalsAndShippingUI(subtotal, count) {
      // Cálculo de totales (3.4)
      const iva = subtotal * IVA_RATE;
      const total = subtotal + iva;

      // Actualizar display de totales (3.4)
      cartSubtotalEl.textContent = formatMoney(subtotal);
      cartIVAEl.textContent = formatMoney(iva);
      cartTotalEl.textContent = formatMoney(total);
      
      cartCount.textContent = count;
      floatingCartCount.textContent = count;
      cartCount.style.display = count > 0 ? "inline-block" : "none";
      floatingCartCount.style.display = count > 0 ? "inline-block" : "none";

      // Actualizar información de envío (3.5)
      currentAddressEl.textContent = savedAddress;
      specialNoteTextarea.value = shippingNote;
  }

  function renderCart() {
    cartList.innerHTML = "";
    let subtotal = 0, count = 0;
    cart.forEach((item, i) => {
      subtotal += item.price * item.qty;
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
    
    updateCartTotalsAndShippingUI(subtotal, count); 
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
  const cuentaLink = document.getElementById('cuentaNueva');
  
  cuentaLink.addEventListener('click',(e)=>{
    e.preventDefault();
    // console.log(cuentaLink.dataset.seccion);
    mostrarSeccion(cuentaLink.dataset.seccion);
    document.getElementById('loginModal').style.display = 'none';
  });

  document.getElementById("year").textContent = new Date().getFullYear();

  const loginModal = document.getElementById("loginModal");
  const loginBtn = document.getElementById("loginBtn");
  loginBtn.addEventListener("click", () => loginModal.style.display = 'flex');


//JQUERY FUNCIONES
$(document).ready(()=>{
  //consultas iniciales de info
  function init(){
    listarProductos();
  }
  //función listar productos de la base de datos ajax
  function listarProductos() {
    //consulta de datos
    $.post('ajax/producto.php?op=listarProductos',(response)=>{
    const cuadros = JSON.parse(response);
      
    allProducts = cuadros.map((p) => {
        return {
        id: 'p' + p.IdProducto,
        img: `./public/img/productos/${p.Imagen_url}`, // Usamos el nombre de la imagen de tu array
        title: p.Nombre,
        price: p.Precio,
        description: p.Descripcion,
        rating: parseInt(p.Rating) // Asignamos una calificación aleatoria para las estrellas
      };
    });
    offers = allProducts.slice(0, 10).map(p => {
      const discountPerc = 10 + Math.floor(Math.random() * 21);
      const oldPrice = p.price;
      const newPrice = Math.round(oldPrice * (1 - discountPerc / 100));
      return { ...p, oldPrice, price: newPrice, discountPerc };
    });

    // --- Manejo del DOM ---
    currentPage = 1;
    currentFilter = '';

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

    });//fin listar cuadros
  }

//crear cuenta nueva
  $('#formCrearCuenta').submit((e)=>{
    e.preventDefault();
    const postData = {
      nombre: $('#nombre').val(),
      apellidop:$('#apellidop').val(),
      apellidom:$('#apellidom').val(),
      correo: $("#correo").val(),
      contrasenia: $("#contrasenia").val(),
    };
    $.ajax({
      url: "ajax/usuario.php?op=guardar",
      type:'POST',
      data: postData,
      success:(response)=>{
        console.log(response);
        alert(response);
        $("#formCrearCuenta").trigger('reset');//borra los campos del formulario
      }
    });
  });

//inicio sesion
  $("#loginForm").submit((e)=>{
    e.preventDefault();
    const postData ={
      emailSesion: $("#emailSesion").val(),
      passwordSesion: $("#passwordSesion").val()
    }
    $("#loginForm").trigger('reset');//borra los campos del formulario
    // console.log(postData);
    $.ajax({
      url: "ajax/usuario.php?op=sesion",
      type:'POST',
      data: postData,
      success:(response)=>{
        let valida = response.indexOf("ERROR,");//busca la cadena en otra cadena
          if(valida != -1){
              alert(response);//manda un modal de error con la respuesta
            }else{
              alert(response);//manda un modal con la respuesta
              window.location.href = 'index.php';
            }
        }
      });
  });
// --- Lógica de Finalizar Compra (Función Nueva) ---
  // function handleCheckout() {
  //   if (cart.length === 0) {
  //     alert("El carrito está vacío. Agrega productos antes de finalizar la compra.");
  //     return;
  //   }

  //   const subtotal = cart.reduce((acc, item) => acc + (item.price * item.qty), 0);
  //   const iva = subtotal * IVA_RATE;
  //   const total = subtotal + iva;
  //   const shippingAddress = defaultAddressRadio.checked ? savedAddress : newDireccionInput.value;
  //   const note = specialNoteTextarea.value || 'Ninguna';

  //   const confirmationMsg = `
  //   ✅ ¡COMPRA EXITOSA! ✅

  //   Detalles del Pedido:
  //   --------------------------
  //   Subtotal: ${formatMoney(subtotal)}
  //   IVA (16%): ${formatMoney(iva)}
  //   Total Final: ${formatMoney(total)}

  //   Dirección de Envío:
  //   --------------------------
  //   ${shippingAddress}

  //   Nota Especial (Horarios):
  //   --------------------------
  //   ${note}

  //   Gracias por tu compra en Tlacuache Art. Tu pedido será procesado pronto.
  //   `;

  //   alert(confirmationMsg);

  //   // Vaciar el carrito
  //   cart = [];
  //   renderCart();
  //   cartOffcanvas.classList.remove("show");
  // }

  // --- Asignar evento al botón "Finalizar compra" ---
  // document.querySelector(".checkout-btn").addEventListener("click", handleCheckout);
  //BOTON DEL CHEKOUT O PASARELA DE PAGO
  $('#checkout-btn').click((e)=>{
    e.preventDefault();
    
    if(cart.length != 0 ){
    // console.log(cart);

      //Datos de la pasarela de pago
      let html_pass = "";
      let subtotal_pass= 0,total_pass= 0, iva_pass=0;
      cart.forEach((item)=>{
        html_pass+=`<p>${item.title} × ${item.qty} <span>$ ${item.price} MXN</span></p>`;
        subtotal_pass += item.price * item.qty;
      });
      iva_pass = subtotal_pass * 0.16;
      total_pass = iva_pass + subtotal_pass;

      //pintar pasarela de pago
      $("#subtotal_pass").html(formatMoney(subtotal_pass));
      $("#iva_pass").html(formatMoney(iva_pass));
      $("#total_pass").html(formatMoney(total_pass));
      $("#product_list_pass").html(html_pass);

      //paypal btn 
      let descripcion_paypal ="Compra en Tlacuache Art";
      let moneda_paypal = "MXN"
      renderBotonPayPal('#btn_paypal',total_pass,descripcion_paypal,moneda_paypal);


      let dseccion = $("#checkout-btn").data('seccion');
      mostrarSeccion(dseccion);
    }

    function renderBotonPayPal(containerId,precio,descripcion,moneda) {
            paypal.Buttons({
                createOrder: function(data_pay,actions_pay){
                    return fetch('ajax/usuario.php?op=crearOrden',{
                        method:'POST',
                        headers:{
                            'Content-Type':'application/json'
                        },
                        body:JSON.stringify({
                            precio,
                            descripcion,
                            moneda
                        })
                    }).then((res)=>{
                        if (!res.ok) {
                            throw new Error('Error al crear la orden');
                        }
                        return res.json();
                    }).then((order)=>order.id).catch((err)=>{
                        notyf.error('Error al crear la orden: '+err.message);
                        throw err;
                    })
                },
                onApprove: function (data_pay,actions_pay){
                    return fetch('ajax/usuario.php?op=capturaOrden',{
                        method:'POST',
                        headers:{
                            'Content-Type':'application/json'
                        },
                        body:JSON.stringify({
                            orderID: data_pay.orderID
                        })
                    }).then((res)=>{
                        if(!res.ok){
                            throw new Error('Error al capturar la orden');
                        }
                        return res.json();
                    }).then((details)=>{
                        notyf.success('Pago completado por '+details.payer.name.given_name);
                        //llamar a funcion de registro de pago y registro de datos en la base de datos

                    }).catch((err)=>{
                        notyf.error('Error al capturar el pago: '+err.message);
                    });
                },
                onError: function(err){
                    notyf.error('Error en el proceso de pago: '+err.message);
                }
            }).render(containerId);
        };

  });


  init();
}); //fin del document ready