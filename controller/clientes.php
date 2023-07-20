<?php

/**LLAMANDO A CADENA DE CONEXION */
require_once("../config/conexion.php");
/**LLAMANDO A LA CLASE */
require_once("../model/Cliente.php");
// require_once("../controller/mensaje.php");
/**INICIALIZANDO CLASE */
$cliente = new Cliente(); 



/**OPCION DE SOLICITUD DE CONTROLLER */
switch ($_GET["op"]) {

    case "guardaryeditar":
        if (!empty($_POST["cli_id"])) {
            $cliente->update_cliente($_POST["cli_id"], $_POST["cli_fono"], $_POST["cli_nombre"], $_POST["cli_apellido"], $_POST["cli_fb"], $_POST["cli_sexo"], $_POST["cli_correo"], $_POST["cli_dni"], $_POST["cli_linkGooContac"], $_POST["cli_linkGooFotoAparatos"], $_POST["cli_direccion"], $_POST["cliente12"], $_POST["cliente13"], $_POST["cliente14"], $_POST["cliente15"], $_POST["cliente16"], $_POST["cliente17"], $_POST["cliente18"], $_POST["cliente19"], $_POST["cliente20"]);
        } else {

            $cliente->insert_cliente($_POST["cli_fono"], $_POST["cli_nombre"], $_POST["cli_apellido"], $_POST["cli_fb"], $_POST["cli_sexo"], $_POST["cli_correo"], $_POST["cli_dni"], $_POST["cli_linkGooContac"], $_POST["cli_linkGooFotoAparatos"], $_POST["cli_direccion"], $_POST["cliente12"], $_POST["cliente13"], $_POST["cliente14"], $_POST["cliente15"], $_POST["cliente16"], $_POST["cliente17"], $_POST["cliente18"], $_POST["cliente19"], $_POST["cliente20"]);
        }
    break;
    case "listar":

        $datos = $cliente->get_cliente();
        $data = array();
        foreach ($datos as $row) {
            $sub_array = array();

            $sub_array[] = $row["cli_id"];
            if ($row["cli_est"] == 1) {
                $sub_array[] = '<button type="button" onclick="Desactivar(' . $row["cli_id"] . ')" id="' . $row["cli_id"] . '" class="btn btn-outline-danger btn-sm">Desac</button>';
            } else {
                $sub_array[] = '<button type="button" disabled class="btn btn-outline-danger btn-sm">Desac</button>';
            }
            if ($row["cli_est"] == 1) {
                $sub_array[] = '<a type="button" class="btn btn-info btn-sm selec-casa" href="#" onclick="CargaPlantilla(\'view/mntcasasxclientes/index.php?cli_id=' . $row["cli_id"] . '&nombre=' . urlencode($row["nombre_completo"]) . '\', \'content-wp\')">Casas(Shift)(H)</a>';
            } else {
                $sub_array[] = '<button type="button" disabled class="btn btn-info btn-sm">Casas</button>';
            }
            
            
            if ($row["cli_est"] == 1) {
                $sub_array[] = '<a type="button" class="editar-cliente" onclick="editar(' . $row["cli_id"] . ')" id="' . $row["cli_id"] . '">' . $row["nombre_completo"] . '</a>';

            } else {
                $sub_array[] = $row["nombre_completo"];
            }

            if ($row["cli_est"] == 1) {
                $sub_array[] = '<span class="badge badge-pill badge-success">Activo</span>';
            } else {
                $sub_array[] = '<span class="badge badge-pill badge-danger">Suspendido</span>';
            }
            $sub_array[] = $row["cli_dni"];
            $sub_array[] = $row["cli_sexo"];
            $sub_array[] = $row["cli_correo"];
            $sub_array[] = $row["cli_fono"];
            $sub_array[] = '<a href="' . $row["cli_fb"] . '" target="_blank">' . $row["cli_fb"] . '</a>';
            $sub_array[] = $row["cli_linkGooContac"];
            $sub_array[] = $row["cli_linkGooFotoAparatos"];
            $sub_array[] = $row["cli_zona"];
            $sub_array[] = $row["cli_direccion"];
            $sub_array[] = $row["cliente12"];
            $sub_array[] = $row["cliente13"];
            $sub_array[] = $row["cliente14"];
            $sub_array[] = $row["cliente15"];
            $sub_array[] = $row["cliente16"];
            $sub_array[] = $row["cliente17"];
            $sub_array[] = $row["cliente18"];
            $sub_array[] = $row["cliente19"];
            $sub_array[] = $row["cliente20"];



            $data[] = $sub_array;
        };
        $results = array(
            "sEcho" => 1, //INFORMACION PARA EL TABLES
            "iTotalRecords" => count($datos), //enviamos el total de registros al dataTable
            "iTotalDisplayRecords" => count($datos), //enviamos el total de registros a visualizar
            "aaData" => $data
        );

        echo json_encode($results);
    break;
    case "eliminar":

        $cliente->delete_cliente($_POST["cli_id"]);


    break;
    case "desactivar":

        $cliente->desactivar_cliente($_POST["cli_id"]);


    break;
    case "activar":

        $cliente->activar_cliente($_POST["cli_id"]);


    break;
    case "mostrar":
        $datos = $cliente->get_cliente_x_id($_POST["cli_id"]);
        if (is_array($datos) == true and count($datos) <> 0) {
            foreach ($datos as $row) {
                $output["cli_id"] = $row["cli_id"];
                $output["cli_fono"] = $row["cli_fono"];
                $output["cli_nombre"] = $row["cli_nombre"];
                $output["cli_apellido"] = $row["cli_apellido"];
                $output["cli_fb"] = $row["cli_fb"];
                $output["cli_sexo"] = $row["cli_sexo"];
                $output["cli_correo"] = $row["cli_correo"];
                $output["cli_dni"] = $row["cli_dni"];
                $output["cli_linkGooContac"] = $row["cli_linkGooContac"];
                $output["cli_linkGooFotoAparatos"] = $row["cli_linkGooFotoAparatos"];
                $output["cli_direccion"] = $row["cli_direccion"];
                $output["cliente12"] = $row["cliente12"];
                $output["cliente13"] = $row["cliente13"];
                $output["cliente14"] = $row["cliente14"];
                $output["cliente15"] = $row["cliente15"];
                $output["cliente16"] = $row["cliente16"];
                $output["cliente17"] = $row["cliente17"];
                $output["cliente18"] = $row["cliente18"];
                $output["cliente19"] = $row["cliente19"];
                $output["cliente20"] = $row["cliente20"];
            }
            echo json_encode($output);
        }

    break;
    // case "Lista_casas_x_idcliente":

    //     $datos = $cliente->get_cliente();
    //     $data = array();
    //     foreach ($datos as $row) {

    //         $sub_array[] = '<a type="button" class="btn btn-info" href="../mntdetalleCliente/detalle.php?cli_id=' . $row["cli_id"] . '&nombre=' . $row["nombre_completo"] . '">Casas</i></a>';
    //         $sub_array[] = '<a type="button" onclick="editar(' . $row["cli_id"] . ')" id="' . $row["cli_id"] . '">' . $row["nombre_completo"] . '</a>';

    //         if ($row["cli_est"] == 1) {
    //             $sub_array[] = '<span class="badge badge-pill badge-success">Activo</span>';
    //         } else {
    //             $sub_array[] = '<span class="badge badge-pill badge-danger">Suspendido</span>';
    //         }
    //         $sub_array[] = $row["cli_dni"];
    //         $sub_array[] = $row["cli_sexo"];
    //         $sub_array[] = $row["cli_correo"];
    //         $sub_array[] = $row["cli_fono"];
    //         $sub_array[] = $row["cli_fb"];
    //         $sub_array[] = $row["cli_linkGooContac"];
    //         $sub_array[] = $row["cli_linkGooFotoAparatos"];
    //         $sub_array[] = $row["cli_direccion"];
    //         $sub_array[] = $row["cliente12"];
    //         $sub_array[] = $row["cliente13"];
    //         $sub_array[] = $row["cliente14"];
    //         $sub_array[] = $row["cliente15"];
    //         $sub_array[] = $row["cliente16"];
    //         $sub_array[] = $row["cliente17"];
    //         $sub_array[] = $row["cliente18"];
    //         $sub_array[] = $row["cliente19"];
    //         $sub_array[] = $row["cliente20"];


    //         $data[] = $sub_array;
    //     };
    //     $results = array(
    //         "sEcho" => 1, //INFORMACION PARA EL TABLES
    //         "iTotalRecords" => count($datos), //enviamos el total de registros al dataTable
    //         "iTotalDisplayRecords" => count($datos), //enviamos el total de registros a visualizar
    //         "aaData" => $data
    //     );

    //     echo json_encode($results);
    // break;
    case "listarActivos":
        $datos = $cliente->listarClientesActivos(); // Método para obtener los clientes activos desde tu modelo
        $data = array();
        foreach ($datos as $row) {
            $sub_array = array();

            $sub_array[] = $row["cli_id"];
            if ($row["cli_est"] == 1) {
                $sub_array[] = '<button type="button" onclick="Desactivar(' . $row["cli_id"] . ')" id="' . $row["cli_id"] . '" class="btn btn-outline-danger btn-sm">Desac</button>';
            } else {
                $sub_array[] = '<button type="button" disabled class="btn btn-outline-danger btn-sm"><i class="fas fa-times fa-xs"></i></button>';
            }
            if ($row["cli_est"] == 1) {
                $sub_array[] = '<a type="button" class="btn btn-info btn-sm selec-casa" href="#" onclick="CargaPlantilla(\'view/mntcasasxclientes/index.php?cli_id=' . $row["cli_id"] . '&nombre=' . urlencode($row["nombre_completo"]) . '\', \'content-wp\')">Casas(Shift)(H)</a>';
            } else {
                $sub_array[] = '<button type="button" disabled class="btn btn-info btn-sm">Casas</button>';
            }
            
            
            if ($row["cli_est"] == 1) {
                $sub_array[] = '<a type="button" class="editar-cliente" onclick="editar(' . $row["cli_id"] . ')" id="' . $row["cli_id"] . '">' . $row["nombre_completo"] . '</a>';

            } else {
                $sub_array[] = $row["nombre_completo"];
            }

            if ($row["cli_est"] == 1) {
                $sub_array[] = '<span class="badge badge-pill badge-success">Activo</span> |
                <div class="icheck-success d-inline">
                    <input class="form-check-input" type="checkbox" id="checkboxSuccess' . $row["cli_id"] . '" data-id="' . $row["cli_id"] . '">
                    <label class="form-check-label" for="checkboxSuccess' . $row["cli_id"] . '"></label>
                </div>';
            } else {
                $sub_array[] = '<span class="badge badge-pill badge-danger">Suspendido</span>';
            }
            $sub_array[] = $row["cli_dni"];
            $sub_array[] = $row["cli_sexo"];
            $sub_array[] = $row["cli_correo"];
            $sub_array[] = $row["cli_fono"];
            
            
            $fb = $row["cli_fb"];
            $fbaux = explode(";", $fb);
            $html = '';
            
            foreach ($fbaux as $url) {
                if (strpos($url, "?") !== false) {
                    $parts = explode("?", $url);
                    $name = end($parts);
                    $html .= '<a class="btn btn-sm btn-success ml-2" target="_blank" href="' . $url . '">' . $name . '</a>';
                } else {
                    $html .= '<a class="btn btn-sm btn-success ml-2" target="_blank" href="' . $url . '">FB</a>';
                }
            }
            
            $sub_array[] = $html;
            

            $sub_array[] = $row["cli_linkGooContac"];
            $sub_array[] = $row["cli_linkGooFotoAparatos"];
            $sub_array[] = $row["cli_zona"];
            $sub_array[] = $row["cli_direccion"];
            $sub_array[] = $row["cliente12"];
            $sub_array[] = $row["cliente13"];
            $sub_array[] = $row["cliente14"];
            $sub_array[] = $row["cliente15"];
            $sub_array[] = $row["cliente16"];
            $sub_array[] = $row["cliente17"];
            $sub_array[] = $row["cliente18"];
            $sub_array[] = $row["cliente19"];
            $sub_array[] = $row["cliente20"];



            $data[] = $sub_array;
        };
        $results = array(
            "sEcho" => 1, //INFORMACION PARA EL TABLES
            "iTotalRecords" => count($datos), //enviamos el total de registros al dataTable
            "iTotalDisplayRecords" => count($datos), //enviamos el total de registros a visualizar
            "aaData" => $data
        );

        echo json_encode($results);
    break;
    case "listarDesactivados":
        $datos = $cliente->listarClientesDesactivados(); // Método para obtener los clientes activos desde tu modelo
        $data = array();
        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row["cli_id"];
            if ($row["cli_est"] == 0) {
                $sub_array[] = '<button type="button" onclick="Activar(' . $row["cli_id"] . ')" id="' . $row["cli_id"] . '" class="btn btn-outline-success btn-sm">Activ</button> 
                <button type="button" onclick="eliminar(' . $row["cli_id"] . ')" id="' . $row["cli_id"] . '" class="btn btn-outline-danger btn-sm">Elim</button>';
            } else {
                $sub_array[] = '<button type="button" disabled class="btn btn-outline-danger btn-sm">Elim</button>';
            }
            if ($row["cli_est"] == 1) {
                $sub_array[] = '<a type="button" class="btn btn-info btn-sm" href="#" onclick="CargaPlantilla(\'view/mntcasasxclientes/index.php?cli_id=' . $row["cli_id"] . '&nombre=' . urlencode($row["nombre_completo"]) . '&id_casas=' . '\', \'content-wp\')">Casas</a>';
            } else {
                $sub_array[] = '<button type="button" disabled class="btn btn-info btn-sm">Casas</button>';
            }
            
            
            if ($row["cli_est"] == 0) {
                $sub_array[] = '<a type="button" onclick="editar(' . $row["cli_id"] . ')" id="' . $row["cli_id"] . '">' . $row["nombre_completo"] . '</a>';
            } else {
                $sub_array[] = $row["nombre_completo"];
            }

            if ($row["cli_est"] == 1) {
                $sub_array[] = '<span class="badge badge-pill badge-success">Activo</span>';
            } else {
                $sub_array[] = '<span class="badge badge-pill badge-danger">Suspendido</span>';
            }
            $sub_array[] = $row["cli_dni"];
            $sub_array[] = $row["cli_sexo"];
            $sub_array[] = $row["cli_correo"];
            $sub_array[] = $row["cli_fono"];
            $sub_array[] = '<a href="' . $row["cli_fb"] . '" target="_blank">' . $row["cli_fb"] . '</a>';
            $sub_array[] = $row["cli_linkGooContac"];
            $sub_array[] = $row["cli_linkGooFotoAparatos"];
            $sub_array[] = $row["cli_zona"];
            $sub_array[] = $row["cli_direccion"];
            $sub_array[] = $row["cliente12"];
            $sub_array[] = $row["cliente13"];
            $sub_array[] = $row["cliente14"];
            $sub_array[] = $row["cliente15"];
            $sub_array[] = $row["cliente16"];
            $sub_array[] = $row["cliente17"];
            $sub_array[] = $row["cliente18"];
            $sub_array[] = $row["cliente19"];
            $sub_array[] = $row["cliente20"];



            $data[] = $sub_array;
        };
        $results = array(
            "sEcho" => 1, //INFORMACION PARA EL TABLES
            "iTotalRecords" => count($datos), //enviamos el total de registros al dataTable
            "iTotalDisplayRecords" => count($datos), //enviamos el total de registros a visualizar
            "aaData" => $data
        );

        echo json_encode($results);
    break;
        // case "vista":

        // break;
}
