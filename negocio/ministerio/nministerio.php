<?php

require_once("../dato/ministerio/dministerio.php");

class NMinisterio{
    private $dministerio;

    public function __construct(){
        $this->dministerio = new DMinisterio();
    }

    public function listar(){
        return $this->dministerio->listar();
    }

    public function guardar($nombre, $mision, $vision, $fechaCreacion, $activo){
        //var_dump($nombre, $mision, $vision, $fechaCreacion, $activo);
        // 0 = false
        // 1 = true 
        $activoo = $activo == 1 ? true : false; 
        try{
            if( $activo !== -1 ){
                return $this->dministerio->guardar($nombre, $mision, $vision, $fechaCreacion, $activoo);
            }else{
                throw new Exception("El campo 'Activo' debe ser seleccionado.");
            }
        }catch(Exception $e){
            echo "Error al guardar el ministerio: " . $e->getMessage();
        }
    }

    public function eliminar($id){
        try{
            return $this->dministerio->eliminar($id); 
        }catch(Exception $e){
            echo "Error al eliminar el ministerio: " . $e->getMessage();
        }
    }

     public function editar($id){
        return $this->obtenerPorId($id);
       
    }

    public function obtenerPorId($id){
        $result = $this->dministerio->obtenerPorId($id);
        if(!empty($result)){
            return $result;
        }else{
            throw new Exception("Ministerio no encontrado con ID: " . $id);
        }
    }
}