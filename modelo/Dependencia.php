<?php

class Dependencia {

    private $dep_id;
    private $dep_nombre;

    function __construct() {

    }

    function setDepId($dep_id){
        $this->dep_id = $dep_id;
    }

    function setDepNombre($dep_nombre){
        $this->dep_nombre = $dep_nombre;
    }

    function getDepId() {
        return $this->dep_id;
    }

    function getDepNombre() {
        return $this->dep_nombre;
    }
}