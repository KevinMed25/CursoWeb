<?php
    require '../includes/app.php';
    use App\Propiedad;
use App\Vendedor;

    isAuth(); //Autenticacion
    $propiedades = Propiedad::all(); //Método para obtener todas las propiedades:

    $vendedores = Vendedor::all();

    //Mensaje condicional
    $resultado = $_GET['resultado'] ?? null; //?? null busca el valor, si no existe asigna null
    
    //Para borrar registro:
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        
        if($id) {
            $propiedad = Propiedad::find($id); //Obtener datos de propidad
            $propiedad->eliminar();
        }
    }
    incluirTemplate('header',$principal = true);
?>

    <main class="contenedor seccion">
        <h1 class="negritas">Administrador de Bienes Raíces</h1>

        <!-- intval cast a entero -->
        <?php if(intval($resultado) === 1):  ?>
            <p class="alerta exito">Anuncio Creado Correctamente!</p>
            <?php elseif(intval($resultado) === 2): ?>
                <p class="alerta exito">Anuncio Actualizado Correctamente!</p>
                <?php elseif(intval($resultado) === 3): ?>
                    <p class="alerta exito">Anuncio Eliminado Correctamente!</p>
        <?php endif ?>

        <a href="/admin/propiedades/crear.php" class="boton boton-verde"> Nueva Propiedad</a>

        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach( $propiedades as $propiedad): ?>
                <tr>
                    <td><?php echo $propiedad->id; ?></td>
                    <td><?php echo $propiedad->titulo; ?></td>
                    <td><img src="/imagenes/<?php echo $propiedad->imagen; ?>" class="imagen-tabla"> </td>
                    <td>$ <?php echo $propiedad->precio; ?></td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <!-- recuperamos id -->
                        <a href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block-tabla">Actualizar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

<?php 
    mysqli_close($db); //cerrar conexion db
    incluirTemplate('footer');
?>