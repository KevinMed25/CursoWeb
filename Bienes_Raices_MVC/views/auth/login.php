<main class="contenedor seccion contenido-centrado">
    <h1 class="negritas">Inicio de Sesión</h1>

    <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form method="POST" class="formulario" action="/login">
        <fieldset>
            <legend>Email y Contraseña</legend>

            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Escriba su correo" id="email">

            <label for="password">Contraseña</label>
            <input type="password" name="password" placeholder="Escriba su contraseña" id="password">
        </fieldset>
        <input type="submit" class="boton boton-verde" value="Iniciar Sesión">
    </form>
</main>