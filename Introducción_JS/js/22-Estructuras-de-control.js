
const puntaje = "1000";

if (puntaje == 1000){ 
    console.log("El puntaje es 1000");
} // En este caso entra en la condicion sin importar el tipo de variable

if (puntaje === 1000){ 
    console.log("El puntaje es 1000");
} else {
    console.log("El tipo de variable no es igual")
}// el triple === es más estricto, este si respeta el tipo de dato, plt no entra al if

if (puntaje !== 1000){ 
    console.log("El tipo de variable tampoco es igual");
}// sucede lo mismo con !== doble igual con != no importaria el tipo de dato

const carrito = 8000;
const saldo = 1000;

if (carrito < saldo) {
    console.log("Puedes pagar");
} else {
    console.log("No puedes pagar")
}

const rol = 'VISITANTE';

if(rol === 'ADMINISTRADOR') {
    console.log('Acceso a todo el sistema');
} else if(rol === 'EDITOR') {
    console.log('Eres editor, puedes entrar pero no puedes hacer mucho')
} else {
    console.log('No tienes acceso')
}