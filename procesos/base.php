<?php
function conectarse() {
    if (!($conexion = pg_connect("dbname=mantenimiento port=5432 user=postgres password=root host=localhost"))) {			
        
        exit();
    } else {         
    }
    return $conexion;
}
conectarse();
?>
