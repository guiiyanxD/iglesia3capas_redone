<?php

class PCargo{
    private $ncargo;

    public function __construct(){
        $this->ncargo = new NCargo();
    }

    public function listar(){
        $listar = $this->ncargo->listar();
        require 'cargo.html';
    }
}
