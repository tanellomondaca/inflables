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
            modificarJuegos($conexion);
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

    function modificarJuegos($conexion){
        //Seleccionar los juegos del arriendo en cuestion
        $id_arriendo =$_GET["id_arriendo"];
        $c = "SELECT * FROM juego_arriendo WHERE id_arriendo = '$id_arriendo'";
        $r1 = mysqli_query($conexion,$c);
        $contador = 0;
        $arriendo_juegos[] = "" ;
        
        while($juego = mysqli_fetch_array($r1)){
            $arriendo_juegos[$contador] = $juego["id_juego"];
            $contador++;
        }


        $fecha = $_GET['fecha'];
        $fin = "";
        if(isset($_GET["fin"])){
            $fin=$_GET["fin"];
        }else{
            $fin=$fecha;
        }
        //1. Seleccionar todos los juegos existentes
        $consulta = "SELECT nombre, id, valor_persona, valor_empresa, categoria FROM juego";
        $resultado1 = mysqli_query($conexion,$consulta);

        $juegos_todos[][] = "";
        $cont = 0;
        while($aux = mysqli_fetch_array( $resultado1 )){
            $juegos_todos[$cont][0] = $aux["nombre"];
            $juegos_todos[$cont][1] = $aux["id"];
            $juegos_todos[$cont][2] = $aux["valor_persona"];
            $juegos_todos[$cont][3] = $aux["valor_empresa"];
            $juegos_todos[$cont][4] = "Todo el día";
            $juegos_todos[$cont][5] = $aux["categoria"];
            $cont++;
        }
        $cont = 0;

        $juegos_arrendados[][] =""; 
        $juegos_disponibles[][] = "";
        //2. Seleccionar todos los juegos arrendados
                //Consultar por juegos arrendados más de un día
        $consulta_dias = "SELECT JA.id_juego, A.fecha, A.fin, A.start, A.end, J.categoria FROM juego J, juego_arriendo JA, arriendo A WHERE JA.id_arriendo = A.id";
        $result_dias = mysqli_query($conexion,$consulta_dias);
        $linea=0;
        while($juegos = mysqli_fetch_array($result_dias)){
            $z=0;
            //Fechas de consulta
            $fecha_aux = strtotime($fecha);
            $fin_aux = strtotime($fin);
            //echo "Fechas de consulta: ".date ( 'Y-m-j' , $fecha_aux )." / ".date ( 'Y-m-j' , $fin_aux )."<br>";
            while($fecha_aux<=$fin_aux){
                $i = date ( 'Y-m-j' , $fecha_aux );
                
                if($i==$juegos['fecha'] || $i==$juegos['fin']){
                        $z=1;
                }
                //echo $i." ".$z."<br>";
                $fecha_aux = strtotime('+1 day',$fecha_aux);
                
            }
            if($z==1){
                
                $juegos_arrendados[$cont][1] = $juegos["id_juego"];
                $inicio = strtotime($juegos['fecha']);
                $fin_j = strtotime($juegos['fin']);
                $juegos_arrendados[$cont][2] = "-----------".date("d/m",$inicio);
                $juegos_arrendados[$cont][3] = "-----------".date("d/m",$fin_j);
                $juegos_arrendados[$cont][5] = $juegos["categoria"];
                $cont++;
            }
            //}
            $linea++;
            //echo "<br>";
        }

        $consulta = "SELECT JA.id_juego, A.start, A.end, J.categoria FROM juego J, juego_arriendo JA, arriendo A WHERE JA.id_arriendo = A.id AND A.fecha = '".$fecha."'";
        $resultado2 = mysqli_query($conexion,$consulta);
        
        if(mysqli_num_rows($resultado2) != 0 || $cont >0 ){
            while($aux = mysqli_fetch_array( $resultado2 )){
                $juegos_arrendados[$cont][1] = $aux["id_juego"];
                $juegos_arrendados[$cont][2] = $aux["start"];
                $juegos_arrendados[$cont][3] = $aux["end"];
                $juegos_arrendados[$cont][5] = $aux["categoria"];
                $cont++;
            }
            //3. Comparar ambas listas y colocar juegos disponibles en una nueva lista
            $cont = 0;
            
            for($i=0;$i<count($juegos_todos);$i++){
                $validador = 0; //Si este contador permanec en cero significa que el juego no esta en la lista de arrendados
                for($j=0;$j<count($juegos_arrendados);$j++){
                    if($juegos_todos[$i][1] == $juegos_arrendados[$j][1]){
                        $fila = $j;
                        $validador = 1;
                    }
                }
                if($validador==0){ //Juego no arrendado
                    $juegos_disponibles[$cont][0] = $juegos_todos[$i][0];
                    $juegos_disponibles[$cont][1] = $juegos_todos[$i][1];
                    $juegos_disponibles[$cont][2] = $juegos_todos[$i][2];
                    $juegos_disponibles[$cont][3] = $juegos_todos[$i][3];
                    $juegos_disponibles[$cont][4] = "Todo el día";
                    $juegos_disponibles[$cont][5] = $juegos_arrendados[$cont][5];
                    $cont++;
                }elseif($validador==1){ //Juego arrendado
                    $juegos_disponibles[$cont][0] = $juegos_todos[$i][0];
                    $juegos_disponibles[$cont][1] = $juegos_todos[$i][1];
                    $juegos_disponibles[$cont][2] = $juegos_todos[$i][2];
                    $juegos_disponibles[$cont][3] = $juegos_todos[$i][3];
                    $juegos_disponibles[$cont][4] = "Arrendado entre: ".substr($juegos_arrendados[$fila][2],11,5)." - ".substr($juegos_arrendados[$fila][3],11,5);
                    $juegos_disponibles[$cont][5] = $juegos_arrendados[$cont][5];
                    $cont++;
                }
            }
        }else{
                $juegos_disponibles = $juegos_todos;
        }



        //4. Imprimir
        if(count($juegos_disponibles) !=0 && $juegos_disponibles != ""):
        ?>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Categoria</th>
                <th>Disponibilidad</th>
                <th>Valor</th>
                <th>Valor empresa</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Nombre</th>
                <th>Categoria</th>
                <th>Disponibilidad</th>
                <th>Valor</th>
                <th>Valor empresa</th>
            </tr>
        </tfoot>
        <tbody>
            <?php for($i=0;$i<count($juegos_disponibles);$i++):?>
            <tr>
                <td>
                    <div class="custom-control custom-checkbox mt-2 juego"> 
                        <input type="checkbox" class="custom-control-input"
                            data-id="<?php echo $juegos_disponibles[$i][1]; ?>"
                            data-nombre="<?php echo $juegos_disponibles[$i][0]; ?>" 
                            data-valor="<?php echo $juegos_disponibles[$i][2]; ?>"
                            data-empresa = "<?php echo $juegos_disponibles[$i][3]; ?>" 
                            value="<?php echo $juegos_disponibles[$i][0]; ?>" 
                            name="<?php echo $juegos_disponibles[$i][0]; ?>" 
                            id="<?php echo $juegos_disponibles[$i][0]."&id=".$juegos_disponibles[$i][1]; ?>" 
                            <?php
                                for($x=0; $x<$contador; $x++){
                                    if($juegos_disponibles[$i][1]==$arriendo_juegos[$x]){
                                        echo "checked";
                                    }
                                }
                            ?>
                            >
                        <label class="custom-control-label" for="<?php echo $juegos_disponibles[$i][0]."&id=".$juegos_disponibles[$i][1]; ?>"> <?php echo $juegos_disponibles[$i][0]; ?> </label>
                    </div>
                </td>
                <td><?= $juegos_disponibles[$i][5]; ?></td>
                <td><?= $juegos_disponibles[$i][4]; ?></td>
                <td><?php echo $juegos_disponibles[$i][2]; ?></td>
                <td><?php echo $juegos_disponibles[$i][3]; ?></td>
            </tr>
            <?php endfor; ?>
        </tbody>


        <?php endif; 
        }   
?>