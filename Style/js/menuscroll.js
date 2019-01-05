const navbar = document.querySelector('.navigation');
const div = document.querySelector('#navbarNav');
const listItem = div.querySelectorAll('.nav-link');
const navSpan = document.querySelector('#nav-span');
window.addEventListener('scroll', function (e) {
    const lastPosition = window.scrollY;
    if (lastPosition > 50) {
        navbar.classList.add('active');
    } else {
        navbar.classList.remove('active');
    }
});