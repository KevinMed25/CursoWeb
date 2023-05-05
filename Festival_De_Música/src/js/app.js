

document.addEventListener("DOMContentLoaded", function(){
    iniciarApp();
});

function iniciarApp() {
    navFija();
    crearGaleria();
    scrollNav();
};

// Para mover el header con el scroll
function navFija() {
    const barra = document.querySelector(".header");
    const sobreFestival = document.querySelector(".acercaDe");
    const body = document.querySelector("body")

    window.addEventListener("scroll", function() {
        //console.log(sobreFestival.getBoundingClientRect()); // getBoundingClientRect devuelve informacion sobre la ubicacion de un elemento

        if (sobreFestival.getBoundingClientRect().top < 0) {
            // console.log("se paso el elemento");
            barra.classList.add("fijo");
            body.classList.add("body-scroll")
        } else {
            // console.log("aun no");
            barra.classList.remove("fijo");
            body.classList.remove("body-scroll")
        }
    });
};

// Efeto smooth scroll
function scrollNav() {
    const enlaces = document.querySelectorAll(".navegacion a");
    enlaces.forEach(enlace => { //tenemos que iterar en cada uno pq estamos usando querySelectorAll
        enlace.addEventListener("click", function(e) {

            e.preventDefault(); //el default es que se trasporte de golpe a la seccion

            // const seccionScroll = e.target.attributes.href.value; //Esta linea del codigo usa el profe, pero marca error, al parecer .value no funciona
            const seccionScroll = e.target.getAttribute("href"); // esta es una forma de arreglarlo (si los id no existen scrollIntoView detiene todo)
            console.log(seccionScroll);
            const seccion = document.querySelector(seccionScroll);
            seccion.scrollIntoView({behavior:"smooth"});

            //Otra forma de resolver el problema, solo que aqui lo que se hace es detectar el elemento por su clase de css y no por el ID
            // practicamente intercambia el "#" por ".", y pues los ID quedan inutiles
            // const seccionScroll = e.target.attributes.href.value;
            // const seccionScroll2 = "."+seccionScroll.substr(1);
            // const seccion = document.querySelector(seccionScroll2);
            // seccion.scrollIntoView({behavior:"smooth"});
        });
    });
}

// Para galeria:
function crearGaleria() {
    const galeria = document.querySelector(".galeria-img");

    for(let i = 1; i <= 12; i++) {
        const img = document.createElement("picture");
        img.innerHTML = `
            <source srcset="build/img/thumb/${i}.avif" type="image/avif">
            <source srcset="build/img/thumb/${i}.webp" type="image/webp">
            <img loading="lazy" width="200" height="300" src="src/img/imagen_vocalista.jpg" alt="img galeria">
        `;

        img.onclick = function(){
            mostrarImg(i);
        }
        galeria.appendChild(img);
    }
}

function mostrarImg(ID) {
    const img = document.createElement("picture");
    img.innerHTML = `
        <source srcset="build/img/grande/${ID}.avif" type="image/avif">
        <source srcset="build/img/grande/${ID}.webp" type="image/webp">
        <img loading="lazy" width="200" height="300" src="src/img/imagen_vocalista.jpg" alt="img galeria">
    `;
    //para crear efecto de oscurecer al hacer click: creamos overlay
    const overlay = document.createElement("DIV");
    overlay.appendChild(img);
    overlay.classList.add("overlay");
    overlay.onclick = function () {
        const body = document.querySelector("body");
        body.classList.remove("fijar-body"); //eliminamos clase al cerrar el modal
        overlay.remove();
    }

    // boton para cerrar ventana modal
    const cerrarModal = document.createElement("P");
    cerrarModal.textContent = "X";
    cerrarModal.classList.add("boton-cerrar");
    
    cerrarModal.onclick = function(){
        const body = document.querySelector("body");
        body.classList.remove("fijar-body"); //eliminamos clase al cerrar el modal
        overlay.remove();
    }

    overlay.appendChild(cerrarModal); // añadimos al overlay

    //añadir al html
    const body = document.querySelector("body");
    body.appendChild(overlay);
    //quitar el scroll al abrir una img
    body.classList.add("fijar-body");
}