<h1 class="nom-pagina">Login</h1>
<p class="descripcion-pagina">Ingresa con tus datos</p>

<form class="formulario" method="POST" action="/">
    <div class="campo">
        <label for="email">Correo</label>
        <input type="email" id="email" placeholder="Escribe tu correo" name="email">
    </div>
    <div class="campo">
        <label for="password">Contraseña</label>
        <input type="password" id="password" placeholder="Escribe tu contraseña" name="password">
    </div>
    <input type="submit" class="boton" value="Iniciar Sesion">
</form>

<div class="acciones">
    <a href="/crearCuenta">¿Aún no tienes una cuenta? Crea una</a>
    <a href="/olvide">¿Olvidaste tu contraseña?</a>
</div>