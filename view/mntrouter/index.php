
    <!-- Main content -->
    <section class="content">

    <div class="card">
        <div class="card-body">
          
        <!-- TABLE DE CLIENTE -->

        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-sm-10">
                <h3 class="card-title">Listado de Routes</h3>
                <div class="btn-group ml-4">
                <a type="button" onclick=" listarRouterAll();" class="btn btn-link btn-sm"> All </a> 
                <a type="button" onclick="CargaPlantilla('view/mntrouter/','content-wp')" class="btn btn-link btn-sm" >Listar Activos</a> 
                <a type="button" onclick="listarRouterLibres();" class="btn btn-link btn-sm" >Listar Libres</a> 
                <a type="button" onclick="listarRouterDesactivados();" class="btn btn-link btn-sm" >Listar Desactivados</a>
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
                  <table id="router_data" class="table table-bordered table-striped">
                    
                            <thead>
                              <tr>
                                <th></th>
                                <th>Router</th>
                                <th>Cliente</th>
                                <th>N°CONTRATO</th>
                                <th>Estado</th>
                                <th>ipx</th>
                                <th>rout_mac</th>
                                <th>rout_marca</th>
                                <th>rout_modelo</th>
                                <th>rout_serie</th>
                                <th>rout_wifi</th>
                                <th>rout_pasword</th>
                                <th>rout_wifidefault</th>
                                <th>rout_passdefault</th>
                                <th>rout_puertos</th>
                                <th>passAdmin</th>
                                <th>rout_nota</th>
                                <th>usuario</th>
                                <th>password</th>
                                <th>linkGooFotoAparatos</th>
                                <th>prestado</th>
                                <th>router17	</th>
                                <th>router18</th>
                                <th>router19</th>
                                <th>router20</th>
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

  <!-- /.content-wrapper -->
      <?php   require_once ("mntmantenimiento.php");?>
  
    <script type="text/javascript" src="view/mntrouter/mntrouter.js"></script>