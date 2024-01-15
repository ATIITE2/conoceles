<?php
session_start();
include_once("./componentes/conexion.php");
$usuario=$_SESSION['usuario'];

?>

<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Diputaciones - Conoceles</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />
    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <?php
            include_once("./componentes/menu.php");
            ?>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <?php
                include_once("./componentes/search.php");
                ?>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <?php 
                        if(isset($_REQUEST['editar'])){
                        ?>
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Candidatos /  Diputaciones Mayoria Relativa /</span>
                            Editar Candidato</h4>

                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-10">
                                <div class="col-md-12">
                                    <div class="card mb-4">
                                        <div class="card-header text-center">
                                            <big><big>Editar Candidato</big></big>
                                            <hr style="border-top:1px dotted" />
                                        </div>
                                        <div class="card-body">
                                            <form action="diputados_rp.php" method="POST">
                                                <div class="row">
                                                    <?php 
                                                    $id_user_edit=$_REQUEST['id_user_edit'];
                                                    //echo $id_user_edit;
                                                    $query="SELECT * FROM `c_cand_dip_rp` WHERE `id_user` = ".$id_user_edit."";
                                                    $resultados_3=mysqli_query($con, $query);
                                                    $filas_3=mysqli_fetch_array($resultados_3);
                                                    $nombre_edit = $filas_3['nombre'];
                                                    $app1_edit = $filas_3['a_pate'];
                                                    $app2_edit = $filas_3['a_mate'];
                                                    $curp = $filas_3['curp'];
                                                    $sexo = $filas_3['sexo'];
                                                    $sobrenombre = $filas_3['sobrenombre'];
                                                    $f_nacimiento = $filas_3['f_nacimiento'];
                                                    $l_nacimiento = $filas_3['l_nacimiento'];
                                                    $t_residencia = $filas_3['t_residencia'];
                                                    $t_residencia_e= explode('-', $t_residencia);
                                                    $pp = $filas_3['pp'];
                                                    $id_distrito = $filas_3['distrito'];

                                                    $query="SELECT * FROM `cat_pp` WHERE `id` = ".$pp."";
                                                    $resultados_6=mysqli_query($con, $query);
                                                    $filas_6=mysqli_fetch_array($resultados_6); 
                                                    $nombre_pp = $filas_6['nom_com'];
                                                    
                                                    $query="SELECT * FROM `cat_distritos_electorales` WHERE `id` = ".$id_distrito."";
                                                    $resultados_5=mysqli_query($con, $query);
                                                    $filas_5=mysqli_fetch_array($resultados_5); 
                                                    $numero_distrito = $filas_5['nombre'];
                                                    $cabecera_distrito = $filas_5['cabecera'];
                                                    
                                                    $query="SELECT * FROM `c_usuarios` WHERE `id_user` = ".$id_user_edit."";
                                                    $resultados_4=mysqli_query($con, $query);
                                                    $filas_4=mysqli_fetch_array($resultados_4); 
                                                    $user_name_edit = $filas_4['user_name'];
                                                    $password_edit = $filas_4['password'];

                                                    ?>
                                                    <div class="col-lg-4">
                                                        <label for="exampleFormControlInput1"
                                                            class="form-label">Nombres</label>
                                                        <input type="text" class="form-control" id="nombre_e"
                                                            name="nombre_e" placeholder="nombre"
                                                            value="<?php echo $nombre_edit; ?>" />
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label for="exampleFormControlInput1"
                                                            class="form-label">Apellido Paterno</label>
                                                        <input type="text" class="form-control" id="appp_e"
                                                            name="appp_e" placeholder="nombre"
                                                            value="<?php echo $app1_edit; ?>" />
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label for="exampleFormControlInput1"
                                                            class="form-label">Apellido Materno</label>
                                                        <input type="text" class="form-control" id="appm_e"
                                                            name="appm_e" placeholder="nombre"
                                                            value="<?php echo $app2_edit; ?>" />
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <label for="exampleFormControlInput1"
                                                            class="form-label">SOBRENOMBRE</label>
                                                        <input type="text" class="form-control" id="sobrenombre_e"
                                                            name="sobrenombre_e" value="<?php echo $sobrenombre; ?>" />
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label for="exampleFormControlInput1"
                                                            class="form-label">CURP</label>
                                                        <input type="text" class="form-control" id="curp_e" name="curp_e"
                                                            value="<?php echo $curp; ?>" />
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <label for="exampleFormControlSelect1"
                                                            class="form-label">Sexo</label>
                                                        <select id="sexo_e" name="sexo_e" class="form-select"
                                                            aria-label="Default select example">
                                                            <option value="<?php echo $sexo; ?>">
                                                                <?php 
                                                            if ($sexo=='1'){
                                                                echo "Femenino";
                                                            } else 
                                                            if($sexo=='2'){
                                                                echo "Masculino";
                                                            }
                                                            ?>
                                                            </option>
                                                            <?php 
                                                                $query="SELECT * FROM `cat_sexo` WHERE '1'";
                                                                $resultados_1=mysqli_query($con, $query);
                                                            while($filas_1=mysqli_fetch_array($resultados_1)){
                                                                echo '<option value="'.$filas_1['id'].'">'.$filas_1['nombre'].'</option>';   
                                                               
                                                            } ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Fecha
                                                            de Nacimiento</label>
                                                        <div class="col-md-12">
                                                            <input type="date" class="form-control" id="f_nac_e"
                                                                name="f_nac_e" value="<?php echo $f_nacimiento;?>" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label for="exampleFormControlInput1" class="form-label">Lugar
                                                            de Nacimiento</label>
                                                        <input type="text" class="form-control" id="l_nac_e" name="l_nac_e"
                                                            value="<?php echo $l_nacimiento;?>" />
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <label for="exampleFormControlInput1"
                                                            class="pt-2 form-label">Tiempo
                                                            de Residencia</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="t_anios_e"
                                                                name="t_anios_e"
                                                                value="<?php echo $t_residencia_e[0]; ?>" />
                                                            <span class="input-group-text">Años</span>
                                                            <input type="text" class="form-control" id="t_meses_e"
                                                                name="t_meses_e"
                                                                value="<?php echo $t_residencia_e[1]; ?>" />
                                                            <span class="input-group-text">Meses</span>
                                                        </div>
                                                    </div>
                                                    </br></br></br></br>
                                                    <hr style="border-top:1px dotted" />
                                                    <div class="col-lg-4">
                                                        <label for="exampleFormControlInput1" class="form-label">
                                                            Estado
                                                        </label>
                                                        <input type="text" class="form-control" id="estado_e"
                                                            name="estado_e" value="Tlaxcala" />
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label for="exampleFormControlSelect1"
                                                            class="form-label">Distrito</label>
                                                        <select id="distrito_e" name="distrito_e"
                                                            class="form-select" aria-label="Default select example">
                                                            <option value="<?php echo $id_distrito;?>">
                                                                <?php echo $numero_distrito;?>&nbsp;&nbsp;(<?php echo $cabecera_distrito;?>)</option>
                                                            <?php 
                                                                $query="SELECT * FROM `cat_distritos_electorales` WHERE `status` = '1'";
                                                                $resultados_1=mysqli_query($con, $query);
                                                            while($filas_1=mysqli_fetch_array($resultados_1)){
                                                                echo '<option value="'.$filas_1['id'].'">'.$filas_1['nombre']."&nbsp;&nbsp;(".$filas_1['cabecera'].")".'</option>';   
                                                               
                                                            } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label for="exampleFormControlSelect1"
                                                            class="form-label">Partido Politico</label>
                                                        <select id="pp_e" name="pp_e" class="form-select"
                                                            aria-label="Default select example">
                                                            <option value="<?php echo $pp;?>"><?php echo $nombre_pp;?>
                                                            </option>
                                                            <?php 
                                                                $query="SELECT * FROM `cat_pp` WHERE 1";
                                                                $resultados_1=mysqli_query($con, $query);
                                                            while($filas_1=mysqli_fetch_array($resultados_1)){
                                                                echo '<option value="'.$filas_1['id'].'">'.$filas_1['nom_com'].'</option>';   
                                                               
                                                            } ?>
                                                        </select>
                                                    </div>
                                                    </br></br></br></br>
                                                    <hr style="border-top:1px dotted" />
                                                    <div class="col-lg-6">
                                                        <label for="exampleFormControlInput1"
                                                            class="form-label">Usuario</label>
                                                        <input type="text" class="form-control" id="user_name_e"
                                                            name="user_name_e" placeholder="nombre"
                                                            value="<?php echo $user_name_edit; ?>" />
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-lg-10"></div>
                                                    <div class="col-lg-2">
                                                        <input type="hidden" name="id_user_e"
                                                            value="<?php echo $id_user_edit;?>">
                                                        <input type="hidden" name="actualizar" value="1">
                                                        <button class="btn btn-outline-primary right d-grid w-100"
                                                            type="submit">Actualizar</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="card-footer">
                                            <hr style="border-top:1px dotted" />
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <a href="diputados_rp.php" class="menu-link">
                                                        <button class="btn btn-outline-danger right d-grid w-100">
                                                            Volver</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        <div class="content-backdrop fade"></div>
                    </div>
                    <?php
                    } else {
                    $query="SELECT * FROM `c_usuarios` WHERE  `user_name` = '$usuario'";
                    $resultados=mysqli_query($con, $query);
                    $filas=mysqli_fetch_array($resultados);
                    $id_user = $filas["id_user"];
                    $rol = $filas["id_rol"];
                    
                    $query="SELECT * FROM `cat_roles` WHERE  `id` = '$rol'";
                    $resultados=mysqli_query($con, $query);
                    $nomb_rol=mysqli_fetch_array($resultados);
                    $nombre_rol = $nomb_rol["nombre"];
                    //echo $rol;
                    if($rol == 1 || $rol == 2 ){
                        $tabla = "c_administradores";
                    } elseif ($rol == 3){
                        $tabla = "c_candidatos";
                    } elseif ($rol == 4){
                        $tabla = "c_verificadores";
                    }
                    //echo $tabla;
                    $query="SELECT * FROM ".$tabla." WHERE `id_user` = '$id_user'";
                    $resultados=mysqli_query($con, $query);
                    $filas=mysqli_fetch_array($resultados);

                    $name = $filas["nombre"];
                    $app1 = $filas["a_pate"];
                    $app2 = $filas["a_mate"];
                ?>
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Candidatos / Diputaciones
                        Representación Proporcional /</span> Nuevo candidato</h4>
                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-10">
                                <div class="col-md-12">
                                    <div class="card mb-4">
                                        <div class="card-header text-center">
                                            <big><big>Agregar Nuevo Candidato</big></big>
                                            <hr style="border-top:1px dotted" />
                                        </div>
                                        <div class="card-body">
                                            <form action="diputados_rp.php" method="POST">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <label for="exampleFormControlInput1"
                                                            class="form-label">Nombres</label>
                                                        <input type="text" class="form-control" id="nombre"
                                                            name="nombre" />
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label for="exampleFormControlInput1"
                                                            class="form-label">Apellido
                                                            Paterno</label>
                                                        <input type="text" class="form-control" id="appp" name="appp" />
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label for="exampleFormControlInput1"
                                                            class="form-label">Apellido
                                                            Materno</label>
                                                        <input type="text" class="form-control" id="appm" name="appm"
                                                            placeholder="" />
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label for="exampleFormControlInput1"
                                                            class="form-label">SOBRENOMBRE</label>
                                                        <input type="text" class="form-control" id="sobrenombre"
                                                            name="sobrenombre" />
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label for="exampleFormControlInput1"
                                                            class="form-label">CURP</label>
                                                        <input type="text" class="form-control" id="curp" name="curp" />
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <label for="exampleFormControlSelect1"
                                                            class="form-label">Sexo</label>
                                                        <select id="sexo" name="sexo" class="form-select"
                                                            aria-label="Default select example">
                                                            <?php 
                                                                $query="SELECT * FROM `cat_sexo` WHERE '1'";
                                                                $resultados_1=mysqli_query($con, $query);
                                                            while($filas_1=mysqli_fetch_array($resultados_1)){
                                                                echo '<option value="'.$filas_1['id'].'">'.$filas_1['nombre'].'</option>';   
                                                               
                                                            } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Fecha
                                                            de Nacimiento</label>
                                                        <div class="col-md-12">
                                                            <input type="date" class="form-control" id="f_nac"
                                                                name="f_nac" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label for="exampleFormControlInput1" class="form-label">Lugar
                                                            de Nacimiento</label>
                                                        <input type="text" class="form-control" id="l_nac" name="l_nac"
                                                            placeholder="Tlaxcala, Tlax" />
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <label for="exampleFormControlInput1"
                                                            class="pt-2 form-label">Tiempo
                                                            de Residencia</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="t_anios"
                                                                name="t_anios" />
                                                            <span class="input-group-text">Años</span>
                                                            <input type="text" class="form-control" id="t_meses"
                                                                name="t_meses" />
                                                            <span class="input-group-text">Meses</span>
                                                        </div>
                                                    </div>
                                                    </br></br></br></br>
                                                    <hr style="border-top:1px dotted" />
                                                    <div class="col-lg-4">
                                                        <label for="exampleFormControlInput1" class="form-label">
                                                            Estado
                                                        </label>
                                                        <input type="text" class="form-control" id="estado"
                                                            name="estado" placeholder="Tlaxcala" />
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label for="exampleFormControlSelect1"
                                                            class="form-label">Distrito</label>
                                                        <select id="distrito" name="distrito" class="form-select"
                                                            aria-label="Default select example">
                                                            <option value="0">Seleccione una opcion</option>
                                                            <?php 
                                                                $query="SELECT * FROM `cat_distritos_electorales` WHERE `status` = '1'";
                                                                $resultados_1=mysqli_query($con, $query);
                                                            while($filas_1=mysqli_fetch_array($resultados_1)){
                                                                echo '<option value="'.$filas_1['id'].'">'.$filas_1['nombre']."&nbsp;&nbsp;(".$filas_1['cabecera'].")".'</option>';   
                                                               
                                                            } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label for="exampleFormControlSelect1"
                                                            class="form-label">Partido Politico</label>
                                                        <select id="pp" name="pp" class="form-select"
                                                            aria-label="Default select example">
                                                            <option value="0">Seleccione una opcion</option>
                                                            <?php 
                                                                $query="SELECT * FROM `cat_pp` WHERE 1";
                                                                $resultados_1=mysqli_query($con, $query);
                                                            while($filas_1=mysqli_fetch_array($resultados_1)){
                                                                echo '<option value="'.$filas_1['id'].'">'.$filas_1['nom_com'].'</option>';   
                                                               
                                                            } ?>
                                                        </select>
                                                    </div>
                                                    </br></br></br></br>
                                                    <hr style="border-top:1px dotted" />
                                                    <div class="col-lg-6">
                                                        <label for="exampleFormControlInput1"
                                                            class="form-label">Usuario</label>
                                                        <input type="text" class="form-control" id="user_name_n"
                                                            name="user_name_n" placeholder="nombre" />
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label for="exampleFormControlInput1"
                                                            class="form-label">Contraseña</label>
                                                        <center>
                                                            <div class="input-group">
                                                                <input readonly type="text" class="form-control"
                                                                    id="password_new" name="password_new"
                                                                    placeholder="Aun no has generado una contraseña" />

                                                                <button type="button" class="btn btn-primary"
                                                                    onClick="myFunction2()" />Copiar</button>
                                                            </div>
                                                            <br />
                                                            <button type="button" class="btn btn-primary"
                                                                onClick="getPassword()" />Crear contraseña
                                                            </button>
                                                        </center>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-lg-10"></div>
                                                    <div class="col-lg-2">
                                                        <input type="hidden" name="guardar" value="1">
                                                        <button class="btn btn-outline-primary right d-grid w-100"
                                                            type="submit">Crear</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="card-footer">
                                            <hr style="border-top:1px dotted" />
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <a href="diputados_rp.php" class="menu-link">
                                                        <button class="btn btn-outline-danger right d-grid w-100">
                                                            Volver</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div div class="col-md-2"></div>
                        </div>
                        <div class="content-backdrop fade"></div>
                    </div>
                    <?php
                        }
                        ?>
                </div>
                <?php
                        include_once("./componentes/footer.php");
                        ?>
            </div>
            <div class="layout-overlay layout-menu-toggle"></div>
        </div>
    </div>
</body>


<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="./componentes/password_copy.js"></script>
<script src="./componentes/password_gen.js"></script>
<script src="../assets/vendor/libs/jquery/jquery.js"></script>
<script src="../assets/vendor/libs/popper/popper.js"></script>
<script src="../assets/vendor/js/bootstrap.js"></script>
<script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="../assets/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

<!-- Main JS -->
<script src="../assets/js/main.js"></script>

<!-- Page JS -->
<script src="../assets/js/dashboards-analytics.js"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

</html>