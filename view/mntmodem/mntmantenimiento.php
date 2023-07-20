<?php 

    require_once("../../model/Contrato.php");

    $contrato= new Contrato();
    $datos=$contrato->get_contrato_x_form();


?>

<!-- Modal -->
<div class="modal fade" id="mantenimiento" data-backdrop="static" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">

            <form action="" method="post" id="modem_form" >
                <div class="modal-header">
                    <h5  id="lbltitulo" class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">
                        
                        <input type="hidden" name="id_modem" id="id_modem"/>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>mod_descripcion</label>
                                <input type="text" id="mod_descripcion"  name="mod_descripcion" class="form-control" placeholder="Despcripcion">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label for="id_titular">id_contrato</label>
                                <select class="custom-select rounded-0" id="id_contrato" name="id_contrato">
                                    <option value="">Selecionar Contrato</option>
                                    <?php 
                                        foreach($datos as $r){
                                            echo "<option value='".$r['id_contrato']."'>".$r['id_contrato']." | ".$r['contr_descripcion']."</option>";
                                        }
                                     ?>
                                </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>mod_imagen</label>
                                <input type="text" id="mod_imagen"  name="mod_imagen" class="form-control" placeholder="URL IMAGEN">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>mod_codigo_acceso</label>
                                <input type="text" id="mod_codigo_acceso"  name="mod_codigo_acceso" class="form-control" placeholder="Codigo acceso">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>mod_marca</label>
                                <input type="text" id="mod_marca"  name="mod_marca" class="form-control" placeholder="Marca">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>mod_modelo</label>
                                <input type="text" id="mod_modelo"  name="mod_modelo" class="form-control" placeholder="Modelo">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>mod_serie</label>
                                <input type="text" id="mod_serie"  name="mod_serie" class="form-control" placeholder="Serie">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>mod_wifi</label>
                                <input type="text" id="mod_wifi"  name="mod_wifi" class="form-control" placeholder="Wifi">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>mod_password</label>
                                <input type="text" id="mod_password"  name="mod_password" class="form-control" placeholder="Password">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>mod_wifi_default</label>
                                <input type="text" id="mod_wifi_default"  name="mod_wifi_default" class="form-control" placeholder="wifi_default">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>mod_pass_default</label>
                                <input type="text" id="mod_pass_default"  name="mod_pass_default" class="form-control" placeholder="pass_default">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>mod_idaccess</label>
                                <input type="text" id="mod_idaccess"  name="mod_idaccess" class="form-control" placeholder="">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>id_cli</label>
                                <input type="text" id="id_cli"  name="id_cli" class="form-control" placeholder="">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>modem13</label>
                                <input type="text" id="modem13"  name="modem13" class="form-control" placeholder="">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>modem14</label>
                                <input type="text" id="modem14"  name="modem14" class="form-control" placeholder="">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>modem14</label>
                                <input type="text" id="modem14"  name="modem14" class="form-control" placeholder="">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>modem15</label>
                                <input type="text" id="modem15"  name="modem15" class="form-control" placeholder="">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>modem16</label>
                                <input type="text" id="modem16"  name="modem16" class="form-control" placeholder="">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>modem17</label>
                                <input type="text" id="modem17"  name="modem17" class="form-control" placeholder="">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>modem18</label>
                                <input type="text" id="modem18"  name="modem18" class="form-control" placeholder="">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label>modem19</label>
                                <input type="text" id="modem19"  name="modem19" class="form-control" placeholder="">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label>modem20</label>
                                <input type="text" id="modem20"  name="modem20" class="form-control" placeholder="">
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