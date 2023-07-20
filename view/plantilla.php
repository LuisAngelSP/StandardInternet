<?php

session_start();
if (!isset($_SESSION["activePage"])) {
    $_SESSION["activePage"] = "home";
}

require_once "model/Usuario.php";

if (isset($_GET["cerrar_sesion"]) && $_GET["cerrar_sesion"] == 1) {

    session_destroy();

    echo '
            <script>
                window.location = "http://localhost/Standar_Internet/";
            </script>        
        ';
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    require_once("view/html/MainHead.php");
    ?>

    <title>Admin | Standard Internet</title>

</head>

<?php if(isset($_SESSION["usu_usuario"])) {

    ?>

    <body class="hold-transition sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper-Header">
            <!-- Navbar -->
            <?php require_once("view/html/MainNavbar.php"); ?>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->


            <!-- Content Wrapper. Contains page content -->
            <div class="content-wp">

            <?php require_once "view/home/index.php"; ?>



            </div>

            <!-- /.content-wrapper -->


            <!-- Footer & javascrip -->

        </div>

        



        <?php require_once "view/html/MainFooter.php"; ?>
        <Script>
            function CargaPlantilla(pagina_php, contenedor) {
                $("." + contenedor).load(pagina_php);
            }
            
        </script>
    </body>


<?php } else { ?>

    <body>

        <?php include "view/login.php"; ?>

    </body>

<?php } ?>

</html>