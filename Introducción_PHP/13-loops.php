<?php include 'includes/header.php';

// While loop
$i = 0; // iterador

while($i < 10) {
    echo $i . "<br>";
    $i++; // Incremento
}
echo "<br>";

// Do While
$i = 100;
do {
    echo $i . "<br>";
    $i++;
} while($i < 10);

// Proceso FIZZ BUZZ
//   3 imprimir Fizz
//   5 imprimir Buzz
//   3 y 5 Imprimir FIZZ BUZZ
//  

// For loop  
//(podemos usar iF: como en python) se puede hacer en for y foreach y en if, elif, else.
for($i = 1; $i < 100; $i++ ):
    if($i % 3 === 0 && $i % 5 === 0):
        echo $i . " - FIZZ BUZZ <br/>";
    elseif($i % 3 === 0):
        echo $i . " - Fizz <br/>";
    //elseif debe ir pegado en sintaxis con : en ves de {}
    elseif($i % 5 === 0 ):
        echo $i . " - Buzz <br/>";
    else:
        echo $i . "<br/>";
    endif; //cuando usamos ":"
endfor;


// For each
$clientes = array('Pedro', 'Juan', 'Karen');

foreach( $clientes as $cliente ):
    echo $cliente . '<br/>';
endforeach;

//For eeach para array asociativos
$cliente = [
    'nombre' => 'kevin',
    'saldo' => 2000,
    'tipo' => 'Premium'
];

foreach( $cliente as $key => $valor ):
    echo $key . " - " . $valor . '<br/>';
endforeach;

include 'includes/footer.php';