<?php
   include "conexion.php";
   $id_arriendo = $_GET["id"];

   $consulta = "SELECT * FROM arriendo WHERE id ='".$id_arriendo."'";
   $resultado = mysqli_query($conexion,$consulta);
   mysqli_data_seek ($resultado, 0);
   $arriendo = mysqli_fetch_assoc($resultado);
   
   $cons_cliente = "SELECT rut, nombre, apellido, razon_social FROM cliente_persona WHERE rut = '".$arriendo["rut_cliente"]."' ";
   $resul_cliente = mysqli_query($conexion,$cons_cliente);
   mysqli_data_seek ($resul_cliente, 0);
   $cliente = mysqli_fetch_assoc($resul_cliente);

   $cons_juegos = "SELECT * FROM juego_arriendo JA, juego J, arriendo A WHERE J.id = JA.id_juego AND JA.id_arriendo = A.id AND JA.id_arriendo = '".$id_arriendo."' ";
   $resul_juegos = mysqli_query($conexion,$cons_juegos);

   $consulta_comuna = "SELECT * FROM comuna";
   $comunas = mysqli_query($conexion,$consulta_comuna);

?>
<form class="user" id="form_arriendo_detalle">
    <input type="hidden" name="rut_arriendo" id="rut_arriendo" value="<?= $arriendo["rut_cliente"] ?>">
    <input type="hidden" name="id_arriendo" id="id_arriendo_modificar" value="<?= $id_arriendo ?>">
    <input type="hidden" name="arrendado_por" value="<?= $arriendo["arrendado_por"] ?>">
    <div class="form-group row">
        <div class="col-lg-3 col-md-6">
            <h6 class="mt-3 font-weight-bold text-primary">
            Fecha inicio de arriendo
            </h6>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <input type="date" class="form-control form-control-user" name="fec_arriendo"
            id="fec_arriendo" placeholder="" value="<?= $arriendo['fecha']; ?>" >
        </div>
        <div class="col-lg-3 col-md-6">
            <h6 class="mt-3 font-weight-bold text-primary">
            Fecha fin de arriendo
            </h6>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <input type="date" class="form-control form-control-user" name="fin_arriendo"
            id="fin_arriendo" placeholder="" value="<?= $arriendo['fin']; ?>" >
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-3 col-md-6">
            <h6 class="mt-3 font-weight-bold text-primary">
            Horario inicio
            </h6>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <input type="time" class="form-control form-control-user"
            name="hora_inicio" id="hora_inicio" value="<?= substr($arriendo['start'],11,5); ?>" placeholder="" >
        </div>
        <div class="col-lg-3 col-md-6">
            <h6 class="mt-3 font-weight-bold text-primary">
            Horario termino
            </h6>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <input type="time" class="form-control form-control-user"
            name="hora_termino" id="hora_termino" value="<?= substr($arriendo['end'],11,5); ?>" placeholder="" >
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-6 col-md-12 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-user" name="cliente"
            id="cliente" placeholder="Cliente" value="<?= $cliente["rut"]." ".$cliente["nombre"]." ".$cliente["apellido"]." ".$cliente["razon_social"]; ?>" readonly >
        </div>
        <div class="col-lg-6 col-md-12 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-user" name="telefono"
            id="telefono" placeholder="Telefono" value="<?= $arriendo['telefono']; ?>" >
        </div>
        
    </div>

    <div class="form-group row">
        <div class="col-lg-6 col-md-6 mb-3">
            <input type="text" class="form-control form-control-user" name="direccion"
            id="direccion" placeholder="Direccion" value="<?= $arriendo['direccion']; ?>" >
        </div>
        <div class="col-lg-2 col-md-4">
            <h6 class="mt-3 font-weight-bold text-primary">
            Comuna
            </h6>
        </div>
        <div class="col-lg-4 col-md-8 mt-2">
            <select class="custom-select form-control" name="comuna" id="comuna">
                <option value="">Comuna</option>
            <?php while ($columna = mysqli_fetch_array($comunas) ): 
                    if($arriendo["comuna"]== $columna["nombre"]):?>
                        <option value="<?php echo $columna["nombre"]; ?>" selected ><?php echo $columna["nombre"]; ?></option>
                    <?php else: ?>
                    <option value="<?php echo $columna["nombre"]; ?>" ><?php echo $columna["nombre"]; ?></option>
            <?php endif;
                    endwhile; 
                    mysqli_data_seek ($comunas, 0);?>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-4 col-md-4">
            <h6 class="mt-3 font-weight-bold text-primary">
            Detalles de direccion
            </h6>
        </div>
        <div class="col-lg-8 col-md-6 mb-3">
            <input type="text" class="form-control form-control-user" name="dir_notas"
                id="dir_notas"
                placeholder="Ejemplo: Block, depto, parcela, referencias, etc" value="<?= $arriendo['direccion_notas']; ?>">
        </div>    
    </div>
    <div class="form-group row">
        <div class="col-lg-4 col-md-4">
            <h6 class="mt-3 font-weight-bold text-primary">
            Comentarios del arriendo
            </h6>
        </div>
        <div class="col-lg-8 col-md-6 mb-3">
            <input type="text" class="form-control form-control-user" name="comentarios"
                id="comentarios"
                placeholder="Ejemplo: Se debe instalar dos horas antes, etc" value="<?= $arriendo['comentarios']; ?>">
        </div>    
    </div>
    <div class="row justify-content-md-center">
        <input type="submit" onclick="modificarDatos()" class="btn btn-warning btn-user btn-block col-lg-4" value="Modificar fecha/direccion de arriendo">
    </div>    
    <hr>
    <!-- Juegos -->
    <div class="form-group row">
        <div class="col-lg-2 col-md-6">
            <h6 class="mt-3 font-weight-bold text-primary">
            Cantidad de juegos
            </h6>
        </div>
        <div class="col-lg-2 col-md-6 mb-3">
            <input type="text" class="form-control form-control-user"
            name="cant_juegos"
            id="cant_juegos" placeholder="Cantidad de juegos" value="<?php echo mysqli_num_rows($resul_juegos); ?>" readonly>
        </div>
        <div class="col-lg-6 mt-2 mx-1 rounded border border-left-success text-lg" id="juegos">
            <ul class="pt-2" id="lista_juegos">
            <?php while($juegos = mysqli_fetch_array($resul_juegos)):?>
            <li class="list-group-item">
                <div class="col-lg-10 mt-1">
                    <h6 class="font-weight-bold juego_existente" data-id="<?= $juegos["id"]; ?>">
                        <?php
                         if($juegos["cantidad"]!=1){
                             echo $juegos["cantidad"]." ".$juegos["nombre"];
                         }else{
                            echo $juegos["nombre"];
                         }
                        ?>
                    </h6>
                </div>
            </li>
            <?php endwhile; ?>
            </ul>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-4 mt-1">
            <a href="arriendos_modjuegos.php?id_arriendo<?= $id_arriendo?>" class="btn btn-danger">Modificar Juegos 2</a>
        </div>
    </div>

    <hr>
    <div class="form-group row">
        <div class="col-lg-4 col-md-6">
            <h6 class="mt-3 font-weight-bold text-primary">
            Total de los juegos
            </h6>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <input type="text" class="form-control form-control-user"
            name="total_juegos_original" id="total_juegos_original" value="<?= $arriendo["total_juegos"] ?>" readonly>
        </div>
        <div class="col-lg-2 col-md-6 mb-3">
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <input onchange="calcular()" class="form-control form-control-user"
            name="total_juegos" id="total_juegos" placeholder="Total juegos" value="<?= $arriendo["total_juegos"] ?>" >
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-4 col-md-6">
            <h6 class="mt-3 font-weight-bold text-primary">
            Valor de despacho
            </h6>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <input type="text" class="form-control form-control-user"
            name="valor_despacho_original" id="valor_despacho_original" placeholder="Valor despacho" value="<?= $arriendo["despacho"] ?>" readonly>
        </div>
        <div class="col-lg-2 col-md-6 mb-3">
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <input onchange="calcular()" type="text" class="form-control form-control-user"
            name="valor_despacho" id="valor_despacho" placeholder="Valor despacho" value="<?= $arriendo["despacho"] ?>" >
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-4 col-md-6">
            <h6 class="mt-3 font-weight-bold text-primary">
            Cobro adicional (%)
            </h6>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <input type="text" class="form-control form-control-user"
            name="cobro_adicional_original" id="cobro_adicional_original"
            placeholder="Cobro adicional" value="<?= $arriendo["cobro_adicional"] ?>" readonly>
        </div>
        <div class="col-lg-2 col-md-6 mb-3">
            <input onchange="calcularAdicional()" type="text" class="form-control form-control-user"
            name="porc_add" id="porc_add" placeholder="%" value="" >
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <input onchange="calcular()" type="text" class="form-control form-control-user"
            name="cobro_adicional" id="cobro_adicional"
            placeholder="Cobro adicional" value="<?= $arriendo["cobro_adicional"] ?>" >
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-4 col-md-6">
            <h6 class="mt-3 font-weight-bold text-primary">
            Descuento (%)
            </h6>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <input type="text" class="form-control form-control-user"
            name="descuento_original" id="descuento_original" placeholder="Descuento" value="<?= $arriendo["descuento"] ?>" readonly>
        </div>
        <div class="col-lg-2 col-md-6 mb-3">
            <input onchange="calcularDescuento()" type="text" class="form-control form-control-user"
            name="porcentaje" id="porcentaje" placeholder="%"  >
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <input onchange="calcular()" type="text" class="form-control form-control-user"
            name="descuento" id="descuento" placeholder="Descuento" value="0" >
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-4 col-md-6 rounded bg-gradient-primary py-2 ">
            <h6 class="mt-3 font-weight-bold text-gray-100 text-center ">
            Total
            </h6>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <input type="text" class="form-control form-control-user"
            name="valor_total_original" id="valor_total_original" placeholder="Valor total" value="<?= $arriendo["valor_total"] ?>" readonly>
        </div>
        <div class="col-lg-2 col-md-6 mb-3">
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <input type="text" class="form-control form-control-user"
            name="valor_total" id="valor_total" placeholder="Valor total" value="<?= $arriendo["valor_total"] ?>" >
        </div>
    </div>
    <div class="row justify-content-md-center">
        <input type="submit" onclick="modificarArriendo()" class="btn btn-warning btn-user btn-block col-lg-4" id="btn_agregar" value="Modificar arriendo">
    </div>
    <hr>
    <div class="form-group row">
        <div class="col-lg-2 col-md-6">
            <h6 class="mt-3 font-weight-bold text-primary">
            Abono
            </h6>
        </div>
        <div class="col-lg-2 col-md-6 mb-3">
            <input onchange="calcular()" type="text" class="form-control form-control-user" name="abono"
            id="abono" placeholder="Abono" value="<?= $arriendo["abono"] ?>" readonly>
        </div>

        <div class="col-lg-2 col-md-6">
            <h6 class="mt-3 font-weight-bold text-primary">
            Fecha del abono
            </h6>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <input type="date" class="form-control form-control-user" name="fecha_abono"
            id="fecha_abono" placeholder="" value="<?= $arriendo["fecha_abono"] ?>" readonly>
        </div>
        <div class="col-lg-1 col-md-6">
            <h6 class="mt-3 font-weight-bold text-primary">
            Saldo
            </h6>
        </div>
        <div class="col-lg-2 col-md-6 mb-3">
            <input type="text" class="form-control form-control-user" name="saldo"
            id="saldo" placeholder="Saldo" value="<?= $arriendo["saldo"] ?>" readonly>
    </div>
</form>
