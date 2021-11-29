
<?php
require_once './libs/smarty-3.1.39/libs/Smarty.class.php';

class UserView
{

    private $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();
    }

    function showRegisterForm($mensaje = '')
    {
        $this->smarty->assign('mensaje', $mensaje);
        $this->smarty->display('templates/registerForm.tpl');
    }


    function showLogin($mensaje = '')
    {
        $this->smarty->assign('mensaje', $mensaje);
        $this->smarty->display('templates/loginForm.tpl');
    }

    function showUsuarios($users, $admin, $usuario)
    {
        $this->smarty->assign('users', $users);
        $this->smarty->assign('admin', $admin);
        $this->smarty->assign('usuario', $usuario);
        $this->smarty->display('templates/usuarios.tpl');
    }






    function redirectHome()
    {
        header("Location: " . BASE_URL . "home");
    }

    function redirectUsuarios()
    {
        header("Location: " . BASE_URL . "usuarios");
    }
}
