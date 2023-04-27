
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


const producto1 = new Producto('Monitor Curvo de 49"', 700);
const producto2 = new Producto('Laptop', 300);
const cliente = new Cliente('Kevin', 'Medina');


console.log(producto1);
console.log(producto2);
