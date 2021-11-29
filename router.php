<?php
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');
define('HOME', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/home');

require_once('app/controllers/libros.controller.php');
require_once('app/controllers/autores.controller.php');
require_once('app/controllers/user.controller.php');

$librosControllers = new LibrosController();
$autoresControllers = new AutorController();
$userControllers = new UserController();

if (!empty($_GET['action'])) {
    $accion = $_GET['action'];
} else {
    $accion = 'home';
}

$params = explode('/', $accion);

switch ($params[0]) {
    case 'home':
        $librosControllers->showLibros();
        break;
    case 'libro':
        $librosControllers->showLibro($params[1]);
        break;
    case 'autores':
        $autoresControllers->showAutores();
        break;
    case 'autor':
        $autoresControllers->showAutor($params[1]);
        break;

        /* administracion */

    case 'agregarLibro':
        $librosControllers->agregarLibro();
        break;

    case 'borrarLibro':
        $librosControllers->borrarLibro($params[1]);
        break;

    case 'editarLibro':
        $librosControllers->editarLibro($params[1]);
        break;
    case 'formularioEditarLibro':
        $librosControllers->showEditarLibro($params[1]);
        break;



    case 'agregarAutor':
        $autoresControllers->agregarAutor();
        break;
    case 'borrarAutor':
        $autoresControllers->borrarAutor($params[1]);
        break;
    case 'editarAutor':
        $autoresControllers->editarAutor($params[1]);
        break;
    case 'formularioEditarAutor':
        $autoresControllers->showEditarAutor($params[1]);
        break;



    case 'showLogin':
        $userControllers->showLogin();
        break;
    case 'login':
        $userControllers->verifyLogin();
        break;
    case 'logout':
        $userControllers->logout();
        break;

    case 'showRegistrar':
        $userControllers->showRegistrar();
        break;
    case 'registrar':
        $userControllers->registerUser();
        break;

    case 'usuarios':
        $userControllers->showUsuarios();
        break;
    case 'hacerAdmin':
        $userControllers->setAdmin($params[1]);
        break;
    case 'borrarUsuario':
        $userControllers->borrarUsuario($params[1]);
        break;

    default:
        echo ('404 page not found');
        break;
}
