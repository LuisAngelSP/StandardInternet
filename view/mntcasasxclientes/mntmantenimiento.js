var id_cliente =  $('#id_cliente').val();

$(document).ready(function() {
  var table = $('#casa_data').DataTable({
    "responsive": true,
    "lengthChange": false,
    "autoWidth": false,
    "ajax": {
      "url": "", 
      "type": "POST"
    },
    "ajax":{
      url: 'controller/casas.php?op=listar_casas_x_cliente',
      type : "post",
      dataType : "json",
      data:{ id_cliente : id_cliente},
      error: function(e){
          console.log(e.responseText);
      }
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
function initcasa(){
  $('#modcasa_form').on("submit",function(e){

    guardaryeditar_casa(e);

});
}

function guardaryeditar_casa(e){
  e.preventDefault();
  var formData = new FormData($("#modcasa_form")[0]);
  $.ajax({ 
      url: "controller/casas.php?op=guardaryeditar",
      type: "post",
      data: formData,
      contentType: false,
      processData: false,
      success: function(data){
        $('#modcasa').modal('hide'); // para que se oculte el modal
        $('#casa_data').DataTable().ajax.reload(); //para actualizar la tabla 
        Swal.fire({
          title: 'Correcto!',
          text: "Se Registro la Casa Correctamente!",
          icon: 'success',
          confirmButtonText: 'Aceptar'
        });
}
})
}

function casaxcliente(){
  $('#lbltitulo').html("Nuevo Casa");//colocar el titulo en el h5
  $('#id_casas').val('');
  $('#modcasa_form')[0].reset();
  $('#modcasa').modal('show'); //para llamar al modal
  }
  
  initcasa();



function eliminar(id_casas){
    
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

          $.post("controller/casas.php?op=eliminar",{id_casas:id_casas},function(data){
              $('#casa_data').DataTable().ajax.reload(); //para actualizar la tabla 
          });
        Swal.fire(
          'Eliminado!',
          'Eliminado Correctamente',
          'success'
        )
      }
    })
  

}


function editar(id_casas){
  $('#lbltitulo').html("Editar Casa");//colocar el titulo en el h5
  $.post("controller/casas.php?op=mostrar",{id_casas:id_casas},function(data){
      var datos = JSON.parse(data);
      $("#id_casas").val(datos.id_casas);
      $("#cas_descripcion").val(datos.cas_descripcion);
      $("#cas_direccion").val(datos.cas_direccion);
      $("#casa12").val(datos.casa12);
      $("#casa13").val(datos.casa13);
      $("#casa14").val(datos.casa14);
      $("#casa15").val(datos.casa15);
      $("#id_cliente").val(datos.id_cliente);

      $("#modcasa").modal('show')//para llamar al modal
  });
}
