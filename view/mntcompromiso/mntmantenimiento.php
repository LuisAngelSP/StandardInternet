

<!-- Modal -->
<div class="modal fade" id="compromiso"  tabindex="-1" data-backdrop="static" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">

            <form action="" method="post" id="compromiso_form">
                <div class="modal-header">
                    <h5 id="lbltitulo1" class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                
                <div class="modal-body">
                    <input type="hidden" name="id_compromiso" id="id_compromiso" />
                    <input type="hidden" name="id_cliente" id="id_cliente" />
                    <div class="row">
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>comp_fech</label>                               
                                <input type="datetime-local" name="comp_fech" id="comp_fech" class="form-control">
                            </div>
                            
                            <!-- /.form-group -->
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="comp_tipo">comp_tipo</label>
                                <select class="custom-select rounded-0" id="comp_tipo" name="comp_tipo">
                                    <option value="">Tipo de Compromiso </option>
                                    <option value="llamar">Llamar</option>
                                    <option value="visitar">Visitar</option>
                                    <option value="pagar">Pagar</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.col -->

                        <!-- /.col -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>comp_descrip</label>
                                <textarea name="comp_descrip" id="comp_descrip" class="form-control"></textarea>

                            </div>

                            <!-- /.form-group -->
                        </div>         
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary btn-guardar">Guardar(G)</button>
                    </div>
            </form>


                
        </div>
    </div>
</div>