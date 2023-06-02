<?php

    //Autenticacion
    require '../../includes/app.php';

    use App\Propiedad;
    // $propiedad = new Propiedad();
    // debug($propiedad);

    isAuth();

    //Base de datos:
    $db = conectarDB();

    // echo "<pre>";
    // var_dump($_GET);
    // echo "</pre>";
    // echo "<pre>";
    // var_dump($_SERVER);
    // echo "</pre>";

    //Consultar para tener a los vendedores:
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    //Arreglo con msjs de error
    $errores = [];

    $titulo = '';
    $precio = '';
    $descripcion = '';
    $habitaciones = '';
    $wc = '';
    $estacionamiento = '';
    $vendedorId = '';
    $creado = '';

    //Ejecutar código despues de que se envié el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";
        // echo "<pre>";
        // var_dump($_FILES);
        // echo "</pre>";

        // $numero = "correo@correo.com//";
        // $numero2 = 11;
        // //sanitizar (leer documentacion de los sanitizadores php)
        // $result = filter_var($numero, FILTER_SANITIZE_EMAIL);
        // var_dump($result);
        // $result = filter_var($numero2, FILTER_VALIDATE_INT); // los validate retornan un booleano

        //Sanitizando variables
        $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
        $precio = mysqli_real_escape_string($db, $_POST['precio']);
        $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
        $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
        $wc = mysqli_real_escape_string($db, $_POST['wc']);
        $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
        $vendedorId = mysqli_real_escape_string($db, $_POST['vendedor']);
        $creado = date('Y/m/d'); //devuelve la fecha en la que se haga el registro
        // Asignar files hacia una variable
        $imagen = $_FILES['imagen'];
        // var_dump($imagen);
        

        if(!$titulo) {
            $errores[] = "Debes de añadir un título";
        }
        if(!$precio) {
            $errores[] = "El precio es obligatorio";
        }
        if((!$descripcion) && (strlen($descripcion) < 50)) {
            $errores[] = "Debes añadir una descripción y debe teener al menos 50 caracteres";
        }
        if(!$habitaciones) {
            $errores[] = "El número de habitaciones es obligatorio";
        }
        if(!$wc) {
            $errores[] = "El número de baños es obligatorio";
        }
        if(!$estacionamiento) {
            $errores[] = "El número de estacionamientos es obligatorio";
        }
        if(!$vendedorId) {
            $errores[] = "Elige un vendedor";
        }
        if(!$imagen['name'] || $imagen['error']) {
            $errores[] = "La imagen es obligatoria";
        }
        //Validar por tamaño de archivo: (10Mb máximo)
        $medida = 1024 * 1024 * 10;
        if($imagen['size'] > $medida) {
            $errores[] = "La imagen es muy pesada";
        }

        // echo "<pre>";
        // var_dump($errores);
        // echo "</pre>";
        // exit;

        //Validar que el arrar de errores este vació
        if (empty($errores)) {

            /* SUBIR ARCHIVOS */

            //Crear carpeta:
            $carpetaimagenes = '../../imagenes/';
            //Verificar si la carpeta ya existe:
            if(!is_dir($carpetaimagenes)) {
                mkdir($carpetaimagenes);//si no existe, crea la carpeta
            }
            //Generar nombre único:
            $nombreImg = md5(uniqid(rand(), true)).".jpg"; //agrego la extension aqui para que lo guarde igual en la

            //Subir el archivo:
            move_uploaded_file($imagen['tmp_name'], $carpetaimagenes.$nombreImg);
            //insertar en Db:
            $query = " INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedores_id) VALUES ('$titulo', '$precio', '$nombreImg', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado', '$vendedorId')";
            // echo $query;
            $resultado = mysqli_query($db, $query); //conexión a db / query

            if($resultado) {
                // echo "Insertado correctamente";

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
            <fieldset>
                <legend>Información General</legend>

                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="titulo" placeholder="Título de la propiedad" value="<?php echo $titulo; ?>">

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Precio de la propiedad" value="<?php echo $precio; ?>">

                <label for="imagen">Imagen:</label>
                <input type="file" id="img" accept="image/jpeg, image/png" name="imagen">
                
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion"> <?php echo $descripcion; ?></textarea>
            </fieldset>
            <fieldset>
                <legend>Información de la Propiedad</legend>

                <label for="habitaciones">Habitaciones</label>
                <input type="number" min="1" max="9" id="habitaciones" placeholder="Ej:3" name="habitaciones" value="<?php echo $habitaciones; ?>">

                <label for="wc">Baños:</label>
                <input type="number" min="1" max="9" id="wc" placeholder="Ej:3" name="wc" value="<?php echo $wc; ?>"> 

                <label for="estacionamiento">Estacionamiento:</label>
                <input type="number" min="1" max="9" id="estacionamiento" placeholder="Ej:3" name="estacionamiento" value="<?php echo $estacionamiento; ?>"> 
            </fieldset>
            <fieldset>
                <legend>Vendedor</legend>

                <select name="vendedor" id="vendedor" value="<?php echo $vendedorId; ?>">
                    <option value="">Seleccionar</option>
                    <?php while($vendedor = mysqli_fetch_assoc($resultado)): ?>
                        <!-- el condicional es para mantener la seleccion previa, recupera el select del post -->
                        <option <?php echo $vendedorId === $vendedor['id']? 'selected' : '';?> value="<?php echo $vendedor['id'] ?>"> <?php echo $vendedor['nombre']." ".$vendedor['apellido']; ?> </option>
                    <?php endwhile; ?>
                </select>
            </fieldset>
            <input type="submit" value="Crear Propiedad" class="boton  boton-verde">
        </form>
    </main>

<?php 
    incluirTemplate('footer');
?>