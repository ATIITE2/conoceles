<?php 
$ruta= (isset($c_on)) ? "../../" : "../";

include($ruta."connect.php");

$_env=getConexion();

$con=mysqli_connect($_env["DB_HOST"],$_env["DB_USR"],$_env["DB_PASS"],$_env["DB_NAME"]);

// Ajustar los carácteres a utf8
mysqli_set_charset($con,"utf8");

$query="SELECT *  FROM c_usuarios";
$resultados=mysqli_query($con, $query);
$fila=mysqli_fetch_row($resultados);
//echo $fila[1];


?>