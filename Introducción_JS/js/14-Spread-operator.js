const producto = {
    nombre: "Monitor",
    precio: 20,
    disponible: true
};

const medidas = {
    peso: "2kg",
    medida: "1m"
}

const nuevoProducto = {...producto, ...medidas}; //une ambos objetos
console.log(producto);
console.log(nuevoProducto);