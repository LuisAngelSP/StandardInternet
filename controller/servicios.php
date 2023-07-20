<?php  
/**LLAMANDO A CADENA DE CONEXION */
require_once("../config/conexion.php");
/**LLAMANDO A LA CLASE */
require_once("../model/Servicio.php");
    /**INICIALIZANDO CLASE */
    $servicio = new Servicio();

/**OPCION DE SOLICITUD DE CONTROLLER */
    switch($_GET["op"]){

        case "guardaryeditar":
            if(empty($_POST["serv_id"])){
                $servicio->insert_servicio($_POST["serv_nom"],$_POST["serv_obser"]);
            }else{
                $servicio->update_servicio($_POST["serv_id"],$_POST["serv_nom"],$_POST["serv_obser"]);
            }
            break;

        case "listar":

            $datos=$servicio->get_servicio();
            $data=array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["serv_nom"];
                $sub_array[] = $row["serv_obser"];
                if($row["serv_est"]==1){
                    $sub_array[]='<span class="badge badge-pill badge-success">Activo</span>';
                }else{
                    $sub_array[]='<span class="badge badge-pill badge-danger">Suspendido</span>';
                }
                if($row["serv_est"]==1){
                    $sub_array[] = '<button type="button" Onclick="editar('.$row["serv_id"].')" id="'.$row["serv_id"].'" class="btn btn-info"><i class="fas fa-edit"></i></button>';
                }else{
                    $sub_array[] = '<button type="button"  disabled class="btn btn-info"><i class="fas fa-edit"></i></button>';
                }
                
                if($row["serv_est"]==1){
                    $sub_array[] = '<button type="button" Onclick="eliminar('.$row["serv_id"].')" id="'.$row["serv_id"].'" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>';
                }else{
                    $sub_array[] = '<button type="button" disabled class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>';
                }
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

                $servicio->delete_servicio($_POST["serv_id"]);
            

            break;

        /**CREANDO JSON DEGUN ID */
        case "mostrar":
            $datos=$servicio->get_servicio_x_id($_POST["serv_id"]);
            if(is_array($datos)==true and count($datos)<>0){
                foreach($datos as $row){
                    $output["serv_id"]= $row["serv_id"];
                    $output["serv_nom"]= $row["serv_nom"];
                    $output["serv_obser"]= $row["serv_obser"];
                }
                echo json_encode($output);
            }
            break;
    }




?>