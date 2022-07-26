<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>css/inicio.css">

    <title>GYM</title>

    
    <link href="<?php echo constant('URL'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    
    <link href="<?php echo constant('URL'); ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- SIDEBAR -->
        <?php include_once 'views/sidebar.php' ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include_once 'views/topbar.php' ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Inicio <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-500" data-toggle="modal" data-target="#configuracionModal"></i></h1>
                    </div>
                    <div class="mb-3" style="color: #c00; font-weight: 600;"><?php echo $this->mensaje; ?></div>

                    <div class="row">

                        <!-- Tarjeta Usuarios -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                USUARIOS</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $this->usuarios['total_usuarios'] ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tarjeta Ganancias -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                GANANCIAS MENSUALES</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php echo number_format($this->usuarios['total_ganancias_mes']); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tarjeta Clientes -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">CLIENTES
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $this->usuarios['total_clientes'] ?></div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tarjeta Productos -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                PRODUCTOS</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $this->usuarios['total_productos'] ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-box-open fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        
                        <div class="col-xl-7 col-lg-5">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-gradient-primary">
                                    <!-- AQUI VA EL NOMBRE DEL GIMNASIO -->
                                    <h6 class="m-0 font-weight-bold text-light">GYM</h6>  
                                </div>
                                <!-- AQUI VA EL LOGO DEL GIMNASIO -->
                                <img src="<?php echo constant('URL') . '/img/' . $this->configuracion['imagen'];?>" alt="" class="logo_gimnasio">
                            </div>
                        </div>

                        
                        <div class="col-xl-5 col-lg-7">
                            <div class="card shadow mb-4">
                                
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-gradient-primary">
                                    <!-- INFORMACION GENERAL DEL GIMNASIO -->
                                    <h6 class="m-0 font-weight-bold text-light">Informacion General</h6>      
                                </div>

                                <!-- Card Body -->
                                <div class="card-body info_gym">
                                   <h1 class="nombre_gym"><?php echo strtoupper($this->configuracion['nombre_gimnasio']); ?></h1>
                                   <hr style="width:75%;">
                                   <div>
                                        <p class="info_titulo">Direccion:</p><p class="info_texto"><?php echo $this->configuracion['direccion']; ?></p>
                                        <p class="info_titulo">Telefono:</p><p class="info_texto"><?php echo $this->configuracion['telefono']; ?></p>
                                        <p class="info_titulo">Correo:</p><p class="info_texto"><?php echo $this->configuracion['correo']; ?></p>
                                   </div>             
                                   <hr style="width:75%;">
                                </div>

                                </div>
  
                            </div>
                        </div>

                    </div>
                    
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            

        </div>
        <!-- End of Content Wrapper -->
        
        <!-- Footer -->
        <?php include_once 'views/footer.php' ?>
        <!-- End of Footer -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Listo para salir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecciona "Cerrar Sesion" abajo si estas seguro de terminar la sesion actual.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="<?php echo constant('URL'); ?>login/logout">Cerrar Sesion</a>
                </div>
            </div>
        </div>
    </div>


    <!--Modal para agregar un nuevo cliente-->
    <div class="modal fade" id="configuracionModal" tabindex="-1" role="dialog" aria-labelledby="tituloVentana" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-registro">
                <div class="modal-header">
                    <h5 id="tituloVentana">INFORMACION GENERAL</h5>
                    <button class="close" data-dismiss="modal" aria-label="cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?php echo constant('URL') ?>main/actualizarInformacion" class="registro-cliente">
                        <div class="form-group row mt-3">
                            <label for="inputNombreGimnasio" class="col-sm-3 col-form-label">Nombre Gimnasio</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="inputNombreGimnasio" name="nombre_gimnasio" placeholder="Nombre gimnasio" value="<?php echo $this->configuracion['nombre_gimnasio']; ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputDireccion" class="col-sm-3 col-form-label">Direccion</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="inputDireccion" name="direccion_gimnasio" placeholder="Direccion" value="<?php echo $this->configuracion['direccion']; ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputTelefono" class="col-sm-3 col-form-label">Telefono</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="inputTelefono" name="telefono_gimnasio" placeholder="Telefono" value="<?php echo $this->configuracion['telefono']; ?>" required>
                            </div>
                        </div>
                        <div class="form-group row mb-5">
                            <label for="inputCorreo" class="col-sm-3 col-form-label">Correo</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="inputCorreo" name="correo_gimnasio" placeholder="Correo" value="<?php echo $this->configuracion['correo']; ?>" required>
                        </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success">Actualizar Informacion</button>
                        </div>

                    </form>
                    <hr>   
                    <form method="POST" action="<?php echo constant('URL') ?>main/actualizarImagen" enctype="multipart/form-data">
                        <div class="form-group row m-3 pb-3">
                            <label class="col-sm-4 col-form-label">Logo</label>
                            <div class="">
                                <input type="file" name="logo_gimnasio" class="form-control-file">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success">Cambiar Imagen</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>

   



    <script src="<?php echo constant('URL'); ?>js/sb-admin-2.min.js"></script>

    <script src="<?php echo constant('URL'); ?>js/prueba.js"></script>

    <!-- JavaScript necesario para bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 

</body>

</html>