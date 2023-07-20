<?php  

class DispoHistory extends Conectar{

 
    /***************CRUD DE Decos**************** */

    public function getDispoById($column, $id) {
        $conectar = parent::conexion();
        parent::set_names();
         
        $columnMapping = array(
            'id_deco' => 'id_deco',
            'id_route' => 'id_route',
            'id_modem' => 'id_modem'
        ); 
        
        $selectedColumn = isset($columnMapping[$column]) ? $columnMapping[$column] : '';
        
        if (!empty($selectedColumn)) {
            $sql = "SELECT dispo_historial.*,
            CONCAT(clientesv1.cli_nombre,' ', clientesv1.cli_apellido) AS cliente,
            clientesv1.cli_id
            FROM dispo_historial 
            INNER JOIN clientesv1 
            ON dispo_historial.id_cliente = clientesv1.cli_id 
            WHERE $selectedColumn = ?;";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->execute();
        
            return $results = $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return array(); // Devuelve un array vacío si el índice no está definido correctamente
        }
    }
    public function insertHistoryDeco($id_deco, $id_cliente) {
        $conectar = parent::conexion();
        parent::set_names();
    
        $sql = "INSERT INTO deco_historial (id_historial, id_deco, id_cliente, fech_asignacion, fech_desasignacion) 
        VALUES (NULL, ?, ?, now(), NULL)";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_deco);
        $sql->bindValue(2, $id_cliente);
    
        if ($sql->execute()) {
            // Inserción exitosa
            return true;
        } else {
            // Error al insertar
            return false;
        }
    }

}



?>