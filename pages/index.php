<?php
session_start();
$usuario_ses=$_SESSION['usuario'];
if(!isset($_SESSION['usuario'])){
  header("location:login.php");
}else{
?>
<style>
    video {
  width: 100%;
  height: auto;
}
</style>

<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Inicio - Conoceles</title>

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
                <?php
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
                    }elseif($tipo_cand == 2){
                        $tabla = "c_cand_ayun";
                    }elseif($tipo_cand == 3){
                        $tabla = "c_cand_com";
                    }elseif($tipo_cand == 4){
                        $tabla = "c_cand_dip_mr";
                    }elseif($tipo_cand == 5){
                        $tabla = "c_cand_dip_rp";
                    }
                } elseif ($rol == 4){
                    $tabla = "c_validadores";
                } elseif ($rol == 5){
                    $tabla = "c_verificadores";
                }
                //echo $tabla;
                $query="SELECT * FROM ".$tabla." WHERE `id_user` = '$id_user'";
                $resultados=mysqli_query($con, $query);
                $filas=mysqli_fetch_array($resultados);
                //echo $query;
                $name = $filas["nombre"];
                $app1 = $filas["a_pate"];
                $app2 = $filas["a_mate"];
                ?>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>
                                </h4>
                        <div class="row">
                            <div class="col-lg-1 mb-4 order-0"></div>
                            <div class="col-lg-10 mb-4 order-0">
                                <div class="card">
                                    <div class="d-flex align-items-end row">
                                        <div class="col-sm-7">
                                            <div class="card-body">
                                                <h4 class="card-title text-primary">

                                                    <?php 
                                                    if ($rol != 3){
                                                    echo $nombre_rol;
                                                    } elseif ($rol == 3){
                                                        echo $nombre_rol;?> a <?php echo $nombre_tipo_cand;
                                                    }
                                                    ?><br></h4>
                                                <h5 class="card-title text-primary">
                                                    <?php echo $name?>&nbsp;<?php echo $app1?>&nbsp;<?php echo $app2?>
                                                </h5>
                                                <p class="mb-4">
                                                    BIENVENIDO NUEVAMENTE AL SISTEMA DE CONOCELES
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-sm-5 text-center text-sm-left">
                                            <div class="card-body pb-0 px-0 px-md-4">
                                                <img src="../assets/img/illustrations/man-with-laptop-light.png"
                                                    height="140" alt="View Badge User"
                                                    data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                                    data-app-light-img="illustrations/man-with-laptop-light.png" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1 mb-4 order-0"></div>
                            <div class="col-lg-10 mb-4 order-0">
                                <div class="card h-100">
                                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                                        <div class="card-title mb-0">
                                            <h5 class="m-0 me-2">COMO REVISAR EL AVISO DE PRIVACIDAD</h5>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <video controls src="../assets/video/video_prueba.mp4" muted
                                                loop></video>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div div class="col-lg-2 mb-4 order-0"></div>
                        </div>
                        <!-- / Content -->

                        <div class="content-backdrop fade"></div>
                    </div>
                    <!-- Content wrapper -->
                </div>
                <!-- / Layout page -->
                <!-- Footer -->
                <?php
                        include_once("./componentes/footer.php");
                        ?>
                <!-- / Footer -->
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
        <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

        <!-- Main JS -->
        <script src="../assets/js/main.js"></script>

        <!-- Page JS -->
        <script src="../assets/js/dashboards-analytics.js"></script>

        <!-- Place this tag in your head or just before your close body tag. -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
<?php
}
//echo $usuario_ses;
?>