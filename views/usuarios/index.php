<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

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
        <!-- Sidebar -->
        <?php include_once 'views/sidebar.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include_once 'views/topbar.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Usuarios</h1>
                  

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            
                            <form action="<?php echo constant('URL') ?>usuarios/crearUsuario" method="POST">
                                <div class="col-sm-2 mb-3 mb-sm-0 d-inline" style="width: 200px;">
                                    <input type="text" class="form-control form-control-user d-inline" id="usuarioNombre"
                                        placeholder="Nombre" style="width: 200px;" name="nombreUsuario" required>
                                </div>

                                <div class="col-sm-2 mb-3 mb-sm-0 d-inline" style="width: 200px;">
                                    <input type="text" class="form-control form-control-user d-inline" id="usuarioUser"
                                        placeholder="Usuario" style="width: 200px;" name="username" required>
                                </div>

                                <div class="col-sm-2 mb-3 mb-sm-0 d-inline" style="width: 200px;">
                                    <input type="password" class="form-control form-control-user d-inline" id="usuarioContraseña"
                                        placeholder="Contraseña" style="width: 200px;" name="password" required>
                                </div>

                                <div class="col-sm-2 mb-3 mb-sm-0 d-inline" style="width: 200px;">
                                    <input type="password" class="form-control form-control-user d-inline" id="usuarioContraseña"
                                        placeholder="Confirmar contraseña" style="width: 200px;" name="confirmPassword" required>
                                </div>

                                <div id="contenedor-botones" style="display: inline; float: right;">
                                    <button class="btn btn-primary btn-icon-split" style="margin-right: 30px;">
                                        <span class="text">Guardar</span>
                                    </button>
                                </div>
                            </form>
                            <div class="mt-5 mb-0" style="color: #c00; font-weight: 600;"><?php echo $this->mensaje; ?></div>
                            

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Usuario</th>
                                            <th></th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Usuario</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            include_once 'models/usuario.php';
                                            foreach($this->usuarios as $row){
                                                $usuario = new Usuario();
                                                $usuario = $row;
                                            
                                        ?>
                                        <tr>
                                            <td><?php echo $usuario->nombre; ?></td>
                                            <td><?php echo $usuario->username; ?></td>
                                            <td>
                                                <a href="<?php echo constant('URL') . 'usuarios/verUsuario/' . $usuario->id_usuario;?>" style="margin-left: 10px;" class="btn btn-warning btn-circle btnEditar">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                            
                                                <a href="" style="margin-left: 10px;" data-toggle="modal" data-target="#eliminarModal" data-id="<?php echo $usuario->id_usuario; ?>" class="btn btn-danger btn-circle btnEliminar">
                                                    <i class="fas fa-trash"></i>
                                                </a> 
                                            </td>
                                            
                                        </tr>
                                        <?php } ?>
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include_once 'views/footer.php'; ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Modal para eliminar cliente -->
<div class="modal fade" id="eliminarModal" tabindex="-1" role="dialog" aria-labelledby="tituloVentana" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-registro">
                <div class="modal-header">
                    <h5 id="tituloVentana">ELIMINAR USUARIO</h5>
                    <button class="close" data-dismiss="modal" aria-label="cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?php echo constant('URL') ?>usuarios/eliminarUsuario" class="registro-cliente">
                        <input type="hidden" name="idEliminar" id="idUsuarioEliminar" value="">
                        <div class="text-center mt-3">Seguro que desea eliminar este usuario?</div>
                        
                        <div class="mx-auto m-5" style="width: 200px;">
                                <button class="btn btn-warning m-1" type="button" data-dismiss="modal">
                                    Cancelar
                                </button>
                                <button class="btn btn-danger m-1">Eliminar</button>
                        </div>       
                            
                    </form>
                </div>
                
            </div>
        </div>
</div>

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


    <script src="<?php echo constant('URL'); ?>js/sb-admin-2.min.js"></script>
    <script src="<?php echo constant('URL'); ?>js/usuarios.js"></script>                                             
    <script src="<?php echo constant('URL'); ?>js/prueba.js"></script>

    <!-- JavaScript necesario para bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 

</body>

</html>