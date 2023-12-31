<!-- Modal -->
<div class="modal" id="msgpago" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detalles de Pago</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><strong>Nombre del Cliente:</strong> <span id="clienteNombre"></span></p>
        <p><strong>Servicio Cancelado:</strong> <span id="servicioCancelado"></span></p>
        <a type="button" class="btn btn-success m-2" onclick="copiarTextoAlPortapapeles()">Copiar al Portapapeles</a>
        <a type="button" id="abrirMessenger" href="#" class="btn btn-info m-2" target="_blank">Abrir en Messenger</a>
        <textarea id="mensaje" rows="4" class="form-control" placeholder="Escribe tu mensaje aquí"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
