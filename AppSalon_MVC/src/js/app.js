let paso = 1;
let pasoInicial = 1;
let pasoFinal = 3;

const cita = {
    id: '',
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

    idCliente();
    nombreCliente();
    seleccionarFecha();
    seleccionarHora();
    mostrarResumen();
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

        mostrarResumen();
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
    // console.log(servicio);
}

function idCliente() {
    cita.id = document.querySelector('#id').value;
}

function nombreCliente() {
    const nombre = document.querySelector('#nombre').value;
    cita.nombre = nombre;
}

function seleccionarFecha() {
    const entradaFecha = document.querySelector('#fecha');
    entradaFecha.addEventListener('input', function(e) {
        const dia = new Date(e.target.value).getUTCDay();
        if ( [6,0].includes(dia) ) {
            e.target.value = '';
            mostrarAlerta('Fines de semana no permitidos', 'error', '.formulario');
        } else {
            cita.fecha = e.target.value;
        }
    });
}

function seleccionarHora() {
    const entradaHora = document.querySelector('#hora');
    entradaHora.addEventListener('input', function(e) {
        const horaCita = e.target.value;
        const hora = horaCita.split(":")[0];
        if (hora < 10 || hora > 18) {
            e.target.value = '';
            mostrarAlerta('Hora fuera de servicio', 'error', '.formulario');
        } else {
            cita.hora = e.target.value;
        }
    });
}

function mostrarResumen() {
    const resumen = document.querySelector('.contenido-resumen');

    //Limpia el contenido del resumen
    while(resumen.firstChild) {
        resumen.removeChild(resumen.firstChild);
    }

    if(Object.values(cita).includes('') || cita.servicios.length === 0) {
        mostrarAlerta('Faltan datos de servicios o información de la cita', 'error', '.contenido-resumen', false);
        return;
    }

    //div resumen:
    const {nombre, fecha, hora, servicios} = cita;

    const headingServicios = document.createElement('H3');
    headingServicios.textContent = "Resumen de Servicios";
    resumen.appendChild(headingServicios);

    servicios.forEach(servicio => {
        const {id, precio, nombre} = servicio;

        const contenedorServicio = document.createElement('DIV');
        contenedorServicio.classList.add('contenedor-servicio');

        const txtServicio = document.createElement('P');
        txtServicio.textContent = nombre;

        const precioServicio = document.createElement('P');
        precioServicio.innerHTML = `<span>Precio: </span> $${precio}`;

        contenedorServicio.appendChild(txtServicio);
        contenedorServicio.appendChild(precioServicio);
        resumen.appendChild(contenedorServicio);
    });

    const headingInformacion = document.createElement('H3');
    headingInformacion.textContent = "Resumen de Cita";
    resumen.appendChild(headingInformacion);
        
    const nombreCliente = document.createElement('P');
    nombreCliente.innerHTML = `<span>Nombre: </span> ${nombre}`;
    

    //formatear fecha
    const fechaObj = new Date(fecha);
    const mes = fechaObj.getMonth();
    const dia = fechaObj.getDate() + 2;
    const anio = fechaObj.getFullYear();

    const fechaUTC = new Date(Date.UTC(anio, mes, dia));
    const opciones = {weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'};
    const fechaFormateada = fechaUTC.toLocaleDateString('es-MX', opciones);

    const fechaCita = document.createElement('P');
    fechaCita.innerHTML = `<span>Fecha: </span> ${fechaFormateada}`;

    const horaCita = document.createElement('P');
    horaCita.innerHTML = `<span>Fecha: </span> ${hora} horas`;

    const boton = document.createElement('BUTTON');
    boton.classList.add('boton');
    boton.textContent = 'Reservar Cita';
    boton.onclick = reservarCita;

    resumen.appendChild(nombreCliente);
    resumen.appendChild(fechaCita);
    resumen.appendChild(horaCita);
    resumen.appendChild(boton);
}

async function reservarCita() {
    
    const {nombre, fecha, hora, servicios, id} = cita;
    const idServicios = servicios.map(servicio => servicio.id);

    const datos = new FormData();

    datos.append('fecha', fecha);
    datos.append('hora', hora);
    datos.append('usuarioid', id);
    datos.append('servicios', idServicios);

    try {
        const url = '/api/citas';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        });
        const resultado = await respuesta.json();

        if (resultado.resultado) {
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: '<span class="white-text">Cita Creada Correctamente!</span>',
                showConfirmButton: false,
                timer: 3000,
                background: '#0da6f3',
                textColor: '#FFFFFF'
            }).then(()=> {
                window.location.reload();
            })
        }
    } catch (error) {
        Swal.fire({
            position: 'error',
            icon: 'success',
            title: '<span class="white-text">Error al guardar la cita!</span>',
            showConfirmButton: false,
            timer: 3000,
            background: '#cb0000',
            textColor: '#FFFFFF'
        }).then(()=> {
            window.location.reload();
        })
    }   
}

function mostrarAlerta(mensaje, tipo, elemento, desaparecer = true) {
    
    const alertaPrevia = document.querySelector('.alerta');
    if (alertaPrevia) {
        alertaPrevia.remove();
    }

    const alerta =document.createElement('DIV');
    alerta.textContent = mensaje;
    alerta.classList.add('alerta');
    alerta.classList.add(tipo);

    const referencia = document.querySelector(elemento);
    referencia.appendChild(alerta);

    if (desaparecer) {
        setTimeout(() => {
            alerta.remove();
        }, 3000);
    }
}

