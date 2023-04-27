
// Try - catch

const num1 = 1;
const num3 = 2;

console.log(num1);

try {
    console.log(num2); //como no existe no se ejecuta, tira el error, pero el código sigue
} catch (error) {
    console.log(error);
}

console.log(num3);