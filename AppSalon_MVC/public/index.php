<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\LoginController;
use MVC\Router;

$router = new Router();

//inicio de sesion:
$router->get("/",[LoginController::class, 'login']);
$router->post("/",[LoginController::class, 'login']);
$router->post("/logout",[LoginController::class, 'logout']);

//recuperar password
$router->get("/olvide",[LoginController::class, 'olvide']);
$router->post("/olvide",[LoginController::class, 'olvide']);
$router->get("/recuperar",[LoginController::class, 'recuperar']);
$router->post("/recuperar",[LoginController::class, 'recuperar']);

//crear cuenta
$router->get("/crearCuenta",[LoginController::class, 'crear']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();