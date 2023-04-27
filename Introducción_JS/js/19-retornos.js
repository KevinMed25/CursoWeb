function sumar(n1, n2) {
    return n1 + n2
}
const result = sumar(1,1);
console.log(result);

let total = 0;

function agregarCarrito(precio) {
    return total += precio;
}
function calcularImpuesto(total) {
    return total * 1.15;
}


total = agregarCarrito(200);
console.log(total);
total = agregarCarrito(400);
console.log(total);

const totalPagar = calcularImpuesto(total);
console.log("Total a pagar con impuestos: " + totalPagar);