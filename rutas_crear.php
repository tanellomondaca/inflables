<?php
   session_start();
   if($_SESSION["oficina"]== null || $_SESSION["oficina"] != "si"){
      session_abort();
      header("Location: http://pdc.arcadesamuel.cl");
   }
?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Panel de control</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />


    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
   
    <!-- Solo de rutas.html-->
    <link rel="stylesheet" href="css/rutas.css">
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
               <h1 class="h1 mb-4 text-gray-800">Rutas</h1>

               <!-- Seccion Elementos para rutas -->
               <div class="row">
                  <!--Arriendos-->
                  <div class="col-lg-7">
                     <div class="card shadow mb-4">
                        <!-- Titulo de la seccion -->
                        <div class="card-header py-3">
                           <h6 class="m-0 font-weight-bold text-primary">
                              Arriendos del día
                           </h6>
                        </div>
                        <!-- Cuerpo tarjeta -->
                        <div class="card-body" id="arriendos">
                           <!--Cada id corresponde al id del arriendo-->
                              <?php for($i=0 ; $i<$cant_arr ; $i++): #este $i es el numero de arriendo ?>
                              <div id="<?php echo $nombre_juego[$i][0]; ?>" class="row bg-gradient-primary rounded  text-gray-100 mt-1 punto">
                                 <div class="col-lg-4">
                                       <?php for($j=1; $j< count($nombre_juego[$i]); $j++){
                                       echo $nombre_juego[$i][$j]."<br>";
                                       } ?>                         
                                 </div>
                                 <div class="col-lg-2">
                                       <div class="btn btn-primary">Arriendo</div>
                                 </div>
                                 <div class="col-lg-3">
                                       <?php echo $info_arriendo[$i][2];?>
                                 </div>
                                 <div class="col-lg-3">
                                       <?php echo $info_arriendo[$i][3]; ?>
                                 </div>
                              </div>
                              <?php endfor; ?>
                        </div>
                     </div>
                  </div>
                  <!--Trabajadores-->
                  <div class="col-lg-5">
                     <div class="card shadow mb-4">
                        <!-- Titulo de la seccion -->
                        <div class="card-header py-3">
                           <h6 class="m-0 font-weight-bold text-primary">
                              Trabajadores
                           </h6>
                        </div>
                        <!-- Cuerpo tarjeta -->
                        <div class="card-body" id="trabajadores">
                           <div class="row">
                              <?php for($i=0; $trabajador = mysqli_fetch_array($resul_trabajador); $i++): ?>
                              <div data-trabajador="" class="trabajador col-lg-5 bg-gradient-success rounded  text-gray-100 py-2 mt-1 mx-1">
                                 <input type="hidden" name="trabajador<?php echo $i; ?>" value="<?php echo $trabajador["rut"]; ?>">
                                 <?php echo $trabajador["nombre"]." ".$trabajador["apellido"]; ?>
                              </div>
                              <?php endfor; ?>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Fin sección Elementos para rutas--->

               <!-- Seccion Rutas  -->
               <div class="row">
                  <!--Armado de rutas-->
                  <div class="col-lg-6">
                     <div class="card shadow mb-4">
                        <!-- Card Header - Accordion -->
                        <a href="#ruta1" class="d-block card-header py-3" data-toggle="collapse"
                           role="button" aria-expanded="true" aria-controls="collapseCardExample">
                           <h6 class="m-0 font-weight-bold text-primary">Ruta 1 </h6>
                        </a>
                        <!-- Cuerpo tarjeta -->
                        <div class="collapse show">
                           <div class="card-body">
                              <form id="ruta1">
                                 <div class="row">
                                    <div id="ruta-chofer" class=" col-lg-12 rounded border-left-success py-3">
                                       <h4>Chofer</h4>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div id="ruta-pioneta" class=" col-lg-12 rounded border-left-success py-3">
                                       <h4>Pioneta</h4>
                                    </div>
                                 </div>
                                 <div class="row mt-2">
                                    <div id="ruta-arriendos" class="col-lg-12 rounded border-left-primary py-3">
                                       <h4>Arriendos</h4>
                                    </div>
                                 </div>
                                 <button class="btn btn-primary" onclick="">Guardar</button>
                              </form>
                           </div>
                            
                        </div>
                        
                     </div>
                     
                  </div>
               </div>
               <!-- FIN Elementos para rutas-->

               <!-- Seccion ejemplo -->
               <div class="row">
                  <div class="col-lg-12">
                        <div class="card shadow mb-4">
                           <!-- Titulo de la seccion -->
                           <div class="card-header py-3">
                              <h6 class="m-0 font-weight-bold text-primary">
                                    Ejemplo de tarjeta/card
                              </h6>
                           </div>
                           <!-- Cuerpo tarjeta -->
                           <div class="card-body">

                           </div>
                        </div>
                  </div>
               </div>
               <!-- Fin sección ejemplo --->

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

   <!-- Solo rutas.html-->
   <script src="js/rutas.js"></script>

   <!-- Custom scripts for all pages-->
   <script src="js/sb-admin-2.min.js"></script>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</body>

</html>