<?php 
$db_host="localhost";
$db_nombre="conoceles_db";
$db_usuario="lefranktlx";
$db_pass="HolaHola";

$con=mysqli_connect($db_host,$db_usuario,$db_pass,$db_nombre);

// Ajustar los carácteres a utf8
mysqli_set_charset($con,"utf8");

$query="SELECT *  FROM c_usuarios";
$resultados=mysqli_query($con, $query);
$fila=mysqli_fetch_row($resultados);
//echo $fila[1];


?>