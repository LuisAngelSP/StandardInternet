<?php

class Titular extends Conectar{


    public function get_titular(){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT *,
            CONCAT(titu_nom,' ',titu_apellido) AS TITULAR
         FROM titulares";
        $sql= $conectar->prepare($sql);
        $sql->execute();

        return $result=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_titular($titu_nom,$titu_apellido ,$titu_fech_nac,$titu_dni,$titu_fech_caducidad,$titu_nom_mama,$titu_nom_papa,$titular11,$titular12,$titular13,$titular14,$titular15,$titular16,$titular17,$titular18,$titular19,$titular20){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO  titulares  ( id_titular ,  titu_nom ,  titu_apellido ,  titu_fech_nac ,  titu_dni ,  titu_fech_caducidad ,  titu_nom_mama ,  titu_nom_papa ,  titular11 ,  titular12 ,  titular13 ,  titular14 ,  titular15 ,  titular16 ,  titular17 ,  titular18 ,  titular19 ,  titular20 ,  titu_est ) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$titu_nom);
        $sql->bindValue(2,$titu_apellido);
        $sql->bindValue(3,$titu_fech_nac);
        $sql->bindValue(4,$titu_dni);
        $sql->bindValue(5,$titu_fech_caducidad);
        $sql->bindValue(6,$titu_nom_mama);
        $sql->bindValue(7,$titu_nom_papa);
        $sql->bindValue(8,$titular11);
        $sql->bindValue(9,$titular12);
        $sql->bindValue(10,$titular13);
        $sql->bindValue(11,$titular14);
        $sql->bindValue(12,$titular15);
        $sql->bindValue(13,$titular16);
        $sql->bindValue(14,$titular17);
        $sql->bindValue(15,$titular18);
        $sql->bindValue(16,$titular19);
        $sql->bindValue(17,$titular20);

        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function update_titular($id_titular ,$titu_nom,$titu_apellido ,$titu_fech_nac,$titu_dni,$titu_fech_caducidad,$titu_nom_mama,$titu_nom_papa,$titular11,$titular12,$titular13,$titular14,$titular15,$titular16,$titular17,$titular18,$titular19,$titular20){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="UPDATE titulares SET
 
        titu_nom = ?,  
        titu_apellido= ? ,  
        titu_fech_nac= ? ,  
        titu_dni = ?,  
        titu_fech_caducidad = ?,  
        titu_nom_mama = ?,  
        titu_nom_papa = ?,  
        titular11 = ?,  
        titular12 = ?,  
        titular13 = ?,  
        titular14 = ?,  
        titular15 = ?,  
        titular16 = ?,  
        titular17 = ?,  
        titular18 = ?,  
        titular19 = ?,  
        titular20 = ?
        WHERE
        id_titular =?
        ";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$titu_nom);
        $sql->bindValue(2,$titu_apellido);
        $sql->bindValue(3,$titu_fech_nac);
        $sql->bindValue(4,$titu_dni);
        $sql->bindValue(5,$titu_fech_caducidad);
        $sql->bindValue(6,$titu_nom_mama);
        $sql->bindValue(7,$titu_nom_papa);
        $sql->bindValue(8,$titular11);
        $sql->bindValue(9,$titular12);
        $sql->bindValue(10,$titular13);
        $sql->bindValue(11,$titular14);
        $sql->bindValue(12,$titular15);
        $sql->bindValue(13,$titular16);
        $sql->bindValue(14,$titular17);
        $sql->bindValue(15,$titular18);
        $sql->bindValue(16,$titular19);
        $sql->bindValue(17,$titular20);
        $sql->bindValue(18,$id_titular);

        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function delete_titular($id_titular){
        $conectar=parent::conexion();
        parent::set_names();
        $sql="UPDATE titulares SET
            titu_est=0
            WHERE
            id_titular =?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$id_titular);
        $sql->execute();
        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function get_titular_x_id($id_titular){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM titulares WHERE id_titular=? AND titu_est=1";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$id_titular);
        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);

    }


    public function conteo_titulares(){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT COUNT(*) AS num_titulares FROM titulares";
        $sql=$conectar->prepare($sql);
        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

}




?>