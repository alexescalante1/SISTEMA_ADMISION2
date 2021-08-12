<?php

  if(!isset($_GET["eAdmision"])){
    return;
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $_GET["cod"]; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    
    <!-- jQuery -->
    <script src="../vistas/plugins/jquery/jquery.min.js"></script>

    <!-- CSS
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/skeleton.css">


  </head>
  <body>


    <div id="pagina">

      <div class="headerT">
        <h3>INSTITULO DE EDUCACIÓN SUPERIOR TECNOLÓGICO HUANCANÉ</h3>
        <h5 class="compact">VICERRECTORADO ACADÉMICO</h5>
        <h4 class="compact">OFICINA DE INSCRIPCIÓN 2021</h4>
        
        <h3>CONSTANCIA</h3>
      </div>

      <table >
        <tr>
          <td>MODALIDAD</td>
          <td><?php echo $_GET["eAdmision"]; ?></td>
        </tr>
        <tr>
          <td>CODIGO DE INSCRIPCION</td>
          <td><?php echo $_GET["cod"]; ?></td>
        </tr>
        <tr>
          <td>NOMBRES Y APELLIDOS</td>
          <td><?php echo $_GET["nombresApellidos"]; ?></td>
        </tr>
        <tr>
          <td>PRIMERA OPCION</td>
          <td><?php echo $_GET["Popcion"]; ?></td>
        </tr>
        <tr>
          <td>SEGUNDA OPCION</td>
          <td><?php echo $_GET["Sopcion"]; ?></td>
        </tr>
      </table>

      <p>Se hace de constatar que el presente alumno esta inscrito y cumple con los requisitos.</p>
      <div class="headerT">
        <p>Puno, 05 de Marzo del 2021.</p><br>


        <p>___________________________</p>
        <p class="compact">Estudiante</p>
     
      </div>
      

      <br><br>



      <div class="headerT">
        <h3>INSTITULO DE EDUCACIÓN SUPERIOR TECNOLÓGICO HUANCANÉ</h3>
        <h5 class="compact">VICERRECTORADO ACADÉMICO</h5>
        <h4 class="compact">OFICINA DE INSCRIPCIÓN 2021</h4>
        
        <h3>CONSTANCIA</h3>
      </div>

      <table >
        <tr>
          <td>MODALIDAD</td>
          <td><?php echo $_GET["eAdmision"]; ?></td>
        </tr>
        <tr>
          <td>CÓDIGO DE MATRÍCULA</td>
          <td><?php echo $_GET["cod"]; ?></td>
        </tr>
        <tr>
          <td>NOMBRES Y APELLIDOS</td>
          <td><?php echo $_GET["nombresApellidos"]; ?></td>
        </tr>
        <tr>
          <td>PRIMERA OPCIÓN</td>
          <td><?php echo $_GET["Popcion"]; ?></td>
        </tr>
        <tr>
          <td>SEGUNDA OPCIÓN</td>
          <td><?php echo $_GET["Sopcion"]; ?></td>
        </tr>
      </table>

      <p>Se hace de constatar que el presente alumno esta inscrito y cumple con los requisitos.</p>
      <div class="headerT">
        <p>Puno, 05 de Marzo del 2021.</p><br>


        <p>___________________________</p>
        <p class="compact">Estudiante</p>
     
      </div>

    </div>

    <button id="print_btn" type="button">IMPRIMIR</button>




    <script src="printThis.js"></script>

    <script>
      
      /*
      $(document).ready(function () {
      	$('#print_btn').click(function () {
      	  var arr = $('#pagina').printThis({
            base: "http://localhost/SISTEMA_ADMISION2/admin/print/"
          });
      	});
      });
      */

      window.onload = $('#pagina').printThis({
            base: "http://localhost/SISTEMA_ADMISION2/admin/print/"
          });

    </script>
    
  </body>
</html>