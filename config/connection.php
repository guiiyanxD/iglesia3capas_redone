<?php

namespace config;

use PDO;
use PDOException;

Class Connection{
    private $host = "localhost";
    private $user   = "root";
    private $pass   = '';
    private $db_name= "iglesia3capas_redone";
    private $pdo;
    public $userData = [];
    public function __construct(){
        $this->pdo = $this->connect();

    }

    public function connect(){
        $dsn = "mysql:host=$this->host;dbname=$this->db_name;charset=utf8mb4";
        try {
            $pdo = new PDO($dsn, $this->user, $this->pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
            return $pdo;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    /**
     * Returns the PDO instance.
     *
     * @return PDO The PDO instance.
     */
    public function getPDO() {
        return $this->pdo;
    }


}



