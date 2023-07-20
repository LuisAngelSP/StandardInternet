<?php 

    require_once("../../model/Contrato.php");

    $contrato= new Contrato();
    $datos=$contrato->get_contrato_x_form();


?>

<!-- Modal -->
<div class="modal fade" id="mantenimiento" data-backdrop="static" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">

            <form action="" method="post" id="deco_form" >
                <div class="modal-header">
                    <h5  id="lbltitulo" class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">
                        
                        <input type="hidden" id="id_deco" name="id_deco" />
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>dec_descripcion</label>
                                <input type="text" id="dec_descripcion"  name="dec_descripcion" class="form-control" placeholder="Despcripcion">
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
                                <label>dec_cas_id</label>
                                <input type="text" id="dec_cas_id"  name="dec_cas_id" class="form-control" placeholder="CAS ID">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>dec_proveedor</label>
                                <input type="text" id="dec_proveedor"  name="dec_proveedor" class="form-control" placeholder="Proveedor">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>dec_rayado</label>
                                <input type="text" id="dec_rayado"  name="dec_rayado" class="form-control" placeholder="URL IMAGEN">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>dec_marca</label>
                                <input type="text" id="dec_marca"  name="dec_marca" class="form-control" placeholder="MARCA">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>dec_modelo</label>
                                <input type="text" id="dec_modelo"  name="dec_modelo" class="form-control" placeholder="MODELO">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>dec_serie</label>
                                <input type="text" id="dec_serie"  name="dec_serie" class="form-control" placeholder="SERIE">
                                </div>
                                <!-- /.form-group -->
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                <label>deco_linkGooFotoAparatos</label>
                                <input type="text" id="deco_linkGooFotoAparatos"  name="deco_linkGooFotoAparatos" class="form-control" placeholder="">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>datos_rescatados</label>
                                <input type="text" id="datos_rescatados"  name="datos_rescatados" class="form-control" placeholder="">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>deco14</label>
                                <input type="text" id="deco14"  name="deco14" class="form-control" placeholder="">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>deco15</label>
                                <input type="text" id="deco15"  name="deco15" class="form-control" placeholder="">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>deco16</label>
                                <input type="text" id="deco16"  name="deco16" class="form-control" placeholder="">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>deco17</label>
                                <input type="text" id="deco17"  name="deco17" class="form-control" placeholder="">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>deco18</label>
                                <input type="text" id="deco18"  name="deco18" class="form-control" placeholder="">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label>deco19</label>
                                <input type="text" id="deco19"  name="deco19" class="form-control" placeholder="">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>deco20</label>
                                <input type="text" id="deco20"  name="deco20" class="form-control" placeholder="">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label>deco_nota</label>
                                <textarea name="deco_nota" id="deco_nota" class="form-control"></textarea>
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