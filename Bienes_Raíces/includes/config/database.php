<?php

function conectarDB() : mysqli {
    $db = new mysqli('localhost', 'root', 'root', 'bienes_raices_crud');

    if(!$db) {
        echo "Error, no se pudo realizar la conexión!";
        exit;
    } 

    return $db;
}