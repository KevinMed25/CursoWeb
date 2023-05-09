<?php include 'includes/header.php';

// Arreglos asosiativos
$cliente = [
    "nombre" => "Kevin",
    "saldo" => 200,
    "informacion" => [
        "tipo"=> "premium",
        "disponible "=> true
    ]
];

echo "<pre>";//aplica mejor formato
var_dump($cliente);
echo "</pre>";

echo "<pre>";//aplica mejor formato
var_dump($cliente["nombre"]);
echo "</pre>";

echo "<pre>";//aplica mejor formato
echo $cliente["nombre"];
echo "</pre>";

echo "<pre>";//aplica mejor formato
var_dump($cliente["informacion"]["tipo"]);
echo "</pre>";

//agregar nuevo elemento
$cliente["codigo"]= 123456789;
echo "<pre>";//aplica mejor formato
var_dump($cliente);
echo "</pre>";

include 'includes/footer.php';