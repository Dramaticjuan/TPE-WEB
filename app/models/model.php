<?php

class Model
{

    protected $pdo;

    public function __construct()
    {
        $this->conectar();
    }

    private function conectar()
    {

        $host = 'localhost';
        $db = 'libreria_tpe';
        $user = 'root';
        $password = '';

        $dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

        try {
            $this->pdo = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
