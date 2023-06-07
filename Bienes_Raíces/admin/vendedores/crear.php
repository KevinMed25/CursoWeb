<?php 

    require '../../includes/app.php';  
    use App\Vendedor;
    isAuth();

    $vendedor = new Vendedor();

    $errores = Vendedor::getErrores();

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        //crar instancia con post
        $vendedor = new Vendedor($_POST['vendedor']);
        //validar
        $errores = $vendedor->validar();

        if (empty($errores)) {
            $vendedor->guardar();
        }
    }

    incluirTemplate('header');
?>


<main class="contenedor seccion">
        <h1 class="negritas">Registrar Vendedor</h1>
        <a href="/admin" class="boton boton-verde"> Volver </a>
        
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>
        
        <!-- enctype="multipart/form-data es necesario para la subida de archivo (investigar) -->
        <form method="POST" action="/admin/vendedores/crear.php" class="formulario">
            <?php include '../../includes/templates/formulario-vendedores.php' ?>
            <input type="submit" value="Registrar Vendedor" class="boton  boton-verde">
        </form>
    </main>

<?php 
    incluirTemplate('footer');
?>