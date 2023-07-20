    <!-- Content Header (Page header) -->
   
    <script type="text/javascript" src="view/mntinstalacion/mntinstalacion.js"></script>

    <!-- Main content -->
    <section class="content">

    <div class="card">
        <div class="card-body">
          
        <!-- TABLE DE CLIENTE -->

        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-sm-10">
                <h3 class="card-title">Listado de Instalaciones</h3>
              </div>
              <div class="col-sm-2">

              <button type="button" onclick="nuevo();" class="btn btn-block btn-d btn-sm float-right btn-danger" id="btnnuevo">
  <i class="fas fa-plus"></i> Agregar (A)
</button>

              </div>
            </div>
          </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive table-responsive-x">
                  <table id="instalacion_data" class="table table-bordered table-striped">
                    
                            <thead>
                              <tr>
                                <th> </th>
                                <th></th>
                                <th>cliente</th>
                                <th>Estado</th>
                                <th>serv_id</th>
                                <th>inst_precio</th>
                                <th>inst_observacion</th>
                                <th>cantidad_metros_cable</th>
                                <th>inst_fech</th>
                                <th>mod_id </th>
                                <th>rout_id </th>
                                <th>deco_id </th>
                                <th>import_servicio</th>
                                <th>lugar_conexion</th>
                                <th>id_casas</th>
                                <th>cuenta_usuario</th>
                                <th>contra_usuario</th>
                                <th>perfil_usuario</th>
                                <th>tipo_conexion</th>
                                <th>velocidad_MB</th>
                                <th>instalacion17</th>
                                <th>instalacion18	</th>
                                <th>instalacion19</th>
                                <th>instalacion20</th>
                                <th>instalacion21</th>
                                <th>instalacion22</th>
                                <th>instalacion23</th>
                                <th>instalacion24</th>
                                <th>instalacion25</th>
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

  <!-- /.content-wrapper -->
      <?php   require_once ("mntmantenimiento.php");?>
