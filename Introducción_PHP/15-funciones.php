<?php include 'includes/header.php';

// Creacion de funciones: (int $num1 = 0  tenemos valor por defecto 0)
//aqui podemos usar tipado "int" fuerte
function sumar1(int $num1 = 0 , int $num2 ) {
    echo $num1 + $num2;
}
//llamando funciones:
sumar1(20, 3);
sumar1(num2:20, num1:3); //podemos mandar parametros nombrados


// Podemos pasar varios tipos de datos...
function sumar2(int $num1 = 0, array $num2 ) {
    echo $num1 + $num2;
}
sumar2(1, [3]);

include 'includes/footer.php';