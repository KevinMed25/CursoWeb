// Arreglos

const numeros = [1,2,3,4];
// console.log(numeros);
console.table(numeros);

const mes = new Array("Sep", "oct", "nov", "dic");
// console.log(mes);
console.table(mes);

// // Acceso:
// console.log(mes[0]);

// // Extension de un arreglo
// console.log(numeros.length);

// mes.forEach( function(mes) {
//     console.log(mes);
// })

numeros[5]= 5; // se salta hasta el indice cinco, el indice 4 queda vacio (comienza en 0)
numeros.push(10); //agrga al final
numeros.push(11);
numeros.pop(); //elimina el ultimo elemento del arreglo

//agregar al inicio del arreglo:
numeros.unshift(-1,-2,-3)
numeros.shift(); // Elimina el primer elemento
console.table(numeros); 

mes.splice(2,1); // (el indice al que debe llegar, cantidad de elementos a borrar)
console.table(mes); // borra nov

// ARRAY METHODS

// Arreglo de objetos:
const carrito = [
    { nombre : "monitor" , precio: 20 },
    { nombre : "television" , precio: 21 },
    { nombre : "telefono" , precio: 22 },
    { nombre : "audifonos" , precio: 23 },
    { nombre : "taclado" , precio: 24 },
    { nombre : "mouse" , precio: 25 },
]

//includes 
const meses = new Array("enero", "febrero", "marzo", "abril");
let result = meses.includes("marzo");
console.log(result)

//forEach 
meses.forEach(function(meses){
    if (meses == "marzo"){
        console.log("Marzo existe")
    }
})

//Some ideal para arreglo de objetos
result = carrito.some(function(producto){
    return producto.nombre === "telefono"
})
console.log(result);

//Lo mismo pero con arrow function
result = carrito.some(producto => producto.nombre === "telefono");
console.log(result);

// Reduce
result = carrito.reduce(function(total, producto){
    return total + producto.precio
},0);
console.log(result);

//Filter 
result = carrito.filter(function(producto){
    return producto.precio < 22 // podemos usar cualquier condicion
})
console.log(result);

result = carrito.filter(function(producto){
    return producto.nombre != "telefono" // podemos usar cualquier condicion
})
console.log(result);