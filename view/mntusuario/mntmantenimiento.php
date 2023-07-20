<!-- Modal -->
<div class="modal fade" id="mantenimiento" data-backdrop="static" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">

            <form action="" method="post" id="usuario_form" >
                <div class="modal-header">
                    <h5  id="lbltitulo" class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">
                        
                        <input type="hidden" name="usu_id" id="usu_id"/>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                <label>usu_nombre</label>
                                <input type="text" id="usu_nombre"  name="usu_nombre" class="form-control" placeholder="Nombre" >
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-4">
                                <div class="form-group">
                                <label>usu_cedula</label>
                                <input type="number" id="usu_cedula"  name="usu_cedula" class="form-control" placeholder="CEDULA">
                                </div>

                            <!-- /.form-group -->
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                <label>usu_cargo</label>
                                <input type="text" id="usu_cargo"  name="usu_cargo" class="form-control" placeholder="Cargo" >
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                <label>usu_usuario</label>
                                <input type="text" id="usu_usuario"  name="usu_usuario" class="form-control" placeholder="Usuario" >
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                <label>usu_password</label>
                                <input type="text" id="usu_password"  name="usu_password" class="form-control" placeholder="Password" >
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                <label>usu_nivel</label>
                                <input type="text" id="usu_nivel"  name="usu_nivel" class="form-control" placeholder="nivel" >
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label>usu_fech_ingreso</label>
                                <input type="date" id="usu_fech_ingreso"  name="usu_fech_ingreso" class="form-control"  >
                                </div>
                                <!-- /.form-group -->
                            </div>
                            
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