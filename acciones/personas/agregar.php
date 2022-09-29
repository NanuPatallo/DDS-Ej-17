<?php

header('Content-type:application/json');

require_once '../../modelo/Persona.php';
require_once 'responses/agregarResponse.php';
require_once '../../configuracion/database.php';

$json = file_get_contents('php://input', true);
$req = json_decode($json);

$pAgregar = new Persona();
$pAgregar->Nombre = $req->Nombre;
$pAgregar->Apellido = $req->Apellido;
$pAgregar->NroDoc = $req->NroDoc;
$pAgregar->Direccion = $req->Direccion;
$pAgregar->Email = $req->Email;
$pAgregar->Agregar();

$res = new AgregarResponse();
$res->IsOk = true;

echo json_encode($res);
