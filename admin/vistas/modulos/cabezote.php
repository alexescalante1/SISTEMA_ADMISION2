
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="inicio" class="nav-link">Inicio</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contacto</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <?php

        include "cabezote/buscador.php";

      ?>
  
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>

      <input style="display:none" id="IDADMINN" <?php echo 'value="'.$_SESSION["id"].'"'; ?> >

      <li class="nav-item">
        <a class="nav-link" data-slide="true" href="#" role="button">
        <div class="custom-control custom-switch">
          <input type="checkbox" class="custom-control-input" id="ActDark" <?php if($_SESSION["estiloPantalla"]==1){ echo 'checked="checked"'; } ?>>
          <label class="custom-control-label" for="ActDark"></label>
          </div>
        </a>
      </li>
      
      <?php

        include "cabezote/mensajes.php";

        include "cabezote/notificaciones.php";

        include "cabezote/usuario.php";

      ?>


    </ul>
  </nav>
  <!-- /.navbar -->