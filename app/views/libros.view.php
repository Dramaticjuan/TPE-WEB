<?php
require_once('./libs/smarty-3.1.39/libs/Smarty.class.php');

class LibrosView
{

    private $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();
    }

    function mostrarLibros($libros, $autores, $admin, $usuario)
    {
        $this->smarty->assign('titulo', 'Todos los Libros');
        $this->smarty->assign('BASE_URL', BASE_URL);
        $this->smarty->assign('libros', $libros);
        $this->smarty->assign('autores', $autores);
        $this->smarty->assign('admin', $admin);
        $this->smarty->assign('usuario', $usuario);

        $this->smarty->display('templates/listLibros.tpl');
    }

    function mostrarLibro($libro, $autor, $admin, $usuario)
    {
        $this->smarty->assign('libro', $libro);
        $this->smarty->assign('autor', $autor);
        $this->smarty->assign('admin', $admin);
        $this->smarty->assign('usuario', $usuario);

        $this->smarty->display('templates/libro.tpl');
    }

    function mostrarFormEditarLibro($libro, $autores, $admin, $usuario)
    {
        $this->smarty->assign('libro', $libro);
        $this->smarty->assign('autores', $autores);
        $this->smarty->assign('admin', $admin);
        $this->smarty->assign('usuario', $usuario);

        $this->smarty->display('templates/formularioEditarLibro.tpl');
    }
    function redirectLibros()
    {
        header("Location: " . BASE_URL . "home");
    }
}
