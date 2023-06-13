<main class="contenedor seccion contenido-centrado">
    <h1 class="negritas">Contacto</h1>

    <?php  if($mensaje) { ?>
        <p class='alerta exito'><?php echo $mensaje; ?> </p>
    <?php  }; ?>
    
    <picture>
        <source srcset="build/img/destacada3.webp" type="imag/webp">
        <source srcset="build/img/destacada3.jpg" type="imag/jpeg">
        <img loading="lazy" src="build/img/destacada3.jpg" alt="img de propiedad">
    </picture>
    <h2 class="negritas">Llene el Formulario de Contacto</h2>
     <form class="formulario" action="/contacto" method="POST">
            <!-- Campo agrupado-->
        <fieldset> 
                <!-- explica el fieldset -->
            <legend>Información personal</legend>

            <label for="nombre">Nombre</label>
            <input type="text" placeholder="Escribe tu nombre" id="nombre" name="contacto[nombre]" require>

            <label for="mensaje">Mensaje</label>
            <textarea id="mensaje" name="contacto[mensaje]" require></textarea>

        </fieldset>
        <fieldset> 
                <!-- explica el fieldset -->
            <legend>Información sobre la propiedad</legend>

            <label for="opciones">Vender o Comprar</label>
            <select id="opciones" name="contacto[tipo]" require>
                <option value="" disabled selected>Seleccionar</option>
                <option value="Compra">Compra</option>
                <option value="Venta">Venta</option>
            </select>

            <label for="presupuesto">Precio o Presupuesto</label>
            <input type="number" placeholder="Tu precio o presupuesto" id="presupuesto" name="contacto[precio]" require>

        </fieldset>
        <fieldset> 
                <!-- explica el fieldset -->
            <legend>Información sobre la propiedad</legend>
            <p>Como desea ser contactado</p>
            <div class="forma-contacto">
                <label for="contactar-telefono">Teléfono</label>
                <input type="radio" id="contactar-telefono" value="telefono" name="contacto[contacto]" require>

                <label for="contactar-email">Email</label>
                <input type="radio" id="contactar-email" value="email" name="contacto[contacto]" require>
            </div>

            <div id="contacto"></div>
                
        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde">

    </form>
</main>