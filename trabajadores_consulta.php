<?php
    include 'conexion.php';
    $v = $_GET["v"];
    

    if($v==1):
        $sql_trabajador = "SELECT * FROM trabajador";
        $resultado = mysqli_query($conexion,$sql_trabajador);
?>
        <table class="table table-bordered" width="100%" cellspacing="0" id="dataTable">
            <thead>
                <tr>
                    <th>RUT</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Telefono</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Chofer</th>
                    <th>N° Cuenta</th>
                    <th>Tipo de cuenta</th>
                    <th>Banco</th>
                    <th>Sueldo Base</th>
                </tr>
            </thead>
            <tbody>
                <?php while($trabajador = mysqli_fetch_array($resultado)): ?>
                <tr>
                    <td> <?= $trabajador["rut"]; ?> </td>
                    <td> <?= $trabajador["nombre"]; ?> </td>
                    <td> <?= $trabajador["apellido"]; ?> </td>
                    <td> <?= $trabajador["telefono"]; ?> </td>
                    <td> <?= $trabajador["fecha_nac"]; ?> </td>
                    <td> <?= $trabajador["chofer"]; ?> </td>
                    <td> <?= $trabajador["n_cuenta_bco"]; ?> </td>
                    <td> <?= $trabajador["tipo_cta"]; ?> </td>
                    <td> <?= $trabajador["banco"]; ?> </td>
                    <td> <?= $trabajador["sueldo_base"]; ?> </td>
                </tr>
                <?php endwhile;?>
            </tbody>
            <tfoot>
            </tfoot>
        </table>
<?php 
    elseif($v==2):
        $fecha = $_GET["fecha"];
        $sql_trabajador = "SELECT T.nombre, T.apellido, J.inicio_jornada, J.termino_jornada, J.produccion FROM jornada J, trabajador T WHERE J.rut_trabajador = T.rut AND J.fecha = '".$fecha."'";
        $resultado = mysqli_query($conexion,$sql_trabajador);
?>
        <table class="table table-bordered" width="100%" cellspacing="0" id="dataTable">
            <thead>
                <tr>
                    <th>Trabajador</th>
                    <th>Entrada</th>
                    <th>Salida</th>
                    <th>Produccion</th>
                </tr>
            </thead>
            <tbody>
                <?php while($jornada = mysqli_fetch_array($resultado)): ?>
                <tr>
                    <td> <?= $jornada["nombre"]." ".$jornada["apellido"]; ?> </td>
                    <td> <?= $jornada["inicio_jornada"]; ?> </td>
                    <td> <?= $jornada["termino_jornada"]; ?> </td>
                    <td> <?= $jornada["produccion"]; ?> </td>
                </tr>
                <?php endwhile;?>
            </tbody>
            <tfoot>
            </tfoot>
        </table>
<?php 
    elseif($v==3):
        $lista_trabajador = "SELECT * FROM trabajador";
        $resultado = mysqli_query($conexion,$lista_trabajador);
?>
    <option value="Prueba" selected>Seleccione trabajador a consultar</option>
    <?php while($trabajador = mysqli_fetch_array($resultado) ): ?>
        <option value="<?= $trabajador["rut"]; ?>"> <?= $trabajador["nombre"]." ".$trabajador["apellido"]; ?> </option>
    <?php endwhile; ?>

<?php endif; ?>        