// Нахождение элеметов через querySelector
let upIcon = document.querySelector('.footer-up');
// Обработка нажатия на икноку
upIcon.addEventListener('click', function () {
    // Промотка наверх
    window.scroll(0,0);
});