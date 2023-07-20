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
              <h3 class="card-title">Listado de Modems</h3>
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
          <table id="modem_data" class="table table-bordered table-striped">

            <thead>
              <tr>
                <th>mod_descripcion</th>
                <th>N°CONTRATO</th>
                <th>Titular</th>
                <th>mod_imagen</th>
                <th>mod_codigo_acceso</th>
                <th>mod_marca</th>
                <th>mod_modelo</th>
                <th>mod_serie</th>
                <th>mod_wifi</th>
                <th>mod_password</th>
                <th>mod_wifi_default</th>
                <th>mod_pass_default</th>
                <th>mod_idaccess</th>
                <th>id_cli</th>
                <th>modem13</th>
                <th>modem14</th>
                <th>modem15</th>
                <th>modem16</th>
                <th>modem17</th>
                <th>modem18</th>
                <th>modem19</th>
                <th>modem20</th>
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
<?php require_once("mntmantenimiento.php");           ?>

<script type="text/javascript" src="view/mntmodem/mntmodem.js"></script>