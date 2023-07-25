$(document).ready(function() {
var table = $('#casa_data').DataTable({
  "responsive": true,
  "lengthChange": false,
  "autoWidth": false,
  "ajax": {
    "url": "controller/casas.php?op=listar",
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
  "createdRow": function(row, data, dataIndex) {
    $(row).find('td').addClass('row-ajustada');

  },
  "drawCallback": function(settings) {

    var api = this.api();
      var rows = api.rows({ page: 'current' }).nodes();
      var startIndex = api.page.info().start;

      $(rows).each(function(index) {
        var numero;
        if (index < 9) {
          numero = index + 1;
        } else {
          numero = 0;
        }

        // Agregar el enumerador a la primera columna (columna N°)
        $(this).find('td').eq(0).html(numero);

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
  
  





// Función para asignar atajos de teclado para abrir la casa
for (var i = 0; i < 10; i++) {
Mousetrap.bind('shift+h+' + i, (function(i) {
return function(e) {
  // Verificar si la tecla Shift está presionada
  if (e.shiftKey) {
    var editarLink = $('.selec-casa').eq(i);
    if (editarLink.length > 0) {
      editarLink.click();
    }
  }
};
})(i));
}
for (var i = 0; i < 10; i++) {
  Mousetrap.bind('alt+' + i, (function(i) {
    return function(e) {
      // Verificar si la tecla Alt está presionada
      if (e.altKey && !e.shiftKey) {
        var editarLink = $('.editar-casa').eq(i);

        if (editarLink.length > 0) {
          editarLink.click();
        }
      }
    };
  })(i));
}



});


function initCasa() {
  $('#modcasa_form').on("submit", function (e) {

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
              text: "Se Registro Correctamente!",
              icon: 'success',
              confirmButtonText: 'Aceptar'

          });
  }
})
}


function nuevo(id_cliente, nombre_cliente) {
  var nombre_decodificado = decodeURIComponent(nombre_cliente);
  var nombre_sin_caracteres = nombre_decodificado.replace(/[.+]/g, ' ');
  $('#lbltitulo').html("Nuevo Casa para " + nombre_sin_caracteres);
  $('#id_casas').val('');
  $('#modcasa_form')[0].reset();
  $('#id_cliente').val(id_cliente);
  $('#modcasa').modal('show');
}

initCasa();



function eliminar(id_casas) {

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

      $.post("controller/casas.php?op=eliminar", { id_casas: id_casas }, function (data) {
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


function editar(id_casas) {
  $('#lbltitulo').html("Editar Casa");//colocar el titulo en el h5
  $.post("controller/casas.php?op=mostrar", { id_casas: id_casas }, function (data) {
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



