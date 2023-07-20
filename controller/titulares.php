<?php

require_once ("../config/conexion.php");

require_once("../model/Titular.php");

$titular = new Titular();
 

    switch($_GET["op"]){

        case "listar":
            $datos=$titular->get_titular();
            $data= array();

            foreach($datos as $row){
                $sub_array = array();
                if($row["titu_est"]==1){
                    $sub_array[] = '<button type="button" Onclick="eliminar('.$row["id_titular"].')" id="'.$row["id_titular"].'" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>';
                }else{
                    $sub_array[] = '<button type="button" disabled class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>';
                }

                if($row["titu_est"]==1){
                    $sub_array[] = '<a type="button" onclick="editar('.$row["id_titular"].')" id="'.$row["id_titular"].'">'.$row["TITULAR"].'</a>';
                    ;
                    } else {
                        $sub_array[] = $row["TITULAR"];
                    
                    }
                
                if($row["titu_est"]==1){
                    $sub_array[]='<span class="badge badge-pill badge-success">Activo</span>';
                }else{
                    $sub_array[]='<span class="badge badge-pill badge-danger">Suspendido</span>';
                }
                $sub_array[] = $row["titu_fech_nac"];
                $sub_array[] = $row["titu_dni"];
                $sub_array[] = $row["titu_fech_caducidad"];
                $sub_array[] = $row["titu_nom_mama"];
                $sub_array[] = $row["titu_nom_papa"];
                $sub_array[] = $row["titular11"];
                $sub_array[] = $row["titular12"];
                $sub_array[] = $row["titular13"];
                $sub_array[] = $row["titular14"];
                $sub_array[] = $row["titular15"];
                $sub_array[] = $row["titular16"];
                $sub_array[] = $row["titular17"];
                $sub_array[] = $row["titular18"];
                $sub_array[] = $row["titular19"];
                $sub_array[] = $row["titular20"];

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
            if(!empty($_POST["id_titular"])){
                $titular->update_titular($_POST["id_titular"],$_POST["titu_nom"],$_POST["titu_apellido"],$_POST["titu_fech_nac"],$_POST["titu_dni"],$_POST["titu_fech_caducidad"],$_POST["titu_nom_mama"],$_POST["titu_nom_papa"],$_POST["titular11"],$_POST["titular12"],$_POST["titular13"],$_POST["titular14"],$_POST["titular15"],$_POST["titular16"],$_POST["titular17"],$_POST["titular18"],$_POST["titular19"],$_POST["titular20"]);

            }else{
                $titular->insert_titular($_POST["titu_nom"],$_POST["titu_apellido"],$_POST["titu_fech_nac"],$_POST["titu_dni"],$_POST["titu_fech_caducidad"],$_POST["titu_nom_mama"],$_POST["titu_nom_papa"],$_POST["titular11"],$_POST["titular12"],$_POST["titular13"],$_POST["titular14"],$_POST["titular15"],$_POST["titular16"],$_POST["titular17"],$_POST["titular18"],$_POST["titular19"],$_POST["titular20"]);
            };

        break;

        
        case "mostrar":
            $datos=$titular->get_titular_x_id($_POST["id_titular"]);
            if(is_array($datos)==true and count($datos)<>0){
                foreach($datos as $row){
                    $output["id_titular"]= $row["id_titular"];
                    $output["titu_nom"]= $row["titu_nom"];
                    $output["titu_apellido"]= $row["titu_apellido"];
                    $output["titu_fech_nac"]= $row["titu_fech_nac"];
                    $output["titu_dni"]= $row["titu_dni"];
                    $output["titu_fech_caducidad"]= $row["titu_fech_caducidad"];
                    $output["titu_nom_mama"]= $row["titu_nom_mama"];
                    $output["titu_nom_papa"]= $row["titu_nom_papa"];
                    $output["titular11"]= $row["titular11"];
                    $output["titular12"]= $row["titular12"];
                    $output["titular13"]= $row["titular13"];
                    $output["titular14"]= $row["titular14"];
                    $output["titular15"]= $row["titular15"];
                    $output["titular16"]= $row["titular16"];
                    $output["titular17"]= $row["titular17"];
                    $output["titular18"]= $row["titular18"];
                    $output["titular19"]= $row["titular19"];
                    $output["titular20"]= $row["titular20"];


                }
                echo json_encode($output);
            }
        break;

        case "eliminar":

            $titular->delete_titular($_POST["id_titular"]);
        

        break;

    };

    


?>