<?php
    require '../dato/cargo/dcargo.php';
class NCargo{
    private $dcargo;
    public function __construct(){
        $this->dcargo = new DCargo();
    }

    public function listar(){
        return $this->dcargo->listar();
    }

    public function guardar($nombre, $descripcion){
        if (empty($nombre) || empty($descripcion)) {
            throw new Exception("Los campos nombre y descripción son obligatorios.");
        }
        if (strlen($nombre) < 2 || strlen($descripcion) < 5) {
            throw new Exception("Los campos nombre y descripción son demasiado cortos.");
        }
        //var_dump($nombre, $descripcion);
        $this->dcargo->guardar($nombre, $descripcion);
    }

    public function editar($id){
        return $this->obtenerPorId($id);
       
    }

    public function obtenerPorId($id){
        $result = $this->dcargo->obtenerPorId($id);
        if(!empty($result)){
            return $result;
        }else{
            throw new Exception("Cargo no encontrado con ID: " . $id);
        }
    }

    public function actualizar($id, $nombre, $descripcion){
        if (empty($id) || empty($nombre) || empty($descripcion)) {
            throw new Exception("Los campos ID, nombre y descripción son obligatorios.");
        }
        if (strlen($nombre) < 2 || strlen($descripcion) < 5) {
            throw new Exception("Los campos nombre y descripción son demasiado cortos.");
        }
        $this->dcargo->actualizar($id, $nombre, $descripcion);
    }

    public function eliminar($id){
        $this->dcargo->eliminar($id);
    }

}