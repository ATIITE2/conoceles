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

    <title>Administradores - Conoceles</title>

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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Instituto Tlaxcalteca de Elecciones / Áreas /</span>
                            Editar Área</h4>

                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-10">
                                <div class="col-md-12">
                                    <div class="card mb-4">
                                        <div class="card-header text-center">
                                        <big><big>Editar Área</big></big>
                                            <hr style="border-top:1px dotted" />
                                        </div>
                                        <div class="card-body">
                                            <form action="cargos_ite.php" method="POST">
                                                <div class="row">
                                                    <?php 
                                                    $id_cargo = $_REQUEST['id_edit'];
                                                    $query="SELECT * FROM `cat_puestos_ite` WHERE `id` = ".$id_cargo."";
                                                    $resultados_1=mysqli_query($con, $query);
                                                    $filas_1=mysqli_fetch_array($resultados_1); 
                                                    $nombre = $filas_1['nombre'];

                                                    ?>
                                                    <div class="col-lg-8">
                                                        <label for="exampleFormControlInput1"
                                                            class="form-label">Nombre</label>
                                                        <input type="text" class="form-control" id="nombre"
                                                            name="nombre"
                                                            value="<?php echo $nombre; ?>" />
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-lg-10"></div>
                                                    <div class="col-lg-2">
                                                        <input type="hidden" name="id_cargo"
                                                            value="<?php echo $id_cargo;?>">
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
                                                    <a href="cargos_ite.php" class="menu-link">
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
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Instituto Tlaxcalteca de Elecciones / Cargos /</span>
                            Nuevo Cargo</h4>
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-10">
                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <div class="card-header text-center">
                                        <big><big>Agregar Nuevo Cargo</big></big>
                                        <hr style="border-top:1px dotted" />
                                    </div>
                                    <div class="card-body">
                                        <form action="cargos_ite.php" method="POST">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <label for="exampleFormControlInput1"
                                                        class="form-label">Nombre</label>
                                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                                        placeholder="Ej. Auxiliar Electoral B" />
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-10"></div>
                                                <div class="col-lg-2">
                                                    <input type="hidden" name="guardar" value="1">
                                                    <button class="btn btn-outline-primary right d-grid w-100"
                                                        type="submit">Guardar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer">
                                        <hr style="border-top:1px dotted" />
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <a href="cargos_ite.php" class="menu-link">
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