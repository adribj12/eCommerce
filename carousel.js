const slider = document.querySelector('.slider');
const items = document.querySelectorAll('.item');
let autoSlideInterval; // Variable para almacenar el temporizador

function activate(e) {
  const items = document.querySelectorAll('.item');
  e.target.matches('.next') && slider.append(items[0]);
  e.target.matches('.prev') && slider.prepend(items[items.length - 1]);
  
  // Detener el temporizador actual y configurar uno nuevo al hacer clic
  clearInterval(autoSlideInterval); 
  autoSlideInterval = setInterval(autoSlide, 3000); // Reiniciar el temporizador cada vez que haces clic
}

function autoSlide() {
  slider.append(slider.querySelector('.item'));
}

document.addEventListener('click', activate, false);



// Configurar el primer temporizador para avanzar automáticamente las imágenes
autoSlideInterval = setInterval(autoSlide, 3000);
