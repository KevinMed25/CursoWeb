<h1 class="nom-pagina">Crear Cuenta</h1>
<p class="descripcion-pagina">Llena el formulario para crear una cuenta:</p>

<form class="formulario" method="POST" action="/crearCuenta">
    <div class="campo">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" placeholder="Escribe tu nombre" name="nombre">
    </div>
    <div class="campo">
        <label for="apellido">Apellido</label>
        <input type="text" id="apellido" placeholder="Escribe tu apellido" name="apellido">
    </div>
    <div class="campo">
        <label for="telefono">Teléfono</label>
        <input type="tel" id="telefono" placeholder="Escribe tu teléfono" name="telefono">
    </div>
    <div class="campo">
        <label for="email">Correo</label>
        <input type="email" id="email" placeholder="Escribe tu correo" name="email">
    </div>
    <div class="campo">
        <label for="password">Contraseña</label>
        <input type="password" id="password" placeholder="Escribe una contraseña" name="password">
    </div>

    <input type="submit" value="Crear Cuenta" class="boton">
</form>

<div class="acciones">
    <a href="/">¿Ya tienes una cuenta? Inicia sesión</a>
    <a href="/olvide">¿Olvidaste tu contraseña?</a>
</div>