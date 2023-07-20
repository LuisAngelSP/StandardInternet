function init(){
  $('#usuario_form').on("submit",function(e){

    guardaryeditar(e);

});
}
function guardaryeditar(e){
  e.preventDefault();
  var formData = new FormData($("#usuario_form")[0]);
  $.ajax({
      url: "controller/usuarios.php?op=guardaryeditar",
      type: "post",
      data: formData,
      contentType: false,
      processData: false,
      success: function(data){
          $('#mantenimiento').modal('hide'); // para que se oculte el modal
          $('#usuario_data').DataTable().ajax.reload(); //para actualizar la tabla 

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
  var table = $('#usuario_data').DataTable({
    "responsive": true,
    "lengthChange": false,
    "autoWidth": false,
    "ajax": {
      "url": "controller/usuarios.php?op=listar",
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




function eliminar(usu_id){
    
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

          $.post("controller/usuarios.php?op=eliminar",{usu_id:usu_id},function(data){
              $('#usuario_data').DataTable().ajax.reload(); //para actualizar la tabla 
          });
        Swal.fire(
          'Eliminado!',
          'Eliminado Correctamente',
          'success'
        )
      }
    })
  

}


function editar(usu_id){
  $('#lbltitulo').html("Editar Servicio");//colocar el titulo en el h5
  $.post("controller/usuarios.php?op=mostrar",{usu_id:usu_id},function(data){
      var datos = JSON.parse(data);
      $("#usu_id").val(datos.usu_id);
      $("#usu_nombre").val(datos.usu_nombre);
      $("#usu_cedula").val(datos.usu_cedula);
      $("#usu_cargo").val(datos.usu_cargo);
      $("#usu_usuario").val(datos.usu_usuario);
      $("#usu_password").val(datos.usu_password);
      $("#usu_nivel").val(datos.usu_nivel);
      $("#usu_fech_ingreso").val(datos.usu_fech_ingreso);

      $("#mantenimiento").modal('show')//para llamar al modal
  });
}



function nuevo(){
  $('#lbltitulo').html("Nuevo Usuario");//colocar el titulo en el h5
  $('#usu_id').val('');
  $('#usuario_form')[0].reset();
  $('#mantenimiento').modal('show'); //para llamar al modal
}

init();