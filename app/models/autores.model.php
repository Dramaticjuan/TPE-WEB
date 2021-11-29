<?php

require_once('model.php');
class AutoresModel extends Model
{

    public function getAutores()
    {

        $sql = "SELECT * FROM autores";

        $stm = $this->pdo->prepare($sql);

        $stm->execute();

        $autores = $stm->fetchAll(PDO::FETCH_OBJ);

        return $autores;
    }

    public function getAutor($id)
    {
        $sql = "SELECT * FROM autores WHERE id_autor=?";

        $stm = $this->pdo->prepare($sql);

        $stm->execute([$id]);

        $autor = $stm->fetch(PDO::FETCH_OBJ);

        return $autor;
    }

    public function insertarAutor($autor, $biografia)
    {

        $sql = "INSERT INTO autores (autor, biografia)
                VALUES (?, ?) ";

        $stm = $this->pdo->prepare($sql);

        $stm->execute([$autor, $biografia]);
    }

    public function eliminarAutor($id_autor)
    {

        $sql = "DELETE FROM autores
                WHERE id_autor = ?";

        $stm = $this->pdo->prepare($sql);

        $stm->execute([$id_autor]);
    }

    public function editarAutor($autor_nombre, $biografia, $autor_id)
    {
        $sql = "UPDATE autores SET autor=?, biografia=? WHERE id_autor=?";

        $stm = $this->pdo->prepare($sql);

        $stm->execute([$autor_nombre, $biografia, $autor_id]);
    }
}
