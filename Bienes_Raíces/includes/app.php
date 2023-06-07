<?php

    require 'funciones.php';
    require 'config/database.php';
    require __DIR__.'/../vendor/autoload.php';

    use App\ActiveRecord;

    //conectar a db
    $db = conectarDB();

    new ActiveRecord;
    ActiveRecord::setDb($db);

?>