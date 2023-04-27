
// Async - Await

function descargarNuevosClientes() {
    return new Promise( resolve => { //forzamos a que se cumpla
        console.log('Descargando clientes...');

        setTimeout( () => {  // Esto es como un sleep -- también existe setInterval, este se repite en el intervalo definido,setTimeout solo una vez
            resolve('Los clientes fueron descargados :D'); 
        }, 5000 );
    });
}

function descargarUltimosPedidos() {
    return new Promise( resolve => {
        console.log('Descargando pedidos...');

        setTimeout( () => {
            resolve('Los pedidos fueron descargados :D');
        }, 3000 );
    });
}

async function app() {
   try {
    // esto esta mal pq no se pueden ejecutar a la vez los dos await...
    //    const clientes = await descargarNuevosClientes(); //Cualquier código por debajo del await se ejecutara despues de que este se ejecute
    //    const pedidos = await descargarUltimosPedidos();
    //    console.log(clientes); //depende de la ejecucion del await
    //    console.log(pedidos);

    const resultado = await Promise.all([ descargarNuevosClientes(), descargarUltimosPedidos()]); // esto permite ejecutar los dos await al mismo tiempo
    // descargar pedidios se deberia ejecutar primero
    // lo imprimimos asi para que no salga como arreglo
    console.log(resultado[0]);
    console.log(resultado[1]);

    } catch (error) {
       console.log(error);
    }
}

app();