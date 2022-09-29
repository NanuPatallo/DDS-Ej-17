<?php

class Persona
{
    public $Id;
    public $Nombre;
    public $Apellido;
    public $NroDoc;
    public $Direccion;
    public $Email;

    public static function BuscarTodas()
    {
        $con = DataBase::getInstance();
        $sql = "select * from personas";
        $queryPersonas = $con->db->prepare($sql);
        $queryPersonas->execute();
        $queryPersonas->setFetchMode(PDO::FETCH_CLASS, 'Persona');

        $ListPersonasDevolver = array();

        foreach ($queryPersonas as $p) {
            $ListPersonasDevolver[] = $p;
        }
        return $ListPersonasDevolver;
    }

    public static function Buscar($id)
    {
        $con = DataBase::getInstance();
        $sql = "select * from personas where Id=:p1";
        $queryPersonas = $con->db->prepare($sql);
        $params = array("p1" => $id);
        $queryPersonas->execute($params);
        $queryPersonas->setFetchMode(PDO::FETCH_CLASS, 'Persona');

        foreach ($queryPersonas as $p) {
            return $p;
        }
    }

    public function Agregar()
    {
        $con = DataBase::getInstance();
        $sql = "insert into personas (Nombre,Apellido,NroDoc,Direccion,Email) values (:p1,:p2,:p3,:p4,:p5)";
        $queryPersonas = $con->db->prepare($sql);
        $params = array("p1" => $this->Nombre, "p2" => $this->Apellido, "p3" => $this->NroDoc, "p4" => $this->Direccion, "p5" => $this->Email);
        $queryPersonas->execute($params);
    }
}
