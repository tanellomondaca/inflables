<?php
    header('Content-type: application/json');
    include 'conexion.php';
    
    #Cambiar para internet---------------------------------------------------
    $pdo = new PDO("mysql:dbname=arcadesa_proyecto;host=200.24.13.65","arcadesa","ELJ5QZIW67RD");
    
    $consulta = $pdo->prepare("SELECT id, comuna, start, end, color FROM arriendo");
    $consulta->execute();

    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    function str_replace_json($search, $replace, $subject){ 
        return json_decode(str_replace($search, $replace,  json_encode($subject))); 
   }
   $prueba = str_replace_json("comuna","title",$resultado);

    echo json_encode($prueba);

?>

