function init(){
  $('#servicio_form').on("submit",function(e){

    guardaryeditar(e);

});
}
function guardaryeditar(e){
  e.preventDefault();
  var formData = new FormData($("#servicio_form")[0]);
  $.ajax({
      url: "controller/servicios.php?op=guardaryeditar",
      type: "post",
      data: formData,
      contentType: false,
      processData: false,
      success: function(data){
          $('#mantenimiento').modal('hide'); // para que se oculte el modal
          $('#servicio_data').DataTable().ajax.reload(); //para actualizar la tabla 

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
  var table = $('#servicio_data').DataTable({
    "responsive": true,
    "lengthChange": false,
    "autoWidth": false,
    "ajax": {
      "url": "controller/servicios.php?op=listar",
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



function eliminar(serv_id){
    
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

          $.post("controller/servicios.php?op=eliminar",{serv_id:serv_id},function(data){
              $('#servicio_data').DataTable().ajax.reload(); //para actualizar la tabla 
          });
        Swal.fire(
          'Eliminado!',
          'Eliminado Correctamente',
          'success'
        )
      }
    })
  

}


function editar(serv_id){
  $('#lbltitulo').html("Editar Servicio");//colocar el titulo en el h5
  $.post("controller/servicios.php?op=mostrar",{serv_id:serv_id},function(data){
      var datos = JSON.parse(data);
      $("#serv_id").val(datos.serv_id);
      $("#serv_nom").val(datos.serv_nom);
      $("#serv_obser").val(datos.serv_obser);

      $("#mantenimiento").modal('show')//para llamar al modal
  });
}



function nuevo(){
  $('#lbltitulo').html("Nuevo Servicio");//colocar el titulo en el h5
  $('#serv_id').val('');//
  $('#servicio_form')[0].reset();
  $('#mantenimiento').modal('show'); //para llamar al modal
}

init();