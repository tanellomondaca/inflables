<?php
    //esta variable se recibe desde el js y se modifica
    $v = $_GET['v'];

    include "conexion.php";
    $consulta = "SELECT * FROM cliente_persona";
    $resultado = mysqli_query($conexion,$consulta);

    $consulta_comuna = "SELECT * FROM comuna";
    $comunas = mysqli_query($conexion,$consulta_comuna);

    #Primer caso: v = 1 -> LLenar tabla de clientes
    if($v==1):
?>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Empresa</th>
                <th>RUT</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Telefono</th>
                <th>Dirección</th>
                <th>Comuna</th>
                <th>Correo</th>
            </tr>
        <tfoot>
            <tr>
                <th>Empresa</th>
                <th>RUT</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Telefono</th>
                <th>Dirección</th>
                <th>Comuna</th>
                <th>Correo</th>
            </tr>
        </tfoot>
        </thead>

        <tbody>
    <?php while ($columna = mysqli_fetch_array( $resultado )): ?>
            <tr>
                <td><?php 
                        if($columna['empresa']=="si"){
                            echo $columna['razon_social'];
                        }else{
                            echo "No.";
                        }
                    ?>   
                </td>
                <td><?php echo $columna['rut']; ?></td>
                <td><?php echo $columna['nombre']; ?></td>
                <td><?php echo $columna['apellido']; ?></td>
                <td><?php echo $columna['telefono']; ?></td>
                <td><?php echo $columna['direccion']; ?></td>
                <td><?php echo $columna['comuna']; ?></td>
                <td><?php echo $columna['correo']; ?></td>
            </tr>
    <?php endwhile; ?>
        </tbody>
    </table>
<?php
    #Fin Primer caso#

    #Segundo caso: v = 2 ->Agregar cliente 
    elseif($v==2):
        //Poner una variable para ver si es empresa
        if(isset($_GET["e"]) && $_GET["e"]==1){
            $razon_social = $_POST["razon_social"];
            $empresa = 1;
        }else{
            $razon_social = "";
            $empresa = 0;
        }
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $rut = $_POST["rut"];
        $correo = $_POST["correo"];
        $fecha_nac = $_POST["fecha_nac"];
        $telefono = $_POST["telefono"];
        $direccion = $_POST["direccion"];
        $comuna = $_POST["comuna"];
        $clave = $_POST["clave"];

        $sql_agregar = "INSERT INTO `cliente_persona` (`rut`, `nombre`, `apellido`, `telefono`, `fecha_nac`, `direccion`, `comuna`, `correo`, `clave`, `empresa`, `razon_social`) VALUES ('".$rut."', '".$nombre."', '".$apellido."', '".$telefono."', '".$fecha_nac."', '".$direccion."', '".$comuna."', '".$correo."', '".$clave."', '".$empresa."', '".$razon_social."')";

        if (mysqli_query($conexion,$sql_agregar)) {
            echo "Cliente ingresado exitosamente.";  
          #header('Location: clientes.php#banner?exito=1');
        } else {
            echo "Error: " . $consulta . "<br>" . mysqli_error($conexion);
        }
    #LLenado de comunas: v = 3 
    elseif($v==3):
?>
        <select class="custom-select form-control" name="comuna" id="comuna">
            <option value="Prueba" selected>Comuna</option>
        <?php while ($columna = mysqli_fetch_array( $comunas )): ?>
            <option value="<?php echo $columna["nombre"] ?>" ><?php echo $columna["nombre"] ?></option>
        <?php endwhile; ?>
        </select>
<?php
    #Llenar opciones de modificar y eliminar
    elseif($v==4):
        $cont=0;
?>        
        <select class="custom-select custom-control" name="rut_modificar" id="rut_modificar">
            <option value="" selected>Rut</option>
        <?php while ($columna = mysqli_fetch_array( $resultado )): ?>
            <option value="<?php echo $columna["rut"] ?>" data-info="<?php echo $cont; $cont++; ?>" ><?php echo $columna["nombre"]." ".$columna["apellido"]." ".$columna["rut"]."  ".$columna["razon_social"]; ?></option>
        <?php endwhile; ?>
        </select>
<?php
    #Mostrar formulario para modificar
    elseif($v==5):
        $rut_modificar = $_GET["rut_modificar"];

        $consulta = "SELECT * FROM cliente_persona WHERE rut = '".$rut_modificar."'";
        $resultado = mysqli_query($conexion,$consulta);

        mysqli_data_seek ($resultado, 0);
        $fila = mysqli_fetch_assoc($resultado);
?>
        <form class="user" id="form_modificar" method="POST">
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="nombre" id="nombre"
                        placeholder="Nombre" value="<?php echo $fila["nombre"]; ?>">
                </div>
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" name="apellido" id="apellido"
                        placeholder="Apellido" value="<?php echo $fila["apellido"]; ?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="rut" id="rut"
                    placeholder="Rut: 19.123.456-0" value="<?php echo $fila["rut"]; ?>">
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="email" class="form-control form-control-user" name="correo" id="correo"
                    placeholder="Correo electrónico" value="<?php echo $fila["correo"]; ?>">
                </div> 
            </div>
            <div class="form-group row">
                <div class="col-lg-2 col-md-6">
                    <h6 class="mt-3 font-weight-bold text-primary">
                    Fecha de nacimiento
                    </h6>
                </div>
                <div class="col-lg-4 col-md-6 mb-3">
                    <input type="date" class="form-control form-control-user" name="fecha_nac"
                        id="fecha_nac" placeholder="" value="<?php echo $fila["fecha_nac"]; ?>">
                </div>
                <div class="col-lg-6 col-md-12 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="telefono"
                        id="telefono"
                        placeholder="Telefono" value="<?php echo $fila["telefono"]; ?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-6 col-md-6 mb-3">
                    <input type="text" class="form-control form-control-user" name="direccion"
                        id="direccion"
                        placeholder="Direccion" value="<?php echo $fila["direccion"]; ?>">
                </div>
                <div class="col-lg-2 col-md-4">
                    <h6 class="mt-3 font-weight-bold text-primary">
                    Comuna
                    </h6>
                </div>
                <div class="col-lg-4 col-md-8 mt-2">
                    <select class="custom-select form-control" name="comuna" id="comuna">
                        <option value="Prueba">Comuna</option>
                    <?php while ($columna = mysqli_fetch_array( $comunas )): 
                            if($fila["comuna"]== $columna["nombre"]):?>
                                <option value="<?php echo $columna["nombre"] ?>" selected ><?php echo $columna["nombre"] ?></option>
                            <?php else: ?>
                            <option value="<?php echo $columna["nombre"] ?>" ><?php echo $columna["nombre"] ?></option>
                    <?php endif;
                          endwhile; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row" id="div_cont">
                <div class="col-lg-6 mb-3">
                    <input type="text" class="form-control form-control-user" name="clave" id="clave"
                        placeholder="Clave de ingreso" value="<?php echo $fila["clave"]; ?>">
                </div>
                <div class="col-lg-6">
                     <input type="text" class="form-control form-control-user" name="razon_social" id="razon_social"
                        placeholder="Razon social" value="<?php echo $fila["razon_social"]; ?>">
                </div>
            </div>
            <button onclick="guardarModificacion()" class="btn btn-primary btn-user btn-block" id="btn_agregar">
            Guardar Cambios
            </button>
        </form>
<?php
    #Actualizar datos de un cliente
    elseif($v==6):
        $rut_modificar = $_GET["rut_modificar"];

        $razon_social = $_POST["razon_social"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $rut = $_POST["rut"];
        $correo = $_POST["correo"];
        $fecha_nac = $_POST["fecha_nac"];
        $telefono = $_POST["telefono"];
        $direccion = $_POST["direccion"];
        $comuna = $_POST["comuna"];
        $clave = $_POST["clave"];

        $consulta = "UPDATE `cliente_persona` SET `rut` = '".$rut."', `nombre` = '".$nombre."', `apellido` = '".$apellido."', `telefono` = '".$telefono."', `fecha_nac` = '".$fecha_nac."', `direccion` = '".$direccion."', `comuna` = '".$comuna."', `correo` = '".$correo."', `clave` = '".$clave."', `razon_social` = '".$razon_social."' WHERE `cliente_persona`.`rut` = '".$rut_modificar."'";
        
        if (mysqli_query($conexion,$consulta)) {
            echo "Cliente modificado exitosamente.";  
          #header('Location: clientes.php#banner?exito=1');
        } else {
            echo "Error: " . $consulta . "<br>" . mysqli_error($conexion);
        }
    elseif($v==7):
        $rut_eliminar = $_GET["rut_eliminar"];

        $consulta = "DELETE FROM `cliente_persona` WHERE `cliente_persona`.`rut` = '".$rut_eliminar."'";

        if (mysqli_query($conexion,$consulta)) {
            echo "Cliente eliminado exitosamente.";  
        } else {
            echo "Error: " . $consulta . "<br>" . mysqli_error($conexion);
        }
    
    #Opcion para arriendo_nuevo.html // arriendos.js    
    elseif($v==8):
        $rut_cliente = $_GET["rut_cliente"];

        $consulta = "SELECT direccion, comuna, telefono FROM cliente_persona WHERE rut = '".$rut_cliente."'";
        $resultado = mysqli_query($conexion,$consulta);

        mysqli_data_seek ($resultado, 0);
        $fila = mysqli_fetch_assoc($resultado);
?>
        <form class="user" id="form_datos_envio" method="POST">
            <div class="form-group row">
                <div class="col-lg-2 col-md-4">
                    <h6 class="mt-3 font-weight-bold text-primary">
                    Comuna
                    </h6>
                </div>
                <div class="col-lg-4 col-md-8 mt-2">
                    <select class="custom-select form-control mb-2" name="comuna" id="comuna_envio">
                        <option value="Prueba">Comuna</option>
                    <?php while ($columna = mysqli_fetch_array( $comunas )): 
                            if($fila["comuna"]== $columna["nombre"]):?>
                                <option data-valor="<?php echo $columna["costo_despacho"] ?>" value="<?php echo $columna["nombre"] ?>" selected ><?php echo $columna["nombre"] ?></option>
                            <?php else: ?>
                            <option data-valor="<?php echo $columna["costo_despacho"] ?>" value="<?php echo $columna["nombre"] ?>" ><?php echo $columna["nombre"] ?></option>
                    <?php endif;
                          endwhile; ?>
                    </select>
                </div>

                <div class="col-lg-6 col-md-6 mb-3">
                    <input type="text" class="form-control form-control-user" name="direccion"
                        id="direccion_envio"
                        placeholder="Direccion" value="<?php echo $fila["direccion"]; ?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-6 col-md-6 mb-3">
                    <input type="text" class="form-control form-control-user" name="direccion_notas"
                        id="direccion_notas"
                        placeholder="Detalles de la direccion: Block, depto, parcela, referencias, etc" value="">
                </div>    
                 <div class="col-lg-6 col-md-12 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="telefono_envio"
                        id="telefono_envio"
                        placeholder="Telefono" value="<?php echo $fila["telefono"]; ?>">
                </div>
            </div>
            
        </form>   
<?php
    endif;        
?>
