// Métodos para Strings

const producto = "monitor";
const producto2 = "teclado";

console.log(producto);
console.log(producto2);

console.log(producto.length); // devuelve el tamaño de la cadena #char
// *investigar*
// los métodos usan .metodo(), el prof dice que .length no lo usa pq más que un método es una propiedad

// indexOf
const existe = "saber si una palabra existe en la cadena"
console.log(existe.indexOf("existe")); // Devuelve la posición de donde comienza la cadena
console.log(existe.indexOf("no-existe")); // si no existe devuelve negativos

// includes (igual que index pero este devuelve un booleano)

console.log(existe.includes("existe")); //true
console.log(existe.includes("no-existe")); //false


