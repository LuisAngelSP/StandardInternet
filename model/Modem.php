<?php



class Modem extends Conectar{

    public function get_modem(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT modems.*, 
        CONCAT(
            IFNULL(contratos.id_contrato,'Sin'),'-',
            IFNULL(contratos.contr_descripcion,'Contrato'))AS contrato, 
        CONCAT(titulares.titu_nom,' ',titulares.titu_apellido) AS TITULAR 
        FROM modems 
        LEFT JOIN contratos ON 
        modems.id_contrato = contratos.id_contrato 
        LEFT JOIN titulares ON contratos.id_titular = titulares.id_titular;";
        $sql= $conectar->prepare($sql);
        $sql->execute();

        return $result=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_modem_x_id($id_modem){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM modems WHERE id_modem =? AND mod_estado=1";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$id_modem);
        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function insert_modem($mod_descripcion,$mod_imagen ,$mod_codigo_acceso,$mod_marca,$mod_modelo,$mod_serie,$mod_wifi,$mod_password,$mod_wifi_default,$mod_pass_default,$mod_idaccess,$id_cli,$modem13,$modem14,$modem15,$modem16,$modem17,$modem18,$modem19,$modem20,$id_contrato){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO   modems   (  id_modem  ,   mod_descripcion  ,   mod_imagen  ,   mod_codigo_acceso  ,   mod_marca  ,   mod_modelo  ,   mod_serie  ,   mod_wifi  ,   mod_password  ,   mod_wifi_default  ,   mod_pass_default  ,   mod_idaccess  ,   id_cli  ,   modem13  ,   modem14  ,   modem15  ,   modem16  ,   modem17  ,   modem18  ,   modem19  ,   modem20  ,   id_contrato  ,   mod_estado  ) VALUES (NULL,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,2);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$mod_descripcion);
        $sql->bindValue(2,$mod_imagen);
        $sql->bindValue(3,$mod_codigo_acceso);
        $sql->bindValue(4,$mod_marca);
        $sql->bindValue(5,$mod_modelo);
        $sql->bindValue(6,$mod_serie);
        $sql->bindValue(7,$mod_wifi);
        $sql->bindValue(8,$mod_password);
        $sql->bindValue(9,$mod_wifi_default);
        $sql->bindValue(10,$mod_pass_default);
        $sql->bindValue(11,$mod_idaccess);
        $sql->bindValue(12,$id_cli);
        $sql->bindValue(13,$modem13);
        $sql->bindValue(14,$modem14);
        $sql->bindValue(15,$modem15);
        $sql->bindValue(16,$modem16);
        $sql->bindValue(17,$modem17);
        $sql->bindValue(18,$modem18);
        $sql->bindValue(19,$modem19);
        $sql->bindValue(20,$modem20);
        $sql->bindValue(21,$id_contrato);
        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function update_modem($id_modem ,$mod_descripcion,$mod_imagen ,$mod_codigo_acceso,$mod_marca,$mod_modelo,$mod_serie,$mod_wifi,$mod_password,$mod_wifi_default,$mod_pass_default,$mod_idaccess,$id_cli,$modem13,$modem14,$modem15,$modem16,$modem17,$modem18,$modem19,$modem20,$id_contrato){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="UPDATE modems SET
 
        mod_descripcion = ?,  
        mod_imagen  = ? ,  
        mod_codigo_acceso= ? ,  
        mod_marca = ?,  
        mod_modelo = ?,  
        mod_serie = ?,  
        mod_wifi = ?,  
        mod_password = ?,  
        mod_wifi_default = ?,  
        mod_pass_default = ?,  
        mod_idaccess = ?,  
        id_cli	 = ?,  
        modem13 = ?,  
        modem14 = ?,  
        modem15 = ?,
        modem16 = ?,
        modem17 = ?,
        modem18 = ?,
        modem19 = ?,
        modem20 = ?,
        id_contrato  = ?

        WHERE
        id_modem = ?  ";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$mod_descripcion);
        $sql->bindValue(2,$mod_imagen);
        $sql->bindValue(3,$mod_codigo_acceso);
        $sql->bindValue(4,$mod_marca);
        $sql->bindValue(5,$mod_modelo);
        $sql->bindValue(6,$mod_serie);
        $sql->bindValue(7,$mod_wifi);
        $sql->bindValue(8,$mod_password);
        $sql->bindValue(9,$mod_wifi_default);
        $sql->bindValue(10,$mod_pass_default);
        $sql->bindValue(11,$mod_idaccess);
        $sql->bindValue(12,$id_cli);
        $sql->bindValue(13,$modem13);
        $sql->bindValue(14,$modem14);
        $sql->bindValue(15,$modem15);
        $sql->bindValue(16,$modem16);
        $sql->bindValue(17,$modem17);
        $sql->bindValue(18,$modem18);
        $sql->bindValue(19,$modem19);
        $sql->bindValue(20,$modem20);
        $sql->bindValue(21,$id_contrato);
        $sql->bindValue(22,$id_modem);


        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function get_list_modem(){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT id_modem,
        mod_descripcion FROM modems;";
        $sql=$conectar->prepare($sql);
        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);
    }




    public function verificarModem($id_modem){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT modems.id_modem, clientesv1.cli_id, 
        CONCAT(clientesv1.cli_nombre,' ',clientesv1.cli_apellido) AS cliente_modem, 
        modems.mod_estado 
        FROM modems 
        LEFT JOIN clientesv1 ON modems.`id_cli` = clientesv1.cli_id
        WHERE id_modem = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$id_modem);
        
        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function liberar_modem($id_modem) {
        $conectar = parent::conexion(); 
        parent::set_names();
        
        // Actualizar la tabla decos
        $sql_deco = "UPDATE modems SET id_cli = '', mod_estado = 2 WHERE id_modem = ?";
        $stmt_deco = $conectar->prepare($sql_deco);
        $stmt_deco->bindValue(1, $id_modem);
        $stmt_deco->execute();
    
        // Actualizar la tabla dispo_historial
        $sql_historial = "UPDATE dispo_historial SET fech_desasignacion = NOW() WHERE id_modem = ?";
        $stmt_historial = $conectar->prepare($sql_historial);
        $stmt_historial->bindValue(1, $id_modem);
        $stmt_historial->execute();
    
        return true;
    }



        /******************HISTORIAL DE MODEMS ****************************** */

    public function actualizarClienteModems($id_modem, $id_cli)
    {
        $conectar = parent::conexion();
        parent::set_names();

        // Actualizar el estado y cliente del id_deco
        $sql1 = "UPDATE modems
                SET mod_estado = 1, id_cli = ?
                WHERE id_modem = ?";
        $stmt1 = $conectar->prepare($sql1);
        $stmt1->bindValue(1, $id_cli);
        $stmt1->bindValue(2, $id_modem);
        $stmt1->execute();

        // Insertar en dispo_historial si no existe otro historial con la misma id_deco y id_cliente
        $sql2 = "INSERT INTO dispo_historial (id_modem, id_cliente, fech_asignacion)
                SELECT ?, ?, CURDATE()
                FROM (SELECT 1) AS tmp
                WHERE NOT EXISTS (
                    SELECT 1
                    FROM dispo_historial
                    WHERE id_modem = ?
                        AND id_cliente = ?
                        AND fech_desasignacion IS NULL
                )";
        $stmt2 = $conectar->prepare($sql2);
        $stmt2->bindValue(1, $id_modem);
        $stmt2->bindValue(2, $id_cli);
        $stmt2->bindValue(3, $id_modem);
        $stmt2->bindValue(4, $id_cli);
        $stmt2->execute();
    }
        

}

?>