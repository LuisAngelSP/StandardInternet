<?php

class NuevaInstalacion extends Conectar
{ 


    public function get_instalacion()
    {

        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT 
            new_instalacion.*,
            CONCAT(clientesv1.cli_nombre, ' ', clientesv1.cli_apellido) AS Cliente,
            IFNULL(servicios.serv_nom, 'sin-servicio') AS Servicio,
            modems.mod_descripcion AS Modems,
            routes.rout_descripcion AS Routers,
            decos.dec_descripcion AS Decos
        FROM new_instalacion 
        LEFT JOIN clientesv1 ON new_instalacion.cli_id = clientesv1.cli_id
        LEFT JOIN servicios ON new_instalacion.serv_id = servicios.serv_id
        LEFT JOIN modems ON new_instalacion.mod_id = modems.id_modem
        LEFT JOIN routes ON new_instalacion.rout_id = routes.id_route
        LEFT JOIN decos ON new_instalacion.deco_id = decos.id_deco;";
        $sql = $conectar->prepare($sql);
        $sql->execute();

        return $results = $sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function get_instalacion_x_id($inst_id)
    {

        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM new_instalacion WHERE inst_id =? AND inst_est=1";
        $sql = $conectar->prepare($sql); 
        $sql->bindValue(1, $inst_id);
        $sql->execute();

        return $results = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
   
    public function insert_instalacion($cli_id, $serv_id, $inst_precio, $inst_observacion, $cantidad_metros_cable, $inst_fech, $mod_id, $rout_id, $deco_id, $import_servicio, $lugar_conexion, $id_casas, $cuenta_usuario, $contra_usuario, $perfil_usuario, $tipo_conexion, $velocidad_MB, $instalacion17, $instalacion18, $instalacion19, $instalacion20, $instalacion21, $instalacion22, $instalacion23, $instalacion24, $instalacion25)
    {
        $conectar = parent::conexion();
        parent::set_names();
        

    
            $insertSql = "INSERT INTO new_instalacion (inst_id, cli_id, serv_id, inst_precio, inst_observacion, cantidad_metros_cable, inst_fech, mod_id, rout_id, deco_id, import_servicio, lugar_conexion, id_casas, cuenta_usuario, contra_usuario, perfil_usuario, tipo_conexion, velocidad_MB, instalacion17, instalacion18, instalacion19, instalacion20, instalacion21, instalacion22, instalacion23, instalacion24, instalacion25, inst_est)
            VALUES (NULL,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?, 1)";
    
            $insertStmt = $conectar->prepare($insertSql);
            $insertStmt->bindValue(1, $cli_id);
            $insertStmt->bindValue(2, $serv_id);
            $insertStmt->bindValue(3, $inst_precio);
            $insertStmt->bindValue(4, $inst_observacion);
            $insertStmt->bindValue(5, $cantidad_metros_cable);
            $insertStmt->bindValue(6, $inst_fech);
            $insertStmt->bindValue(7, $mod_id);
            $insertStmt->bindValue(8, $rout_id);
            $insertStmt->bindValue(9, $deco_id);
            $insertStmt->bindValue(10, $import_servicio);
            $insertStmt->bindValue(11, $lugar_conexion);
            $insertStmt->bindValue(12, $id_casas);
            $insertStmt->bindValue(13, $cuenta_usuario);
            $insertStmt->bindValue(14, $contra_usuario);
            $insertStmt->bindValue(15, $perfil_usuario);
            $insertStmt->bindValue(16, $tipo_conexion);
            $insertStmt->bindValue(17, $velocidad_MB);
            $insertStmt->bindValue(18, $instalacion17);
            $insertStmt->bindValue(19, $instalacion18);
            $insertStmt->bindValue(20, $instalacion19);
            $insertStmt->bindValue(21, $instalacion20);
            $insertStmt->bindValue(22, $instalacion21);
            $insertStmt->bindValue(23, $instalacion22);
            $insertStmt->bindValue(24, $instalacion23);
            $insertStmt->bindValue(25, $instalacion24);
            $insertStmt->bindValue(26, $instalacion25);
            $insertStmt->execute();
        
            return $results = $insertStmt->fetchAll(PDO::FETCH_ASSOC);

        
    } 
    
    
   
    public function update_instalacion($inst_id, $cli_id, $serv_id, $inst_precio, $inst_observacion, $cantidad_metros_cable, $inst_fech, $mod_id, $rout_id, $deco_id, $import_servicio, $lugar_conexion, $id_casas, $cuenta_usuario, $contra_usuario, $perfil_usuario, $tipo_conexion, $velocidad_MB, $instalacion17, $instalacion18, $instalacion19, $instalacion20, $instalacion21, $instalacion22, $instalacion23, $instalacion24, $instalacion25)
    {

        $conectar = parent::conexion();
        parent::set_names();

        $sql = "UPDATE new_instalacion SET
     
            cli_id  = ?,  
            serv_id   = ? ,  
            inst_precio= ? ,  
            inst_observacion = ?,  
            cantidad_metros_cable = ?,  
            inst_fech = ?,  
            mod_id  = ?,  
            rout_id  = ?,  
            deco_id  = ?,  
            import_servicio = ?,  
            lugar_conexion = ?,  
            id_casas	 = ?,  
            cuenta_usuario = ?,  
            contra_usuario = ?,  
            perfil_usuario = ?,
            tipo_conexion = ?,
            velocidad_MB = ?,
            instalacion17 = ?,
            instalacion18 = ?,
            instalacion19 = ?,
            instalacion20  = ?,
            instalacion21 = ?,
            instalacion22 = ?,
            instalacion23 = ?,
            instalacion24 = ?,
            instalacion25 = ?

    
            WHERE
            inst_id  = ?  ";
        $sql = $conectar->prepare($sql);

        $sql->bindValue(1, $cli_id);
        $sql->bindValue(2, $serv_id);
        $sql->bindValue(3, $inst_precio);
        $sql->bindValue(4, $inst_observacion);
        $sql->bindValue(5, $cantidad_metros_cable);
        $sql->bindValue(6, $inst_fech);
        $sql->bindValue(7, $mod_id);
        $sql->bindValue(8, $rout_id);
        $sql->bindValue(9, $deco_id);
        $sql->bindValue(10, $import_servicio);
        $sql->bindValue(11, $lugar_conexion);
        $sql->bindValue(12, $id_casas);
        $sql->bindValue(13, $cuenta_usuario);
        $sql->bindValue(14, $contra_usuario);
        $sql->bindValue(15, $perfil_usuario);
        $sql->bindValue(16, $tipo_conexion);
        $sql->bindValue(17, $velocidad_MB);
        $sql->bindValue(18, $instalacion17);
        $sql->bindValue(19, $instalacion18);
        $sql->bindValue(20, $instalacion19);
        $sql->bindValue(21, $instalacion20);
        $sql->bindValue(22, $instalacion21);
        $sql->bindValue(23, $instalacion22);
        $sql->bindValue(24, $instalacion23);
        $sql->bindValue(25, $instalacion24);
        $sql->bindValue(26, $instalacion25);
        $sql->bindValue(27, $inst_id);


        $sql->execute();
        return $results = $sql->fetchAll(PDO::FETCH_ASSOC);
            
    }

    public function delete_instalacion($inst_id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE new_instalacion SET
                inst_est=0
                WHERE
                inst_id=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $inst_id);
        $sql->execute();
        return $results = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_casas()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM casas WHERE id_casas = ?;";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $results = $sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function conteo_instalaciones()
    {

        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT COUNT(*) AS num_instalaciones FROM new_instalacion";
        $sql = $conectar->prepare($sql);
        $sql->execute();

        return $results = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
