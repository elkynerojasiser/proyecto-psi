<?php

class conexion {

    private $conexion;
    private $driver;
    private $db;
    private $host;
    private $port;
    private $user;
    private $password;

    function __construct() {
        $this->driver = "mysql";
        $this->db = "psi";
        $this->host = "127.0.0.1";
        $this->port = "3306";
        $this->user = "root";
        $this->password = "";
        $this->setConexion();
    }

    function setConexion() {
        try {
            $this->conexion = new PDO("mysql:host=$this->host;dbname=$this->db;port=$this->port",$this->user,$this->password);
        }catch(PDOException $pe){
            die("No fue posible realizar la conexion");
        }
    }

    function getConexion() {
        return $this->conexion;
    }

}