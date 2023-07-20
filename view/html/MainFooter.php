<?php 
require_once __DIR__.'/../../config/conexion.php';

$conectar = new Conectar();
$base_url = $conectar->ruta();
?>

<footer class="footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1
    </div>
    <strong>Copyright &copy; 2023 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> Todos los derechos reservados.
  </footer>

  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->
<!-- ./wrapper -->

<!-- js de plantilla -->


<!-- jQuery -->
<!-- <script src="<?php echo $base_url; ?>public/plugins/jquery/jquery.min.js"></script> -->
<!-- Summernote -->
<script src="<?php echo $base_url; ?>public/plugins/summernote/summernote-bs4.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo $base_url; ?>public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $base_url; ?>public/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="public/dist/js/demo.js"></script> -->
<script>
$(document).ready(function() {
  $(".select2").select2({
  });
});
</script>

<!-- Select2 -->
<script src="<?php echo $base_url; ?>public/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<!-- <script src="<?php echo $base_url; ?>public/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script> -->
<!-- InputMask -->
<script src="<?php echo $base_url; ?>public/plugins/moment/moment.min.js"></script>
<!-- <script src="<?php echo $base_url; ?>public/plugins/inputmask/jquery.inputmask.min.js"></script> -->
<!-- date-range-picker -->
<script src="<?php echo $base_url; ?>public/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo $base_url; ?>public/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo $base_url; ?>public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?php echo $base_url; ?>public/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="<?php echo $base_url; ?>public/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="<?php echo $base_url; ?>public/plugins/dropzone/min/dropzone.min.js"></script>

<!-- SweetAlert2 -->
<script src="<?php echo $base_url; ?>public/plugins/sweetalert2/sweetalert2.min.js"></script>


<!-- LIBRERÍA DE DATATABLES -->
<!-- <script src="<?php echo $base_url; ?>public/DataTables/jquery.dataTables.min.js"></script> -->


<!-- Mousetrap-atajo de teclado -->





<!-- DataTables  & Plugins -->
<script src="<?php echo $base_url; ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo $base_url; ?>public/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo $base_url; ?>public/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo $base_url; ?>public/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo $base_url; ?>public/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo $base_url; ?>public/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo $base_url; ?>public/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo $base_url; ?>public/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo $base_url; ?>public/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>


<!--JS BUTTONS DATATABLE -->
<!-- <script src="<?php echo $base_url; ?>public/DataTables/dataTables.buttons.min.js"></script> -->
<!-- <script src="<?php echo $base_url; ?>public/DataTables/buttons.html5.min.js"></script> -->


<!-- PLUGIN FIXEDHEADER -->
<!-- <script src="//cdn.datatables.net/fixedheader/3.1.9/js/dataTables.fixedHeader.min.js"></script> -->

<!-- <script src="public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script> -->
<!-- <script src="public/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script> -->
<!-- <script src="public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script> -->







<script src="<?php echo $base_url; ?>public/mousetrap.min.js"></script>
<script>
    // Asignar un atajo de teclado al elemento con el id "clientes-link"
    Mousetrap.bind('alt+c', function() {
        // Obtener el elemento del enlace de clientes
        var clientesLink = document.getElementById('clientes-link');
        
        // Verificar si el enlace existe
        if (clientesLink) {
            // Simular un clic en el enlace de clientes
            clientesLink.click();
        }
    });
    Mousetrap.bind('alt+m', function() {
        var mensajesLink = document.getElementById('MENSAJE-link');
        
        if (mensajesLink) {
            mensajesLink.click();
        }
    });
    Mousetrap.bind('alt+k', function() {
        var mensajesLink = document.getElementById('casas-link');
        
        if (mensajesLink) {
            mensajesLink.click();
        }
    });
    Mousetrap.bind('alt+s', function() {
        var mensajesLink = document.getElementById('Servicios-link');
        
        if (mensajesLink) {
            mensajesLink.click();
        }
    });
    Mousetrap.bind('alt+t', function() {
        var mensajesLink = document.getElementById('titulares-link');
        
        if (mensajesLink) {
            mensajesLink.click();
        }
    });
    Mousetrap.bind('alt+i', function() {
        var mensajesLink = document.getElementById('Instalaciones-link');
        
        if (mensajesLink) {
            mensajesLink.click();
        }
    });

    Mousetrap.bind('alt+r', function() {
        var mensajesLink = document.getElementById('Compromiso-link');
        
        if (mensajesLink) {
            mensajesLink.click();
        }
    });

    /***** BOTONES  ****** */ 

    Mousetrap.bind('alt+a', function() {
        var mensajesLink = document.getElementById('btnnuevo');
        
        if (mensajesLink) {
            mensajesLink.click();
        }
    });
    Mousetrap.bind('alt+o', function() {
        var mensajesLink = document.getElementById('btn-compromiso');
        
        if (mensajesLink) {
            mensajesLink.click();
        }
    });


    Mousetrap.bind('alt+g', function() {
        var mensajesLink = document.getElementById('btn-guardar');
        
        if (mensajesLink) {
            mensajesLink.click();
        }

    });

          // Asignar atajo de teclado para activar el buscador
    Mousetrap.bind('alt+b', function(e) {
        // Verificar si la tecla Alt está presionada
        if (e.altKey) {
        // Obtener el campo de búsqueda del DataTable
        var searchInput = $('.dataTables_filter input[type="search"]');
        
        // Enfocar el campo de búsqueda para permitir al usuario escribir inmediatamente
        searchInput.focus();
        }
    });


    Mousetrap.bind('alt+z', function() {
        var mensajesLink = document.getElementById('btnCompromisoNew');
        
        if (mensajesLink) {
            mensajesLink.click();
        }

    });

    



</script>


