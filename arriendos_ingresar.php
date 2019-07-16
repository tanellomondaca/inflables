<?php
    include 'conexion.php';
    #Datos del arriendo
    $arrendado_por = "";
    if(isset($_POST["arrendado_por"])){
        $arrendado_por = $_POST["arrendado_por"];
    }

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
        $color = "#FFA60B";
    }
    
    #Juegos seleccionados
    $juegos[][] = "";

    $cant_juegos = $_POST["cant_juegos"];

    for($i=0;$i<$cant_juegos;$i++){
        $juegos[$i][0] = $_POST["id".$i];
        $juegos[$i][1] = $_POST["nombre".$i];
    }

    #Ingresar arriendo
    $consulta = "INSERT INTO arriendo (id, fecha, fin, fecha_creacion, arrendado_por, rut_cliente, telefono, start, end, valor_total, abono, fecha_abono, saldo, estado, color, direccion, comuna, direccion_notas, comentarios, cobro_adicional, descuento, despacho) VALUES (NULL, '$fecha', '$fin', current_timestamp(), '".$arrendado_por."', '".$rut_cliente."', '".$telefono."', '".$start."', '".$end."', '".$valor_total."', '".$abono."', '".$fecha_abono."', '".$saldo."', '".$estado."', '".$color."', '".$direccion."', '".$comuna."', '".$direccion_notas."', '".$comentarios."', '$cobro_adicional', '$descuento', '$despacho')";

    $confirmacion = 0;

    if (mysqli_query($conexion,$consulta)) {
        $confirmacion = 0;  
    } else {
        exit("Error: " . $consulta . "<br>" . mysqli_error($conexion)) ;
        $confirmacion =1;
    }
    $id = mysqli_insert_id($conexion);
    //$consulta = "SELECT id FROM arriendo WHERE rut_cliente ='".$rut_cliente."' AND start='".$start."' AND calle='".$calle."' AND numero = '".$numero."'";

    //$resultado = mysqli_query($conexion,$consulta);
    //mysqli_data_seek ($resultado, 0);
    //$fila = mysqli_fetch_assoc($resultado); 
    
    for($i=0 ; $i < $cant_juegos ; $i++){
        $juegos_arriendo = "INSERT INTO juego_arriendo (id_arriendo, id_juego) VALUES ('".$id."', '".$juegos[$i][0]."')";
        if (mysqli_query($conexion,$juegos_arriendo)) {
            $confirmacion = 0;  
        } else {
            $confirmacion =1;
        }
    }
    
    if($confirmacion == 0){
        echo "Arriendo guardado exitosamente";
    }else{
        echo "Error: " . $consulta . "<br>" . mysqli_error($conexion);
        echo "Ocurrio un error. Intenté nuevamente.";
    }
    
?>