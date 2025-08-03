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
        $result = [];
        $sql = 'select * from ministerio';
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

    public function guardar($nombre, $mision, $vision, $fechaCreacion, $activo){
        $sql = "INSERT INTO ministerio (nombre, mision, vision, fechaCreacion, activo) 
            VALUES (:nombre, :mision, :vision, :fechaCreacion, :activo)";
        try {
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(':nombre', $nombre);
            $stm->bindParam(':mision', $mision);
            $stm->bindParam(':vision', $vision);
            $stm->bindParam(':fechaCreacion', $fechaCreacion);
            $stm->bindParam(':activo', $activo);
            $stm->execute();
            if ($stm->rowCount() === 0) {
                throw new Exception("No se pudo guardar el ministerio.");
            }
        } catch (\PDOException $th) {
            throw new \Exception("Error de base de datos al guardar el ministerio: " . $th->getMessage());
        }
    }


}
