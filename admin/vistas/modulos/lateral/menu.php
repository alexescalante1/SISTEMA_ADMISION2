<!--=====================================
MENU
======================================-->	

      

<!-- SidebarSearch Form -->
<div class="form-inline">
  <div class="input-group" data-widget="sidebar-search">
    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
    <div class="input-group-append">
      <button class="btn btn-sidebar">
        <i class="fas fa-search fa-fw"></i>
      </button>
    </div>
  </div>
</div>

<!-- Sidebar Menu -->
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    
    <li class="nav-header">ADMISION</li>


    <?php

      if($_SESSION["perfil"] == "administrador"){

        echo '
        
          <li class="nav-item">
            <a href="evento" class="nav-link">
              <i class="nav-icon fas fa-cube"></i>
              <p>
                Gestor de Parametros
              </p>
            </a>
          </li>
          
        ';

      }

    ?>

    

    <li class="nav-item">
      <a href="inscripcion" class="nav-link">
        <i class="nav-icon fas fa-edit"></i>
        <p>
          Gestor de inscripcion
        </p>
      </a>
    </li>

    <li class="nav-item">
      <a href="reportes" class="nav-link">
        <i class="nav-icon fas fa-clipboard-check"></i>
        <p>
          Reportes
          <span class="right badge badge-success">New</span>
        </p>
      </a>
    </li>

    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
          Evaluacion
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="registrarFicha" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Registrar Ficha</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="ingresantes" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Ingresantes</p>
          </a>
        </li>
        
      </ul>
    </li>
    





    <li class="nav-header">INVENTARIO</li>

    <?php

      if($_SESSION["perfil"] == "administrador"){

        echo '
          <li class="nav-item">
            <a href="articulos" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Gestor Articulos
              </p>
            </a>
          </li>
        ';

      }

    ?>
    

    <li class="nav-header">GESTOR DE CUENTAS</li>
    <?php

      if($_SESSION["perfil"] == "administrador"){

        echo '
          
          <li class="nav-item">
            <a href="usuarios" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Gestor de Usuarios
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="perfiles" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Gestor de Perfiles
              </p>
            </a>
          </li>

        ';

      }

    ?>
    
    
  </ul>
</nav>
<!-- /.sidebar-menu -->
