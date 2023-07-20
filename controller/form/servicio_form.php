<?php

if(isset($_POST["serv_id"])){
    $servicio = $_POST["serv_id"];
    switch($servicio){
    case 1:

        

            echo '

            <div class="col-md-3">
                <div class="form-group">
                    <label>tipo_conexion</label>
                    <input type="text" id="tipo_conexion" name="tipo_conexion" class="form-control" placeholder="">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>velocidad_MB</label>
                    <input type="text" id="velocidad_MB" name="velocidad_MB" class="form-control" placeholder="">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>lugar_conexion</label>
                    <input type="text" id="lugar_conexion" name="lugar_conexion" class="form-control" placeholder="lugar de conexion">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>inst_fech</label>
                    <input type="date" id="inst_fech" name="inst_fech" class="form-control" placeholder="" value="'. date('Y-m-d') .'">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>inst_precio</label>
                    <input type="number" id="inst_precio" name="inst_precio" class="form-control" placeholder="Precio S/">
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                    <label>Modem</label>
                    <a type="button" onclick="ModemMantenimeinto();"  class="btn btn-success float-right form-control" data-toggle="modal" > Modem </a>
                </div>
            </div> 
            <div class="col-md-3">
                <div class="form-group">
                    <label>Router</label>
                    <a type="button" onclick="RouterMantenimeinto();"  class="btn btn-success float-right form-control" data-toggle="modal" > Router </a>
                </div>
            </div> 
            
            <div class="col-md-3">
                <div class="form-group">
                    <label>inst_observacion</label>
                    <input type="text" id="inst_observacion" name="inst_observacion" class="form-control" placeholder="Observacion de Instalacion">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>cantidad_metros_cable</label>
                    <input type="number" id="cantidad_metros_cable" name="cantidad_metros_cable" class="form-control" placeholder="Cantidad de Cable por metros">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>import_servicio</label>
                    <input type="number" id="import_servicio" name="import_servicio" class="form-control" placeholder="Importe" step="0.01">
                </div>
            </div>

            ';
        
    break;
    
    case 2:
        echo '
        <div class="col-md-3">
            <div class="form-group">
            <label>lugar_conexion</label>
            <input type="text" id="lugar_conexion"  name="lugar_conexion" class="form-control" placeholder="lugar de conexion">
            </div>
            
        </div>
        <div class="col-md-3">
            <div class="form-group">
            <label>inst_precio</label>
            <input type="number" id="inst_precio"  name="inst_precio" class="form-control" placeholder="Precio S/">
            </div>
            
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>inst_fech</label>
                <input type="date" id="inst_fech" name="inst_fech" class="form-control" placeholder="" value="'. date('Y-m-d') .'">
            </div>
        </div> 
        <div class="col-md-3">
            <div class="form-group">
                <label>Decodificador</label>
                <a type="button" onclick="DecoMantenimeinto();"  class="btn btn-success float-right form-control" data-toggle="modal" data-target="#compromiso" > Deco</a>
            </div>
        </div> 
        <div class="col-md-3">
            <div class="form-group">
            <label>cantidad_metros_cable</label>
            <input type="number" id="cantidad_metros_cable"  name="cantidad_metros_cable" class="form-control" placeholder="Cantidad de Cablepor por metros">
            </div>
            
        </div>
        <div class="col-md-3">
            <div class="form-group">
            <label>import_servicio</label>
            <input type="number" id="import_servicio"  name="import_servicio" class="form-control" placeholder="" step="0.01">
            </div>
            
        </div>';
    break;

    case 3:
            echo '<div class="col-md-3">
            <div class="form-group">
            <label>inst_observacion</label>
            <input type="text" id="inst_observacion"  name="inst_observacion" class="form-control" placeholder="Observacion de Instalacion">
            </div>
            
        </div>
        <div class="col-md-3">
            <div class="form-group">
            <label>cantidad_metros_cable</label>
            <input type="number" id="cantidad_metros_cable"  name="cantidad_metros_cable" class="form-control" placeholder="Cantidad de Cablepor por metros">
            </div>
            
        </div>
        <div class="col-md-3">
            <div class="form-group">
            <label>import_servicio</label>
            <input type="number" id="import_servicio"  name="import_servicio" class="form-control" placeholder="" step="0.01">
            </div>
            
        </div>';
    break;

    case 4:
            echo ' <div class="col-md-3">
            <div class="form-group">
            <label>cuenta_usuario</label>
            <input type="text" id="cuenta_usuario"  name="cuenta_usuario" class="form-control" ">
            </div>
            
        </div>
        <div class="col-md-3">
            <div class="form-group">
            <label>contra_usuario</label>
            <input type="text" id="contra_usuario"  name="contra_usuario" class="form-control" placeholder="">
            </div>
            
        </div>
        <div class="col-md-3">
            <div class="form-group">
            <label>perfil_usuario</label>
            <input type="text" id="perfil_usuario"  name="perfil_usuario" class="form-control" placeholder="">
            </div>
            
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>inst_fech</label>
                <input type="date" id="inst_fech" name="inst_fech" class="form-control" placeholder="" value="'. date('Y-m-d') .'">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
            <label>import_servicio</label>
            <input type="number" id="import_servicio"  name="import_servicio" class="form-control" placeholder="" step="0.01">
            </div>
            
        </div>';

    break;

    default:
        echo 'Aun no se genera los campos indicados para este Servicio..';
    }
}
