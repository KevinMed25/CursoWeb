<?php
    require 'includes/app.php';
    //conexion db
    $db = conectarDB();

    //Autenicación
    $errores = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";

        $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
        //var_dump($email);
        $password = mysqli_real_escape_string($db, $_POST['password']) ;

        if(!$email) {
            $errores[] = "El correo no es válido";
        }
        if(!$password) {
            $errores[] = "La contraseña es obligatoria";
        }

        if(empty($errores)) {
            //verificar exitencia de usuario
            $query = "SELECT * FROM usuarios WHERE email = '{$email}'";
            $resultado = mysqli_query($db, $query);

            if($resultado -> num_rows) {
                // Si existe, verificar password
                $usuario = mysqli_fetch_assoc($resultado);
                //verifica si el pw escrito es el mismo que en el arreglo de db
                $autenticado = password_verify($password, $usuario['password']);//retorna un booleano

                if($autenticado) {
                    //si entra, usuario autenticado
                    session_start();// inicua superglobal SESSION

                    //Llenar el arreglo de la sesión (se puede agregar cualquier cosa)
                    $_SESSION['usuario']= $usuario['email'];
                    $_SESSION['login']= true;

                    // echo "<pre>";
                    // var_dump($_SESSION);
                    // echo "</pre>";

                    header('Location: /admin');

                } else {
                    $errores[] = "La contraseña es incorrecta";
                }

            } else {
                $errores[] = "El usuario no existe";
            }
        }
    }

    //header
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1 class="negritas">Inicio de Sesión</h1>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form method="POST" class="formulario">
            <fieldset>
                <legend>Email y Contraseña</legend>

                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Escriba su correo" id="email">

                <label for="password">Contraseña</label>
                <input type="password" name="password" placeholder="Escriba su contraseña" id="password">
            </fieldset>
            <input type="submit" class="boton boton-verde" value="Iniciar Sesión">
        </form>
    </main>

<?php 
    incluirTemplate('footer');
?>