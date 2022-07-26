<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>css/pagos.css">

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
        <?php  include_once 'views/sidebar.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php  include_once 'views/topbar.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Pagos</h1>
                  
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            
                            <!-- Input para buscar clientes por el ID -->
                            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="POST" action="<?php echo constant('URL'); ?>pagos/datosCliente">
                                <div class="input-group">
                                    
                                    <div class="input-group-append">
                                        <label for="btn-buscar" style="margin-right: 10px;">ID Cliente:</label>
                                    </div>
                                    <input type="number" class="form-control bg-white border-1 small" placeholder="Buscar por..."
                                        aria-label="Search" aria-describedby="basic-addon2" name="btn-buscar" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="mt-5">
                                    <p style="color: #c00; font-weight: 600;"><?php echo $this->mensaje; ?></p>
                                </div>
                            </form>
                            <br>
                            <div class="info-cliente-container">
                                <div class="dato-contenedor d-inline">
                                    <label for="nombre">Nombre: </label>
                                    <div name="nombre" class="d-inline" ></div>
                                </div>

                                <div class="dato-contenedor d-inline">
                                    <label for="nombre">Apellidos: </label>
                                    <div name="apellido" class="d-inline" ></div>
                                </div>

                                <div class="dato-contenedor d-inline">
                                    <label for="nombre">Peso: </label>
                                    <div name="peso" class="d-inline" ></div>
                                </div>

                                <div class="dato-contenedor d-inline">
                                    <label for="nombre">Altura: </label>
                                    <div name="altura" class="d-inline" ></div>
                                </div>

                                <div class="dato-contenedor d-inline">
                                    <label for="nombre">Celular: </label>
                                    <div name="celular" class="d-inline" ></div>
                                </div>

                                <div class="dato-contenedor d-inline">
                                    <label for="nombre">Edad: </label>
                                    <div name="edad" class="d-inline" ></div>
                                </div>

                                <div class="dato-contenedor d-inline">
                                    <label for="nombre">Vencimiento: </label>
                                    <div name="edad" class="d-inline" ></div>
                                </div>

                            </div>

                            <div class="fechas-pago">
                                <div>
                                    <label for="">Fecha de pago:</label>
                                    <input class="form-date__input" type="date" required>
                                </div>

                                <div>
                                    <label for="">Nueva Fecha de Vencimiento:</label>
                                    <input type="date" class="form-date__input" required>
                                </div>

                                <div class="">
                                    <label for="membresias" class="" style="margin-right: 25px;">Membresia:</label>
                                    <select id="membresias" name="membresias" style="border: 2px solid #4e73df; color:#444; border-radius: .3em;" class="" required>
                                    <?php 
                                            include_once 'models/membresia.php';
                                            foreach($this->membresias as $row){
                                                $membresia = new Membresia();
                                                $membresia = $row;
                                    ?>
                                    <option value="<?php echo $membresia->id_membresia; ?>"><?php echo $membresia->nombre; ?></option>
                                    <?php } ?>
                                    </select>
                                </div>

                                <a href="#" class="btn btn-primary btn-icon-split" style="margin-right: 30px;">
                                    <span class="text">Registrar Pago</span>
                                </a>
                            </div>

                            

                            <br>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID Pago</th>
                                            <th>ID Cliente</th>
                                            <th>ID Membresia</th>
                                            <th>Fecha de pago</th>
                                            <th>Fecha de vencimiento</th>
                                            <th>Monto</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID Pago</th>
                                            <th>ID Cliente</th>
                                            <th>ID Membresia</th>
                                            <th>Fecha de pago</th>
                                            <th>Fecha de vencimiento</th>
                                            <th>Monto</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            include_once 'models/pago.php';
                                            foreach($this->pagos as $row){
                                                $pago = new Pago();
                                                $pago = $row;
                                        ?>
                                        <tr>
                                            <td><?php echo $pago->id_pago; ?></td>
                                            <td><?php echo $pago->id_cliente; ?></td>
                                            <td><?php echo $pago->id_membresia; ?></td>
                                            <td><?php echo $pago->fecha_inscripcion; ?></td>
                                            <td><?php echo $pago->fecha_vencimiento; ?></td>
                                            <td>$<?php echo number_format($pago->monto); ?></td>
                                            
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
            <?php  include_once 'views/footer.php'; ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

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

    
    <script src="<?php echo constant('URL'); ?>js/sb-admin-2.min.js"></script>


    <script src="<?php echo constant('URL'); ?>js/prueba.js"></script>

    <!-- JavaScript necesario para bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 

</body>

</html>