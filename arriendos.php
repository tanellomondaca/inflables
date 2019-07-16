<?php
    include 'conexion.php';

   session_start();
   if($_SESSION["oficina"]== null || $_SESSION["oficina"] != "si"){
      session_abort();
      header("Location: http://pdc.arcadesamuel.cl");
   }
?>
<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
    <title>Panel de control</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Calendario FullCaledar -->
    <link href='fullcalendar/core/main.css' rel='stylesheet' />
    <link href='fullcalendar/daygrid/main.css' rel='stylesheet' />
    <!-- Fin calendario -->
</head>

<body id="page-top" class="sidebar-toggled">

    <!-- Wrapper - Toda la pagina está adentro de esto-->
    <div id="wrapper">
        <!--Side bar-->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Panel de control</div>
            </a>
            
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                áreas
            </div>

            <li class="nav-item">
                <a class="nav-link" href="arriendos.php">
                    <i class="fas fa-fw fa-calendar-alt"></i>
                    <span>Arriendos</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="rutas.php">
                    <i class="fas fa-fw fa-truck"></i>
                    <span>Rutas</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="trabajadores.php">
                    <i class="fas fa-fw fa-male"></i>
                    <span>Trabajadores</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="clientes.php">
                    <i class="fas fa-fw fa-id-card-alt"></i>
                    <span>Clientes</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="estadisticas.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Estadisticas</span></a>
            </li>
            <!-- Nav Item - Pages Collapse Menu -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                    <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li> -->
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Main Contenido de la pagina sin barra lateral y con footer-->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Contenido de tarjetas -->
            <div id="content">
                

                <div class="container-fluid mt-4">
                    <!-- Titulo de la pagina -->
                    <h1 class="h1 mb-4 text-gray-800">Arriendos</h1>

                    <!-- Seccion Calendario y opciones -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Titulo de la seccion -->
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        Calendario de Arriendos
                                    </h6>
                                </div>
                                <!-- Cuerpo tarjeta -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div id="calendar"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <a id="modal_ex" href="" class="btn btn-success btn-icon-split mt-1" data-toggle="modal" data-target="#modal_fecha">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                                <span class="text">Ingresar nuevo arriendo</span>
                                            </a>
                                            <a href="#" class="btn btn-warning btn-icon-split mt-1">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-exclamation-triangle"></i>
                                                </span>
                                                <span class="text">Modificar datos de arriendo</span>
                                            </a>
                                            <a href="#" class="btn btn-danger btn-icon-split mt-1">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                <span class="text">Eliminar arriendo</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fin sección calendario y opciones --->

                    <!-- Seccion arriendos sin abonos -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Titulo de la seccion -->
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        Arriendos sin abono
                                    </h6>
                                </div>
                                <!-- Cuerpo tarjeta -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" width="100%" cellspacing="0" id="dataTable">
                                            <thead>
                                                <tr>
                                                    <th>Fecha</th>
                                                    <th>Juegos</th>
                                                    <th>Cliente</th>
                                                    <th>Comuna</th>
                                                    <th>Total arriendo</th>
                                                    <th>Ingresar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $consulta = "SELECT A.id, A.fecha, C.nombre, C.apellido, A.comuna, A.valor_total FROM arriendo A, cliente_persona C WHERE A.rut_cliente = C.rut AND A.abono = '0' " ;
                                                $resultado = mysqli_query($conexion,$consulta);
                                                
                                                while($pre_arriendo=mysqli_fetch_array($resultado)):
                                            ?>
                                            <tr>
                                                <td><?= $pre_arriendo["fecha"]; ?></td>
                                                <td>
                                                    <?php
                                                        $id = $pre_arriendo["id"];
                                                        $query = "SELECT J.nombre FROM juego J, juego_arriendo JA WHERE JA.id_arriendo = '$id' AND JA.id_juego = J.id ";
                                                        $resultado1 = mysqli_query($conexion,$query);
                                                        while($juego = mysqli_fetch_array($resultado1)){
                                                            echo $juego["nombre"]."<br>";
                                                        }
                                                    ?>
                                                </td>
                                                <td><?= $pre_arriendo["nombre"]." ".$pre_arriendo["apellido"]; ?></td>
                                                <td><?= $pre_arriendo["comuna"]; ?></td>
                                                <td><?= $pre_arriendo["valor_total"]; ?></td>
                                                <td><button class="btn btn-danger" id="btn_abono" data-toggle="modal" data-target="#ingresar_abono" onclick="asignarId('<?= $id; ?>','<?= $pre_arriendo['valor_total']; ?>')">Ingresar</button></td>
                                            </tr>    
                                            <?php
                                                endwhile;
                                            ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Fecha</th>
                                                    <th>Juegos</th>
                                                    <th>Cliente</th>
                                                    <th>Comuna</th>
                                                    <th>Total arriendo</th>
                                                    <th>Ingresar</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fin sección arriendos sin abono --->

                    <!-- Seccion arriendos por día -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Titulo de la seccion -->
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        Arriendos del día
                                    </h6>
                                </div>
                                <!-- Cuerpo tarjeta -->
                                <div class="card-body">

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fin sección arriendos del día --->


                    <!-- Seccion ejemplo -->
                    <!-- <div class="row">
                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                 Titulo de la seccion 
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        Ejemplo de tarjeta/card
                                    </h6>
                                </div>
                                 Cuerpo tarjeta 
                                <div class="card-body">

                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- Fin sección ejemplo - -->

                </div>
            </div>

            <!-- Modal ARRIENDOS DEL DIA -->
            <div class="modal fade" id="modal_arriendos_dia" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content shadow">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Arriendos del día
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0" id="eventosDia">
                                    <thead>
                                        <tr>
                                            <th>Juegos</th>
                                            <th>Inicio</th>
                                            <th>Fin</th>
                                            <th>Comuna</th>
                                            <th>Dirección</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button id="btn_eventos" data-toggle="modal" data-target="#modal_arriendos_dia" style="display: none"></button>

            <!-- Modal Fecha arriendo -->
            <div class="modal fade" id="modal_fecha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Seleccione fecha para el arriendo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="date" class="form-control form-control-user" name="fecha" id="fecha_arriendo" value="" placeholder="">
                        </div>
                        <div class="modal-footer">
                            
                            <button type="button" onclick="fechaArriendo()" class="btn btn-primary">Consultar fecha</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal DETALLE ARRIENDO -->
            <div class="modal fade" id="detalle_arriendo" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content shadow">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detalle de arriendo
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="user" id="form_arriendo_detalle">

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <button id="btn_detalle" data-toggle="modal" data-target="#detalle_arriendo" style="display: none"></button>

            <!-- Modal ABONO -->
            <div class="modal fade" id="ingresar_abono" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content shadow">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ingresar Abono a arriendo
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="user" id="form_abono">
                                <input type="hidden" name="id_arriendo" id="id_arriendo" value="">
                                <div class="form-group row">
                                    <div class="col-lg-6 col-md-6">
                                        <h6 class="mt-3 font-weight-bold text-primary">
                                        Total
                                        </h6>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mb-3">
                                        <input type="text" class="form-control form-control-user" name="total_abono"
                                        id="total_abono" placeholder="Total del arriendo" value="" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-2 col-md-6">
                                        <h6 class="mt-3 font-weight-bold text-primary">
                                        Abono
                                        </h6>
                                    </div>
                                    <div class="col-lg-2 col-md-6 mb-3">
                                        <input onchange="calcularTotal()" type="text" class="form-control form-control-user" name="abono_abono"
                                        id="abono_abono" placeholder="Abono" value="0" required>
                                    </div>

                                    <div class="col-lg-2 col-md-6">
                                        <h6 class="mt-3 font-weight-bold text-primary">
                                        Fecha del abono
                                        </h6>
                                    </div>
                                    <div class="col-lg-3 col-md-6 mb-3">
                                        <input type="date" class="form-control form-control-user" name="fecha_abono"
                                        id="fecha_abono_abono" placeholder="" required>
                                    </div>
                                    <div class="col-lg-1 col-md-6">
                                        <h6 class="mt-3 font-weight-bold text-primary">
                                        Saldo
                                        </h6>
                                    </div>
                                    <div class="col-lg-2 col-md-6 mb-3">
                                        <input type="text" class="form-control form-control-user" name="saldo"
                                        id="saldo_abono" placeholder="Saldo" required>
                                    </div>
                                </div>
                            </form>
                            <div class="row justify-content-md-center">
                                    <button onclick="ingresarAbono()"
                                        class="btn btn-primary btn-user btn-block col-lg-4"
                                        id="btn_ingresar_abono" value="">Ingresar abono</button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <!-- Modal MODIFICR JUEGOS-->
            <div class="modal fade" id="modificar_juegos" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content shadow">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modificar Juegos
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive" id="tabla-juegos">
                                <table class="table table-bordered" width="100%" cellspacing="0" id="tabla_juegos">
                                </table>
                                <div class="row justify-content-md-center">
                                        <button onclick="modificarJuegos()"
                                            class="btn btn-primary btn-user btn-block col-lg-4"
                                            id="btn_modificar_juegos" value="">Modificar juegos</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- JS propios -->
    <script src='fullcalendar/core/main.js'></script>
    <script src='fullcalendar/daygrid/main.js'></script>
    <script src='fullcalendar/interaction/main.js'></script>
    <script src='fullcalendar/timegrid/main.js'></script>
    <script src='fullcalendar/core/locales/es.js'></script>
    
 

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script src="js/arriendos.js"></script>
    <script src="js/calendario.js"></script>                                            
    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>



</body>

</html>