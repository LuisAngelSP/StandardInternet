<?php

$cli_id = $_GET['cli_id'];
$nombre = $_GET['nombre'];
$casa_nombre = $_GET['casa_nombre'];
$id_casas = $_GET['id_casas'];

?>



<!-- Main content -->
<section class="content">

  <div class="card"> 
    <div class="card-body">

      <!-- TABLE DE CLIENTE -->

      <div class="card">
        <div class="card-header"> 
          <div class="row">
            <div class="col-sm-10">
              <h4>
                <a href="#" onclick="CargaPlantilla('view/mntcasasxclientes/index.php?cli_id=<?php echo $_GET['cli_id']; ?>&nombre=<?php echo urlencode($_GET['nombre']); ?>', 'content-wp')"><?php echo $nombre ?></a>
                /
                <?php echo $casa_nombre ?>
              </h4>
            </div>
            <div class="col-sm-2">

              <!-- <button type="button" Onclick="servicioxcasa();" class="btn btn-primary btn-sm" id="btnnuevo"> -->
              <button type="button" onclick="servicioxcasa()" class="btn btn-primary btn-sm" id="btnnuevo">
                <i class="fas fa-plus"></i>&nbsp; Añadir Servicio(A)
              </button>


            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive table-responsive-x">
          <table id="cliente_servicio" class="table table-bordered table-striped">
          <input type="hidden" id="cli_id" value="<?php echo $cli_id; ?>">
            <input type="hidden" id="nombre" value="<?php echo $nombre; ?>">
            <input type="hidden" id="casa_nombre" value="<?php echo $casa_nombre; ?>">
            <input type="hidden" id="id_casas" value="<?php echo $id_casas; ?>">

            <thead>
              <tr>
                <th></th>
                <th>servicio</th>
                <th>Estado</th>
                <th>casa</th>
                <th>inst_precio </th>
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


              </tr>
            </tbody>
          </table>
        </div>

      </div>
    </div>
    <!-- /.card-body -->
  </div>


    <!-- Footer & javascrip -->
</section>
<?php
    require_once("mntmantenimiento.php");
    ?>

<script type="text/javascript" src="view/mntcasasdetalle/mntmantenimiento.js"></script>
  

<!-- /.content-wrapper -->

