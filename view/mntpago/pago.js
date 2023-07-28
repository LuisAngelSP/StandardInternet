$(document).ready(function() {
    // Obtener los IDs de los clientes seleccionados del data attribute
    var clientesSeleccionados = $("#clientesSeleccionados").data("clientes");
  
    // Si el atributo está vacío o no existe, asignar un valor predeterminado (en este caso, un arreglo vacío)
    clientesSeleccionados = clientesSeleccionados || [];
  
    // Enviar los IDs seleccionados al controlador para obtener los detalles del pago
    $.ajax({
      type: "POST",
      url: "controller/form/pagoMes.php?op=getDetallePago",
      data: { clientes: JSON.stringify(clientesSeleccionados) }, // Convertir a cadena JSON
      success: function(data) {
        var detallesPago = JSON.parse(data);
        console.log(detallesPago);
  
        // Recorrer los detalles del pago y mostrarlos en los campos correspondientes
        detallesPago.forEach(function(detalle, index) {
          var clienteId = detalle.id_cliente;
  
          // Mostrar los detalles del pago en los campos correspondientes
          $("#cliente_nombre_" + clienteId).text(detalle.cliente_nombre);
          $("#nombre_casa_" + clienteId).text(detalle.nombre_casa);
          $("#serv_nom_" + clienteId).text(detalle.serv_nom);
          $("#import_servicio_" + clienteId).text(detalle.import_servicio);
        });
      },
      error: function(xhr, status, error) {
        console.error(xhr.responseText);
      }
    });

    
    $.ajax({
        type: "POST",
        url: "controller/form/pagoMes.php?op=getMesesDeudas",
        data: { clientes: JSON.stringify(clientesSeleccionados) },
        success: function(data) {
            var mesesDeudas = JSON.parse(data);
            var currentDate = moment();
    
            // Recorrer los meses de deudas y mostrarlos en los campos correspondientes
            for (var clienteId in mesesDeudas) {
                var deudasCliente = mesesDeudas[clienteId];
                var deudasHtml = '';
                var totalDeudaAcumulada = 0;
    
                if (deudasCliente.length > 0) {
                    var fechaDeuda = moment(deudasCliente[0].mes_deuda); // Obtener la primera fecha de deuda
                    var fechaActual = moment(); // Obtener la fecha actual
                    var importeServicio = parseFloat($("#import_servicio_" + clienteId).text()); // Obtener el importe del servicio
    
                    // Iterar por cada mes entre la fecha que debe y la fecha actual
                    while (fechaDeuda.isBefore(fechaActual, 'month')) {
                        var monto = deudasCliente.find(function(mesDeuda) {
                            return moment(mesDeuda.mes_deuda).isSame(fechaDeuda, 'month');
                        });
    
                        var montoDeuda = importeServicio; // Asignar el importe del servicio a la deuda del mes
    
                        if (monto) {
                            montoDeuda += parseFloat(monto.monto_deuda); // Convertir a número antes de sumar
                        }
    
                        totalDeudaAcumulada += montoDeuda; // Acumular el monto de la deuda
                        deudasHtml += '<p> ' + fechaDeuda.format('MMMM YYYY') + ' monto: ' + montoDeuda.toFixed(2) + '</p>';
                        fechaDeuda.add(1, 'month'); // Avanzar al siguiente mes
                    }
    
                    // Mostrar el monto del mes actual
                    if (fechaDeuda.isSame(fechaActual, 'month')) {
                        var daysInMonth = fechaActual.daysInMonth();
                        var montoMesActual = (importeServicio / daysInMonth) * fechaActual.date();
                        totalDeudaAcumulada += montoMesActual;
                        deudasHtml += '<p>' + fechaActual.format('MMMM YYYY') + ' monto: ' + montoMesActual.toFixed(2) + '</p>';
                    }
                } else {
                    deudasHtml = '<p>No hay meses de deuda</p>';
                }
    
                deudasHtml += '<p>Total deuda acumulada hasta ' + currentDate.format('MMMM YYYY') + ': ' + totalDeudaAcumulada.toFixed(2) + '</p>';
                $("#meses_deuda_" + clienteId).html(deudasHtml);
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
    
    
    
});








function realizarPago(index) {
    // Obtener los datos necesarios
    var montoPago = $("#monto_pago_" + index).val();
    var nombre = $("#cliente_nombre_" + index).text();
    var nombreServicio = $("#serv_nom_" + index).text();

    // Obtener la fecha actual en formato "Día de Mes de Año"
    var fechaActual = moment().format('D [de] MMMM [de] YYYY');

    // Plantilla del mensaje con saltos de línea usando etiquetas <br>
    var plantillaMensaje = "Estimado/a " + nombre + ",<br><br>Hemos recibido su pago por el servicio de " + nombreServicio + " correspondiente al mes actual. Agradecemos su puntualidad en el pago.<br><br>Detalles de su pago:<br>- Fecha del pago: " + fechaActual + "<br>- Monto pagado: " + montoPago + "<br><br>¡Gracias por su preferencia!<br><br>Atentamente,<br>Estadard - Internet";

    // Mostrar el modal y asignar los datos correspondientes
    $("#msgpago").modal("show");
    $("#clienteNombre").text(nombre);
    $("#servicioCancelado").text(montoPago);

    // Inicializar el editor Summernote y asignar la plantilla al contenido
    $("#mensaje").summernote({
        height: 250, // Altura del editor en píxeles
        lang: 'es-ES', // Idioma en español
    });
    $("#mensaje").summernote('code', plantillaMensaje);
}

// 
function copiarTextoAlPortapapeles() {
    var mensajeHTML = $("#mensaje").summernote('code'); // Obtener el contenido HTML del Summernote

    // Reemplazar las etiquetas <div> por saltos de línea
    mensajeHTML = mensajeHTML.replace(/<\/div>/g, '\n');
    mensajeHTML = mensajeHTML.replace(/<div>/g, '');
    mensajeHTML = mensajeHTML.replace(/<\/br>/g, '\n');
    mensajeHTML = mensajeHTML.replace(/<br>/g, '\n');
    mensajeHTML = mensajeHTML.replace(/&nbsp;/g, ' ');
    mensajeHTML = mensajeHTML.replace(/<\/p>/g, '\n');
    mensajeHTML = mensajeHTML.replace(/<p>/g, '');
    mensajeHTML = mensajeHTML.replace(/<div style="text-align: center;">/g, '');

    // Copiar al portapapeles
    navigator.clipboard.writeText(mensajeHTML)
        .then(function() {
            alert("El contenido se ha copiado al portapapeles.");
        })
        .catch(function(err) {
            console.error('Error al copiar al portapapeles: ', err);
            alert("Error al copiar el contenido al portapapeles.");
        });
}


function abrirEnMessenger() {
    // Lógica para abrir el contenido en Messenger (puedes implementarla según tus requerimientos)
    // ...
    // Aquí puedes usar métodos de JavaScript para abrir el contenido en Messenger
}

// Agregar evento click al botón de Messenger
$("#abrirMessenger").click(function() {
    abrirEnMessenger();
});
