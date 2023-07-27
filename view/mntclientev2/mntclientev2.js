// function init(){
//   $('#cliente_form').on("submit",function(e){

//     guardaryeditar(e);

// });
// };
// function guardaryeditar(e){
//   e.preventDefault();
//   var formData = new FormData($("#cliente_form")[0]);
//   $.ajax({
//       url: "controller/clientes.php?op=guardaryeditar",
//       type: "post",
//       data: formData,
//       contentType: false,
//       processData: false,
//       success: function(data){
//           $('#mantenimiento').modal('hide'); // para que se oculte el modal
//           $('#cliente_data').DataTable().ajax.reload(); //para actualizar la tabla 

//           Swal.fire({
//               title: 'Correcto!',
//               text: "Se Registro Correctamente!",
//               icon: 'success',
//               confirmButtonText: 'Aceptar'

//           });
//   }
// })
// }

  

$(document).ready(function() {
  var table = $('#cliente_datav2').DataTable({
    "responsive": true,
    "lengthChange": false,
    "autoWidth": false,
    "ajax": {
      "url": "controller/clientesv2.php?op=listar",
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
    "scrollY": true,
    "scrollCollapse": true,
    "paging": true,
    "pageLength": 10,
    "fixedHeader": {
      "header": true,
      "footer": false
    },
    "rowCallback": function(row, data, dataIndex) {
      $(row).css("height", "30px");
    }
  });

});







//   function eliminar(cli_id){
    
//     Swal.fire({
//         title: 'Eliminar',
//         text: "Estas seguro de eliminar el registro!",
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         cancelButtonText: 'No',
//         confirmButtonText: 'Si'
//       }).then((result) => {
//         if (result.isConfirmed) {
  
//             $.post("controller/clientes.php?op=eliminar",{cli_id:cli_id},function(data){
//                 $('#cliente_data').DataTable().ajax.reload(); //para actualizar la tabla 
//             });
//           Swal.fire(
//             'Eliminado!',
//             'Eliminado Correctamente',
//             'success'
//           )
//         }
//         $('#cliente_data').DataTable().ajax.reload();
//       })
    
  
//   }

//  function editar(cli_id){
//     $('#lbltitulo').html("Editar Clientes");//colocar el titulo en el h5
//     $.post("controller/clientes.php?op=mostrar",{cli_id:cli_id},function(data){
//         var datos = JSON.parse(data);
//         $("#cli_id").val(datos.cli_id);
//         $("#cli_fono").val(datos.cli_fono);
//         $("#cli_nombre").val(datos.cli_nombre);
//         $("#cli_apellido").val(datos.cli_apellido);
//         $("#cli_fb").val(datos.cli_fb);
//         $("#cli_sexo").val(datos.cli_sexo);
//         $("#cli_correo").val(datos.cli_correo);
//         $("#cli_dni").val(datos.cli_dni);
//         $("#cli_linkGooContac").val(datos.cli_linkGooContac);
//         $("#cli_linkGooFotoAparatos").val(datos.cli_linkGooFotoAparatos);
//         $("#cliente11").val(datos.cliente11);
//         $("#cli_ocupacion").val(datos.cli_ocupacion);
//         $("#cli_memoria").val(datos.cli_memoria);
//         $("#cliente14").val(datos.cliente14);
//         $("#cliente15").val(datos.cliente15);
//         $("#cliente16").val(datos.cliente16);
//         $("#cliente17").val(datos.cliente17);
//         $("#cliente18").val(datos.cliente18);
//         $("#cliente19").val(datos.cliente19);
//         $("#cliente20").val(datos.cliente20);


  
//         $("#mantenimiento").modal('show')//para llamar al modal
//     });
//   }
  
  
  
 

function nuevo(){
    $('#lbltitulo').html("Nuevo ClienteV2");//colocar el titulo en el h5
    // $('#cli_id').val('');//
    $('#cliente_form')[0].reset();
    $('#mantenimiento').modal('show'); //para llamar al modal
  }




  


  