<?php
class Pagos extends Conectar
{
    /***************PAGOS**************** */

    public function getDetallePago($idCliente)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT
            c.cli_id,
            CONCAT(c.cli_nombre, ' ', c.cli_apellido) AS cliente_nombre,
            i.id_casas,
            cas.cas_descripcion AS nombre_casa,
            i.serv_id,
            s.serv_nom,
            i.import_servicio
        FROM
            new_instalacion AS i
        LEFT JOIN
            casas AS cas ON i.id_casas = cas.id_casas
        LEFT JOIN
            clientesv1 AS c ON cas.id_cliente = c.cli_id
        LEFT JOIN
            servicios AS s ON i.serv_id = s.serv_id
        WHERE
            c.cli_id = ? ";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $idCliente);
        $sql->execute();

        return $results = $sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getMesesDeudas($idCliente)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT mes_deuda, monto_deuda
                FROM deudas
                WHERE id_cliente = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $idCliente);
        $sql->execute();
    
        return $results = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>