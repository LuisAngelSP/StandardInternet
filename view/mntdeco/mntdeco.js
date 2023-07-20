function init(){
  $('#deco_form').on("submit",function(e){

    guardaryeditar(e);

});
};
function guardaryeditar(e){
  e.preventDefault();
  var formData = new FormData($("#deco_form")[0]);
  $.ajax({
      url: "controller/decos.php?op=guardaryeditar",
      type: "post",
      data: formData,
      contentType: false,
      processData: false, 
      success: function(data){
          $('#mantenimiento').modal('hide'); // para que se oculte el modal
          $('#deco_data').DataTable().ajax.reload(); //para actualizar la tabla 

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
  var table = $('#deco_data').DataTable({
    "responsive": true,
    "lengthChange": false,
    "autoWidth": false,
    "ajax": {
      "url": "controller/decos.php?op=listarActivos",
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
        var editarLink = $('.editar-deco').eq(i - 1);

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
    var editarLink = $('.editar-deco').eq(9);

    if (editarLink.length > 0) {
      editarLink.click();
    }
  }
});

});


function editar(id_deco){
  $('#lbltitulo').html("Editar Decodificador");//colocar el titulo en el h5
  $.post("controller/decos.php?op=mostrar",{id_deco:id_deco},function(data){
      var datos = JSON.parse(data);
      $("#id_deco").val(datos.id_deco);
      $("#dec_descripcion").val(datos.dec_descripcion);
      $("#id_contrato").val(datos.id_contrato);
      $("#dec_cas_id").val(datos.dec_cas_id);
      $("#dec_proveedor").val(datos.dec_proveedor);
      $("#dec_rayado").val(datos.dec_rayado);
      $("#dec_marca").val(datos.dec_marca);
      $("#dec_modelo").val(datos.dec_modelo);
      $("#dec_serie").val(datos.dec_serie);
      $("#deco_nota").val(datos.deco_nota);
      $("#deco_linkGooFotoAparatos").val(datos.deco_linkGooFotoAparatos);
      $("#datos_rescatados").val(datos.datos_rescatados);
      $("#deco14").val(datos.deco14);
      $("#deco15").val(datos.deco15);
      $("#deco16").val(datos.deco16);
      $("#deco17").val(datos.deco17);
      $("#deco18").val(datos.deco18);
      $("#deco19").val(datos.deco19);
      $("#deco20").val(datos.deco20);

      $("#mantenimiento").modal('show')//para llamar al modal
  });
}


function nuevo(){

  $('#lbltitulo').html("Nuevo Decodificador");
  $('#id_deco').val('');//
  $('#deco_form')[0].reset();
  $('#mantenimiento').modal('show');
}

function Activar(id_deco){
    
  Swal.fire({
      title: 'Activar',
      text: "Estas seguro de activar el registro!",
      icon: 'success',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'No',
      confirmButtonText: 'Si'
    }).then((result) => {
      if (result.isConfirmed) {

          $.post("controller/decos.php?op=Activar",{id_deco:id_deco},function(data){
              $('#deco_data').DataTable().ajax.reload(); //para actualizar la tabla 
          });
        Swal.fire(
          'Activado!',
          'Activado Correctamente',
          'success'
        )
      }
      $('#deco_data').DataTable().ajax.reload();
    })
  

}
function Desactivar(id_deco){
    
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

          $.post("controller/decos.php?op=Desactivar",{id_deco:id_deco},function(data){
              $('#deco_data').DataTable().ajax.reload(); //para actualizar la tabla 
          });
        Swal.fire(
          'Desactivado!',
          'Desactivado Correctamente',
          'success'
        )
      }
      $('#deco_data').DataTable().ajax.reload();
    })
  

}
function Libre(id_deco){
    
  Swal.fire({
      title: 'Libre',
      text: "Estas seguro de colocarcolocar Libre el registro!",
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'No',
      confirmButtonText: 'Si'
    }).then((result) => {
      if (result.isConfirmed) {

          $.post("controller/decos.php?op=Libre",{id_deco:id_deco},function(data){
              $('#deco_data').DataTable().ajax.reload(); //para actualizar la tabla 
          });
          Swal.fire(
            'Activado!',
            'Activado Correctamente',
            'success'
          )
      }
      $('#deco_data').DataTable().ajax.reload();
    })
  

}
function eliminar(id_deco){
    
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

          $.post("controller/decos.php?op=Eliminar",{id_deco:id_deco},function(data){
              $('#deco_data').DataTable().ajax.reload(); //para actualizar la tabla 
          });
        Swal.fire(
          'Eliminado!',
          'Eliminado Correctamente',
          'success'
        )
      }
      $('#deco_data').DataTable().ajax.reload();
    })
  

}


init();

function listarDecosDesactivados() {
  // Limpiar y destruir la tabla existente
  $('#deco_data').DataTable().destroy();
  
  // Crear la nueva tabla con los parámetros deseados
  var table = $('#deco_data').DataTable({
    "responsive": true,
    "lengthChange": false,
    "autoWidth": false,
    "ajax": {
      "url": "controller/decos.php?op=listarDesactivados", // Endpoint para obtener solo los clientes activos
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

function listarDecosLibres() {
    // Limpiar y destruir la tabla existente
    $('#deco_data').DataTable().destroy();
    
    // Crear la nueva tabla con los parámetros deseados
    var table = $('#deco_data').DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "ajax": {
        "url": "controller/decos.php?op=listarlibres", // Endpoint para obtener solo los clientes activos
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
      },"drawCallback": function(settings) {
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
          var editarLink = $('.editar-deco').eq(i - 1);
  
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
      var editarLink = $('.editar-deco').eq(9);
  
      if (editarLink.length > 0) {
        editarLink.click();
      }
    }
    });
  
  };

function listarDecosALL() {
      // Limpiar y destruir la tabla existente
      $('#deco_data').DataTable().destroy();
      
      // Crear la nueva tabla con los parámetros deseados
      var table = $('#deco_data').DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "ajax": {
          "url": "controller/decos.php?op=listar", // Endpoint para obtener solo los clientes activos
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
            var editarLink = $('.editar-deco').eq(i - 1);
    
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
        var editarLink = $('.editar-deco').eq(9);
    
        if (editarLink.length > 0) {
          editarLink.click();
        }
      }
      });
    
  };