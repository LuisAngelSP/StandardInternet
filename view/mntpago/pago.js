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
              $("#cliente_nombre_" + index).text(detalle.cliente_nombre);
              $("#nombre_casa_" + index).text(detalle.nombre_casa);
              $("#serv_nom_" + index).text(detalle.serv_nom);
              $("#import_servicio_" + index).text(detalle.import_servicio);
          });
      },
      error: function(xhr, status, error) {
          console.error(xhr.responseText);
      }
  });
});

function realizarPago(index) {
  // Obtener el monto de pago ingresado para el cliente correspondiente
  var montoPago = $("#monto_pago_" + index).val();
  var nombre = $("#cliente_nombre_" + index).text();
  // Realizar la lógica de pago y procesar la información según tus requerimientos
  // Aquí puedes enviar los datos de pago al servidor para su procesamiento

  // Ejemplo de impresión en consola
  alert("Pago realizado para el Fila: " + index + '\n' +
      " Cliente: " + nombre +
      " Monto de pago: " + montoPago);
}
