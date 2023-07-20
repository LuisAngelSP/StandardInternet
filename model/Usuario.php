<?php 
require_once __DIR__. "/../config/conexion.php";
class Usuario extends Conectar{


    public function login(){

        $conectar= parent::conexion();
        parent::set_names();
        
        if(isset($_POST["enviar"])){
            $usuario = $_POST["usu_usuario"];
            $password = $_POST["usu_password"];
            if(empty($usuario) and empty($password)){

                echo '
                    <script>
                        window.location = "http://localhost/Standar_Internet/index.php?m=2";
                    </script>
                
                ';
            }else{
                $sql="SELECT * FROM usuariosv1 WHERE usu_usuario=? and usu_password=? and usu_est=1";
                $sql=$conectar->prepare($sql);
                $sql->bindValue(1,$usuario);
                $sql->bindValue(2,$password);
                $sql->execute();

                $resultado=$sql->fetch();
                
                if(is_array($resultado)==true and count($resultado)>0){
                    $_SESSION["usu_id"]=$resultado["usu_id"];
                    $_SESSION["usu_nombre"]=$resultado["usu_nombre"];
                    $_SESSION["usu_cargo"]=$resultado["usu_cargo"];
                    $_SESSION["usu_usuario"]=$resultado["usu_usuario"];
                    echo '
                    <script>
                        window.location = "http://localhost/Standar_Internet/";
                    </script>
                
                ';
                    

                }else{

                    echo '
                    <script>
                        window.location = "http://localhost/Standar_Internet/index.php?m=1";
                    </script>
                
                ';
                }
            }
        
        }


    }

    public function get_usuario(){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM usuariosv1";
        $sql=$conectar->prepare($sql);
        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function delete_usuario($usu_id){
        $conectar=parent::conexion();
        parent::set_names();
        $sql="UPDATE usuariosv1 SET
            usu_est=0
            WHERE
            usu_id=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$usu_id);
        $sql->execute();
        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_usuario_x_id($usu_id){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM usuariosv1 WHERE usu_id=? AND usu_est=1";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$usu_id);
        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function insert_usuario($usu_nombre,$usu_cedula,$usu_cargo,$usu_usuario,$usu_password,$usu_nivel,$usu_fech_ingreso){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO usuariosv1 (usu_id, usu_nombre, usu_cedula, usu_cargo, usu_usuario, usu_password, usu_nivel, usu_fech_ingreso, usu_est) VALUES (NULL,?,?,?,?,?,?,?,1);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$usu_nombre);
        $sql->bindValue(2,$usu_cedula);
        $sql->bindValue(3,$usu_cargo);
        $sql->bindValue(4,$usu_usuario);
        $sql->bindValue(5,$usu_password);
        $sql->bindValue(6,$usu_nivel);
        $sql->bindValue(7,$usu_fech_ingreso);
        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);

    }


    public function update_usuario($usu_id,$usu_nombre,$usu_cedula,$usu_cargo,$usu_usuario,$usu_password,$usu_nivel,$usu_fech_ingreso){

        $conectar= parent::conexion();
        parent::set_names();
        $sql="UPDATE usuariosv1 SET
        usu_nombre=?,
        usu_cedula=?,
        usu_cargo=?,
        usu_usuario=?,
        usu_password=?,
        usu_nivel=?,
        usu_fech_ingreso=?

        WHERE
        usu_id=?
        ";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$usu_nombre);
        $sql->bindValue(2,$usu_cedula);
        $sql->bindValue(3,$usu_cargo);
        $sql->bindValue(4,$usu_usuario);
        $sql->bindValue(5,$usu_password);
        $sql->bindValue(6,$usu_nivel);
        $sql->bindValue(7,$usu_fech_ingreso);
        $sql->bindValue(8,$usu_id);
        $sql->execute();

        return $results=$sql->fetchAll(PDO::FETCH_ASSOC);

    }




}
