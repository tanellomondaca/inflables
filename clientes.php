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
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

      <!-- Custom styles for this page -->
      <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

		<!-- Custom fonts for this template-->
		<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

		<!-- Custom styles for this template-->
      <link href="css/sb-admin-2.min.css" rel="stylesheet">
      
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
                  <a class="nav-link" href="arriendos.html">
                     <i class="fas fa-fw fa-chart-area"></i>
                     <span>Arriendos</span></a>
               </li>

               <li class="nav-item">
                  <a class="nav-link" href="rutas.html">
                     <i class="fas fa-fw fa-chart-area"></i>
                     <span>Rutas</span></a>
               </li>

               <li class="nav-item">
                  <a class="nav-link" href="charts.html">
                     <i class="fas fa-fw fa-chart-area"></i>
                     <span>Trabajadores</span></a>
               </li>

               <!-- Divider -->
               <hr class="sidebar-divider">

               <!-- Heading -->
               <div class="sidebar-heading">
                  Addons
               </div>

               <!-- Nav Item - Pages Collapse Menu -->
               <li class="nav-item">
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
               </li>

               <!-- Nav Item - Charts -->
               <li class="nav-item">
                  <a class="nav-link" href="charts.html">
                     <i class="fas fa-fw fa-chart-area"></i>
                     <span>Charts</span></a>
               </li>

               <!-- Nav Item - Tables -->
               <li class="nav-item">
                  <a class="nav-link" href="tables.html">
                     <i class="fas fa-fw fa-table"></i>
                     <span>Tables</span></a>
               </li>

               <!-- Divider -->
               <hr class="sidebar-divider d-none d-md-block">

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
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                           <form class="form-inline mr-auto w-100 navbar-search">
                              <div class="input-group">
                              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
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
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i class="fas fa-bell fa-fw"></i>
                           <!-- Counter - Alerts -->
                           <span class="badge badge-danger badge-counter">3+</span>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
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
                        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i class="fas fa-envelope fa-fw"></i>
                           <!-- Counter - Messages -->
                           <span class="badge badge-danger badge-counter">7</span>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                           <h6 class="dropdown-header">
                              Message Center
                           </h6>
                           <a class="dropdown-item d-flex align-items-center" href="#">
                              <div class="dropdown-list-image mr-3">
                              <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                              <div class="status-indicator bg-success"></div>
                              </div>
                              <div class="font-weight-bold">
                              <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                              <div class="small text-gray-500">Emily Fowler · 58m</div>
                              </div>
                           </a>
                           <a class="dropdown-item d-flex align-items-center" href="#">
                              <div class="dropdown-list-image mr-3">
                              <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                              <div class="status-indicator"></div>
                              </div>
                              <div>
                              <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                              <div class="small text-gray-500">Jae Chun · 1d</div>
                              </div>
                           </a>
                           <a class="dropdown-item d-flex align-items-center" href="#">
                              <div class="dropdown-list-image mr-3">
                              <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                              <div class="status-indicator bg-warning"></div>
                              </div>
                              <div>
                              <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                              <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                              </div>
                           </a>
                           <a class="dropdown-item d-flex align-items-center" href="#">
                              <div class="dropdown-list-image mr-3">
                              <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                              <div class="status-indicator bg-success"></div>
                              </div>
                              <div>
                              <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                              <div class="small text-gray-500">Chicken the Dog · 2w</div>
                              </div>
                           </a>
                           <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                        </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span>
                           <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
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
                     <!-- Opciones de la pagina de clientes -->
                     <h1 class="h1 mb-4 text-gray-800">Clientez</h1>
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="card shadow mb-4">
                              <!-- Titulo -->
                              <div class="card-header py-3">
                                 <h6 class="m-0 font-weight-bold text-primary">Seleccione una opción</h6>
                              </div>
                              <!-- Cuerpo -->
                              <div class="card-body">
                                 <a href="#ver_cliente" class="btn btn-primary btn-icon-split mt-1">
                                    <span class="icon text-white-50">
                                       <i class="fas fa-info"></i>
                                    </span>
                                    <span class="text">Ver clientes</span>
                                 </a>
                                 <a href="#cliente_nuevo" class="btn btn-success btn-icon-split mt-1">
                                    <span class="icon text-white-50">
                                       <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">Agregar cliente nuevo</span>
                                 </a>
                                 <a href="#modificar_cliente" class="btn btn-warning btn-icon-split mt-1">
                                    <span class="icon text-white-50">
                                       <i class="fas fa-exclamation-triangle"></i>
                                    </span>
                                    <span class="text">Modificar datos de cliente</span>
                                 </a>
                                 <a href="#eliminar_cliente" class="btn btn-danger btn-icon-split mt-1">
                                    <span class="icon text-white-50">
                                       <i class="fas fa-trash"></i>
                                    </span>
                                    <span class="text">Eliminar cliente</span>
                                 </a>
                              </div>
                           </div>
                        </div>

                     </div>
                     <!-- Fin opciones -->

                     <!--Sección: Tabla de clientes-->
                     <div class="row" id="ver_cliente">
                        <div class="col-lg-12">
                           <div class="card shadow mb-4">
                           <!-- Titulo de la tabla-->
                              <div class="card-header py-3">
                                 <h6 class="m-0 font-weight-bold text-primary">Datos de los clientes</h6>
                              </div>
                           <!-- cuerpo de la tabla -->
                              <div class="card-body">
                                 <div class="table-responsive">
                                    <table class="table table-bordered" width="100%" cellspacing="0" id="dataTable">
                                       <thead>
                                          <tr>
                                             <th>RUT</th>
                                             <th>Nombre</th>
                                             <th>Apellido</th>
                                             <th>Telefono</th>
                                             <th>Dirección</th>
                                             <th>Comuna</th>
                                             <th>Correo</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                       </tbody>
                                       <tfoot>
                                       </tfoot>
                                    </table>
                                 </div>
                              </div>
                           <!-- Fin cuerpo tabla -->             
                           </div>
                        </div>
                     </div>
                     <!-- FIN SECCIÓN TABLA-->

                     <!-- Sección: Agregar cliente nuevo -->
                     <div class="row" id="cliente_nuevo">
                        <div class="col-lg-12">
                           <div class="card shadow mb-4">
                              <!-- Titulo de la seccion -->
                              <div class="card-header py-3">
                                 <h6 class="m-0 font-weight-bold text-primary">
                                    Agregar cliente nuevo
                                 </h6>
                              </div>
                              <!-- Cuerpo de la sección--->
                              <div class="card-body">
                                 <!-- Formulario para agregar cliente-->
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
                                          <input type="text" class="form-control form-control-user" name="nombre" id="nombre"
                                             placeholder="Nombre" required>
                                       </div>
                                       <div class="col-sm-6">
                                          <input type="text" class="form-control form-control-user" name="apellido" id="apellido"
                                             placeholder="Apellido" required>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <div class="col-sm-6 mb-3 mb-sm-0">
                                          <input type="text" class="form-control form-control-user" name="rut" id="rut"
                                          placeholder="Rut: 19.123.456-0" required>
                                       </div>
                                       <div class="col-sm-6 mb-3 mb-sm-0">
                                          <input type="email" class="form-control form-control-user" name="correo" id="correo"
                                          placeholder="Correo electrónico" required>
                                       </div> 
                                    </div>
                                    <div class="form-group row">
                                       <div class="col-lg-2 col-md-6">
                                          <h6 class="mt-3 font-weight-bold text-primary" required>
                                          Fecha de nacimiento
                                          </h6>
                                       </div>
                                       <div class="col-lg-4 col-md-6 mb-3">
                                          <input type="date" class="form-control form-control-user" name="fecha_nac"
                                              id="fecha_nac" placeholder="" required>
                                       </div>
                                       <div class="col-lg-6 col-md-12 mb-3 mb-sm-0">
                                          <input type="text" class="form-control form-control-user" name="telefono"
                                             id="telefono"
                                             placeholder="Telefono" required>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <div class="col-lg-6 col-md-6 mb-3">
                                          <input type="text" class="form-control form-control-user" name="direccion"
                                             id="direccion"
                                             placeholder="Direccion" required>
                                       </div>
                                       <div class="col-lg-2 col-md-4">
                                          <h6 class="mt-3 font-weight-bold text-primary" required>
                                          Comuna
                                          </h6>
                                       </div>
                                       <div class="col-lg-4 col-md-8 mt-2">
                                          <select class="custom-select form-control" name="comuna" id="comuna">
                                             <option value="" selected>Comuna</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group row" id="div_cont">
                                       <div class="col-lg-6 mb-3">
                                          <input type="hidden" class="form-control form-control-user" name="clave" id="clave"
                                             placeholder="Clave de ingreso">
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
                     <!-- Fin sección agregar cliente -->

                     <!-- Sección: Modificar cliente -->
                     <div class="row" id="modificar_cliente">
                        <div class="col-lg-12">
                           <div class="card shadow mb-4">
                              <!-- Titulo de la seccion -->
                              <div class="card-header py-3">
                                 <h6 class="m-0 font-weight-bold text-primary">
                                    Modificar datos de un cliente
                                 </h6>
                              </div>
                              <!-- Cuerpo tarjeta -->
                              <div class="card-body">
                                    <div class="form-group row">
                                       <div class="col-lg-3 col-md-4">
                                          <h6 class="mt-2 font-weight-bold text-primary">
                                          Seleccione cliente a modificar
                                          </h6>
                                       </div>
                                       <div class="col-lg-5 col-md-8">
                                          <select class="custom-select custom-control" name="rut_modificar" id="rut_modificar" onchange="actualizarCliente()">
                                             <option value="" selected>Rut</option>
                                          </select>
                                       </div>
                                    </div>
                                    <hr>
                                 <form class="user" id="form_modificar">
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Fin seccion modifica -->

                     <!-- Sección: Eliminar cliente -->
                     <div class="row" id="eliminar_cliente">
                        <div class="col-lg-12">
                           <div class="card shadow mb-4">
                              <!-- Titulo de la seccion -->
                              <div class="card-header py-3">
                                 <h6 class="m-0 font-weight-bold text-primary">
                                    Eliminar cliente
                                 </h6>
                              </div>
                              <!-- Cuerpo tarjeta -->
                              <div class="card-body">
                                    <div class="form-group row">   
                                       <div class="col-lg-3 col-md-4">
                                          <h6 class="font-weight-bold text-primary mt-2">
                                          Seleccione cliente a eliminar
                                          </h6>
                                       </div>
                                       <div class="col-lg-4 col-md-8">
                                          <select class="custom-select custom-control" name="" id="rut_eliminar">
                                             <option value="" selected>Rut</option>
                                          </select>
                                       </div>
                                       <button class="btn btn-danger btn-icon-split ml-4" onclick="eliminarCliente()">
                                             <span class="icon text-white-50">
                                                <i class="fas fa-trash"></i>
                                             </span>
                                             <span class="text" id="">Eliminar datos</span>
                                       </button>
                                    </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Fin seccion eliminar -->

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
                      Fin sección ejemplo -->



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
   <script src="js/clientes.js"></script>

   <!-- Custom scripts for all pages-->
   <script src="js/sb-admin-2.min.js"></script>

   <!-- Page level plugins -->
   <script src="vendor/datatables/jquery.dataTables.min.js"></script>
   <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

     <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

   							

	</body>
</html>