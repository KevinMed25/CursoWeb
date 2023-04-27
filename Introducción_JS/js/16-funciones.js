
// Declaracion de la fucion
sumar(1,2);
function sumar (uno, dos){
    console.log(uno + dos)
}


// sumar2(1,2); este manda error pq esta declarada como variable "const", y no se reconoce hasta ser definida
// Expresion de la funcion
const sumar2 = function (uno, dos){
    console.log(uno + dos)
}

sumar2(1,2);

// IIFE -- estas se mandan a llamar a si mismas
(function() {
    console.log("esto es una funcion");
})();