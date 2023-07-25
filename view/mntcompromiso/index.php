
    <!-- Main content -->
    <section class="content">

    <div class="card">
        <div class="card-body">
          
        <!-- TABLE DE CLIENTE -->

        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-sm-10">
                <h3 class="card-title">Listado de Compromiso</h3>
                <div class="btn-group ml-4">
                <a type="button" id="btn_allcompromiso" onclick=" listarCompromisoAll();" class="btn btn-link btn-sm"> (X)All Compromisos </a> 
                <a type="button" id="btn_commpromisocerca" onclick="CargaPlantilla('view/mntcompromiso/','content-wp')" class="btn btn-link btn-sm">(N)Compromisos Cercanos</a> 
                <a type="button" id="btn_historycompromiso" onclick="historial_compromiso();" class="btn btn-link btn-sm">(Y)historial de Compromiso</a> 

              </div>

              </div>
              <!-- <div class="col-sm-2">

                <button type="button" onclick="nuevo();" class="btn btn-block btn-primary btn-sm float-right" id="btnnuevo">
                  <i class="fas fa-plus"></i> Agregar (A)
                </button>

              </div> -->
            </div>
          </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive table-responsive-x">
                  <table id="compromiso_data" class="table table-bordered table-striped">
                    
                            <thead>
                              <tr>
                                <th></th>
                                <th>Cliente</th>
                                <th>comp_fech</th>
                                <th>comp_descrip</th>
                                <th>comp_tipo</th>
                                <th>comp_estado</th>

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
  
    <script type="text/javascript" src="view/mntcompromiso/mntcompromiso.js"></script>