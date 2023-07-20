/*=======SELECT SERVICIO=========*/

var cli_id =  $('#cli_id').val();


function servicio(){
  $('#lbltitulo1').html("Agregar un nuevo servicio");
  $('#inst_id').val('');
  $('#id_casas').val('');
  $('#id_casas option:first').prop('selected', true);
  $('#serv_id').val('');
  $('#serv_id').trigger('change');
  $('#vista').modal('show');
 
}
  

  $(document).ready(function(){

    function generarCamposServicio() {
      var serv_id = $("#serv_id").val();
      $.ajax({
        url: "controller/form/servicio_form.php",
        type: "POST",
        data: {serv_id: serv_id},
        success: function(data){
          $("#campos_servicio").html(data);
        }
      });
    }
  
    $("#serv_id").change(generarCamposServicio);
  
        // resetear el modal al cerrarse
        $('#vista').on('hidden.bs.modal', function () {
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
  
        // Establecer el valor del campo id_casas en el formulario
        $("#id_casas").val(datos.id_casas);
      },
    });
  }
  
  function editar(inst_id){
    $('#lbltitulo1').html("Editar Servicio de instalacion");
    $.post("controller/nuevaInstalacion.php?op=mostrar",{inst_id:inst_id},function(data){
      var datos = JSON.parse(data);
      updateCamposServicio(datos.serv_id, datos);
  
      $('#vista').modal('show'); 
    });
  }

/*=======INSERTAR Y ACTUALIZAR DATOS=========*/

function initServicio(){
  $('#instalacion_form').on("submit",function(e){

    guardaryeditar_servicio(e);

});
}
function guardaryeditar_servicio(e){
  e.preventDefault();
  var formData = new FormData($("#instalacion_form")[0]);
  $.ajax({
      url: "controller/nuevaInstalacion.php?op=guardaryeditar",
      type: "post",
      data: formData,
      contentType: false,
      processData: false,
      success: function(data){
          $('#vista').modal('hide'); // para que se oculte el modal
          $('#cliente_servicio').DataTable().ajax.reload(); //para actualizar la tabla 

          Swal.fire({
              title: 'Correcto!',
              text: "Se Registro Correctamente!",
              icon: 'success',
              confirmButtonText: 'Aceptar'

          });
  }
});
}

/*=======LISTAR DATOS =========*/

$(document).ready(function() {

  var table = $('#cliente_servicio').DataTable({
    "responsive": true,
    "lengthChange": false,
    "autoWidth": false,
    "ajax":{
      url: 'controller/form/servicio_cliente.php?op=listar_x_cliente',
      type : "post",
      dataType : "json",
      data:{ cli_id : cli_id},
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

/*=======EDITAR DATOS ========*/
  
  /*======= ELIMINAR DATOS =========*/

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
                $('#servicio_data').DataTable().ajax.reload(); //para actualizar la tabla 
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




  initServicio();


/*****=================================== JS PARA CASAS =========================================*********** */

/**===INSERTAR Y ACTUALIZAR DATOS  === */

function initCasa(){
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
        Swal.fire({
          title: 'Correcto!',
          text: "Se Registro la Casa Correctamente!",
          icon: 'success',
          confirmButtonText: 'Aceptar'
        }).then((result) => {
          if (result.isConfirmed) {
            location.reload();
          }
        });
}
})
}

function Direccion(select) {
  const direccion = select.options[select.selectedIndex].getAttribute('data-direccion');
  document.getElementById('direccion_casa').innerText = direccion;
}
function casa(){
$('#lbltitulo').html("Nuevo Casa");//colocar el titulo en el h5
$('#id_casas').val('');
$('#modcasa_form')[0].reset();
$('#modcasa').modal('show'); //para llamar al modal
}

initCasa();


  