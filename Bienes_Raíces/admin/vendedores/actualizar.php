<?php 

    require '../../includes/app.php';  
    use App\Vendedor;
    isAuth();

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header('Location: /admin');
    }

    //obtener arreglo de vendedor
    $vendedor = Vendedor::find($id);

    $errores = Vendedor::getErrores();

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        //Asignar valores
        $args = $_POST['vendedor'];
        //sincronizar objeto en memoria con los nuevos datos
        $vendedor->sincronizar($args);
        //validacion:
        $errores = $vendedor->validar();
        //guardar:
        if(empty($errores)) {
            $vendedor->guardar();
        }
    }

    incluirTemplate('header');
?>


<main class="contenedor seccion">
        <h1 class="negritas">Actualizar Vendedor</h1>
        <a href="/admin" class="boton boton-verde"> Volver </a>
        
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>
        
        <!-- enctype="multipart/form-data es necesario para la subida de archivo (investigar) -->
        <form method="POST" class="formulario">
            <?php include '../../includes/templates/formulario-vendedores.php'; ?>
            <input type="submit" value="Actualizar Vendedor" class="boton  boton-verde">
        </form>
    </main>

<?php 
    incluirTemplate('footer');
?>