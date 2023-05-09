<?php include 'includes/header.php';

//formas de declarar arreglos

$carrito = [];
var_dump($carrito);
echo "<br>";
$carrito2 = array();
var_dump($carrito2);
echo "<br>";

$carrito = ["Laptop", "telefono", "tablet"];
echo "<pre>";//aplica mejor formato
var_dump($carrito);
echo "</pre>";

//Añadir elemento
$carrito[3] = "Nuevo...";

//Añadir elementos al final del array
array_push($carrito, "con push");

//Añadir elementos al principio
array_unshift($carrito, "con unshif");

echo "<pre>";//aplica mejor formato
var_dump($carrito);
echo "</pre>";

//No existe diferencias en cuanto a lo que que podemos hacer
//y ocmo hacerlo, entre esta sintaxis y la otra
$carrito2 = array("C1", "C2", "C3");
echo "<pre>";//aplica mejor formato
var_dump($carrito2);
echo "</pre>";


include 'includes/footer.php';