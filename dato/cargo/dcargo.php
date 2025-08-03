<?php
require_once ('../config/connection.php');

 class DCargo{
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
    public function guardar($nombre, $descripcion){
        $sql = 'INSERT INTO cargo (nombre, descripcion) VALUES (:nombre, :descripcion)';
        try {
            $st = $this->pdo->prepare($sql);
            $st->bindParam(':nombre', $nombre);
            $st->bindParam(':descripcion', $descripcion);
            $st->execute();
            return "Cargo guardado exitosamente.";
        } catch (\Exception $e) {
            return "Error al guardar el cargo: " . $e->getMessage();
        }
    }

    public function eliminar($id){
        $sql = "DELETE from cargo where id = :id";
        try{
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(':id', $id);
            $stm->execute();
            return "Cargo eliminado exitosamente.";
        }catch (\Exception $e){
            return "Error al eliminar el cargo: " . $e->getMessage();
        }
    }

    public function obtenerPorId($id){
        $result = [];
        $sql = "SELECT * FROM cargo where id = :id";
        try{
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(':id', $id);
            $stm->execute();
            $result = $stm->fetch(\PDO::FETCH_ASSOC);
            return $result;
        }catch (\Exception $e){
            return "Error al obtener el cargo: " . $e->getMessage();
        }
    }

    public function actualizar($id, $nombre, $descripcion){
        $sql = "UPDATE cargo SET nombre = :nombre, descripcion = :descripcion WHERE id = :id";
        try{
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(':id', $id);
            $stm->bindParam(':nombre', $nombre);
            $stm->bindParam(':descripcion', $descripcion);
            $stm->execute();
            return "Cargo actualizado exitosamente.";
        }catch (\Exception $e){
            return "Error al actualizar el cargo: " . $e->getMessage();
        }
    }
}