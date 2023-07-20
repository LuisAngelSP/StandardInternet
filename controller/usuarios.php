<?php  
/**LLAMANDO A CADENA DE CONEXION */
require_once("../config/conexion.php");
/**LLAMANDO A LA CLASE */
require_once("../model/Usuario.php");
    /**INICIALIZANDO CLASE */
    $usuario = new Usuario();

/**OPCION DE SOLICITUD DE CONTROLLER */
    switch($_GET["op"]){

        case "guardaryeditar":
            if(empty($_POST["usu_id"])){
                $usuario->insert_usuario($_POST["usu_nombre"],$_POST["usu_cedula"],$_POST["usu_cargo"],$_POST["usu_usuario"],$_POST["usu_password"],$_POST["usu_nivel"],$_POST["usu_fech_ingreso"]);
            }else{
                $usuario->update_usuario($_POST["usu_id"],$_POST["usu_nombre"],$_POST["usu_cedula"],$_POST["usu_cargo"],$_POST["usu_usuario"],$_POST["usu_password"],$_POST["usu_nivel"],$_POST["usu_fech_ingreso"]);
            }
            break;

        case "listar":

            $datos=$usuario->get_usuario();
            $data=array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["usu_nombre"];
                $sub_array[] = $row["usu_cedula"];
                $sub_array[] = $row["usu_cargo"];
                $sub_array[] = $row["usu_usuario"];
                $sub_array[] = $row["usu_password"];
                $sub_array[] = $row["usu_nivel"];
                $sub_array[] = $row["usu_fech_ingreso"];

                if($row["usu_est"]==1){
                    $sub_array[]='<span class="badge badge-pill badge-success">Activo</span>';
                }else{
                    $sub_array[]='<span class="badge badge-pill badge-danger">Suspendido</span>';
                }

                if($row["usu_est"]==1){
                    $sub_array[] = '<button type="button" Onclick="editar('.$row["usu_id"].')" id="'.$row["usu_id"].'" class="btn btn-info"><i class="fas fa-edit"></i></button>';
                }else{
                    $sub_array[] = '<button type="button"  disabled class="btn btn-info"><i class="fas fa-edit"></i></button>';
                }
                
                if($row["usu_est"]==1){
                    $sub_array[] = '<button type="button" Onclick="eliminar('.$row["usu_id"].')" id="'.$row["usu_id"].'" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>';
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

                $usuario->delete_usuario($_POST["usu_id"]);
            

            break;

        // /**CREANDO JSON DEGUN ID */
        case "mostrar":
            $datos=$usuario->get_usuario_x_id($_POST["usu_id"]);
            if(is_array($datos)==true and count($datos)<>0){
                foreach($datos as $row){
                    $output["usu_id"]= $row["usu_id"];
                    $output["usu_nombre"]= $row["usu_nombre"];
                    $output["usu_cedula"]= $row["usu_cedula"];
                    $output["usu_cargo"]= $row["usu_cargo"];
                    $output["usu_usuario"]= $row["usu_usuario"];
                    $output["usu_password"]= $row["usu_password"];
                    $output["usu_nivel"]= $row["usu_nivel"];
                    $output["usu_fech_ingreso"]= $row["usu_fech_ingreso"];
                }
                echo json_encode($output);
            }
            break;
    }




?>