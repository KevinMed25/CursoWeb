<?php

function debug($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Escapa / Sanitizar el HTML
function healt($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

//funcion que revisa autenticacion
function isAuth() : void {
    if(!isset($_SESSION['login'])) {
        header('Location: /');
    }
}