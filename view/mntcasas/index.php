
    <!-- Main content -->
    <section class="content">

    <div class="card">
        <div class="card-body">
          
        <!-- TABLE DE CLIENTE -->

        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-sm-10">
                <h3 class="card-title">Listado de Casas</h3>
              </div>
              <div class="col-sm-2">
<!-- 
                <button type="button" onclick="nuevo();" class="btn btn-block btn-primary btn-sm float-right" id="btnnuevo">
                  <i class="fas fa-plus"></i> Agregar (A)
                </button> -->

              </div>
            </div>
          </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive table-responsive-x">
                  <table id="casa_data" class="table table-bordered table-striped">
                    
                            <thead>
                              <tr>
                                <th></th>
                                <th>id_cliente</th>
                                <th>Servicios de:</th>
                                <th>cas_direccion</th>
                                <th>casa12</th>
                                <th>casa13</th>
                                <th>casa14</th>
                                <th>casa15</th>
                                <th>Estado</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td class="numerador"></td>
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

      <?php

        require_once("modcasa.php");
      
      ?>

    <script type="text/javascript" src="view/mntcasas/mntcasa.js"></script>
  