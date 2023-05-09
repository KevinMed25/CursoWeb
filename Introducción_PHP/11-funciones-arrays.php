<?php include 'includes/header.php';

$carrito = ["laptop", "telefono", "pc"];

// in_array -> sirve para buscar elementos en un array
var_dump(in_array("tablet", $carrito));//false
var_dump(in_array("pc", $carrito));//true
echo "<br>";

//Ordenar elementos de un array
$num = [1,4,6,7,3,9,7,3];
sort($num); //menor a mayor
rsort($num); // mayor a menor

echo "<pre>";
var_dump( $num);
echo "<pre>";

//ordenar array asociativo
$cliente = [
    "saldo" => 2000,
    "tipo" => "cansado",
    "nombre" => "kevin"
];

echo "<pre>";
var_dump( $cliente);
echo "<pre>";

asort($cliente); //ordena por valores a-z
arsort($cliente); // ordena por valores z-a
ksort($cliente); // ordena alf por llaves a-z
krsort($cliente); //orden alf al reves z-a

echo "<pre>";
var_dump( $cliente);
echo "<pre>";


include 'includes/footer.php';