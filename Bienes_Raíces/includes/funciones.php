<?php

require 'app.php';

function incluirTemplate(string $nombre, bool $principal = false) {
    include TEMPLATES_URL."/$nombre.php";
}

function isAuth() : bool {
    session_start();
    $autenticado = $_SESSION['login'];

    if($autenticado) {
        return true;
    }

    return false;
}