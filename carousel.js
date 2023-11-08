const slider = document.querySelector('.slider');
const items = document.querySelectorAll('.item');
let autoSlideInterval;

function activate(e) {
  const items = document.querySelectorAll('.item');
  e.target.matches('.next') && slider.append(items[0]);
  e.target.matches('.prev') && slider.prepend(items[items.length - 1]);
  
  clearInterval(autoSlideInterval); 
  autoSlideInterval = setInterval(autoSlide, 3000);
}

function autoSlide() {
  slider.append(slider.querySelector('.item'));
}

document.addEventListener('click', activate, false);


autoSlideInterval = setInterval(autoSlide, 3000);
