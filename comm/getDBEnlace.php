<?php

include(RUTA_SCRIPTS. "connect.php");

$_env=getConexion();

function dbConexion($q) {
    // Credenciales Base de datos
    global $_env;
    $conn = new mysqli($_env["DB_HOST"], $_env["DB_USR"], $_env["DB_PASS"], $_env["DB_NAME"]);
    if ($conn->connect_error) {
        die("Fallo la conexión con la BD: " . $conn->connect_error);
    }

    // Consulta previa para ajustar los nobres de fechas de dias y meses en español
    $conn->set_charset("utf8");
    $conn->query("SET lc_time_names = 'es_MX'");

    $result = $conn->query($q);

    $data = array();
    if ($result->num_rows > 0) {
        foreach ($result as $row) {
            $data[] = $row;
        }
    }

    $conn->close();

    return $data;
}

function dbConexionSave($q,$tipos,$valores) {
    // Credenciales Base de datos
    global $_env;
    $resp= "";
    $conn = new mysqli($_env["DB_HOST"], $_env["DB_USR"], $_env["DB_PASS"], $_env["DB_NAME"]);

    // Consulta previa para ajustar los nobres de fechas de dias y meses en español
    $conn->set_charset("utf8");
    $conn->query("SET lc_time_names = 'es_MX'");
    
    if ($conn->connect_error) {
        die("Fallo la conexión con la BD: " . $conn->connect_error);
    }

    // prepare and bind
    $stmt=$conn->prepare($q);

    if(is_array($valores)){
        $stmt->bind_param($tipos, $valores[0],$valores[1],$valores[2],$valores[3],$valores[4],$valores[5],$valores[6]);
    }
    else {
        $stmt->bind_param($tipos, $valores);
    }

    if($stmt->execute()) $resp=isset($stmt->insert_id) ? intval($stmt->insert_id) : 0;
    else $resp="Error de registro: " . $q . "<br>" . $stmt->error;

    $stmt->close();
    $conn->close();

    return $resp;
}

?>