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
        $sql = "INSERT INTO ministerio (nombre, mision, vision, fechaCreacion, activo, idLider) 
            VALUES (:nombre, :mision, :vision, :fechaCreacion, :activo, :idLider)";
        try {
            
            $stm = $this->pdo->prepare($sql);
            

            $stm->bindParam(':nombre', $nombre);
            $stm->bindParam(':mision', $mision);
            $stm->bindParam(':vision', $vision);
            $stm->bindParam(':fechaCreacion', $fechaCreacion);
            $stm->bindParam(':activo', $activo, \PDO::PARAM_BOOL);
            $stm->bindValue(':idLider', 1, \PDO::PARAM_NULL); // Assuming idLider is optional
            $stm->execute();
            if ($stm->rowCount() == 0) {
                throw new Exception("No se pudo guardar el ministerio.");
            }
        } catch (\PDOException $th) {
            throw new \Exception("Error de base de datos al guardar el ministerio: " . $th->getMessage());
        }
    }

    public function eliminar($id) {
        $sql = "DELETE FROM ministerio WHERE id = :id";
        try {
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(':id', $id, \PDO::PARAM_INT);
            $stm->execute();
            if ($stm->rowCount() === 0) {
                throw new Exception("No se pudo eliminar el ministerio con ID: $id");
            }
        } catch (\PDOException $th) {
            throw new \Exception("Error de base de datos al eliminar el ministerio: " . $th->getMessage());
        }
    }

    public function obtenerPorId($id){
        $sql = "SELECT * FROM ministerio WHERE id = :id";
        try{
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(":id", $id);
            $stm->execute();
            return $stm->fetch(\PDO::FETCH_ASSOC);
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
}
