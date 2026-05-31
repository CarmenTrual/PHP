document.addEventListener("DOMContentLoaded", () => {
  const abrirCarritoBtn = document.getElementById("abrir-carrito");
  const modal = document.getElementById("carrito-modal");
  const cerrarBtn = document.querySelector(".close-btn");
  const carritoItemsContainer = document.getElementById("carrito-items");
  const totalElement = document.getElementById("total");

  let carrito = [];

  function actualizarCarrito() {
    carritoItemsContainer.innerHTML = "";
    let total = 0;

    carrito.forEach((curso, index) => {
      total += curso.precio;
      const itemDiv = document.createElement("div");
      itemDiv.classList.add("carrito-item");
      itemDiv.innerHTML = `
        <span>${curso.nombre} - ${curso.precio.toFixed(2)}€</span>
        <button data-index="${index}">Eliminar</button>
      `;
      carritoItemsContainer.appendChild(itemDiv);
    });

    totalElement.textContent = total.toFixed(2) + "€";

    // Botones para eliminar cursos
    carritoItemsContainer.querySelectorAll("button").forEach(btn => {
      btn.addEventListener("click", () => {
        const index = btn.dataset.index;
        carrito.splice(index, 1);
        actualizarCarrito();
      });
    });
  }

  // Abrir modal
  if (abrirCarritoBtn) {
    abrirCarritoBtn.addEventListener("click", (e) => {
      e.preventDefault();
      modal.style.display = "block";
    });
  }

  // Cerrar modal
  if (cerrarBtn) {
    cerrarBtn.addEventListener("click", () => {
      modal.style.display = "none";
    });
  }

  window.addEventListener("click", (e) => {
    if (e.target === modal) modal.style.display = "none";
  });

  // Agregar cursos al carrito
  document.addEventListener("click", (e) => {
    if (e.target.matches(".curso-card button")) {
      const card = e.target.closest(".curso-card");
      const nombre = card.querySelector("h2").textContent;
      const precioTexto = Array.from(card.querySelectorAll("p")).pop().textContent;
      const precio = parseFloat(precioTexto.replace("Precio: ", "").replace("€", "").replace(",", "."));

      carrito.push({ nombre, precio });
      actualizarCarrito();
      modal.style.display = "block"; // abrir modal automáticamente
    }
  });
});


