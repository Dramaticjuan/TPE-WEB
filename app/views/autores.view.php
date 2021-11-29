<?php
require_once('./libs/smarty-3.1.39/libs/Smarty.class.php');

class AutoresView
{

    private $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();
    }

    function mostrarAutores($autores, $admin, $usuario)
    {
        $this->smarty->assign('BASE_URL', BASE_URL);
        $this->smarty->assign('autores', $autores);
        $this->smarty->assign('admin', $admin);
        $this->smarty->assign('usuario', $usuario);

        $this->smarty->display('templates/autores.tpl');
    }

    function mostrarAutor($autor, $libros, $admin, $usuario)
    {
        $this->smarty->assign('BASE_URL', BASE_URL);
        $this->smarty->assign('autor', $autor);
        $this->smarty->assign('libros', $libros);
        $this->smarty->assign('admin', $admin);
        $this->smarty->assign('usuario', $usuario);

        $this->smarty->display('templates/autor.tpl');
    }

    function mostrarFormEditarAutor($autor, $admin, $usuario)
    {
        $this->smarty->assign('BASE_URL', BASE_URL);
        $this->smarty->assign('autor', $autor);
        $this->smarty->assign('admin', $admin);
        $this->smarty->assign('usuario', $usuario);

        $this->smarty->display('templates/formularioEditarAutor.tpl');
    }
    function redirectAutores()
    {
        header("Location: " . BASE_URL . "autores");
    }
}
