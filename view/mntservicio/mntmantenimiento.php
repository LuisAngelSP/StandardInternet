<!-- Modal -->
<div class="modal fade" id="mantenimiento" data-backdrop="static" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">

            <form action="" method="post" id="servicio_form" >
                <div class="modal-header">
                    <h5  id="lbltitulo" class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">
                        
                        <input type="hidden" name="serv_id" id="serv_id"/>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label>Servicio</label>
                                <input type="text" id="serv_nom"  name="serv_nom" class="form-control" placeholder="Nombre del Servicio" required>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-12">
                                <label>Descripción</label>
                                    <textarea class="form-control" id="serv_obser" name="serv_obser" rows="3" required></textarea>
                            </div>
                        <!-- /.col -->
                        </div>
                                

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
            </form>

            
                
        </div>
    </div>
</div>