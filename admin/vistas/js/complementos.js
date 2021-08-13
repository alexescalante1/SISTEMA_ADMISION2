
$('#reservationdateINIT').datetimepicker({
    format: 'L'
});
$('#reservationdateEND').datetimepicker({
    format: 'L'
});
$('#reservationdateINITE').datetimepicker({
  format: 'L'
});

$('#timepickerHini').datetimepicker({
  format: 'LT'
});

$('#timepickerHfin').datetimepicker({
  format: 'LT'
});


$(function () {
  
  $("input[data-bootstrap-switch]").each(function(){
    $(this).bootstrapSwitch('state', $(this).prop('checked'));
  })
  
  $("#tablaAdmision").DataTable({
    "responsive": true, "lengthChange": false, "autoWidth": false,
    "buttons": ["copy", "excel", "pdf", "print", "colvis"]
  }).buttons().container().appendTo('#tablaAdmision_wrapper .col-md-6:eq(0)');

  $("#tablaInscritos").DataTable({
    "responsive": true, "lengthChange": false, "autoWidth": false,
    "buttons": ["copy", "excel", "pdf", "print", "colvis"]
  }).buttons().container().appendTo('#tablaInscritos_wrapper .col-md-6:eq(0)');

  $("#tablaEvAdmi").DataTable({
    "responsive": true, "lengthChange": false, "autoWidth": false,
    "buttons": ["colvis"]
  }).buttons().container().appendTo('#tablaEvAdmi_wrapper .col-md-6:eq(0)');
  
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

  $("#tablaArticulo").DataTable({
    "responsive": true, "lengthChange": false, "autoWidth": false,
    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
  }).buttons().container().appendTo('#tablaArticulo_wrapper .col-md-6:eq(0)');

});



$("#refress").click(function(){
    
    $('#RecargarCole').load('vistas/modulos/tablas/admision.php');

});

$(document).ready(function(){
    setInterval(
    function(){
      $('#RecargarCole').load('vistas/modulos/tablas/admision.php');
    },2000
    );
});

