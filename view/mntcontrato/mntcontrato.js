function init(){
  $('#contrato_form').on("submit",function(e){

    guardaryeditar(e); 

});
};
function guardaryeditar(e){
  e.preventDefault();
  var formData = new FormData($("#contrato_form")[0]);
  $.ajax({
      url: "controller/contratos.php?op=guardaryeditar",
      type: "post",
      data: formData,
      contentType: false,
      processData: false,
      success: function(data){
          $('#mantenimiento').modal('hide'); // para que se oculte el modal
          $('#contrato_data').DataTable().ajax.reload(); //para actualizar la tabla 

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
  var table = $('#contrato_data').DataTable({
    "responsive": true,
    "lengthChange": false,
    "autoWidth": false,
    "ajax": {
      "url": "controller/contratos.php?op=listar",
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
  
  //           $.post("../../controller/servicios.php?op=eliminar",{serv_id:serv_id},function(data){
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
  
  
  function editar(id_contrato){
    $('#lbltitulo').html("Editar Contratos");//colocar el titulo en el h5
    $.post("controller/contratos.php?op=mostrar",{id_contrato:id_contrato},function(data){
        var datos = JSON.parse(data);

                    $("#id_contrato").val(datos.id_contrato);
                    $("#contr_descripcion").val(datos.contr_descripcion);
                    $("#id_titular").val(datos.id_titular);
                    $("#contr_tip_conexion").val(datos.contr_tip_conexion);
                    $("#contr_fech").val(datos.contr_fech);
                    $("#contr_tarifa").val(datos.contr_tarifa);
                    $("#contr_fech_Inst").val(datos.contr_fech_Inst);
                    $("#mapaCoordenadasUbicacion").val(datos.mapaCoordenadasUbicacion);
                    $("#contr_direccion").val(datos.contr_direccion);
                    $("#contrato14").val(datos.contrato14);
                    $("#contrato15").val(datos.contrato15);
                    $("#contrato16").val(datos.contrato16);
                    $("#contrato17").val(datos.contrato17);
                    $("#contrato18").val(datos.contrato18);
                    $("#contrato19").val(datos.contrato19);
                    $("#contrato20").val(datos.contrato20);
  
        $("#mantenimiento").modal('show')//para llamar al modal
    });
  }
  

function nuevo(){
    $('#lbltitulo').html("Nuevo Contrato");//colocar el titulo en el h5
    $('#id_contrato').val('');//
    $('#contrato_form')[0].reset();
    $('#mantenimiento').modal('show'); //para llamar al modal
  }

  init();