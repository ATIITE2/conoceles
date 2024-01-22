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

    <title>Validadores - Conoceles</title>

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
                        if(isset($_REQUEST['gen_new_pass'])){
                        ?>
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Validadores /</span>
                            Nueva Contraseña</h4>

                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-10">
                                <div class="col-md-12">
                                    <div class="card mb-4">
                                        <div class="card-header text-center">
                                            <big><big>Generador de Nueva Contraseña</big></big>
                                            <hr style="border-top:1px dotted" />
                                        </div>
                                        <div class="card-body">
                                            <form action="validadores.php" method="POST">
                                                <div class="row">
                                                    <?php 
                                                    $id_user_new_pass=$_REQUEST['id_user_new_pass'];
                                                    $query="SELECT * FROM `c_validadores` WHERE `id_user` = ".$id_user_new_pass."";
                                                    $resultados_3=mysqli_query($con, $query);
                                                    $filas_3=mysqli_fetch_array($resultados_3);
                                                    $nombre = $filas_3['nombre'];
                                                    $app1 = $filas_3['a_pate'];
                                                    $app2 = $filas_3['a_mate'];
                                                    //echo $query;

                                                    $query="SELECT * FROM `c_usuarios` WHERE `id_user` = ".$id_user_new_pass."";
                                                    $resultados_4=mysqli_query($con, $query);
                                                    $filas_4=mysqli_fetch_array($resultados_4); 
                                                    $user_name = $filas_4['user_name'];
                                                    //echo $query;

                                                    ?>
                                                    <div class="col-lg-4">
                                                        <label for="exampleFormControlInput1"
                                                            class="form-label">Nombres</label>
                                                        <input type="text" class="form-control" id="nombre_e"
                                                            name="nombre_e" placeholder="nombre" readonly
                                                            value="<?php echo $nombre; ?>" />
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label for="exampleFormControlInput1"
                                                            class="form-label">Apellido Paterno</label>
                                                        <input type="text" class="form-control" id="appp_e"
                                                            name="appp_e" placeholder="nombre" readonly
                                                            value="<?php echo $app1; ?>" />
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label for="exampleFormControlInput1"
                                                            class="form-label">Apellido Materno</label>
                                                        <input type="text" class="form-control" id="appm_e"
                                                            name="appm_e" placeholder="nombre" readonly
                                                            value="<?php echo $app2; ?>" />
                                                    </div>

                                                    <div class="col-lg-2">
                                                        <label for="exampleFormControlInput1"
                                                            class="form-label">Usuario</label>
                                                        <input type="text" class="form-control" id="user_name_e"
                                                            name="user_name_e" placeholder="nombre" readonly
                                                            value="<?php echo $user_name; ?>" />
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-lg-3"></div>
                                                    <div class="col-lg-6">

                                                        <label>Contraseña de usuario predeterminada</label>
                                                        <center>
                                                            <div class="input-group">
                                                                <input readonly class="form-control" name="password_new"
                                                                    id="password_new" />

                                                                <button type="button" class="btn btn-primary"
                                                                    onClick="myFunction2()" />Copiar</button>
                                                            </div>

                                                            <br /><br />
                                                            <button type="button" class="btn btn-primary"
                                                                onClick="getPassword()" />Crear
                                                            Contraseñas</button>
                                                        </center>
                                                    </div>
                                                    <div class="col-lg-3"></div>
                                                </div>

                                                <br>
                                                <div class="row">
                                                    <div class="col-lg-10"></div>
                                                    <div class="col-lg-2">
                                                        <input type="hidden" name="id_user_new_pass"
                                                            value="<?php echo $id_user_new_pass;?>">
                                                        <input type="hidden" name="new_pass" value="1">
                                                        <button class="btn btn-outline-primary right d-grid w-100"
                                                            type="submit">Actualizar</button>
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
                                            <a href="validadores.php" class="menu-link"><button
                                                    class="btn btn-outline-danger right d-grid w-30">
                                                    Volver</button></a>
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
                    <!-- / Content -->


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
</body>

</html>