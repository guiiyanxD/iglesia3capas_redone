<?php

require_once("../negocio/ministerio/nministerio.php");
class PMinisterio {
    private $nministerio;

    public function __construct(){
        $this->nministerio = new NMinisterio();
    }

    public function listar(){
        $ministerios = $this->nministerio->listar();
        include("ministerio.html");
    }

    public function guardar($nombre, $mision, $vision, $fechaCreacion, $activo){
        var_dump($nombre, $mision, $vision, $fechaCreacion, $activo);
        try{
            $this->nministerio->guardar($nombre, $mision, $vision, $fechaCreacion, $activo);
            header("Location: /pministerio");
        }catch(Exception $e){
            echo "Error al guardar el ministerio: " . $e->getMessage();
        }
    }
}
