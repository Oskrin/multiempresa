<?php

session_start();
include 'base.php';
conectarse();

$consulta = pg_query("select * from categoria and id_empresa = '$_SESSION[id_empresa]'");
echo "<select id=nombre_categoria>";
while ($row = pg_fetch_row($consulta)) {
    echo "<option value='$row[0]'>$row[1]</option>";
}
echo "</select>";
?>



