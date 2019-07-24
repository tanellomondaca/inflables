<?php
   session_start();
   if($_SESSION["oficina"]== null || $_SESSION["oficina"] != "si"){
      session_abort();
      header("Location: http://pdc.arcadesamuel.cl");
   }

   include 'ruta_arriendos.php';
   // $fecha = $_GET["fecha"];
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

            <div class="container-fluid mt-1">
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
                           <?php 
                              //$sql_arriendos = "SELECT * FROM arriendo A WHERE A.fecha = '$fecha' OR A.fin = '$fecha' ";
                              //$resultado_arriendo = mysqli_query($conexion, $sql_arriendos);
                              
                           ?>
                              <?php for($i=0 ; $i<$cant_arr ; $i++): #este $i es el numero de arriendo ?>
                              <div id="<?php echo $nombre_juego[$i][0]; ?>" class="row bg-gradient-primary rounded  text-gray-100 mt-1 punto">
                                 <div class="col-lg-4">
                                       <?php for($j=1; $j< count($nombre_juego[$i]); $j++){
                                       echo $nombre_juego[$i][$j]."<br>";
                                       } ?>                         
                                 </div>
                                 <div class="col-lg-2">
                                       <?= $info_arriendo[$i][0]." - ".$info_arriendo[$i][1];?>
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
                        <div class="collapse show"  id="ruta1">
                           <div class="card-body">
                              <form>
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
               <!-- <div class="row">
                  <div class="col-lg-12">
                        <div class="card shadow mb-4"> -->
                           <!-- Titulo de la seccion -->
                           <!-- <div class="card-header py-3">
                              <h6 class="m-0 font-weight-bold text-primary">
                                    Ejemplo de tarjeta/card
                              </h6>
                           </div> -->
                           <!-- Cuerpo tarjeta -->
                           <!-- <div class="card-body">

                           </div>
                        </div>
                  </div>
               </div> -->
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