<?php include 'includes/header.php';

$name = "           kevin   Alejandro";

echo strlen($name); //tamaño del string
echo "<br>";
var_dump($name); // este igual 
echo "<br>";

//eliminar espacios en blanco
$texto = trim($name);
echo strlen($texto);
echo "<br>";

//mayusculas
echo strtoupper($texto);
echo "<br>";

//minusculas:
echo strtolower($texto);
echo "<br>";

$mail1 = "corre@correo.com";
$mail2 = "Corre@correo.com";
var_dump(strtolower($mail1) == strtolower($mail2));
echo "<br>";

//reemplazar caracter
$name2= "Kevin Medina";
echo str_replace("Kevin", "Alejandro", $name2);
echo "<br>";

//ver si un str existe
echo strpos($name2, "Medina");
echo "<br>";
echo strpos($name2, "Alejandro");
echo "<br>";

//concatenar
echo "nombre: " . $name;
echo "<br>";
echo $name . $name2;
echo "<br>";

echo "La edad de " . $name . " es: " . 2;
echo "<br>";
echo "La edad de {$name} es: 2";

include 'includes/footer.php';