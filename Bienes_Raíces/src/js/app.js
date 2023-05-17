document.addEventListener("DOMContentLoaded", function(){
    eventListeners();
    darkMode();
});

function eventListeners() {
    const mobileMenu = document.querySelector(".mobile-menu");

    mobileMenu.addEventListener("click", navResponsive);
}

function navResponsive() {
    const nav = document.querySelector(".navegacion");

    // if(nav.classList.contains("mostrar")) {
    //     nav.classList.remove("mostrar");
    // } else {
    //     nav.classList.add("mostrar");
    // }

    nav.classList.toggle("mostrar"); // hace lo mismo que lo comentado arriba
}

function darkMode() {

    const preferencia = window.matchMedia("prefers-color-scheme: dark");
    console.log(preferencia.matches);
    if (preferencia.matches) {
        document.body.classList.add("dark-mode");
    } else {
        document.body.classList.remove("dark-mode");
    }

    //si el usuario lo cambia desde SO se cambia automaticamente
    preferencia.addEventListener("change", function() {
        if (preferencia.matches) {
            document.body.classList.add("dark-mode");
        } else {
            document.body.classList.remove("dark-mode");
        }
    })

    const botonDarkMode = document.querySelector(".dark-mode-boton");
    botonDarkMode.addEventListener("click", function() {
        document.body.classList.toggle("dark-mode")
    });
}

