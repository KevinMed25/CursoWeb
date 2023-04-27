
// Fetch API 
// Sirve para consumir información

async function obtenerEmpleados() {

    const archivo = "Datos_Empleados.json";
/*
    fetch(archivo)
        .then( resultado => resultado.json()) // retornamos resultado como json
        // .then( resultado => resultado.text()) // retornamos resultado como text
        .then( datos => {
            // console.log(datos.empleados); //para acceder a los empleados... o:
           
            const { empleados } = datos;
            //console.log(empleados);
           
            empleados.forEach(empleados => {
                // console.log(empleados);
                console.log(empleados.id);
                console.log(empleados.nombre);
                console.log(empleados.puesto);

                //para mostrar en el html:
                // document.querySelector(".contenido").textContent = empleados.nombre
            });
        });
*/
        //Resulta mas rapido usar async await que promises
    const resultado = await fetch(archivo); //Usar fetch API con async
    const datos = await resultado.json();
    console.log(datos);
}
obtenerEmpleados();