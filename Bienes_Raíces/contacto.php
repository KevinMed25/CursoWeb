<?php
    require 'includes/app.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1 class="negritas">Contacto</h1>
        <picture>
            <source srcset="build/img/destacada3.webp" type="imag/webp">
            <source srcset="build/img/destacada3.jpg" type="imag/jpeg">
            <img loading="lazy" src="build/img/destacada3.jpg" alt="img de propiedad">
        </picture>
        <h2 class="negritas">Llene el Formulario de Contacto</h2>
        <form class="formulario">
            <!-- Campo agrupado-->
            <fieldset> 
                <!-- explica el fieldset -->
                <legend>Información personal</legend>

                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Escribe tu nombre" id="nombre">

                <label for="email">Email</label>
                <input type="email" placeholder="Escribe tu email" id="email">
                
                <label for="tel">Teléfono</label>
                <input type="tel" placeholder="Tu número telefónico" id="tel">

                <label for="msj">Mensaje</label>
                <textarea id="msj"></textarea>

            </fieldset>
            <fieldset> 
                <!-- explica el fieldset -->
                <legend>Información sobre la propiedad</legend>

                <label for="opciones">Vender o Comprar</label>
                <select id="opciones">
                    <option value="" disabled selected>Seleccionar</option>
                    <option value="Compra">Compra</option>
                    <option value="Venta">Venta</option>
                </select>

                <label for="presupuesto">Precio o Presupuesto</label>
                <input type="number" placeholder="Tu precio o presupuesto" id="presupuesto">

            </fieldset>
            <fieldset> 
                <!-- explica el fieldset -->
                <legend>Información sobre la propiedad</legend>

                <p>Como desea ser contactado</p>
                <div class="forma-contacto">
                    <label for="contactar-telefono">Teléfono</label>
                    <input name="contacto" type="radio" id="contactar-telefono" value="telefono">

                    <label for="contactar-email">Email</label>
                    <input name="contacto" type="radio" id="contactar-email" value="telefono">
                </div>

                <p>Si eligió teléfono, elija la fecha y la hora</p>
                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha">

                <label for="hora">Hora:</label>
                <input type="time" id="hora" min="09:00" max="18:00">
                
            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">

        </form>
    </main>

<?php 
    incluirTemplate('footer');
?>