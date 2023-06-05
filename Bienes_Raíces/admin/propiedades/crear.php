<?php

    require '../../includes/app.php';

    use App\Propiedad;
    use Intervention\Image\ImageManagerStatic as Image;

    isAuth();
    $db = conectarDB();
    $propiedad = new Propiedad();

    //Consultar para tener a los vendedores:
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    $errores = Propiedad::getErrores();  //Arreglo con msjs de error

    //Ejecutar código despues de que se envié el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $propiedad = new Propiedad($_POST['propiedad']); //se crea instancia
        
        /*SUBIDA DE ARHIVOS*/
        $nombreImg = md5(uniqid(rand(), true)).".jpg";  //Generar nombre único:

        //setear imagen    
        if($_FILES['propiedad']['tmp_name']['imagen']) { //Realizar  resize a la imagen con inntervention image 
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
            $propiedad->setImagen($nombreImg);//set al nombre de la imagen
        }
        
        $errores = $propiedad->validar(); //Validar datos
        if (empty($errores)) { //Validar que el arrar de errores este vació
            if (!is_dir(CARPETA_IMAGENES)) { //Crear carpeta para subir imagenes:
                mkdir(CARPETA_IMAGENES);
            }

            $image->save(CARPETA_IMAGENES.$nombreImg); //Guarda la img en el servidor:
            $propiedad->guardar(); //Guardar en la base de datos
        }

    }
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1 class="negritas">Crear Anuncio</h1>
        <a href="/admin" class="boton boton-verde"> Volver </a>
        
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>
        
        <!-- enctype="multipart/form-data es necesario para la subida de archivo (investigar) -->
        <form method="POST" action="/admin/propiedades/crear.php" class="formulario" enctype="multipart/form-data">
            <?php include '../../includes/templates/formulario.php' ?>
            <input type="submit" value="Crear Propiedad" class="boton  boton-verde">
        </form>
    </main>

<?php 
    incluirTemplate('footer');
?>