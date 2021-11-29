<?php
require_once("app/models/comments.model.php");
require_once("app/views/api.view.php");

class ApiCommentsController
{
    private $modelComments;
    private $view;
    private $data;

    public function __construct()
    {
        $this->modelComments = new CommentsModel();
        $this->view = new APIView();
        $this->data = file_get_contents("php://input");
    }

    public function get_data()
    {
        return json_decode($this->data);
    }

    public function getAllComments($param)
    {
        $id = $param[':ID'];

        $comments = $this->modelComments->getAll($id);

        if ($comments) {
            $this->view->response($comments, 200);
        } else {
            $this->view->response("no existen comentarios", 404);
        }
    }

    public function sendComment()
    {

        $body = $this->get_data();
        $sendOk = $this->modelComments->insert($body->id_libro, $body->usuario, $body->comentario, $body->valoracion);

        if ($sendOk) {
            $this->view->response("Se insertó correctamente", 200);
        } else {
            $this->view->response("Hubo un error", 500);
        }
    }

    public function deleteComment($params)
    {
        if (!isset($params[':ID'])) {
            $this->view->response("No existe el comentario", 404);
            die();
        }
        $id = $params[':ID'];

        $comment = $this->modelComments->getById($id);

        if ($comment) {
            $this->modelComments->delete($id);
            $this->view->response("El comentario se elimino con exito", 200);
        } else {
            $this->view->response("No existe el comentario", 404);
        }
    }
}
