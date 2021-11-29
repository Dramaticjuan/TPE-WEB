<?php
require_once('model.php');

class CommentsModel extends Model
{

    public function getAll($id_libro)
    {

        $sql = "SELECT * FROM comentarios 
                WHERE id_libro = ?";

        $stm = $this->pdo->prepare($sql);

        $stm->execute([$id_libro]);

        $comments = $stm->fetchAll(PDO::FETCH_OBJ);

        return $comments;
    }
    public function insert($id_libro, $usuario, $comentario, $valoracion)
    {
        $sql =  "INSERT INTO comentarios (id_libro, usuario, comentario, valoracion) 
                VALUES (?,?,?,?)";

        $stm = $this->pdo->prepare($sql);

        $stm->execute([$id_libro, $usuario, $comentario, $valoracion]);

        return $stm;
    }
    public function getById($id)
    {
        $sql = "SELECT * FROM comentarios 
                WHERE id_comment = ?";

        $stm = $this->pdo->prepare($sql);

        $stm->execute([$id]);

        $comment = $stm->fetch(PDO::FETCH_OBJ);

        return $comment;
    }
    public function delete($id)
    {
        $sql = "DELETE FROM comentarios 
                WHERE id_comment = ?";

        $stm = $this->pdo->prepare($sql);

        $stm->execute([$id]);
    }
}
