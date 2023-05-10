<?php include 'includes/header.php';

// las variables se declaran con $.
$nombre = "Kevin";
$_apellido = "Medina";

echo $nombre;
var_dump($_apellido);

$nombre = "Alejandro";
echo $nombre;

//definir constantes
define("identificador_constante", "este es el valor de la const");
echo identificador_constante;

const constante = "hola" ;
echo constante;

include 'includes/footer.php';