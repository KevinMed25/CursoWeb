let paso = 1;
let pasoInicial = 1;
let pasoFinal = 3;

document.addEventListener('DOMContentLoaded', function() {
    iniciarApp();
});

function iniciarApp() {
    mostrarSeccion();//muestra y oculta secciones
    botonesPaginador();//Agregar o quitar botones de paginador
    tabs(); //cambio de seccion
    paginaSiguiente();
    paginaAnterior();
}

function mostrarSeccion(){

    //primero ocultar seccion con clase mostrar
    const seccionAnterior = document.querySelector('.mostrar');
    if (seccionAnterior) {
        seccionAnterior.classList.remove('mostrar');
    }
    //se le agrega la clase mostrar al nuevo selector
    const pasoSelector = `#paso-${paso}`;
    const seccion = document.querySelector(pasoSelector);
    seccion.classList.add('mostrar');
    
    //Elimina "actual" al tab previo
    const tabAnterior = document.querySelector('.actual');
    if (tabAnterior) {
        tabAnterior.classList.remove('actual');
    }
    //Resalta tab actual
    const tab = document.querySelector(`[data-paso="${paso}"]`);
    tab.classList.add('actual');
}

function tabs() {
    const botones = document.querySelectorAll('.tabs button');
    botones.forEach( boton => {
        boton.addEventListener('click', function(e) {
            paso = parseInt(e.target.dataset.paso);
            mostrarSeccion();
            botonesPaginador();
        });
    });
}

function botonesPaginador() {
    const pagAnterior = document.querySelector('#anterior');
    const pagSiguiente = document.querySelector('#siguiente');

    if(paso === 1) {
        pagAnterior.classList.add('ocultar');
        pagSiguiente.classList.remove('ocultar');
    } else if (paso === 3) {
        pagAnterior.classList.remove('ocultar');
        pagSiguiente.classList.add('ocultar');
    } else {
        pagAnterior.classList.remove('ocultar');
        pagSiguiente.classList.remove('ocultar');
    }

    mostrarSeccion();
}

function paginaAnterior() {
    const paginaAnterior = document.querySelector('#anterior')
    paginaAnterior.addEventListener('click', function() {
        if (paso <= pasoInicial) return;
        paso--;
        botonesPaginador();
    });
}

function paginaSiguiente() {
    const paginaSiguiente = document.querySelector('#siguiente')
    paginaSiguiente.addEventListener('click', function() {
        if (paso >= pasoFinal) return;
        paso++;
        botonesPaginador();
    });
}