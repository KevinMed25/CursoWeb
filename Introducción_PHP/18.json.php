<?php include 'includes/header.php';

$producto = [
    [
        'nombre' => 'Telefono', 
        'precio' => 240,
        'disponible' => true
    ],
    [
        'nombre' => 'Tv"', 
        'precio' => 300,
        'disponible' => true
    ],
    [
        'nombre' => 'Monitor', 
        'precio' => 100,
        'disponible' => false
    ]
];

echo "<pre>";
var_dump($producto);
echo "</pre>";

$json = json_encode($producto, JSON_UNESCAPED_UNICODE); //convertimos a string//para usar acentos//array-str
$json_array = json_decode($json);//convertimos a arreglo/ str-array

echo "</pre>";
var_dump($json);
echo "</pre>";

echo "</pre>";
var_dump($json_array);
echo "</pre>";

include 'includes/footer.php';