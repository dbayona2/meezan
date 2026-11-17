// assets/js/main.js

// Librería AOS: animaciones al hacer scroll
AOS.init({ duration: 800, once: true });

// Librería Swiper: carrusel de tarjetas
if (document.querySelector('.tarjetas-swiper')) {
  new Swiper('.tarjetas-swiper', {
    slidesPerView: 1,
    spaceBetween: 24,
    pagination: { el: '.swiper-pagination', clickable: true },
    autoplay: { delay: 3000, disableOnInteraction: false },
    breakpoints: {
      768: { slidesPerView: 2 },
      992: { slidesPerView: 3 }
    }
  });
}

// Pasos de activación: el botón avanza al siguiente paso
const pasos = document.querySelectorAll('.paso');
const boton = document.getElementById('siguiente');
let actual = 0;

if (boton && pasos.length) {
  boton.addEventListener('click', () => {
    pasos[actual].classList.remove('activo');
    actual = (actual + 1) % pasos.length;
    pasos[actual].classList.add('activo');
  });
}