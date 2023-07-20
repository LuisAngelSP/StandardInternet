<?php 

    require_once("../../model/Contrato.php");

    $contrato= new Contrato();
    $datos=$contrato->get_contrato_x_form();

?>

<!-- Modal -->
<div class="modal fade" id="mantenimiento" data-backdrop="static" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">

            <form action="../../controller/routes.php" method="post" id="router_form" >
                <div class="modal-header">
                    <h5  id="lbltitulo" class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">                      
                        
                        <input type="hidden" name="id_route" id="id_route"/>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>rout_descripcion</label>
                                <input type="text" id="rout_descripcion"  name="rout_descripcion" class="form-control" placeholder="Despcripcion">
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
                                            $selected = ($r['id_contrato'] == null) ? 'selected' : ''; // agregamos esta línea para determinar si la opción debe estar seleccionada
                                            echo "<option value='".$r['id_contrato']."' ".$selected.">".$r['id_contrato']." | ".$r['contr_descripcion']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>rout_mac</label>
                                <input type="text" id="rout_mac"  name="rout_mac" class="form-control" placeholder="N° Mac">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>rout_marca</label>
                                <input type="text" id="rout_marca"  name="rout_marca" class="form-control" placeholder="Marca">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>rout_modelo</label>
                                <input type="text" id="rout_modelo"  name="rout_modelo" class="form-control" placeholder="Modelo">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>rout_serie</label>
                                <input type="text" id="rout_serie"  name="rout_serie" class="form-control" placeholder="Serie">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>rout_wifi</label>
                                <input type="text" id="rout_wifi"  name="rout_wifi" class="form-control" placeholder="Wifi">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>rout_pasword</label>
                                <input type="text" id="rout_pasword"  name="rout_pasword" class="form-control" placeholder="Password">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>rout_wifidefault</label>
                                <input type="text" id="rout_wifidefault"  name="rout_wifidefault" class="form-control" placeholder="wifi_default">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>rout_passdefault</label>
                                <input type="text" id="rout_passdefault"  name="rout_passdefault" class="form-control" placeholder="pass_default">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>rout_puertos</label>
                                <input type="text" id="rout_puertos"  name="rout_puertos" class="form-control" placeholder="Puertos">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>passAdmin</label>
                                <input type="text" id="passAdmin"  name="passAdmin" class="form-control" placeholder="">
                                </div>
                                <!-- /.form-group -->
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                <label>usuario</label> 
                                <input type="text" id="usuario"  name="usuario" class="form-control" placeholder="">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>password</label>
                                <input type="text" id="password"  name="password" class="form-control" placeholder="">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>linkGooFotoAparatos</label>
                                <input type="text" id="linkGooFotoAparatos"  name="linkGooFotoAparatos" class="form-control" placeholder="">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>prestado</label>
                                <input type="text" id="prestado"  name="prestado" class="form-control" placeholder="">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>router17</label>
                                <input type="text" id="router17"  name="router17" class="form-control" placeholder="">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>router18</label>
                                <input type="text" id="router18"  name="router18" class="form-control" placeholder="">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>router19</label>
                                <input type="text" id="router19"  name="router19" class="form-control" placeholder="">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>router20</label>
                                <input type="text" id="router20"  name="router20" class="form-control" placeholder="">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label>rout_nota</label>
                                <textarea name="rout_nota" id="rout_nota"  class="form-control"></textarea>
                                </div>
                                <!-- /.form-group -->
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary btn-guardar">Guardar(G)</button>
                    </div>
            </form>

        <?php 
        

        
        ?>    
                
        </div>
    </div>
</div>