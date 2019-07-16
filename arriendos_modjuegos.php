<?php
    include 'conexion.php';

   session_start();
   if($_SESSION["oficina"]== null || $_SESSION["oficina"] != "si"){
      session_abort();
      header("Location: http://pdc.arcadesamuel.cl");
   }

   //solo de esta pagina
   $id_arriendo = $_GET["id_arriendo"];
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
                    <h1 class="h1 mb-4 text-gray-800">Modificar juegos de arriendo</h1>

                    <!-- Seccion ejemplo -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                 <!-- Titulo de la seccion  -->
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        Agregar/eliminar juegos
                                    </h6>
                                </div>
                                 <!-- Cuerpo tarjeta  -->
                                <div class="card-body">
                                <?php
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
                                <table class="table table-bordered" width="100%" cellspacing="0" id="tabla_juegos">
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
                                                    <input onchange="juegoMarcado()" type="checkbox" class="custom-control-input"
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
                                    </table>                                                            
                                    <?php endif; ?>
                                        <div class="row">
                                            <div class="col-lg-3">
                                            <button onclick="juegosSel()" class="btn btn-primary">Siguiente</button>
                                            </div>
                                            <div class="col-lg-3">
                                            <h5>Total</h5>
                                            <button class="btn btn-success" id="total_persona" onclick="totalJuegos(id)"></button>
                                            </div>
                                            <div class="col-lg-3">
                                            <h5>Total Empresa</h5>
                                            <button class="btn btn-success" id="total_empresa" onclick="totalJuegos(id)"></button>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fin sección ejemplo - -->

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

    <script src="js/juegos.js"></script>

    <!-- <script src="js/arriendos.js"></script>
    <script src="js/calendario.js"></script>                                             -->
    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>



</body>

</html>