<?php

header('Content-type:application/json');

require_once '../../modelo/Persona.php';
require_once 'responses/consultarTodasResponse.php';
require_once '../../configuracion/database.php';

$res = new ConsultarTodasResponse();
$res->ListPersonas=Persona::BuscarTodas();

echo json_encode($res);