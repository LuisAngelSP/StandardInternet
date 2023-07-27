 
  $(document).ready(function() {
    var table = $('#compromiso_data').DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "ajax": {
            "url": "controller/compromiso.php?op=listar_compromiso",
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
        "order": [], // Aquí se indica que no se debe permitir ordenar las columnas, ya que los datos vienen ordenados del procedimiento almacenado.
        "dom": 'Bfrtip',
        "buttons": [
          'excel', 'pdf', 'colvis'
        ],
        "scrollX": true,
        "fixedHeader": {
          "header": true,
          "footer": false
        },
        "rowCallback": function(row, data, index) {
          var diferencia = data[data.length - 1];
          var celdas = $(row).children('td'); // Obtener las celdas de la fila
          
          if (diferencia < 0) {
            $(celdas).addClass('rojo'); // Fecha de compromiso ya pasada
          } else if (diferencia == 0) {
            $(celdas).addClass('naranja'); // Fecha de compromiso hoy
          } else if (diferencia == 1) {
            $(celdas).addClass('naranja'); // Fecha de compromiso de 1 dia
          } else {
            $(celdas).addClass('verde'); // Falta más de 2 días para el compromiso
          }
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
            var nuevoValor = valorActual;
        
            if (splitValor.length > 1) {
              nuevoValor = numero + " - " + splitValor[0] + " - " + splitValor[1];
            } else {
              nuevoValor = numero + " - " + valorActual;
            }
        
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
          var editarLink = $('.compromiso_').eq(i - 1);
  
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
      var editarLink = $('.compromiso_').eq(9);
  
      if (editarLink.length > 0) {
        editarLink.click();
      }
    }
  });
  }); 
  
  
        

function listarCompromisoAll() {
  // Limpiar y destruir la tabla existente
  $('#compromiso_data').DataTable().destroy();
  
  // Crear la nueva tabla con los parámetros deseados
  var table = $('#compromiso_data').DataTable({
    "responsive": true,
    "lengthChange": false,
    "autoWidth": false,
    "ajax": {
      "url": "controller/compromiso.php?op=listar", // Endpoint para obtener solo los clientes activos
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
    "order": [], // Aquí se indica que no se debe permitir ordenar las columnas, ya que los datos vienen ordenados del procedimiento almacenado.
    "dom": 'Bfrtip',
    "buttons": [
      'excel', 'pdf', 'colvis'
    ],
    "scrollX": true,
    "fixedHeader": {
      "header": true,
      "footer": false
    },
    "rowCallback": function(row, data, index) {
      var diferencia = data[data.length - 1];
      var celdas = $(row).children('td'); // Obtener las celdas de la fila
      
      if (diferencia < 0) {
        $(celdas).addClass('rojo'); // Fecha de compromiso ya pasada
      } else if (diferencia == 0) {
        $(celdas).addClass('naranja'); // Fecha de compromiso hoy
      } else {
        $(celdas).addClass('verde'); // Falta más de 2 días para el compromiso
      }
    }
  });

};

function historial_compromiso() {
  // Limpiar y destruir la tabla existente
  $('#compromiso_data').DataTable().destroy();
  
  $('#fech_cumpl').html("fech_cumplimiento")
  // Crear la nueva tabla con los parámetros deseados
  var table = $('#compromiso_data').DataTable({
    "responsive": true,
    "lengthChange": false,
    "autoWidth": false,
    "ajax": {
      "url": "controller/compromiso.php?op=historial_compromiso", // Endpoint para obtener solo los clientes activos
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
    "order": [], // Aquí se indica que no se debe permitir ordenar las columnas, ya que los datos vienen ordenados del procedimiento almacenado.
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



};

  function init(){
    $('#compromiso_form').on("submit",function(e){
  
      guardaryeditar(e);
  
  });
  }

  function guardaryeditar(e){
    e.preventDefault();
    var formData = new FormData($("#compromiso_form")[0]);
    $.ajax({
        url: "controller/compromiso.php?op=guardaryeditar",
        type: "post",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data){
            $('#compromiso').modal('hide'); // para que se oculte el modal
            $('#compromiso_data').DataTable().ajax.reload(); //para actualizar la tabla 
  
            Swal.fire({
                title: 'Correcto!',
                text: "Se Actualizo Correctamente!",
                icon: 'success',
                confirmButtonText: 'Aceptar'
  
            });
    }
  })
  }

  function editar(id_compromiso) {

    $.post("controller/compromiso.php?op=mostrar", { id_compromiso: id_compromiso }, function(data) {
      var datos = JSON.parse(data);
      $("#id_compromiso").val(datos.id_compromiso);
      $("#id_cliente").val(datos.id_cliente);
      
      // Actualizar el contenido del elemento con el nombre del cliente
      $("#cliente").text("Editar Compromiso de " + datos.cliente);
  
      var comp_fech = datos.comp_fech.substring(0, 16); // Obtener los primeros 16 caracteres de la fecha y hora
      $("#comp_fech").val(comp_fech);
      
      $("#comp_descrip").val(datos.comp_descrip);
      $("#comp_tipo").val(datos.comp_tipo);
  
      $("#compromiso").modal('show'); // Para llamar al modal
    });
  }


  
  function Realizado(id_compromiso){
    
    Swal.fire({
        title: 'Compromiso',
        text: "Estas seguro que el Compromiso se Realizo!",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'No',
        confirmButtonText: 'Si'
      }).then((result) => {
        if (result.isConfirmed) {
  
            $.post("controller/compromiso.php?op=Realizado",{id_compromiso:id_compromiso},function(data){
                $('#compromiso_data').DataTable().ajax.reload(); //para actualizar la tabla 
            });
          Swal.fire(
            'Compromiso!',
            'compromiso saldado',
            'success'
          )
        }
        $('#compromiso_data').DataTable().ajax.reload(); 
      })
    
  
  }


  function eliminarCompromiso(id_compromiso) {
    Swal.fire({
        title: 'Eliminar Compromiso',
        text: '¿Estás seguro de que quieres eliminar este compromiso?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Eliminar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.post("controller/compromiso.php?op=eliminar", { id_compromiso: id_compromiso }, function(data) {
                $('#compromiso_data').DataTable().ajax.reload();
            });
            Swal.fire(
                'Compromiso Eliminado',
                'El compromiso ha sido eliminado.',
                'success'
            )
        }
    });
}

  init();
