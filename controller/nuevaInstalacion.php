<?php

require_once ("../config/conexion.php");

require_once("../model/NuevaInstalacion.php");

$instalacion = new NuevaInstalacion();


    switch($_GET["op"]){

        case "listar":
            $datos=$instalacion->get_instalacion();
            $data= array();

            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["inst_id"];
                if ($row["inst_est"] == 1) {
                    $sub_array[] = '<button type="button" onclick="eliminar(' . $row["inst_id"] . ')" id="' . $row["inst_id"] . '" class="btn btn-outline-danger btn-sm">Elim</button>';
                } else {
                    $sub_array[] = '<button type="button" disabled class="btn btn-outline-danger btn-sm">Elim</button>';
                }
                if($row["inst_est"]==1){
                    $sub_array[] = '<a type="button" onclick="editar('.$row["inst_id"].')" id="'.$row["inst_id"].'">'.$row["Cliente"].'</a>';
                    ;
                    } else {
                        $sub_array[] = $row["Cliente"];
                    
                    }
                    
                if($row["inst_est"]==1){
                    $sub_array[]='<span class="badge badge-pill badge-success">Activo</span>';
                }else{
                    $sub_array[]='<span class="badge badge-pill badge-danger">Suspendido</span>';
                }

                $sub_array[]= $row["Servicio"];
                $sub_array[] = $row["inst_precio"];
                $sub_array[] = $row["inst_observacion"];
                $sub_array[] = $row["cantidad_metros_cable"];
                $sub_array[] = $row["inst_fech"];
                $sub_array[] = $row["Modems"];
                $sub_array[] = $row["Routers"];
                $sub_array[] = $row["Decos"];
                $sub_array[] = $row["import_servicio"];
                $sub_array[] = $row["lugar_conexion"];
                $sub_array[] = $row["id_casas"];
                $sub_array[] = $row["cuenta_usuario"];
                $sub_array[] = $row["contra_usuario"];
                $sub_array[] = $row["perfil_usuario"];
                $sub_array[] = $row["tipo_conexion"];
                $sub_array[] = $row["velocidad_MB"];
                $sub_array[] = $row["instalacion17"];
                $sub_array[] = $row["instalacion18"];
                $sub_array[] = $row["instalacion19"];
                $sub_array[] = $row["instalacion20"];
                $sub_array[] = $row["instalacion21"];
                $sub_array[] = $row["instalacion22"];
                $sub_array[] = $row["instalacion23"];
                $sub_array[] = $row["instalacion24"];
                $sub_array[] = $row["instalacion25"];


                if($row["inst_est"]==1){
                    $sub_array[] = '<button type="button" Onclick="editar('.$row["inst_id"].')" id="'.$row["inst_id"].'" class="btn btn-info"><i class="fas fa-edit"></i></button>';
                }else{
                    $sub_array[] = '<button type="button"  disabled class="btn btn-info"><i class="fas fa-edit"></i></button>';
                }
                

                $data[]=$sub_array;
            }
            $result=array(
                "sEcho"=>1,
                "iTotalRecords"=>count($datos),
                "iTotalDisplayRecords"=>count($datos),
                "aaData"=>$data

            );
            echo json_encode($result);


        break;
 
        case "guardaryeditar":
            $cli_id = !empty($_POST["cli_id"]) ? $_POST["cli_id"] : null;
            $serv_id = !empty($_POST["serv_id"]) ? $_POST["serv_id"] : null;
            $mod_id = !empty($_POST["mod_id"]) ? $_POST["mod_id"] : null;
            $rout_id = !empty($_POST["rout_id"]) ? $_POST["rout_id"] : null;
            $deco_id = !empty($_POST["deco_id"]) ? $_POST["deco_id"] : null;
            
            if (!empty($_POST["inst_id"])) {
              $instalacion->update_instalacion(
                $_POST["inst_id"],
                $cli_id,
                $serv_id,
                $_POST["inst_precio"],
                $_POST["inst_observacion"],
                $_POST["cantidad_metros_cable"],
                $_POST["inst_fech"],
                $mod_id,
                $rout_id,
                $deco_id,
                $_POST["import_servicio"],
                $_POST["lugar_conexion"],
                $_POST["id_casas"],
                $_POST["cuenta_usuario"],
                $_POST["contra_usuario"],
                $_POST["perfil_usuario"],
                $_POST["tipo_conexion"],
                $_POST["velocidad_MB"],
                $_POST["instalacion17"],
                $_POST["instalacion18"],
                $_POST["instalacion19"],
                $_POST["instalacion20"],
                $_POST["instalacion21"],
                $_POST["instalacion22"],
                $_POST["instalacion23"],
                $_POST["instalacion24"],
                $_POST["instalacion25"]
              );
            } else {
              $instalacion->insert_instalacion(
                $cli_id,
                $serv_id,
                $_POST["inst_precio"],
                $_POST["inst_observacion"],
                $_POST["cantidad_metros_cable"],
                $_POST["inst_fech"],
                $mod_id,
                $rout_id,
                $deco_id,
                $_POST["import_servicio"],
                $_POST["lugar_conexion"],
                $_POST["id_casas"],
                $_POST["cuenta_usuario"],
                $_POST["contra_usuario"],
                $_POST["perfil_usuario"],
                $_POST["tipo_conexion"],
                $_POST["velocidad_MB"],
                $_POST["instalacion17"],
                $_POST["instalacion18"],
                $_POST["instalacion19"],
                $_POST["instalacion20"],
                $_POST["instalacion21"],
                $_POST["instalacion22"],
                $_POST["instalacion23"],
                $_POST["instalacion24"],
                $_POST["instalacion25"]
              );
            }
        case "mostrar":
            $datos=$instalacion->get_instalacion_x_id($_POST["inst_id"]);
            if(is_array($datos)==true and count($datos)<>0){
                foreach($datos as $row){
                    $output["inst_id"]= $row["inst_id"];
                    $output["cli_id"]= $row["cli_id"];
                    $output["serv_id"]= $row["serv_id"];
                    $output["inst_precio"]= $row["inst_precio"];
                    $output["inst_observacion"]= $row["inst_observacion"];
                    $output["cantidad_metros_cable"]= $row["cantidad_metros_cable"];
                    $output["inst_fech"]= $row["inst_fech"];
                    $output["mod_id"]= $row["mod_id"];
                    $output["rout_id"]= $row["rout_id"];
                    $output["deco_id"]= $row["deco_id"];
                    $output["import_servicio"]= $row["import_servicio"];
                    $output["lugar_conexion"]= $row["lugar_conexion"];
                    $output["id_casas"]= $row["id_casas"];
                    $output["cuenta_usuario"]= $row["cuenta_usuario"];
                    $output["contra_usuario"]= $row["contra_usuario"];
                    $output["perfil_usuario"]= $row["perfil_usuario"];
                    $output["tipo_conexion"]= $row["tipo_conexion"];
                    $output["velocidad_MB"]= $row["velocidad_MB"];
                    $output["instalacion17"]= $row["instalacion17"];
                    $output["instalacion18"]= $row["instalacion18"];
                    $output["instalacion19"]= $row["instalacion19"];
                    $output["instalacion20"]= $row["instalacion20"];
                    $output["instalacion21"]= $row["instalacion21"];
                    $output["instalacion22"]= $row["instalacion22"];
                    $output["instalacion23"]= $row["instalacion23"];
                    $output["instalacion24"]= $row["instalacion24"];
                    $output["instalacion25"]= $row["instalacion25"];
                    
                }
                echo json_encode($output);
            }
        break;

        case "eliminar":

            $instalacion->delete_instalacion($_POST["inst_id"]);
        

        break;

    };


?>