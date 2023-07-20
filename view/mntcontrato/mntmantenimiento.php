<?php
    require_once("../../model/Contrato.php");

    $contrato= new Contrato();
    $datos=$contrato->get_titular_x_form();
?>

<!-- Modal -->
<div class="modal fade" id="mantenimiento" data-backdrop="static" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">

            <form action="" method="post" id="contrato_form" >
                <div class="modal-header">
                    <h5  id="lbltitulo" class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">
                        
                        <input type="hidden" name="id_contrato" id="id_contrato"/>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>contr_descripcion</label>
                                <input type="text" id="contr_descripcion"  name="contr_descripcion" class="form-control" placeholder="Descripción del contrato"  >
                                </div>
                                <!-- /.form-group -->
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                <label for="id_titular">id_titular</label>
                                <select class="custom-select rounded-0" id="id_titular" name="id_titular">
                                    <option value="">Selecionar titular</option>
                                    <?php 
                                        foreach($datos as $r){
                                            echo "<option value='".$r['id_titular']."'>".$r['nombre_completo']."</option>";
                                        }
                                     ?>
                                </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                <label>contr_tip_conexion</label>
                                <input type="text" id="contr_tip_conexion"  name="contr_tip_conexion" class="form-control" placeholder="tipo de conexion"  >
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->

                            <div class="col-md-3">
                                <div class="form-group">
                                <label>contr_fech</label>
                                <input type="date" id="contr_fech"  name="contr_fech" class="form-control" placeholder=""  >
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>contr_tarifa</label>
                                <input type="number" id="contr_tarifa"  name="contr_tarifa" class="form-control" placeholder="Tarifa del contrato"  >
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>contr_fech_Inst</label>
                                <input type="date" id="contr_fech_Inst"  name="contr_fech_Inst" class="form-control" placeholder="  "  >
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>mapaCoordenadasUbicacion</label>
                                <input type="text" id="mapaCoordenadasUbicacion"  name="mapaCoordenadasUbicacion" class="form-control" placeholder="  "  >
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>contr_direccion</label>
                                <input type="text" id="contr_direccion"  name="contr_direccion" class="form-control" placeholder="  "  >
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>contrato14</label>
                                <input type="text" id="contrato14"  name="contrato14" class="form-control" placeholder="  "  >
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>contrato15</label>
                                <input type="text" id="contrato15"  name="contrato15" class="form-control" placeholder="  "  >
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>contrato16</label>
                                <input type="text" id="contrato16"  name="contrato16" class="form-control" placeholder="  "  >
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>contrato17</label>
                                <input type="text" id="contrato17"  name="contrato17" class="form-control" placeholder="  "  >
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>contrato18</label>
                                <input type="text" id="contrato18"  name="contrato18" class="form-control" placeholder="  "  >
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>contrato19</label>
                                <input type="text" id="contrato19"  name="contrato19" class="form-control" placeholder="  "  >
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-3">
                                <div class="form-group">s
                                <label>contrato20</label>
                                <input type="text" id="contrato20"  name="contrato20" class="form-control" placeholder=""   >
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