// Métodos de propiedad
const reproductor = {
    reproducir : function(nombreCancion) {
        console.log(`Reproduciedo: ${nombreCancion}`);
    },

    pausar: function() {
        console.log("En Pausa...")
    },

    crearPlaylist: function(nombre){
        console.log(`Creando la Playlist: ${nombre}`);
    },

    reproducirPlaylist: function(nombre){
        console.log(`Reproduciendo la Playlist: ${nombre}`);
    }
}

reproductor.reproducir("Master of Puppets"); // se llaman con .
reproductor.pausar();

//se puede hacer lo mismo que en los objetos normales
//crear funciones a fuera...
reproductor.borrarCancion = function(nombreCancion) {
    console.log(`Eliminando la canción: ${nombreCancion}`)
}

reproductor.borrarCancion("Master of Puppets");
reproductor.crearPlaylist("Musiquita");
reproductor.reproducirPlaylist("Musiquita");