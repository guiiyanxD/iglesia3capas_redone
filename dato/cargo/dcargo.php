<?php
 require './config/connection.php';

use config\Connection;
use PDO;
 class DCargo{
     private $conn;
     private $pdo;

     public function __construct($pdo = null){
         if ($pdo === null) {
             $this->conn = new Connection();
             $this->pdo = $this->conn->getPDO();
         } else {
             $this->pdo = $pdo;
         }
     }

     /**
      * Devuelve todos los registros de la tabla Cargo
      * @return array|false|string
      */
     public function listar(){
         $result = [];
         $sql = 'select * from cargo';
         try {
            $st = $this->pdo->prepare($sql);
            $st->execute();
            $result = $st->fetchAll(\PDO::FETCH_ASSOC);
            if($st->rowCount() > 0 ){
                return $result;
            }else{
                throw new Exception("La lista esta vacia");
            }
         }catch (\Exception $e){
            return $e->getMessage();
         }
     }
 }