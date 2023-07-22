<?php  
require_once("../config/conexion.php");
require_once("../model/Compromiso.php");

    $compromiso = new Compromiso();

/**OPCION DE SOLICITUD DE CONTROLLER */
    switch($_GET["op"]){

        case "guardaryeditar":
            if(!empty($_POST["id_compromiso"])){
                
                $compromiso->update_compromiso($_POST["id_compromiso"],$_POST["comp_fech"],$_POST["comp_descrip"],$_POST["comp_tipo"]);

            }else{

                $compromiso->insert_compromiso($_POST["id_cliente"],$_POST["comp_fech"],$_POST["comp_descrip"],$_POST["comp_tipo"]);
            }
            break;

        case "listar":

            $datos=$compromiso->get_compromiso();
            $data=array();
            foreach($datos as $row){
                $sub_array = array();

                $sub_array[] = '<button type="button" onclick="eliminarCompromiso('.$row["id_compromiso"].')" id="'.$row["id_compromiso"].'" class="btn btn-danger btn-sm">
                <i class="fas fa-trash-alt"></i>
              </button>
             
                <button type="button" onclick="Realizado('.$row["id_compromiso"].')" id="'.$row["id_compromiso"].'" class="btn btn-success btn-sm"><i class="fas fa-check"></i></button> <button type="button" onclick="editar('.$row["id_compromiso"].')" id="'.$row["id_compromiso"].'" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></button>';
                $sub_array[] = $row["cliente"];
                $sub_array[] = $row["comp_fech"];
                $sub_array[] = $row["comp_descrip"];
                $sub_array[] = $row["comp_tipo"];
                if($row["comp_estado"]==1){
                    $sub_array[] = ' <p class="text-white m-2" style="font-size: 12px;">Compromiso no realizado</p>

                    ';
                }

                // Calcular la diferencia en días entre la fecha actual y la fecha de compromiso
                $fecha_compromiso = new DateTime($row["comp_fech"]);
                $fecha_actual = new DateTime();
                $diferencia = $fecha_actual->diff($fecha_compromiso)->format('%R%a');

                // Eliminamos el signo '+' o '-' de la diferencia
                $diferencia = intval($diferencia); // Obtener el número de días

                $sub_array[] = $diferencia; // Mostrar la diferencia en días
                

                $data[]=$sub_array;
            };
            $results=array(
                "sEcho"=>1,//INFORMACION PARA EL TABLES
                "iTotalRecords"=>count($datos),//enviamos el total de registros al dataTable
                "iTotalDisplayRecords"=>count($datos),//enviamos el total de registros a visualizar
                "aaData"=>$data );

                echo json_encode($results);
            break;
        
        /**ELIMINAR SEGUN ID */
        case "eliminar":

                $compromiso->delete_Comprimiso($_POST["id_compromiso"]);
            

        break;

        case "Realizado":

            $compromiso->realizado_compromiso($_POST["id_compromiso"]);
        
        break;

        // /**CREANDO JSON DEGUN ID */
        case "mostrar":
            $datos=$compromiso->get_compromiso_x_id($_POST["id_compromiso"]);
            if(is_array($datos)==true and count($datos)<>0){
                foreach($datos as $row){
                    $output["id_compromiso"]= $row["id_compromiso"];
                    $output["id_cliente"]= $row["id_cliente"];
                    $output["comp_fech"]= $row["comp_fech"];
                    $output["comp_descrip"]= $row["comp_descrip"];
                    $output["comp_tipo"]= $row["comp_tipo"];

                }
                echo json_encode($output);
            }

        break;
        case "listar_compromiso":
            $datos = $compromiso->get_compromiso_cercanos();
                $data = array();

                foreach ($datos as $row) {
                    $sub_array = array();

                    $sub_array[] = '<button type="button" onclick="Realizado('.$row["id_compromiso"].')" id="'.$row["id_compromiso"].'" class="btn btn-success btn-sm"><i class="fas fa-check"></i></button> <button type="button" onclick="editar('.$row["id_compromiso"].')" id="'.$row["id_compromiso"].'" class="compromiso_ btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></button>';
                    
                    $sub_array[] = $row["cliente"];
                    $sub_array[] = $row["comp_fech"];
                    $sub_array[] = $row["comp_descrip"];
                    $sub_array[] = $row["comp_tipo"];
                    if($row["comp_estado"]==1){
                        $sub_array[] = '<p class="text-white m-2" style="font-size: 12px;">Compromiso no realizado</p>
                        ';
                    }
                    
                    // Calcular la diferencia en días entre la fecha actual y la fecha de compromiso
                    $fecha_compromiso = new DateTime($row["comp_fech"]);
                    $fecha_actual = new DateTime();
                    $diferencia = $fecha_actual->diff($fecha_compromiso)->format('%R%a');

                    // Eliminamos el signo '+' o '-' de la diferencia
                    $diferencia = intval($diferencia); // Obtener el número de días

                    $sub_array[] = $diferencia; // Mostrar la diferencia en días
                    
                    $data[] = $sub_array;
                }

                $results = array(
                    "sEcho" => 1,
                    "iTotalRecords" => count($datos),
                    "iTotalDisplayRecords" => count($datos),
                    "aaData" => $data
                );

                echo json_encode($results);

            break;


        case "historial_compromiso":
                $datos = $compromiso->historial_compromiso();
                    $data = array();
    
                    foreach ($datos as $row) {
                        $sub_array = array();
    
                        $sub_array[] = '<i class="fas fa-check"></i>';
                        $sub_array[] = $row["cliente"];
                        $sub_array[] = $row["comp_fech"];
                        $sub_array[] = $row["comp_descrip"];
                        $sub_array[] = $row["comp_tipo"];
                        if($row["comp_estado"]==0){
                            $sub_array[] = '<p class="text-success m-2" style="font-size: 12px;">Compromiso realizado</p>';

                        }
                        
                        
                        
                        
                        $data[] = $sub_array;
                    }
    
                    $results = array(
                        "sEcho" => 1,
                        "iTotalRecords" => count($datos),
                        "iTotalDisplayRecords" => count($datos),
                        "aaData" => $data
                    );
    
                    echo json_encode($results);
    
        break;
    
    
            // case "vista":
    

        // break;
    }
