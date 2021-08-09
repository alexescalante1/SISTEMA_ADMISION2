<?php

  if(!isset($_GET["eAdmision"])){
    return;
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <title>CONSTANCIA DE INSCRIPCION</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="printThis.js"></script>
  </head>
  <body>


    <div id="pagina">


      <?php
        echo '<h1>'.$_GET["eAdmision"].'</h1>';
        echo '<h2>'.$_GET["Popcion"].'</h2>';
        echo '<h2>'.$_GET["Sopcion"].'</h2>';
        echo '<h2>'.$_GET["nombresApellidos"].'</h2>';
      ?>
      <table >
        <tr>
          <td>dato1</td>
          <td>dato2</td>
          <td>dato3</td>
        </tr>
        <tr>
          <td>dato4</td>
          <td>dato5</td>
          <td>dato6</td>
        </tr>
      </table>
    </div>


    <!--<button id="print_btn" type="button">IMPRIMIR</button>-->

    <script>

      /*
      $(document).ready(function () {
      	$('#print_btn').click(function () {
      	  var arr = $('#pagina').printThis();
      	});
      });
      */
      
      window.onload = $('#pagina').printThis();

    </script>
    
  </body>
</html>