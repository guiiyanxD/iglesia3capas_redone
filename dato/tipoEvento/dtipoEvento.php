<?php
require_once("../config/connection.php");
class DTipoEvento{
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

    public function listar(){
        $result = [];
        $sql = "SELECT * FROM tipoEvento";
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

    public function guardar($nombre, $frecuencia, $descripcion){
        $sql = "INSERT INTO tipoEvento (nombre, frecuencia, descripcion) VALUES (:nombre, :frecuencia, :descripcion)";
        try{
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(":nombre", $nombre);
            $stm->bindParam(":frecuencia", $frecuencia);
            $stm->bindParam(":descripcion", $descripcion);
            $stm->execute();
        }catch(\Exception $e){
                return $e->getMessage();
        }
    }

    public function eliminar($id){
        $sql = "DELETE FROM tipoEvento WHERE id = :id";
        try{
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(":id", $id);
            $stm->execute();
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function obtenerPorId($id){
        $sql = "SELECT * FROM tipoEvento WHERE id = :id";
        try{
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(":id", $id);
            $stm->execute();
            return $stm->fetch(\PDO::FETCH_ASSOC);
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function actualizar($id, $nombre, $frecuencia, $descripcion){
        $sql = "UPDATE tipoEvento SET nombre = :nombre, frecuencia = :frecuencia, descripcion = :descripcion WHERE id = :id";
        try{
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(":id", $id);
            $stm->bindParam(":nombre", $nombre);
            $stm->bindParam(":frecuencia", $frecuencia);
            $stm->bindParam(":descripcion", $descripcion);
            $stm->execute();
            return "Tipo de evento actualizado exitosamente.";
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
}