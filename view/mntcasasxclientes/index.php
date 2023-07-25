
    <?php   

      // verificamos si los parámetros están definidos
      if (isset($_GET['nombre']) && isset($_GET['cli_id'])) {
        $nombre=$_GET['nombre'];
        $cli_id=$_GET['cli_id'];

      } else {
        echo "Faltan parámetros en la URL";
        exit();
      }
    ?>

    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">

    <div class="card">
        <div class="card-body">
          
        <!-- TABLE DE CLIENTE -->

        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-sm-10"> 
              <h4><a href="#" onclick="CargaPlantilla('view/mntcliente/','content-wp')">Clientes / </a><a href="#" onclick="CargaPlantilla('view/mntcasasxclientes/index.php?cli_id=<?php echo $_GET['cli_id']; ?>&nombre=<?php echo urlencode($_GET['nombre']); ?>', 'content-wp')"><?php echo $nombre ?> / </a> Casas</h4>
              </div>
              <div class="col-sm-2">

                      <button type="button" onclick="casaxcliente();" class="btn btn-primary btn-sm" id="btnnuevo">
                        <i class="fas fa-plus"></i>&nbsp; Añadir Casa
                      </button>
              </div>
            </div>
          </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive table-responsive-x">
                <table id="casa_data" class="table table-bordered table-striped">
                <input type="hidden" id="id_cliente" value="<?php echo $cli_id; ?>">
                         <thead>
                              <tr>
                                <th></th>
                                <th>cas_descripcion</th>
                                <th>Estado</th>
                                <th>cas_direccion</th>
                                <th>casa12</th>
                                <th>casa13</th>
                                <th>casa14</th>
                                <th>casa15</th>
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

      <?php 
        require_once (__DIR__ ."/mntmantenimiento.php");
      ?>

    <!-- Footer & javascrip -->

    <script type="text/javascript" src="view/mntcasasxclientes/mntmantenimiento.js"></script>
