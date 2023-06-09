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

    //para validar el tipo de contenido:
    function validarContenido($tipo) {
        $tipos = ['propiedad', 'vendedor'];
        return in_array($tipo, $tipos);
    }

    //mostrar msjs
    function mostrarNotificacion($codigo) {
        $mensaje = '';
        switch($codigo) {
            case 1:
                $mensaje = 'Creado Correctamente!';
                break;
            case 2:
                $mensaje = 'Actualizado Correctamente!';
                break;
            case 3:
                $mensaje = 'Eliminado Correctamente!';
                break;
            default:
                $mensaje = false;
                break;
        }
        return $mensaje;
    }