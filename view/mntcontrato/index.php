
<!-- Main content -->
<section class="content">

  <div class="card">
    <div class="card-body">

      <!-- TABLE DE CLIENTE -->

      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-sm-10">
              <h3 class="card-title">Contratos</h3>
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
          <table id="contrato_data" class="table table-bordered table-striped">

            <thead>
              <tr>
                <th></th>
                <th>contr_descripcion</th>
                <th>id_titular </th>
                <th>contr_tip_conexion</th>
                <th>contr_fech</th>
                <th>contr_tarifa</th>
                <th>contr_fech_Inst</th>
                <th>mapaCoordenadasUbicacion</th>
                <th>contr_direccion</th>
                <th>contrato14</th>
                <th>contrato15</th>
                <th>contrato16</th>
                <th>contrato17</th>
                <th>contrato18</th>
                <th>contrato19</th>
                <th>contrato20</th>
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
<?php require_once("mntmantenimiento.php"); ?>
<!-- Footer & javascrip -->
<script type="text/javascript" src="view/mntcontrato/mntcontrato.js"></script>