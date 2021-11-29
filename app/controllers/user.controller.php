<?php
require_once 'app/models/user.model.php';
require_once 'app/views/user.view.php';
require_once "./helpers/auth.helper.php";

class userController
{
    private $view;
    private $userModel;
    private $authHelper;

    function __construct()
    {
        $this->userModel = new UserModel();
        $this->view = new UserView();
        $this->authHelper = new AuthHelper();
    }

    function showRegistrar()
    {
        $this->view->showRegisterForm();
    }

    function registerUser()
    {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $userEmail = $_POST['email'];
            $userPassword = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $user = $this->userModel->getUserByEmail($userEmail);
            if ($user) {
                $this->view->showRegisterForm("error, ese correo ya esta usado");
            } else {
                $this->userModel->insertUser($userEmail, $userPassword);
                $this->verifyLogin();
            }
        }
    }


    function showLogin()
    {
        $this->view->showLogin();
    }

    function verifyLogin()
    {

        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $userEmail = $_POST['email'];
            $userPassword = $_POST['password'];

            $user = $this->userModel->getUserByEmail($userEmail);

            if ($user && password_verify($userPassword, $user->password)) {

                session_start();
                $_SESSION['email'] = $userEmail;
                $_SESSION['admin'] = $user->admin;
                $_SESSION['id'] = $user->id_user;
                $this->view->redirectUsuarios();
            } else {
                $this->view->showLogin('Acceso denegado. Vuelva a intentar');
            }
        }
    }

    function logout()
    {
        session_start();
        session_destroy();
        $this->view->showLogin("Te deslogueaste");
    }

    function showUsuarios()
    {

        $this->authHelper->checkloggedInAdmin();
        $users = $this->userModel->getUsers();

        $admin = isset($_SESSION['admin']) && $_SESSION['admin'] == 1;
        $usuario = $_SESSION['email'];

        $this->view->showUsuarios($users, $admin, $usuario);
    }

    function borrarUsuario($idUser)
    {
        $this->authHelper->checkloggedInAdmin();
        $this->userModel->deleteUser($idUser);
        $this->view->redirectUsuarios();
    }

    function setAdmin($idUser)
    {
        $this->authHelper->checkloggedInAdmin();
        if ($idUser) {
            $this->userModel->giveAdmin($idUser);
            $this->view->redirectUsuarios();
        }
    }
}
