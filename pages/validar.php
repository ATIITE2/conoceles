<?php 
session_start();
$usuario=$_REQUEST['usuario'];
$contraseña=$_REQUEST['contraseña'];
$contraseña_cifrada=hash("crc32",$contraseña); 


include("./componentes/conexion.php");

$query="SELECT * FROM `c_usuarios` WHERE `user_name` = '$usuario'";
$resultados=mysqli_query($con, $query);   
$filas=mysqli_fetch_array($resultados);
$id_user=$filas['id_user'];
//echo "selecciono al usuario";
if($filas){
    $query="SELECT * FROM `c_usuarios` WHERE `id_user` = '$id_user' && `password` = '$contraseña_cifrada' ";
    $resultados2=mysqli_query($con, $query);   
    $filas2=mysqli_fetch_array($resultados2);
    //echo "compara la contraseña";
    if($filas2){
        $query="SELECT * FROM `c_usuarios` WHERE `id_user` = '$id_user'";
        $resultados3=mysqli_query($con, $query);   
        $filas3=mysqli_fetch_array($resultados3);
        if($filas3['status']=='1'){
            $id_user = $filas3['id_user'];
            $id_rol = $filas3['id_rol'];
            $_SESSION['usuario']= htmlentities($usuario);
            $_SESSION['id_user'] = $id_user;
            $_SESSION['id_rol'] = $id_rol;
            //echo $_SESSION['usuario'];
            header("location:index.php");
            //echo "compara el status";
        } else if($filas3['status']=='2'){
            header("location:login.php?e=3");
        } else if($filas3['status']=='3'){
            header("location:login.php?e=4");
        }
        
    }else{
        header("location:login.php?e=2");}
}else{
    header("location:login.php?e=1");}
mysqli_free_result($resultados);
mysqli_close($con);

?>