<?php

require_once ("../config/conexion.php");

require_once("../model/Route.php");

$route = new Route();


    switch($_GET["op"]){

    case "listar":
            $datos=$route->get_route();
            $data= array();

            foreach($datos as $row){
                $sub_array = array();

                if ($row["rout_estado"] == 1) {
                    $sub_array[] = '<button type="button" onclick="Desactivar(' . $row["id_route"] . ')" id="' . $row["id_route"] . '" class="btn btn-outline-danger btn-sm">Desac</button> <button type="button" onclick="Libre(' . $row["id_route"] . ')" id="' . $row["id_route"] . '" class="btn btn-outline-primary btn-sm">Libr/button>';

                } else {
                    $sub_array[] = '<button type="button" disabled class="btn btn-outline-danger btn-sm"><i class="fas fa-times fa-xs"></i></button> <button type="button" disabled class="btn btn-outline-primary btn-sm ">Libr/button>';
                    
                }

                if($row["rout_estado"]==1){
                    $sub_array[] = '<a class="text-info editar-router" style="cursor: pointer;" onclick="editar('.$row["id_route"].')" id="'.$row["id_route"].'">'.$row["rout_descripcion"].'</a>';
                    ;
                    } else {
                        $sub_array[] = $row["rout_descripcion"];
                    
                    }
                $sub_array[] = $row["cliente"];
                $sub_array[] = $row["contrato"];
                
                if ($row["rout_estado"] == 1) {
                    $sub_array[] = '<span class="badge badge-pill badge-success">Activo</span>';
                } elseif ($row["rout_estado"] == 2) {
                    $sub_array[] = '<span class="badge badge-pill badge-primary">Libre</span>';
                } elseif ($row["rout_estado"] == 0) {
                    $sub_array[] = '<span class="badge badge-pill badge-danger">Suspendido</span>';
                } else {
                    $sub_array[] = ''; // Manejo de otro estado (opcional)
                }


                $sub_array[] = $row["ipx"];
                $sub_array[] = $row["rout_mac"];
                $sub_array[] = $row["rout_marca"];
                $sub_array[] = $row["rout_modelo"];
                $sub_array[] = $row["rout_serie"];
                $sub_array[] = $row["rout_wifi"];
                $sub_array[] = $row["rout_pasword"];
                $sub_array[] = $row["rout_wifidefault"];
                $sub_array[] = $row["rout_passdefault"];
                $sub_array[] = $row["rout_puertos"];
                $sub_array[] = $row["passAdmin"];
                $sub_array[] = $row["rout_nota"];
                $sub_array[] = $row["usuario"];
                $sub_array[] = $row["password"];
                $sub_array[] = $row["linkGooFotoAparatos"];
                $sub_array[] = $row["prestado"];
                $sub_array[] = $row["router17"];
                $sub_array[] = $row["router18"];
                $sub_array[] = $row["router19"];
                $sub_array[] = $row["router20"];

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

            if(!empty($_POST["id_route"])){

                if(!empty($_POST["id_route"]) && $_POST["id_contrato"] === ""){
                
                $route->update_route($_POST["id_route"],$_POST["rout_descripcion"],NULL,$_POST["rout_mac"],$_POST["rout_marca"],$_POST["rout_modelo"],$_POST["rout_serie"],$_POST["rout_wifi"],$_POST["rout_pasword"],$_POST["rout_wifidefault"],$_POST["rout_passdefault"],$_POST["rout_puertos"],$_POST["passAdmin"],$_POST["rout_nota"],$_POST["usuario"],$_POST["password"],$_POST["linkGooFotoAparatos"],$_POST["prestado"],$_POST["router17"],$_POST["router18"],$_POST["router19"],$_POST["router20"]);

                }else{
                    $route->update_route($_POST["id_route"],$_POST["rout_descripcion"],$_POST["id_contrato"],$_POST["rout_mac"],$_POST["rout_marca"],$_POST["rout_modelo"],$_POST["rout_serie"],$_POST["rout_wifi"],$_POST["rout_pasword"],$_POST["rout_wifidefault"],$_POST["rout_passdefault"],$_POST["rout_puertos"],$_POST["passAdmin"],$_POST["rout_nota"],$_POST["usuario"],$_POST["password"],$_POST["linkGooFotoAparatos"],$_POST["prestado"],$_POST["router17"],$_POST["router18"],$_POST["router19"],$_POST["router20"]);
                }
            }

            if(empty($_POST["id_route"])){

                if(empty($_POST["id_route"]) && $_POST["id_contrato"] === ""){
            
                $route->insert_route($_POST["rout_descripcion"],NULL,$_POST["rout_mac"],$_POST["rout_marca"],$_POST["rout_modelo"],$_POST["rout_serie"],$_POST["rout_wifi"],$_POST["rout_pasword"],$_POST["rout_wifidefault"],$_POST["rout_passdefault"],$_POST["rout_puertos"],$_POST["passAdmin"],$_POST["rout_nota"],$_POST["usuario"],$_POST["password"],$_POST["linkGooFotoAparatos"],$_POST["prestado"],$_POST["router17"],$_POST["router18"],$_POST["router19"],$_POST["router20"]);
                }else{
                    $route->insert_route($_POST["rout_descripcion"],$_POST["id_contrato"],$_POST["rout_mac"],$_POST["rout_marca"],$_POST["rout_modelo"],$_POST["rout_serie"],$_POST["rout_wifi"],$_POST["rout_pasword"],$_POST["rout_wifidefault"],$_POST["rout_passdefault"],$_POST["rout_puertos"],$_POST["passAdmin"],$_POST["rout_nota"],$_POST["usuario"],$_POST["password"],$_POST["linkGooFotoAparatos"],$_POST["prestado"],$_POST["router17"],$_POST["router18"],$_POST["router19"],$_POST["router20"]);
                }

        }


    break;   

    case "mostrar":
            $datos=$route->get_route_x_id($_POST["id_route"]);
            if(is_array($datos)==true and count($datos)<>0){
                foreach($datos as $row){
                    $output["id_route"]= $row["id_route"];
                    $output["rout_descripcion"]= $row["rout_descripcion"];
                    $output["id_contrato"]= $row["id_contrato"];
                    $output["rout_mac"]= $row["rout_mac"];
                    $output["rout_marca"]= $row["rout_marca"];
                    $output["rout_modelo"]= $row["rout_modelo"];
                    $output["rout_serie"]= $row["rout_serie"];
                    $output["rout_wifi"]= $row["rout_wifi"];
                    $output["rout_pasword"]= $row["rout_pasword"];
                    $output["rout_wifidefault"]= $row["rout_wifidefault"];
                    $output["rout_passdefault"]= $row["rout_passdefault"];
                    $output["rout_puertos"]= $row["rout_puertos"];
                    $output["passAdmin"]= $row["passAdmin"];
                    $output["rout_nota"]= $row["rout_nota"];
                    $output["usuario"]= $row["usuario"];
                    $output["password"]= $row["password"];
                    $output["linkGooFotoAparatos"]= $row["linkGooFotoAparatos"];
                    $output["prestado"]= $row["prestado"];
                    $output["router17"]= $row["router17"];
                    $output["router18"]= $row["router18"];
                    $output["router19"]= $row["router19"];
                    $output["router20"]= $row["router20"];
                    
                }
                echo json_encode($output);
            }
    break;
 
    case "Activar":

        $route->activar_route($_POST["id_route"]);


    break;

    case "desactivar":

        $route->desactivar_route($_POST["id_route"]);


    break;

    case "Eliminar":

        $route->Eliminar_route($_POST["id_route"]);


    break;


    case "listarActivos":
        $datos=$route->listarRouterActivos();
        $data= array();

        foreach($datos as $row){
            $sub_array = array();
            if ($row["rout_estado"] == 1) {
                $sub_array[] = '<button type="button" onclick="desactivar(' . $row["id_route"] . ')" id="' . $row["id_route"] . '" class="btn btn-outline-danger btn-sm">Desac</button> <button type="button" onclick="Libre(' . $row["id_route"] . ')" id="' . $row["id_route"] . '" class="btn btn-outline-primary btn-sm">Libr</button>';

            } else {
                $sub_array[] = '<button type="button" disabled class="btn btn-outline-danger btn-sm"><i class="fas fa-times fa-xs"></i></button> <button type="button" disabled class="btn btn-outline-primary btn-sm ml-2">Libr</button>';
                
            }

            if($row["rout_estado"]==1){
                $sub_array[] = '<a class="text-info editar-router" style="cursor: pointer;" onclick="editar('.$row["id_route"].')" id="'.$row["id_route"].'">'.$row["rout_descripcion"].'</a>';
                ;
                } else {
                    $sub_array[] = $row["rout_descripcion"];
                
                }
            $sub_array[] = $row["cliente"];
            $sub_array[] = $row["contrato"];
            
            if ($row["rout_estado"] == 1) {
                $sub_array[] = '<span class="badge badge-pill badge-success">Activo</span>';
            } elseif ($row["rout_estado"] == 2) {
                $sub_array[] = '<span class="badge badge-pill badge-primary">Libre</span>';
            } elseif ($row["rout_estado"] == 0) {
                $sub_array[] = '<span class="badge badge-pill badge-danger">Suspendido</span>';
            } else {
                $sub_array[] = ''; // Manejo de otro estado (opcional)
            }

            $sub_array[] = $row["ipx"];
            $sub_array[] = $row["rout_mac"];
            $sub_array[] = $row["rout_marca"];
            $sub_array[] = $row["rout_modelo"];
            $sub_array[] = $row["rout_serie"];
            $sub_array[] = $row["rout_wifi"];
            $sub_array[] = $row["rout_pasword"];
            $sub_array[] = $row["rout_wifidefault"];
            $sub_array[] = $row["rout_passdefault"];
            $sub_array[] = $row["rout_puertos"];
            $sub_array[] = $row["passAdmin"];
            $sub_array[] = $row["rout_nota"];
            $sub_array[] = $row["usuario"];
            $sub_array[] = $row["password"];
            $sub_array[] = $row["linkGooFotoAparatos"];
            $sub_array[] = $row["prestado"];
            $sub_array[] = $row["router17"];
            $sub_array[] = $row["router18"];
            $sub_array[] = $row["router19"];
            $sub_array[] = $row["router20"];

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

 
    case "listarDesactivados":
        $datos=$route->listarRouterDesactivados();
        $data= array();

        foreach($datos as $row){
            $sub_array = array();
            if ($row["rout_estado"] == 1) {
                $sub_array[] = '<button type="button" onclick="desactivar(' . $row["id_route"] . ')" id="' . $row["id_route"] . '" class="btn btn-outline-danger btn-sm">Elim</button> <button type="button" onclick="Libre(' . $row["id_route"] . ')" id="' . $row["id_route"] . '" class="btn btn-outline-primary btn-sm">Libr/button>';

            } else {
                $sub_array[] = '<button type="button" disabled class="btn btn-outline-danger btn-sm"><i class="fas fa-times fa-xs"></i></button> <button type="button" disabled class="btn btn-outline-primary btn-sm ml-2">Libr/button>';
                
            }

            if($row["rout_estado"]==0){
                $sub_array[] = '<a type="button" onclick="editar('.$row["id_route"].')" id="'.$row["id_route"].'">'.$row["rout_descripcion"].'</a>';
                ;
                } else {
                    $sub_array[] = $row["rout_descripcion"];
                
                }
            $sub_array[] = $row["cliente"];
            $sub_array[] = $row["contrato"];
            
            if ($row["rout_estado"] == 1) {
                $sub_array[] = '<span class="badge badge-pill badge-success">Activo</span>';
            } elseif ($row["rout_estado"] == 2) {
                $sub_array[] = '<span class="badge badge-pill badge-primary">Libre</span>';
            } elseif ($row["rout_estado"] == 0) {
                $sub_array[] = '<span class="badge badge-pill badge-danger">Suspendido</span>';
            } else {
                $sub_array[] = ''; // Manejo de otro estado (opcional)
            }


            $sub_array[] = $row["ipx"];
            $sub_array[] = $row["rout_mac"];
            $sub_array[] = $row["rout_marca"];
            $sub_array[] = $row["rout_modelo"];
            $sub_array[] = $row["rout_serie"];
            $sub_array[] = $row["rout_wifi"];
            $sub_array[] = $row["rout_pasword"];
            $sub_array[] = $row["rout_wifidefault"];
            $sub_array[] = $row["rout_passdefault"];
            $sub_array[] = $row["rout_puertos"];
            $sub_array[] = $row["passAdmin"];
            $sub_array[] = $row["rout_nota"];
            $sub_array[] = $row["usuario"];
            $sub_array[] = $row["password"];
            $sub_array[] = $row["linkGooFotoAparatos"];
            $sub_array[] = $row["prestado"];
            $sub_array[] = $row["router17"];
            $sub_array[] = $row["router18"];
            $sub_array[] = $row["router19"];
            $sub_array[] = $row["router20"];

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


    case "listarLibres":
        $datos=$route->listarRouterLibres();
        $data= array();

        foreach($datos as $row){
            $sub_array = array();
            if ($row["rout_estado"] == 2) {
                $sub_array[] = '<button type="button" onclick="desactivar(' . $row["id_route"] . ')" id="' . $row["id_route"] . '" class="btn btn-outline-danger btn-sm">Desac</button> <button type="button" onclick="activar(' . $row["id_route"] . ')" id="' . $row["id_route"] . '" class="btn btn-outline-success btn-sm">Activ</button>';

            } else {
                $sub_array[] = '<button type="button" disabled class="btn btn-outline-danger btn-sm"><i class="fas fa-times fa-xs"></i></button> <button type="button" disabled class="btn btn-outline-primary btn-sm ml-2">Libr/button>';
                
            }
            if($row["rout_estado"]==2){
                $sub_array[] = '<a  <a class="text-info editar-router" style="cursor: pointer;" type="button" onclick="editar('.$row["id_route"].')" id="'.$row["id_route"].'">'.$row["rout_descripcion"].'</a>';
                ;
                } else {
                    $sub_array[] = $row["rout_descripcion"];
                
                }
            $sub_array[] = $row["cliente"];
            $sub_array[] = $row["contrato"];
            
            if ($row["rout_estado"] == 1) {
                $sub_array[] = '<span class="badge badge-pill badge-success">Activo</span>';
            } elseif ($row["rout_estado"] == 2) {
                $sub_array[] = '<span class="badge badge-pill badge-primary">Libre</span>';
            } elseif ($row["rout_estado"] == 0) {
                $sub_array[] = '<span class="badge badge-pill badge-danger">Suspendido</span>';
            } else {
                $sub_array[] = ''; // Manejo de otro estado (opcional)
            }

            $sub_array[] = $row["ipx"];
            $sub_array[] = $row["rout_mac"];
            $sub_array[] = $row["rout_marca"];
            $sub_array[] = $row["rout_modelo"];
            $sub_array[] = $row["rout_serie"];
            $sub_array[] = $row["rout_wifi"];
            $sub_array[] = $row["rout_pasword"];
            $sub_array[] = $row["rout_wifidefault"];
            $sub_array[] = $row["rout_passdefault"];
            $sub_array[] = $row["rout_puertos"];
            $sub_array[] = $row["passAdmin"];
            $sub_array[] = $row["rout_nota"];
            $sub_array[] = $row["usuario"];
            $sub_array[] = $row["password"];
            $sub_array[] = $row["linkGooFotoAparatos"];
            $sub_array[] = $row["prestado"];
            $sub_array[] = $row["router17"];
            $sub_array[] = $row["router18"];
            $sub_array[] = $row["router19"];
            $sub_array[] = $row["router20"];

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



    /********VERIFICACION DE DECOS - MODULAR ******** */

    case "verificarRouter":
        if (isset($_POST["rout_id"])) {
            $datos = $route->verificarRouter($_POST["rout_id"]);
            if (is_array($datos) == true and count($datos) <> 0) {
                foreach ($datos as $row) {
                    $output["rout_id"] = $row["id_route"];
                    $output["cliente_route"] = $row["cliente_route"];
                    $output["rout_estado"] = $row["rout_estado"];
                }
                echo json_encode($output);
            }
        }
    break;
        
    case "actualizarCliente":
        $rout_id = isset($_POST["rout_id"]) ? $_POST["rout_id"] : null;
        $cli_id = isset($_POST["cli_id"]) ? $_POST["cli_id"] : null;
    
        $route->actualizarClienteRouter($rout_id, $cli_id);
    break;  


    case "liberarRoute":
        $rout_id = isset($_POST["rout_id"]) ? $_POST["rout_id"] : null;
    
        $route->liberar_route($rout_id);
    break;  







    };


?>