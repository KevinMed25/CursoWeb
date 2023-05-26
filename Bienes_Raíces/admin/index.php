<?php
    require '../includes/funciones.php';
    incluirTemplate('header',$principal = true);
?>

    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raíces</h1>
        <a href="/admin/propiedades/crear.php" class="boton boton-verde"> Nueva Propiedad</a>
    </main>

<?php 
    incluirTemplate('footer');
?>