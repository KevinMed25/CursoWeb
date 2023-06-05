<?php

    define('TEMPLATES_URL', __DIR__.'/templates');
    define('FUNCIONES_URL', __DIR__.'funciones.php');
    define('CARPETA_IMAGENES', __DIR__.'/../imagenes/');

    function incluirTemplate(string $nombre, bool $principal = false) {
        include TEMPLATES_URL."/$nombre.php";
    }

    function isAuth() : void {
        session_start();

        if(!$_SESSION['login']) {
            header('Location: /');
        }
    }

    function debug($var) {
        echo "<pre>";
        var_dump($var);
        echo "<pre>";
        exit;
    }

    //Escapar/sanitizar HTML
    function healt($html) {
        $s = htmlspecialchars($html);
        return $s;
    }