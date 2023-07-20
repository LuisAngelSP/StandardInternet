<?php
require_once __DIR__ . '/../../config/conexion.php';
require_once("../../model/Cliente.php");


?>


<!-- Modal -->
<div class="modal fade" id="mantenimiento" data-backdrop="static" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <form action="" method="post" id="instalacion_form">
                <div class="modal-header">
                    <h5 id="lbltitulo" class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="inst_id" id="inst_id" />
                    <div class="row">
                    <div class="col-md-3">
  <div class="form-group">
    <label for="cli_id">cli_id</label>
    <div id="select-container">
      <select class="custom-select rounded-0 " id="cli_id" name="cli_id">
        <option value="">Selecionar Cliente</option> 
        <?php
        $cliente = new Cliente();
        $cli = $cliente->get_list_cliente();
        foreach ($cli as $dato): ?>
          <option value="<?php echo $dato['cli_id'] ?>"><?php echo $dato['Cliente'] ?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $(".select2").select2({
      theme: "bootstrap4"
    })
})
                        </script>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="serv_id">serv_id</label>
                                <select class="custom-select rounded-0" id="serv_id" name="serv_id">
                                    <option value="">Selecionar Servicio</option>
                                    <?php
                                    require_once("../../model/Servicio.php");

                                    $servicio = new Servicio();
                                    $serv = $servicio->get_list_servicio();

                                    foreach ($serv as $dato) : ?>
                                        <option value="<?php echo $dato['serv_id'] ?>"><?php echo $dato['serv_nom'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="row" id="campos_servicio">


                    </div>


                </div>
                <div class="modal-footer row">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary btn-guardar">Guardar(G)</button>
                </div>
            </form>
        </div>
    </div>
</div>