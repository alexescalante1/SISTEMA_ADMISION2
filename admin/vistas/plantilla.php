<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>IESTP HUANCANE - ADMIN</title>
  <link rel="icon" href="vistas/img/plantilla/icono.png">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="vistas/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="vistas/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/adminlte.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="vistas/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="vistas/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="vistas/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">


  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="vistas/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="vistas/plugins/toastr/toastr.min.css">


  <!--=====================================
  PLUGINS DE CSS
  ======================================-->
 
  <!-- Dropzone -->
  <link rel="stylesheet" href="vistas/plugins/dropzone/dropzone.css">

  <!--=====================================
  CSS PERSONALIZADO
  ======================================-->

  <link rel="stylesheet" href="vistas/css/mios.css">


  <!--=====================================
  PLUGINS DE JAVASCRIPT
  ======================================-->

  <!-- jQuery -->
  <script src="vistas/plugins/jquery/jquery.min.js"></script>
  
  <!-- SweetAlert2 -->
  <script src="vistas/plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Toastr -->
  <script src="vistas/plugins/toastr/toastr.min.js"></script>

   <!-- Dropzone http://www.dropzonejs.com/-->
  <script src="vistas/plugins/dropzone/dropzone.js"></script>

</head>


<body class="hold-transition <?php if(isset($_SESSION["estiloPantalla"]) && $_SESSION["estiloPantalla"] == 1){ echo 'dark-mode'; } ?>  sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

<?php

 if(isset($_SESSION["validarSesionBackend"]) && $_SESSION["validarSesionBackend"] === "ok"){

    echo '<div class="wrapper">
   
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <h2 style="font-weight: bold;" class="animation__wobble">LOADING...</h2>
    </div>
    
    
    ';


     /*=============================================
     CABEZOTE
     =============================================*/

     include "modulos/cabezote.php";

    /*=============================================
     LATERAL
     =============================================*/

     include "modulos/lateral.php";

     
     /*=============================================
     CONTENIDO
     =============================================*/

     $rutas = array();
     $infoEventos = null;
     $infoArticulos = null;
     $infoArticulosP = null;

     if(isset($_GET["ruta"])){

        $rutas = explode("/", $_GET["ruta"]);
        $item = "ruta";

        /*=============================================
        URL'S AMIGABLES IFO ARTICULOS
        =============================================*/

        $rutaArticulos = ControladorArticulos::ctrMostrarInfoArticulo($item, $rutas[0]);

        $rutaEventos = ControladorAdmision::ctrMostrarInfoAdmision($item, $rutas[0]);

        if($_GET["ruta"]== "inicio" ||
           $_GET["ruta"]== "usuarios" ||
           $_GET["ruta"]== "mensajes" ||
           $_GET["ruta"]== "perfiles" ||
           $_GET["ruta"]== "perfil" ||
           $_GET["ruta"]== "articulos" ||
           $_GET["ruta"]== "evento" ||
           $_GET["ruta"]== "prestar" ||
           $_GET["ruta"]== "prestamos" ||
           $_GET["ruta"]== "registrodeprestamos" ||
           $_GET["ruta"]== "notificacionesM" ||
           $_GET["ruta"]== "salir"){

          include "modulos/".$_GET["ruta"].".php";

        }else if($rutas[0] == $rutaEventos["ruta"]){

          $infoEventos = $rutas[0];
          include "modulos/infoadmision.php";

        }else if(isset($rutaArticulos)){

          if($rutas[0] == $rutaArticulos["ruta"]){

            $infoArticulos = $rutas[0];
            include "modulos/infoarticulos.php";
  
          }else{
  
            $newphrase = str_replace("-prestamo", "", $rutas[0]);
  
            $rutaArticulos = ControladorArticulos::ctrMostrarInfoArticulo($item, $newphrase);
           
            if($newphrase == $rutaArticulos["ruta"]){
              
              $infoArticulosP = $rutaArticulos["ruta"];
              include "modulos/infoarticulos-prestamo.php";
  
            }else{

              include "modulos/error404.php";
    
            }
            
          }
        }else{

          include "modulos/error404.php";

        }
        

     }else{

       include "modulos/inicio.php";

       /*include "modulos/infoarticulos.php";
      */
     }

     

    /*=============================================
    FOOTER
    =============================================*/


    echo '
    
    
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
          <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
          <strong>Copyright &copy; 2014-2021 <a href="#">Alex Fredy Escalante Maron</a>.</strong>
          All rights reserved.
          <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.1.0
          </div>
        </footer>
    
    
    </div>';


 }else{

  include "modulos/login.php";

 }

 
?>











        <!--=====================================
        JS PERSONALIZADO
        ======================================-->

        <!--<script src="vistas/js/plantilla.js"></script>-->
        <script src="vistas/js/gestorAdmision.js"></script>
        <script src="vistas/js/gestorArticulos.js"></script>
        <script src="vistas/js/gestorUsuarios.js"></script>
        <script src="vistas/js/gestorAdministradores.js"></script>
        <script src="vistas/js/gestorNotificaciones.js"></script>
        <!-- ./wrapper -->


        <!-- REQUIRED SCRIPTS -->
      
        <!-- Bootstrap -->
        <script src="vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        
        <!-- overlayScrollbars -->
        <script src="vistas/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="vistas/dist/js/adminlte.js"></script>
        <!-- PAGE PLUGINS -->
        <!-- jQuery Mapael -->
        <script src="vistas/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
        <script src="vistas/plugins/raphael/raphael.min.js"></script>
        <script src="vistas/plugins/jquery-mapael/jquery.mapael.min.js"></script>
        <script src="vistas/plugins/jquery-mapael/maps/usa_states.min.js"></script>

        
        <!-- ChartJS -->
        <script src="vistas/plugins/chart.js/Chart.min.js"></script>


        <!-- AdminLTE for demo purposes 
        <script src="vistas/dist/js/demo2.js"></script>-->
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="vistas/dist/js/pages/dashboard2.js"></script>









        <!-- DataTables  & Plugins -->
        <script src="vistas/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="vistas/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="vistas/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="vistas/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="vistas/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="vistas/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="vistas/plugins/jszip/jszip.min.js"></script>
        <script src="vistas/plugins/pdfmake/pdfmake.min.js"></script>
        <script src="vistas/plugins/pdfmake/vfs_fonts.js"></script>
        <script src="vistas/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="vistas/plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="vistas/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

       
        <script>

              $(function () {

                $("#tablaAdmision").DataTable({
                  "responsive": true, "lengthChange": false, "autoWidth": false,
                  "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#tablaAdmision_wrapper .col-md-6:eq(0)');

                
                $("#tablaAdmin").DataTable({
                  "responsive": true, "lengthChange": false, "autoWidth": false,
                  "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#tablaAdmin_wrapper .col-md-6:eq(0)');

                $('#tablaEspecialidad').DataTable({
                  "paging": true,
                  "lengthChange": false,
                  "searching": false,
                  "ordering": true,
                  "info": true,
                  "autoWidth": false,
                  "responsive": true,
                });

                $("#tablaColegios").DataTable({
                  "responsive": true, "lengthChange": false, "autoWidth": false,
                  "buttons": ["copy", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#tablaColegios_wrapper .col-md-6:eq(0)');

              });



              $("#refress").click(function(){
                  
                  $('#RecargarCole').load('vistas/modulos/tablas/admision.php');
   
                   /*
                   setTimeout(() => { 
                   }, 2000);
                   $(document).ready(function(){
                       setInterval(
                       function(){
                         $('#RecargarCole').load('vistas/modulos/tablas/admision.php');
                       },3000
                       );
                   });
                   */
   
              });

              $(document).ready(function(){
                  setInterval(
                  function(){
                    $('#RecargarCole').load('vistas/modulos/tablas/admision.php');
                  },2000
                  );
              });
              
        </script>



</body>
</html>
