<?php 

namespace Controllers;

use Classes\Email;
use Model\Usuario;
use MVC\Router;

class AuthController {
    public static function login(Router $router) {
        $alertas = [];
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Usuario($_POST);
            $alertas = $auth->validarLogin();

            if(empty($alertas)) {
                $usuario = Usuario::where('email', $auth->email);

                if($usuario) {

                    if($usuario->comprobarUsuarioLogin($auth->password)) {
                        session_start();

                        $_SESSION['id'] = $usuario->id;
                        $_SESSION['nombre'] = $usuario->nombre . " " . $usuario->apellido;
                        $_SESSION['email'] = $usuario->email;
                        $_SESSION['login'] = true;

                        // Redireccion
                        if($usuario->admin === "1") {
                            $_SESSION['admin'] = $usuario->admin ?? null;
                            header('Location: /admin');
                        } else {
                            header('Location: /cita');
                        }

                        
                        
                    }
                } else {
                    Usuario::setAlerta('error', '* El usuario no existe');
                }
            }
        }

        $alertas = Usuario::getAlertas();
        $router->render('auth/login' , [
            'alertas' => $alertas
        ]);
    }

    public static function logout() {
        session_start();

        $_SESSION = [];

        header('Location: /');

        
    }

    public static function recuperar(Router $router) {

        $alertas = [];
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Usuario($_POST);
            $alertas = $auth->validarEmail();
            if(empty($alertas)) {
                $usuario = Usuario::where('email', $auth->email);
                if($usuario && $usuario->confirmado === "1") {
                    // Generar un token de un solo uso
                    $usuario->crearToken();
                    $usuario->guardar();

                    $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
                    $email->enviarInstrucciones();

                    Usuario::setAlerta('exito', 'Revisa tu correo electronico');
                } else {
                    Usuario::setAlerta('error', '* El usuario no existe o no esta confirmado');
                }
            }
        }

        $alertas = Usuario::getAlertas();
        $router->render('auth/recuperar', [
            'alertas' => $alertas
        ]);
    }

    public static function reestablecer(Router $router) {
        $alertas = [];
        $error = false;
        $token = s($_GET['token']);
        
        $usuario = Usuario::where('token', $token);

        if(empty($usuario)) {
            Usuario::setAlerta('error', '* Token no válido');
            $error = true;
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $password = new Usuario($_POST);
            $alertas = $password->validarPassword();
            
            if(empty($alertas)) {
                $usuario->password = null;
                $usuario->password = $password->password;
                $usuario->hashPassword();
                $usuario->token = null;

                $resultado = $usuario->guardar();
                if($resultado) {
                    header('Location: /');
                }
                
            }
        }
        //debuguear($usuario);
        
        $alertas = Usuario::getAlertas();
        $router->render('auth/reestablecer', [
            'alertas' => $alertas,
            'error' => $error
        ]);
    }

    public static function registro(Router $router) {

        $usuario = new Usuario;
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validar();
            // Verificar alertas vacio
            if(empty($alertas)) {
                // Verificar que el usuario no este registrado
                $resultado = $usuario->existeUsuario();

                if($resultado->num_rows) {
                    $alertas = Usuario::getAlertas();
                } else {
                    // hasear el password
                    $usuario->hashPassword();

                    //Generar token
                    $usuario->crearToken();

                    // Enviar email
                    $email = new Email($usuario->nombre, $usuario->email, $usuario->token);
                    $email->enviarConfirmacion();

                    // Crear usuario
                    $resultado = $usuario->guardar();
                   // debuguear($usuario);
                    if($resultado) {
                        header('Location: /mensaje');
                    }
                }
            }
        }

        $router->render('auth/registro', [
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }

    public static function mensaje(Router $router) {
        
        $router->render('auth/mensaje');
    }

    public static function confirmar(Router $router) {

        $alertas = [];
        $token = s($_GET['token']);
        $usuario = Usuario::where('token', $token);

        if(empty($usuario)) {
           // Mostrar mensaje de error 
           Usuario::setAlerta('error', '* Token no Válido');

        } else {
            // modificar a usuario confirmado
            $usuario->confirmado = "1";
            $usuario->token = null;
            $usuario->guardar();
            Usuario::setAlerta('exito', 'Cuenta confirmada exitosamente');
        }

        $alertas = Usuario::getAlertas();
        $router->render('auth/confirmar', [
            'alertas' => $alertas
        ]);
    }
}