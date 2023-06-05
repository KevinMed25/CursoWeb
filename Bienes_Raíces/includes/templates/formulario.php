<fieldset>
    <legend>Información General</legend>

    <label for="titulo">Titulo:</label>
    <input type="text" id="titulo" name="propiedad[titulo]" placeholder="Título de la propiedad" value="<?php echo healt($propiedad->titulo); ?>">

    <label for="precio">Precio:</label>
    <input type="number" id="precio" name="propiedad[precio]" placeholder="Precio de la propiedad" value="<?php echo healt($propiedad->precio); ?>">

    <label for="imagen">Imagen:</label>
    <input type="file" id="img" accept="image/jpeg, image/png" name="propiedad[imagen]">

    <?php if($propiedad->imagen): ?>
        <img src="/imagenes/<?php echo $propiedad->imagen ?>" alt="Imagen propiedad" class="img-small">
    <?php endif; ?>
                
    <label for="descripcion">Descripción:</label>
    <textarea id="descripcion" name="propiedad[descripcion]"> <?php echo healt($propiedad->descripcion); ?></textarea>
</fieldset>
<fieldset>
    <legend>Información de la Propiedad</legend>

    <label for="habitaciones">Habitaciones</label>
    <input type="number" min="1" max="9" id="habitaciones" placeholder="Ej:3" name="propiedad[habitaciones]" value="<?php echo healt($propiedad->habitaciones); ?>">

    <label for="wc">Baños:</label>
    <input type="number" min="1" max="9" id="wc" placeholder="Ej:3" name="propiedad[wc]" value="<?php echo healt($propiedad->wc); ?>"> 

    <label for="estacionamiento">Estacionamiento:</label>
    <input type="number" min="1" max="9" id="estacionamiento" placeholder="Ej:3" name="propiedad[estacionamiento]" value="<?php echo healt($propiedad->estacionamiento); ?>"> 
</fieldset>
<fieldset>
    <!-- <legend>Vendedor</legend>

    <select name="vendedores_id" id="vendedor" value="<?php echo healt($propiedad->vendedores_id); ?>">
        <option value="">Seleccionar</option>
        <?php while($vendedor = mysqli_fetch_assoc($resultado)): ?>
                        <!-- el condicional es para mantener la seleccion previa, recupera el select del post -->
            <!-- <option <?php echo $vendedorId === $vendedor['id']? 'selected' : '';?> value="1"> <?php echo $vendedor['nombre']." ".$vendedor['apellido']; ?> </option> -->
        <?php endwhile; ?>
    <!-- </select> --> 
</fieldset>