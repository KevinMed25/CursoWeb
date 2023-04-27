
// CLASES

//el archivo no se debe de llamar igual a la clase "obligatoriamente"
class Producto {
    constructor(nombre, precio) {
        this.nombre = nombre;
        this.precio = precio;
    }
    formatearProducto() {
        return `El Producto ${this.nombre} tiene un precio de: $ ${this.precio}`;
    }
    getPrecioProducto(){
        return `El precio del producto es: ${this.precio}`
    }
}

const producto1 = new Producto('Monitor"', 700);
const producto2 = new Producto('Laptop', 300);

console.log(producto1);
console.log(producto2);
console.log(producto1.formatearProducto());
console.log(producto2.formatearProducto());
console.log(producto2.getPrecioProducto());
