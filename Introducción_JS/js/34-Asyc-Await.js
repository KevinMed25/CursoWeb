
// Async - Await

function descargarNuevosClientes() {
    return new Promise( resolve => { //forzamos a que se cumpla
        console.log('Descargando clientes...');

        setTimeout( () => {  // Esto es como un sleep -- también existe setInterval, este se repite en el intervalo definido,setTimeout solo una vez
            resolve('Los clientes fueron descargados :D'); 
        }, 5000 );
    });
}

async function app() {
   try {
       const result = await descargarNuevosClientes(); //Cualquier código por debajo del await se ejecutara despues de que este se ejecute
       console.log(result); //depende de la ejecucion del await
    } catch (error) {
       console.log(error);
    }
}

app();
