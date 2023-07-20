<?php 

class Mensaje extends Conectar{


    public function get_mensaje(){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM mensaje";
        $sql=$conectar->prepare($sql);
        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

    // public function delete_servicio($serv_id){
    //     $conectar=parent::conexion();
    //     parent::set_names();
    //     $sql="UPDATE servicios SET
    //         serv_est=0
    //         WHERE
    //         serv_id=?";
    //     $sql=$conectar->prepare($sql);
    //     $sql->bindValue(1,$serv_id);
    //     $sql->execute();
    //     return $results=$sql->fetchAll(PDO::FETCH_ASSOC);
    // }

    public function get_mensaje_x_id($id_mensaje){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT id_mensaje,titulo,contenido,estado FROM mensaje WHERE id_mensaje=? AND estado=1";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$id_mensaje);
        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function insert_mensaje($titulo,$contenido){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO mensaje (id_mensaje,titulo,contenido, fecha_creacion,estado) 
        VALUES (NULL,?,?,now(), 1)";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$titulo);
        $sql->bindValue(2,$contenido);
        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);

    }


    public function update_mensaje($id_mensaje,$titulo,$contenido){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="UPDATE mensaje SET
        titulo = ?,
        contenido=?
        WHERE
        id_mensaje=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$titulo);
        $sql->bindValue(2,$contenido);
        $sql->bindValue(3,$id_mensaje);
        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function get_list_mensaje() {

        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT id_mensaje, titulo FROM mensaje;";
        $sql=$conectar->prepare($sql);
        $sql->execute();
    
        $results=$sql->fetchAll(PDO::FETCH_ASSOC);
    
        return $results;
    }
    
    // public function conteo_servicios(){

    //     $conectar= parent::conexion();
    //     parent::set_names();
    //     $sql="SELECT COUNT(*) AS num_servicios FROM servicios";
    //     $sql=$conectar->prepare($sql);
    //     $sql->execute();

    //     return $results=$sql->fetchAll(PDO::FETCH_ASSOC);

    // }
 }


?>