<?php
session_start();
$usuario_ses=$_SESSION['usuario'];
include_once("./componentes/conexion.php");
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

    <title>Aviso de privacidad - Conoceles</title>

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
<?php 
if(isset($_REQUEST['guardar'])){
    $id_user_e = $_REQUEST['id_user_e'];
    $query="UPDATE `v_avisopriv` SET `aviso_1` = '1',`fecha_a_1` = NOW(),`aviso_2` = '1',`fecha_a_2` = NOW()
    WHERE `id_user_cand` = ".$id_user_e.";";
    mysqli_query($con, $query);
    //echo $query;
}
?>

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
                $query="SELECT * FROM `c_usuarios`  WHERE `user_name` = '$usuario'";
                $resultados=mysqli_query($con, $query);
                $filas=mysqli_fetch_array($resultados);
                //echo $query;
                $id_user = $filas['id_user'];
                $id_rol = $filas['id_rol'];
                ?>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Aviso de privacidad /</span>
                            Aviso de privacidad</h4>

                        <div class="row">
                            <?php if(isset($_REQUEST['guardar'])){?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                                Aviso de privacidad aceptado con exito!<br>
                                Ahora ya puedes contestar tus cuestionarios<br>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            <div class="alert alert-warning alert-dismissible" role="alert">
                                No olvides que puedes consultarlo y descargarlo siempre que lo requieras!
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            <?php } ?>
                            <div class="col-lg-1"></div>
                            <div class="col-lg-10 mb-8 order-0">
                                <div class="card h-100">
                                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                                        <div class="card-title mb-0">
                                            <h5 class="m-0 me-2">Aviso de privacidad</h5><br>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <iframe src="https://itetlax.org.mx/assets/pdf/avisosPrivacidad/30.pdf"
                                            style="width:100%; height:400px;" frameborder="0">
                                        </iframe>
                                        <?php 
                                        if ($id_rol == 3){
                                        $query="SELECT * FROM `v_avisopriv`  WHERE `id_user_cand` = '$id_user'";
                                        $resultados1=mysqli_query($con, $query);
                                        $filas1=mysqli_fetch_array($resultados1);
                                        //echo $query;
                                        $aviso_1 = $filas1['aviso_1'];
                                        $aviso_2 = $filas1['aviso_2'];
                                        if($aviso_1 != 1 || $aviso_2 != 1){
                                        ?>
                                        <form action="aviso_privacidad.php" method="POST">
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-10">
                                                    <div class="form-check mt-3">
                                                        <input onclick="myFunction()" name="check_aviso"
                                                            class="form-check-input" type="radio" value=""
                                                            id="check_aviso" />
                                                        <label class="form-check-label" for="defaultRadio1"> He leido
                                                            con
                                                            atención y detenimiento todo el aviso de privacidad
                                                            expuesto.
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <input type="hidden" name="id_user_e"
                                                        value="<?php echo $id_user;?>">
                                                    <input type="hidden" name="guardar" value="1">
                                                    <button id="checked_aviso" name="checked_aviso"
                                                        class="btn btn-outline-primary right d-grid w-100" type="submit"
                                                        disabled>Acepto</button>
                                                </div>
                                            </div>
                                        </form>
                                        <?php } } ?>
                                    </div>
                                    <div class="card-footer">
                                        <hr style="border-top:1px dotted" />
                                        <div class="col-lg-2">
                                            <a href="index.php" class="menu-link"><button
                                                    class="btn btn-outline-danger right d-grid w-30">
                                                    Volver</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1"></div>
                        </div>
                        <!-- / Content -->

                        <div class="content-backdrop fade"></div>

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
            <script>
            function myFunction() {
                $('#check_aviso').change(function() {
                    if (this.checked) {
                        $('#checked_aviso').prop("disabled", false);
                    } else {
                        $('#checked_aviso').prop("disabled", true);
                    }
                });
            }
            </script>
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