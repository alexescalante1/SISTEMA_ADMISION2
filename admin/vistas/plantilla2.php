<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>IESTP HUANCANE - ADMIN</title>

  <link rel="icon" href="vistas/img/plantilla/icono.png">

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <!--=====================================
  PLUGINS DE CSS
  ======================================-->
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">

  <!-- Ionicons -->
  <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/AdminLTE.css">
  
  <link rel="stylesheet" href="vistas/dist/css/skins/skin-blue.css">

  <!-- iCheck -->
  <link rel="stylesheet" href="vistas/plugins/iCheck/square/blue.css">

  <!-- Morris chart -->
  <link rel="stylesheet" href="vistas/bower_components/morris.js/morris.css">

   <!-- jvectormap -->
  <link rel="stylesheet" href="vistas/bower_components/jvectormap/jquery-jvectormap.css">

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

   <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">

  <!-- bootstrap slider -->
  <link rel="stylesheet" href="vistas/plugins/bootstrap-slider/slider.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">

  <!-- bootstrap tags input -->
  <link rel="stylesheet" href="vistas/plugins/tags/bootstrap-tagsinput.css">

  <!-- bootstrap datepicker -->
   <link rel="stylesheet" href="vistas/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

  <!-- Dropzone -->
  <link rel="stylesheet" href="vistas/plugins/dropzone/dropzone.css">

  <!--=====================================
  CSS PERSONALIZADO
  ======================================-->

  <link rel="stylesheet" href="vistas/css/plantilla.css">

   <link rel="stylesheet" href="vistas/css/slide.css">


  <!--=====================================
  PLUGINS DE JAVASCRIPT
  ======================================-->

  <!-- jQuery 3 -->
  <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>

  <!-- jQuery UI 1.11.4 -->
  <script src="vistas/bower_components/jquery-ui/jquery-ui.min.js"></script>

  <!-- Bootstrap 3.3.7 -->
  <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

  <!-- AdminLTE App -->
  <script src="vistas/dist/js/adminlte.min.js"></script>

  <!-- iCheck http://icheck.fronteed.com/-->
  <script src="vistas/plugins/iCheck/icheck.min.js"></script>

    <!-- Morris.js charts -->
  <script src="vistas/bower_components/raphael/raphael.min.js"></script>

  <script src="vistas/bower_components/morris.js/morris.min.js"></script>

  <!-- jQuery Knob Chart -->
  <script src="vistas/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>

  <!-- jvectormap -->
  <script src="vistas/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>

  <script src="vistas/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>










<!-- EXTRA -->
<script src="vistas/bower_components/flot/jquery.flot.js"></script>

<script src="vistas/bower_components/flot/jquery.flot.resize.js"></script>

<script src="vistas/bower_components/flot/jquery.flot.pie.js"></script>

<script src="vistas/bower_components/flot/jquery.flot.categories.js"></script>
<!-- EXTRA -->











  <!-- ChartJS -->
  <script src="vistas/bower_components/Chart.js/Chart.js"></script>

  <!-- SweetAlert 2 https://sweetalert2.github.io/-->
  <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>

  <!-- bootstrap color picker https://farbelous.github.io/bootstrap-colorpicker/v2/-->
  <script src="vistas/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>

  <!-- Bootstrap slider http://seiyria.com/bootstrap-slider/-->
  <script src="vistas/plugins/bootstrap-slider/bootstrap-slider.js"></script>

  <!-- DataTables https://datatables.net/-->
  <script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>

  <!-- bootstrap tags input https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/examples/-->
  <script src="vistas/plugins/tags/bootstrap-tagsinput.min.js"></script>

   <!-- bootstrap datetimepicker http://bootstrap-datepicker.readthedocs.io-->
  <script src="vistas/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

   <!-- Dropzone http://www.dropzonejs.com/-->
  <script src="vistas/plugins/dropzone/dropzone.js"></script>

</head>

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">


<?php

 if(isset($_SESSION["validarSesionBackend"]) && $_SESSION["validarSesionBackend"] === "ok"){

    echo '<div class="wrapper">';

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

     

    echo '</div>';


 }else{

  include "modulos/login.php";

 }

 
?>

<!--=====================================
JS PERSONALIZADO
======================================-->

<script src="vistas/js/plantilla.js"></script>
<script src="vistas/js/gestorAdmision.js"></script>
<script src="vistas/js/gestorArticulos.js"></script>
<script src="vistas/js/gestorUsuarios.js"></script>
<script src="vistas/js/gestorAdministradores.js"></script>
<script src="vistas/js/gestorNotificaciones.js"></script>

<!--<script src="vistas/js/gestorComercio.js"></script>-->
<!--<script src="vistas/js/gestorSlide.js"></script>-->
<!--<script src="vistas/js/gestorCategorias.js"></script>-->
<!--<script src="vistas/js/gestorSubCategorias.js"></script>-->
<!--<script src="vistas/js/gestorProductos.js"></script>-->
<!--<script src="vistas/js/gestorBanner.js"></script>-->
<!--<script src="vistas/js/gestorVentas.js"></script>-->
<!--<script src="vistas/js/gestorVisitas.js"></script>-->


</body>
</html>