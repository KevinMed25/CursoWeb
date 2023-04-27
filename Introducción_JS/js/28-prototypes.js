
// POO 

// Object Literal -- forma más estatica 
const producto = {
    nombre: "telefono",
    precio: 1000
}

// Object Constructor

function Producto(_nombre, _precio) {
    this.nombre = _nombre;
    this.precio = _precio;
}

function Cliente(_nombre, _apellido) {
    this.nombre = _nombre;
    this.apellido = _apellido;
}

// Prototype - funcio asociada a un tipo de objeto
// Crear funciones que solamente son utilizadas en un objeto en especifico.

Cliente.prototype.formatearCliente = function() { //solo se usa para la clase cliente
    return `El Cliente ${this.nombre} ${this.apellido}`;
}

Producto.prototype.formatearProducto = function() { // solo se usa para la clase producto
    return `El Producto ${this.nombre} tiene un precio de: $ ${this.precio}`;
}

const producto1 = new Producto('Monitor"', 700);
const producto2 = new Producto('Laptop', 300);
const cliente = new Cliente('Kevin', 'Medina');

console.log(producto1);
console.log(producto2);
console.log(producto1.formatearProducto());
console.log(producto2.formatearProducto());