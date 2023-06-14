document.addEventListener("DOMContentLoaded", function(){
    eventListeners();
    darkMode();
});

function eventListeners() {
    const mobileMenu = document.querySelector(".mobile-menu");

    mobileMenu.addEventListener("click", navResponsive);

    //muestra campos condicionales:
    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');
    metodoContacto.forEach(input => input.addEventListener('click', mostrarMetodosContacto));
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
        document.body.classList.toggle("dark-mode");
    });

}

function mostrarMetodosContacto(e) {
    const contactoDiv = document.querySelector('#contacto');
    if (e.target.value === 'telefono') {
        contactoDiv.innerHTML = `         
            <label for="tel">Número Telefónico</label>
            <input type="tel" placeholder="Tu número telefónico" id="tel" name="contacto[telefono]">
            
            <p>Elija la fecha y la hora para la llamada</p>
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="contacto[fecha]">

            <label for="hora">Hora:</label>
            <input type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]">
        `;
    } else {
        contactoDiv.innerHTML = `
            <label for="email">Email</label>
            <input type="email" placeholder="Escribe tu email" id="email" name="contacto[email]" require>
        `;
    }
    console.log(e);
}

