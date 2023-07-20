<?php  
/**LLAMANDO A CADENA DE CONEXION */
require_once("../config/conexion.php");
/**LLAMANDO A LA CLASE */
require_once("../model/Clientev2.php");
    /**INICIALIZANDO CLASE */
    $cliente = new Clientev2();

/**OPCION DE SOLICITUD DE CONTROLLER */
    switch($_GET["op"]){

        case "guardaryeditar":
            // if(!empty($_POST["cli_id"])){
            //     $cliente->update_cliente($_POST["cli_id"],$_POST["cli_fono"],$_POST["cli_nombre"],$_POST["cli_apellido"],$_POST["cli_fb"],$_POST["cli_sexo"],$_POST["cli_correo"],$_POST["cli_dni"],$_POST["cli_linkGooContac"],$_POST["cli_linkGooFotoAparatos"],$_POST["cliente11"],$_POST["cliente12"],$_POST["cliente13"],$_POST["cliente14"],$_POST["cliente15"],$_POST["cliente16"],$_POST["cliente17"],$_POST["cliente18"],$_POST["cliente19"],$_POST["cliente20"]);
            // }else{

            //     $cliente->insert_cliente($_POST["cli_fono"],$_POST["cli_nombre"],$_POST["cli_apellido"],$_POST["cli_fb"],$_POST["cli_sexo"],$_POST["cli_correo"],$_POST["cli_dni"],$_POST["cli_linkGooContac"],$_POST["cli_linkGooFotoAparatos"],$_POST["cliente11"],$_POST["cliente12"],$_POST["cliente13"],$_POST["cliente14"],$_POST["cliente15"],$_POST["cliente16"],$_POST["cliente17"],$_POST["cliente18"],$_POST["cliente19"],$_POST["cliente20"]);
            // }
            // break;

        case "listar":

            $datos=$cliente->get_cliente();
            $data=array();
            foreach($datos as $row){
                $sub_array = array();


                $sub_array[] = $row["idCliente"];
                $sub_array[] = $row["zona"];
                $sub_array[] = $row["ipx"];
                $sub_array[] = $row["cobrar"];
                $sub_array[] = $row["idFono"];
                $sub_array[] = $row["OtrosFonos"];
                $sub_array[] = $row["idClientes"];
                $sub_array[] = $row["fechaInstal"];
                $sub_array[] = $row["tratoSrSrta"];
                $sub_array[] = $row["duenioNombre"];


                $sub_array[] = $row["estado"];
                $sub_array[] = $row["MacWAN"];
                $sub_array[] = $row["tarraga"];
                $sub_array[] = $row["duenioApellidos"];
                $sub_array[] = $row["direcYRefer"];
                $sub_array[] = $row["costoInstal"];
                $sub_array[] = $row["ACuentaInstal"];
                $sub_array[] = $row["saldoInstal"];
                $sub_array[] = $row["servicioInstalado"];
                $sub_array[] = $row["routerMarca"];
                $sub_array[] = $row["mapaCoordenadasUbicacion"];


                $sub_array[] = $row["fb"];
                $sub_array[] = $row["fbOtros"];
                $sub_array[] = $row["familiares"];
                $sub_array[] = $row["prestado"];
                $sub_array[] = $row["EsSuCasa"];
                $sub_array[] = $row["trabajaEn"];
                $sub_array[] = $row["xwifi"];
                $sub_array[] = $row["wifiClave"];
                $sub_array[] = $row["passAdmin"];
                $sub_array[] = $row["wifiDefault"];
                
                
                
                $sub_array[] = $row["PassDefault"];
                $sub_array[] = $row["veloc"];
                $sub_array[] = $row["chrPort"];
                $sub_array[] = $row["nota"];
                $sub_array[] = $row["puntual"];
                $sub_array[] = $row["sexo"];
                $sub_array[] = $row["usuario"];
                $sub_array[] = $row["password"];
                $sub_array[] = $row["correo"];
                $sub_array[] = $row["dni"];
                
                
                
                
                $sub_array[] = $row["notaSiDebeOtrosDineros"];
                $sub_array[] = $row["fechaPaLlamarle"];
                $sub_array[] = $row["procesadoSiNo"];
                $sub_array[] = $row["pagaAdelantadoSiNo"];
                $sub_array[] = $row["proxFechaDePago"];
                $sub_array[] = $row["tomaDeSwitch"];
                $sub_array[] = $row["revisadoPor"];
                $sub_array[] = $row["linkGooContac"];
                $sub_array[] = $row["linkGooFotoAparatos"];
                $sub_array[] = $row["inquilinoNombre"];
                
                
                $sub_array[] = $row["inquilinoDemasDatosYNotas"];
                $sub_array[] = $row["mesPagado"];
                $sub_array[] = $row["proxPagoEl25De"];
                $sub_array[] = $row["procesamientoDePago"];
                
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

                $cliente->delete_cliente($_POST["cli_id"]);
            

            break;

        // /**CREANDO JSON DEGUN ID */
        case "mostrar":
            $datos=$cliente->get_cliente_x_id($_POST["cli_id"]);
            if(is_array($datos)==true and count($datos)<>0){
                foreach($datos as $row){
                    $output["cli_id"]= $row["cli_id"];
                    $output["cli_fono"]= $row["cli_fono"];
                    $output["cli_nombre"]= $row["cli_nombre"];
                    $output["cli_apellido"]= $row["cli_apellido"];
                    $output["cli_fb"]= $row["cli_fb"];
                    $output["cli_sexo"]= $row["cli_sexo"];
                    $output["cli_correo"]= $row["cli_correo"];
                    $output["cli_dni"]= $row["cli_dni"];
                    $output["cli_linkGooContac"]= $row["cli_linkGooContac"];
                    $output["cli_linkGooFotoAparatos"]= $row["cli_linkGooFotoAparatos"];
                    $output["cliente11"]= $row["cliente11"];
                    $output["cliente12"]= $row["cliente12"];
                    $output["cliente13"]= $row["cliente13"];
                    $output["cliente14"]= $row["cliente14"];
                    $output["cliente15"]= $row["cliente15"];
                    $output["cliente16"]= $row["cliente16"];
                    $output["cliente17"]= $row["cliente17"];
                    $output["cliente18"]= $row["cliente18"];
                    $output["cliente19"]= $row["cliente19"];
                    $output["cliente20"]= $row["cliente20"];
                }
                echo json_encode($output);
            }

            break;


            case "Lista_casas_x_idcliente":

                $datos=$cliente->get_cliente();
                $data=array();
                foreach($datos as $row){

                    $sub_array[] = '<a type="button" class="btn btn-info" href="../mntdetalleCliente/detalle.php?cli_id='.$row["cli_id"].'&nombre='.$row["nombre_completo"].'">Casas</i></a>';
                    $sub_array[] = '<a type="button" onclick="editar('.$row["cli_id"].')" id="'.$row["cli_id"].'">'.$row["nombre_completo"].'</a>';
    
                    if($row["cli_est"]==1){
                        $sub_array[]='<span class="badge badge-pill badge-success">Activo</span>';
                    }else{
                        $sub_array[]='<span class="badge badge-pill badge-danger">Suspendido</span>';
                    }
                    $sub_array[] = $row["cli_dni"];
                    $sub_array[] = $row["cli_sexo"];
                    $sub_array[] = $row["cli_correo"];
                    $sub_array[] = $row["cli_fono"];
                    $sub_array[] = $row["cli_fb"];
                    $sub_array[] = $row["cli_linkGooContac"];
                    $sub_array[] = $row["cli_linkGooFotoAparatos"];
                    $sub_array[] = $row["cliente11"];
                    $sub_array[] = $row["cliente12"];
                    $sub_array[] = $row["cliente13"];
                    $sub_array[] = $row["cliente14"];
                    $sub_array[] = $row["cliente15"];
                    $sub_array[] = $row["cliente16"];
                    $sub_array[] = $row["cliente17"];
                    $sub_array[] = $row["cliente18"];
                    $sub_array[] = $row["cliente19"];
                    $sub_array[] = $row["cliente20"];
                    

                    $data[]=$sub_array;
                };
                $results=array(
                    "sEcho"=>1,//INFORMACION PARA EL TABLES
                    "iTotalRecords"=>count($datos),//enviamos el total de registros al dataTable
                    "iTotalDisplayRecords"=>count($datos),//enviamos el total de registros a visualizar
                    "aaData"=>$data );
    
                    echo json_encode($results);
                break;


        // case "vista":

        // break;
    }




?>