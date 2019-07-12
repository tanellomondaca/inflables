<?php
    include "../conexion.php";
    $tipo_cliente = $_POST['tipo_cliente'];

    if($tipo_cliente=="persona"){
            $nombre=$_POST['nombre'];
            $apellido=$_POST['apellido'];
            $rut=$_POST['rut'];
            $telefono=$_POST['telefono'];
            $dia=$_POST['dia'];
            $mes=$_POST['mes'];
            $ano=$_POST['ano'];
            $fechaNac=$ano."-".$mes."-".$dia;
            $direccion=$_POST['direccion'];
            $numero=$_POST['numero'];
            $comuna=$_POST['comuna'];
            $correo = $_POST['correo'];
            $clave = $_POST['clave'];
            

            $consulta = "INSERT INTO cliente_persona (rut,nombre,apellido,telefono,fecha_nac,calle,numero,comuna,correo,clave) VALUES ('".$rut."','".$nombre."','".$apellido."','".$telefono."','".$fechaNac."','".$direccion."','".$numero."','".$comuna."','".$correo."','".$clave."')";

            if (mysqli_query($conexion,$consulta)) {
                  echo "Cliente ingresado exitosamente.";  
            } else {
                  echo "Error: " . $consulta . "<br>" . mysqli_error($conexion);
            }
      }else{
            $razon = $_POST['razon_social'];
            $nombre_rep=$_POST['nombre_rep'];
            $apellido_rep=$_POST['apellido_rep'];
            $rut=$_POST['rut'];     
            $direccion=$_POST['direccion'];
            $numero=$_POST['numero'];
            $comuna=$_POST['comuna'];
            $correo = $_POST['correo'];
            $telefono=$_POST['telefono'];
            $clave = $_POST['clave'];

            $consulta = "INSERT INTO cliente_emp (rut,razon_social,nombre_rep,apellido_rep,calle,numero,comuna,correo,clave,telefono) VALUES ('".$rut."','".$razon."','".$nombre_rep."','".$apellido_rep."','".$direccion."','".$numero."','".$comuna."','".$correo."','".$clave."','".$telefono."')";
            if (mysqli_query($conexion,$consulta)) {
                  echo "Cliente ingresado exitosamente.";  
                  #header('Location: clientes.php#banner?exito=1');
            } else {
                  echo "Error: " . $consulta . "<br>" . mysqli_error($conexion);
            }
      }
?>