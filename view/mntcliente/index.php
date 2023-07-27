


<!-- Main content -->
<section class="content">
  <div class="card">
    <div class="card-body">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-sm-8">
              <h3 class="card-title">Listado de Clientes</h3>
              <div class="btn-group ml-4">
                <a type="button" id="btn_allcompromiso" onclick="ListarAllClientes();" class="btn btn-link btn-sm">(X)All</a>
                <a type="button" id="btn_commpromisocerca" onclick="CargaPlantilla('view/mntcliente/','content-wp')" class="btn btn-link btn-sm">(N)Listar Activos</a>
                <a type="button" id="btn_historycompromiso" onclick="listarClientesDesactivados();" class="btn btn-link btn-sm">(Y)Listar Desactivados</a>
              </div>
            </div>
            

            <div class="col-sm-2">
            <button type="button" class="btn btn-block btn-success btn-sm" id="btnGenerarPago">Generar Pago</button>
          </div>
<div class="col-sm-2">

    <button type="button" onclick="nuevo();" class="btn btn-block btn-primary btn-sm" id="btnnuevo"><i class="fas fa-plus"></i> Agregar (A)</button>
</div>
          </div>
        </div>
        <div class="card-body table-responsive table-responsive-x">
          <table id="cliente_data" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>N</th>
                <th></th>
                <th>Casas</th> 
                <th>Nombre y apellido</th>
                <th>Estado</th><
                <th>cli_dni</th>
                <th>cli_sexo</th>
                <th>cli_correo</th>
                <th>cli_fono</th>
                <th>cli_fb</th>
                <th>cli_linkGooContac</th>
                <th>cli_linkGooFotoAparatos</th>
                <th>zona</th>
                <th>Direccion</th>
                <th>cli_ocupacion</th>
                <th>cli_memoria</th>
                <th>cliente14</th>
                <th>cliente15</th>
                <th>cliente16</th>
                <th>cliente17</th>
                <th>cliente18</th>
                <th>cliente19</th>
                <th>cliente20</th>
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
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /.content -->

<?php
require_once("mntmantenimiento.php"); ?>

<!-- Footer & javascrip -->

<script type="text/javascript" src="view/mntcliente/mntcliente.js"></script>
<!-- /.content-wrapper -->