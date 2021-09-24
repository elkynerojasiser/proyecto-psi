<!doctype html>
<?php
include_once '../../modelo/Dependencia.php';
include_once '../../modelo/conexion.php';
include_once '../../controlador/DependenciaController.php';
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <h1>Eliminar dependencia</h1>
                <?php
                    try{
                        if(!isset($_REQUEST["dep_id"])){
                            throw new Exception("Por favor ingrese el Id de la dependencia");
                        }

                        $dep_id = $_REQUEST["dep_id"];
                        

                        $dependencia = new Dependencia;
                        $dependencia->setDepId($dep_id);
                        

                        $DependenciaController = new DependenciaController;

                        $resultado = $DependenciaController->eliminar($dependencia);

                        if($resultado["type"] == "success"){
                            echo '<h2 class="text-center text-success" >' .$resultado["mensaje"].  '</h2>';
                        }else{
                            echo '<h2 class="text-center text-danger" >' .$resultado["mensaje"].  '</h2>';
                        }

                    }catch(Exception $ex){
                        echo $ex->getMessage();
                    }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <a href="/vista/dependencias/listarDependencias.php" class="btn btn-primary">Regresar al listado</a>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
  </body>
</html>