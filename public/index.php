<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\AdminController;
use Controllers\ApiController;
use Controllers\AuthController;
use Controllers\CitaController;
use Controllers\ServicioController;
use MVC\Router;

$router = new Router();

// Login
$router->get('/', [AuthController::class, 'login']);
$router->post('/', [AuthController::class, 'login']);
$router->get('/logout', [AuthController::class, 'logout']);

// Recuperar contraseña
$router->get('/recuperar', [AuthController::class, 'recuperar']);
$router->post('/recuperar', [AuthController::class, 'recuperar']);
// Nueva contraseña
$router->get('/reestablecer', [AuthController::class, 'reestablecer']);
$router->post('/reestablecer', [AuthController::class, 'reestablecer']);

// Crear cuenta
$router->get('/registro', [AuthController::class, 'registro']);
$router->post('/registro', [AuthController::class, 'registro']);

//Confirmar cuenta
$router->get('/confirmar-cuenta', [AuthController::class, 'confirmar']);
$router->get('/mensaje', [AuthController::class, 'mensaje']);

// Zona privada
$router->get('/cita', [CitaController::class, 'index']);
$router->get('/admin', [AdminController::class, 'index']);

// Api de citas
$router->get('/api/servicios', [ApiController::class, 'index']);
$router->post('/api/citas', [ApiController::class, 'guardar']);
$router->post('/api/eliminar', [ApiController::class, 'eliminar']);

// CRUD de servicios
$router->get('/admin/servicios', [ServicioController::class, 'index']);

$router->get('/admin/servicios/crear', [ServicioController::class, 'crear']);
$router->post('/admin/servicios/crear', [ServicioController::class, 'crear']);

$router->get('/admin/servicios/actualizar', [ServicioController::class, 'actualizar']);
$router->post('/admin/servicios/actualizar', [ServicioController::class, 'actualizar']);

$router->post('/admin/servicios/eliminar', [ServicioController::class, 'eliminar']);




// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();