<!-- Modal -->

<?php
$id_cliente = $_GET['cli_id'];

?>

<div class="modal fade" id="vista" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <form action="" method="post" id="instalacion_form">
                <div class="modal-header">
                    <h5 id="lbltitulo1" class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="inst_id" id="inst_id" />
                    <input type="hidden" name="cli_id" id="cli_id" value="<?php echo $id_cliente; ?>" />
                    <div class="row">
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="serv_id">serv_id</label>
                                <select class="custom-select rounded-0" id="serv_id" name="serv_id" required>
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


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="id_casas">Casa</label>
                                    <select class="custom-select rounded-0" name="id_casas" id="id_casas" onchange="Direccion(this);">
                                        <option value="">Seleccionar Casa</option>
                                        <?php
                                        require_once("../../model/Casas.php");
                                        $casa = new Casa();
                                        $cas = $casa->get_casas_cliente($id_cliente);
                                        foreach ($cas as $r) :
                                        ?>
                                        <option value="<?php echo $r['id_casas']; ?>" data-direccion="<?php echo $r['cas_direccion']; ?>"><?php echo $r['cas_descripcion']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                                                
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Direccion</label>
                                    <h5 id="direccion_casa" class="ml-3"></h5>
                                </div>
                            </div>


                    </div>
                    <br><br>
                    <div class="row" id="campos_servicio">


                    </div>


                </div>
                <div class="modal-footer row">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>