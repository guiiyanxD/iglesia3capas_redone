<?php
require_once("../negocio/cargo/ncargo.php");

class PCargo {

    private $ncargo;

    public function __construct(){
        $this->ncargo = new NCargo();
    }
    
    public function listar(){
        $cargos = $this->ncargo->listar();
        require 'cargo.html';
    }

    public function guardar($nombre, $descripcion){
        try {
            $this->ncargo->guardar($nombre, $descripcion);
            header("Location: /pcargo");    
        } catch (Exception $e) {
            echo "Error al guardar el cargo: " . $e->getMessage();
        }

    }
    public function editar($id){
        try{
            $cargo = $this->ncargo->editar($id);
            require 'editar.html';
        }catch(Exception $e) {
            echo "Error al editar el cargo: " . $e->getMessage();
        }
    }

    public function actualizar($id, $nombre, $descripcion){
        try {
            $this->ncargo->actualizar($id, $nombre, $descripcion);
            header("Location: /pcargo");
        } catch (Exception $e) {
            echo "Error al actualizar el cargo: " . $e->getMessage();
        }
    }

    public function eliminar($id){
        try{
            $this->ncargo->eliminar($id);
            header("Location: /pcargo");
        }catch(Exception $e) {
            echo "Error al eliminar el cargo: " . $e->getMessage();
        }
    }
}