<?php
   session_start();
   if($_SESSION["oficina"]== null || $_SESSION["oficina"] != "si"){
      session_abort();
      header("Location: http://pdc.arcadesamuel.cl");
   }
   
   $fecha = $_GET["fecha"];
   $fin = "";
   if(isset($_GET["fin"])){
      $fin=$_GET["fin"];
   }else{
      $fin=$fecha;
   }
?>
<input type="hidden" name="" id="fecha_inicio" value="<?= $fecha ?>">
<input type="hidden" name="" id="fecha_termino" value="<?= $fin ?>">

<!DOCTYPE HTML>
<html>

<head>
    <title>Panel de control</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Calendario FullCaledar -->
    <link href='fullcalendar/core/main.css' rel='stylesheet' />
    <link href='fullcalendar/daygrid/main.css' rel='stylesheet' />
    <!-- Fin calendario -->

    <!--Validacion para formularios-->
    <style>
       input:valid, textarea:valid {
         border: 2px solid green;
      }
      input:invalid, textarea:invalid {
         border: 2px solid red;
      }
    </style>
    <!---->
</head>

<body id="page-top">

    <!-- Wrapper - Toda la pagina está adentro de esto-->
    <div id="wrapper">
            <!--Side bar-->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

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
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60"
                                            alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60"
                                            alt="">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60"
                                            alt="">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span>
                                <img class="img-profile rounded-circle"
                                    src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <div class="container-fluid">
                    <!-- Titulo de la pagina -->
                    <h1 class="h1 mb-4 text-gray-800">Ingresar nuevo arriendo</h1>

                    <!-- Seccion Fecha nuevo arriendo -->
                    <div class="row">
                       <div class="col-lg-12">
                          <div class="card shadow mb-4">
                             <!-- Titulo de la seccion -->
                             <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">
                                   Seleccione fecha del arriendo
                                </h6>
                             </div>
                             <!-- Cuerpo tarjeta -->
                             <div class="card-body">
                                 <div class="row">
                                    <div class="col-lg-4">
                                       <h5>Fecha Inicio</h5>
                                       <input onchange="cambiarFecha('inicio')" type="date"
                                          class="form-control form-control-user" name="fecha" id="fecha_arriendo"
                                          value="<?= $fecha ?>" placeholder="" required>
                                    </div> 
                                    <div class="col-lg-4">
                                       <h5>Horario inicio</h5>
                                       <input type="time" class="form-control form-control-user" name="horario_inicio"
                                          id="horario_inicio" value="" placeholder="" required>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-lg-4">
                                       <h5>Fecha Termino</h5>
                                       <input onchange="cambiarFecha('fin')" type="date"
                                          class="form-control form-control-user" name="fecha" id="fecha_fin"
                                          value="<?= $fin ?>" placeholder="" required>
                                    </div>
                                    <div class="col-lg-4">
                                       <h5>Horario termino</h5>
                                       <input type="time" class="form-control form-control-user" name="horario_termino"
                                          id="horario_termino" value="" placeholder="" required>
                                    </div>
                                 </div>
                                 <div class="row">

                                    <div class="col-lg-4 my-1 mx-1">
                                       <button class="btn btn-success" onclick="tiempoArriendo()">Guardar fecha y hora</button>
                                    </div>
                                 </div>                                 
                             </div>
                          </div>
                       </div>
                    </div>
                    <!-- Fin nuevo arriendo --->

                    <!-- Seccion Juegos disponibles -->
                    <div class="row">
                       <div class="col-lg-12">
                          <div class="card shadow mb-4">
                             <!-- Titulo de la seccion -->
                             <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">
                                   Juegos disponibles
                                </h6>
                             </div>
                             <!-- Cuerpo tarjeta -->
                             <div class="card-body">
                                <div class="table-responsive" id="tabla-juegos">
                                       <table class="table table-bordered" width="100%" cellspacing="0" id="dataTable">
                                          <?php
                                                $v=1;//$_GET["v"];
                                                include "conexion.php";

                                                if($v==1):
                                                
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
                                                         //if($juegos['fecha'] != $juegos['fin']){
                                                            //echo "Fila = ".$linea."<br>";
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
                                                   id="<?php echo $juegos_disponibles[$i][0]."&id=".$juegos_disponibles[$i][1]; ?>">
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

                                 <?php else: ?>
                                    <h3>No hay juegos disponibles para a fecha seleccionada fecha</h3>
                                 <?php endif;
                                    elseif($v==2):


                                    endif;
                                 ?>  
                                                </table>
                                          </div>
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
                    <!-- Fin Juegos disponibles --->

                    <!-- Seccion Cliente del arriendo -->
                    <div class="row">
                       <div class="col-lg-12">
                          <div class="card shadow mb-4">
                             <!-- Titulo de la seccion -->
                             <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">
                                   Seleccionar cliente
                                </h6>
                             </div>
                             <!-- Cuerpo tarjeta -->
                             <div class="card-body cliente-arriendo">
                                <div class="row">
                                   <div class="col-lg-6 mt-1">
                                      <h5>Cliente existente</h5>
                                       <select class="custom-select custom-control" name=""
                                          id="rut_cliente" onchange="datosEnvios()">
                                          <option value="" selected>Rut</option>
                                       </select>
                                   </div>
                                   <div class="col-lg-6">
                                      <h5 class="mt-1">o agregar un cliente nuevo</h5>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cliente_nuevo">
                                           Agregar cliente nuevo
                                        </button>
                                   </div>
                                </div>
                                <hr>
                                <div class="row">
                                   <div class="col-lg-12">
                                      <h5>Datos de envío</h5>
                                       <form class="user" id="form_datos_envio">
                                       </form>
                                   </div>                                    
                                </div>
                                 <div class="row">
                                    <div class="col-lg-4">
                                       <button class="btn btn-primary" onclick="envioArriendo()">Siguiente</button>
                                    </div>
                                 </div>

                             </div>
                          </div>
                       </div>
                    </div>
                    <!-- Fin Cliente del arriendo --->

                    <!-- Seccion Resumen del arriendo -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <!--Titulo de la seccion -->
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        Resumen de arriendo
                                    </h6>
                                </div>
                                <!--Cuerpo tarjeta-->
                                <div class="card-body">
                                    <form class="user" id="form_arriendo" method="POST">
                                       <input type="hidden" name="rut_arriendo" id="rut_arriendo" value="">
                                       <div class="form-group row">
                                          <div class="col-lg-3 col-md-6">
                                             <h6 class="mt-3 font-weight-bold text-primary">
                                                Fecha inicio de arriendo
                                             </h6>
                                          </div>
                                          <div class="col-lg-3 col-md-6 mb-3">
                                             <input type="date" class="form-control form-control-user" name="fec_arriendo"
                                                id="fec_arriendo" placeholder="" required>
                                          </div>
                                          <div class="col-lg-3 col-md-6">
                                             <h6 class="mt-3 font-weight-bold text-primary">
                                                Fecha fin de arriendo
                                             </h6>
                                          </div>
                                          <div class="col-lg-3 col-md-6 mb-3">
                                             <input type="date" class="form-control form-control-user" name="fin_arriendo"
                                                id="fin_arriendo" placeholder="" required>
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
                                                name="hora_inicio" id="hora_inicio" value="" placeholder="" required>
                                          </div>
                                          <div class="col-lg-3 col-md-6">
                                             <h6 class="mt-3 font-weight-bold text-primary">
                                                Horario termino
                                             </h6>
                                          </div>
                                          <div class="col-lg-3 col-md-6 mb-3">
                                             <input type="time" class="form-control form-control-user"
                                                name="hora_termino" id="hora_termino" value="" placeholder="" required>
                                          </div>
                                       </div>
                                       <hr>
                                       <div class="form-group row">
                                          <div class="col-lg-6 col-md-12 mb-3 mb-sm-0">
                                             <input type="text" class="form-control form-control-user" name="cliente"
                                                id="cliente" placeholder="Cliente" required>
                                          </div>
                                          <div class="col-lg-6 col-md-12 mb-3 mb-sm-0">
                                             <input type="text" class="form-control form-control-user" name="telefono"
                                                id="telefono" placeholder="Telefono" required>
                                          </div>
                                          
                                       </div>

                                       <div class="form-group row">
                                          <div class="col-lg-6 col-md-6 mb-3">
                                             <input type="text" class="form-control form-control-user" name="direccion"
                                                id="direccion" placeholder="Direccion" required>
                                          </div>
                                          <div class="col-lg-2 col-md-4">
                                             <h6 class="mt-3 font-weight-bold text-primary">
                                                Comuna
                                             </h6>
                                          </div>
                                          <div class="col-lg-4 col-md-8 mt-2">
                                             <select class="custom-select form-control" name="comuna" id="comuna" required>
                                                <option value="" selected>Comuna</option>
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
                                                   placeholder="Ejemplo: Block, depto, parcela, referencias, etc" value="">
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
                                                id="cant_juegos" placeholder="Cantidad de juegos" readonly>
                                          </div>
                                          <div class="col-lg-6 mt-2 mx-3 rounded border border-left-success text-lg" id="juegos">
                                             <ul class="pt-2" id="lista_juegos">
                                             </ul>
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
                                                   placeholder="Ejemplo: Se debe instalar dos horas antes, etc" value="">
                                          </div>    
                                       </div>
                                       <hr>

                                       <div class="form-group row">
                                          <div class="col-lg-6 col-md-6">
                                             <h6 class="mt-3 font-weight-bold text-primary">
                                                Valor de despacho
                                             </h6>
                                          </div>
                                          <div class="col-lg-6 col-md-6 mb-3">
                                             <input onkeydown="calcularTotal()" type="text" class="form-control form-control-user"
                                                name="valor_despacho" id="valor_despacho" placeholder="Valor despacho" required>
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <div class="col-lg-4 col-md-6">
                                             <h6 class="mt-3 font-weight-bold text-primary">
                                                Cobro adicional (%)
                                             </h6>
                                          </div>
                                          <div class="col-lg-2 col-md-6 mb-3">
                                             <input onchange="calcularAdicional()" type="text" class="form-control form-control-user"
                                                name="porc_add" id="porc_add" placeholder="%" value="" required>
                                          </div>
                                          <div class="col-lg-6 col-md-6 mb-3">
                                             <input onchange="calcularTotal()" type="text" class="form-control form-control-user"
                                                name="cobro_adicional" id="cobro_adicional"
                                                placeholder="Cobro adicional" value="0" required>
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <div class="col-lg-4 col-md-6">
                                             <h6 class="mt-3 font-weight-bold text-primary">
                                                Descuento (%)
                                             </h6>
                                          </div>
                                          <div class="col-lg-2 col-md-6 mb-3">
                                             <input onchange="calcularDescuento()" type="text" class="form-control form-control-user"
                                                name="porcentaje" id="porcentaje" placeholder="%" value="" required>
                                          </div>
                                          <div class="col-lg-6 col-md-6 mb-3">
                                             <input onchange="calcularTotal()" type="text" class="form-control form-control-user"
                                                name="descuento" id="descuento" placeholder="Descuento" value="0" required>
                                          </div>
                                       </div>

                                       <div class="form-group row">
                                          <div class="col-lg-6 col-md-6 rounded bg-gradient-primary py-2 ">
                                             <h6 class="mt-3 font-weight-bold text-gray-100 text-center ">
                                                Total
                                             </h6>
                                          </div>
                                          <div class="col-lg-6 col-md-6 mb-3">
                                             <input type="text" class="form-control form-control-user"
                                                name="valor_total" id="valor_total" placeholder="Valor total" required>
                                          </div>
                                       </div>
                                       <div class="row justify-content-md-center">
                                          <input type="submit" onclick="guardarArriendo()"
                                             class="btn btn-warning btn-user btn-block col-lg-4"
                                             id="btn_agregar" value="Guardar como pre-arriendo">
                                       </div>
                                       <hr>
                                       <div class="form-group row">
                                          <div class="col-lg-2 col-md-6">
                                             <h6 class="mt-3 font-weight-bold text-primary">
                                                Abono
                                             </h6>
                                          </div>
                                          <div class="col-lg-2 col-md-6 mb-3">
                                             <input onchange="calcularTotal()" type="text" class="form-control form-control-user" name="abono"
                                                id="abono" placeholder="Abono" value="0" required>
                                          </div>

                                          <div class="col-lg-2 col-md-6">
                                             <h6 class="mt-3 font-weight-bold text-primary">
                                                Fecha del abono
                                             </h6>
                                          </div>
                                          <div class="col-lg-3 col-md-6 mb-3">
                                             <input type="date" class="form-control form-control-user" name="fecha_abono"
                                                id="fecha_abono" placeholder="" required>
                                          </div>
                                          <div class="col-lg-1 col-md-6">
                                             <h6 class="mt-3 font-weight-bold text-primary">
                                                Saldo
                                             </h6>
                                          </div>
                                          <div class="col-lg-2 col-md-6 mb-3">
                                             <input type="text" class="form-control form-control-user" name="saldo"
                                                id="saldo" placeholder="Saldo" required>
                                          </div>
                                       </div>
                                       <div class="row justify-content-md-center">
                                          <input type="submit" onclick="guardarArriendo()"
                                             class="btn btn-primary btn-user btn-block col-lg-4"
                                             id="btn_agregar" value="Guardar arriendo">
                                       </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Fin Formulario de todo el arriendo --->

                    <!-- Seccion ejemplo
                    <div class="row">
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
                    </div>
                    Fin sección ejemplo --->

                </div>
            </div>
        </div>
    </div>

    <!-- modal cliente nuevo -->
    <div class="modal fade" id="cliente_nuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
       aria-hidden="true">
       <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
             <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cliente nuevo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                </button>
             </div>
             <div class="modal-body">
                <form class="user" id="form_agregar" method="POST">
                   <div class="form-group row">
                      <div class="btn btn-primary btn-icon-split ml-4" onclick="clienteEmpresa()">
                         <span class="icon text-white-50">
                            <i class="fas fa-info"></i>
                         </span>
                         <span class="text" id="btn_cliente">Es cliente empresa</span>
                      </div>
                   </div>
                   <hr>
                   <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                         <input type="text" class="form-control form-control-user " name="nombre" id="nombre"
                            placeholder="Nombre" pattern="[A-Za-z0-9]+" required>
                      </div>
                      <div class="col-sm-6">
                         <input type="text" class="form-control form-control-user " name="apellido" id="apellido"
                            placeholder="Apellido" pattern="[A-Za-z0-9]+" required>
                      </div>
                   </div>
                   <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                         <input type="text" class="form-control form-control-user " name="rut" id="rut"
                            placeholder="Rut: 19.123.456-0" pattern="[kK\.\-0-9]+" required>
                      </div>
                      <div class="col-sm-6 mb-3 mb-sm-0">
                         <input type="email" class="form-control form-control-user " name="correo" id="correo"
                            placeholder="Correo electrónico" pattern="[\@A-Za-z0-9]+" required>
                      </div>
                   </div>
                   <div class="form-group row">
                      <div class="col-lg-2 col-md-6">
                         <h6 class="mt-3 font-weight-bold text-primary">
                            Fecha de nacimiento
                         </h6>
                      </div>
                      <div class="col-lg-4 col-md-6 mb-3">
                         <input type="date" class="form-control form-control-user " name="fecha_nac" id="fecha_nac"
                            placeholder="" required>
                      </div>
                      <div class="col-lg-6 col-md-12 mb-3 mb-sm-0">
                         <input type="text" class="form-control form-control-user " name="telefono" id="telefono"
                            placeholder="Telefono" pattern="[\+0-9]+" required>
                      </div>
                   </div>
                   <div class="form-group row">
                      <div class="col-lg-6 col-md-6 mb-3">
                         <input type="text" class="form-control form-control-user " name="direccion" id="direccion"
                            placeholder="Direccion" pattern="[A-Za-z0-9]+" required >
                      </div>
                      <div class="col-lg-2 col-md-4">
                         <h6 class="mt-3 font-weight-bold text-primary">
                            Comuna
                         </h6>
                      </div>
                      <div class="col-lg-4 col-md-8 mt-2">
                         <select class="custom-select form-control" name="comuna" id="comuna_nuevo" required>
                            <option value="Prueba" selected>Comuna</option>
                         </select>
                      </div>
                   </div>
                   <div class="form-group row" id="div_cont">
                      <div class="col-lg-6 mb-3">
                         <input type="text" class="form-control form-control-user" name="clave" id="clave"
                            placeholder="Clave de ingreso" required>
                      </div>
                   </div>
                   <button onclick="agregarCliente()" class="btn btn-primary btn-user btn-block" id="btn_agregar">
                      Agregar cliente a la base de datos
                   </button>
                </form>
             </div>
          </div>
       </div>
    </div>
    <!--Fin modal cliente nuevo-->

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
   
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
   <!-- JS propios -->  
      <script src="js/arriendos_nuevo.js"></script>
    

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

   

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
   


</body>

</html>