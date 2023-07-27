<?php 

class Clientev2 extends Conectar{


    public function get_cliente(){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT *
        FROM clientesv3";
        $sql=$conectar->prepare($sql);
        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function delete_cliente($cli_id){
        $conectar=parent::conexion();
        parent::set_names();
        $sql="UPDATE clientesv1 SET
            cli_est=0
            WHERE
            cli_id =?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$cli_id);
        $sql->execute();
        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_cliente_x_id($cli_id){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM clientesv1 WHERE cli_id=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$cli_id);
        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function insert_cliente($cli_fono,$cli_nombre ,$cli_apellido,$cli_fb,$cli_sexo,$cli_correo,$cli_dni,$cli_linkGooContac,$cli_linkGooFotoAparatos,$cli_direccion,$cli_ocupacion,$cli_memoria,$cliente14,$cliente15,$cliente16,$cliente17,$cliente18,$cliente19,$cliente20){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO clientesv1 (cli_id, cli_fono, cli_nombre, cli_apellido, cli_fb, cli_sexo, cli_correo, cli_dni, cli_linkGooContac, cli_linkGooFotoAparatos, cli_direccion, cli_ocupacion, cli_memoria, cliente14, cliente15, cliente16, cliente17, cliente18, cliente19, cliente20, cli_est) VALUES (NULL,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,1);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$cli_fono);
        $sql->bindValue(2,$cli_nombre);
        $sql->bindValue(3,$cli_apellido);
        $sql->bindValue(4,$cli_fb);
        $sql->bindValue(5,$cli_sexo);
        $sql->bindValue(6,$cli_correo);
        $sql->bindValue(7,$cli_dni);
        $sql->bindValue(8,$cli_linkGooContac);
        $sql->bindValue(9,$cli_linkGooFotoAparatos);
        $sql->bindValue(10,$cli_direccion);
        $sql->bindValue(11,$cli_ocupacion);
        $sql->bindValue(12,$cli_memoria);
        $sql->bindValue(13,$cliente14);
        $sql->bindValue(14,$cliente15);
        $sql->bindValue(15,$cliente16);
        $sql->bindValue(16,$cliente17);
        $sql->bindValue(17,$cliente18);
        $sql->bindValue(18,$cliente19);
        $sql->bindValue(19,$cliente20);


        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function update_cliente($cli_id ,$cli_fono,$cli_nombre ,$cli_apellido,$cli_fb,$cli_sexo,$cli_correo,$cli_dni,$cli_linkGooContac,$cli_linkGooFotoAparatos,$cli_direccion,$cli_ocupacion,$cli_memoria,$cliente14,$cliente15,$cliente16,$cliente17,$cliente18,$cliente19,$cliente20){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="UPDATE clientesv1 SET
        cli_fono=?,
        cli_nombre=?,
        cli_apellido=?,
        cli_fb=?,
        cli_sexo=?,
        cli_correo=?,
        cli_dni=?,
        cli_linkGooContac=?,
        cli_linkGooFotoAparatos=?,
        cli_direccion=?,
        cli_ocupacion=?,
        cli_memoria=?,
        cliente14=?,
        cliente15=?,
        cliente16=?,
        cliente17=?,
        cliente18=?,
        cliente19=?,
        cliente20=? 
        WHERE
        cli_id =?
        ";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$cli_fono);
        $sql->bindValue(2,$cli_nombre);
        $sql->bindValue(3,$cli_apellido);
        $sql->bindValue(4,$cli_fb);
        $sql->bindValue(5,$cli_sexo);
        $sql->bindValue(6,$cli_correo);
        $sql->bindValue(7,$cli_dni);
        $sql->bindValue(8,$cli_linkGooContac);
        $sql->bindValue(9,$cli_linkGooFotoAparatos);
        $sql->bindValue(10,$cli_direccion);
        $sql->bindValue(11,$cli_ocupacion);
        $sql->bindValue(12,$cli_memoria);
        $sql->bindValue(13,$cliente14);
        $sql->bindValue(14,$cliente15);
        $sql->bindValue(15,$cliente16);
        $sql->bindValue(16,$cliente17);
        $sql->bindValue(17,$cliente18);
        $sql->bindValue(18,$cliente19);
        $sql->bindValue(19,$cliente20);
        $sql->bindValue(20,$cli_id);
        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function get_list_cliente(){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT cli_id,
        CONCAT(cli_nombre,' ',cli_apellido) AS Cliente FROM clientesv1; ";
        $sql=$conectar->prepare($sql);
        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function get_vista_cliente(){
        
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT cli_id,
        CONCAT(cli_nombre,' ',cli_apellido) AS Cliente FROM clientesv1; ";
        $sql=$conectar->prepare($sql);
        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);


    }

    public function conteo_cliente(){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT COUNT(*) AS num_clientes FROM clientesv1";
        $sql=$conectar->prepare($sql);
        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);

    }





 }


?>