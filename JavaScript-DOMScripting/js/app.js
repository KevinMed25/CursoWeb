// console.log("funciona");

// QuerySelector -- esta funcion retorna 0 o 1 elementos, dependerá del nivel de especificidad
// si nos equivocamos en el selector js no marca errores, pero retorna null o similar
const heading = document.querySelector(".header__text h2") // retorna 0 o un elementos 
// // entre más especifico sea mejor, o dependiendo de lo que requiera
// // los ID son preferiblemente usados para js que para aplicar css.
// const heading2 = document.querySelector("#heading"); // lo mismo pero con ID
// console.log(heading);
// console.log(heading2);
heading.textContent = "Nuevo heading"; // edita el texto del selector (investigar término correcto)
heading.classList.add("nueva-clase__CSS"); // agrega otra clase de css


// QuerySelectorAll --retorna de 0 a 1 que concuerden con el selector
// cuando se agrega una clase css en el selector es necesario agregar el ".", para agregar/quitar clases no
const enlaces = document.querySelectorAll(".navegacion a"); // devuelve el contenido de todos los enlaces en la clase navegacion
console.log(enlaces);
console.log(enlaces[0]); // podemos acceder a cada elemento con sintexis de array
enlaces[2].textContent = "nuevo enlace"; //plt, jedita solo el que tenemos seleccionado,
enlaces[2].href = "nosotros.html"; // modificacion del enlace
enlaces[0].classList.add("clase__nueva");
enlaces[0].classList.remove("navegacion__enlace"); // eliminamos clase de css
//marca error si usas una funcion sin indice

//getElementByID -- esta forma ya no es muy utilizada, pero se puede hacer lo mismo que en las otras
const heading3 = document.getElementById("heading");// obtenemos elemento por ID, ya no es necesario el #
console.log(heading3);
//DOM scripting, seleccionar elementos y modificarlos

// Crear HTML a través de JS

//queremos generar un nuevo enlace
//<a href="nuevo-enlace.html" class="nuevo-enlace"> Un nuevo enlace</a>

const nuevoEnlace = document.createElement("A"); // se recomienda usar mayusculas en el parametro

//agregar href
nuevoEnlace.href = "nuevo-enlace.html"

//agregar textto
nuevoEnlace.textContent = "Un nuevo enlace"

//agregar clase
nuevoEnlace.classList.add("navegacion__enlace");

//agregarlo al doc
const nav = document.querySelector(".navegacion");
nav.appendChild(nuevoEnlace); // agrega como hijo al nuevo enlace

console.log(nuevoEnlace);

// Eventos en JS

console.log(1);
//windown se encuentra un nivel más alto que el document, todas las funciones además del html
window.addEventListener("load", function(){ //cuando el evento ocurre, la funcion se ejecuta
    console.log(2); // el evento load espera a que el JS y los elementos que dependen del html esten listos
})

window.onload = function(){ //otra forma de hacer lo mismo
    console.log(3);
}

document.addEventListener("DOMContentLoaded", function(){ // este espera solamente a que se descargue el html, load espera a todo
    console.log(10);
})

// no es necesario declarar la funcion dentro del event listener

function print(){
    console.log(3);
}
window.addEventListener("load", print);

console.log(3);

window.onscroll = function(){ //este evento se activa al dar scrol
    console.log("Scrolling...")
}

// Como seleccionar un elemento y asociarle un evento
// const enviar = document.querySelector(".boton--primario")
// enviar.addEventListener("click", function(evento) {
//     console.log(evento)
//     //la siguiente linea es util para validar formularios
//     evento.preventDefault(); //previene el comportamiento por default 
//     console.log("Enviando...")
// })

//Eventos de teclado

//Eventos de inputs y textarea
const datos = {
    nombre: '',
    email: '',
    msj: ''
}

const nombre = document.querySelector("#nombre")
const email = document.querySelector("#email")
const msj = document.querySelector("#msj")

nombre.addEventListener("input" , read) //tambien se puede usar "change" pero esta se ejecuta hasta enviar. input es en tiempo real
email.addEventListener("input" , read)
msj.addEventListener("input" , read) 

function read(e) {
    datos[e.target.id] = e.target.value;
    console.log(datos);
}

// Eventos con Click y submit...

// const btnEnviar = document.querySelector('.formulario input[type=submit]');
// console.log(btnEnviar);

// btnEnviar.addEventListener('click', function() { // callback o closure 
//     console.log('click');
// });

// Eventos de formulario
// evento summit: (como en el evento de boton pusimos un prevent default, este código no se ejecuta, a menos que se remueva)
const formulario = document.querySelector(".formulario")
formulario.addEventListener("submit", function(evento) { //añadimos el evento
    evento.preventDefault()
    
    //para el evento submit se tiene que seleccionar el formulario entero, y a fuerza debe contener un submit, ya sea input o boton

    // Validar form
    const { nombre, email, msj } = datos;
    if (nombre == "" || msj == "" || email == "") {
        // console.log("todos los campos deben de ser llenados");
        alerta("todos los campos deben de ser llenados", true);
        return; // so entra al if, el return corta la ejecución
    }

    alerta("El formulario ha sido enviado correctamente", false)
    // console.log(nombre)
    // console.log(email)
    // console.log(msj)

    //enviar form

    console.log("Enviando el formulario...")
})
// function mostrarError(msj) {
//     // console.log(msj);
//     const error = document.createElement("P");
//     error.textContent = msj;
//     error.classList.add("error");

//     formulario.appendChild(error)
//     // hacer que desaparezca el p en unos seg
//     setTimeout(() => {
//         error.remove();
//     }, 5000)
// }

function alerta(msj, error) {
    // console.log(msj);
     const mensaje = document.createElement("P");
     mensaje.textContent = msj;
     if (error == true) {
        mensaje.classList.add("error");
     } else {
        mensaje.classList.add("enviado");
     }

     formulario.appendChild(mensaje)
     // hacer que desaparezca el p en unos seg
     setTimeout(() => {
        listo.remove();
     }, 5000)
}