<?php
    require_once __DIR__. "/../config/conexion.php";

class Contrato extends Conectar
{

    public function get_contrato()
    {

        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT contratos.*, 
        CONCAT(IFNULL(titulares.titu_nom, 'Sin'), ' ', 
        IFNULL(titulares.titu_apellido, 'titular') ) AS nombre_titular
        FROM contratos LEFT JOIN 
        titulares ON contratos.id_titular = titulares.id_titular;";
        $sql = $conectar->prepare($sql);
        $sql->execute();

        return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_contrato($contr_descripcion, $id_titular, $contr_tip_conexion, $contr_fech, $contr_tarifa, $contr_fech_Inst, $mapaCoordenadasUbicacion, $contr_direccion, $contrato14, $contrato15, $contrato16, $contrato17, $contrato18, $contrato19, $contrato20)
    {

        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO  contratos  ( id_contrato  ,  contr_descripcion ,  id_titular  ,  contr_tip_conexion ,  contr_fech ,  contr_tarifa ,  contr_fech_Inst ,  mapaCoordenadasUbicacion ,  contr_direccion ,  contrato14 ,  contrato15 ,  contrato16 ,  contrato17 ,  contrato18 ,  contrato19 ,  contrato20 ,  contr_est ) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1);";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $contr_descripcion);
        $sql->bindValue(2, $id_titular);
        $sql->bindValue(3, $contr_tip_conexion);
        $sql->bindValue(4, $contr_fech);
        $sql->bindValue(5, $contr_tarifa);
        $sql->bindValue(6, $contr_fech_Inst);
        $sql->bindValue(7, $mapaCoordenadasUbicacion);
        $sql->bindValue(8, $contr_direccion);
        $sql->bindValue(9, $contrato14);
        $sql->bindValue(10, $contrato15);
        $sql->bindValue(11, $contrato16);
        $sql->bindValue(12, $contrato17);
        $sql->bindValue(13, $contrato18);
        $sql->bindValue(14, $contrato19);
        $sql->bindValue(15, $contrato20);


        $sql->execute();

        return $results = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_contrato($id_contrato, $contr_descripcion, $id_titular, $contr_tip_conexion, $contr_fech, $contr_tarifa, $contr_fech_Inst, $mapaCoordenadasUbicacion, $contr_direccion, $contrato14, $contrato15, $contrato16, $contrato17, $contrato18, $contrato19, $contrato20)
    {

        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE contratos SET
 
        contr_descripcion = ?,  
        id_titular = ? ,  
        contr_tip_conexion= ? ,  
        contr_fech = ?,  
        contr_tarifa = ?,  
        contr_fech_Inst = ?,  
        mapaCoordenadasUbicacion = ?,  
        contr_direccion = ?,  
        contrato14 = ?,  
        contrato15 = ?,  
        contrato16 = ?,  
        contrato17 = ?,  
        contrato18 = ?,  
        contrato19 = ?,  
        contrato20 = ? 

        WHERE
        id_contrato  =?
        ";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $contr_descripcion);
        $sql->bindValue(2, $id_titular);
        $sql->bindValue(3, $contr_tip_conexion);
        $sql->bindValue(4, $contr_fech);
        $sql->bindValue(5, $contr_tarifa);
        $sql->bindValue(6, $contr_fech_Inst);
        $sql->bindValue(7, $mapaCoordenadasUbicacion);
        $sql->bindValue(8, $contr_direccion);
        $sql->bindValue(9, $contrato14);
        $sql->bindValue(10, $contrato15);
        $sql->bindValue(11, $contrato16);
        $sql->bindValue(12, $contrato17);
        $sql->bindValue(13, $contrato18);
        $sql->bindValue(14, $contrato19);
        $sql->bindValue(15, $contrato20);
        $sql->bindValue(16, $id_contrato);

        $sql->execute();

        return $results = $sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function get_contrato_x_id($id_contrato)
    {

        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM contratos WHERE id_contrato =? AND contr_est=1";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_contrato);
        $sql->execute();

        return $results = $sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function get_titular_x_form()
    {

        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT id_titular, CONCAT(titulares.titu_nom, ' ', 
        titulares.titu_apellido)AS nombre_completo FROM titulares ";
        $sql = $conectar->prepare($sql);
        $sql->execute();

        return $results = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_contrato_x_form()
    {

        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT 
        contratos.id_contrato, 
        contratos.contr_descripcion ,
        CONCAT(titulares.titu_nom,titulares.titu_apellido) AS TITULAR
        FROM contratos LEFT JOIN
        titulares ON contratos.id_titular=titulares.id_titular ; ";
        $sql = $conectar->prepare($sql);
        $sql->execute();

        return $results = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}