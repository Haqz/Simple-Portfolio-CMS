window.onscroll = function () {
    const navbar = document.querySelector('#navbar');
    if (window.scrollTop > 0) {
        navbar.classList.add("black");
    }
    console.log("siema");
};