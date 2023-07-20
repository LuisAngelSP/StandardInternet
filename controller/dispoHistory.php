<?php  

require_once("../config/conexion.php");

require_once("../model/DispoHistory.php");

    $history = new DispoHistory();

    switch($_GET["op"]){

        case "listar":
            $column = '';
            $id = '';
            
            if (!empty($_POST['deco_id'])) {
                $column = 'id_deco';
                $id = $_POST['deco_id'];
            }
            if (!empty($_POST['rout_id'])) {
                $column = 'id_route';
                $id = $_POST['rout_id'];
            }
            if (!empty($_POST['mod_id'])) {
                $column = 'id_modem';
                $id = $_POST['mod_id']; 
            }
            
            $datos = $history->getDispoById($column, $id);
            
            $data = array();
            foreach($datos as $row) {
                $sub_array = array();
                $sub_array[] = $row[$column];
                $sub_array[] = $row["cliente"];
                $sub_array[] = $row["fech_asignacion"];
                $sub_array[] = $row["fech_desasignacion"];
                $data[] = $sub_array;
            }
            
            $results = array(      
                "sEcho" => 1,
                "iTotalRecords" => count($datos),
                "iTotalDisplayRecords" => count($datos),
                "aaData" => $data
            );
            
            echo json_encode($results);
            
            break;
        
        
        /**ELIMINAR SEGUN ID */
        case "eliminar":

                $casa->delete_casa($_POST["id_casas"]);

        break;

    /**CREANDO JSON DEGUN ID */

    case "HistoryDecoInsercion":

            $id_deco = $_POST["deco_id"];
            $id_cliente = $_POST["cli_id"];

            $history->insertHistoryDeco($id_deco, $id_cliente);

    break;




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

  


    }

    ?>