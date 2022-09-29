<?php

header('Content-type:application/json');

require_once '../../modelo/Persona.php';
require_once 'responses/consultarxidResponse.php';
require_once '../../configuracion/database.php';

$id = $_GET['id'];
$resp = new ConsultarXIdResponses();
$resp->Persona = Persona::Buscar($id);

echo json_encode($resp);
