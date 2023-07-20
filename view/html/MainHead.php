<?php 
require_once __DIR__.'/../../config/conexion.php';

$conectar = new Conectar();
$base_url = $conectar->ruta();
?>


<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="data:,">
<?php date_default_timezone_set('America/Lima'); ?>
<script src="<?php echo $base_url; ?>view/scripts.js"></script>

<!-- Estilos creados -->
<link rel="stylesheet" href="<?php echo $base_url; ?>public/style.css">

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo $base_url; ?>public/plugins/fontawesome-free/css/all.min.css">
<!-- Summernote -->
<link rel="stylesheet" href="<?php echo $base_url; ?>public/plugins/summernote/summernote-bs4.min.css">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="<?php echo $base_url; ?>public/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<!-- daterange picker -->
<link rel="stylesheet" href="<?php echo $base_url; ?>public/plugins/daterangepicker/daterangepicker.css">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="<?php echo $base_url; ?>public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- Bootstrap Color Picker -->
<link rel="stylesheet" href="<?php echo $base_url; ?>public/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="<?php echo $base_url; ?>public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="<?php echo $base_url; ?>public/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?php echo $base_url; ?>public/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="<?php echo $base_url; ?>public/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
<!-- BS Stepper -->
<link rel="stylesheet" href="<?php echo $base_url; ?>public/plugins/bs-stepper/css/bs-stepper.min.css">
<!-- dropzonejs -->
<link rel="stylesheet" href="<?php echo $base_url; ?>public/plugins/dropzone/min/dropzone.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo $base_url; ?>public/dist/css/adminlte.min.css">

<!-- CSS DATA TABLE -->
<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>public/DataTables/jquery.dataTables.min.css">

<!-- DataTables -->
<link rel="stylesheet" href="<?php echo $base_url; ?>public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo $base_url; ?>public/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
