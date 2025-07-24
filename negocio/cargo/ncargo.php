<?php
    require './negocio/cargo/ncargo.php';
    require './dato/cargo/dcargo.php';
class NCargo{
    private $dcargo;
    public function __construct(){
        $this->dcargo = new NCargo();
    }

    public function listar(){
        return $this->dcargo->listar();
    }
}