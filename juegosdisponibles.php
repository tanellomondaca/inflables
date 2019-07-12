<?php    
    include "conexion.php";
    $fecha = "2019-06-18";   //$_GET['fecha'];
    //1. Seleccionar todos los juegos existentes
        $consulta = "SELECT nombre, id, valor_persona FROM juego";
        $resultado1 = mysqli_query($conexion,$consulta);

        $juegos_todos = "";
        $cont = 0;
        while($aux = mysqli_fetch_array( $resultado1 )){
            $juegos_todos[$cont][0] = $aux["nombre"];
            $juegos_todos[$cont][1] = $aux["id"];
            $juegos_todos[$cont][2] = $aux["valor_persona"];
            $cont++;
        }
        $cont = 0;
    //2. Seleccionar todos los juegos arrendados
        $consulta = "SELECT JA.nombre_juego, JA.id_juego FROM juego_arriendo JA, arriendo A WHERE JA.id_arriendo = A.id AND A.fecha = '".$fecha."'";
        $resultado2 = mysqli_query($conexion,$consulta);
        
        $juegos_arrendados =""; 
        
        $juegos_disponibles = "";

        if(mysqli_num_rows($resultado2) != 0){
            while($aux = mysqli_fetch_array( $resultado2 )){
                $juegos_arrendados[$cont][0] = $aux["nombre_juego"];
                $juegos_arrendados[$cont][1] = $aux["id_juego"];
                $cont++;
                
            }
            //3. Comparar ambas listas y colocar juegos disponibles en una nueva lista
            $cont = 0;
            
            for($i=0;$i<count($juegos_todos);$i++){
                $validador = 0; //Si este contador permanec en cero significa que el juego no esta en la lista de arrendados
                for($j=0;$j<count($juegos_arrendados);$j++){
                    if($juegos_todos[$i][0] == $juegos_arrendados[$j][0]){
                        if($juegos_todos[$i][1] == $juegos_arrendados[$j][1]){
                            $validador = 1;
                        }
                    }
                }
                if($validador==0){
                    $juegos_disponibles[$cont][0] = $juegos_todos[$i][0];
                    $juegos_disponibles[$cont][1] = $juegos_todos[$i][1];
                    $juegos_disponibles[$cont][2] = $juegos_todos[$i][2];
                    $cont++;
                }

             }
        }else{
            $juegos_disponibles = $juegos_todos;
        }



    //4. Imprimir
    
?>
<table>
            <thead>
        <tr>
            <th>Seleccionar</th>
            <th>Nombre</th>
            <th>Valor</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>Seleccionar</th>
            <th>Nombre</th>
            <th>Valor</th>
        </tr>
        </tfoot>
        <tbody>
            <?php for($i=0;$i<count($juegos_disponibles);$i++):?>
            <tr>
                <td><div align="center"><input class="form-check-input" type="checkbox" value="<?php echo $juegos_disponibles[$i][0]; ?>" id="<?php echo $juegos_disponibles[$i][0];?>"></div></td>
                <td><?php echo $juegos_disponibles[$i][0]; ?></td>
                <td><?php echo $juegos_disponibles[$i][2]; ?></td>
            </tr>
            <?php endfor; ?>
        </tbody>
</table>
