<?php
    include 'conexion.php';

    $rut = $_POST["rut"];
    $clave = $_POST["clave"];

    $consulta = "SELECT * FROM trabajador";
    $resultado = mysqli_query($conexion,$consulta);
    $flag = 0;
    while($trabajador=mysqli_fetch_array($resultado)){
        if($trabajador["rut"] == $rut && $trabajador["clave"] == $clave){
            if($trabajador["oficina"]=="si"){
                header("Location: http://pdc.arcadesamuel.cl/clientes.php");
                $flag = 1;
            }
        }
    }
    if($flag==0){
        header("Location: http://pdc.arcadesamuel.cl");
    }
    
?>