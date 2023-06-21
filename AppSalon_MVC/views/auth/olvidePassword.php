<h1 class="nom-pagina">Olvide mi contraseña</h1>
<p class="descripcion-pagina">Reestablece tu contraseña llenando estos campos:</p>

<?php include_once __DIR__. "/../templates/alertas.php"; ?>

<form class="formulario" method="POST" action="/olvide">
    <div class="campo">
        <label for="email">Correo</label>
        <input type="email" id="email" placeholder="Escribe tu correo" name="email">
    </div>

    <input type="submit" value="Enviar instrucciones" class="boton">
</form>

<div class="acciones">
    <a href="/">¿Ya tienes una cuenta? Inicia sesión</a>
    <a href="/crearCuenta">¿Aún no tienes una cuenta? Crea una</a>
</div>