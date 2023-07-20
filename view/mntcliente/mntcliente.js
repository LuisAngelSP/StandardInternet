cli_id = $("#cli_id").val();
function init(){
  $('#cliente_form').on("submit",function(e){ 

    guardaryeditar(e);

});
}; 

/**************************** check box ce Pago ************************************** */




/***************************************** */

function guardaryeditar(e){
  e.preventDefault();
  var formData = new FormData($("#cliente_form")[0]);
  $.ajax({
      url: "controller/clientes.php?op=guardaryeditar",
      type: "post",
      data: formData,
      contentType: false,
      processData: false,
      success: function(data){
          $('#mantenimiento').modal('hide'); // para que se oculte el modal
          $('#cliente_data').DataTable().ajax.reload(); //para actualizar la tabla 

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
  var clientesSeleccionados = [];
    var table = $('#cliente_data').DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "ajax": {
        "url": "controller/clientes.php?op=listarActivos",
        "type": "POST" 
      },

      "language": {
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sSearch": "Buscar:",// cada vez que realice una busqueda me llame al createdRow
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
          var valorActual = $(this).find('td').eq(2).html();
          var splitValor = valorActual.split(" - ");
          var nuevoValor = valorActual;
  
          if (splitValor.length > 1) {
            nuevoValor = splitValor[0] + " - " + numero;
          } else {
            nuevoValor = valorActual + " - " + numero;
          }
  
          $(this).find('td').eq(2).html(nuevoValor);
        });
      }
    });
  


// Función para asignar atajos de teclado para editar cliente
for (var i = 1; i <= 9; i++) {
  Mousetrap.bind('alt+' + i, (function(i) {
    return function(e) {
      // Verificar si la tecla Alt está presionada
      if (e.altKey && !e.shiftKey) {
        var editarLink = $('.editar-cliente').eq(i - 1);

        if (editarLink.length > 0) {
          editarLink.click();
        }
      }
    };
  })(i));
}

// Función para asignar atajos de teclado para abrir la casa
for (var i = 1; i <= 9; i++) {
  Mousetrap.bind('shift+h+' + i, (function(i) {
    return function(e) {
      // Verificar si la tecla Shift está presionada
      if (e.shiftKey) {
        var editarLink = $('.selec-casa').eq(i - 1);
        if (editarLink.length > 0) {
          editarLink.click();
        }
      }
    };
  })(i));
}

// Asignar atajo de teclado para el cero en abrir la casa
Mousetrap.bind('shift+h+0', function(e) {
  // Verificar si la tecla Shift está presionada
  if (e.shiftKey) {
    var editarLink = $('.selec-casa').eq(9);
    if (editarLink.length > 0) {
      editarLink.click();
    }
  }
});


// Asignar atajo de teclado para el cero
Mousetrap.bind('alt+0', function(e) {
  // Verificar si la tecla Alt está presionada
  if (e.altKey && !e.shiftKey) {
    var editarLink = $('.editar-cliente').eq(9);

    if (editarLink.length > 0) {
      editarLink.click();
    }
  }
});

// Manejar el evento de clic en los checkboxes
$(document).on('click', '.form-check-input', function() {
  var clientId = $(this).data('id');
  if ($(this).prop('checked')) {
    // Agregar ID a la lista si el checkbox está marcado
    clientesSeleccionados.push(clientId);
  } else {
    // Eliminar ID de la lista si el checkbox está desmarcado
    var index = clientesSeleccionados.indexOf(clientId);
    if (index !== -1) {
      clientesSeleccionados.splice(index, 1);
    }
  }
});

$(document).on('click', '#btnGenerarPago', function() {
  var url = 'view/mntpago/index.php';
  var contentId = 'content-wp';

  // Construir la URL con los clientes seleccionados como parámetro
  var urlConParametros = url + '?clientes=' + JSON.stringify(clientesSeleccionados);

  // Llamar a CargaPlantilla() con la URL modificada
  CargaPlantilla(urlConParametros, contentId);
});
});








$(document).ready(function() {
  $.post("controller/mensaje.php?op=combo", { cli_id: cli_id }, function (data, status) {
    $('#id_mensaje').html(data);
    // Inicializar el plugin Select2 después de actualizar el contenido del elemento
  });
});
  
  function eliminar(cli_id){
    
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
  
            $.post("controller/clientes.php?op=eliminar",{cli_id:cli_id},function(data){
                $('#cliente_data').DataTable().ajax.reload(); //para actualizar la tabla 
            });
          Swal.fire(
            'Eliminado!',
            'Eliminado Correctamente',
            'success'
          )
        }
        $('#cliente_data').DataTable().ajax.reload();
      })
    
  
  }
  function Desactivar(cli_id){
    
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
  
            $.post("controller/clientes.php?op=desactivar",{cli_id:cli_id},function(data){
                $('#cliente_data').DataTable().ajax.reload(); //para actualizar la tabla 
            });
          Swal.fire(
            'Desactivado!',
            'Desactivado Correctamente',
            'success'
          )
        }
        $('#cliente_data').DataTable().ajax.reload();
      })
    
  
  }

  function Activar(cli_id){
    
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
  
            $.post("controller/clientes.php?op=activar",{cli_id:cli_id},function(data){
                $('#cliente_data').DataTable().ajax.reload(); //para actualizar la tabla 
            });
          Swal.fire(
            'Activado!',
            'Activado Correctamente',
            'success'
          )
        }
        $('#cliente_data').DataTable().ajax.reload();
      })
    
  
  }
  function editar(cli_id) {
      $('#lbltitulo').html("Editar Clientes"); // Colocar el título en el h5
      $('.modo').show();
    $.post("controller/clientes.php?op=mostrar", { cli_id: cli_id }, function(data) {
        var datos = JSON.parse(data);
        $("#cli_id").val(datos.cli_id);
        $("#cli_fono").val(datos.cli_fono);
        $("#cli_nombre").val(datos.cli_nombre);
        $("#cli_apellido").val(datos.cli_apellido);
        $("#cli_fb").val(datos.cli_fb);
        $("#cli_sexo").val(datos.cli_sexo);
        $("#cli_correo").val(datos.cli_correo);
        $("#cli_dni").val(datos.cli_dni);
        $("#cli_linkGooContac").val(datos.cli_linkGooContac);
        $("#cli_linkGooFotoAparatos").val(datos.cli_linkGooFotoAparatos);
        $("#cli_direccion").val(datos.cli_direccion);
        $("#cliente12").val(datos.cliente12);
        $("#cliente13").val(datos.cliente13);
        $("#cliente14").val(datos.cliente14);
        $("#cliente15").val(datos.cliente15);
        $("#cliente16").val(datos.cliente16);
        $("#cliente17").val(datos.cliente17);
        $("#cliente18").val(datos.cliente18);
        $("#cliente19").val(datos.cliente19);
        $("#cliente20").val(datos.cliente20);


        $("#oculto").hide();
        $("#oculto1").hide();
        $("#mantenimiento").modal('show'); // Para llamar al modal
    });
  }
  function nuevo(){
    $('#lbltitulo').html("Nuevo Cliente");//colocar el titulo en el h5
    $('.modo').hide();
    $('#cli_id').val('');//
    $('#cliente_form')[0].reset();
    $('#mantenimiento').modal('show'); //para llamar al modal
    $("#oculto").hide();
    $("#oculto1").hide();
  }

  init(); 

/************* MENSAJE**************************** */
$(document).ready(function() {
  $("#boton-mensaje").click(function() {
    $("#oculto").show();
    $("#oculto1").hide();
    var id_mensaje = $("#id_mensaje").val();

    $.ajax({
      url: "controller/mensaje.php?op=mensaje",
      method: "POST",
      data: { action: "mensaje", id_mensaje: id_mensaje },
      dataType: "json",
      success: function(mensajeResponse) {
        var contenido = mensajeResponse.contenido;

        contenido = contenido.replace(/{cliente}/g, $("#cli_nombre").val());
        contenido = contenido.replace(/{celular}/g, $("#cli_fono").val());
        contenido = contenido.replace(/{dni}/g, $("#cli_dni").val());
        contenido = contenido.replace(/{sexo}/g, $("#cli_sexo").val());
        contenido = contenido.replace(/{correo}/g, $("#cli_correo").val());
        
        $("#mensaje-content").summernote('code', contenido);

        // Verificar si ya existe un botón de copiar
        if ($("#boton-copiar").length === 0) {
          // Crear el botón "Copiar" solo si no existe
          var botonCopiar = $('<a id="boton-copiar" type="button" class="btn btn-primary">Copiar</a>');
          var espacio = $('<span class="espacio"> || </span>'); // Agrega un elemento span vacío como espacio
          var botonWhatsapp = $('<a id="boton-whatsapp" target="_blank" class="btn btn-success"><i class="fab fa-whatsapp"></i> Whatsapp</a>');
          
          botonCopiar.click(function() {
            var mensajeHTML = $("#mensaje-content").summernote('code'); // Obtener el contenido HTML del Summernote
          
            // Reemplazar las etiquetas <div> por saltos de línea
            mensajeHTML = mensajeHTML.replace(/<\/div>/g, '\n');
            mensajeHTML = mensajeHTML.replace(/<div>/g, '');
            mensajeHTML = mensajeHTML.replace(/<\/br>/g, '\n');
            mensajeHTML = mensajeHTML.replace(/<br>/g, '\n');
            mensajeHTML = mensajeHTML.replace(/&nbsp;/g, ' ');
            mensajeHTML = mensajeHTML.replace(/<\/p>/g, '\n');
            mensajeHTML = mensajeHTML.replace(/<p>/g, '');

            // Eliminar <div style="text-align: center;">
            mensajeHTML = mensajeHTML.replace(/<div style="text-align: center;">/g, '');
          
            copiarTextoAlPortapapeles(mensajeHTML);
          });
          
          // Agregar el botón "Copiar", el espacio y el botón "Whatsapp" debajo del div "mensaje-content"
          $("#mensaje-content").after(botonCopiar, espacio, botonWhatsapp);

        }
      },
      error: function(xhr, status, error) {
        Swal.fire({
          title: "Error",
          text: "Ocurrió un error en la petición AJAX: " + error,
          icon: "error"
        });
      }
    });
  });

  // Función para copiar texto al portapapeles
  function copiarTextoAlPortapapeles(texto) {
    var elementoTemporal = $('<textarea>');
    elementoTemporal.val(texto).css('opacity', '0').appendTo($('body'));
    elementoTemporal.select();
    document.execCommand('copy');
    elementoTemporal.remove();

    Swal.fire({
      title: "Texto copiado",
      text: "El contenido ha sido copiado al portapapeles.",
      icon: "success"
    });
  }
});
/*************ALL MENSAJE**************************** */

$(document).ready(function() {
  $("#all-mensaje").click(function() {
    $("#oculto1").show();
    $("#oculto").hide();
    $.ajax({
      url: "controller/mensaje.php?op=ALLmensaje",
      method: "POST",
      data: { action: "mensaje" },
      dataType: "json",
      success: function(mensajeResponse) {
        var contenidos = mensajeResponse.contenidos;

        // Limpiar el contenido anterior
        $("#mensaje-content1").empty();

        // Crear un Summernote para cada mensaje recibido
        contenidos.forEach(function(contenido) {
          contenido = contenido.replace(/{cliente}/g, $("#cli_nombre").val());
          contenido = contenido.replace(/{celular}/g, $("#cli_fono").val());
          contenido = contenido.replace(/{dni}/g, $("#cli_dni").val());
          contenido = contenido.replace(/{sexo}/g, $("#cli_sexo").val());
          contenido = contenido.replace(/{correo}/g, $("#cli_correo").val());

          var summernoteInstance = $("<textarea>").addClass("mensaje-summernote").html(contenido);
          $("#mensaje-content1").append(summernoteInstance);
          summernoteInstance.summernote('code', contenido);
        });
        console.log(contenidos);
      },

      error: function(xhr, status, error) {
        Swal.fire({
          title: "Error",
          text: "Ocurrió un error en la petición AJAX: " + error,
          icon: "error"
        });
      }
    });
  });
});
/*****************Listado de clientes por estados*************** */
function ListarAllClientes() {

  // Limpiar y destruir la tabla existente
  $('#cliente_data').DataTable().destroy();
  
  // Crear la nueva tabla con los parámetros deseados
  var table = $('#cliente_data').DataTable({
    "responsive": true,
    "lengthChange": false,
    "Width": true ,
    "ajax": {
      "url": "controller/clientes.php?op=listar", // Endpoint para obtener solo los clientes activos
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
        var valorActual = $(this).find('td').eq(2).html();
        var splitValor = valorActual.split(" - ");
        var nuevoValor = valorActual;

        if (splitValor.length > 1) {
          nuevoValor = splitValor[0] + " - " + numero;
        } else {
          nuevoValor = valorActual + " - " + numero;
        }

        $(this).find('td').eq(2).html(nuevoValor);
      });
    }
  });




// Función para asignar atajos de teclado para editar cliente
for (var i = 1; i <= 9; i++) {
Mousetrap.bind('alt+' + i, (function(i) {
  return function(e) {
    // Verificar si la tecla Alt está presionada
    if (e.altKey && !e.shiftKey) {
      var editarLink = $('.editar-cliente').eq(i - 1);

      if (editarLink.length > 0) {
        editarLink.click();
      }
    }
  };
})(i));
}

// Función para asignar atajos de teclado para abrir la casa
for (var i = 1; i <= 9; i++) {
Mousetrap.bind('shift+h+' + i, (function(i) {
  return function(e) {
    // Verificar si la tecla Shift está presionada
    if (e.shiftKey) {
      var editarLink = $('.selec-casa').eq(i - 1);
      if (editarLink.length > 0) {
        editarLink.click();
      }
    }
  };
})(i));
}

// Asignar atajo de teclado para el cero en abrir la casa
Mousetrap.bind('shift+h+0', function(e) {
// Verificar si la tecla Shift está presionada
if (e.shiftKey) {
  var editarLink = $('.selec-casa').eq(9);
  if (editarLink.length > 0) {
    editarLink.click();
  }
}
});


// Asignar atajo de teclado para el cero
Mousetrap.bind('alt+0', function(e) {
// Verificar si la tecla Alt está presionada
if (e.altKey && !e.shiftKey) {
  var editarLink = $('.editar-cliente').eq(9);

  if (editarLink.length > 0) {
    editarLink.click();
  }
}
});




  };

function listarClientesDesactivados() {
    // Limpiar y destruir la tabla existente
    $('#cliente_data').DataTable().destroy();
    
    // Crear la nueva tabla con los parámetros deseados
    var table = $('#cliente_data').DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "ajax": {
        "url": "controller/clientes.php?op=listarDesactivados", // Endpoint para obtener solo los clientes activos
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
          var valorActual = $(this).find('td').eq(2).html();
          var splitValor = valorActual.split(" - ");
          var nuevoValor = valorActual;
  
          if (splitValor.length > 1) {
            nuevoValor = splitValor[0] + " - " + numero;
          } else {
            nuevoValor = valorActual + " - " + numero;
          }
  
          $(this).find('td').eq(2).html(nuevoValor);
        });
      }

    });
  
  };

/*************COMPROMISO **************************** */

function CompromisoNuevo() {
    // Obtener la fecha actual
// Obtener la fecha actual
var fechaActual = new Date();

// Ajustar la diferencia horaria
var ajusteHorario = fechaActual.getTimezoneOffset() * 60000;
var fechaAjustada = new Date(fechaActual - ajusteHorario);

// Formatear la fecha en el formato adecuado para el campo de fecha
var formatoFecha = fechaAjustada.toISOString().slice(0, 16);



  $('#data_form')[0].reset();
  $('#lbltitulo1').html("Compromis"); // Colocar el título en el h5
  $('#id_cliente').val($("#cli_id").val()); // Asignar el valor de cli_id a id_cliente
  $('#comp_fech').val(formatoFecha);
  $('#compromiso').modal('show'); // Para abrir el modal
}

  document.getElementById("cerrarCompromiso").addEventListener("click", function() {
    $('#compromiso').modal('hide');
  });
  
  document.getElementById("compromisoClose").addEventListener("click", function() {
    $('#compromiso').modal('hide');
});




  function InsertCompromiso(){
    var formData = new FormData($("#data_form")[0]);
    $.ajax({
        url: "controller/compromiso.php?op=guardaryeditar",
        type: "post",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data){
            $('#compromiso').modal('hide'); // para que se oculte el modal
  
            Swal.fire({
                title: 'Correcto!',
                text: "Se Genero el Comprimoso Correctamente!",
                icon: 'success',
                confirmButtonText: 'Aceptar'
  
            });
    }
  });
  }


  function consultarDNI(){
    dni = $('#cli_dni').val();

    // Verificar si el DNI tiene 8 dígitos
    if (dni.length !== 8) {
        alert("El DNI debe tener 8 dígitos.");
        return; // Detener la ejecución si el DNI no tiene 8 dígitos
    }

    $.ajax({
        url: "controller/api/consultarDNI.php",
        type: "POST",
        cache: false,
        data: { dni: dni },
        dataType: "json",
        success: function(data) {
          if (data.numeroDocumento == dni) {
            $("#cli_apellido").val(data.apellidoPaterno + ' ' + data.apellidoMaterno);
            $("#cli_nombre").val(data.nombres);
          } else {
                alert("El DNI no existe.");
            }
        },
        error: function() {
            alert("Error en la solicitud.");
        }
    });
  }
  