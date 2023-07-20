<?php

class Route extends Conectar{
 
 
    /***************CRUD DE ROUTER**************** */

    public function insert_route($rout_descripcion,$id_contrato ,$rout_mac,$rout_marca,$rout_modelo,$rout_serie,$rout_wifi,$rout_pasword,$rout_wifidefault,$rout_passdefault,$rout_puertos,$passAdmin,$rout_nota,$usuario,$password,$linkGooFotoAparatos,$prestado,$router17,$router18,$router19,$router20){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO routes (id_route, rout_descripcion, id_contrato, rout_mac, rout_marca, rout_modelo, rout_serie, rout_wifi, rout_pasword, rout_wifidefault, rout_passdefault, rout_puertos, passAdmin, rout_nota, usuario, password, linkGooFotoAparatos, prestado, router17, router18, router19, router20, rout_estado) VALUES (NULL,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?, 2);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$rout_descripcion);
        $sql->bindValue(2,$id_contrato);
        $sql->bindValue(3,$rout_mac);
        $sql->bindValue(4,$rout_marca);
        $sql->bindValue(5,$rout_modelo);
        $sql->bindValue(6,$rout_serie);
        $sql->bindValue(7,$rout_wifi);
        $sql->bindValue(8,$rout_pasword);
        $sql->bindValue(9,$rout_wifidefault);
        $sql->bindValue(10,$rout_passdefault);
        $sql->bindValue(11,$rout_puertos);
        $sql->bindValue(12,$passAdmin);
        $sql->bindValue(13,$rout_nota);
        $sql->bindValue(14,$usuario);
        $sql->bindValue(15,$password);
        $sql->bindValue(16,$linkGooFotoAparatos);
        $sql->bindValue(17,$prestado);
        $sql->bindValue(18,$router17);
        $sql->bindValue(19,$router18);
        $sql->bindValue(20,$router19);
        $sql->bindValue(21,$router20);
        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function update_route($id_route,$rout_descripcion,$id_contrato ,$rout_mac,$rout_marca,$rout_modelo,$rout_serie,$rout_wifi,$rout_pasword,$rout_wifidefault,$rout_passdefault,$rout_puertos,$passAdmin,$rout_nota,$usuario,$password,$linkGooFotoAparatos,$prestado,$router17,$router18,$router19,$router20){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="UPDATE routes SET
 
        rout_descripcion = ?,  
        id_contrato  = ? ,  
        rout_mac= ? ,  
        rout_marca = ?,  
        rout_modelo = ?,  
        rout_serie = ?,  
        rout_wifi = ?,  
        rout_pasword = ?,  
        rout_wifidefault = ?,  
        rout_passdefault = ?,  
        rout_puertos = ?,  
        passAdmin	 = ?,  
        rout_nota = ?,  
        usuario = ?,  
        password = ?,
        linkGooFotoAparatos = ?,
        prestado = ?,
        router17 = ?,
        router18 = ?,
        router19 = ?,
        router20  = ?

        WHERE
        id_route = ?  ";
        $sql=$conectar->prepare($sql);

        $sql->bindValue(1,$rout_descripcion);
        $sql->bindValue(2,$id_contrato);
        $sql->bindValue(3,$rout_mac);
        $sql->bindValue(4,$rout_marca);
        $sql->bindValue(5,$rout_modelo);
        $sql->bindValue(6,$rout_serie);
        $sql->bindValue(7,$rout_wifi);
        $sql->bindValue(8,$rout_pasword);
        $sql->bindValue(9,$rout_wifidefault);
        $sql->bindValue(10,$rout_passdefault);
        $sql->bindValue(11,$rout_puertos);
        $sql->bindValue(12,$passAdmin);
        $sql->bindValue(13,$rout_nota);
        $sql->bindValue(14,$usuario);
        $sql->bindValue(15,$password);
        $sql->bindValue(16,$linkGooFotoAparatos);
        $sql->bindValue(17,$prestado);
        $sql->bindValue(18,$router17);
        $sql->bindValue(19,$router18);
        $sql->bindValue(20,$router19);
        $sql->bindValue(21,$router20);
        $sql->bindValue(22,$id_route);


        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function desactivar_route($id_route){
        $conectar=parent::conexion();
        parent::set_names();
        $sql="UPDATE routes SET
            rout_estado=0
            WHERE
            id_route =?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$id_route);
        $sql->execute();
        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function activar_route($id_route){
        $conectar=parent::conexion();
        parent::set_names();
        $sql="UPDATE routes SET
            rout_estado=1
            WHERE
            id_route =?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$id_route);
        $sql->execute();
        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function Eliminar_route($id_route){
        $conectar=parent::conexion();
        parent::set_names();
        $sql="DELETE FROM routes
        WHERE id_route = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$id_route);
        $sql->execute();
        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

     

    /************* LISTADOS DE Routes *********** */
    public function listarRouterActivos(){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT routes.*, 
        CONCAT(clientesv1.cli_nombre, ' ', clientesv1.cli_apellido) AS cliente,
        CONCAT(
            IFNULL(contratos.id_contrato, 'Sin'), '-',
            IFNULL(contratos.contr_descripcion, 'Contrato')
        ) AS contrato,
        CONCAT(titulares.titu_nom, ' ', titulares.titu_apellido) AS TITULAR
        FROM 
        routes 
        LEFT JOIN contratos ON routes.id_contrato = contratos.id_contrato
        LEFT JOIN titulares ON contratos.id_titular = titulares.id_titular
        LEFT JOIN clientesv1 ON routes.id_cli = clientesv1.cli_id
        WHERE rout_estado = 1";
        $sql=$conectar->prepare($sql);
        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);

    }
    public function listarRouterLibres(){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT routes.*, 
        CONCAT(clientesv1.cli_nombre, ' ', clientesv1.cli_apellido) AS cliente,
        CONCAT(
            IFNULL(contratos.id_contrato, 'Sin'), '-',
            IFNULL(contratos.contr_descripcion, 'Contrato')
        ) AS contrato,
        CONCAT(titulares.titu_nom, ' ', titulares.titu_apellido) AS TITULAR
        FROM 
        routes 
        LEFT JOIN contratos ON routes.id_contrato = contratos.id_contrato
        LEFT JOIN titulares ON contratos.id_titular = titulares.id_titular
        LEFT JOIN clientesv1 ON routes.id_cli = clientesv1.cli_id
        WHERE rout_estado = 2";
        $sql=$conectar->prepare($sql);
        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);

    }
    public function listarRouterDesactivados(){ 

        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT routes.*, 
        CONCAT(clientesv1.cli_nombre, ' ', clientesv1.cli_apellido) AS cliente,
        CONCAT(
            IFNULL(contratos.id_contrato, 'Sin'), '-',
            IFNULL(contratos.contr_descripcion, 'Contrato')
        ) AS contrato,
        CONCAT(titulares.titu_nom, ' ', titulares.titu_apellido) AS TITULAR
        FROM 
        routes 
        LEFT JOIN contratos ON routes.id_contrato = contratos.id_contrato
        LEFT JOIN titulares ON contratos.id_titular = titulares.id_titular
        LEFT JOIN clientesv1 ON routes.id_cli = clientesv1.cli_id
        WHERE rout_estado = 0";
        $sql=$conectar->prepare($sql);
        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);

    }
    public function get_route(){

        $conectar= parent::conexion();
        parent::set_names();
        $sql = "SELECT routes.*, 
        CONCAT(clientesv1.cli_nombre, ' ', clientesv1.cli_apellido) AS cliente,
        CONCAT(
            IFNULL(contratos.id_contrato, 'Sin'), '-',
            IFNULL(contratos.contr_descripcion, 'Contrato')
        ) AS contrato,
        CONCAT(titulares.titu_nom, ' ', titulares.titu_apellido) AS TITULAR
        FROM 
        routes 
        LEFT JOIN contratos ON routes.id_contrato = contratos.id_contrato
        LEFT JOIN titulares ON contratos.id_titular = titulares.id_titular
        LEFT JOIN clientesv1 ON routes.id_cli = clientesv1.cli_id;";
        $sql= $conectar->prepare($sql);
        $sql->execute(); 

        return $result=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_route_x_id($id_route){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM routes WHERE id_route =? AND rout_estado=1";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$id_route);
        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function get_list_route(){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT id_route, 
        rout_descripcion FROM routes
        WHERE rout_estado=1 or rout_estado=2;";
        $sql=$conectar->prepare($sql);
        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function verificarRouter($id_route){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT routes.`id_route`, clientesv1.cli_id, 
            CONCAT(clientesv1.cli_nombre,' ',clientesv1.cli_apellido) AS cliente_route, 
            routes.rout_estado 
            FROM routes 
            LEFT JOIN clientesv1 ON routes.id_cli = clientesv1.cli_id
            WHERE id_route = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$id_route);
        
        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);
    }



        /******************HISTORIAL DE ROUTER ****************************** */

    public function actualizarClienteRouter($id_route, $id_cli)
    {
        $conectar = parent::conexion();
        parent::set_names();

        // Actualizar el estado y cliente del id_deco
        $sql1 = "UPDATE routes
                SET rout_estado = 1, id_cli = ?
                WHERE id_route = ?";
        $stmt1 = $conectar->prepare($sql1);
        $stmt1->bindValue(1, $id_cli);
        $stmt1->bindValue(2, $id_route);
        $stmt1->execute();

        // Insertar en dispo_historial si no existe otro historial con la misma id_deco y id_cliente
        $sql2 = "INSERT INTO dispo_historial (id_route, id_cliente, fech_asignacion)
                SELECT ?, ?, CURDATE()
                FROM (SELECT 1) AS tmp
                WHERE NOT EXISTS (
                    SELECT 1
                    FROM dispo_historial
                    WHERE id_route = ?
                        AND id_cliente = ?
                        AND fech_desasignacion IS NULL
                )";
        $stmt2 = $conectar->prepare($sql2);
        $stmt2->bindValue(1, $id_route);
        $stmt2->bindValue(2, $id_cli);
        $stmt2->bindValue(3, $id_route);
        $stmt2->bindValue(4, $id_cli);
        $stmt2->execute();
    }

    public function liberar_route($id_route) {
        $conectar = parent::conexion(); 
        parent::set_names();
        
        // Actualizar la tabla decos
        $sql_deco = "UPDATE routes SET id_cli = '', rout_estado = 2 WHERE id_route =  ?";
        $stmt_deco = $conectar->prepare($sql_deco);
        $stmt_deco->bindValue(1, $id_route);
        $stmt_deco->execute();
    
        // Actualizar la tabla dispo_historial
        $sql_historial = "UPDATE dispo_historial SET fech_desasignacion = NOW() WHERE id_route = ?";
        $stmt_historial = $conectar->prepare($sql_historial);
        $stmt_historial->bindValue(1, $id_route);
        $stmt_historial->execute();
    
        return true;
    }
    

}





 


?>