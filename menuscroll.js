const navbar = document.querySelector('.navigation');
window.addEventListener('scroll', function(e) {
    const lastPosition = window.scrollY;
    if (lastPosition > 50) {
        navbar.classList.add('active');
    } else {
        navbar.classList.remove('active');
    }
});