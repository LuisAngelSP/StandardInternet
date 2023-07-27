<?php 

class Compromiso extends Conectar{


    public function get_compromiso(){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT compromiso.*,
        CONCAT(clientesv1.cli_nombre, ' ', clientesv1.cli_apellido) AS cliente
        FROM compromiso
        LEFT JOIN clientesv1 ON compromiso.id_cliente = clientesv1.cli_id
        WHERE comp_estado = 1
        ORDER BY comp_fech ASC;";
        $sql=$conectar->prepare($sql);
        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);

    }
    public function historial_compromiso(){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT compromiso.*,
        CONCAT(clientesv1.cli_nombre, ' ', clientesv1.cli_apellido) AS cliente
        FROM compromiso
        LEFT JOIN clientesv1 ON compromiso.id_cliente = clientesv1.cli_id
        WHERE comp_estado = 0
        ORDER BY fech_cumplimiento ASC;";
        $sql=$conectar->prepare($sql);
        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function get_compromiso_cercanos(){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT compromiso.*,
        CONCAT(clientesv1.cli_nombre, ' ', clientesv1.cli_apellido) AS cliente,
        CASE
            WHEN comp_fech > CURDATE() THEN DATEDIFF(comp_fech, CURDATE())  -- Días restantes para el compromiso futuro
            WHEN comp_fech < CURDATE() THEN DATEDIFF(CURDATE(), comp_fech)  -- Días pasados desde el compromiso pasado
            ELSE 0  -- Compromiso en el día actual
        END AS dias_transcurridos
            FROM compromiso
            LEFT JOIN clientesv1 ON compromiso.id_cliente = clientesv1.cli_id
            WHERE comp_fech BETWEEN DATE_SUB(CURDATE(), INTERVAL 100 DAY) AND DATE_ADD(CURDATE(), INTERVAL 5 DAY)
            AND comp_estado = 1
            ORDER BY comp_fech ASC;";
        $sql=$conectar->prepare($sql);
        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function insert_compromiso($id_cliente,$comp_fech,$comp_descrip,$comp_tipo){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO compromiso (id_compromiso, id_cliente, comp_fech, comp_descrip, comp_tipo, comp_estado) VALUES (NULL, ?, ?, ?, ?, '1');";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$id_cliente);
        $sql->bindValue(2,$comp_fech);
        $sql->bindValue(3,$comp_descrip);
        $sql->bindValue(4,$comp_tipo);

        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function update_compromiso($id_compromiso,$comp_fech,$comp_descrip,$comp_tipo){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="UPDATE compromiso SET
            comp_fech=?,
            comp_descrip=?,
            comp_tipo=?
         WHERE
         id_compromiso =?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$comp_fech);
        $sql->bindValue(2,$comp_descrip);
        $sql->bindValue(3,$comp_tipo);
        $sql->bindValue(4,$id_compromiso);

        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function get_compromiso_x_id($id_compromiso){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT compromiso.*,
        CONCAT(clientesv1.cli_nombre, ' ', clientesv1.cli_apellido) AS cliente
        FROM         
        compromiso 
        LEFT JOIN clientesv1 ON compromiso.id_cliente = clientesv1.cli_id
        WHERE id_compromiso=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$id_compromiso);
        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);

    }


    public function realizado_compromiso($id_compromiso){
        $conectar=parent::conexion();
        parent::set_names();
        $sql="UPDATE compromiso SET
            fech_cumplimiento=now(),
            comp_estado=0
            WHERE
            id_compromiso =?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$id_compromiso);
        $sql->execute();
        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function delete_Comprimiso($id_compromiso){
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "DELETE FROM compromiso WHERE id_compromiso = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_compromiso);
        $sql->execute();
        return $results = $sql->fetchAll(PDO::FETCH_ASSOC);
    }



    public function conteo_compromiso(){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT COUNT(*) AS compromiso
        FROM compromiso 
        WHERE comp_fech >= CURDATE() - INTERVAL 100 DAY
          AND comp_fech <= CURDATE() + INTERVAL 5 DAY AND comp_estado = 1";
        $sql=$conectar->prepare($sql);
        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);

    }





 }


?>