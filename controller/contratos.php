<?php

require_once ("../config/conexion.php");

require_once("../model/Contrato.php");

$contrato = new Contrato();


    switch($_GET["op"]){

        case "listar":
            $datos=$contrato->get_contrato();
            $data= array();

            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["id_contrato"];
                $sub_array[] = $row["contr_descripcion"];
                $sub_array[] = $row["nombre_titular"];
                $sub_array[] = $row["contr_tip_conexion"];
                $sub_array[] = $row["contr_fech"];
                $sub_array[] = $row["contr_tarifa"];
                $sub_array[] = $row["contr_fech_Inst"];
                $sub_array[] = $row["mapaCoordenadasUbicacion"];
                $sub_array[] = $row["contr_direccion"];
                $sub_array[] = $row["contrato14"];
                $sub_array[] = $row["contrato15"];
                $sub_array[] = $row["contrato16"];
                $sub_array[] = $row["contrato17"];
                $sub_array[] = $row["contrato18"];
                $sub_array[] = $row["contrato19"];
                $sub_array[] = $row["contrato20"];
                
                if($row["contr_est"]==1){
                    $sub_array[]='<span class="badge badge-pill badge-success">Activo</span>';
                }else{
                    $sub_array[]='<span class="badge badge-pill badge-danger">Suspendido</span>';
                }

                if($row["contr_est"]==1){
                    $sub_array[] = '<button type="button" Onclick="editar('.$row["id_contrato"].')" id="'.$row["id_contrato"].'" class="btn btn-info"><i class="fas fa-edit"></i></button>';
                }else{
                    $sub_array[] = '<button type="button"  disabled class="btn btn-info"><i class="fas fa-edit"></i></button>';
                }
                
                if($row["contr_est"]==1){
                    $sub_array[] = '<button type="button" Onclick="eliminar('.$row["id_contrato"].')" id="'.$row["id_contrato"].'" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>';
                }else{
                    $sub_array[] = '<button type="button" disabled class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>';
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
            $id_contrato = $_POST["id_contrato"];
            $id_titular = $_POST["id_titular"] === "" ? null : $_POST["id_titular"];
            $contr_descripcion = $_POST["contr_descripcion"];
            $contr_tip_conexion = $_POST["contr_tip_conexion"];
            $contr_fech = $_POST["contr_fech"];
            $contr_tarifa = $_POST["contr_tarifa"];
            $contr_fech_Inst = $_POST["contr_fech_Inst"];
            $mapaCoordenadasUbicacion = $_POST["mapaCoordenadasUbicacion"];
            $contr_direccion = $_POST["contr_direccion"];
            $contrato14 = $_POST["contrato14"];
            $contrato15 = $_POST["contrato15"];
            $contrato16 = $_POST["contrato16"];
            $contrato17 = $_POST["contrato17"];
            $contrato18 = $_POST["contrato18"];
            $contrato19 = $_POST["contrato19"];
            $contrato20 = $_POST["contrato20"];
        
            if(!empty($id_contrato)) {
                $contrato->update_contrato($id_contrato, $contr_descripcion, $id_titular, $contr_tip_conexion, $contr_fech, $contr_tarifa, $contr_fech_Inst, $mapaCoordenadasUbicacion, $contr_direccion, $contrato14, $contrato15, $contrato16, $contrato17, $contrato18, $contrato19, $contrato20);
            } else {
                $contrato->insert_contrato($contr_descripcion, $id_titular, $contr_tip_conexion, $contr_fech, $contr_tarifa, $contr_fech_Inst, $mapaCoordenadasUbicacion, $contr_direccion, $contrato14, $contrato15, $contrato16, $contrato17, $contrato18, $contrato19, $contrato20);
            }
        break; 

        case "mostrar":
            $datos=$contrato->get_contrato_x_id($_POST["id_contrato"]);
            if(is_array($datos)==true and count($datos)<>0){
                foreach($datos as $row){
                    $output["id_contrato"]= $row["id_contrato"];
                    $output["contr_descripcion"]= $row["contr_descripcion"];
                    $output["id_titular"]= $row["id_titular"];
                    $output["contr_tip_conexion"]= $row["contr_tip_conexion"];
                    $output["contr_fech"]= $row["contr_fech"];
                    $output["contr_tarifa"]= $row["contr_tarifa"];
                    $output["contr_fech_Inst"]= $row["contr_fech_Inst"];
                    $output["mapaCoordenadasUbicacion"]= $row["mapaCoordenadasUbicacion"];
                    $output["contr_direccion"]= $row["contr_direccion"];
                    $output["contrato14"]= $row["contrato14"];
                    $output["contrato15"]= $row["contrato15"];
                    $output["contrato16"]= $row["contrato16"];
                    $output["contrato17"]= $row["contrato17"];
                    $output["contrato18"]= $row["contrato18"];
                    $output["contrato19"]= $row["contrato19"];
                    $output["contrato20"]= $row["contrato20"];


                }
                echo json_encode($output);
            }
            break;
        
    };
    
    

?>