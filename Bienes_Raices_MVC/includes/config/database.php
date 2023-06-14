<?php

function conectarDB() : mysqli {
    $db = new mysqli('localhost', 'root', '', 'bienes_raices_crud' , 3306);
    $db->set_charset("utf8");

    if(!$db) {
        echo "Error, no se pudo realizar la conexión!";
        exit;
    } 

    return $db;
}