<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
   <link rel="stylesheet" href="<?php echo constant('URL'); ?>css/registro.css">
   <link rel="stylesheet" href="<?php echo constant('URL'); ?>css/paginacion.css">

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
        <?php include_once 'views/sidebar.php' ?>
        <!-- End of Sidebar -->

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
                    <h1 class="h3 mb-2 text-gray-800">Clientes</h1>
                  

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <a data-toggle="modal" data-target="#ventanaModal" href="#" class="btn btn-primary btn-icon-split" style="margin-left: 30px;">
                                        <span class="text">Nuevo</span>
                                    </a>
                                </div>
                                

                                <div class="ml-auto mr-3">
                                    <form action="<?php echo constant('URL'); ?>clientes/render" method="POST" class="d-flex align-items-center">
                                        <div class="input-group-append">
                                            <label class="mr-2">Buscar:</label>
                                        </div>
                                        <input type="search"  aria-label="Search" aria-describedby="basic-addon2" class="form-control form-control-sm" placeholder="" name="busqueda" required>
                                        <div class="input-group-append ml-2">
                                            <button class="btn btn-primary" type="submit">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </form>     
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Apellidos</th>
                                            <th>Peso</th>
                                            <th>Altura</th>
                                            <th>Celular</th>
                                            <th>Edad</th>
                                            <th>Fecha inscripcion</th>
                                            <th>Membresia</th>
                                            <th>Fecha vencimiento</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Apellidos</th>
                                            <th>Peso</th>
                                            <th>Altura</th>
                                            <th>Celular</th>
                                            <th>Edad</th>
                                            <th>Fecha inscripcion</th>
                                            <th>Membresia</th>
                                            <th>Fecha vencimiento</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            include_once 'models/cliente.php';
                                            foreach($this->clientes as $row){
                                                $cliente = new Cliente();
                                                $cliente = $row;                                           
                                        ?>
                                                <tr clienteId="<?php echo $cliente->id_cliente; ?>">
                                                    <td><?php echo $cliente->id_cliente; ?></td>
                                                    <td><?php echo $cliente->nombre_cliente; ?></td>
                                                    <td><?php echo $cliente->apellidos; ?></td>
                                                    <td><?php echo $cliente->peso; ?></td>
                                                    <td><?php echo $cliente->altura; ?></td>
                                                    <td><?php echo $cliente->celular; ?></td>
                                                    <td><?php echo $cliente->edad; ?></td>
                                                    <td><?php echo $cliente->fecha_inscripcion; ?></td>
                                                    <td><?php echo $cliente->nombre_membresia; ?></td>
                                                    <td><?php echo $cliente->fecha_vencimiento; ?></td>
                                                    <td>
                                            
                                                        <a href="" style="margin-left: 10px;" data-id="<?php echo $cliente->id_cliente; ?>" class="btn btn-warning btn-circle btnEditar" data-toggle="modal" data-target="#editarModal">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        
                                                        <a href="" style="margin-left: 10px;" data-toggle="modal" data-target="#eliminarModal" data-id="<?php echo $cliente->id_cliente; ?>" class="btn btn-danger btn-circle btnEliminar">
                                                            <i class="fas fa-trash"></i>
                                                        </a>      
                                                    </td>
                                                </tr>
                                        <?php } ?> 
                                    </tbody>
                                </table>
                                <div  class="row col-sm-12 col-md-7">
                                   <div id="paginas">
                                        <ul>
                                            <?php 
                                                for($i=0; $i < $this->totalPaginas; $i++){
                                                    if(($i + 1) == $this->actual){
                                                        $actual = ' class="actual" ';
                                                    }else{
                                                        $actual = '';
                                                    }
                                                    echo '<li><a ' . $actual . 'href="' . constant('URL').'clientes?pagina='. ($i + 1) .'">' . ($i + 1) . '</a></li>';
                                                    
                                                }
                                            ?>
                                        </ul>
                                   </div>             
                                </div>
                                
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include_once 'views/footer.php' ?>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!--Modal para cerrar la Sesion-->
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
    <div class="modal fade" id="ventanaModal" tabindex="-1" role="dialog" aria-labelledby="tituloVentana" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-registro">
                <div class="modal-header">
                    <h5 id="tituloVentana">REGISTRO DE CLIENTES</h5>
                    <button class="close" data-dismiss="modal" aria-label="cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?php echo constant('URL') ?>clientes/registrarCliente" class="registro-cliente">
                        <div class="form-group row">
                            <label for="inputNombre" class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="inputNombre" name="nombre" placeholder="Nombre">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputApellido" class="col-sm-2 col-form-label">Apellidos</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="inputApellido" name="apellidos" placeholder="Apellidos">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="inputPeso" class="col-sm-2 col-form-label">Peso</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="inputPeso" name="peso" placeholder="Peso">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputAltura" class="col-sm-2 col-form-label">Altura</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="inputAltura" name="altura" placeholder="Altura">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputCelular" class="col-sm-2 col-form-label">Celular</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="inputCelular" name="celular" placeholder="Celular">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputEdad" class="col-sm-2 col-form-label">Edad</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="inputEdad" name="edad" placeholder="Edad">
                            </div>
                          </div>
                          
                          <div class="form-group row">
                            <label for="membresias" class="col-sm-2 col-form-label" style="margin-right: 25px;">Membresia</label>
                                <select id="membresias" name="membresias" style="border: 1px solid #aaa; color:#444; border-radius: .3em;">
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
                          <div class="form-group row">
                            <label for="InputFechaInscripcion" class="col-sm-4 col-form-label">Fecha Inscripcion</label>
                            <div class="col-sm-8">
                              <input type="date" class="form-control" id="InputFechaInscripcion" name="fechaInscripcion" placeholder="Fecha inscripcion">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputFechaVencimiento" class="col-sm-4 col-form-label">Fecha Vencimiento</label>
                            <div class="col-sm-8">
                              <input type="date" class="form-control" id="inputFechaVencimiento" name="fechaVencimiento" placeholder="Fecha vencimiento">
                            </div>
                          </div>
                        
                            <div class="modal-footer">
                                <button class="btn btn-warning" type="button" data-dismiss="modal">
                                    Cerrar
                                </button>
                                <button class="btn btn-success">Guardar</button>
                            </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div> 

    <?php include_once 'modalEditar.php'; ?>
    <?php include_once 'modalEliminar.php'; ?>

    <script src="<?php echo constant('URL'); ?>js/sb-admin-2.min.js"></script>
    <script src="<?php echo constant('URL'); ?>js/prueba.js"></script>
    <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"></script>
    <script src="<?php echo constant('URL'); ?>js/clientes.js"></script>

    <!-- JavaScript necesario para bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    

</body>

</html>