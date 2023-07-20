<div class="container mt-5">
    <h2>Clientes Seleccionados</h2>
    <!-- Asignar los datos de clientes seleccionados como una cadena JSON al atributo data-clientes -->
    <div id="clientesSeleccionados" data-clientes="<?php echo isset($_GET['clientes']) ? htmlspecialchars($_GET['clientes']) : ''; ?>"></div>

    <div class="row" id="clientesContainer">
        <?php
        if (isset($_GET['clientes'])) {
            $clientesSeleccionados = json_decode($_GET['clientes'], true);

            $index = 0; // Variable $index para mantener el contador

            foreach ($clientesSeleccionados as $cliente) {
                $id = $cliente;
                $cliente_nombre = ""; // Asignar un valor predeterminado
                $nombre_casa = ""; // Asignar un valor predeterminado
                $serv_nom = ""; // Asignar un valor predeterminado
                $import_servicio = ""; // Asignar un valor predeterminado
                ?>
                <div class="col-8 mb-3">
                    <div class="card">
                        <div class="container m-2">
                            <div class="card-body">
                                <h5 class="card-title">ID: <?php echo $id; ?></h5>
                                <br>
                                <br>
                                <span class="card-text" id="cliente_nombre_<?php echo $index; ?>"><?php echo $cliente_nombre; ?></span><br>
                                <span class="card-text" id="nombre_casa_<?php echo $index; ?>"><?php echo $nombre_casa; ?></span><br>
                                <label for="serv_nom_<?php echo $index; ?>">Servicio:</label>
                                <span class="card-text" id="serv_nom_<?php echo $index; ?>"><?php echo $serv_nom; ?></span><br>
                                <label for="import_servicio_<?php echo $index; ?>">Importe del Servicio:</label>
                                <span class="card-text" id="import_servicio_<?php echo $index; ?>"><?php echo $import_servicio; ?></span><br>

                                <label for="monto_pago_<?php echo $index; ?>">Monto de Pago:</label>
                                <div class="form-group d-flex justify-content-between align-items-center">

                                    <div class="col-2">
                                        <input type="number" class="form-control" id="monto_pago_<?php echo $index; ?>" name="monto_pago" required>
                                    </div>
                                    <button type="button" class="btn btn-success btn-sm mr-5" onclick="realizarPago(<?php echo $index; ?>)">Pagar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="jsonContent"></div>

        <?php
                $index++; // Incrementar el contador
            }
        }
        ?>
    </div>
</div>

<script type="text/javascript" src="view/mntpago/pago.js"></script>
