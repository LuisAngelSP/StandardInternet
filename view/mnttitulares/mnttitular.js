function init(){
  $('#titular_form').on("submit",function(e){

    guardaryeditar(e);

});
};
function guardaryeditar(e){
  e.preventDefault();
  var formData = new FormData($("#titular_form")[0]);
  $.ajax({
      url: "controller/titulares.php?op=guardaryeditar",
      type: "post",
      data: formData,
      contentType: false,
      processData: false,
      success: function(data){
          $('#mantenimiento').modal('hide'); // para que se oculte el modal
          $('#titular_data').DataTable().ajax.reload(); //para actualizar la tabla 

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
  var table = $('#titular_data').DataTable({
    "responsive": true,
    "lengthChange": false,
    "autoWidth": false,
    "ajax": {
      "url": "controller/titulares.php?op=listar",
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



  function eliminar(id_titular){
    
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
  
            $.post("controller/titulares.php?op=eliminar",{id_titular:id_titular},function(data){
                $('#titular_data').DataTable().ajax.reload(); //para actualizar la tabla 
            });
          Swal.fire(
            'Eliminado!',
            'Eliminado Correctamente',
            'success'
          )
        }
      })
    
  
  }
  
  
  function editar(id_titular){
    $('#lbltitulo').html("Editar Titular");//colocar el titulo en el h5
    $.post("controller/titulares.php?op=mostrar",{id_titular:id_titular},function(data){
        var datos = JSON.parse(data);
        
        $("#id_titular").val(datos.id_titular);
        $("#titu_nom").val(datos.titu_nom);
        $("#titu_apellido").val(datos.titu_apellido);
        $("#titu_fech_nac").val(datos.titu_fech_nac);
        $("#titu_dni").val(datos.titu_dni);
        $("#titu_fech_caducidad").val(datos.titu_fech_caducidad);
        $("#titu_nom_mama").val(datos.titu_nom_mama);
        $("#titu_nom_papa").val(datos.titu_nom_papa);
        $("#titular11").val(datos.titular11);
        $("#titular12").val(datos.titular12);
        $("#titular13").val(datos.titular13);
        $("#titular14").val(datos.titular14);
        $("#titular15").val(datos.titular15);
        $("#titular16").val(datos.titular16);
        $("#titular17").val(datos.titular17);
        $("#titular18").val(datos.titular18);
        $("#titular19").val(datos.titular19);
        $("#titular20").val(datos.titular20);  
  
        $("#mantenimiento").modal('show')//para llamar al modal
    });
  }
  

function nuevo(){
    $('#lbltitulo').html("Nuevo Titular");//colocar el titulo en el h5
    $('#id_titular ').val('');//
    $('#titular_form')[0].reset();
    $('#mantenimiento').modal('show'); //para llamar al modal
  }

  init();