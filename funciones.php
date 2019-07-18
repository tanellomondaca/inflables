<?php
    include 'conexion.php';

    $v = $_GET['v'];

    switch ($v){
        case 1: //Usado por arriendos.js en ariendos.php para ingresar abono
            insAbono($conexion);
            exit();
        case 2: //arriendos.php - arriendos.js
            modificarArriendo($conexion);
            exit();
        case 3:
            modificarHorario($conexion);
            exit();
        case 4:
            eliminarJuegos($conexion);
            exit();
        case 5:
            agregarJuegos($conexion);
            exit();
    }

    function insAbono($conexion){
        $id = $_POST["id_arriendo"];
        $abono = $_POST["abono_abono"];
        $saldo = $_POST["saldo"];
        $fecha_abono = $_POST["fecha_abono"];

        $estado = "pendiente";
        $color = "#FFA60B";

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
    
    function modificarHorario($conexion){
        $id_arriendo = $_POST["id_arriendo"];

        $fecha = $_POST["fec_arriendo"];
        $fin = $_POST["fin_arriendo"];
        $rut_cliente = $_POST["rut_arriendo"];
        $start = $fecha." ".$_POST["hora_inicio"];
        $end = $fin." ".$_POST["hora_termino"];
        $telefono = $_POST["telefono"];

        $direccion = $_POST["direccion"];
        $comuna = $_POST["comuna"];
        $direccion_notas = $_POST["dir_notas"];

        $comentarios = $_POST["comentarios"];

        #Modificar arriendo (horario y telefono)
        $modificar_arriendo = "UPDATE arriendo SET fecha = '$fecha', fin = '$fin', telefono = '$telefono', start = '$start', end = '$end',  direccion = '$direccion', comuna = '$comuna', direccion_notas = '$direccion_notas', comentarios = '$comentarios' WHERE arriendo.id = '$id_arriendo' ";

        $confirmacion = 0;

        if (mysqli_query($conexion,$modificar_arriendo)) {
            $confirmacion = 0; 
            echo "Modificacion exitosa";
        } else {
            exit("Error: " . $modificar_arriendo . "<br>" . mysqli_error($conexion)) ;
            $confirmacion =1;
        }
    }

    function modificarArriendo($conexion){
        $id_arriendo = $_POST["id_arriendo"];

        $despacho = $_POST["valor_despacho"];
        $valor_total = $_POST["valor_total"];
        $cobro_adicional = $_POST["cobro_adicional"];
        $descuento = $_POST["descuento"];
        $abono = $_POST["abono"];

        $fecha_abono = $_POST["fecha_abono"];
        $saldo = $_POST["saldo"];

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

        #Modificar arriendo
        $modificar_arriendo = "UPDATE arriendo SET fecha = '$fecha', fin = '$fin', telefono = '$telefono', start = '$start', end = '$end', valor_total = '$valor_total', cobro_adicional = '$cobro_adicional', descuento = '$descuento', despacho = '$despacho', abono = '$abono', fecha_abono = '$fecha_abono', saldo = '$saldo', estado = '$estado', color = '$color', direccion = '$direccion', comuna = '$comuna', direccion_notas = '$direccion_notas', comentarios = '$comentarios' WHERE arriendo.id = '$id_arriendo' ";

        $confirmacion = 0;

        if (mysqli_query($conexion,$modificar_arriendo)) {
            $confirmacion = 0; 
            echo "Modificacion exitosa";
        } else {
            exit("Error: " . $modificar_arriendo . "<br>" . mysqli_error($conexion)) ;
            $confirmacion =1;
        }
    }

    function eliminarJuegos($conexion){
        $cantidad = $_POST["cantidad_juegos"];
        $id = $_POST["id_arriendo"];
        $j=0;
        $juegos[] = "";
        for($i=0; $i<$cantidad; $i++){
            $nombre = "juego".$i;
            if( isset($_POST[$nombre]) ){
                $juegos[$j] = $_POST[$nombre];
                $j++;
            }
        }
        if($j == 0){
            echo "No hay juegos seleccionados";
            exit();
        }
        $estado = 0;
        for($i=0; $i<$j; $i++){
            $sql_eliminar = "DELETE FROM juego_arriendo WHERE juego_arriendo.id_arriendo = '$id' AND juego_arriendo.id_juego = '".$juegos[$i]."' ";
            if(mysqli_query($conexion, $sql_eliminar)){
                $estado = 0;
            }else{
                $estado = 1;
            }
        }
        if($estado==0){
            echo "Juegos eliminados exitosamente";
        }else{
            echo "Error, intente nuevamente";
        }
        
    }

    function agregarJuegos($conexion){
        $cantidad = $_POST["cantidad_juegos"];
        $id = $_POST["id_arriendo"];
        $j=0;
        $juegos[][] = "";
        for($i=0; $i<$cantidad; $i++){
            $nombre = "juego".$i;
            $stock = "stock".$i;
            if( isset($_POST[$nombre]) ){
                $juegos[$j][0] = $_POST[$nombre];
                $juegos[$j][1] = $_POST[$stock];
                if($juegos[$j][1]==0){
                    $juegos[$j][1]=1;
                }

                $j++;
            }
        }
        if($j == 0){
            echo "No hay juegos seleccionados";
            exit();
        }
        $estado = 0;
        for($i=0; $i<$j; $i++){
            $sql_agregar = "INSERT INTO juego_arriendo (id_arriendo, id_juego, cantidad) VALUES ('$id', '".$juegos[$i][0]."', '".$juegos[$i][1]."')";
            if(mysqli_query($conexion, $sql_agregar)){
                $estado = 0;
            }else{
                $estado = 1;
            }
        }
        if($estado==0){
            echo "Juegos agregados exitosamente";
        }else{
            echo "Error, intente nuevamente";
        }
    }
?>