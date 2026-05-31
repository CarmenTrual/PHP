// Lista de audios 
const audios = [
  { src: './Public/Audios/Alegrias.mp3', name: 'Alegrías' },
  { src: './Public/Audios/Bulerias.mp3', name: 'Bulerías' },
  { src: './Public/Audios/Seguiriya.mp3', name: 'Seguiriya' },
  { src: './Public/Audios/Sevillanas.mp3', name: 'Sevillanas' },
  { src: './Public/Audios/Solea.mp3', name: 'Soleá' },
  { src: './Public/Audios/Tangos.mp3', name: 'Tangos' },
];

// Selecionar elementos del DOM
const audioElement = document.getElementById('audio'); // Selecciona el elemento de audio.
const optionsElement = document.getElementById('options'); // Selecciona el contenedor donde se mostrarán las opciones de respuesta.
const messageElement = document.getElementById('message'); // Selecciona el lugar donde se mostrarán los mensajes.

// Función para iniciar un nuevo juego
function nuevoJuego() {
  const audio = audios[Math.floor(Math.random() * audios.length)]; // Elige un audio al azar de la lista

  audioElement.src = audio.src; // Asigna el audio al elemento de audio

  const opciones = audios.map(a => a.name); // Crea una lista de las opciones de respuesta

  const opcionesList = document.getElementById('opciones-list'); // Borra las opciones existentes
  opcionesList.innerHTML = '';
  
  // Crea las opciones de respuesta
  for (const option of opciones) { 
    const li = document.createElement('li'); // Crea un elemento <li>
    const button = document.createElement('button'); // Crea un elemento <button>
    button.textContent = option; // Asigna el texto de la respuesta

    // Asigna un evento de clic al botón
    button.onclick = function() { 
      // Comprueba si la opción es correcta
      if (option === audio.name) {
        messageElement.textContent = '¡Correcto! Sigue aprendiendo más sobre los palos del flamenco con nuestros cursos especializados.';
      } else {
        messageElement.textContent = '¡Incorrecto! No te preocupes, aprende a identificar los palos del flamenco con nuestros cursos especializados.';
      }
      
    };
    li.appendChild(button); // Agrega el botón al elemento <li>
    opcionesList.appendChild(li); // Agrega el elemento <li> al contenedor de respuestas
  }
}

// Añade un botón de reinicio al final de la sección del juego
const restartButton = document.createElement('button');
restartButton.textContent = 'Reiniciar juego';
restartButton.id = 'restart-button'; // Añade un id al botón para controlarlo en el css
document.getElementById('Juego').appendChild(restartButton);

// Asigna un evento de clic al botón de reinicio
restartButton.onclick = function() {
  // Limpia el mensaje
  messageElement.textContent = '';
  
  // Inicia un nuevo juego
  nuevoJuego();
};

// Inicia un nuevo juego cuando se carga la página
nuevoJuego();