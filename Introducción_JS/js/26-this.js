
// This -- funciona igual que todos...
const reservacion = {
    nombre: 'Kevin',
    apellido: 'Med',
    total: 1000,
    pagado: false,
    informacion: function() { // este hace referencia al objeto sobre el cual se ejecuta
        console.log(`El Cliente ${this.nombre} reservó y su pago es de ${this.total}`);
    } //si fuera arrow funtion hace referencia hacia la ventana global
}

window.nombre = "algo"
const reservacion3 = {
    nombre: 'Kevin',
    informacion: () => { // este hace referencia al objeto sobre el cual se ejecuta
        console.log(`${this.nombre}`);
    } //si fuera arrow funtion hace referencia hacia la ventana global
}

const reservacion2 = {
    nombre: "Alejandro",
    apellido: "Padilla",
    total: 1000,
    pagado: false,
    informacion: function() {
        console.log(`El Cliente ${this.nombre} reservó y su pago es de ${this.total}`);
    }
}

reservacion.informacion();
reservacion2.informacion();
reservacion3.informacion();