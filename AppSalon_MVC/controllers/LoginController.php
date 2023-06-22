<?php 

namespace Controllers;

use Classes\Email;
use Model\Usuario;
use MVC\Router;

class LoginController {

    public static function login(Router $router) {

        $alertas = [];
        $auth = new Usuario;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Usuario($_POST);
            $alertas = $auth->validarLogin();

            if (empty($alertas)) {
                $usuario = Usuario::where('email', $auth->email);

                if ($usuario) { // se valida contraseña

                    if($usuario->comprobarPasswordVerificado($auth->password)) {
                        
                        session_start();
                        $_SESSION['id'] = $usuario->id;
                        $_SESSION['nombre'] = $usuario->nombre . " " . $usuario->apellido;
                        $_SESSION['email'] = $usuario->email;
                        $_SESSION['login'] = true;

                        if ($usuario->admin === '1') {
                            $_SESSION['admin'] = $usuario->admin ?? null;
                            header('Location: /admin');
                        } else {
                            header('Location: /cita');
                        }

                    } else {

                    }

                } else {
                    Usuario::setAlerta('error', 'Usuario no encontrado');
                }
            }
        }

        $alertas = Usuario::getAlertas();

        $router->render('auth/login', [
            'alertas' => $alertas,
            'auth' => $auth,
        ]);
    }

    public static function logout() {
        echo "Desde logout...";
    }

    public static function olvide(Router $router) {

        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Usuario($_POST);
            $alertas = $auth->validarEmail();

            if (empty($alertas)) {
                $usuario = Usuario::where('email', $auth->email);
                if ($usuario && $usuario->confirmado === '1') {

                    //generar token:
                    $usuario->crearToken();
                    $usuario->guardar();

                    //enviar email
                    $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
                    $email->enviarInstrucciones();

                    Usuario::setAlerta('exito', 'Revisa tu email');

                } else {
                    Usuario::setAlerta('error', 'El usuario no existe o no ha sido confirmado');
                }
            }
        }
        $alertas = Usuario::getAlertas();
        $router->render('auth/olvidePassword', [
            'alertas' => $alertas,
        ]);
    }

    public static function recuperar(Router $router) {
        $error = false;
        $alertas = [];
        $token = healt($_GET['token']);

        $usuario = Usuario::where('token', $token);
        if (empty($usuario)) {
            Usuario::setAlerta('error', 'Token no válido');
            $error = true;
        }

        if( $_SERVER['REQUEST_METHOD'] === 'POST') {
            $password = new Usuario($_POST);
            $alertas = $password->validarPassword();

            if (empty($alertas)) {
                $usuario->password = null;
                $usuario->password = $password->password;
                $usuario->hashPassword();
                $usuario->token = '';

                $resultado = $usuario->guardar();
                if ($resultado) {
                    header('Location: /');
                }
            }
        }

        $alertas = Usuario::getAlertas();
        $router->render('auth/recuperarPassword', [
            'alertas' => $alertas,
            'error' => $error,
        ]);
    }

    public static function crear(Router $router) {

        $usuario = new Usuario();
        $alertas = [];

        if( $_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarCuentaNueva();

            if(empty($alertas)) {
                $resultado = $usuario->existeUsuario();
                if ($resultado->num_rows) {
                    $alertas = Usuario::getAlertas();
                } else  {
                    $usuario->hashPassword();
                    $usuario->crearToken(); //token unico

                    $email = new Email($usuario->nombre, $usuario->email, $usuario->token);
                    $email->enviarConfirmacion();

                    $resultado = $usuario->guardar();

                    if ($resultado) {
                        header('Location: /mensaje');
                    }
                }
            }

        }

        $router->render('auth/crearCuenta', [
            'usuario' => $usuario,
            'alertas' => $alertas,
        ]);
    }

    public static function mensaje(Router $router) {
        $router->render('auth/mensaje');
    }

    public static function confirmar(Router $router) {
        
        $alertas = [];
        $token = healt($_GET['token']);
        $usuario = Usuario::where('token', $token);
        if (empty($usuario)) {
            Usuario::setAlerta('error', 'Token no válido');
        } else {
            $usuario->confirmado = '1';
            $usuario->token = '';
            $usuario->guardar();
            Usuario::setAlerta('exito', 'Cuenta comprobada correctamente');
        }

        $alertas = Usuario::getAlertas();

        $router->render('auth/confirmarCuenta', [
            'alertas' => $alertas,
        ]);
    }
}


?>