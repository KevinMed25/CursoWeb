<?php include 'includes/header.php';

// Creacion de funciones: (int $num1 = 0  tenemos valor por defecto 0)
//aqui podemos usar tipado "int" fuerte
function sumar1(int $num1 = 0 , int $num2 ) {
    echo $num1 + $num2;
}
//llamando funciones:
sumar1(20, 3);
sumar1(num2:20, num1:3); //podemos mandar parametros nombrados


// Podemos pasar varios tipos de datos... (aqui lo puse asi pq solo era ver que el lenguaje acepte el parametro)
// function sumar2(int $num1 = 0, array $num2 ) {
//     echo $num1 + $num2;
// }

//Esta funcion realiza la suma correctamente 
function sumar2(int $num1 = 0, array $num2 = []) {
    foreach ($num2 as $numero){
        $num1 += $numero;
    }
    return $num1; //lo que hace es un acumulado, el primer valor (el de num1) se suma y se acumula en cada iteración 
}

echo sumar2(1, [6]);

include 'includes/footer.php';