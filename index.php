<?php
include("db/Conexion.php");
require_once "./presentacion/cargo/pcargo.php";


if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_SERVER['REQUEST_URI'] === '/cargo') {
    $pcargo = new PCargo();
    $pcargo->listar();
    return;
}