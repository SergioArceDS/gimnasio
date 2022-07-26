<!-- Modal para eliminar cliente -->
<div class="modal fade" id="eliminarModal" tabindex="-1" role="dialog" aria-labelledby="tituloVentana" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-registro">
                <div class="modal-header">
                    <h5 id="tituloVentana">ELIMINAR CLIENTE</h5>
                    <button class="close" data-dismiss="modal" aria-label="cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?php echo constant('URL') ?>clientes/eliminarCliente" class="registro-cliente">
                        <input type="hidden" name="idEliminar" id="idClienteEliminar" value="">
                        <div class="text-center">Seguro que desea eliminar este cliente?</div>
                        <div class="text-center mt-5">ADVERTENCIA: Todos los registros asociados a este cliente se eliminaran</div>
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