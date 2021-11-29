<?php

require_once('app/models/autores.model.php');
require_once('app/models/libros.model.php');
require_once('app/views/autores.view.php');

class AutorController
{
    private $autoresModel;
    private $autoresView;

    public function __construct()
    {
        $this->autoresModel = new AutoresModel();
        $this->librosModel = new LibrosModel();
        $this->autoresView = new AutoresView();
    }


    public function showAutores()
    {
        session_start();

        $autores = $this->autoresModel->getAutores();
        $admin = isset($_SESSION['admin']) && $_SESSION['admin'] == 1;
        if (isset($_SESSION['email'])) {
            $usuario = $_SESSION['email'];
        } else {
            $usuario = "";
        }

        $this->autoresView->mostrarAutores($autores, $admin, $usuario);
    }

    public function showAutor($id)
    {
        session_start();
        if (isset($id) && $id != "") {
            $autor = $this->autoresModel->getAutor($id);
            $libros = $this->librosModel->getLibrosByAutor($id);
            $admin = isset($_SESSION['admin']) && $_SESSION['admin'] == 1;
            if (isset($_SESSION['email'])) {
                $usuario = $_SESSION['email'];
            } else {
                $usuario = "";
            }

            $this->autoresView->mostrarAutor($autor, $libros, $admin, $usuario);
        } else {
            $this->autoresView->redirectAutores();
        }
    }

    public function showEditarAutor($id)
    {

        $this->authHelper->checkloggedInAdmin();

        if (isset($id) && $id != "") {
            $autor = $this->autoresModel->getAutor($id);
            $admin = isset($_SESSION['admin']) && $_SESSION['admin'] == 1;
            if (isset($_SESSION['email'])) {
                $usuario = $_SESSION['email'];
            } else {
                $usuario = "";
            }

            $this->autoresView->mostrarFormEditarAutor($autor, $admin, $usuario);
        } else {
            $this->autoresView->redirectAutores();
        }
    }

    public function agregarAutor()
    {

        $this->authHelper->checkloggedInAdmin();
        if (
            isset($_POST['biografia']) && $_POST['biografia'] != ""
            && isset($_POST['autor']) && $_POST['autor'] != ""
        ) {
            $biografia = $_POST['biografia'];
            $autor = $_POST['autor'];

            $this->autoresModel->insertarAutor($autor, $biografia);
            $this->autoresView->redirectAutores();
        } else {
            echo "faltan datos";
        }
    }


    public function borrarAutor($params)
    {

        $this->authHelper->checkloggedInAdmin();

        $autor_id = $params;

        $this->autoresModel->eliminarAutor($autor_id);
        $this->autoresView->redirectAutores();
    }


    public function editarAutor($params)
    {

        $this->authHelper->checkloggedInAdmin();

        $autor_id = $params;

        if (
            isset($_POST['biografia']) && $_POST['biografia'] != ""
            && isset($_POST['autor']) && $_POST['autor'] != ""
        ) {
            $biografia = $_POST['biografia'];
            $autor_nombre = $_POST['autor'];
        } else {
            echo "faltan datos";
        }
        $this->autoresModel->editarAutor($autor_nombre, $biografia, $autor_id);
        $this->autoresView->redirectAutores();
    }
}
