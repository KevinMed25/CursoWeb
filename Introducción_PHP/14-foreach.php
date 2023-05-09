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

//es mejor usar html de esta forma
foreach( $productos as $producto) { ?> <!-- termina php-->
    <li>
        <p>Producto: <?php echo $producto['nombre']; ?> </p>
        <p>Precio: <?php echo "$" . $producto['precio']; ?> </p>
        <p><?php echo ($producto['disponible']) ? 'Disponible' : 'No Disponible';  ?> </p> // operador ternario
    </li>
    <?php //comienza php
}

include 'includes/footer.php';