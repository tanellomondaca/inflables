<?php
    include 'conexion.php';
    $fecha = $_GET['fecha'];

    $consulta = "SELECT * FROM arriendo WHERE fecha = '$fecha' OR fin = '$fecha'";
    $resultado = mysqli_query($conexion,$consulta);
?>
<table class="table table-bordered" width="100%" cellspacing="0" id="eventosDia">
    <thead>
        <th>Juegos</th>
        <th>Inicio</th>
        <th>Fin</th>
        <th>Dirección</th>
        <th>Comuna</th>
    </tr>
<?php
    while($evento = mysqli_fetch_array( $resultado )):
?>
    <tr>
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
        <td> <?php
                if($evento['fin']!=$evento['fecha'] && $evento['fin']==$fecha){
                    echo "SOLO RETIRO";
                }else{  
                    echo substr($evento['start'],11,5); 
                }
            ?> 
        </td>
        <td> <?php
                if($evento['fin']!=$evento['fecha'] && $evento['fecha']==$fecha){
                    echo "SOLO INSTALACION";
                }else{  
                    echo substr($evento['end'],11,5); 
                }
            ?> 
        </td>
        <td> <?php echo $evento['direccion'];?> </td>
        <td> <?php echo $evento['comuna'];?> </td>
    </tr>
<?php endwhile; ?>
</table>