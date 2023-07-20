function init(){
  $('#modem_form').on("submit",function(e){

    guardaryeditar(e);

});
}
function guardaryeditar(e){
  e.preventDefault();
  var formData = new FormData($("#modem_form")[0]);
  $.ajax({
      url: "controller/modems.php?op=guardaryeditar",
      type: "post",
      data: formData,
      contentType: false,
      processData: false,
      success: function(data){
          $('#mantenimiento').modal('hide'); // para que se oculte el modal
          $('#modem_data').DataTable().ajax.reload(); //para actualizar la tabla 

          Swal.fire({
              title: 'Correcto!',
              text: "Se Registro Correctamente!",
              icon: 'success',
              confirmButtonText: 'Aceptar'

          });
  }
})
}




$(document).ready(function() {
  var table = $('#modem_data').DataTable({
    "responsive": true,
    "lengthChange": false,
    "autoWidth": false,
    "ajax": {
      "url": "controller/modems.php?op=listar",
      "type": "POST"
    },
    "language": {
      "sLengthMenu": "Mostrar _MENU_ registros",
      "sZeroRecords": "No se encontraron resultados",
      "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
      "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
      "sSearch": "Buscar:",
      "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Último",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    },
    "dom": 'Bfrtip',
    "buttons": [
      'excel', 'pdf', 'colvis'
    ],
    "scrollX": true,
    "fixedHeader": {
      "header": true,
      "footer": false
    },
  });
});



  function editar(id_modem){
    $('#lbltitulo').html("Editar Modems");//colocar el titulo en el h5
    $.post("controller/modems.php?op=mostrar",{id_modem:id_modem},function(data){
        var datos = JSON.parse(data);
        $("#id_modem").val(datos.id_modem);
        $("#mod_descripcion").val(datos.mod_descripcion);
        $("#mod_imagen").val(datos.mod_imagen);
        $("#mod_codigo_acceso").val(datos.mod_codigo_acceso);
        $("#mod_marca").val(datos.mod_marca);
        $("#mod_modelo").val(datos.mod_modelo);
        $("#mod_serie").val(datos.mod_serie);
        $("#mod_wifi").val(datos.mod_wifi);
        $("#mod_password").val(datos.mod_password);
        $("#mod_wifi_default").val(datos.mod_wifi_default);
        $("#mod_pass_default").val(datos.mod_pass_default);
        $("#mod_idaccess").val(datos.mod_idaccess);
        $("#id_cli").val(datos.id_cli);
        $("#modem13").val(datos.modem13);
        $("#modem14").val(datos.modem14);
        $("#modem15").val(datos.modem15);
        $("#modem16").val(datos.modem16);
        $("#modem17").val(datos.modem17);
        $("#modem18").val(datos.modem18);
        $("#modem19").val(datos.modem19);
        $("#modem20").val(datos.modem20);
        $("#id_contrato").val(datos.id_contrato);
  
        $("#mantenimiento").modal('show')//para llamar al modal
    });
  }
  
  function nuevo(){
    $('#lbltitulo').html("Nuevo Modem");
    $('#id_modem').val('');//
    $('#modem_form')[0].reset();
    $('#mantenimiento').modal('show');
  }

  init();