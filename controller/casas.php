<?php  

require_once("../config/conexion.php");

require_once("../model/Casas.php");

    $casa = new Casa();

    switch($_GET["op"]){

        case "guardaryeditar":

            if(!empty($_POST["id_casas"])) {
                $id_casas = $_POST["id_casas"];
                $cas_descripcion = $_POST["cas_descripcion"];
                $cas_direccion = $_POST["cas_direccion"];
                $casa12 = $_POST["casa12"];
                $casa13 = $_POST["casa13"];
                $casa14 = $_POST["casa14"];
                $casa15 = $_POST["casa15"];
                $id_cliente = $_POST["id_cliente"];
    
                $casa->update_casa(
                    $id_casas, 
                    $cas_descripcion, 
                    $cas_direccion, 
                    $casa12, 
                    $casa13, 
                    $casa14, 
                    $casa15, 
                    $id_cliente);

    
            } else {
                    
                $cas_direccion = $_POST["cas_direccion"];
                $casa12 = $_POST["casa12"];
                $casa13 = $_POST["casa13"];
                $casa14 = $_POST["casa14"];
                $casa15 = $_POST["casa15"]; 
                $id_cliente = $_POST["id_cliente"];
    
                $casa->insert_casa_x_cliente($cas_direccion, $casa12, $casa13, $casa14, $casa15, $id_cliente);
            }
    
            break;


        case "listar":
                    $datos = $casa->get_casa();
                    $data = array();
                    $clienteAnterior = null;
                
                    for ($i = 0; $i < count($datos); $i++) {
                        $row = $datos[$i];
                        $sub_array = array();
                        $sub_array[] = '';
                        // Verificar si el nombre del cliente es igual al cliente anterior
                        if ($row["CLIENTE"] === $clienteAnterior) {
                            // Nombre del cliente repetido, ocultarlo o colocarlo en blanco
                            $sub_array[] = '<div></div>';
                        } else {
                            // Nombre del cliente no repetido, mostrarlo
                            $sub_array[] = '<div class="d-flex align-items-center"><button type="button" onclick="nuevo(' . urlencode($row['id_cliente']) . ', \'' . urlencode($row["CLIENTE"]) . '\');" class="btn btn-primary btn-sm mr-2"><i class="fas fa-house-user fa-sm"></i></button><span>' . $row["CLIENTE"] . '</span></div>';
                            $clienteAnterior = $row["CLIENTE"];
                        }
                
                        // El resto de las columnas de datos
                        $sub_array[] = '<a href="#" class="selec-casa" onclick="CargaPlantilla(\'view/mntcasasdetalle/index.php?cli_id=' . urlencode($row['id_cliente']) . '&casa_nombre=' . urlencode($row['cas_descripcion']) . '&nombre=' . urlencode($row["CLIENTE"]) . '&id_casas=' . urlencode($row["id_casas"]) . '\', \'content-wp\')">' . $row["cas_descripcion"] . '(Shift)(H)</a>';
                        $sub_array[] = $row["cas_direccion"];
                        $sub_array[] = $row["casa12"];
                        $sub_array[] = $row["casa13"];
                        $sub_array[] = $row["casa14"];
                        $sub_array[] = $row["casa15"];
                
                        if ($row["cas_est"] == 1) {
                            $sub_array[] = '<span class="badge badge-pill badge-success">Activo</span>';
                        } else {
                            $sub_array[] = '<span class="badge badge-pill badge-danger">Suspendido</span>';
                        }
                
                        if ($row["cas_est"] == 1) {
                            $sub_array[] = '<button type="button" Onclick="editar(' . $row["id_casas"] . ')" id="' . $row["id_casas"] . '" class="editar-casa btn btn-info"><i class="fas fa-edit"></i></button>';
                        } else {
                            $sub_array[] = '<button type="button" disabled class="btn btn-info"><i class="fas fa-edit"></i></button>';
                        }
                
                        if ($row["cas_est"] == 1) {
                            $sub_array[] = '<button type="button" Onclick="eliminar(' . $row["id_casas"] . ')" id="' . $row["id_casas"] . '" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>';
                        } else {
                            $sub_array[] = '<button type="button" disabled class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>';
                        }
                
                        $data[] = $sub_array;
                    }
                
                    $results = array(
                        "sEcho" => 1,
                        "iTotalRecords" => count($data),
                        "iTotalDisplayRecords" => count($data),
                        "aaData" => $data
                    );
                
                    echo json_encode($results);
                    break;
                
        
        /**ELIMINAR SEGUN ID */
        case "eliminar":

                $casa->delete_casa($_POST["id_casas"]);
            









            break;








        /**CREANDO JSON DEGUN ID */
        case "mostrar":
            $datos=$casa->get_casa_x_id($_POST["id_casas"]);
            if(is_array($datos)==true and count($datos)<>0){
                foreach($datos as $row){
                    $output["id_casas"]= $row["id_casas"];
                    $output["cas_descripcion"]= $row["cas_descripcion"];
                    $output["cas_direccion"]= $row["cas_direccion"];
                    $output["casa12"]= $row["casa12"];
                    $output["casa13"]= $row["casa13"];



                    $output["casa14"]= $row["casa14"];
                    $output["id_cliente"]= $row["id_cliente"];


                }
                echo json_encode($output);
            }    
            break;

  
        case "listar_casas_x_cliente":

                $id_cliente = $_POST['id_cliente'];
 
                $datos=$casa->get_casas_x_id($id_cliente);
                $data=array();
                foreach($datos as $row){ 
                    $sub_array = array();
                    if($row["cas_est"]==1){
                        $sub_array[] = '<button type="button" onclick="eliminar('.$row["id_casas"].')" id="'.$row["id_casas"].'" class="btn btn-outline-danger d-block mb-2"><i class="fas fa-trash-alt"></i></button>
                                       <button type="button" onclick="editar('.$row["id_casas"].')" id="'.$row["id_casas"].'"class="btn btn-info d-block"><i class="fas fa-edit"></i></button>';
                    } else {
                        $sub_array[] = '<button type="button" disabled class="btn btn-outline-danger d-block mb-2"><i class="fas fa-trash-alt"></i></button>
                                       <button type="button" disabled class="btn btn-info d-block"><i class="fas fa-edit"></i></button>';
                    }
                    
    
                    $sub_array[] = '<a href="#" onclick="CargaPlantilla(\'view/mntcasasdetalle/index.php?cli_id='.urlencode($row['id_cliente']).'&casa_nombre='.urlencode($row['cas_descripcion']).'&nombre='.urlencode($row["CLIENTE"]).'&id_casas='.urlencode($row["id_casas"]).'\', \'content-wp\')">'.$row["cas_descripcion"].' (H)</a>';

                    if($row["cas_est"]==1){
                        $sub_array[]='<span class="badge badge-pill badge-success">Activo</span>';
                    }else{
                        $sub_array[]='<span class="badge badge-pill badge-danger">Suspendido</span>';
                    }
                    
                    $sub_array[] = $row["cas_direccion"];
                    $sub_array[] = $row["casa12"];
                    $sub_array[] = $row["casa13"];
                    $sub_array[] = $row["casa14"];
                    $sub_array[] = $row["casa15"];




                    $data[]=$sub_array;
                };
                $results=array(
                    "sEcho"=>1,//INFORMACION PARA EL TABLES
                    "iTotalRecords"=>count($datos),//enviamos el total de registros al dataTable
                    "iTotalDisplayRecords"=>count($datos),//enviamos el total de registros a visualizar
                    "aaData"=>$data );
    
                    echo json_encode($results);
                break;
    }

    ?>