<?php

class Casa extends Conectar{


    public function get_casa(){
        $conexion=parent::conexion();
        parent::set_names();
        
        $sql="CALL casas_clientes();";
        $sql=$conexion->prepare($sql);
        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function get_casa_x_id($id_casas){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM casas WHERE id_casas=? AND cas_est=1";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$id_casas);
        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function delete_casa($id_casas){
        $conectar=parent::conexion();
        parent::set_names();
        $sql="UPDATE casas SET
            cas_est=0
            WHERE
            id_casas=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$id_casas);
        $sql->execute();
        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_casa($id_casas ,$cas_descripcion,$cas_direccion,$casa12,$casa13,$casa14,$casa15,$id_cliente){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="UPDATE casas SET
        cas_descripcion=?,
        cas_direccion=?,
        casa12=?,
        casa13=?,
        casa14=?,
        casa15=?,
        id_cliente =?
        WHERE
        id_casas=?
        ";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$cas_descripcion);
        $sql->bindValue(2,$cas_direccion);
        $sql->bindValue(3,$casa12);
        $sql->bindValue(4,$casa13);
        $sql->bindValue(5,$casa14);
        $sql->bindValue(6,$casa15);
        $sql->bindValue(7,$id_cliente);
        $sql->bindValue(8,$id_casas);
        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function insert_casa_x_cliente($cas_direccion,$casa12,$casa13,$casa14,$casa15,$id_cliente) {
        $conectar = parent::conexion();
        parent::set_names();
    
        // Obtener la última descripción de la casa del cliente
        $sql = "SELECT MAX(cas_descripcion) AS max_descripcion FROM casas WHERE id_cliente=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1,$id_cliente);
        $sql->execute();
        $row = $sql->fetch();
        $max_descripcion = $row['max_descripcion'];
    
        if ($max_descripcion === null) {
            // Si el cliente no tiene ninguna casa registrada, se le asigna la casa 01
            $nueva_descripcion = "CASA 01";
        } else {
            // Incrementar el número de la casa
            $numero_casa = substr($max_descripcion, -2);
            $nueva_descripcion = "CASA " . str_pad($numero_casa + 1, 2, '0', STR_PAD_LEFT);
        }
    
        $sql="INSERT INTO casas (id_casas , cas_descripcion, cas_direccion, casa12,casa13,casa14,casa15,id_cliente,cas_est ) 
            VALUES (NULL, ?, ?,?,?,?,?,?, 1);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$nueva_descripcion);
            $sql->bindValue(2,$cas_direccion);
            $sql->bindValue(3,$casa12);
            $sql->bindValue(4,$casa13);
            $sql->bindValue(5,$casa14);
            $sql->bindValue(6,$casa15);
            $sql->bindValue(7,$id_cliente);

        $sql->execute();
        }

        public function get_casas_cliente($id_cliente) {
            $conectar = parent::conexion();
            parent::set_names();
        
            $sql = "SELECT id_casas, cas_descripcion, cas_direccion FROM casas WHERE id_cliente=?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $id_cliente);
            $sql->execute();

            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }


        public function get_casas_instalacion($inst_id)
        {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT c.id_casas, c.cas_descripcion
                    FROM casas c
                    INNER JOIN instalaciones i ON c.id_casas = i.id_casas
                    WHERE i.inst_id = ?";
            $stmt = $conectar->prepare($sql);
            $stmt->bindValue(1, $inst_id);
            $stmt->execute();
            return $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public Function get_casas_x_id($id_cliente){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="CALL get_casas_x_cliente(?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$id_cliente);
            $sql->execute();
    
            return $results=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        

}




?>