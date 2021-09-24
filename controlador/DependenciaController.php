<?php

class DependenciaController {


    private $conexion;

    function __construct() {
        $this->conexion = new conexion();
        $this->conexion->getConexion()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    function listar()
    {
        try {
            $sql = "select * from dependencia";
            $ps = $this->conexion->getConexion()->prepare($sql);
            $ps->execute(NULL);

            $resultado = [];

            while($row = $ps->fetch(PDO::FETCH_OBJ)){
                $dependencia = new Dependencia;
                $dependencia->setDepId($row->dep_id);
                $dependencia->setDepNombre($row->dep_nombre);
                array_push($resultado, $dependencia);
            }
            $this->conexion = null;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        return $resultado;
    }

    function crear($dependencia)
    {
        $resultado = [];
        try {
            $sql = "insert into dependencia values (?,?)";
            $ps = $this->conexion->getConexion()->prepare($sql);
            $ps->execute(array(
                $dependencia->getDepId(),
                $dependencia->getDepNombre()
            ));

            if($ps->rowCount() > 0){
                $mensaje = "Se creó la dependencia correctamente";
                $type    = "success";
            }else {
                $mensaje = "No se pudo crear la dependencia";
                $type    = "error";
            }
            $this->conexion = null;
        }catch(PDOException $e){
            $mensaje = "No se pudo crear la dependencia " .$e->getMessage();
            $type    = "error";
        }

        $resultado = [
            "mensaje" => $mensaje,
            "type"    => $type
        ];

        return $resultado;
    }

    function buscar($dep_id) 
    {
        try {
            $sql = "select * from dependencia where dep_id = ?";
            $ps = $this->conexion->getConexion()->prepare($sql);
            $ps->execute(array(
                $dep_id
            ));
            $resultado = [];
            while($row = $ps->fetch(PDO::FETCH_OBJ)) {
                $dependencia = new Dependencia;
                $dependencia->setDepId($row->dep_id);
                $dependencia->setDepNombre($row->dep_nombre);
                array_push($resultado,$dependencia);
            }

            $this->conexion = null;

        }catch(PDOException $e){
            echo "Ocurrio un error " . $e->getMessage();
        }

        return $resultado;
    }

    function actualizar($dependencia) {
        $resultado = [];

        $sql = "update dependencia set dep_nombre=? where dep_id=?";
        $ps = $this->conexion->getConexion()->prepare($sql);
        $ps->execute(array(
            $dependencia->getDepNombre(),
            $dependencia->getDepId()
        ));

        if($ps->rowCount() > 0){
            $mensaje = "Se actualizó correctamente la dependencia";
            $type = "success";
        }else {
            $mensaje = "No se pudo actualizar la dependencia";
            $type = "error";
        }
        
        $this->conexion = null;

        $resultado = [
            "mensaje" => $mensaje,
            "type"    => $type
        ];

        return $resultado;
    }

    function eliminar($dependencia)
    {
        $resultado = [];

        $sql = "delete from dependencia where dep_id=?";
        $ps = $this->conexion->getConexion()->prepare($sql);
        $ps->execute(array(
            $dependencia->getDepId()
        ));

        if($ps->rowCount() > 0){
            $mensaje = "Se eliminó correctamente la dependencia";
            $type = "success";
        }else {
            $mensaje = "No se pudo eliminar la dependencia";
            $type = "error";
        }
        
        $this->conexion = null;

        $resultado = [
            "mensaje" => $mensaje,
            "type"    => $type
        ];

        return $resultado;
    }
}