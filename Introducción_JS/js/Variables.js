/*
    VARIABLES
*/

var producto = "Audifonos"; //Esta forma de declarar variables no se utiliza desde ES6
var otro = 'otro'   // ; opcional
var sinInicializar; 

// En js no se declara el tipo de dato
var boolean = true;
var int = 10;
var float = 10.5;

//inicializar multiples variables: usar ,
var disponible = true,
    producto1 = "Laptop",
    categoria = "Electronica";

// Al nombrar variables, no podemos nombrarlas con números ni caracterés especiales al inicio
// usar _ al inicio si...
var _ejemplo;

//Estilos para las varibles:
var nombre_producto = "Monitor";    // underscore
var nombreProducto = "Monitor";  // camelCase
var NombreProducto = "monitor"; // PascalCase - usado para nombrar clases
var nombreproducto = "monitor"; // lowercase

console.log(nombreProducto); //Mostrar en consola
// Variables de tipo dinámico, una variable que antes tenia un string puede cabiar de tipo:

var ejemploString = "hola";
console.log(ejemploString); // devuelve "hola"
ejemploString = true;
console.log(ejemploString); // devuelce True

// Nuevas formas de declarar variables: let y const