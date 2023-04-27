// En declaracion de la funcion no se puede

//En expresion de la funcion si... con const
// const sumar2 = function (uno, dos){
//     console.log(uno + dos)
// }

// sumar2(1,2);

// Arrow Functions

const sumar2 = (uno, dos) => console.log(uno + dos); // cuando la funcion es solo una linea se puede eliminar las llaves 

sumar2(1,2);

const aprendiendo = tecnologia => console.log(`Aprendiendo: ${tecnologia}`); // Cuando solo se requiere un parametro igual se pueden quitar los parentesis
aprendiendo("js");


// ARRAY METHODS - usando arrow functions

// Arreglo de objetos:
const carrito = [
    { nombre : "monitor" , precio: 20 },
    { nombre : "television" , precio: 21 },
    { nombre : "telefono" , precio: 22 },
    { nombre : "audifonos" , precio: 23 },
    { nombre : "taclado" , precio: 24 },
    { nombre : "maouse" , precio: 25 },
]

const meses = new Array("enero", "febrero", "marzo", "abril");
let result;

//forEach 
// meses.forEach(function(meses){
//     if (meses == "marzo"){
//         console.log("Marzo existe")
//     }
// })
meses.forEach( mes => {
    if (meses == "marzo"){
        console.log("Marzo existe")
    }
})

// //Some ideal para arreglo de objetos
// result = carrito.some(function(producto){
//     return producto.nombre === "telefono"
// })
// console.log(result);
result = carrito.some( producto => producto.nombre === "telefono"); //reuturn implicito
console.log(result);

// Reduce
// result = carrito.reduce(function(total, producto){
//     return total + producto.precio
// },0);
// console.log(result);
result = carrito.reduce( (total, producto) => total + producto.total, 0)
console.log(result);

//Filter 
// result = carrito.filter(function(producto){
//     return producto.precio < 22 // podemos usar cualquier condicion
// })
// console.log(result);
result = carrito.filter( producto => producto.precio < 22 )
console.log(result);

// result = carrito.filter(function(producto){
//     return producto.nombre != "telefono" // podemos usar cualquier condicion
// })
// console.log(result);
result = carrito.filter( producto => producto.nombre != "telefono" );
console.log(result);