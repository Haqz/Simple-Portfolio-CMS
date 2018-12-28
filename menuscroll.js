const navbar = document.querySelector('.navigation');
const div = document.querySelector('#navbarNav');
const listItem = div.querySelectorAll('.nav-link');
const navSpan = document.querySelector('#nav-span');
window.addEventListener('scroll', function (e) {
    const lastPosition = window.scrollY;
    if (lastPosition > 50) {
        navbar.classList.add('active');
        listItem.forEach(function (e) {
            e.classList.add('active-a');
        });
        listItem.forEach(function (e) {
            navbar.classList.add('active-border');
        });
        navSpan.classList.add('span-active');
    } else {
        navbar.classList.remove('active');
        listItem.forEach(function (e) {
            e.classList.remove('active-a');
        });
        listItem.forEach(function (e) {
            navbar.classList.remove('active-border');
        });
        navSpan.classList.remove('span-active');
    }
});