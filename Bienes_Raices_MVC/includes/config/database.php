<?php

function conectarDB() : mysqli {
    $db = new mysqli('localhost', 'root', '', 'bienes_raices_crud' , 3306);

    if(!$db) {
        echo "Error, no se pudo realizar la conexión!";
        exit;
    } 

    return $db;
}