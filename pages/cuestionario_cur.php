<?php
session_start();
$usuario_ses=$_SESSION['usuario'];
if(!isset($_SESSION['usuario'])){
  header("location:login.php");
}else{
    include_once("./componentes/edad.php");
?>

<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<head>


    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Cuestionario Curricular - Conoceles</title>

    <meta name="description" content="" />
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
            <?php
            include_once("./componentes/menu.php");
            ?>
            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <?php
        include_once("./componentes/search.php");
        ?>

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <!-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">UI elements /</span> Tabs & Pills</h4> -->
                        <!-- Tabs -->
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Cuestionarios /</span>
                            Cuestionario Curricular</h4>
                        <div class="row">
                            <!-- MENSAJES DE ACCIONES -->
                            <div class="col-lg-1 mb-3 order-0"></div>
                            <div class="col-lg-10 mb-6 order-0">
                                <div class="card h-100">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h5>Apartados de cuestionario curricular</h5>
                                                <hr style="border-top:1px dotted" />
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-body">
                                        <div class="justify-content-between align-items-center mb-3">
                                            <div class="row">
                                                <div class="row mt-3">
                                                    <div class="d-grid gap-2 col-lg-6 mx-auto">
                                                        <a href="cuestionario_cur_1.php" class="menu-link">
                                                            <button class="btn btn-outline-primary w-100"
                                                                type="button"><i
                                                                    class="tf-icons bx bx-camera"></i>&nbsp;FOTOGRAFIA</button>
                                                        </a>
                                                        <a href="cuestionario_cur_2.php" class="menu-link">
                                                            <button class="btn btn-outline-primary w-100"
                                                                type="button"><i
                                                                    class="tf-icons bx bx-network-chart"></i>&nbsp;INFORMACION
                                                                DE CONTACTO</button>
                                                        </a>
                                                        <a href="cuestionario_cur_3.php" class="menu-link">
                                                            <button class="btn btn-outline-primary w-100"
                                                                type="button"><i
                                                                    class="tf-icons bx bx-briefcase-alt"></i>&nbsp;INFORMACION
                                                                CURRICULAR</button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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

        <?php
            $user_ses = $_SESSION['id_user'];
            $query="SELECT * FROM `v_avisopriv` WHERE `id_user_cand` = '$user_ses'";
            $resultados_1=mysqli_query($con, $query);
            $filas_1=mysqli_fetch_array($resultados_1);
            $filas_1['aviso_2'];
            $validacion_av1 = $filas_1['aviso_2'];
            if($validacion_av1 == 0){
            //echo $validacion_av1;
            //echo $query;
        ?>
        <div class="modal fade" id="myModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <?php 
                        include_once("./componentes/aviso_priv.php"); 
                    ?>
                </div>
            </div>
        </div>
        <?php 
            }  
        ?>
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

        <script>
        $(document).ready(function() {

            $('#myModal').modal({
                backdrop: 'static',
                keyboard: false
            })
            $('#myModal').modal('toggle')

        });
        $('#check_aviso').change(function() {
            if (this.checked) {
                $('#check_aviso_close').prop("disabled", false);
            } else {
                $('#check_aviso_close').prop("disabled", true);
            }
        });
        </script>
</body>
<?php } ?>


</html>