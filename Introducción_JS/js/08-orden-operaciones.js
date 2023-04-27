// Orden de las operaciones
//Se respeta la jerarquía de operaciones... .-.

let resultado;

resultado = (20 + 30)/2;
console.log(resultado);

// Incrementos:

let score = 10;
score++; //11
console.log(score);
//console.log(score++) --> aqui imprimiria el valor previo, y despues aumentaria en uno
console.log(++score); // asi deeria ser...
console.log(--score); //decrementar

score += score;
console.log(score);