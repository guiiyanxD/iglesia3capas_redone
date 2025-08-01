<?php
require_once("../presentacion/cargo/pcargo.php");
require_once("../presentacion/tipoEvento/ptipoEvento.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_SERVER['REQUEST_URI'] === '/') {
    require_once("../home.html");
    return;
}
/**
 * Aqui empiezan las rutas de Cargo
 */
if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_SERVER['REQUEST_URI'] === '/pcargo') {
    $pcargo = new PCargo();
    $pcargo->listar();
    return;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SERVER['REQUEST_URI'] === '/pcargo/guardar') {
    $pcargo = new PCargo();
    $pcargo->guardar($_REQUEST['nombre_cargo'], $_REQUEST['descripcion_cargo']);
    return;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SERVER['REQUEST_URI'] === '/pcargo/actualizar') {
    $pcargo = new PCargo();
    $pcargo->actualizar($_REQUEST['id_cargo'], $_REQUEST['nombre_cargo'], $_REQUEST['descripcion_cargo']);
    return;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && preg_match('/^\/pcargo\/editar\/(\d+)$/', $_SERVER['REQUEST_URI'], $matches)) {
    $pcargo = new PCargo();
    $pcargo->editar($matches[1]);
    return;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && preg_match('/^\/pcargo\/eliminar\/(\d+)$/', $_SERVER['REQUEST_URI'], $matches)) {
    $pcargo = new PCargo();
    $pcargo->eliminar($matches[1]);
    return;
}

/**
 * Aqui comienzan las rutas de Tipo de Evento
 */

if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_SERVER['REQUEST_URI'] === '/ptipoEvento') {
    $ptipoEvento = new PTipoEvento();
    $ptipoEvento->listar();
    return;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SERVER['REQUEST_URI'] === '/ptipoEvento/guardar') {
    $ptipoEvento = new PTipoEvento();
    $ptipoEvento->guardar($_REQUEST['nombre_tipo_evento'], $_REQUEST['frecuencia_tipo_evento'], $_REQUEST['descripcion_tipo_evento']);
    return;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && preg_match('/^\/ptipoEvento\/editar\/(\d+)$/', $_SERVER['REQUEST_URI'], $matches)) {
    $ptipoEvento = new PTipoEvento();
    $ptipoEvento->editar($matches[1]);
    return;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && preg_match('/^\/ptipoEvento\/eliminar\/(\d+)$/', $_SERVER['REQUEST_URI'], $matches)) {
    $ptipoEvento = new PTipoEvento();
    $ptipoEvento->eliminar($matches[1]);
    return;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SERVER['REQUEST_URI'] === '/ptipoEvento/actualizar') {
    $ptipoEvento = new PTipoEvento();
    $ptipoEvento->actualizar($_REQUEST['id_tipo_evento'], $_REQUEST['nombre_tipo_evento'], $_REQUEST['frecuencia_tipo_evento'], $_REQUEST['descripcion_tipo_evento']);
    return;
}



