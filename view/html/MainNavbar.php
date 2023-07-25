<?php
$conectar = new Conectar();
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    // Agrega la clase "active" al menú seleccionado
    $('nav a').click(function() {
      $('nav a').removeClass('active');
      $(this).addClass('active');
    });
  });
</script>


<nav class="navbar navbar-expand-sm navbar-white navbar-light fixed-top sticky-top">
  <a href="#" class="brand-link nav-link active" onclick="CargaPlantilla('view/home/','content-wp')">
    <img src="public/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-2" style="opacity: .8; width: 20px; margin: 0 8px;">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!-- MENU -->
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a id="clientes-link" style="cursor:pointer;" class="nav-link" onclick="CargaPlantilla('view/mntcliente/','content-wp')">
          <i class="nav-icon fas fa-users"></i>
          Clientes (C)
        </a>
      </li>
      <li class="nav-item bg-danger">
        <a id="clientesv2-link" style="cursor:pointer;" class="nav-link b" onclick="CargaPlantilla('view/mntclientev2/','content-wp')">
          <i class="nav-icon fas fa-users"></i>
          <span class=" text-white">Clientesv2</span>
        </a>
      </li>
      <li class="nav-item">
        <a id="casas-link" style="cursor:pointer;" class="nav-link" onclick="CargaPlantilla('view/mntcasas/','content-wp')">
          <i class="nav-icon fas fa-house-user"></i>
          Casas (K)
        </a>
      </li>
      <li class="nav-item">
        <a id="Servicios-link" style="cursor:pointer;" class="nav-link" onclick="CargaPlantilla('view/mntservicio/','content-wp')">
          <i class="nav-icon fas fa-tree"></i>
          Servicios (S)
        </a>
      </li>
      <li class="nav-item">
        <a id="titulares-link" style="cursor:pointer;" class="nav-link" onclick="CargaPlantilla('view/mnttitulares/','content-wp')">
          <i class="nav-icon fas fa-user-tag"></i>
          Titulares (T)
        </a>
      </li>
      <li class="nav-item">
        <a id="contratos-link" style="cursor:pointer;" class="nav-link" onclick="CargaPlantilla('view/mntcontrato/','content-wp')">
          <i class="nav-icon fas fa-file-contract"></i>
          Contratos
        </a>
      </li>

      <li class="nav-item">
        <a id="Instalaciones-link" style="cursor:pointer;" class="nav-link" onclick="CargaPlantilla('view/mntinstalacion/','content-wp')">
          <i class="nav-icon fas fa-tachometer-alt"></i>

          Instalaciones (I)

        </a>
      </li>
      <li class="nav-item dropdown">
        <a id="Dispositivos-link" class="btn_dispo_btn nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="nav-icon fas fa-edit"></i>
          Dispositivos(V)
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li class="nav-item">
            <a href="#" class="nav-link dl" onclick="CargaPlantilla('view/mntmodem/','content-wp')">
              ()Modems
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link dl" id="btn_brouter" onclick="CargaPlantilla('view/mntrouter/','content-wp')">
              (U)Routers
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link dl" id="btn_bdeco" onclick="CargaPlantilla('view/mntdeco/','content-wp')">
              (F)Decodificador
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link dl">
              ()Productos
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a id="USUARIO-link" style="cursor:pointer;" class="nav-link" onclick="CargaPlantilla('view/mntusuario/','content-wp')">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          USUARIO
        </a>
      </li>

      <li class="nav-item">
        <a id="MENSAJE-link" style="cursor:pointer;" class="nav-link" onclick="CargaPlantilla('view/mntMensaje/','content-wp')">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          MENSAJES (M)
        </a>
      </li>

      <li class="nav-item">
        <a id="Compromiso-link" style="cursor:pointer;" class="nav-link" onclick="CargaPlantilla('view/mntcompromiso/','content-wp')">
          <i class="nav-icon fas fa-handshake"></i>
          Compromiso(R)
        </a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <div class="btn-group">
          <button class="btn btn-link dropdown-toggle border-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="name">Hola! <?php echo $_SESSION["usu_nombre"]; ?></span>
            <img src="public/dist/img/user2-160x160.jpg" style="width: 40px; height: 40px;" class="rounded-circle" alt="Logo">
          </button>
          <div class="dropdown-menu">
            <a rel="stylesheet" href="<?php $conectar->ruta(); ?>?cerrar_sesion=1"><i class="fas fa-sign-out-alt fa-lg p-1" style="color: #e65656;"></i> Cerrar Sesión</a>
          </div>
        </div>
      </li>
    </ul>
  </div>
</nav>

