// Inicializa el índice de la imagen actual
let currentImageIndex = 0;

// Obtiene todas las imágenes del carrusel
const images = document.querySelectorAll('.news-item');

// Función para cambiar la imagen visible
function changeImage() {
  // Oculta todas las imágenes
  images.forEach(image => {
    image.style.display = 'none';
  });

  // Muestra la imagen actual
  images[currentImageIndex].style.display = 'block';

  // Incrementa el índice de la imagen actual
  currentImageIndex++;

  // Si el índice de la imagen actual es mayor que el número de imágenes, lo reinicia a 0
  if (currentImageIndex >= images.length) {
    currentImageIndex = 0;
  }
}

// Cambia la imagen cada 3 segundos
setInterval(changeImage, 3000);


