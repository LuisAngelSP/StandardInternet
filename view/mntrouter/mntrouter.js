function init(){
  $('#router_form').on("submit",function(e){

    guardaryeditar(e);
 
});
}
function guardaryeditar(e){
  e.preventDefault();
  var formData = new FormData($("#router_form")[0]);
  $.ajax({
      url: "controller/routes.php?op=guardaryeditar",
      type: "post",
      data: formData,
      contentType: false,
      processData: false,
      success: function(data){
          $('#mantenimiento').modal('hide'); // para que se oculte el modal
          $('#router_data').DataTable().ajax.reload(); //para actualizar la tabla 

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
    var table = $('#router_data').DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "ajax": {
        "url": "controller/routes.php?op=listarActivos",
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
      },
      "drawCallback": function(settings) {
        var api = this.api();
        var rows = api.rows({ page: 'current' }).nodes();
        var startIndex = api.page.info().start;
      
        $(rows).each(function(index) {
          var numero = ((startIndex + index + 1) % 10).toString();
          var valorActual = $(this).find('td').eq(1).html();
          var splitValor = valorActual.split(" - ");
          var nuevoValor = '<span class="numero">' + numero + ' - </span>' + splitValor[0];
      
          $(this).find('td').eq(1).html(nuevoValor);
        });
      }
      
    });
    
  // Función para asignar atajos de teclado para editar cliente
  for (var i = 1; i <= 9; i++) {
    Mousetrap.bind('alt+' + i, (function(i) {
      return function(e) {
        // Verificar si la tecla Alt está presionada
        if (e.altKey && !e.shiftKey) {
          var editarLink = $('.editar-router').eq(i - 1);
  
          if (editarLink.length > 0) {
            editarLink.click();
          }
        }
      };
    })(i));
  }
  
  // Asignar atajo de teclado para el cero
  Mousetrap.bind('alt+0', function(e) {
    // Verificar si la tecla Alt está presionada
    if (e.altKey && !e.shiftKey) {
      var editarLink = $('.editar-router').eq(9);
  
      if (editarLink.length > 0) {
        editarLink.click();
      }
    }
    });
  
  });
  
  function editar(id_route){
    $('#lbltitulo').html("Editar Router");//colocar el titulo en el h5
    $.post("controller/routes.php?op=mostrar",{id_route:id_route},function(data){
        var datos = JSON.parse(data);

        $("#id_route").val(datos.id_route);
        $("#rout_descripcion").val(datos.rout_descripcion);
        $("#id_contrato").val(datos.id_contrato);
        $("#rout_mac").val(datos.rout_mac);
        $("#rout_marca").val(datos.rout_marca);
        $("#rout_modelo").val(datos.rout_modelo);
        $("#rout_serie").val(datos.rout_serie);
        $("#rout_wifi").val(datos.rout_wifi);
        $("#rout_pasword").val(datos.rout_pasword);
        $("#rout_wifidefault").val(datos.rout_wifidefault);
        $("#rout_passdefault").val(datos.rout_passdefault);
        $("#rout_puertos").val(datos.rout_puertos);
        $("#passAdmin").val(datos.passAdmin);
        $("#rout_nota").val(datos.rout_nota);
        $("#usuario").val(datos.usuario);
        $("#password").val(datos.password);
        $("#linkGooFotoAparatos").val(datos.linkGooFotoAparatos);
        $("#prestado").val(datos.prestado);
        $("#router17").val(datos.router17);
        $("#router18").val(datos.router18);
        $("#router19").val(datos.router19);
        $("#router20").val(datos.router20);
  
        $("#mantenimiento").modal('show')//para llamar al modal
    });
  }

  function nuevo(){

    $('#lbltitulo').html("Nuevo Router");
    $('#id_route').val('');//
    $('#router_form')[0].reset();
    $('#mantenimiento').modal('show');

  }

  function desactivar(id_route){
    
    Swal.fire({
        title: 'Desactivar',
        text: "Estas seguro de Desactivar el registro!",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'No',
        confirmButtonText: 'Si'
      }).then((result) => {
        if (result.isConfirmed) {
  
            $.post("controller/routes.php?op=desactivar",{id_route:id_route},function(data){
                $('#router_data').DataTable().ajax.reload(); //para actualizar la tabla 
            });
          Swal.fire(
            'Eliminado!',
            'Eliminado Correctamente',
            'success'
          )
        }
        $('#router_data').DataTable().ajax.reload();
      })
    
  
  }
  function eliminar(id_route){
    
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
  
            $.post("controller/routes.php?op=Eliminar",{id_route:id_route},function(data){
                $('#router_data').DataTable().ajax.reload(); //para actualizar la tabla 
            });
          Swal.fire(
            'Eliminado!',
            'Eliminado Correctamente',
            'success'
          )
        }
        $('#router_data').DataTable().ajax.reload();
      })
    
  
  }
  function activar(id_route){
    
    Swal.fire({
        title: 'Activar',
        text: "Estas seguro de Activar el registro!",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'No',
        confirmButtonText: 'Si'
      }).then((result) => {
        if (result.isConfirmed) {
  
            $.post("controller/routes.php?op=Activar",{id_route:id_route},function(data){
                $('#router_data').DataTable().ajax.reload(); //para actualizar la tabla 
            });
          Swal.fire(
            'Activado!',
            'Activado Correctamente',
            'success'
          )
        }
        $('#router_data').DataTable().ajax.reload();
      })
    
  
  }
  function Libre(id_route){
    
    Swal.fire({
        title: 'Libre',
        text: "Estas seguro de colocar Libre el registro!",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'No',
        confirmButtonText: 'Si'
      }).then((result) => {
        if (result.isConfirmed) {
  
            $.post("controller/routes.php?op=Libre",{id_route:id_route},function(data){
                $('#router_data').DataTable().ajax.reload(); //para actualizar la tabla 
            });
          Swal.fire(
            'Activado!',
            'Activado Correctamente',
            'success'
          )
        }
        $('#router_data').DataTable().ajax.reload();
      })
    
  
  }

  init();

  function listarRouterDesactivados() {
    // Limpiar y destruir la tabla existente
    $('#router_data').DataTable().destroy();
    
    // Crear la nueva tabla con los parámetros deseados
    var table = $('#router_data').DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "ajax": {
        "url": "controller/routes.php?op=listarDesactivados", // Endpoint para obtener solo los clientes activos
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
  
    };
  function listarRouterAll() {
      // Limpiar y destruir la tabla existente
      $('#router_data').DataTable().destroy();
      
      // Crear la nueva tabla con los parámetros deseados
      var table = $('#router_data').DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "ajax": {
          "url": "controller/routes.php?op=listar", // Endpoint para obtener solo los clientes activos
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
        },
        "drawCallback": function(settings) {
          var api = this.api();
          var rows = api.rows({ page: 'current' }).nodes();
          var startIndex = api.page.info().start;
        
          $(rows).each(function(index) {
            var numero = ((startIndex + index + 1) % 10).toString();
            var valorActual = $(this).find('td').eq(1).html();
            var splitValor = valorActual.split(" - ");
            var nuevoValor = '<span class="numero">' + numero + ' - </span>' + splitValor[0];
        
            $(this).find('td').eq(1).html(nuevoValor);
          });
        }
        
      });
      
    // Función para asignar atajos de teclado para editar cliente
    for (var i = 1; i <= 9; i++) {
      Mousetrap.bind('alt+' + i, (function(i) {
        return function(e) {
          // Verificar si la tecla Alt está presionada
          if (e.altKey && !e.shiftKey) {
            var editarLink = $('.editar-router').eq(i - 1);
    
            if (editarLink.length > 0) {
              editarLink.click();
            }
          }
        };
      })(i));
    }
    
    // Asignar atajo de teclado para el cero
    Mousetrap.bind('alt+0', function(e) {
      // Verificar si la tecla Alt está presionada
      if (e.altKey && !e.shiftKey) {
        var editarLink = $('.editar-router').eq(9);
    
        if (editarLink.length > 0) {
          editarLink.click();
        }
      }
      });
    
    };
  function listarRouterLibres() {
        // Limpiar y destruir la tabla existente
        $('#router_data').DataTable().destroy();
        
        // Crear la nueva tabla con los parámetros deseados
        var table = $('#router_data').DataTable({
          "responsive": true,
          "lengthChange": false,
          "autoWidth": false,
          "ajax": {
            "url": "controller/routes.php?op=listarLibres", // Endpoint para obtener solo los clientes activos
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
          },
          "drawCallback": function(settings) {
            var api = this.api();
            var rows = api.rows({ page: 'current' }).nodes();
            var startIndex = api.page.info().start;
          
            $(rows).each(function(index) {
              var numero = ((startIndex + index + 1) % 10).toString();
              var valorActual = $(this).find('td').eq(1).html();
              var splitValor = valorActual.split(" - ");
              var nuevoValor = '<span class="numero">' + numero + ' - </span>' + splitValor[0];
          
              $(this).find('td').eq(1).html(nuevoValor);
            });
          }
          
        });
        
      // Función para asignar atajos de teclado para editar cliente
      for (var i = 1; i <= 9; i++) {
        Mousetrap.bind('alt+' + i, (function(i) {
          return function(e) {
            // Verificar si la tecla Alt está presionada
            if (e.altKey && !e.shiftKey) {
              var editarLink = $('.editar-router').eq(i - 1);
      
              if (editarLink.length > 0) {
                editarLink.click();
              }
            }
          };
        })(i));
      }
      
      // Asignar atajo de teclado para el cero
      Mousetrap.bind('alt+0', function(e) {
        // Verificar si la tecla Alt está presionada
        if (e.altKey && !e.shiftKey) {
          var editarLink = $('.editar-router').eq(9);
      
          if (editarLink.length > 0) {
            editarLink.click();
          }
        }
        });
      
    };

