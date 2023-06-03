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

    //Arreglo con msjs de error
    $errores = Propiedad::getErrores();

    //Ejecutar código despues de que se envié el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        //se crea instancia
        $propiedad = new Propiedad($_POST);
        
        /*SUBIDA DE ARHIVOS*/

        //Generar nombre único:
        $nombreImg = md5(uniqid(rand(), true)).".jpg"; //agrego la extension aqui para que lo guarde igual en la

        //setear imagen
        //Realizar  resize a la imagen con inntervention image 
        if($_FILES['imagen']['tmp_name']) {
            $image = Image::make($_FILES['imagen']['tmp_name'])->fit(800,600);
            $propiedad->setImagen($nombreImg);//set al nombre de la imagen
        }
        
        //Validar datos
        $errores = $propiedad->validar();

        //Validar que el arrar de errores este vació
        if (empty($errores)) {

            //Crear carpeta para subir imagenes:
            if (!is_dir(CARPETA_IMAGENES)) {
                mkdir(CARPETA_IMAGENES);
            }

            //Guarda la img en el servidor:
            $image->save(CARPETA_IMAGENES.$nombreImg);

            //Guardar en la base de datos
            $resultado = $propiedad->guardar();
            
            //Mensaje
            if($resultado) {
                //Redirección al usuario (evita duplicar entrada)
                // header('Location: /admin?mensaje=Registrado Correctamente'); //investigar "?"
                header('Location: /admin?resultado=1'); //investigar "?"
            }
        }

    }

    //funciones
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