let paso = 1;
let pasoInicial = 1;
let pasoFinal = 3;

const cita = {
    nombre: '',
    fecha: '',
    hora: '',
    servicios: [],
}

document.addEventListener('DOMContentLoaded', function() {
    iniciarApp();
});

function iniciarApp() {
    mostrarSeccion();//muestra y oculta secciones
    botonesPaginador();//Agregar o quitar botones de paginador
    tabs(); //cambio de seccion
    paginaSiguiente();
    paginaAnterior();

    consultarAPI();//consultar api en backend php
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

async function consultarAPI() {
    try {
        const url = '/api/servicios';
        const resultado = await fetch(url);
        const servicios = await resultado.json();
        mostrarServicios(servicios);
    } catch (error) {
        console.log(error);
    }
}

function mostrarServicios(servicios) {
    servicios.forEach(servicio => {
        const { id, nombre, precio } = servicio;
        // console.log(id);
        
        const nombreServicio = document.createElement('p');
        nombreServicio.classList.add('nombre-servicio');
        nombreServicio.textContent= nombre;

        const precioServicio  = document.createElement('P');
        precioServicio.classList.add('precio-servicio');
        precioServicio.textContent = `$${precio}`;

        const servicioDiv = document.createElement('DIV');
        servicioDiv.classList.add('servicio');
        servicioDiv.dataset.idServicio = id;
        servicioDiv.onclick = function() {
            seleccionarServicio(servicio);
        };

        servicioDiv.appendChild(nombreServicio);
        servicioDiv.appendChild(precioServicio);

        document.querySelector('#servicios').appendChild(servicioDiv);
        
    });
}

function seleccionarServicio(servicio) {
    const {id} = servicio;
    const {servicios} = cita;
    const divServicio = document.querySelector(`[data-id-servicio="${id}"]`);//identifica al elemento que al que se da click

    //para comprobar si el servicio ya se ha agregado
    if(servicios.some( agregado => agregado.id === id)) {
        //eliminarlo
        cita.servicios = servicios.filter(agregado => agregado.id !== id);
        divServicio.classList.remove('seleccionado');
    } else { //aregarlo
        cita.servicios = [...servicios, servicio];
        divServicio.classList.add('seleccionado');
    } 
    console.log(servicio);
}