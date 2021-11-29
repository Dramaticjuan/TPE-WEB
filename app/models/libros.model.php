<?php

require_once('model.php');
class LibrosModel extends Model
{

    public function getLibros()
    {

        $sql = "SELECT * FROM libros JOIN autores ON  libros.id_autor = autores.id_autor";

        $stm = $this->pdo->prepare($sql);

        $stm->execute();

        $libros = $stm->fetchAll(PDO::FETCH_OBJ);

        return $libros;
    }

    public function getLibro($id)
    {
        $sql = "SELECT * FROM libros  WHERE id=?";

        $stm = $this->pdo->prepare($sql);

        $stm->execute([$id]);

        $libro = $stm->fetch(PDO::FETCH_OBJ);

        return $libro;
    }

    public function getLibrosByAutor($id_autor)
    {
        $sql = "SELECT libros.id, libros.libro, libros.agno FROM libros WHERE id_autor=?";

        $stm = $this->pdo->prepare($sql);

        $stm->execute([$id_autor]);

        $libros = $stm->fetchAll(PDO::FETCH_OBJ);

        return $libros;
    }

    public function insertarLibro($libro, $autor_id, $descripcion, $agno)
    {

        $sql = "INSERT INTO libros (libro, id_autor, descripcion, agno)
                VALUES (?, ?, ?, ?) ";

        $stm = $this->pdo->prepare($sql);

        $stm->execute([$libro, $autor_id, $descripcion, $agno]);
    }


    public function eliminarLibro($libro_id)
    {

        $sql = "DELETE FROM libros
                WHERE id = ?";

        $stm = $this->pdo->prepare($sql);

        $stm->execute([$libro_id]);
    }

    public function editarLibro($libro, $autor_id, $descripcion, $agno, $libro_id)
    {

        $sql = "UPDATE libros SET libro=?, id_autor=?, descripcion=?, agno=?
                WHERE id = ?";

        $stm = $this->pdo->prepare($sql);

        $stm->execute([$libro, $autor_id, $descripcion, $agno, $libro_id]);
    }
}
