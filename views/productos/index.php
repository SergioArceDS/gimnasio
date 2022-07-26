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
                    <h1 class="h3 mb-2 text-gray-800">Productos</h1>
                  

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            
                            <a data-toggle="modal" data-target="#productoModal" class="btn btn-primary btn-icon-split" style="margin-right: 30px;">
                                <span class="text">Agregar</span>
                            </a>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Cantidad</th>
                                            <th>Costo</th>
                                            <th>Descripcion</th>
                                            <th>Fecha de agregacion</th>
                                            <th></th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Cantidad</th>
                                            <th>Costo</th>
                                            <th>Descripcion</th>
                                            <th>Fecha de agregacion</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                        
                                            include_once 'models/producto.php';
                                            foreach($this->productos as $row){
                                                $producto = new Producto();
                                                $producto = $row;
                                            
                                        ?>
                                        <tr>
                                            <td><?php echo $producto->id_producto; ?></td>
                                            <td><?php echo $producto->nombre_producto; ?></td>
                                            <td><?php echo $producto->cantidad_disponible; ?></td>
                                            <td>$<?php echo number_format($producto->costo); ?></td>
                                            <td><?php echo $producto->descripcion; ?></td>
                                            <td><?php echo $producto->fecha_agregacion; ?></td>
                                            <td>
                                            
                                                        <a href="" style="margin-left: 10px;" data-id="<?php echo $producto->id_producto; ?>" class="btn btn-warning btn-circle btnEditar" data-toggle="modal" data-target="#editarModal">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        
                                                        <a href="" style="margin-left: 10px;" data-toggle="modal" data-target="#eliminarModal" data-id="<?php echo $producto->id_producto; ?>" class="btn btn-danger btn-circle btnEliminar">
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

    <!-- Modal agregar producto-->
    <div class="modal fade" id="productoModal" tabindex="-1" role="dialog" aria-labelledby="tituloVentana" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-registro">
                <div class="modal-header">
                    <h5 id="tituloVentana">AGREGAR PRODUCTO</h5>
                    <button class="close" data-dismiss="modal" aria-label="cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?php echo constant('URL') ?>productos/agregarProducto" class="registro-cliente">
                        <input type="hidden" id="idClienteEdit" name="idCliente" value="">
                        <div class="form-group row">
                            <label for="inputNombre" class="col-sm-3 col-form-label">Nombre</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control"  value="" id="inputNombre" name="nombreProducto" placeholder="Nombre" required>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputCantidad" class="col-sm-3 col-form-label">Cantidad</label>
                            <div class="col-sm-8">
                              <input type="number" class="form-control" id="inputCantidad" name="cantidad" placeholder="Cantidad" required>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="inputCosto" class="col-sm-3 col-form-label">Costo</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="inputCosto" name="costo" placeholder="Costo" required>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputDescripcion" class="col-sm-3 col-form-label">Descripcion</label>
                            <div class="col-sm-8">
                              <textarea name="descripcion" class="form-control" id="inputDescripcion" cols="30" rows="10" required></textarea>
                            </div>
                          </div>
                         
                        
                            <div class="modal-footer">
                                <button class="btn btn-warning" type="button" data-dismiss="modal">
                                    Cerrar
                                </button>
                                <button class="btn btn-success">Agregar Producto</button>
                            </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Modal para editar cliente -->
<div class="modal fade" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="tituloVentana" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-registro">
                <div class="modal-header">
                    <h5 id="tituloVentana">EDITAR PRODUCTO</h5>
                    <button class="close" data-dismiss="modal" aria-label="cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?php echo constant('URL') ?>productos/editarProducto" class="registro-cliente">
                        <input type="hidden" id="idProductoEdit" name="idProducto" value="">
                        <div class="form-group row">
                            <label for="inputNombre" class="col-sm-3 col-form-label">Nombre</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control"  value="" id="inputEditarNombre" name="nombre" placeholder="Nombre">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputApellido" class="col-sm-3 col-form-label">Cantidad Disponible</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="inputEditarCantidad" name="cantidad" placeholder="Cantidad">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="inputPeso" class="col-sm-3 col-form-label">Costo</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="inputEditarCosto" name="costo" placeholder="Costo">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputAltura" class="col-sm-3 col-form-label">Descripcion</label>
                            <div class="col-sm-8">
                              <textarea name="descripcion" id="inputEditarDescripcion" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                          </div>
                          
                            <div class="modal-footer">
                                <button class="btn btn-warning" type="button" data-dismiss="modal">
                                    Cerrar
                                </button>
                                <button class="btn btn-success">Actualizar</button>
                            </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Modal para eliminar un producto -->
<div class="modal fade" id="eliminarModal" tabindex="-1" role="dialog" aria-labelledby="tituloVentana" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-registro">
                <div class="modal-header">
                    <h5 id="tituloVentana">ELIMINAR PRODUCTO</h5>
                    <button class="close" data-dismiss="modal" aria-label="cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?php echo constant('URL') ?>productos/eliminarProducto" class="registro-cliente">
                        <input type="hidden" name="idEliminar" id="idProductoEliminar" value="">
                        <div class="text-center">Seguro que desea eliminar este producto?</div>
                        <div class="text-center mt-5">ADVERTENCIA: Todos los registros asociados a este producto se eliminaran.</div>
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

    <script src="<?php echo constant('URL'); ?>js/productos.js"></script>
    <script src="<?php echo constant('URL'); ?>js/sb-admin-2.min.js"></script>

                                                   
    <script src="<?php echo constant('URL'); ?>js/prueba.js"></script>

    <!-- JavaScript necesario para bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 

</body>

</html>