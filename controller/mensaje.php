<?php

require_once("../config/conexion.php");

require_once("../model/Mensaje.php");

    $mensaje = new Mensaje();


    switch ($_GET["op"]){

        case  "listar" :

            $datos=$mensaje->get_mensaje();
            $data=array();

            foreach($datos as $row){
                $sub_array= array();

                $sub_array[]= $row["id_mensaje"];
                $sub_array[]= $row["titulo"];
                $sub_array[]= $row["contenido"];
                $sub_array[]= $row["fecha_creacion"];


                if($row["estado"]==1){
                    $sub_array[]='<span class="badge badge-pill badge-success">Activo</span>';
                }else{
                    $sub_array[]='<span class="badge badge-pill badge-danger">Suspendido</span>';
                }

                if($row["estado"]==1){
                    $sub_array[] = '<button type="button" Onclick="editar('.$row["id_mensaje"].')" id="'.$row["id_mensaje"].'" class="btn btn-info"><i class="fas fa-edit"></i></button>';
                }else{
                    $sub_array[] = '<button type="button"  disabled class="btn btn-info"><i class="fas fa-edit"></i></button>';
                }
                
                if($row["estado"]==1){
                    $sub_array[] = '<button type="button" Onclick="eliminar('.$row["id_mensaje"].')" id="'.$row["id_mensaje"].'" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>';
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

            if(!empty($_POST["id_mensaje"])){

                $mensaje->update_mensaje($_POST["id_mensaje"],$_POST["titulo"],$_POST["contenido"]);


            }else{
                    
                $mensaje->insert_mensaje($_POST["titulo"],$_POST["contenido"]);

            };

        break;   



    
        case "mostrar":
                $datos=$mensaje->get_mensaje_x_id($_POST["id_mensaje"]);
                if(is_array($datos)==true and count($datos)<>0){
                    foreach($datos as $row){
                        $output["id_mensaje"]= $row["id_mensaje"];
                        $output["titulo"]= $row["titulo"];
                        $output["contenido"]= $row["contenido"];       
                    }
                    echo json_encode($output);
                }
            break;
            
        case "listar_mensajes":
                $result = $mensaje->get_list_mensaje();
                echo json_encode($result);
        break;
        
        /* TODO: Formato para llenar combo en formato HTML */
        case "combo":
            $datos = $mensaje->get_mensaje();
            $html="";
            $html.="<option label='Seleccionar'></option>";
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['id_mensaje']."'>".$row['titulo']."</option>";
                }
                echo $html;
            }else{
                echo "error";
            }

        break;

        
        case "mensaje":
            if($_POST["action"] == "mensaje") {
                $id_mensaje = $_POST["id_mensaje"];
                $datos = $mensaje->get_mensaje_x_id($id_mensaje);
                if(is_array($datos) && count($datos) > 0) {
                    $contenido = $datos[0]["contenido"];
                    echo json_encode(array("contenido" => $contenido));
                }
            break;
        
        };
        case "ALLmensaje":
            if ($_POST["action"] == "mensaje") {
                $datos = $mensaje->get_mensaje();
                $contenidos = array();
        
                foreach ($datos as $mensaje) {
                    $contenidos[] = $mensaje["contenido"];
                }
        
                echo json_encode(array("contenidos" => $contenidos));
            }
            break;

    }
   



?>