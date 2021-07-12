<?php

require_once "../../../controladores/admision.controlador.php";
require_once "../../../modelos/admision.modelo.php";

?>

<!-- /.card-header -->
<div class="card-body">
    <table id="tablaColegios" class="table table-bordered table-striped">
    <thead>
    <tr>
        <th style="width:5px">#</th>
        <th style="width:10px">ESTADO</th>
        <th>TITULO</th>
        <th style="width:80px">FECHA</th>
        <th style="width:10px">OP</th>
    </tr>
    </thead>
    <tbody>
    
    <?php
            $admicion = ControladorAdmision::ctrMostrarAdmision(null,null);

            foreach ($admicion as $key => $value) {

                if($admicion[$key]["estado"] == 0){

                $colorEstado = "btn-danger";
                $textoEstado = "NO VISIBLE";
                $estadoArticulo = 1;
        
                }else{
        
                $colorEstado = "btn-success";
                $textoEstado = "VISIBLE";
                $estadoArticulo = 0;
        
                }
        
                $estado = "<button class='btn btn-xs btnActivar ".$colorEstado."' style='width:70px;' idAdmision='".$admicion[$key]["idAdmision"]."' estadoAdmision='".$estadoArticulo."'>".$textoEstado."</button>";
                
                $accionesFinal = "<div class='btn-group'><a href='".$admicion[$key]["ruta"]."'><button class='btn btn-block btn-success'><i class='fa fa-eye'></i></button></a></div>";

                echo '<tr>';
                echo '<td>'.$key.'</td>';
                echo '<td>'.$estado.'</td>';
                echo '<td>'.$admicion[$key]["titulo"].'</td>';
                echo '<td>'.$admicion[$key]["fecha"].'</td>';
                echo '<td>'.$accionesFinal.'</td>';
                echo '</tr>';
            }
    ?>

    </tbody>
    <tfoot>
    <tr>
        <th>#</th>
        <th>ESTADO</th>
        <th>TITULO</th>
        <th>FECHA</th>
        <th>OP</th>
    </tr>
    </tfoot>
    </table>
</div>
<!-- /.card-body -->


<script>

    $("#tablaColegios").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#tablaColegios_wrapper .col-md-6:eq(0)');
    
</script>