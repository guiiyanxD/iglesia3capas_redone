<?php

require_once('../negocio/tipoEvento/ntipoEvento.php');

class PTipoEvento{
    private $ntipoEvento;

    public function __construct(){
        $this->ntipoEvento = new NTipoEvento();
    }

    public function listar(){
        $tipoEventos = [];
        try{
            $tipoEventos = $this->ntipoEvento->listar();
        }catch(Exception $e){
            echo " ". $e.getMesage();
        }

        include("tipoEvento.html");
    }

    public function guardar($nombre, $frecuencia, $descripcion){
        try{
            $this->ntipoEvento->guardar($nombre, $frecuencia, $descripcion);
            header("Location: /ptipoEvento");
        }catch(\Exception $e){
            echo $e->getMessage();
        }
    }

    public function editar($id){
        try{
            $tipoEvento = $this->ntipoEvento->editar($id);
            include_once("editar.html");
        }catch(\Exception $e){
            echo $e->getMessage();
        }
    }

    public function actualizar($id, $nombre, $frecuencia, $descripcion){
        try{
            $this->ntipoEvento->actualizar($id, $nombre, $frecuencia, $descripcion);
            header("Location: /ptipoEvento");
        }catch(\Exception $e){
            echo $e->getMessage();
        }
    }

    public function eliminar($id){
        try{
            $this->ntipoEvento->eliminar($id);
            header("Location: /ptipoEvento");
        }catch(\Exception $e){
            echo $e->getMessage();
        }
    }
}