// document hace referencia a todo el html

const boton = document.querySelector('#boton'); 

boton.addEventListener("click", () => { //permite registrar un evento a un boton con ID boton
    Notification.requestPermission()
        .then(resultado => console.log(`El resultado es ${resultado}`) )
})

if(Notification.permission == "granted") {
    new Notification("Esta es una notificación", {
        icon: "img/ccj.png", //
        body: "descripcion aqui"
    })
}