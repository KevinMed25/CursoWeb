<main class="contenedor seccion">
    <h1 class="negritas">Actualizar Vendedor</h1>
    <a href="/admin" class="boton boton-verde"> Volver </a>
        
    <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
        
    <form method="POST" class="formulario">
        <?php include 'formulario.php'; ?>
        <input type="submit" value="Actualizar Vendedor" class="boton  boton-verde">
    </form>
</main>