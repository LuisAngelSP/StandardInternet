$(function () {
  // Summernote
  $('#contenido').summernote();
});
$(document).ready(function() {
  $("#CLIENTE").click(function() {
    $('#contenido').summernote('insertText', '{cliente}');
  });
  $("#celular").click(function() {
    $('#contenido').summernote('insertText', '{celular}');
  });
  $("#dni").click(function() {
    $('#contenido').summernote('insertText', '{dni}');
  });
  $("#sexo").click(function() {
    $('#contenido').summernote('insertText', '{sexo}');
  });
  $("#correo").click(function() {
    $('#contenido').summernote('insertText', '{correo}');
  });
  $("#mes").click(function() {
    $('#contenido').summernote('insertText', '{mes}');
  });
  $("#servicio").click(function() {
    $('#contenido').summernote('insertText', '{servicio}');
  });
  $("#costo").click(function() {
    $('#contenido').summernote('insertText', '{costo}');
  });
});

function editar(id_mensaje) {
  $('#lbltitulo').html("Editar Mensaje");
  $.post("controller/mensaje.php?op=mostrar", { id_mensaje: id_mensaje }, function(data) {
    var datos = JSON.parse(data);
    $("#id_mensaje").val(datos.id_mensaje);
    $("#titulo").val(datos.titulo);
    $("#contenido").summernote('code', datos.contenido); // Establecer el contenido del editor Summernote
    $("#mantenimiento").modal('show');
  });
}


$(document).ready(function () {
  var table = $('#mensaje_data').DataTable({
    "responsive": true,
    "lengthChange": false,
    "autoWidth": false,
    "ajax": {
      "url": "controller/mensaje.php?op=listar",
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


function nuevo() {
  $('#lbltitulo').html("Generar un mensaje");
  $('#Mensaje_form')[0].reset();
  $('#id_mensaje').val('');
  $("#contenido").summernote('code', ''); // Establecer el contenido del editor Summernote a vacío
  $('#mantenimiento').modal('show');
}


function init() {
  $('#Mensaje_form').on("submit", function (e) {

    guardaryeditar(e);

  });
}
function guardaryeditar(e) {
  e.preventDefault();
  var formData = new FormData($("#Mensaje_form")[0]);
  $.ajax({
    url: "controller/mensaje.php?op=guardaryeditar",
    type: "post",
    data: formData,
    contentType: false,
    processData: false,
    success: function (data) {
      $('#mantenimiento').modal('hide'); // para que se oculte el modal
      $('#mensaje_data').DataTable().ajax.reload(); //para actualizar la tabla 

      Swal.fire({
        title: 'Correcto!',
        text: "Se Registro Correctamente!",
        icon: 'success',
        confirmButtonText: 'Aceptar'

      });
    }
  })
}


init();

// function eliminar(serv_id){

//   Swal.fire({
//       title: 'Eliminar',
//       text: "Estas seguro de eliminar el registro!",
//       icon: 'warning',
//       showCancelButton: true,
//       confirmButtonColor: '#3085d6',
//       cancelButtonColor: '#d33',
//       cancelButtonText: 'No',
//       confirmButtonText: 'Si'
//     }).then((result) => {
//       if (result.isConfirmed) {

//           $.post("controller/servicios.php?op=eliminar",{serv_id:serv_id},function(data){
//               $('#servicio_data').DataTable().ajax.reload(); //para actualizar la tabla 
//           });
//         Swal.fire(
//           'Eliminado!',
//           'Eliminado Correctamente',
//           'success'
//         )
//       }
//     })


// }


