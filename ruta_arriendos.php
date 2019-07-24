
<?php
    #<!--ESTE PHP ES USADO PARA CONSULTAR LOS ARRIENDOS DE UN DÍA EN PARTICULAR -->

    include 'conexion.php';

    # 1. Recibir fecha para consultar por arriendo
    $fecha = $_GET['fecha'];
    # 2. Consultar arriendos para esa fecha
    $consulta = "SELECT * FROM arriendo WHERE fecha ='$fecha.' OR fin = '$fecha'";
    $resultado = mysqli_query($conexion,$consulta);


    # 3. Consultar los juegos de cada arriendo
    $nombre_juego = "";
    $info_arriendo = "";
    $cant_arr = 0; #cantidad de arriendos del día

    while($arriendo = mysqli_fetch_array($resultado) ){
        $nombre_juego[$cant_arr][0] = $arriendo["id"];

        $info_arriendo[$cant_arr][0] = $arriendo["start"];
        $info_arriendo[$cant_arr][1] = $arriendo["end"];
        $info_arriendo[$cant_arr][2] = $arriendo["calle"];
        $info_arriendo[$cant_arr][3] = $arriendo["comuna"];

        $cant_arr++;
    }

    for($i=0 ; $i<$cant_arr ; $i++){
        $cons_juegos = "SELECT nombre_juego FROM juego_arriendo WHERE id_arriendo = '".$nombre_juego[$i][0]."'";
        $resul_juegos = mysqli_query($conexion,$cons_juegos);

        for($j=1; $juegos = mysqli_fetch_array($resul_juegos) ; $j++ ){
            $nombre_juego[$i][$j] = $juegos["nombre_juego"];
        }
    }

    # 4. Escribir los arriendos al HTML

    #====================================================================================================#
    #======================Consultar trabajadores disponibles======================#
    # 1. Consultar trabajadores disponibles para trabajar
    $cons_trabajador = "SELECT * FROM trabajador";
    $resul_trabajador = mysqli_query($conexion,$cons_trabajador);

?>