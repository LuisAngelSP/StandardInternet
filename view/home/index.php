 <!-- Content Header (Page header) -->
 <div class="content-header">
   <div class="container-fluid">
     <div class="row mb-2">
       <div class="col-sm-6">
         <h1 class="m-0">Home</h1>
       </div><!-- /.col -->
       <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
           <li class="breadcrumb-item"><a href="#">Home</a></li>
           <li class="breadcrumb-item active">Dashboard</li>
         </ol>
       </div><!-- /.col -->
     </div><!-- /.row -->
   </div><!-- /.container-fluid -->
 </div>
 <!-- /.content-header -->

 <!-- Main content -->
 <section class="content">
   <div class="container-fluid">
     <!-- Small boxes (Stat box) -->
     <div class="row">
       <?php
        require_once __DIR__ . "/../../config/conexion.php";
        require_once __DIR__ . ("/../../model/Cliente.php");
        $cliente = new Cliente();
        $cli = $cliente->conteo_cliente();
        foreach ($cli as $c) {
        ?>
         <div class="col-lg-2 col-4">
           <!-- small box -->
           <div class="small-box bg-info">
             <div class="inner">
               <h3><?php echo $c["num_clientes"];
                  } ?></h3>

               <p>Clientes</p>
             </div>
             <div class="icon">
               <i class="ion ion-bag"></i>
             </div>
             <a href="#" class="small-box-footer" onclick="CargaPlantilla('view/mntcliente/','content-wp')">

               More info

               <i class="fas fa-arrow-circle-right"></i></a>
           </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-2 col-4">
           <!-- small box -->
           <div class="small-box bg-success">
             <div class="inner">
               <?php
                require_once __DIR__ . ("/../../model/Servicio.php");
                $servicio = new Servicio();
                $ser = $servicio->conteo_servicios();
                foreach ($ser as $c) {
                ?>
                 <h3><?php echo $c["num_servicios"];
                    } ?></sup></h3>

                 <p>Servicios</p>
             </div>
             <div class="icon">
               <i class="ion ion-stats-bars"></i>
             </div>
             <a href="#" class="small-box-footer" onclick="CargaPlantilla('view/mntservicio/','content-wp')">
               More info <i class="fas fa-arrow-circle-right"></i></a>
           </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-2 col-4">
           <!-- small box -->
           <div class="small-box bg-warning">
             <div class="inner">
               <?php
                require_once __DIR__ . ("/../../model/Titular.php");
                $titular = new Titular();
                $ti = $titular->conteo_titulares();
                foreach ($ti as $c) {
                ?>
                 <h3><?php echo $c["num_titulares"];
                    } ?></h3>

                 <p>Titulares</p>
             </div>
             <div class="icon">
               <i class="ion ion-person-add"></i>
             </div>
             <a href="#" class="small-box-footer" onclick="CargaPlantilla('view/mnttitulares/','content-wp')">
               More info <i class="fas fa-arrow-circle-right"></i></a>
           </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-2 col-4">
           <!-- small box -->
           <div class="small-box bg-danger">
             <div class="inner">

               <?php
                require_once __DIR__ . ("/../../model/NuevaInstalacion.php");
                $instalacion = new NuevaInstalacion();
                $inst = $instalacion->conteo_instalaciones();
                foreach ($inst as $c) {
                ?>
                 <h3><?php echo $c["num_instalaciones"];
                    } ?></h3>
                 <p>Instalaciones</p>
             </div>
             <div class="icon">
               <i class="ion ion-pie-graph"></i>
             </div>
             <a href="#" class="small-box-footer" onclick="CargaPlantilla('view/mntinstalacion/','content-wp')">
               More info <i class="fas fa-arrow-circle-right"></i></a>
           </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-2 col-4">
           <!-- small box -->
           <div class="small-box bg-secondary">
             <div class="inner">

               <?php
                require_once __DIR__ . ("/../../model/Compromiso.php");
                $compromiso = new Compromiso();
                $compr = $compromiso->conteo_compromiso();
                foreach ($compr as $c) {
                ?>
                 <h3><?php echo $c["compromiso"];
                    } ?></h3>
                 <p>Compromiso</p>
             </div>
             <div class="icon">
               <i class="ion ion-pie-graph"></i>
             </div>
             <a href="#" class="small-box-footer" onclick="CargaPlantilla('view/mntcompromiso/','content-wp')">
               More info <i class="fas fa-arrow-circle-right"></i></a>
           </div>
         </div>
         <!-- ./col -->
     </div>
     <!-- /.row -->
     <!-- Main row -->
     <div class="row">


     </div>
     <!-- /.row (main row) -->
   </div><!-- /.container-fluid -->
 </section>
 <!-- /.content -->
 <!-- Footer & javascrip -->

 <!-- <script  type="text/javascript" src="home.js">  </script> -->

 <!-- /.content-wrapper -->