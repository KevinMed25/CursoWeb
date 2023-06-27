<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\ApiController;
use Controllers\CitaController;
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
$router->post("/crearCuenta",[LoginController::class, 'crear']);

//para confirmar cuenta:
$router->get("/confirmarCuenta",[LoginController::class, 'confirmar']);
$router->get("/mensaje",[LoginController::class, 'mensaje']);

//privado:
$router->get('/cita', [CitaController::class, 'index']);

//API
$router->get('/api/servicios', [ApiController::class, 'index']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();