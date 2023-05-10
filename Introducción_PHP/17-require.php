<?php include 'includes/header.php';

//requiere se utiliza cunado se trengan funciones criticas como ua conexion a bases de datos
// usar include para incluir otros tamplates 

//includ (si no encuntra el archivo, todo sigue en ejecucion)
//require (si no encuentra el archivo detiene la ejecucion)

require "funciones.php";
iniciarApp();


include 'includes/footer.php';