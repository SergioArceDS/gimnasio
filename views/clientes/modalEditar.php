<!-- Modal para editar cliente -->
<div class="modal fade" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="tituloVentana" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-registro">
                <div class="modal-header">
                    <h5 id="tituloVentana">EDITAR CLIENTE</h5>
                    <button class="close" data-dismiss="modal" aria-label="cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?php echo constant('URL') ?>clientes/editarCliente" class="registro-cliente">
                        <input type="hidden" id="idClienteEdit" name="idCliente" value="">
                        <div class="form-group row">
                            <label for="inputNombre" class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control"  value="" id="inputEditarNombre" name="nombre" placeholder="Nombre">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputApellido" class="col-sm-2 col-form-label">Apellidos</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="inputEditarApellido" name="apellidos" placeholder="Apellidos">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="inputPeso" class="col-sm-2 col-form-label">Peso</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="inputEditarPeso" name="peso" placeholder="Peso">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputAltura" class="col-sm-2 col-form-label">Altura</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="inputEditarAltura" name="altura" placeholder="Altura">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputCelular" class="col-sm-2 col-form-label">Celular</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="inputEditarCelular" name="celular" placeholder="Celular">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputEdad" class="col-sm-2 col-form-label">Edad</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="inputEditarEdad" name="edad" placeholder="Edad">
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