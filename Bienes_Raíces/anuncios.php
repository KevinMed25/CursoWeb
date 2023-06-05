<?php
    require 'includes/app.php';
    incluirTemplate('header');
?>

    <main class="seccion contenedor">
        <h2 class="negritas">Casas y Departamentos en Venta</h2>
        <?php 
            $limite = 9;
            include 'includes/templates/anuncios.php';
        ?>
    </main>

<?php 
    incluirTemplate('footer');
?>