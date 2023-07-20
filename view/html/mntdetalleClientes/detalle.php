
      <?php
    $nombre = $_GET['nombre'];
    $cli_id = $_GET['cli_id'];
    

      ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h4><a href="../mntcliente/">Cliente / </a><?php echo $nombre; ?></h4>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Clientes</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="card">
            <div class="card-body">

              <!-- TABLE DE CLIENTE -->

              <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-sm-6">
                      <button type="button" onclick="casa();" class="btn btn-info btn-sm" id="btncasa">
                        <i class="fas fa-plus"></i>&nbsp; Añadir Nueva Casa
                      </button>
                    </div>
                    <div class="col-sm-6 text-right">
                      <button type="button" onclick="servicio();" class="btn btn-primary btn-sm" id="btnnuevo">
                        <i class="fas fa-plus"></i>&nbsp; Añadir Servicio
                      </button>
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive table-responsive-x">
                  <table id="cliente_servicio" class="table table-bordered table-striped">
                  <input type="hidden" id="cli_id" value="<?php echo $cli_id; ?>">

                    <thead>
                      <tr>
                        <th>servicio</th>
                        <th>casa</th>
                        <th>inst_precio</th>
                        <th>inst_observacion</th>
                        <th>cantidad_metros_cable</th>
                        <th>inst_fech</th>
                        <th>mod_id</th>
                        <th>rout_id</th>
                        <th>deco_id</th>
                        <th>import_servicio</th>
                        <th>lugar_conexion</th>
                        <th>cuenta_usuario</th>
                        <th>contra_usuario</th>
                        <th>perfil_usuario</th>
                        <th>tipo_conexion</th>
                        <th>velocidad_MB</th>
                        <th>instalacion17</th>
                        <th>instalacion18 </th>
                        <th>instalacion19</th>
                        <th>instalacion20</th>
                        <th>instalacion21</th>
                        <th>instalacion22</th>
                        <th>instalacion23</th>
                        <th>instalacion24</th>
                        <th>instalacion25</th>
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
      </div>
      <!-- /.content-wrapper -->

      <?php
       require_once ("modcasa.php"); 
       require_once("servicio.php");
      ?>

      <!-- Footer & javascrip -->

      <script type="text/javascript" src="view/mntdetalleCliente/mntdetalle.js"></script>