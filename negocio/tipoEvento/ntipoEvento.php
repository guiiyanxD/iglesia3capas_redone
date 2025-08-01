<?php 
require_once('../dato/tipoEvento/dtipoEvento.php');

class NTipoEvento{
    private $dtipoevento;

    public function __construct(){
        $this->dtipoEvento = new DTipoEvento();
    }

    public function listar(){
        return $this->dtipoEvento->listar();
    }

    public function guardar($nombre, $frecuencia, $descripcion){
        if(strlen($nombre) > 5 && strlen($frecuencia) > 5 && strlen($descripcion) > 5 ){
            return $this->dtipoEvento->guardar($nombre, $frecuencia, $descripcion);
        }else{
            throw new Exception("Error al guardar Negocio");
        }
    }

    public function eliminar($id){
        return $this->dtipoEvento->eliminar($id);

    }

    public function editar($id){
        return $this->obtenerPorId($id);
       
    }

    public function obtenerPorId($id){
        $result = $this->dtipoEvento->obtenerPorId($id);
        if(!empty($result)){
            return $result;
        }else{
            throw new Exception("Tipo de evento no encontrado con ID: " . $id);
        }
    }

    public function actualizar($id, $nombre, $frecuencia, $descripcion){
        if (empty($id) || empty($nombre) || empty($frecuencia) || empty($descripcion)) {
            throw new Exception("Los campos ID, nombre, frecuencia y descripción son obligatorios.");
        }
        if (strlen($nombre) < 2 || strlen($frecuencia) < 2 || strlen($descripcion) < 5) {
            throw new Exception("Los campos nombre, frecuencia y descripción son demasiado cortos.");
        }
        $this->dtipoEvento->actualizar($id, $nombre, $frecuencia, $descripcion);
    }
}