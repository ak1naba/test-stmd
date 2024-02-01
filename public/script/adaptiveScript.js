// Нахождение элеметов через querySelector
let menuIcon = document.querySelector('.header-menu');
let menu = document.querySelector('.header-nav');
let body = document.querySelector('body');

// Обработка нажатия на икноку
menuIcon.addEventListener('click', function (){
    // Манипулирование классами
    menuIcon.classList.toggle('header-menu__active');
    menu.classList.toggle('header-nav__active');
    body.classList.toggle('hidden-overflow');
})

