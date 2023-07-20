var cli_id = $('#cli_id').val();
var nombre = $('#nombre').val();
var casa_nombre = $('#casa_nombre').val();
var id_casas = $('#id_casas').val();


/*** **************** LISTAR SERVICIO     ************************* */

$(document).ready(function() {
  console.log (cli_id);
  console.log (nombre);
  console.log (casa_nombre);
  console.log (id_casas);

  table = $('#cliente_servicio').DataTable({
    "responsive": true,
    "lengthChange": false,
    "autoWidth": false,
    ajax: {
      url: 'controller/form/servicio_cliente.php?op=listar_x_cliente_casa',
      type: "post",
      dataType: "json",
      data: {
        cli_id: cli_id ,
        casa_nombre: casa_nombre
      },
      error: function(e) {
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
    "drawCallback": function(settings) {
      var api = this.api();
      var rows = api.rows({ page: 'current' }).nodes();
      var startIndex = api.page.info().start;
    
      $(rows).each(function(index) {
        var numero = (startIndex + index).toString().padStart(1, '0');
        var valorActual = $(this).find('td').eq(1).html();
        var splitValor = valorActual.split(" - ");
        var nuevoValor = numero + " - " + (splitValor.length > 1 ? splitValor[1] : valorActual);
  
        $(this).find('td').eq(1).html(nuevoValor);
  
        
      });
    }
  }); 
  for (var i = 0; i < 10; i++) {
    Mousetrap.bind('alt+' + i, (function(i) {
      return function(e) {
        // Verificar si la tecla Alt está presionada
        if (e.altKey && !e.shiftKey) {
          var editarLink = $('.editar-servicio').eq(i);
  
          if (editarLink.length > 0) {
            editarLink.click();
          }
        }
      };
    })(i));
  }
});

/*** ****************  NUEVO SERVICIO     ************************* */
function servicioxcasa() {
  $('#lbltitulo1').html("Agregar un nuevo servicio");
  $('#inst_id').val('');
  $('#serv_id').val('').trigger('change'); // Establecer el valor en blanco y disparar el evento change
  $('#instalacion_form')[0].reset();
  $('#instalacion_form_1')[0].reset();
  $('#instalacion_form_2')[0].reset();
  $('#instalacion_form_3')[0].reset();
  $('#mantenimiento_servicio').modal('show');
  $("#oculto").hide();
  $("#oculto1").hide();
  
  // Establecer valores en blanco en el formulario de deco_mantenimiento
  $('#deco_id').val('').trigger('change'); // Establecer el valor en blanco y disparar el evento change
  $('#cliente_deco').val('');
  $('#dec_estado').html('');
  $('#historyDeco tbody').html('<tr><td></td><td></td><td></td><td></td></tr>');


  $('#rout_id').val('').trigger('change'); // Establecer el valor en blanco y disparar el evento change
  $('#cliente_route').val('');
  $('#rout_estado').html('');
  $('#historyRouter tbody').html('<tr><td></td><td></td><td></td><td></td></tr>');


  $('#mod_id').val('').trigger('change'); // Establecer el valor en blanco y disparar el evento change
  $('#cliente_modem').val('');
  $('#mod_estado').html('');
  $('#historyModem tbody').html('<tr><td></td><td></td><td></td><td></td></tr>');
}

/*** ****************  COMBO DE SERVICIOS     ************************* */

  $(document).ready(function(){

    function generarCamposServicio() {
      var serv_id = $("#serv_id").val();
      $.ajax({
        url: "http://localhost/Standar_Internet/controller/form/servicio_form.php",
        type: "POST",
        data: {serv_id: serv_id},
        success: function(data){
          $("#campos_servicio").html(data);
        }
      });
    }
  
    $("#serv_id").change(generarCamposServicio);
  
        // resetear el modal al cerrarse
        $('#mantenimiento').on('hidden.bs.modal', function () {
          $("#campos_servicio").empty();
      });
    
  });
  function updateCamposServicio(serv_id, datos) {
    $.ajax({
      url: "controller/form/servicio_form.php",
      type: "POST",
      data: { serv_id: serv_id },
      success: function (data) {
        $("#campos_servicio").html(data);
        // Recorrer los datos y establecer los valores de los campos correspondientes
        $.each(datos, function (key, value) {
          $("#" + key).val(value);
        });
      },
    });
  }

  function editar(inst_id){
    $('#lbltitulo1').html("Editar Servicio de instalacion");
    $.post("controller/nuevaInstalacion.php?op=mostrar",{inst_id:inst_id},function(data){
        var datos = JSON.parse(data);
        updateCamposServicio(datos.serv_id, datos);
        $("#inst_id").val(datos.inst_id);
        $("#cli_id").val(datos.cli_id);
        $("#serv_id").val(datos.serv_id);
        $("#inst_precio").val(datos.inst_precio);
        $("#inst_observacion").val(datos.inst_observacion);
        $("#cantidad_metros_cable").val(datos.cantidad_metros_cable);
        $("#inst_fech").val(datos.inst_fech);
        $("#mod_id").val(datos.mod_id);
        $("#rout_id").val(datos.rout_id);
        $("#deco_id").val(datos.deco_id);
        $("#import_servicio").val(datos.import_servicio);
        $("#lugar_conexion").val(datos.lugar_conexion);
        $("#id_casas").val(datos.id_casas);
        $("#cuenta_usuario").val(datos.cuenta_usuario);
        $("#contra_usuario").val(datos.contra_usuario);
        $("#perfil_usuario").val(datos.perfil_usuario);
        $("#tipo_conexion").val(datos.tipo_conexion);
        $("#velocidad_MB").val(datos.velocidad_MB);
        $("#instalacion17").val(datos.instalacion17);
        $("#instalacion18").val(datos.instalacion18);
        $("#instalacion19").val(datos.instalacion19);
        $("#instalacion20").val(datos.instalacion20);
        $("#instalacion21").val(datos.instalacion21);
        $("#instalacion22").val(datos.instalacion22);
        $("#instalacion23").val(datos.instalacion23);
        $("#instalacion24").val(datos.instalacion24);
        $("#instalacion25").val(datos.instalacion25);

        $("#oculto").hide();
        $("#oculto1").hide();
        $("#mantenimiento_servicio").modal('show');
    });
  }
  
/*** ****************  GUARDAR Y EDITAR     ************************* */

function init(){
  $('#instalacion_form').on("submit",function(e){

    guardaryeditar(e);
 
});
}



function guardaryeditar(e) {
  e.preventDefault();

  var formData = new FormData();

  // Obtener los datos de los formularios
  var form1Data = new FormData($("#instalacion_form")[0]);
  var form2Data = new FormData($("#instalacion_form_1")[0]);
  var form3Data = new FormData($("#instalacion_form_2")[0]);
  var form4Data = new FormData($("#instalacion_form_3")[0]);

  for (var pair of form1Data.entries()) {
    formData.append(pair[0], pair[1]);
  }

  for (var pair of form2Data.entries()) {
    formData.append(pair[0], pair[1]);
  }

  for (var pair of form3Data.entries()) {
    formData.append(pair[0], pair[1]);
  }

  for (var pair of form4Data.entries()) {
    formData.append(pair[0], pair[1]);
  }

  for (var pair of formData.entries()) {
    console.log(pair[0] + ": " + pair[1]);
  }

  // Obtener los valores seleccionados
  var deco_id = $("#deco_id").val()[0];
  var rout_id = $("#rout_id").val()[0];
  var mod_id = $("#mod_id").val()[0];

  var decoPromise = new Promise(function(resolve, reject) {
    if (deco_id) {
      $.post("controller/decos.php?op=verificarDeco", { deco_id: deco_id }, function(data) {
        var datos = JSON.parse(data);
        var cliente_deco = datos.cliente_deco;
        var nombre = $('#nombre').val();
        if (cliente_deco && cliente_deco !== nombre) {
          reject('El decodificador seleccionado ya está asignado al cliente: ' + cliente_deco);
        } else {
          resolve();
        }
      });
    } else {
      resolve();
    }
  });

  var routPromise = new Promise(function(resolve, reject) {
    if (rout_id) {
      $.post("controller/routes.php?op=verificarRouter", { rout_id: rout_id }, function(routerData) {
        var routerDatos = JSON.parse(routerData);
        var cliente_route = routerDatos.cliente_route;
        var nombre = $('#nombre').val();
        if (cliente_route  && cliente_route !== nombre) {
          reject('El router seleccionado ya está asignado al cliente: ' + cliente_route);
        } else {
          resolve();
        }
      });
    } else {
      resolve();
    }
  });

  var modPromise = new Promise(function(resolve, reject) {
    if (mod_id) {
      $.post("controller/modems.php?op=verificarModem", { mod_id: mod_id }, function(modemData) {
        var modemDatos = JSON.parse(modemData);
        var cliente_modem = modemDatos.cliente_modem;
        var nombre = $('#nombre').val();
        if (cliente_modem  && cliente_modem !== nombre) {
          reject('El módem seleccionado ya está asignado al cliente: ' + cliente_modem);
        } else {
          resolve();
        }
      });
    } else {
      resolve();
    }
  });

  Promise.all([decoPromise, routPromise, modPromise])
    .then(function() {
      // Realizar el guardado y envío del formulario
      $.ajax({
        url: "controller/nuevaInstalacion.php?op=guardaryeditar",
        type: "post",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
          actualizarDeco();
          actualizarModem();
          actualizarRouter();

          $('#mantenimiento_servicio').modal('hide');
          $('#cliente_servicio').DataTable().ajax.reload();

          Swal.fire({
            title: 'Correcto!',
            text: "Se Registró Correctamente!",
            icon: 'success',
            confirmButtonText: 'Aceptar'
          });
        }
      });
    })
    .catch(function(errorMessage) {
      // Mostrar mensaje de ocupado
      Swal.fire({
        title: 'Dispositivo Ocupado',
        text: errorMessage,
        icon: 'warning',
        confirmButtonText: 'Aceptar'
      });
    });
}

function liberar() {
  // Obtener los valores seleccionados
  var deco_id = $("#deco_id").val()[0];
  var rout_id = $("#rout_id").val()[0];
  var mod_id = $("#mod_id").val()[0];

  // Liberar el decodificador
  if (deco_id) {
    $.post("controller/decos.php?op=liberarDeco", { deco_id: deco_id }, function(data) {
      $("#deco_mantenimiento").modal("hide"); // Ocultar el modal

      $("#deco_mantenimiento").modal("show");
      // Actualizar el estado del decodificador a libre
      Swal.fire({
        title: 'Decodificador liberado',
        text: '',
        icon: 'success',
        confirmButtonText: 'Aceptar'
      });
    });
  }

  // Liberar el router
  if (rout_id) {
    $.post("controller/routes.php?op=liberarRoute", { rout_id: rout_id }, function(data) {
      // Actualizar el estado del router a libre
      Swal.fire({
        title: 'Router liberado',
        text: '',
        icon: 'success',
        confirmButtonText: 'Aceptar'
      });
    });
  }

  // Liberar el módem
  if (mod_id) {
    $.post("controller/modems.php?op=liberarModem", { mod_id: mod_id }, function(data) {
      // Actualizar el estado del módem a libre
      Swal.fire({
        title: 'Módem liberado',
        text: '',
        icon: 'success',
        confirmButtonText: 'Aceptar'
      });
    });
  }
}


function eliminar(inst_id){
  
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

          $.post("controller/nuevaInstalacion.php?op=eliminar",{inst_id:inst_id},function(data){
              $('#cliente_servicio').DataTable().ajax.reload(); //para actualizar la tabla 
          });
        Swal.fire(
          'Eliminado!',
          'Eliminado Correctamente',
          'success'
        )
      }
      $('#instalacion_data').DataTable().ajax.reload(); 
    })
  

}



init();




  










  //*/***********====================================================================================================================== */


// /************* MENSAJE**************************** */

$(document).ready(function() {
  var servicioSeleccionado = ''; 
  $("#boton-mensaje").click(function() {
    $("#oculto").show();
    $("#oculto1").hide();
    var id_mensaje = $("#id_mensaje").val();

        // Obtener el valor seleccionado del campo "serv_id"
      servicioSeleccionado = $("#serv_id").find("option:selected").text();
    console.log(servicioSeleccionado);

    $.ajax({
      url: "controller/mensaje.php?op=mensaje",
      method: "POST",
      data: { action: "mensaje", id_mensaje: id_mensaje },
      dataType: "json",
      success: function(mensajeResponse) {
        var contenido = mensajeResponse.contenido;

        contenido = contenido.replace(/{cliente}/g, $("#nombre").val());
        contenido = contenido.replace(/{celular}/g, $("#cli_fono").val());
        contenido = contenido.replace(/{dni}/g, $("#cli_dni").val());
        contenido = contenido.replace(/{sexo}/g, $("#cli_sexo").val());
        contenido = contenido.replace(/{servicio}/g, servicioSeleccionado);
        contenido = contenido.replace(/{costo}/g, $("#import_servicio").val());
        contenido = contenido.replace(/{mes}/g, $("").val());
        
        
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
          contenido = contenido.replace(/{cliente}/g, $("#nombre_cliente").val());
          contenido = contenido.replace(/{celular}/g, $("#cli_fono").val());
          contenido = contenido.replace(/{dni}/g, $("#cli_dni").val());
          contenido = contenido.replace(/{sexo}/g, $("#cli_sexo").val());
          contenido = contenido.replace(/{servicio}/g, $("#serv_nom").val());
          contenido = contenido.replace(/{costo}/g, $("#import_servicio").val());
          contenido = contenido.replace(/{mes}/g, $("").val());

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


   
$(document).ready(function() {

  $.post("http://localhost/Standar_Internet/controller/mensaje.php?op=combo", { cli_id: cli_id }, function (data, status) {
    $('#id_mensaje').html(data);
    // Inicializar el plugin Select2 después de actualizar el contenido del elemento
  });
});












  //*/***********====================================================================================================================== */










  /***************************** *MODULO DECOS * *********************************************** */


  $(document).ready(function() {
    $(".select2").select2({
      maximumSelectionLength: 1, // Limitar la selección a 1 elemento
    });


  });
    
  
  // /**************** MODAL DE DECOS ********************** */
  function DecoMantenimeinto() {
    var deco_id = $('#deco_id').val();
    var cliente_deco = $('#cliente_deco').val();
    var dec_estado = $('#dec_estado').text(); // Obtén el texto en lugar del valor
    $('#lbltitulo2').html("Inserción de deco");
    $('#deco_mantenimiento').modal('show');
  
    // Establecer los valores en los campos correspondientes
    $('#deco_id').val(deco_id).trigger('change');
    $('#cliente_deco').val(cliente_deco);
    $('#dec_estado').val(dec_estado);
    // Restablecer la tabla historyDeco si es necesario
    $('#historyDeco tbody').html('<tr><td></td><td></td><td></td><td></td></tr>');

    verificacion();

  }
  
  function verificacion() {
    var deco_id = $('#deco_id').val();
  
    if (deco_id !== null && deco_id.length > 0) {
      deco_id = deco_id[0];
    } else {
      deco_id = null;
    }
  
    if (deco_id !== null) {
  $.post("http://localhost/Standar_Internet/controller/decos.php?op=verificarDeco", { deco_id: deco_id }, function(data) {
        var datos = JSON.parse(data);
        $("#deco_id").val(datos.deco_id);
        $("#cliente_deco").val(datos.cliente_deco);
  
        // Remover todas las clases de estado
        $("#dec_estado").removeClass("text-success text-info text-warning");
  
        // Agregar la clase de estado correspondiente
        switch (datos.dec_estado) {
          case "1":
            $("#dec_estado").addClass("text-success").text("Activado");
            break;
          case "2":
            $("#dec_estado").addClass("text-info").text("Libre");
            break;
          case "0":
            $("#dec_estado").addClass("text-warning").text("Desactivado");
            break;
        }
      });
    }
  
    /*** TABLE * */
    // Verificar si la tabla ya ha sido inicializada
    if ($.fn.DataTable.isDataTable('#historyDeco')) {
      // Si la tabla ya ha sido inicializada, destruir la instancia existente
      $('#historyDeco').DataTable().destroy();
    }
  
    // Inicializar la tabla DataTable
    var table = $('#historyDeco').DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "ajax": {
        url: 'controller/dispoHistory.php?op=listar',
        type: "post",
        dataType: "json",
        data: { deco_id: deco_id },
        error: function(e) {
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
  
      "scrollX": true,
      "fixedHeader": {
        "header": true,
        "footer": false
      },
    });
  }
  
    

  function actualizarDeco() {
    var deco_id = $("#deco_id").val()[0];
    var cli_id = $("#cli_id").val();
  
    $.ajax({
      url: "controller/decos.php?op=actualizarCliente",
      type: "post",
      data: { deco_id: deco_id, cli_id: cli_id },
      success: function (response) {
        // Código a ejecutar cuando la actualización del estado sea exitosa
        console.log(response); // Mostrar la respuesta en la consola del navegador
      },
      error: function (xhr, textStatus, error) {
        // Código a ejecutar en caso de error en la actualización del estado
      }
    });
  }


    




  
  // /**************** MODAL DE  ROUTERS ********************** */

  function RouterMantenimeinto() {
    var rout_id = $('#rout_id').val();
    var cliente_route = $('#cliente_route').val();
    var rout_estado = $('#rout_estado').text(); // Obtén el texto en lugar del valor
    $('#lbltitulo3').html("Inserción de Router");
    $('#router_mantenimiento').modal('show');
  
    // Establecer los valores en los campos correspondientes
    $('#rout_id').val(rout_id).trigger('change');
    $('#cliente_route').val(cliente_route);
    $('#rout_estado').html(rout_estado);
    // Restablecer la tabla historyDeco si es necesario
    $('#historyRouter tbody').html('<tr><td></td><td></td><td></td><td></td></tr>');

    verificacion_router();
  }
  
  function verificacion_router() {
    var rout_id = $('#rout_id').val();
  
    if (rout_id !== null && rout_id.length > 0) {
      rout_id = rout_id[0];
    } else {
      rout_id = null;
    }
  
    if (rout_id !== null) {
  $.post("http://localhost/Standar_Internet/controller/routes.php?op=verificarRouter", { rout_id: rout_id }, function(data) {
        var datos = JSON.parse(data);
        $("#rout_id").val(datos.rout_id);
        $("#cliente_route").val(datos.cliente_route);
  
        // Remover todas las clases de estado
        $("#rout_estado").removeClass("text-success text-info text-warning");
  
        // Agregar la clase de estado correspondiente
        switch (datos.rout_estado) {
          case "1":
            $("#rout_estado").addClass("text-success").text("Activado");
            break;
          case "2":
            $("#rout_estado").addClass("text-info").text("Libre");
            break;
          case "0":
            $("#rout_estado").addClass("text-warning").text("Desactivado");
            break;
        }
      });
    }
  
    /*** TABLE * */
    // Verificar si la tabla ya ha sido inicializada
    if ($.fn.DataTable.isDataTable('#historyRouter')) {
      // Si la tabla ya ha sido inicializada, destruir la instancia existente
      $('#historyRouter').DataTable().destroy();
    }
  
    // Inicializar la tabla DataTable
    var table = $('#historyRouter').DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "ajax": {
        url: 'controller/dispoHistory.php?op=listar',
        type: "post",
        dataType: "json",
        data: { rout_id: rout_id },
        error: function(e) {
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
  
      "scrollX": true,
      "fixedHeader": {
        "header": true,
        "footer": false
      },
    });
  }
  
  function actualizarRouter() {
    var rout_id = $("#rout_id").val()[0];
    var cli_id = $("#cli_id").val();
  
    $.ajax({
      url: "controller/routes.php?op=actualizarCliente",
      type: "post",
      data: { rout_id: rout_id, cli_id: cli_id },
      success: function (response) {
        // Código a ejecutar cuando la actualización del estado sea exitosa
        console.log(response); // Mostrar la respuesta en la consola del navegador
      },
      error: function (xhr, textStatus, error) {
        // Código a ejecutar en caso de error en la actualización del estado
      }
    });
  }











  
  
  // /**************** MODAL DE  MODEM ********************** */

  function ModemMantenimeinto() {
    var mod_id = $('#mod_id').val();
    var cliente_modem = $('#cliente_modem').val();
    var mod_estado = $('#mod_estado').text(); // Obtén el texto en lugar del valor
    $('#lbltitulo4').html("Inserción de Modem");
    $('#modem_mantenimiento').modal('show');
  
    // Establecer los valores en los campos correspondientes
    $('#mod_id').val(mod_id).trigger('change');
    $('#cliente_modem').val(cliente_modem);
    $('#mod_estado').html(mod_estado);
    // Restablecer la tabla historyDeco si es necesario
    $('#historyModem tbody').html('<tr><td></td><td></td><td></td><td></td></tr>');

    verificacion_modem();
  }
  
  function verificacion_modem() {
    var mod_id = $('#mod_id').val();
  
    if (mod_id !== null && mod_id.length > 0) {
      mod_id = mod_id[0];
    } else {
      mod_id = null;
    }
  
    if (mod_id !== null) {
  $.post("http://localhost/Standar_Internet/controller/modems.php?op=verificarModem", { mod_id: mod_id }, function(data) {
        var datos = JSON.parse(data);
        $("#mod_id").val(datos.mod_id);
        $("#cliente_modem").val(datos.cliente_modem);
  
        // Remover todas las clases de estado
        $("#mod_estado").removeClass("text-success text-info text-warning");
  
        // Agregar la clase de estado correspondiente
        switch (datos.mod_estado) {
          case "1":
            $("#mod_estado").addClass("text-success").text("Activado");
            break;
          case "2":
            $("#mod_estado").addClass("text-info").text("Libre");
            break;
          case "0":
            $("#mod_estado").addClass("text-warning").text("Desactivado");
            break;
        }
      });
    }
  
    /*** TABLE * */
    // Verificar si la tabla ya ha sido inicializada
    if ($.fn.DataTable.isDataTable('#historyModem')) {
      // Si la tabla ya ha sido inicializada, destruir la instancia existente
      $('#historyModem').DataTable().destroy();
    }
  
    // Inicializar la tabla DataTable
    var table = $('#historyModem').DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "ajax": {
        url: 'controller/dispoHistory.php?op=listar',
        type: "post",
        dataType: "json",
        data: { mod_id: mod_id },
        error: function(e) {
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
  
      "scrollX": true,
      "fixedHeader": {
        "header": true,
        "footer": false
      },
    });
  }

  function actualizarModem() {
    var mod_id = $("#mod_id").val()[0];
    var cli_id = $("#cli_id").val();
  
    $.ajax({
      url: "controller/modems.php?op=actualizarCliente",
      type: "post",
      data: { mod_id: mod_id, cli_id: cli_id },
      success: function (response) {
        // Código a ejecutar cuando la actualización del estado sea exitosa
        console.log(response); // Mostrar la respuesta en la consola del navegador
      },
      error: function (xhr, textStatus, error) {
        // Código a ejecutar en caso de error en la actualización del estado
      }
    });
  }


