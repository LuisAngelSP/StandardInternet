<?php

class DetalleServ extends Conectar
{


    public function get_servicio_cliente($id_cliente)
    {

        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT new_instalacion.*,
            IFNULL(servicios.serv_nom, 'sin-servicio') AS servicio,
           modems.mod_descripcion AS Modems,
           routes.rout_descripcion AS Routers,
           decos.dec_descripcion AS Decos,
           casas.cas_descripcion as casa
           FROM new_instalacion
           LEFT JOIN servicios ON new_instalacion.serv_id = servicios.serv_id
           LEFT JOIN casas ON new_instalacion.id_casas = casas.id_casas
           LEFT JOIN clientesv1 ON new_instalacion.cli_id = clientesv1.cli_id
           LEFT JOIN modems ON new_instalacion.mod_id = modems.id_modem
           LEFT JOIN routes ON new_instalacion.rout_id = routes.id_route
           LEFT JOIN decos ON new_instalacion.deco_id = decos.id_deco
              WHERE clientesv1.cli_id = ?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_cliente);
        $sql->execute();

        return $results = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_servicio_cliente_x_casa($id_cliente, $casa)
    {

        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT 
            new_instalacion.*,
            IF(servicios.serv_nom <> '', servicios.serv_nom, 'sin-servicio') AS servicio, 
            casas.cas_descripcion AS casa,
            modems.mod_descripcion AS Modems,
            routes.rout_descripcion AS Routers,
            decos.dec_descripcion AS Decos
        FROM new_instalacion
        LEFT JOIN servicios ON new_instalacion.serv_id = servicios.serv_id
        LEFT JOIN casas ON new_instalacion.id_casas = casas.id_casas
        LEFT JOIN clientesv1 ON new_instalacion.cli_id = clientesv1.cli_id
                    LEFT JOIN modems ON new_instalacion.mod_id = modems.id_modem
            LEFT JOIN routes ON new_instalacion.rout_id = routes.id_route
            LEFT JOIN decos ON new_instalacion.deco_id = decos.id_deco
        WHERE clientesv1.cli_id = ? AND casas.cas_descripcion = ?;
        ";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_cliente);
        $sql->bindValue(2, $casa);
        $sql->execute();

        return $results = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
