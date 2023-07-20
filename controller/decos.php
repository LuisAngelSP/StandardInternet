<?php

require_once("../config/conexion.php");
 
require_once("../model/Deco.php");

    $deco = new Deco();


    switch ($_GET["op"]){

        case  "listar" :

            $datos=$deco->get_deco();
            $data=array();

            foreach($datos as $row){
                $sub_array= array();
                if ($row["dec_estado"] == 1) {
                    $sub_array[] = '<button type="button" onclick="desactivar(' . $row["id_deco"] . ')" id="' . $row["id_deco"] . '" class="btn btn-outline-danger btn-sm ml-2">Desac</button> <button type="button" onclick="Libre(' . $row["id_deco"] . ')" id="' . $row["id_deco"] . '" class="btn btn-outline-primary btn-sm ml-2">Libr</button>';

                } else {
                    $sub_array[] = '<button type="button" disabled class="btn btn-outline-danger btn-sm">Elim</button> <button type="button" disabled class="btn btn-outline-primary btn-sm">Libr/button>';
                    
                }

                if($row["dec_estado"]==1){
                    $sub_array[] = '<a class="text-info editar-deco" style="cursor: pointer;" onclick="editar('.$row["id_deco"].')" id="'.$row["id_deco"].'">'.$row["dec_descripcion"].'</a>';
                    ;
                    } else {
                        $sub_array[] = $row["dec_descripcion"];
                    
                    }
                $sub_array[]= $row["cliente"];
                $sub_array[]= $row["contrato"]; 
                if ($row["dec_estado"] == 1) {
                    $sub_array[] = '<span class="badge badge-pill badge-success">Activo</span>';
                } elseif ($row["dec_estado"] == 2) {
                    $sub_array[] = '<span class="badge badge-pill badge-primary">Libre</span>';
                } elseif ($row["dec_estado"] == 0) {
                    $sub_array[] = '<span class="badge badge-pill badge-danger">Desactivado</span>';
                } else {
                    $sub_array[] = ''; // Manejo de otro estado (opcional)
                }
                $sub_array[]= $row["dec_cas_id"];
                $sub_array[]= $row["deco_nota"];
                $sub_array[]= $row["dec_proveedor"];
                $sub_array[]= $row["dec_rayado"];
                $sub_array[]= $row["dec_marca"];
                $sub_array[]= $row["dec_modelo"];
                $sub_array[]= $row["dec_serie"];
                $sub_array[]= $row["deco_linkGooFotoAparatos"];
                $sub_array[]= $row["datos_rescatados"];
                $sub_array[]= $row["deco14"];
                $sub_array[]= $row["deco15"];
                $sub_array[]= $row["deco16"];
                $sub_array[]= $row["deco17"];
                $sub_array[]= $row["deco18"];
                $sub_array[]= $row["deco19"];
                $sub_array[]= $row["deco20"];


            
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


            if(!empty($_POST["id_deco"])){

                if(!empty($_POST["id_deco"]) && $_POST["id_contrato"] === ""){
                    $deco->update_deco($_POST["id_deco"],$_POST["dec_descripcion"],NULL,$_POST["dec_cas_id"],$_POST["dec_proveedor"],$_POST["dec_rayado"],$_POST["dec_marca"],$_POST["dec_modelo"],$_POST["dec_serie"],$_POST["deco_nota"],$_POST["deco_linkGooFotoAparatos"],$_POST["datos_rescatados"],$_POST["deco14"],$_POST["deco15"],$_POST["deco16"],$_POST["deco17"],$_POST["deco18"],$_POST["deco19"],$_POST["deco20"]);

                }else{
                    $deco->update_deco($_POST["id_deco"],$_POST["dec_descripcion"],$_POST["id_contrato"],$_POST["dec_cas_id"],$_POST["dec_proveedor"],$_POST["dec_rayado"],$_POST["dec_marca"],$_POST["dec_modelo"],$_POST["dec_serie"],$_POST["deco_nota"],$_POST["deco_linkGooFotoAparatos"],$_POST["datos_rescatados"],$_POST["deco14"],$_POST["deco15"],$_POST["deco16"],$_POST["deco17"],$_POST["deco18"],$_POST["deco19"],$_POST["deco20"]);
                } 

            }
            
            if(empty($_POST["id_deco"])){

                if(empty($_POST["id_deco"]) && $_POST["id_contrato"] === "") {
                    $deco->insert_decos($_POST["dec_descripcion"],NULL,$_POST["dec_cas_id"],$_POST["dec_proveedor"],$_POST["dec_rayado"],$_POST["dec_marca"],$_POST["dec_modelo"],$_POST["dec_serie"],$_POST["deco_nota"],$_POST["deco_linkGooFotoAparatos"],$_POST["datos_rescatados"],$_POST["deco14"],$_POST["deco15"],$_POST["deco16"],$_POST["deco17"],$_POST["deco18"],$_POST["deco19"],$_POST["deco20"]);

                }else{
                    $deco->insert_decos($_POST["dec_descripcion"],$_POST["id_contrato"],$_POST["dec_cas_id"],$_POST["dec_proveedor"],$_POST["dec_rayado"],$_POST["dec_marca"],$_POST["dec_modelo"],$_POST["dec_serie"],$_POST["deco_nota"],$_POST["deco_linkGooFotoAparatos"],$_POST["datos_rescatados"],$_POST["deco14"],$_POST["deco15"],$_POST["deco16"],$_POST["deco17"],$_POST["deco18"],$_POST["deco19"],$_POST["deco20"]);
                }

            };

        break;   

        case "mostrar": 
                $datos=$deco->get_deco_x_id($_POST["id_deco"]);
                if(is_array($datos)==true and count($datos)<>0){
                    foreach($datos as $row){
                        $output["id_deco"]= $row["id_deco"];
                        $output["dec_descripcion"]= $row["dec_descripcion"];
                        $output["id_contrato"]= $row["id_contrato"];
                        $output["dec_cas_id"]= $row["dec_cas_id"];
                        $output["dec_proveedor"]= $row["dec_proveedor"];
                        $output["dec_rayado"]= $row["dec_rayado"];
                        $output["dec_marca"]= $row["dec_marca"];
                        $output["dec_modelo"]= $row["dec_modelo"];
                        $output["dec_serie"]= $row["dec_serie"];
                        $output["deco_nota"]= $row["deco_nota"];
                        $output["deco_linkGooFotoAparatos"]= $row["deco_linkGooFotoAparatos"];
                        $output["datos_rescatados"]= $row["datos_rescatados"];
                        $output["deco14"]= $row["deco14"];
                        $output["deco15"]= $row["deco15"];
                        $output["deco16"]= $row["deco16"];
                        $output["deco17"]= $row["deco17"];
                        $output["deco18"]= $row["deco18"];
                        $output["deco19"]= $row["deco19"];
                        $output["deco20"]= $row["deco20"];
    
    
                    }
                    echo json_encode($output);
                }
            break;
            
            case "desactivar": 

                $deco->desactivar_deco($_POST["id_deco"]);
        
        
        break;
        
        case "Activar":

            $deco->activar_deco($_POST["id_deco"]);
    
    
        break; 

        case "Desactivar":

            $deco->desactivar_deco($_POST["id_deco"]);
    
    
        break; 

        case "Libre":

            $deco->liberar_deco($_POST["id_deco"]);
    
    
        break;

        case "Eliminar": 

            $deco->eliminar_deco($_POST["id_deco"]);
    
    
        break;

        case  "listarActivos" : 
 
            $datos=$deco->listarDecosActivos();
            $data=array();

            foreach($datos as $row){
                $sub_array= array();

                if ($row["dec_estado"] == 1) {
                    $sub_array[] = '<button type="button" onclick="Desactivar(' . $row["id_deco"] . ')" id="' . $row["id_deco"] . '" class="btn btn-outline-danger btn-sm">Desac</button> <button type="button" onclick="Libre(' . $row["id_deco"] . ')" id="' . $row["id_deco"] . '" class="btn btn-outline-primary btn-sm">Libr</button>';

                } else {
                    $sub_array[] = '<button type="button" disabled class="btn btn-outline-danger btn-sm">Desac</button> <button type="button" disabled class="btn btn-outline-primary btn-sm">Libr</button>';
                    
                }
                if($row["dec_estado"]==1){
                    $sub_array[] = '<a class="text-info editar-deco" style="cursor: pointer;" type="button" onclick="editar('.$row["id_deco"].')" id="'.$row["id_deco"].'">'.$row["dec_descripcion"].'</a>';
                    ;
                    } else {
                        $sub_array[] = $row["dec_descripcion"];
                    
                    }
                $sub_array[]= $row["cliente"];
                $sub_array[]= $row["contrato"]; 
                if ($row["dec_estado"] == 1) {
                    $sub_array[] = '<span class="badge badge-pill badge-success">Activo</span>';
                } elseif ($row["dec_estado"] == 2) {
                    $sub_array[] = '<span class="badge badge-pill badge-primary">Libre</span>';
                } elseif ($row["dec_estado"] == 0) {
                    $sub_array[] = '<span class="badge badge-pill badge-danger">Desactivado</span>';
                } else {
                    $sub_array[] = ''; // Manejo de otro estado (opcional)
                }
                $sub_array[]= $row["dec_cas_id"];
                $sub_array[]= $row["deco_nota"];
                $sub_array[]= $row["dec_proveedor"];
                $sub_array[]= $row["dec_rayado"];
                $sub_array[]= $row["dec_marca"];
                $sub_array[]= $row["dec_modelo"];
                $sub_array[]= $row["dec_serie"];
                $sub_array[]= $row["deco_linkGooFotoAparatos"];
                $sub_array[]= $row["datos_rescatados"];
                $sub_array[]= $row["deco14"];
                $sub_array[]= $row["deco15"];
                $sub_array[]= $row["deco16"];
                $sub_array[]= $row["deco17"];
                $sub_array[]= $row["deco18"];
                $sub_array[]= $row["deco19"];
                $sub_array[]= $row["deco20"];


            
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
        case  "listarDesactivados" :

            $datos=$deco->listarDecosDesactivados();
            $data=array();

            foreach($datos as $row){
                $sub_array= array();

                if ($row["dec_estado"] == 0 || $row["dec_estado"] == 3) {
                    $sub_array[] = '<button type="button" onclick="eliminar(' . $row["id_deco"] . ')" id="' . $row["id_deco"] . '" class="btn btn-outline-danger btn-sm">Elim</button> <button type="button" onclick="Libre(' . $row["id_deco"] . ')" id="' . $row["id_deco"] . '" class="btn btn-outline-primary btn-sm">Libr</button>';
                } else {

                }

                if($row["dec_estado"] == 0 || $row["dec_estado"] == 3){
                    $sub_array[] = '<a type="button" onclick="editar('.$row["id_deco"].')" id="'.$row["id_deco"].'">'.$row["dec_descripcion"].'</a>';
                    ;
                    } else {
                        $sub_array[] = $row["dec_descripcion"];
                    
                    }
                $sub_array[]= $row["cliente"];
                $sub_array[]= $row["contrato"]; 
                if ($row["dec_estado"] == 1) {
                    $sub_array[] = '<span class="badge badge-pill badge-success">Activo</span>';
                } elseif ($row["dec_estado"] == 2) {
                    $sub_array[] = '<span class="badge badge-pill badge-primary">Libre</span>';
                } elseif ($row["dec_estado"] == 0) {
                    $sub_array[] = '<span class="badge badge-pill badge-danger">Desactivado</span>';
                } else {
                    $sub_array[] = ''; // Manejo de otro estado (opcional)
                }
                $sub_array[]= $row["dec_cas_id"];
                $sub_array[]= $row["deco_nota"];
                $sub_array[]= $row["dec_proveedor"];
                $sub_array[]= $row["dec_rayado"];
                $sub_array[]= $row["dec_marca"];
                $sub_array[]= $row["dec_modelo"];
                $sub_array[]= $row["dec_serie"];
                $sub_array[]= $row["deco_linkGooFotoAparatos"];
                $sub_array[]= $row["datos_rescatados"];
                $sub_array[]= $row["deco14"];
                $sub_array[]= $row["deco15"];
                $sub_array[]= $row["deco16"];
                $sub_array[]= $row["deco17"];
                $sub_array[]= $row["deco18"];
                $sub_array[]= $row["deco19"];
                $sub_array[]= $row["deco20"];


            
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
        case  "listarlibres" : 

            $datos=$deco->listarDecosLibres();
            $data=array();

            foreach($datos as $row){
                $sub_array= array();

                if ($row["dec_estado"] == 2) {
                    $sub_array[] = '<button type="button" onclick="Desactivar(' . $row["id_deco"] . ')" id="' . $row["id_deco"] . '" class="btn btn-outline-danger btn-sm">Desac</button> <button type="button" onclick="Activar(' . $row["id_deco"] . ')" id="' . $row["id_deco"] . '" class="btn btn-outline-success btn-sm">Activ</button>';

                } else {
                    $sub_array[] = '<button type="button" disabled class="btn btn-outline-danger btn-sm">Desac</button> <button type="button" disabled class="btn btn-outline-success btn-sm">Libr/button>';
                    
                }

                if($row["dec_estado"]==2){
                    $sub_array[] = '<a class="text-info editar-deco" style="cursor: pointer;" onclick="editar('.$row["id_deco"].')" id="'.$row["id_deco"].'">'.$row["dec_descripcion"].'</a>';
                    ;
                    } else {
                        $sub_array[] = $row["dec_descripcion"];
                    
                    }
                $sub_array[]= $row["cliente"];
                $sub_array[]= $row["contrato"]; 
                if ($row["dec_estado"] == 1) {
                    $sub_array[] = '<span class="badge badge-pill badge-success">Activo</span>';
                } elseif ($row["dec_estado"] == 2 || $row["dec_estado"] == 3 ) {
                    $sub_array[] = '<span class="badge badge-pill badge-primary">Libre</span>';
                } elseif ($row["dec_estado"] == 0) {
                    $sub_array[] = '<span class="badge badge-pill badge-danger">Desactivado</span>';
                } else {
                    $sub_array[] = ''; // Manejo de otro estado (opcional)
                }
                $sub_array[]= $row["dec_cas_id"];
                $sub_array[]= $row["deco_nota"];
                $sub_array[]= $row["dec_proveedor"];
                $sub_array[]= $row["dec_rayado"];
                $sub_array[]= $row["dec_marca"];
                $sub_array[]= $row["dec_modelo"];
                $sub_array[]= $row["dec_serie"];
                $sub_array[]= $row["deco_linkGooFotoAparatos"];
                $sub_array[]= $row["datos_rescatados"];
                $sub_array[]= $row["deco14"];
                $sub_array[]= $row["deco15"];
                $sub_array[]= $row["deco16"];
                $sub_array[]= $row["deco17"];
                $sub_array[]= $row["deco18"];
                $sub_array[]= $row["deco19"];
                $sub_array[]= $row["deco20"];


            
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
 

        /********VERIFICACION DE DECOS - MODULAR ******** */
        
        case "verificarDeco":
            if (isset($_POST["deco_id"])) {
                $datos = $deco->verificarDeco($_POST["deco_id"]);
                if (is_array($datos) == true and count($datos) <> 0) {
                    foreach ($datos as $row) {
                        $output["deco_id"] = $row["id_deco"];
                        $output["cliente_deco"] = $row["cliente_deco"];
                        $output["dec_estado"] = $row["dec_estado"];
                    }
                    echo json_encode($output);
                }
            }
        break;
         
        case "actualizarCliente":
            $deco_id = isset($_POST["deco_id"]) ? $_POST["deco_id"] : null;
            $cli_id = isset($_POST["cli_id"]) ? $_POST["cli_id"] : null;
        
            // Mostrar los valores en la consola del navegador
            echo "Valor de deco_id: " . $deco_id . "\n";
            echo "Valor de cli_id: " . $cli_id . "\n";
        
            $deco->actualizarClienteDeco($deco_id, $cli_id);
        break;
        
        case "liberarDeco":
            $deco_id = isset($_POST["deco_id"]) ? $_POST["deco_id"] : null;
        
            $deco->liberar_deco($deco_id);

        break;
        



};
   



?>