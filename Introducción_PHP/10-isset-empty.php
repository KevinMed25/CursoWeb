<?php include 'includes/header.php';

$clientes = [];
$clientes2 = array();
$cliente3 = array("Kevin", "Alejandro", "Angel");
$cliente = [
    "nombre" => "Kevin",
    "saldo" => 20
];

//Emty - devuelve True si un array esta vacio
var_dump(empty($clientes));
var_dump(empty($cliente3));

//Isset - Revisar si un array esta creando o una propiedad esta definida 
echo "<br>";
var_dump( isset($nodefinido));
var_dump( isset($cliente3));
echo "<br>";
var_dump(isset($cliente["nombre"]));
var_dump(isset($cliente["apellido"]));


include 'includes/footer.php';