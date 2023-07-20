

    <!-- Main content -->
    <section class="content">

    <div class="card">
        <div class="card-body">
          
        <!-- TABLE DE CLIENTE -->

        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-sm-10">
                <h3 class="card-title">Listado de Titulares</h3>
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
                  <table id="titular_data" class="table table-bordered table-striped">
                    
                            <thead>
                              <tr>
                                <th></th>
                                <th>TITULAR</th>
                                <th>titu_est</th>
                                <th>titu_fech_nac</th>
                                <th>titu_dni</th>
                                <th>titu_fech_caducidad</th>
                                <th>titu_nom_mama</th>
                                <th>titu_nom_papa</th>
                                <th>titular11</th>
                                <th>titular12</th>
                                <th>titular13</th>
                                <th>titular14</th>
                                <th>titular15</th>
                                <th>titular16</th>
                                <th>titular17</th>
                                <th>titular18</th>
                                <th>titular19</th>
                                <th>titular20</th>

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
    <!-- Footer & javascrip -->
    <script type="text/javascript" src="view/mnttitulares/mnttitular.js"></script>
