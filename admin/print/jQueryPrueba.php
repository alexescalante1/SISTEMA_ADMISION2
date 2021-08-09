
<!DOCTYPE html>
<html>
  <head>
    <title>Imprimir una página con jQuery (printThis)</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="printThis.js"></script>
  </head>
  <body>
    <div id="pagina">
      <?php

        if(isset($_GET["eAdmision"])){
          echo '<h2>'.$_GET["eAdmision"].'</h2>';
        }

      ?>

      <h2>Título de página</h2>
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
    <button id="print_btn" type="button">Imprimir</button>
    <script>

      $(document).ready(function () {
      	$('#print_btn').click(function () {
      	  var arr = $('#pagina').printThis();
      	});
      });
      
      window.onload = $('#pagina').printThis();

    </script>
  </body>
</html>