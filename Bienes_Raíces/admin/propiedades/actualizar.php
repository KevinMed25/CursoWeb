<?php
    
    use App\Propiedad;
    use App\Vendedor;
    use Intervention\Image\ImageManagerStatic as Image;
    require '../../includes/app.php';

    isAuth();
 
    //RECUPERAR ID:
    //validar url por id válido
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header('Location: /admin');
    }
    
    $db = conectarDB();
    
    $propiedad = Propiedad::find($id); //Obtener datos de propiedad:

    $vendedores = Vendedor::all();

    $errores = Propiedad::getErrores();//Arreglo con msjs de error

    if($_SERVER['REQUEST_METHOD'] === 'POST') { //Ejecutar código despues de que se envié el formulario

        $args = $_POST['propiedad']; //Asignar atributos

        $propiedad->sincronizar($args); // sincronizar datos nuevos con objeto en memoria
        
        $errores = $propiedad->validar();//validación

        //Subida de archivos (imagen) :
        $nombreImg = md5(uniqid(rand(), true)).".jpg"; // nombre unico
        if($_FILES['propiedad']['tmp_name']['imagen']) {    
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
            $propiedad->setImagen($nombreImg);//set al nombre de la imagen
        } 
           //Validar que el arrar de errores este vació
        if (empty($errores)) {
            
            if($_FILES['propiedad']['tmp_name']['imagen']) {    
                $image->save(CARPETA_IMAGENES.$nombreImg); //guardar img 
            } 

            $propiedad->guardar();
        }
    }
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1 class="negritas">Actualizar Propiedad</h1>
        <a href="/admin" class="boton boton-verde"> Volver </a>
        
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>
    
        <!-- enctype="multipart/form-data es necesario para la subida de archivo (investigar) -->
        <form method="POST" class="formulario" enctype="multipart/form-data">
            <?php include '../../includes/templates/formulario-propiedades.php' ?>
            <input type="submit" value="Actualizar Propiedad" class="boton  boton-verde">
        </form>
    </main>

<?php 
    incluirTemplate('footer');
?>