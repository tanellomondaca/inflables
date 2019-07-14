<?php
    include 'conexion.php';

    $v = $_GET['v'];

    switch ($v){
        case 1:
            //Usado por arriendos.js en ariendos.php para ingresar abono
            insAbono();
        case 2:
            //arriendos.php - arriendos.js
            modificarArriendo();

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
    
    function modificarArriendo(){
        $id_arriendo = $_POST["id_arriendo"];

        $fecha = $_POST["fec_arriendo"];
        $fin = $_POST["fin_arriendo"];
        $rut_cliente = $_POST["rut_arriendo"];
        $start = $fecha." ".$_POST["hora_inicio"];
        $end = $fin." ".$_POST["hora_termino"];
        $telefono = $_POST["telefono"];

        $despacho = $_POST["valor_despacho"];
        $valor_total = $_POST["valor_total"];
        $cobro_adicional = $_POST["cobro_adicional"];
        $descuento = $_POST["descuento"];
        $abono = $_POST["abono"];

        $fecha_abono = $_POST["fecha_abono"];
        $saldo = $_POST["saldo"];

        $direccion = $_POST["direccion"];
        $comuna = $_POST["comuna"];
        $direccion_notas = $_POST["dir_notas"];

        $comentarios = $_POST["comentarios"];

        ///////////////////
        $color = ""; //Segun estado: prearrendado, abonado, o pagado
        $estado = "";
        if($abono == 0){
            $estado = "pre-arrendado";
            $color = "red";
        }elseif($saldo==0){
            $estado = "pagado";
            $color = "green";
        }else{
            $estado = "pendiente";
            $color = "yellow";
        }

        #Ingresar arriendo
        $consulta = "UPDATE arriendo SET fecha = '$fecha', fin = '$fin', telefono = '$telefono', start = '$start', end = '$end', valor_total = '$valor_total', cobro_adicional = '$cobro_adicional', descuento = '$descuento', despacho = '$despacho', abono = '$abono', fecha_abono = '$fecha_abono', saldo = '$saldo', estado = '$estado', color = '$color', direccion = '$direccion', comuna = '$comuna', direccion_notas = '$direccion_notas', comentarios = '$comentarios' WHERE arriendo.id = '$id_arriendo' ";

        $confirmacion = 0;

        if (mysqli_query($conexion,$consulta)) {
            $confirmacion = 0; 
        } else {
            exit("Error: " . $consulta . "<br>" . mysqli_error($conexion)) ;
            $confirmacion =1;
        }
    }
    
  

?>