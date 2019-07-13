<?php
    include 'conexion.php';

    $v = $_GET['v'];

    switch ($v){
        case 1:
            //Usado por arriendos.js en ariendos.php para ingresar abono
            insAbono();
    }

    function insAbono(){
        $id = $_POST["id_arriendo"];
        $abono = $_POST["abono_abono"];
        $saldo = $_POST["saldo"];
        $fecha_abono = $_POST["fecha_abono"];

        $estado = "pendiente";
        $color = "yellow";

        if($saldo == 0){
            $estado = "pagado";
            $color = "green";
        }

        $consulta = "UPDATE arriendo SET abono = '$abono', fecha_abono = '$fecha_abono', saldo = '$saldo', estado = '$estado', color = '$color' WHERE arriendo.id ='$id' ";
        
        if (mysqli_query($conexion,$consulta)) {
            echo "Abono ingresado exitosamente";  
        } else {
            exit("Error: " . $consulta . "<br>" . mysqli_error($conexion)) ;
        }
    } 
    
  

?>