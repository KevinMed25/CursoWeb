<?php
    require 'includes/app.php';
    use App\Propiedad;

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    if(!$id) {
        header('Location: /');
    }

    $propiedad = Propiedad::find($id);

    incluirTemplate('header');
?>


    <main class="contenedor seccion contenido-centrado">
        <h1 class="negritas"><?php echo $propiedad->titulo; ?></h1>
        <img loading="lazy" src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="img de propiedad">
        <div class="resumen-propiedad">
            <p class="precio"> $<?php echo $propiedad->precio; ?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono-dm" loading="lazy" src="build/img/icono_wc.svg" alt="icono WC">
                    <p><?php echo $propiedad->wc; ?></p>
                </li>
                <li>
                    <img class="icono-dm" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p><?php echo $propiedad->estacionamiento; ?></p>
                </li>
                <li>
                    <img class="icono-dm" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono dormitorio">
                    <p><?php echo $propiedad->habitaciones; ?></p>
                </li>
            </ul>
            <p>
                <?php echo $propiedad->descripcion; ?>
            </p>
        </div>
    </main>

<?php 
    incluirTemplate('footer');
?>