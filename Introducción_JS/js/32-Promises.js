
// Promises 
/**
 * En los Promises existen 3 tipos de valores
 *      Pending : No se ha cumplido pero tampoco se ha rechazado
 *      Fulfilled : Ya se cumplio
 *      Rejected : Se ha rechazado o no se pudo cumplir
 */

const usuarioAutenticado = new Promise( (resolve, reject) => {
    const auth = true;

    if(auth) {
        resolve("Usuario Autenticado"); // el promise se cumple
    } else {
        reject("No se pudo iniciar sesión"); // el promise no se cumple
    }
});

console.log(usuarioAutenticado); // para ver el estado del promise

usuarioAutenticado
    .then( resultado => console.log(resultado)) //se hizo el promise.. entonces
    .catch( error => console.log(error))

