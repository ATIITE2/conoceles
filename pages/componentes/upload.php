<?php
session_start();
include_once("./conexion.php");
$id_user = $_SESSION['id_user'];

// Configuración FTP
$ftp_server = "localhost";
$ftp_username = "conoceles_admin";
$ftp_password = "abcd1234";

// Conexión FTP
$ftp_conn = ftp_connect($ftp_server) or die("Error al conectar al servidor FTP");

// Iniciar sesión FTP
$login = ftp_login($ftp_conn, $ftp_username, $ftp_password);

// Verificar si se ha subido un archivo
if(isset($_FILES['file'])){
    $file = $_FILES['file'];
    $tamano_bytes = $_FILES['file']["size"];

    // Obtener el nombre del archivo desde la base de datos MySQL
    $mysqli = new mysqli("localhost", "lefranktlx", "HolaHola", "conoceles_db");
    $result = $mysqli->query("SELECT * FROM `c_usuarios` WHERE id_user = ".$id_user.""); // Cambia "1" por el ID correspondiente
    
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $filename = ($row['user_name']."_foto.png");
    } else {
        $filename = "archivo_subido";
    }

    // Subir el archivo al servidor FTP
    $remote_file = '/assets/img/perfiles/'.$filename;
    $local_file = $file['tmp_name'];
    if($tamano_bytes<700000){
        if(ftp_put($ftp_conn, $remote_file, $local_file, FTP_BINARY)){
            echo "Archivo subido correctamente.";

            $query="UPDATE `cuest_curricular_foto` SET `nombre_foto` = '".$filename."',`ruta` = '".$remote_file."',
            `status` = '3',`fecha` = 'NOW()' WHERE `id_user_cand` = ".$id_user.";";
            mysqli_query($con, $query);


        } else {
            echo "Error al subir el archivo.";
        }
    }
    else {
        echo "El archivo es demaciado pesado.";
}
} else {
    echo "No se ha seleccionado ningún archivo.";
}

// Cerrar conexión FTP
ftp_close($ftp_conn);
?>