<?php

require_once "conexion.php";

Class Crud extends Conexion
{
    private $objPdo;

    public function __construct()
    {
        $this->objPdo = parent::conectar();
    }

    public function getData()
    {
        try {
            $sentencia = $this->objPdo->prepare("Select * from personas");
            $sentencia->execute();
            $sentencia->setFetchMode(PDO::FETCH_ASSOC);
            header("HTTP/1.1 200 OK");
            echo json_encode($sentencia->fetchAll());
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getDataById($id)
    {
        try {
            $sentencia = $this->objPdo->prepare("Select * from personas where idPersona = ?");
            $sentencia->execute(array($id));
            $sentencia->setFetchMode(PDO::FETCH_ASSOC);
            header("HTTP/1.1 200 OK");
            echo json_encode($sentencia->fetchAll());
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

$objControl = new Crud();

if($_SERVER['REQUEST_METHOD'] == 'GET')
{
    if(isset($_GET['id']))
    {
        $objControl->getDataById($_GET['id']);
    }
    else
    {
        $objControl->getData();
    }    
}