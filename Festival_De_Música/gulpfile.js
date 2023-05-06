// function tarea (done) {
//     console.log("Mi primera tarea :0");
//     done(); // esto es un callback, una funcion que se llama despues de otra función
//     //es una forma antigua de tener código asincrono 
//     // cuando se manda a llamar la funcion, indica que ya termino de ejecutarse
// }

// exports.tarea = tarea;


// ** TAREAS PARA COMPILAR SASS **//

const {src , dest , watch , parallel} = require( "gulp" );

// src -> sirve para identificar un archivo
// dest -> para guardarlo
// watch -> registra cambios en tiempo real
//parallel -> todas las funciones las ejecuta al mismo tiempo

const plumber = require("gulp-plumber") //nos permite que al tener algun error no se detenga el workflow
const sass = require("gulp-sass")(require("sass")); //conectar sass con gulp

function css(done) {
    // Identificar el archivo SASS // Compilarlo // Almacena 
    // src("src/scss/app.scss").pipe(sass()).pipe(dest("build/css"));
    src("src/scss/**/*.scss") // Identificar el archivo SASS //
        .pipe(sourcemaps.init()) //inicializamos sourcemaps
        .pipe(plumber()) // modificacion para registrar cambios en todas las carpetas
        .pipe(sass()) // Compilarlo
        .pipe(postcss([autoprefixer(), cssnano()])) //mejoras
        .pipe(sourcemaps.write(".")) //guarda y escribe sourcemaps
        .pipe(dest("build/css")); // Almacena 
    done(); // callback que avisa cuando se llega al final
}

function dev(done) {
    // watch("src/scss/app.scss", css);
    watch("src/scss/**/*.scss", css);
    watch("src/js/**/*.js", JavaScript);
    done();
}

//COnvertir img a webp:
const webp = require("gulp-webp");
function convertirWebp (done) {
    const opciones = {
        quality: 50
    }
    src("src/img/**/*.{png,jpg}").pipe(webp(opciones)).pipe(dest("build/img"))

    done();
}

// Optimizacion de imagenes con gulp imagemin
const cache = require("gulp-cache");
const imagemin = require("gulp-imagemin");

function img(done) {

    const opciones = {
        optimizationLevel: 3
    }

    src("src/img/**/*.{png,jpg}").pipe( cache(imagemin(opciones))).pipe( dest("build/img"));
    done();
}

// formato avif
const avif = require("gulp-avif");

function convertirAvif (done) {
    const opciones = {
        quality: 50
    }
    src("src/img/**/*.{png,jpg}").pipe(avif(opciones)).pipe(dest("build/img"))

    done();
}

// JavaScript
function JavaScript(done) {
    src("src/js/**/*.js")
        .pipe(sourcemaps.init()) // creamos sourcemap
        .pipe(terser()) //aplicamos terser (comprimir codigo)
        .pipe(sourcemaps.write(".")) // escribe el map
        .pipe(dest("build/js"));//almacena
    done();
}

//Comprimir css y mejoras
const autoprefixer = require("autoprefixer"); //se asegura de que funcione en todos los navegadores, por soporte
const cssnano = require("cssnano"); // comprime codigo css
const postcss = require("gulp-postcss"); // hace tranformaciones con los anteiores?
const sourcemaps = require("gulp-sourcemaps"); // source map

// Compimir JS con terser
const terser = require("gulp-terser-js");

//exports.como se llamará en consola = funcion
exports.css = css;
// exports.dev = dev;
exports.convertirWebp = convertirWebp;
exports.convertirAvif = convertirAvif;
exports.img = img;
exports.js = JavaScript; //añadimos js a build
exports.dev = parallel(img, convertirWebp, convertirAvif, JavaScript, dev);




