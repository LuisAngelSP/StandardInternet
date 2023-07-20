<!-- Modal -->

<?php
$cliente = $_GET['cli_id'];

?>


<div class="modal fade" id="modcasa" data-backdrop="static" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">

            <form action="" method="post" id="modcasa_form">
                <div class="modal-header">
                    <h5 id="lbltitulo" class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="id_casas" id="id_casas" />
                    <input type="hidden" name="id_cliente" id="id_cliente" value="<?php echo $cliente; ?>" required />
                    <input type="hidden" name="cas_descripcion" id="cas_descripcion" />
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Direccion</label>
                                <input type="text" id="cas_direccion" name="cas_direccion" class="form-control" placeholder="Direccion">
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Altura de la casa</label>
                                <input type="text" id="casa12" name="casa12" class="form-control" placeholder="">
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>casa13</label>
                                <input type="text" id="casa13" name="casa13" class="form-control" placeholder="">
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>casa14</label>
                                <input type="text" id="casa14" name="casa14" class="form-control" placeholder="">
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>casa15</label>
                                <input type="text" id="casa15" name="casa15" class="form-control" placeholder="">
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->




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