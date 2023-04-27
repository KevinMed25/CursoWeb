

const producto = {
    nombre: "Monitor",
    precio: 20,
    disponible: true
};

// Forma anterior
const precioProducto = producto.precio;
console.log(precioProducto);

// Destructuring -> const{atributo} = objeto;
const{nombre} = producto; 
console.log(nombre);

// const{nombre, precio, disponible} = producto; este marca error, pq lo que se encuentra entre llaves se registra como una variable
const {disponible, precio} = producto;
console.log(disponible, precio, nombre);
console.log(`Disponible: ${disponible} Precio: ${precio} Nombre: ${nombre}`);