<?php include 'includes/header.php';

$autenticado = true;
$admin = true;

// estrcuctura If

if($autenticado && $admin ) {
    echo "Usuario autenticado";
} else {
    echo "No autenticado";
}

// If anidados
$cliente = [
    'nombre' => 'Kevin',
    'saldo' => 0,
    'informacion' => [
        'tipo' => 'Premium'
    ]
];

echo "<br>";

if( !empty($cliente) ) {
    echo "El Arreglo de cliente no esta vacio";

    if($cliente['saldo'] > 0) {
        echo "<br>";
        echo "El Cliente tiene saldo disponible";
    } else {
        echo "<br>";
        echo "No hay saldo";
    }
}

echo "<br>";

// else if
if($cliente['saldo'] > 0 ) {
    echo "El cliente tiene saldo";
} else if ($cliente['informacion']['tipo'] === 'Premium') {
    echo "El cliente es Premium";
} else {
    echo "O no hay cliente definido o no tiene saldo o no es premium";
}

// Switch.
echo "<br>";

$tecnologia = 'PHP';

switch ($tecnologia) {
    case 'PHP':
        echo "que bien";
        break;
    case 'JavaScript':
        echo "lo mejor que puedes hacer";
        break;
    case 'HTML':
        echo 'si piensas que e sun lenguaje?';
        break;
    default:
        echo "Algún lenguaje...";
        break;
}




include 'includes/footer.php';