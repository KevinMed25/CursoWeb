<?php

    require 'funciones.php';
    require 'config/database.php';
    require __DIR__.'/../vendor/autoload.php';

    use App\Propiedad;

    //conectar a db
    $db = conectarDB();

    $propiedad = new Propiedad();
    $propiedad::setDb($db);

?>