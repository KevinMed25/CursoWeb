<h1 class="nom-pagin">Recuperar Contraseña</h1>
<p class="descripcion-pagina">Escribe una nueva contraseña</p>

<?php include_once __DIR__. "/../templates/alertas.php"; ?>

<?php if($error) return; ?>

<form class="formulario" method="POST">
    <div class="campo">
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" placeholder="Escribe una nueva contraseña">
    </div>
    <input type="submit" class="boton" value="Guardar">
</form>

<div class="acciones">
    <a href="/">¿Ya tines una cuenta? Inicia sesión</a>
    <a href="/crearCuenta">¿Aún no tines una cuenta? Crea una</a>
</div>