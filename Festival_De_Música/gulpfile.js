function tarea (done) {
    console.log("Mi primera tarea :0");
    done(); // esto es un callback, una funcion que se llama despues de otra función
    //es una forma antigua de tener código asincrono 
    // cuando se manda a llamar la funcion, indica que ya termino de ejecutarse
}

exports.tarea = tarea;