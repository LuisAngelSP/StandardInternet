function init(){
  $('#instalacion_form').on("submit",function(e){

    guardaryeditar(e);

});
}
function guardaryeditar(e){
  e.preventDefault();
  var formData = new FormData($("#instalacion_form")[0]);
  $.ajax({
      url: "./controller/nuevaInstalacion.php?op=guardaryeditar",
      type: "post",
      data: formData,
      contentType: false,
      processData: false,
      success: function(data){
          $('#mantenimiento').modal('hide'); // para que se oculte el modal
          $('#instalacion_data').DataTable().ajax.reload(); //para actualizar la tabla 

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
  var table = $('#instalacion_data').DataTable({
    "responsive": true,
    "lengthChange": false,
    "autoWidth": false,
    "ajax": {
      "url": "controller/nuevaInstalacion.php?op=listar",
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
    "createdRow": function(row, data, dataIndex) {
      $(row).find('td').addClass('row-ajustada');
    }
  });

});

  
function updateCamposServicio(serv_id, datos) {
  $.ajax({
    url: "controller/form/servicio_form.php",
    type: "POST",
    data: { serv_id: serv_id },
    success: function (data) {
      $("#campos_servicio").html(data);
      // Recorrer los datos y establecer los valores de los campos correspondientes
      $.each(datos, function (key, value) {
        $("#" + key).val(value);
      });
    },
  });
}

function editar(inst_id){
  $('#lbltitulo1').html("Editar Servicio de instalacion");
  $.post("controller/nuevaInstalacion.php?op=mostrar",{inst_id:inst_id},function(data){
    var datos = JSON.parse(data);
    updateCamposServicio(datos.serv_id, datos);

    $('#mantenimiento').modal('show'); 
  });
}

  function eliminar(inst_id){
    
    Swal.fire({
        title: 'Eliminar',
        text: "Estas seguro de eliminar el registro!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'No',
        confirmButtonText: 'Si'
      }).then((result) => {
        if (result.isConfirmed) {
  
            $.post("controller/nuevaInstalacion.php?op=eliminar",{inst_id:inst_id},function(data){
                $('#instalacion_data').DataTable().ajax.reload(); //para actualizar la tabla 
            });
          Swal.fire(
            'Eliminado!',
            'Eliminado Correctamente',
            'success'
          )
        }
        $('#instalacion_data').DataTable().ajax.reload(); 
      })
    
  
  }

  $(document).ready(function() {
    function generarCamposServicio() {
      var serv_id = $("#serv_id").val();
      $.ajax({
        url: "controller/form/servicio_form.php",
        type: "POST",
        data: {serv_id: serv_id},
        success: function(data) {
          $("#campos_servicio").html(data);
        }
      });
  
      // Ocultar los elementos después de un breve retraso
      setTimeout(function() {
        $(".select2-selection").hide();
        $(".select2-container").hide();
      }, 100);
    }
  
    $("#serv_id").change(generarCamposServicio);
  
  
    // resetear el modal al cerrarse
    $('#mantenimiento').on('hidden.bs.modal', function() {
      $("#campos_servicio").empty();
    });
  });


  function nuevo(){

    $('#lbltitulo').html("Nuevo Instalacion");
    $('#inst_id').val('');//
    $('#instalacion_form')[0].reset();
    $('#mantenimiento').modal('show');

  }

  init();

