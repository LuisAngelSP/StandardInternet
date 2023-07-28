<?php

require_once("../../config/conexion.php");
require_once("../../model/Pagos.php");

$pago = new Pagos();
 
switch ($_GET["op"]) {
    case "getDetallePago":
        $jsonClientes = $_POST["clientes"];
        $clientesSeleccionados = json_decode($jsonClientes);
    
        // Aquí puedes realizar las operaciones necesarias con los IDs recibidos
        // Por ejemplo, puedes usar un bucle para obtener los detalles de cada ID
    
        $output = [];
        foreach ($clientesSeleccionados as $idCliente) {
            $datos = $pago->getDetallePago($idCliente);
            if (is_array($datos) && count($datos) !== 0) {
                foreach ($datos as $row) {
                    $output[] = [
                        "id_cliente" => $row["cli_id"],
                        "cliente_nombre" => $row["cliente_nombre"],
                        "nombre_casa" => $row["nombre_casa"],
                        "serv_nom" => $row["serv_nom"],
                        "import_servicio" => $row["import_servicio"]
                    ];
                }
            }
        }
    
        // Preparar la respuesta del controlador
        echo json_encode($output);
    break;


    case "getMesesDeudas":
        $jsonClientes = $_POST["clientes"];
        $clientesSeleccionados = json_decode($jsonClientes);
    
        $output = [];
        foreach ($clientesSeleccionados as $idCliente) {
            $mesesDeudas = $pago->getMesesDeudas($idCliente);
            if (is_array($mesesDeudas) && count($mesesDeudas) !== 0) {
                $output[$idCliente] = $mesesDeudas;
            }
        }
    
        // Preparar la respuesta del controlador
        echo json_encode($output);
    break;
}
