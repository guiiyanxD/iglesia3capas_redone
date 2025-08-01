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
        try{
            if( $activo !== -1 ){
                return $this->dministerio->guardar($nombre, $mision, $vision, $fechaCreacion, $activo);
            }else{
                throw new Exception("El campo 'Activo' debe ser seleccionado.");
            }
        }catch(Exception $e){
            echo "Error al guardar el ministerio: " . $e->getMessage();
        }
    }
}