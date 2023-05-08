<?php include 'includes/header.php';

//comparadores
$n1 = 3;
$n2 = 2;
$n3 = 2;
$n4 = "2";

var_dump($n1 < $n2);
echo "<br>";

var_dump($n1 > $n2);
echo "<br>";

var_dump($n1 >= $n2);
echo "<br>";

var_dump($n1 <= $n2);
echo "<br>";

var_dump($n3 == $n2);
echo "<br>";

//notar que n4 es string y esto devuelve true
var_dump($n4 == $n2);
echo "<br>";

var_dump($n4 === $n2);
echo "<br>";

var_dump($n1 <=> $n2);// -1 si izq < der / 0 izq = der / 1 izq > der
echo "<br>";
var_dump($n2 <=> $n1);// -1 si izq < der / 0 izq = der / 1 izq > der
echo "<br>";
var_dump($n2 <=> $n3);// -1 si izq < der / 0 izq = der / 1 izq > der
echo "<br>";


include 'includes/footer.php';