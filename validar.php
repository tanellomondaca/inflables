<?php
    include 'conexion.php';

    $rut = $_POST["rut"];
    $clave = $_POST["clave"];

    $consulta = "SELECT * FROM trabajador";
    $resultado = mysqli_result($conexion,$consulta);
    $flag = 0;
    while($trabajador=mysqli_fetch_array($resultado)){
        if($trabajador["rut"] == $rut && $trabajador["clave"] == $clave){
            if($trabajador["oficina"]=="si"){
                Location:("http://pdc.arcadesamuel.cl/clientes.php");
            }
        }

    }
    
?>