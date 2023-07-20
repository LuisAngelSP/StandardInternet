   
   <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Clientes v2</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Clientesv2</li>
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
              <div class="col-sm-10">
                <h3 class="card-title">Listado de Cliente</h3>
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
                  <table id="cliente_datav2" class="table table-bordered table-striped">
                    
                            <thead>
                              <tr>
                                <th>idCliente</th>
                                <th>zona</th>
                                <th>ipx</th>
                                <th>cobrar</th>
                                <th>idFono</th>
                                <th>OtrosFonos</th>
                                <th>idClientes</th>
                                <th>fechaInstal</th>
                                <th>tratoSrSrta</th>
                                <th>duenioNombre</th>
                                <th>estado</th>
                                <th>MacWAN</th>
                                <th>tarraga</th>
                                <th>duenioApellidos</th>
                                <th>direcYRefer</th>
                                <th>costoInstal</th>
                                <th>ACuentaInstal</th>
                                <th>saldoInstal</th>
                                <th>servicioInstalado</th>
                                <th>routerMarca</th>
                                <th>mapaCoordenadasUbicacion</th>
                                <th>fb</th>
                                <th>fbOtros</th>
                                <th>familiares</th>
                                <th>prestado</th>
                                <th>EsSuCasa</th>
                                <th>trabajaEn</th>
                                <th>xwifi</th>
                                <th>wifiClave</th>
                                <th>passAdmin</th>
                                <th>wifiDefault</th>
                                <th>veloc</th>
                                <th>chrPort</th>
                                <th>nota</th>
                                <th>puntual</th>
                                <th>sexo</th>
                                <th>usuario</th>
                                <th>password</th>
                                <th>correo</th>
                                <th>cliente20</th>
                                <th>dni</th>
                                <th>notaSiDebeOtrosDineros</th>
                                <th>fechaPaLlamarle</th>
                                <th>procesadoSiNo</th>
                                <th>pagaAdelantadoSiNo</th>
                                <th>proxFechaDePago</th>
                                <th>tomaDeSwitch</th>
                                <th>revisadoPor</th>
                                <th>linkGooContac</th>
                                <th>linkGooFotoAparatos</th>
                                <th>inquilinoNombre</th>
                                <th>inquilinoDemasDatosYNotas</th>
                                <th>mesPagado</th>
                                <th>proxPagoEl25De</th>
                                <th>procesamientoDePago</th>


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
    
    <?php  
       require_once ("mntmantenimiento.php");?>

    <!-- Footer & javascrip -->
    <script type="text/javascript" src="view/mntclientev2/mntclientev2.js"></script>

  <!-- /.content-wrapper -->
