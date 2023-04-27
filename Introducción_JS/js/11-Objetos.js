// Objetos 

const nombreProducto = "Monitor";
const precio = 100;
const disponible = true;

const producto = {
    nombre: "monitor",
    precio: 100,
    disponible: true
};

console.log(producto);
//acceder a atributos dle objeto:
console.log(producto.nombre);
console.log(producto["precio"]); // 0-0

producto.descripcion = "se puede hacer esto fuera del constructor";//se le llama constructor?
console.log(producto);

// Eliminar propiedades
delete producto.disponible;
console.log(producto);