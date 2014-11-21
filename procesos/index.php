<?php

include 'base.php';
conectarse();
$data = "";
$cont = 0;
session_start();
$consulta = pg_query("select * from usuario where usuario='$_POST[usuario]' and clave='$_POST[clave]'");
while ($row = pg_fetch_row($consulta)) {
    $cont = 1;
    $_SESSION['id'] = $row[0];
    $_SESSION['nombres'] = $row[1] . " " . $row[2];
    $_SESSION['cargo'] = $row[6];
    $_SESSION['user'] = $row[10];
    $_SESSION['id_empresa'] = $_POST['id_empresa'];
}

if ($cont == 1) {
//$data=1;
    if ($_SESSION['cargo'] == 1) {
        $data = 1;
    } else {
        $data = 2;
    }
} else {
    $data = 0;
}
echo $data;
?>
