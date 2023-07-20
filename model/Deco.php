<?php  

class Deco extends Conectar{

 
    /***************CRUD DE ROUTER**************** */

    public function insert_decos($dec_descripcion,$id_contrato ,$dec_cas_id,$dec_proveedor,$dec_rayado,$dec_marca,$dec_modelo,$dec_serie,$deco_nota,$deco_linkGooFotoAparatos,$datos_rescatados,$deco14,$deco15,$deco16,$deco17,$deco18,$deco19,$deco20){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO   decos   (  id_deco  ,   dec_descripcion  ,   id_contrato  ,   dec_cas_id  ,   dec_proveedor  ,   dec_rayado  ,   dec_marca  ,   dec_modelo  ,   dec_serie  ,   deco_nota  ,   deco_linkGooFotoAparatos  ,   datos_rescatados  ,   deco14  ,   deco15  ,   deco16  ,   deco17  ,   deco18  ,   deco19  ,   deco20  ,   dec_estado  ) VALUES (NULL,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?, 2);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$dec_descripcion);
        $sql->bindValue(2,$id_contrato);
        $sql->bindValue(3,$dec_cas_id);
        $sql->bindValue(4,$dec_proveedor);
        $sql->bindValue(5,$dec_rayado);
        $sql->bindValue(6,$dec_marca);
        $sql->bindValue(7,$dec_modelo);
        $sql->bindValue(8,$dec_serie);
        $sql->bindValue(9,$deco_nota);
        $sql->bindValue(10,$deco_linkGooFotoAparatos);
        $sql->bindValue(11,$datos_rescatados);
        $sql->bindValue(12,$deco14);
        $sql->bindValue(13,$deco15);
        $sql->bindValue(14,$deco16);
        $sql->bindValue(15,$deco17);
        $sql->bindValue(16,$deco18);
        $sql->bindValue(17,$deco19);
        $sql->bindValue(18,$deco20);
        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function update_deco($id_deco ,$dec_descripcion,$id_contrato ,$dec_cas_id,$dec_proveedor,$dec_rayado,$dec_marca,$dec_modelo,$dec_serie,$deco_nota,$deco_linkGooFotoAparatos,$datos_rescatados,$deco14,$deco15,$deco16,$deco17,$deco18,$deco19,$deco20){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="UPDATE decos SET
 
            dec_descripcion = ?,  
            id_contrato  = ? ,  
            dec_cas_id= ? ,  
            dec_proveedor = ?,  
            dec_rayado = ?,  
            dec_marca = ?,  
            dec_modelo = ?,  
            dec_serie = ?,  
            deco_nota = ?,  
            deco_linkGooFotoAparatos = ?,  
            datos_rescatados = ?,  
            deco14 = ?,  
            deco15 = ?,  
            deco16 = ?,  
            deco17 = ?,
            deco18 = ?,
            deco19 = ?,
            deco20 = ?

        WHERE
        id_deco  =?  ";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$dec_descripcion);
        $sql->bindValue(2,$id_contrato);
        $sql->bindValue(3,$dec_cas_id);
        $sql->bindValue(4,$dec_proveedor);
        $sql->bindValue(5,$dec_rayado);
        $sql->bindValue(6,$dec_marca);
        $sql->bindValue(7,$dec_modelo);
        $sql->bindValue(8,$dec_serie);
        $sql->bindValue(9,$deco_nota);
        $sql->bindValue(10,$deco_linkGooFotoAparatos);
        $sql->bindValue(11,$datos_rescatados);
        $sql->bindValue(12,$deco14);
        $sql->bindValue(13,$deco15);
        $sql->bindValue(14,$deco16);
        $sql->bindValue(15,$deco17);
        $sql->bindValue(16,$deco18);
        $sql->bindValue(17,$deco19);
        $sql->bindValue(18,$deco20);
        $sql->bindValue(19,$id_deco);


        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);

    } 

    public function desactivar_deco($id_deco){ 
        $conectar=parent::conexion();
        parent::set_names();
        $sql="UPDATE decos SET
            dec_estado=0
            WHERE
            id_deco =?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$id_deco);
        $sql->execute();
        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function activar_deco($id_deco){ 
        $conectar=parent::conexion();
        parent::set_names();
        $sql="UPDATE decos SET
            dec_estado=1
            WHERE
            id_deco =?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$id_deco);
        $sql->execute();
        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);
    } 

    public function eliminar_deco($id_deco){ 
        $conectar=parent::conexion();
        parent::set_names();
        $sql="DELETE FROM decos
            WHERE id_deco = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$id_deco);
        $sql->execute();
        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function liberar_deco($id_deco) {
        $conectar = parent::conexion(); 
        parent::set_names();
        
        // Actualizar la tabla decos
        $sql_deco = "UPDATE decos SET id_cli = '', dec_estado = 2 WHERE id_deco = ?";
        $stmt_deco = $conectar->prepare($sql_deco);
        $stmt_deco->bindValue(1, $id_deco);
        $stmt_deco->execute();
    
        // Actualizar la tabla dispo_historial
        $sql_historial = "UPDATE dispo_historial SET fech_desasignacion = NOW() WHERE id_deco = ?";
        $stmt_historial = $conectar->prepare($sql_historial);
        $stmt_historial->bindValue(1, $id_deco);
        $stmt_historial->execute();
    
        return true;
    }
    


    /************* LISTADOS DE DECOS *********** */

    public function get_list_deco(){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT id_deco,
        dec_descripcion FROM decos
        WHERE dec_estado = 1 OR dec_estado = 2;";
        $sql=$conectar->prepare($sql);
        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function verificarDeco($id_deco){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT decos.id_deco, clientesv1.cli_id, 
            CONCAT(clientesv1.cli_nombre,' ',clientesv1.cli_apellido) AS cliente_deco, 
            decos.dec_estado 
            FROM decos 
            LEFT JOIN clientesv1 ON decos.id_cli = clientesv1.cli_id
            WHERE id_deco = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$id_deco);
        
        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_deco(){
 
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT decos.*, 
            CONCAT(clientesv1.cli_nombre, ' ',clientesv1.cli_apellido)AS cliente, 
            CONCAT( IFNULL(contratos.id_contrato,'Sin'), ' - ', IFNULL(contratos.contr_descripcion,'Contrato')) AS contrato, 
            CONCAT(titulares.titu_nom,' ',titulares.titu_apellido) AS TITULAR 
            FROM decos 
            LEFT JOIN contratos ON decos.id_contrato = contratos.id_contrato 
            LEFT JOIN titulares ON contratos.id_titular = titulares.id_titular 
            LEFT JOIN clientesv1 ON decos.id_cli = clientesv1.cli_id";
            $sql= $conectar->prepare($sql);
        $sql->execute();

        return $result=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_deco_x_id($id_deco){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM decos WHERE id_deco =? AND dec_estado=1";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$id_deco);
        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);

    }
    
    public function listarDecosActivos(){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT decos.*, 
        CONCAT(clientesv1.cli_nombre, ' ',clientesv1.cli_apellido)AS cliente, 
        CONCAT( IFNULL(contratos.id_contrato,'Sin'), ' - ', IFNULL(contratos.contr_descripcion,'Contrato')) AS contrato, 
        CONCAT(titulares.titu_nom,' ',titulares.titu_apellido) AS TITULAR 
        FROM decos 
        LEFT JOIN contratos ON decos.id_contrato = contratos.id_contrato 
        LEFT JOIN titulares ON contratos.id_titular = titulares.id_titular 
        LEFT JOIN clientesv1 ON decos.id_cli = clientesv1.cli_id
        WHERE dec_estado = 1";
        $sql=$conectar->prepare($sql);
        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function listarDecosDesactivados(){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT decos.*, 
        CONCAT(clientesv1.cli_nombre, ' ',clientesv1.cli_apellido)AS cliente, 
        CONCAT( IFNULL(contratos.id_contrato,'Sin'), ' - ', IFNULL(contratos.contr_descripcion,'Contrato')) AS contrato, 
        CONCAT(titulares.titu_nom,' ',titulares.titu_apellido) AS TITULAR 
        FROM decos 
        LEFT JOIN contratos ON decos.id_contrato = contratos.id_contrato 
        LEFT JOIN titulares ON contratos.id_titular = titulares.id_titular 
        LEFT JOIN clientesv1 ON decos.id_cli = clientesv1.cli_id
        WHERE dec_estado = 0 ";
        $sql=$conectar->prepare($sql);
        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);

    }
    public function listarDecosLibres(){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT decos.*, 
        CONCAT(clientesv1.cli_nombre, ' ',clientesv1.cli_apellido)AS cliente, 
        CONCAT( IFNULL(contratos.id_contrato,'Sin'), ' - ', IFNULL(contratos.contr_descripcion,'Contrato')) AS contrato, 
        CONCAT(titulares.titu_nom,' ',titulares.titu_apellido) AS TITULAR 
        FROM decos 
        LEFT JOIN contratos ON decos.id_contrato = contratos.id_contrato 
        LEFT JOIN titulares ON contratos.id_titular = titulares.id_titular 
        LEFT JOIN clientesv1 ON decos.id_cli = clientesv1.cli_id
        WHERE dec_estado = 2 or dec_estado= 3";
        $sql=$conectar->prepare($sql);
        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);

    }


        /******************HISTORIAL DE DECOS ****************************** */

    public function actualizarClienteDeco($id_deco, $id_cli)
    {
        $conectar = parent::conexion();
        parent::set_names();

        // Actualizar el estado y cliente del id_deco
        $sql1 = "UPDATE decos
                SET dec_estado = 1, id_cli = ?
                WHERE id_deco = ?";
        $stmt1 = $conectar->prepare($sql1);
        $stmt1->bindValue(1, $id_cli);
        $stmt1->bindValue(2, $id_deco);
        $stmt1->execute();

        // Insertar en dispo_historial si no existe otro historial con la misma id_deco y id_cliente
        $sql2 = "INSERT INTO dispo_historial (id_deco, id_cliente, fech_asignacion)
                SELECT ?, ?, CURDATE()
                FROM (SELECT 1) AS tmp
                WHERE NOT EXISTS (
                    SELECT 1
                    FROM dispo_historial
                    WHERE id_deco = ?
                        AND id_cliente = ?
                        AND fech_desasignacion IS NULL
                )";
        $stmt2 = $conectar->prepare($sql2);
        $stmt2->bindValue(1, $id_deco);
        $stmt2->bindValue(2, $id_cli);
        $stmt2->bindValue(3, $id_deco);
        $stmt2->bindValue(4, $id_cli);
        $stmt2->execute();
    }


}



?>