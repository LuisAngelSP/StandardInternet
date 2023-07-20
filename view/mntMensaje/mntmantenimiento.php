<!-- Modal -->
<div class="modal fade" id="mantenimiento" data-backdrop="static" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <form action="" method="post" id="Mensaje_form">
                <div class="modal-header">
                    <h5 id="lbltitulo" class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"> 
                    <input type="hidden" name="id_mensaje" id="id_mensaje" />
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="titulo">Titulo</label>
                                <input type="text" id="titulo" name="titulo" class="form-control">
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <div class="col-md-1 ">

                        </div>
                        <div class="col-md-4 ">
                            <div class="form-group">
                                <input type="button" id="CLIENTE" name="CLIENTE" class=" m-1" value="CLIENTE">
                                <input type="button" id="celular" name="celular" class="m-1" value="celular">
                                <input type="button" id="correo" name="correo" class="m-1" value="correo">
                                <input type="button" id="dni" name="dni" class=" m-1" value="dni">
                                <input type="button" id="mes" name="mes" class=" m-1" value="mes">
                                <input type="button" id="servicio" name="servicio" class=" m-1" value="servicio">
                                <input type="button" id="costo" name="costo" class=" m-1" value="costo">
                              </div>
                        </div>
                        <!-- /.form-group -->


                        <div class="col-lg-12">
                            <div class="form-group">
                                <textarea id="contenido" name="contenido" class="form-control">

                                </textarea>
                            </div>

                        </div>
                        
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