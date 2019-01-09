const slideInProjects = document.querySelectorAll('.slide-in');

function slideProject(e) {
    const windowPosition = window.scrollY;
    slideInProjects.forEach(slide => {
        if (windowPosition > 2200) {
            slide.classList.add('slide-in-project');
        } else {
            slide.classList.remove('slide-in-project');
        }

    })
}
window.addEventListener('scroll', slideProject);