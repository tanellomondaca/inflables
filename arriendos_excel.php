<?php
    $fecha = $_GET['fecha'];
    header('Content-type: application/vnd.ms-excel;charset=iso-8859-15');
    header("Content-Disposition: attachment; filename=arriendos'$fecha'.xls");

    include 'conexion.php';
    

    $consulta = "SELECT * FROM arriendo WHERE fecha = '$fecha' OR fin = '$fecha'";
    $resultado = mysqli_query($conexion,$consulta);

?>
<table>
    <thead>
        <th></th>
        <th>Nombre</th>
        <th>Telefono</th>
        <th>Juegos</th>
        <th>Direccion</th>
        <th>Comuna</th>
        <th>Notas de direccion</th>
        <th>Inicio</th>
        <th>Fin</th>
        <th>Comentarios</th>
        <th>Saldo</th>
    </tr>
<?php
    while($evento = mysqli_fetch_array( $resultado )):
?>
    <tr>
        <td>
            <?php
                if($evento["fecha"] != $evento["fin"]){
                    if($fecha == $evento["fecha"] ){
                        echo "SOLO INSTALACION";
                    }elseif($fecha == $evento["fin"]){
                        ECHO "SOLO RETIRO";
                    }
                }
            ?>
        </td>
        <td>
            <?php
                $rut_cliente = $evento['rut_cliente'];
                $sql_cons = "SELECT * FROM cliente_persona WHERE rut = '$rut_cliente'";
                $resultado_cliente = mysqli_query($conexion, $sql_cons);
                mysqli_data_seek($resultado_cliente,0);
                $cliente = mysqli_fetch_assoc($resultado_cliente);
                echo $cliente["nombre"]." ".$cliente["apellido"];
            ?>
        </td>
        <td><?= $evento["telefono"]; ?></td>
        <td><?php
            $cons_juegos = "SELECT * FROM juego_arriendo JA, juego J WHERE JA.id_juego = J.id AND JA.id_arriendo = '".$evento["id"]."'";
            $result_juegos = mysqli_query($conexion,$cons_juegos);
            while($juegos = mysqli_fetch_array( $result_juegos) ){
                if($juegos["cantidad"]!=1){
                    echo $juegos["cantidad"]." ".$juegos["nombre"];
                }else{
                echo $juegos["nombre"];
                }
                echo "<br>";
            }
        ?>
        </td>
        <td> <?= $evento['direccion'];?> </td>
        <td> <?= $evento['comuna'];?> </td>
        <td> <?= $evento['direccion_notas'];?> </td>
        <td> <?= substr($evento['start'],11,5); ?> </td>
        <td> <?= substr($evento['end'],11,5);?> </td>
        <td> <?= $evento['comentarios'];?> </td>
        <td><?= $evento["saldo"]; ?></td>
        
    </tr>
<?php endwhile; ?>
</table>