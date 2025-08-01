<?php

require_once '../config/connection.php';

class DMinisterio {
   private $conn;
     private $pdo;

     public function __construct($pdo = null){
         if ($pdo === null) {
             $this->conn = new Conexion();
             $this->pdo = $this->conn->getPDO();
         } else {
             $this->pdo = $pdo;
         }
     }

    public function listar() {
        $query = "SELECT * FROM ministerio";
        return $this->pdo->query($query);
    }

    public function guardar($nombre, $mision, $vision, $fechaCreacion, $activo){
        var_dump($nombre, $mision, $vision, $fechaCreacion, $activo);
        $sql = "INSERT INTO ministerio (nombre, mision, vision, fecha_creacion, activo) 
            VALUES (:nombre, :mision, :vision, :fechaCreacion, :activo)";

        $stm = $this->pdo->prepare($sql);
        $stm->bindParam(':nombre', $nombre);
        $stm->bindParam(':mision', $mision);
        $stm->bindParam(':vision', $vision);
        $stm->bindParam(':fechaCreacion', $fechaCreacion);
        $stm->bindParam(':activo', $activo);
        $stm->execute();
        return "Ministerio guardado correctamente.";
    }


}
