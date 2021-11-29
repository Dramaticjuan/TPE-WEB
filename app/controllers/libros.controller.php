<?php

require_once('app/models/libros.model.php');
require_once('app/views/libros.view.php');
require_once('app/models/autores.model.php');
require_once "./helpers/auth.helper.php";



class LibrosController
{
    private $librosModel;
    private $librosView;
    private $authHelper;


    public function __construct()
    {
        $this->librosView = new LibrosView();
        $this->librosModel = new LibrosModel();
        $this->autoresModel = new AutoresModel();
        $this->authHelper = new AuthHelper();
    }

    public function showLibros()
    {
        session_start();

        $libros = $this->librosModel->getLibros();
        $autores = $this->autoresModel->getAutores();
        $admin = isset($_SESSION['admin']) && $_SESSION['admin'] == 1;
        if (isset($_SESSION['email'])) {
            $usuario = $_SESSION['email'];
        } else {
            $usuario = "";
        }

        $this->librosView->mostrarLibros($libros, $autores, $admin, $usuario);
    }

    public function showLibro($id)
    {
        session_start();
        if (isset($id) && $id != "") {
            $libro = $this->librosModel->getLibro($id);
            $autor = $this->autoresModel->getAutor($libro->id_autor);
            $admin = isset($_SESSION['admin']) && $_SESSION['admin'] == 1;
            if (isset($_SESSION['email'])) {
                $usuario = $_SESSION['email'];
            } else {
                $usuario = "";
            }

            $this->librosView->mostrarLibro($libro, $autor, $admin, $usuario);
        } else {
            $this->librosView->redirectLibros();
        }
    }

    public function showEditarLibro($id)
    {
        $this->authHelper->checkloggedInAdmin();

        if (isset($id) && $id != "") {
            $libro = $this->librosModel->getLibro($id);
            $autores = $this->autoresModel->getAutores();
            $admin = isset($_SESSION['admin']) && $_SESSION['admin'] == 1;

            if (isset($_SESSION['email'])) {
                $usuario = $_SESSION['email'];
            } else {
                $usuario = "";
            }

            $this->librosView->mostrarFormEditarLibro($libro, $autores, $admin, $usuario);
        } else {
            $this->librosView->redirectLibros();
        }
    }

    public function agregarLibro()
    {
        if (
            isset($_POST['libro']) && $_POST['libro'] != ""
            && isset($_POST['id_autor']) && $_POST['id_autor'] != ""
            && isset($_POST['descripcion']) && $_POST['descripcion'] != ""
            && isset($_POST['agno']) && $_POST['agno'] != ""
        ) {
            $libro = $_POST['libro'];
            $autor_id = $_POST['id_autor'];
            $descripcion = $_POST['descripcion'];
            $agno = $_POST['agno'];

            $this->librosModel->insertarLibro($libro, $autor_id, $descripcion, $agno);
            $this->librosView->redirectLibros();
        } else {
            echo "faltan datos";
        }
    }

    public function borrarLibro($params)
    {
        $this->authHelper->checkloggedInAdmin();

        $libro_id = $params;
        $this->librosModel->eliminarLibro($libro_id);
        $this->librosView->redirectLibros();
    }


    public function editarLibro($params)
    {
        $this->authHelper->checkloggedInAdmin();

        $id = $params;

        if (
            isset($_POST['libro']) && $_POST['libro'] != ""
            && isset($_POST['id_autor']) && $_POST['id_autor'] != ""
            && isset($_POST['descripcion']) && $_POST['descripcion'] != ""
            && isset($_POST['agno']) && $_POST['agno'] != ""
        ) {
            $libro = $_POST['libro'];
            $id_autor = $_POST['id_autor'];
            $descripcion = $_POST['descripcion'];
            $agno = $_POST['agno'];
            $this->librosModel->editarLibro($libro, $id_autor, $descripcion, $agno, $id);
            $this->librosView->redirectLibros();
        } else {
            echo "faltan datos";
        }
    }
}
