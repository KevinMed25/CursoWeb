// "use strict"; // Lanza una advertencia si seguimos malas practicas 

const producto = {
    nombre: "Monitor",
    precio: 20,
    disponible: true
};

producto.img = "imagen.jpg";
console.log(producto);

// Object.freeze(producto); // ya no nos permite agregar más propiedades
// // producto.descripcion = "descripcion del producto"
// delete producto.disponible;
// console.log(producto) // freeze tampoco permite borrar ni editar un valor
// console.log("Is frozen:" + Object.isFrozen(producto)); // Devuelve si el objeto esta congelado

Object.seal(producto); // Hace lo mismo que freeze
producto.disponible = false; // pero este si te permite modificar valores
console.log(producto)
console.log("Is sealed:" + Object.isSealed(producto));