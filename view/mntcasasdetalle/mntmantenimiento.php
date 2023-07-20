<!-- Modal -->
<?php
$cli_id = $_GET['cli_id'];
$nombre = $_GET['nombre'];
$casa_nombre = $_GET['casa_nombre'];
$id_casas = $_GET['id_casas'];

?>
<div class="modal fade" id="mantenimiento_servicio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <input type="hidden" name="inst_id" id="inst_id">
                    <input type="hidden" name="cli_id" id="cli_id" value="<?php echo $cli_id; ?>">
                    <input type="hidden" name="id_casas" id="id_casas" value="<?php echo $id_casas; ?>">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="serv_id">serv_id</label>
                                <select class="custom-select rounded-0" id="serv_id" name="serv_id" required>
                                    <option value="" selected>Seleccionar Servicio</option>
                                    <?php
                                    require_once __DIR__.'/../../config/conexion.php';
                                    require_once __DIR__.'/../../model/Servicio.php';

                                    $servicio = new Servicio();
                                    $ser = $servicio->get_list_servicio();

                                    foreach ($ser as $se) :
                                        $serv_id = $se['serv_id'];
                                        $serv_nom = $se['serv_nom'];
                                    ?>
                                        <option value="<?php echo $serv_id ?>"><?php echo $serv_nom ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="serv_nom" id="serv_nom" value="<?php echo $serv_nom ?>">
                        <div class="col-lg-4">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="exampleInput">Mensaje</label>
                                <select id="id_mensaje" name="id_mensaje" class="form-control"></select>
                            </fieldset>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="">|</label>
                                <br>
                                <div id="boton-mensaje" class="btn btn-primary">Mostrar Mensaje</div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="">|</label>
                                <br>
                                <div id="all-mensaje" class="btn btn-primary">All Mensaje</div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                        <div id="oculto">
                            <div id="mensaje-content" name="mensaje-content" class="textarea-max-height"></div>
                        </div>
                        <div id="oculto1">
                            <div id="mensaje-content1" name="mensaje-content1" class="textarea-max-height"></div>
                        </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="row" id="campos_servicio"></div>
                </div>
                <div class="modal-footer row">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary btn-guardar">Guardar(G)</button>
                </div>
            </form>
        </div>
    </div>
</div>








<div class="modal fade" id="deco_mantenimiento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <form action="" method="post" id="instalacion_form_1">
                <div class="modal-header">
                    <h5 id="lbltitulo2" class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="cli_id" id="cli_id" value="<?php echo $cli_id; ?>" />
                    <input type="hidden" name="id_casas" id="id_casas" value="<?php echo $id_casas; ?>" />
                    <div class="row">
                        <div class="col-md-4">
                            <?php
                            require_once __DIR__ . "/../../model/Deco.php";
                            $deco = new Deco();
                            $de = $deco->get_list_deco();
                            ?>
                            <div class="form-group">
                                <label for="deco_id">deco_id</label>
                                <select class="custom-select rounded-0 select2" multiple=""  id="deco_id" name="deco_id">
                                    <?php
                                    foreach ($de as $dato) {
                                        echo '<option value="' . $dato["id_deco"] . '">' . $dato["dec_descripcion"] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>VERIFICAR</label>
                                <a type="button" onclick="verificacion();" class="btn btn-info form-control">Deco</a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Liberar</label>
                                <a type="button" onclick="liberar();" class="btn btn-info form-control">Liberar</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Cliente</label>
                                <input type="text" id="cliente_deco" name="cliente_deco" class="form-control" readonly required>

                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Estado</label>
                                <p id="dec_estado" class="m-2 text-12"></p>
                            </div>
                        </div>
                    </div>

                    <!-- /.card-header -->
                    
                        <table id="historyDeco" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    
                                    <th>id_deco</th>
                                    <th>id_cliente</th>
                                    <th>fech_asignacion</th>
                                    <th>fech_desasignacion </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    
                </div>
            </form>

        </div>
    </div>
</div>









<div class="modal fade" id="router_mantenimiento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <form action="" method="post" id="instalacion_form_2">
                <div class="modal-header">
                    <h5 id="lbltitulo3" class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="cli_id" id="cli_id" value="<?php echo $cli_id; ?>" />
                    <input type="hidden" name="id_casas" id="id_casas" value="<?php echo $id_casas; ?>" />
                    <div class="row">
                        <div class="col-md-4">
                            <?php
                            require_once __DIR__."/../../model/Route.php";
                            $route = new Route();
                            $rou = $route->get_list_route();
                        
                            ?>
                            <div class="form-group">
                                <label for="rout_id">rout_id</label>
                                <select class="custom-select rounded-0 select2" multiple=""  id="rout_id" name="rout_id">
                                    <?php
                                    foreach ($rou as $dato) {
                                        echo '<option value="' . $dato["id_route"] . '">' . $dato["rout_descripcion"] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>VERIFICAR</label>
                                <a type="button" onclick="verificacion_router();" class="btn btn-info form-control">Router</a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Liberar</label>
                                <a type="button" onclick="liberar();" class="btn btn-info form-control">Liberar</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Cliente</label>
                                <input type="text" id="cliente_route" name="cliente_route" class="form-control" readonly required>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Estado</label>
                                <p id="rout_estado" class="m-2 text-12"></p>
                            </div>
                        </div>
                    </div>

                    <!-- /.card-header -->
                    
                        <table id="historyRouter" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    
                                    <th>id_route</th>
                                    <th>id_cliente</th>
                                    <th>fech_asignacion</th>
                                    <th>fech_desasignacion </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    
                </div>
            </form>

        </div>
    </div>
</div>








            


<div class="modal fade" id="modem_mantenimiento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <form action="" method="post" id="instalacion_form_3">
                <div class="modal-header">
                    <h5 id="lbltitulo4" class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="cli_id" id="cli_id" value="<?php echo $cli_id; ?>" />
                    <input type="hidden" name="id_casas" id="id_casas" value="<?php echo $id_casas; ?>" />
                    <div class="row">
                        <div class="col-md-4">
                            <?php

                            require_once __DIR__."/../../model/Modem.php";                            
                        
                            $modem = new Modem();
                            $mod = $modem->get_list_modem();
                        
                            ?>
                            <div class="form-group">
                                <label for="mod_id">mod_id</label>
                                <select class="custom-select rounded-0 select2" multiple=""  id="mod_id" name="mod_id">
                                    <?php
                                    foreach ($mod as $dato) {
                                        echo '<option value="' . $dato["id_modem"] . '">' . $dato["mod_descripcion"] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                    
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>VERIFICAR</label>
                                <a type="button" onclick="verificacion_modem();" class="btn btn-info form-control">Modem</a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Liberar</label>
                                <a type="button" onclick="liberar();" class="btn btn-info form-control">Liberar</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Cliente</label>
                                <input type="text" id="cliente_modem" name="cliente_modem" class="form-control" readonly required>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Estado</label>
                                <p id="mod_estado" class="m-2 text-12"></p>
                            </div>
                        </div>
                    </div>

                    <!-- /.card-header -->
                    
                        <table id="historyModem" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    
                                    <th>id_route</th>
                                    <th>id_cliente</th>
                                    <th>fech_asignacion</th>
                                    <th>fech_desasignacion </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    
                </div>
            </form>

        </div>
    </div>
</div>


