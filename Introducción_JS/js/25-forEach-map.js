// ambos sirven para recorrer arreglos

const carrito = [
    { nombre : "monitor" , precio: 20 },
    { nombre : "television" , precio: 21 },
    { nombre : "telefono" , precio: 22 },
    { nombre : "audifonos" , precio: 23 },
    { nombre : "taclado" , precio: 24 },
    { nombre : "mouse" , precio: 25 },
]

// forEach
carrito.forEach( producto => console.log(producto.nombre));

// Map
carrito.map( producto => console.log(producto.nombre));

// El map es utilizado para crear nuevos arreglos

//usando forEach
const array1 = carrito.forEach( producto => producto.nombre); 
//Usando map
const array2 = carrito.map( producto => producto.nombre); //map te crea un nuevo arreglo, forEach no

console.log(array1);// undefined - 
console.log(array2);