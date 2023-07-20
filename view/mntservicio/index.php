

    <!-- Main content -->
    <section class="content">   
      <!-- Default box -->
      <div class="card">
        <div class="card-body">
          
        <!-- TABLE DE SERVICIO -->

        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-sm-10">
                <h3 class="card-title">Listado de Servicios</h3>
              </div>
              <div class="col-sm-2">

                <button type="button" onclick="nuevo();" class="btn btn-block btn-primary btn-sm float-right" id="btnnuevo">
                  <i class="fas fa-plus"></i> Agregar (A)
                </button>

              </div>
            </div>
          </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="servicio_data" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Servicio</th>
                          <th>Detalles</th>
                          <th>Estado</th>
                          <th>Editar</th>
                          <th>Eliminar</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
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
      <!-- /.card -->

    </section>
  <!-- /.content-wrapper -->
  <?php require_once("mntmantenimiento.php"); ?>

    <script type="text/javascript" src="view/mntservicio/mntservicio.js"></script>
