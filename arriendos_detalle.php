<?php
   include "conexion.php";
   $id_arriendo = $_GET["id"];

   $consulta = "SELECT fecha, rut_cliente, start, end, valor_total, abono, fecha_abono, saldo, telefono, comuna, calle, numero FROM arriendo WHERE id ='".$id_arriendo."'";
   $resultado = mysqli_query($conexion,$consulta);
   mysqli_data_seek ($resultado, 0);
   $arriendo = mysqli_fetch_assoc($resultado);
   
   $cons_cliente = "SELECT rut, nombre, apellido, razon_social FROM cliente_persona WHERE rut = '".$arriendo["rut_cliente"]."' ";
   $resul_cliente = mysqli_query($conexion,$cons_cliente);
   mysqli_data_seek ($resul_cliente, 0);
   $cliente = mysqli_fetch_assoc($resul_cliente);

   $cons_juegos = "SELECT * FROM juego_arriendo JA, juego J, arriendo A WHERE J.id = JA.id_juego AND JA.id_arriendo = '".$id_arriendo."' ";
   $resul_juegos = mysqli_query($conexion,$cons_juegos);

   $consulta_comuna = "SELECT * FROM comuna";
   $comunas = mysqli_query($conexion,$consulta_comuna);

?>
<form class="user" id="form_arriendo" method="POST">
    <input type="hidden" name="rut_arriendo" id="rut_arriendo" value="<?php echo $arriendo['rut_cliente']; ?>">
    <div class="form-group row">
        <div class="col-lg-2 col-md-6">
            <h6 class="mt-3 font-weight-bold text-primary">
            Fecha de arriendo
            </h6>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <input type="date" class="form-control form-control-user" name="fec_arriendo"
            id="fec_arriendo" placeholder="" value="<?php echo $arriendo['fecha']; ?>">
        </div>
        <div class="col-lg-1 col-md-6">
            <h6 class="mt-3 font-weight-bold text-primary">
            Horario inicio
            </h6>
        </div>
        <div class="col-lg-2 col-md-6 mb-3">
            <input type="time" class="form-control form-control-user"
            name="hora_inicio" id="hora_inicio" value="<?php echo substr($arriendo['start'],11,5); ?>" placeholder="">
        </div>
        <div class="col-lg-2 col-md-6">
            <h6 class="mt-3 font-weight-bold text-primary">
            Horario termino
            </h6>
        </div>
        <div class="col-lg-2 col-md-6 mb-3">
            <input type="time" class="form-control form-control-user"
            name="hora_termino" id="hora_termino" value="<?php echo substr($arriendo['end'],11,5); ?>" placeholder="">
        </div>
        
    </div>

    <div class="form-group row">
        <div class="col-lg-6 col-md-12 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-user" name="telefono"
            id="telefono" placeholder="Telefono" value="<?php echo $arriendo['fecha']; ?>">
        </div>
        <div class="col-lg-6 col-md-12 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-user" name="cliente"
            id="cliente" placeholder="Cliente" value="<?php echo $cliente["rut"]." ".$cliente["nombre"]." ".$cliente["apellido"]." ".$cliente["razon_social"]; ?>">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-3 col-md-6 mb-3">
            <input type="text" class="form-control form-control-user" name="calle"
            id="calle" placeholder="Calle" value="<?php echo $arriendo['calle']; ?>">
        </div>
        <div class="col-lg-3 col-md-6">
            <input type="text" class="form-control form-control-user" name="numero"
            id="numero" placeholder="Numero" value="<?php echo $arriendo['numero']; ?>">
        </div>
        <div class="col-lg-2 col-md-4">
            <h6 class="mt-3 font-weight-bold text-primary">
            Comuna
            </h6>
        </div>
        <div class="col-lg-4 col-md-8 mt-2">
            <select class="custom-select form-control" name="comuna" id="comuna">
                <option value="Prueba">Comuna</option>
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
        <div class="col-lg-2 col-md-6">
            <h6 class="mt-3 font-weight-bold text-primary">
            Cantidad de juegos
            </h6>
        </div>
        <div class="col-lg-2 col-md-6 mb-3">
            <input type="text" class="form-control form-control-user"
            name="cant_juegos"
            id="cant_juegos" placeholder="Cantidad de juegos" value="<?php echo mysqli_num_rows($resul_juegos); ?>">
        </div>
        <div class="col-lg-2 mt-2 mx-3" id="juegos">
            <ul class="list-group" id="lista_juegos">
            <?php while($juegos = mysqli_fetch_array($resul_juegos)):?>
                <li class="list-group-item">
                    <input type="hidden" name="" value="">
                    <input type="hidden" name="" value="">
                    <div class="col-lg-2 custom-control custom-checkbox mt-2">
                        <input type="checkbox" class="custom-control-input" value="oficina" name="oficina" id="oficina">
                        <label class="custom-control-label" for="oficina"><?php echo $juegos["nombre"]; ?></label>
                    </div>
                </li>
            <?php endwhile; ?>
            </ul>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-2 col-md-6">
            <h6 class="mt-3 font-weight-bold text-primary">
            Valor de despacho
            </h6>
        </div>
        <div class="col-lg-4 col-md-6 mb-3">
            <input onkeydown="calcularTotal()" type="text" class="form-control form-control-user"
            name="valor_despacho" id="valor_despacho" placeholder="Valor despacho" value="<?php while ($columna = mysqli_fetch_array($comunas)): if($arriendo["comuna"]== $columna["nombre"]): echo $columna["costo_despacho"]; endif; endwhile; ?>">
        </div>
        <div class="col-lg-2 col-md-6">
            <h6 class="mt-3 font-weight-bold text-primary">
            Cobro adicional
            </h6>
        </div>
        <div class="col-lg-4 col-md-6 mb-3">
            <input onchange="calcularTotal()" type="text" class="form-control form-control-user"
            name="cobro_adicional" id="cobro_adicional"
            placeholder="Cobro adicional" value="0">
        </div>
    </div>

    <div class="form-group row">
        
    </div>

    <div class="form-group row">
        <div class="col-lg-2 col-md-6">
            <h6 class="mt-3 font-weight-bold text-primary">
            Descuento
            </h6>
        </div>
        <div class="col-lg-4 col-md-6 mb-3">
            <input onchange="calcularTotal()" type="text" class="form-control form-control-user"
            name="descuento" id="descuento" placeholder="Descuento" value="0">
        </div>

            <div class="col-lg-2 col-md-6 rounded bg-gradient-primary py-2 ">
            <h6 class="mt-3 font-weight-bold text-primary text-center text-gray-100">
                Total
            </h6>
            </div>
            <div class="col-lg-4 col-md-6 mb-3">
            <input type="text" class="form-control form-control-user"
                name="valor_total" id="valor_total" placeholder="Valor total" value="<?php echo $arriendo['valor_total']; ?>">
            </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-2 col-md-6">
            <h6 class="mt-3 font-weight-bold text-primary">
            Abono
            </h6>
        </div>
        <div class="col-lg-2 col-md-6 mb-3">
            <input onchange="calcularTotal()" type="text" class="form-control form-control-user" name="abono"
            id="abono" placeholder="Abono" value="<?php echo $arriendo['abono']; ?>">
        </div>

        <div class="col-lg-2 col-md-6">
            <h6 class="mt-3 font-weight-bold text-primary">
            Fecha del abono
            </h6>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <input type="date" class="form-control form-control-user" name="fecha_abono"
            id="fecha_abono" placeholder="" value="<?php echo $arriendo['fecha_abono']; ?>">
        </div>
        <div class="col-lg-1 col-md-6">
            <h6 class="mt-3 font-weight-bold text-primary">
            Saldo
            </h6>
        </div>
        <div class="col-lg-2 col-md-6 mb-3">
            <input type="text" class="form-control form-control-user" name="saldo"
            id="saldo" placeholder="Saldo" value="<?php echo $arriendo['saldo']; ?>">
        </div>
    </div>
</form>