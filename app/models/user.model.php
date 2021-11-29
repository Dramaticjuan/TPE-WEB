<?php

require_once('model.php');


class UserModel extends Model
{

    function insertUser($email, $password)
    {
        $sql = "INSERT INTO usuarios(email, password, admin) VALUES(?, ?, false)";

        $stm = $this->pdo->prepare($sql);

        $stm->execute([$email, $password]);
    }

    function getUserByEmail($email)
    {
        $sql = 'SELECT * FROM usuarios WHERE email=?';

        $stm = $this->pdo->prepare($sql);

        $stm->execute([$email]);

        $user =  $stm->fetch(PDO::FETCH_OBJ);

        return $user;
    }

    function getUserById($idUser)
    {
        $sql = 'SELECT * FROM usuarios WHERE id_usuario=?';

        $stm = $this->pdo->prepare($sql);

        $stm->execute([$idUser]);

        $user =  $stm->fetch(PDO::FETCH_OBJ);

        return $user;
    }

    function getUsers()
    {
        $sql = "SELECT * FROM usuarios";

        $stm = $this->pdo->prepare($sql);

        $stm->execute();

        $users =  $stm->fetchAll(PDO::FETCH_OBJ);

        return $users;
    }

    function deleteUser($idUser)
    {
        $sql = "DELETE FROM usuarios WHERE usuario=?";

        $stm = $this->pdo->prepare($sql);

        $stm->execute([$idUser]);
    }
    function giveAdmin($idUser)
    {
        $sql = "UPDATE usuarios SET admin = true WHERE id_usuario = ?;";

        $stm = $this->pdo->prepare($sql);

        $stm->execute([$idUser]);
    }
}
