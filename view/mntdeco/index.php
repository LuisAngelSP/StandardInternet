    <!-- Main content -->
    <section class="content">

    <div class="card">
        <div class="card-body">
          
        <!-- TABLE DE CLIENTE -->

        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-sm-10">
                <h3 class="card-title">Decodificadores</h3>
                <div class="btn-group ml-4">
                <a type="button" onclick=" listarDecosALL();" class="btn btn-link btn-sm"> All </a> 
                <a type="button" onclick="CargaPlantilla('view/mntdeco/','content-wp')" class="btn btn-link btn-sm" >Listar Activos</a> 
                <a type="button" onclick="listarDecosLibres();" class="btn btn-link btn-sm" >Listar Libres</a> 
                <a type="button" onclick="listarDecosDesactivados();" class="btn btn-link btn-sm">Listar Desactivados</a>
              </div>

              </div>
              <div class="col-sm-2">

                <button type="button" onclick="nuevo();" class="btn btn-block btn-primary btn-sm float-right" id="btnnuevo">
                  <i class="fas fa-plus"></i> Agregar (A)
                </button>

              </div>
            </div>
          </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive table-responsive-x">
                  <table id="deco_data" class="table table-bordered table-striped">
                    
                            <thead>
                              <tr>
                                <th></th>
                                <th>dec_descripcion</th>
                                <th>cliente</th>
                                <th>N°CONTRATO</th>
                                <th>Estado</th>
                                <th>dec_cas_id</th>
                                <th>deco_nota</th>
                                <th>dec_proveedor</th>
                                <th>dec_rayado</th>
                                <th>dec_marca</th>
                                <th>dec_modelo</th>
                                <th>dec_serie</th>
                                <th>deco_linkGooFotoAparatos</th>
                                <th>datos_rescatados</th>
                                <th>deco14</th>
                                <th>deco15</th>
                                <th>deco16</th>
                                <th>deco17</th>
                                <th>deco18</th>
                                <th>deco19</th>
                                <th>deco20</th>

                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>

                                
                              </tr>
                            </tbody>
                      </table>
          </div>
        
        </div>
        </div>
        <!-- /.card-body -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
      <?php   require_once ("mntmantenimiento.php");     ?>

    
    <script type="text/javascript" src="view/mntdeco/mntdeco.js"></script>
