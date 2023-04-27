// For loop
const condicion = 10;
for (let i = 0; i <= condicion; i++){
    // console.log(i);
    if (i % 2 == 0){
        console.log(i + " es par");
    } else {
        console.log(i+ " es impar")
    }
}

const carrito = [
    { nombre : "monitor" , precio: 20 },
    { nombre : "television" , precio: 21 },
    { nombre : "telefono" , precio: 22 },
    { nombre : "audifonos" , precio: 23 },
    { nombre : "taclado" , precio: 24 },
    { nombre : "mouse" , precio: 25 },
]

for (let i = 0; i <carrito.length; i++){
    console.log(carrito[i]);
}

// While loop
let i = 0;
while(i <= condicion){
    // console.log(i)
    if (i % 2 == 0){
        console.log(i + " es par");
    } else {
        console.log(i+ " es impar");
    }
    i++;
}

// Do While loop
let j = 0;

do {
    console.log(j);
    j++;
} while( j < condicion);