
<?php 
    if(!isset($_SESSION)) {
        session_start();//verfiicar si la session ya existia, si no, inicia
    }
    $auth = $_SESSION['login'] ?? false;

    if (!isset($principal)) {
        $principal = false;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raíces</title>
    <link rel="stylesheet" href="../build/css/app.css">
</head>
<body>
   
    <header class="header <?php echo $principal ? 'principal' : ''; ?>">
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
                        <a href="/nosotros">Nosotros</a>
                        <a href="/propiedades">Anuncios</a>
                        <a href="/blog">Blog</a>
                        <a href="/contacto">Contacto</a>
                        <?php if($auth): ?>
                            <a href="/logout">Cerrar Sesión</a>
                        <?php else: ?>
                            <a href="/login">Administrador</a>
                        <?php endif; ?>
                    </nav>
                </div>
            </div>
            
            <?php if($principal) { ?>
                <h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>
            <?php }; ?>

        </div>
        
    </header>

    <?php echo $contenido ?>

    <footer class=" footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="/nosotros">Nosotros</a>
                <a href="/propiedades">Anuncios</a>
                <a href="/blog">Blog</a>
                <a href="/contacto">Contacto</a>
            </nav>
        </div>

        <p class="copyright"> Todos los Derechos Reservados <?php echo date('Y')?> &copy;</p>

    </footer>
    <script src="../build/js/bundle.min.js"></script>
</body>
</html>