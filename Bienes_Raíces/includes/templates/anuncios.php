<?php 
    $db = conectarDB();

    $query = "SELECT * FROM propiedades LIMIT {$limite}";
    $resultado = mysqli_query($db, $query);

?>

<div class="contenedor-anuncios">
    <!-- Seccion de anuncions dinámica -->
    <?php while($propiedad = mysqli_fetch_assoc($resultado)): ?>
        <div class="anuncio">
           
            <img loading="lazy" src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="anuncio">
            
             <div class="contenido-anuncio">
                <h3><?php echo $propiedad['titulo']; ?></h3>
                <p>
                    <?php echo $propiedad['descripcion']; ?>
                </p>
                <p class="precio">
                    <?php echo $propiedad['precio']; ?>
                </p>
                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono-dm" loading="lazy" src="build/img/icono_wc.svg" alt="icono WC">
                        <p><?php echo $propiedad['wc']; ?></p>
                    </li>
                    <li>
                        <img class="icono-dm" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                        <p><?php echo $propiedad['estacionamiento']; ?></p>
                    </li>
                    <li>
                        <img class="icono-dm" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono dormitorio">
                        <p><?php echo $propiedad['habitaciones']; ?></p>
                    </li>
                </ul>
                <a class="boton-amarillo-block" href="anuncio.php?id=<?php echo $propiedad['id']; ?>">Ver Propiedad</a>
            </div>
        </div>
    <?php endwhile; ?>
</div>
<?php 
    mysqli_close($db);
?>