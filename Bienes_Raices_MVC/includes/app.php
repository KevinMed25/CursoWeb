<?php

    require 'funciones.php';
    require 'config/database.php';
    require __DIR__.'/../vendor/autoload.php';

    use Model\ActiveRecord;

    //conectar a db
    $db = conectarDB();

    new ActiveRecord;
    ActiveRecord::setDb($db);

?>