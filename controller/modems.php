<?php

  require_once("../config/conexion.php");  

  require_once("../model/Modem.php");

  $modem= new Modem();

  switch($_GET["op"]){ 

    case  "listar" :

        $datos=$modem->get_modem();
        $data=array();

        foreach($datos as $row){
            $sub_array= array();

            $sub_array[]= $row["mod_descripcion"];
            $sub_array[]= $row["contrato"];
            $sub_array[]= $row["TITULAR"];
            $sub_array[]= $row["mod_imagen"];
            $sub_array[]= $row["mod_codigo_acceso"];
            $sub_array[]= $row["mod_marca"];
            $sub_array[]= $row["mod_modelo"];
            $sub_array[]= $row["mod_serie"];
            $sub_array[]= $row["mod_wifi"];
            $sub_array[]= $row["mod_password"];
            $sub_array[]= $row["mod_wifi_default"];
            $sub_array[]= $row["mod_pass_default"];
            $sub_array[]= $row["mod_idaccess"];
            $sub_array[]= $row["id_cli"];
            $sub_array[]= $row["modem13"];
            $sub_array[]= $row["modem14"];
            $sub_array[]= $row["modem15"];
            $sub_array[]= $row["modem16"];
            $sub_array[]= $row["modem17"];
            $sub_array[]= $row["modem18"];
            $sub_array[]= $row["modem19"];
            $sub_array[]= $row["modem20"];


            if($row["mod_estado"]==1){
                $sub_array[]='<span class="badge badge-pill badge-success">Activo</span>';
            }else{
                $sub_array[]='<span class="badge badge-pill badge-danger">Suspendido</span>';
            }

            if($row["mod_estado"]==1){
                $sub_array[] = '<button type="button" Onclick="editar('.$row["id_modem"].')" id="'.$row["id_modem"].'" class="btn btn-info"><i class="fas fa-edit"></i></button>';
            }else{
                $sub_array[] = '<button type="button"  disabled class="btn btn-info"><i class="fas fa-edit"></i></button>';
            }
            
            if($row["mod_estado"]==1){
                $sub_array[] = '<button type="button" Onclick="eliminar('.$row["id_modem"].')" id="'.$row["id_modem"].'" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>';
            }else{
                $sub_array[] = '<button type="button" disabled class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>';
            }
        
            $data[]=$sub_array;
            
        };

        $result = array(
            "sEcho"=>1,
            "iTotalRecords"=>count($datos),
            "iTotalDisplayRecords"=>count($datos),
            "aaData"=>$data
        );

        echo json_encode($result);

        break;


    case "guardaryeditar":           
            
            if(!empty($_POST["id_modem"])){

                if(!empty($_POST["id_modem"]) && $_POST["id_contrato"] === ""){
                    $modem->update_modem($_POST["id_modem"],$_POST["mod_descripcion"],$_POST["mod_imagen"],$_POST["mod_codigo_acceso"],$_POST["mod_marca"],$_POST["mod_modelo"],$_POST["mod_serie"],$_POST["mod_wifi"],$_POST["mod_password"],$_POST["mod_wifi_default"],$_POST["mod_pass_default"],$_POST["mod_idaccess"],$_POST["id_cli"],$_POST["modem13"],$_POST["modem14"],$_POST["modem15"],$_POST["modem16"],$_POST["modem17"],$_POST["modem18"],$_POST["modem19"],$_POST["modem20"],NULL);

                }else{
                    $modem->update_modem($_POST["id_modem"],$_POST["mod_descripcion"],$_POST["mod_imagen"],$_POST["mod_codigo_acceso"],$_POST["mod_marca"],$_POST["mod_modelo"],$_POST["mod_serie"],$_POST["mod_wifi"],$_POST["mod_password"],$_POST["mod_wifi_default"],$_POST["mod_pass_default"],$_POST["mod_idaccess"],$_POST["id_cli"],$_POST["modem13"],$_POST["modem14"],$_POST["modem15"],$_POST["modem16"],$_POST["modem17"],$_POST["modem18"],$_POST["modem19"],$_POST["modem20"],$_POST["id_contrato"]);

                } 

            }
            
            if(empty($_POST["id_modem"])){

                if(empty($_POST["id_modem"]) && $_POST["id_contrato"] === "") {
                    $modem->insert_modem($_POST["mod_descripcion"],$_POST["mod_imagen"],$_POST["mod_codigo_acceso"],$_POST["mod_marca"],$_POST["mod_modelo"],$_POST["mod_serie"],$_POST["mod_wifi"],$_POST["mod_password"],$_POST["mod_wifi_default"],$_POST["mod_pass_default"],$_POST["mod_idaccess"],$_POST["id_cli"],$_POST["modem13"],$_POST["modem14"],$_POST["modem15"],$_POST["modem16"],$_POST["modem17"],$_POST["modem18"],$_POST["modem19"],$_POST["modem20"],NULL);

                }else{
                    $modem->insert_modem($_POST["mod_descripcion"],$_POST["mod_imagen"],$_POST["mod_codigo_acceso"],$_POST["mod_marca"],$_POST["mod_modelo"],$_POST["mod_serie"],$_POST["mod_wifi"],$_POST["mod_password"],$_POST["mod_wifi_default"],$_POST["mod_pass_default"],$_POST["mod_idaccess"],$_POST["id_cli"],$_POST["modem13"],$_POST["modem14"],$_POST["modem15"],$_POST["modem16"],$_POST["modem17"],$_POST["modem18"],$_POST["modem19"],$_POST["modem20"],$_POST["id_contrato"]);

                }

            };

        break;   




    case "mostrar":
            $datos=$modem->get_modem_x_id($_POST["id_modem"]);
            if(is_array($datos)==true and count($datos)<>0){
                foreach($datos as $row){
                    $output["id_modem"]= $row["id_modem"];
                    $output["mod_descripcion"]= $row["mod_descripcion"];
                    $output["mod_imagen"]= $row["mod_imagen"];
                    $output["mod_codigo_acceso"]= $row["mod_codigo_acceso"];
                    $output["mod_marca"]= $row["mod_marca"];
                    $output["mod_modelo"]= $row["mod_modelo"];
                    $output["mod_serie"]= $row["mod_serie"];
                    $output["mod_wifi"]= $row["mod_wifi"];
                    $output["mod_password"]= $row["mod_password"];
                    $output["mod_wifi_default"]= $row["mod_wifi_default"];
                    $output["mod_pass_default"]= $row["mod_pass_default"];
                    $output["mod_idaccess"]= $row["mod_idaccess"];
                    $output["id_cli"]= $row["id_cli"];
                    $output["modem13"]= $row["modem13"];
                    $output["modem14"]= $row["modem14"];
                    $output["modem15"]= $row["modem15"];
                    $output["modem16"]= $row["modem16"];
                    $output["modem17"]= $row["modem17"];
                    $output["modem18"]= $row["modem18"];
                    $output["modem19"]= $row["modem19"];
                    $output["modem20"]= $row["modem20"];
                    $output["id_contrato"]= $row["id_contrato"];
                    
                }
                echo json_encode($output);
            }
    break;
        
   
   
   
   
   
    /********VERIFICACION DE DECOS - MODULAR ******** */

    case "verificarModem":
        if (isset($_POST["mod_id"])) {
            $datos = $modem->verificarModem($_POST["mod_id"]);
            if (is_array($datos) == true and count($datos) <> 0) {
                foreach ($datos as $row) {
                    $output["mod_id"] = $row["id_modem"];
                    $output["cliente_modem"] = $row["cliente_modem"];
                    $output["mod_estado"] = $row["mod_estado"];
                }
                echo json_encode($output);
            }
        }
    break;
        
    case "actualizarCliente":
        $mod_id = isset($_POST["mod_id"]) ? $_POST["mod_id"] : null;
        $cli_id = isset($_POST["cli_id"]) ? $_POST["cli_id"] : null;
    
        $modem->actualizarClienteModems($mod_id, $cli_id);
    break;  

    case "liberarModem":
        $mod_id = isset($_POST["mod_id"]) ? $_POST["mod_id"] : null;
    
        $modem->liberar_modem($mod_id);

    break;
    
    
    
    
    
    
    };
  
  




?>



