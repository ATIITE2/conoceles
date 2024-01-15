<?php
session_start();
include_once("./componentes/conexion.php");
include_once("./componentes/edad.php");
$usuario_ses=$_SESSION['usuario'];
if(!isset($_SESSION['usuario'])){
  header("location:login.php");
}else{
?>

<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Edicion de cuenta - Conoceles</title>

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
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Cuenta de Usuario /</span>
                            Edicion de cuenta</h4>

                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-10">
                                <?php 
                                $query="SELECT * FROM `c_usuarios` WHERE  `user_name` = '$usuario'";
                                $resultados=mysqli_query($con, $query);
                                $filas=mysqli_fetch_array($resultados);
                                
                                $id_user = $filas["id_user"];
                                $rol = $filas["id_rol"];
                                //echo $rol;
                                if($rol == 1){
                                  $query="SELECT * FROM `c_administradores` WHERE `id_user` = '$id_user'";
                                  $resultados=mysqli_query($con, $query);
                                  $filas=mysqli_fetch_array($resultados);
                                  $name = $filas["nombre"];
                                  $app1 = $filas["a_pate"];
                                  $app2 = $filas["a_mate"];
                                  $id_area = $filas["id_area"];

                                  $query="SELECT * FROM `cat_areas_ite` WHERE `id` = '$id_area'";
                                  $resultado=mysqli_query($con, $query);
                                  $fila=mysqli_fetch_array($resultado);
                                  $lugar_de_trabajo = $fila["nom_com"];
                                  $lugar_de_trabajo_c = $fila["nom_cor"];
                                  //echo $query;
                                ?>
                                <div class="card mb-4">
                                    <h5 class="card-header">Detalles del perfil</h5>
                                    <!-- Account -->
                                    <hr class="my-0" />
                                    <div class="card-body">
                                        <form id="formAccountSettings" method="POST" onsubmit="return false">
                                            <div class="row">
                                                <div class="mb-3 col-md-12">
                                                    <label for="state" class="form-label">AREA</label>
                                                    <input class="form-control" type="text" id="state" name="state"
                                                        disabled
                                                        value="(<?php echo $lugar_de_trabajo_c?>)&nbsp;<?php echo $lugar_de_trabajo?>" />
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-12">
                                                <hr style="border-top:1px dotted #ccc;" />
                                            </div>
                                        </div>
                                        <a href="index.php" class="menu-link"><button
                                                class="btn btn-outline-danger right d-grid w-30">
                                                Volver</button></a>
                                    </div>
                                    <!-- /Account -->
                                </div>
                                <?php } 
                                    if($rol == 2 || $rol == 4){
                                        if($rol == 2 ){
                                        $tabla = "c_administradores";
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
                                    $id_area = $filas["id_area"];
                                    $id_puesto = $filas["id_puesto"];

                                    $query="SELECT * FROM `cat_puestos_ite` WHERE `id` = '$id_puesto'";
                                    $resultados2=mysqli_query($con, $query);
                                    $filas2=mysqli_fetch_array($resultados2);
                                    $nom_puesto = $filas2["nombre"];

                                    $query="SELECT * FROM `cat_areas_ite` WHERE `id` = '$id_area'";
                                    $resultados3=mysqli_query($con, $query);
                                    $filas3=mysqli_fetch_array($resultados3);
                                    $nom_com_area = $filas3["nom_com"];
                                    $nom_cor_area = $filas3["nom_cor"];
                                ?>
                                <div class="card mb-4">
                                    <h5 class="card-header">Detalles del perfil</h5>
                                    <div class="card-body">
                                        <form id="formAccountSettings" method="POST" onsubmit="return false">
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="firstName" class="form-label">Nombre</label>
                                                    <input class="form-control" type="text" id="firstName" disabled
                                                        name="firstName" value="<?php echo $name?>" autofocus />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="lastName" class="form-label">Apellidos</label>
                                                    <input class="form-control" type="text" name="lastName" 
                                                        id="lastName" disabled
                                                        value="<?php echo $app1?>&nbsp;<?php echo $app2?>" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="state" class="form-label">Area de adscripcion</label>
                                                    <input class="form-control" type="text" id="state" name="state" disabled
                                                        value="(<?php echo $nom_cor_area?>)&nbsp;<?php echo $nom_com_area?>" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="state" class="form-label">Puesto</label>
                                                    <input class="form-control" type="text" id="state" name="state" disabled
                                                        value="<?php echo $nom_puesto?>" />
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-12">
                                                <hr style="border-top:1px dotted #ccc;" />
                                            </div>
                                        </div>
                                        <a href="index.php" class="menu-link"><button
                                                class="btn btn-outline-danger right d-grid w-30">
                                                Volver</button></a>
                                    </div>
                                    <!-- /Account -->
                                </div>
                                <?php } elseif($rol == 3){
                                    $query="SELECT * FROM `c_candidatos` WHERE `id_user` = '$id_user'";
                                    $resultados_tc=mysqli_query($con, $query);
                                    $res_tipo_cand=mysqli_fetch_array($resultados_tc);
                                    $tipo_cand = $res_tipo_cand['id_tipo_cand'];

                                    $query="SELECT * FROM `cat_tipo_cand` WHERE  `id` = '$tipo_cand'";
                                    $resultados_ntc=mysqli_query($con, $query);
                                    $nom_tipo_cand=mysqli_fetch_array($resultados_ntc);
                                    $nombre_tipo_cand = $nom_tipo_cand["nombre"];

                                    if($tipo_cand == 1){
                                        $tabla = "c_cand_gob";
                                    } elseif($tipo_cand == 2){
                                        $tabla = "c_cand_ayun";
                                    }elseif($tipo_cand == 3){
                                        $tabla = "c_cand_com";
                                    }elseif($tipo_cand == 4){
                                        $tabla = "c_cand_dip_mr";
                                    }elseif($tipo_cand == 5){
                                        $tabla = "c_cand_dip_rp";
                                    }
                                    $query="SELECT * FROM ".$tabla." WHERE `id_user` = '$id_user'";
                                    $resultados=mysqli_query($con, $query);
                                    $filas=mysqli_fetch_array($resultados);
                                    $name = $filas["nombre"];
                                    $sobrenombre = $filas["sobrenombre"];
                                    $app1 = $filas["a_pate"];
                                    $app2 = $filas["a_mate"];
                                    $curp = $filas["curp"];
                                    $edad = $filas["f_nacimiento"];
                                    $edad_formato = obtener_edad_segun_fecha($edad);
                                    $id_part = $filas["pp"]; 
                                    ?>
                                <div class="card mb-4">
                                    <h5 class="card-header">Detalles del perfil</h5>
                                    <!-- Account -->
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-12">
                                                <hr style="border-top:1px dotted #ccc;" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">

                                        <form id="formAccountSettings" method="POST" onsubmit="return false">
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="firstName" class="form-label">Nombre</label>
                                                    <input class="form-control" disabled type="text" id="firstName"
                                                        name="firstName" value="<?php echo $name?>" autofocus />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="lastName" class="form-label">Apellidos</label>
                                                    <input class="form-control" disabled type="text" name="lastName"
                                                        id="lastName"
                                                        value="<?php echo $app1?>&nbsp;<?php echo $app2?>" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="firstName" class="form-label">Sobrenombre</label>
                                                    <input class="form-control" disabled type="text" id="firstName"
                                                        name="firstName" value="<?php echo $sobrenombre?>" autofocus />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="firstName" class="form-label">Curp</label>
                                                    <input class="form-control" disabled type="text" id="firstName"
                                                        name="firstName" value="<?php echo $curp?>" autofocus />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="lastName" class="form-label">Edad</label>
                                                    <input class="form-control" disabled type="text" name="lastName"
                                                        id="lastName" value="<?php echo $edad_formato;?> " />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="email" class="form-label">Tipo de Elección</label>
                                                    <input class="form-control" disabled type="text"
                                                        value="<?php echo $nombre_tipo_cand?>" />
                                                </div>
                                                <?php 
                                                if ($id_part != 0){
                                                    $nombre_tabla = "cat_pp";
                                                    $id_busqueda = $id_part;
                                                    $tipo_nombre = "PARTIDO POLITICO";
                                                }
                                                
                                                $query="SELECT * FROM ".$nombre_tabla." WHERE `id` = ".$id_busqueda."";
                                                $resultados5=mysqli_query($con, $query);
                                                $filas5=mysqli_fetch_array($resultados5);
                                                //echo $query;
                                                $nombre_tipo_postulacion_cor = $filas5["nom_cor"];
                                                $nombre_tipo_postulacion_com = $filas5["nom_com"];
                                                // echo $query;
                                                ?>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label"
                                                        for="phoneNumber"><?php echo $tipo_nombre;?></label>
                                                    <div class="input-group input-group-merge">
                                                        <input type="text" disabled id="phoneNumber" name="phoneNumber"
                                                            class="form-control" placeholder="202 555 0111"
                                                            value="(<?php echo $nombre_tipo_postulacion_cor?>)&nbsp;<?php echo $nombre_tipo_postulacion_com?>" />
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-12">
                                                <hr style="border-top:1px dotted #ccc;" />
                                            </div>
                                        </div>
                                        <a href="index.php" class="menu-link"><button
                                                class="btn btn-outline-danger right d-grid w-30">
                                                Volver</button></a>
                                    </div>
                                    <!-- /Account -->
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <?php
                include_once("./componentes/footer.php");
            ?>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/pages-account-settings-account.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

</body>

</html>

<?php } ?>