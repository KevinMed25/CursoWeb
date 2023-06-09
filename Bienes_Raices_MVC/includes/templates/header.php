<?php 
    if(!isset($_SESSION)) {
        session_start();//verfiicar si la session ya existia, si no, inicia
    }
    $auth = $_SESSION['login'] ?? false;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raíces</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
    <header class="header <?php echo $principal? 'principal' : '' ?>">
        <div class=" contenedor contenido-header">
            <div class="barra">
                <a href="/index.php">
                    <img src="/build/img/logo.svg" alt="img logo bienes raíces">
                </a>

                <!-- menu -->
                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="menu">
                </div>

                <!-- darkmode -->
                <div class="derecha">
                    <img class="dark-mode-boton" src="/build/img/dark-mode.svg" alt="dark mode">
                    <nav class="navegacion">
                        <a href="/nosotros.php">Nosotros</a>
                        <a href="/anuncios.php">Anuncios</a>
                        <a href="/blog.php">Blog</a>
                        <a href="/contacto.php">Contacto</a>
                        <?php if($auth): ?>
                            <a href="/cerrar-sesion.php">Cerrar Sesión</a>
                        <?php else: ?>
                            <a href="/login.php">Administrador</a>
                        <?php endif; ?>
                    </nav>
                </div>
            </div>

            <?php if($principal) { ?>
                <h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>
            <?php }; ?>

        </div>
        
    </header>