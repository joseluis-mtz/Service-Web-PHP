<?php

class Conexion
{
	private $driver = "mysql";
	private $host = "localhost";
	private $user = "joseluis";
	private $password = "adminroot";
	private $database = "agenda";
	private $charset = "utf8";

	function __construct()
	{
	}

	protected function conectar()
	{
		try {
			$objConexion = new PDO("{$this->driver}: host={$this->host}; dbname={$this->database}; charset={$this->charset}", $this->user, $this->password);
			$objConexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $objConexion;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
}
