<?php 

class Servicio extends Conectar{


    public function get_servicio(){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM servicios";
        $sql=$conectar->prepare($sql);
        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function delete_servicio($serv_id){
        $conectar=parent::conexion();
        parent::set_names();
        $sql="UPDATE servicios SET
            serv_est=0
            WHERE
            serv_id=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$serv_id);
        $sql->execute();
        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_servicio_x_id($serv_id){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM servicios WHERE serv_id=? AND serv_est=1";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$serv_id);
        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function insert_servicio($serv_nom,$serv_obser){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO servicios (serv_id, serv_nom, serv_obser, serv_est) 
        VALUES (NULL, ?, ?, 1);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$serv_nom);
        $sql->bindValue(2,$serv_obser);
        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);

    }


    public function update_servicio($serv_id,$serv_nom,$serv_obser){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="UPDATE servicios SET
        serv_nom=?,
        serv_obser=?,
        WHERE
        serv_id=?
        ";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$serv_nom);
        $sql->bindValue(2,$serv_obser);
        $sql->bindValue(3,$serv_id);
        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function get_list_servicio(){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT serv_id,
        serv_nom FROM servicios;";
        $sql=$conectar->prepare($sql);
        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function conteo_servicios(){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT COUNT(*) AS num_servicios FROM servicios";
        $sql=$conectar->prepare($sql);
        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);

    }
 }


?>