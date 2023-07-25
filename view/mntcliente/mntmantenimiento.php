<!-- Modal -->
<div class="modal fade" id="mantenimiento" tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <form action="" method="post" id="cliente_form">
                <div class="modal-header">
                    <h5 id="lbltitulo" class="modal-title"></h5>
                    <!-- Botón de Compromiso de Pago -->
                    <a type="button" onclick="CompromisoNuevo();" id="btn-compromiso" class="btn btn-success float-right ml-2 modo">Compromiso (O)</a>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="cli_id" id="cli_id" />
                    <div class="row">
                        <div class="col-sm-3">
                        <label for="cli_dni">cli_dni</label>    
                            <div class="input-group">
                                <input type="text" id="cli_dni" class="form-control" placeholder="N°DNI">
                                <button type="button" onclick="consultarDNI()" class="btn btn-dark"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Nombres</label>
                                <input type="text" id="cli_nombre" name="cli_nombre" class="form-control" placeholder="Nombres" required>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Apellidos</label>
                                <input type="text" id="cli_apellido" name="cli_apellido" class="form-control" placeholder="Apellidos">
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="cli_correo">Correo</label>
                                <input type="email" class="form-control" id="cli_correo" name="cli_correo" placeholder="Enter email">
                            </div>
                            <!-- /.form-group -->
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="cli_sexo">Genero</label>
                                <select class="custom-select rounded-0" id="cli_sexo" name="cli_sexo">
                                    <option value="">Seleccione el género</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>N° Celular</label>
                                <input type="text" id="cli_fono" name="cli_fono" class="form-control" placeholder="N° Celular">
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Link Contacto</label>
                                <input type="text" id="cli_linkGooContac" name="cli_linkGooContac" class="form-control" placeholder="Link de Contacto">
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Link Foto Aparatos</label>
                                <input type="text" id="cli_linkGooFotoAparatos" name="cli_linkGooFotoAparatos" class="form-control" placeholder="Foto Aparatos">
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>cli_direccion</label>
                                <input type="text" id="cli_direccion" name="cli_direccion" class="form-control" placeholder=" ">
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>cliente12</label>
                                <input type="text" id="cliente12" name="cliente12" class="form-control" placeholder=" ">
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>cliente13</label>
                                <input type="text" id="cliente13" name="cliente13" class="form-control" placeholder="">
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>cliente14</label>
                                <input type="text" id="cliente14" name="cliente14" class="form-control" placeholder="">
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>cliente15</label>
                                <input type="text" id="cliente15" name="cliente15" class="form-control" placeholder="">
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>cliente16</label>
                                <input type="text" id="cliente16" name="cliente16" class="form-control" placeholder="">
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>cliente17</label>
                                <input type="text" id="cliente17" name="cliente17" class="form-control" placeholder="">
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>cliente18</label>
                                <input type="text" id="cliente18" name="cliente18" class="form-control" placeholder="">
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>cliente19</label>
                                <input type="text" id="cliente19" name="cliente19" class="form-control" placeholder="">
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>cliente20</label>
                                <input type="text" id="cliente20" name="cliente20" class="form-control" placeholder="">
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Facebook</label>
                                  <textarea class="form-control" name="cli_fb" id="cli_fb" rows="3"></textarea>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="exampleInput">Mensaje</label>
                                <select id="id_mensaje" name="id_mensaje" class="form-control select2"></select>
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
                        <div id="oculto">
                            <div id="mensaje-content" name="mensaje-content">
                            </div>
                        </div>
                        <div id="oculto1">
                            <div id="mensaje-content1" name="mensaje-content1">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" id="btn-guardar">Guardar(G)</button>
                    </div>
            </form>
        </div>
    </div> 
</div>
<!-- Modal 02 -->
<div class="modal fade" id="compromiso" tabindex="+1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
                        <form action="" method="post" id="data_form">
                <div class="modal-header">
                    <h5 id="lbltitulo1" class="modal-title"></h5>
                    <button type="button" class="close" id="compromisoClose">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_compromiso" id="id_compromiso" />
                    <input type="hidden" name="id_cliente" id="id_cliente" />
                    <div class="row">
                        
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>fech</label>                               
                            <input type="datetime-local" name="comp_fech" id="comp_fech" class="form-control">
                        </div>
                    </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="comp_tipo">comp_tipo</label>
                                <select class="custom-select rounded-0" id="comp_tipo" name="comp_tipo">
                                    <option value="">Tipo de Compromiso </option>
                                    <option value="llamar">Llamar</option>
                                    <option value="visitar">Visitar</option>
                                    <option value="pagar">Pagar</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.col -->
                        <!-- /.col -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>comp_descrip</label>
                                <textarea name="comp_descrip" id="comp_descrip" class="form-control"></textarea>
                            </div>
                            <!-- /.form-group -->
                        </div>         
                    </div>
                    <div class="modal-footer">
                    <a type="button" class="btn btn-secondary" id="cerrarCompromiso">Cerrar</a>
                        <a type="button" class="btn btn-primary btn-guardar"  id="btnCompromisoNew" onclick="InsertCompromiso();">Generar(Z)</a>
                    </div>
            </form>
        </div>
    </div>
</div>