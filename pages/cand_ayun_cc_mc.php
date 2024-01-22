<?php
session_start();
$usuario_ses=$_SESSION['usuario'];
if(!isset($_SESSION['usuario'])){
  header("location:login.php");
}else{
    include_once("./componentes/edad.php");
    include_once("./componentes/conexion.php");
    $user_ses = $_SESSION['id_user'];    


    if(isset($_REQUEST['id_user_cand_edit'])){
        echo $_REQUEST['id_user_cand_edit'];
    } else {
        echo "No entro mano";
        header("location:ayuntamientos_revision.php");
    }
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
                            <div class="col-lg-1"></div>
                            <div class="col-lg-10">
                                <?php 

                                if($status_cuest =='3'){
                                    $query="SELECT * FROM `cuest_curricular_mc` WHERE  `id_user_cand` = '$user_ses'";
                                    $resultados_3=mysqli_query($con, $query);
                                    $filas_3=mysqli_fetch_array($resultados_3);

                                    if($filas_3['face_op']==2){
                                        $face_op="No existe cuenta";
                                        $face_tx="No aplica";
                                    } else {
                                        $face_op="Si existe cuenta";
                                        $face_tx=$filas_3['face_tx'];
                                    }

                                    if($filas_3['twit_op']==2){
                                        $twit_op="No existe cuenta";
                                        $twit_tx="No aplica";
                                    } else {
                                        $twit_op="Si existe cuenta";
                                        $twit_tx=$filas_3['twit_tx'];
                                    }

                                    if($filas_3['yout_op']==2){
                                        $yout_op="No existe cuenta";
                                        $yout_tx="No aplica";
                                    } else {
                                        $yout_op="Si existe cuenta";
                                        $yout_tx=$filas_3['yout_tx'];
                                    }

                                    if($filas_3['inst_op']==2){
                                        $inst_op="No existe cuenta";
                                        $inst_tx="No aplica";
                                    } else {
                                        $inst_op="Si existe cuenta";
                                        $inst_tx=$filas_3['inst_tx'];
                                    }

                                    if($filas_3['tikt_op']==2){
                                        $tikt_op="No existe cuenta";
                                        $tikt_tx="No aplica";
                                    } else {
                                        $tikt_op="Si existe cuenta";
                                        $tikt_tx=$filas_3['tikt_tx'];
                                    }

                                    if($filas_3['otra_op']==2){
                                        $otra_op="No existe cuenta";
                                        $otra_tx="No aplica";
                                    } else {
                                        $otra_op="Si existe cuenta";
                                        $otra_tx=$filas_3['otra_tx'];
                                    }
                                    

                                    $pagina_w = $filas_3['pagina_w'];
                                    $mail_1 = $filas_3['mail_1'];
                                    $mail_2 = $filas_3['mail_2'];
                                    $mail_3 = $filas_3['mail_3'];

                                    $tel_1=($filas_3['tel_1']==0) ? "No existe respuesta." : $filas_3['tel_1'];
                                    $tel_2=($filas_3['tel_2']==0) ? "No existe respuesta." : $filas_3['tel_2'];
                                    $tel_3=($filas_3['tel_3']==0) ? "No existe respuesta." : $filas_3['tel_3'];

                                    $dire_1 = $filas_3['dire_1'];
                                    $dire_2 = $filas_3['dire_2'];
                                    $dire_3 = $filas_3['dire_3'];
                                ?>
                                <div class="card h-100">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h5>RESPUESTAS AL CUESTIONARIO CURRICULAR (MEDIOS DE CONTACTO)</h5>
                                                <hr style="border-top:1px dotted" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <!-- REDES SOCIALES -->
                                        <h5>REDES SOCIALES</h5>
                                        <div class="row">
                                            <div class="mb-2 mt-1 col-1"></div>
                                            <div class="mb-2 mt-1 col-5">
                                                <strong><i class="fa fa-facebook-official fa-lg"
                                                        aria-hidden="true"></i></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label
                                                    for="firstName" class="form-label">FACEBOOK </label>
                                                <input class="form-control" disabled type="text" id="firstName"
                                                    name="firstName" value="<?php echo $face_op?>" autofocus />
                                            </div>
                                            <div class="mb-2 mt-1 col-5">
                                                <label for="firstName" class="form-label">CUENTA</label>
                                                <input class="form-control" disabled type="text" id="firstName"
                                                    name="firstName" value="<?php echo $face_tx?>" autofocus />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <br>
                                            <div class="mb-2 mt-1 col-1"></div>
                                            <div class="mb-2 mt-1 col-5">
                                                <strong><i class="fa fa-twitter fa-lg"
                                                        aria-hidden="true"></i></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label
                                                    for="firstName" class="form-label">TWITTER </label>
                                                <input class="form-control" disabled type="text" id="firstName"
                                                    name="firstName" value="<?php echo $twit_op?>" autofocus />
                                            </div>
                                            <div class="mb-2 mt-1 col-5">
                                                <label for="firstName" class="form-label">CUENTA</label>
                                                <input class="form-control" disabled type="text" id="firstName"
                                                    name="firstName" value="<?php echo $twit_tx?>" autofocus />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <br>
                                            <div class="mb-2 mt-1 col-1"></div>
                                            <div class="mb-2 mt-1 col-5">
                                                <strong><i class="fa fa-youtube fa-lg"
                                                        aria-hidden="true"></i></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label
                                                    for="firstName" class="form-label">YOUTUBE </label>
                                                <input class="form-control" disabled type="text" id="firstName"
                                                    name="firstName" value="<?php echo $yout_op?>" autofocus />
                                            </div>
                                            <div class="mb-2 mt-1 col-5">
                                                <label for="firstName" class="form-label">CUENTA</label>
                                                <input class="form-control" disabled type="text" id="firstName"
                                                    name="firstName" value="<?php echo $yout_tx?>" autofocus />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <br>
                                            <div class="mb-2 mt-1 col-1"></div>
                                            <div class="mb-2 mt-1 col-5">
                                                <strong><i class="fa fa-instagram fa-lg"
                                                        aria-hidden="true"></i></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label
                                                    for="firstName" class="form-label">INSTAGRAM </label>
                                                <input class="form-control" disabled type="text" id="firstName"
                                                    name="firstName" value="<?php echo $inst_op?>" autofocus />
                                            </div>
                                            <div class="mb-2 mt-1 col-5">
                                                <label for="firstName" class="form-label">CUENTA</label>
                                                <input class="form-control" disabled type="text" id="firstName"
                                                    name="firstName" value="<?php echo $inst_tx?>" autofocus />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <br>
                                            <div class="mb-2 mt-1 col-1"></div>
                                            <div class="mb-2 mt-1 col-5">
                                                <strong><i class="bi bi-tiktok fa-lg"
                                                        aria-hidden="true"></i></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label
                                                    for="firstName" class="form-label">TIKTOK </label>
                                                <input class="form-control" disabled type="text" id="firstName"
                                                    name="firstName" value="<?php echo $tikt_op?>" autofocus />
                                            </div>
                                            <div class="mb-2 mt-1 col-5">
                                                <label for="firstName" class="form-label">CUENTA</label>
                                                <input class="form-control" disabled type="text" id="firstName"
                                                    name="firstName" value="<?php echo $tikt_tx?>" autofocus />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <br>
                                            <div class="mb-2 mt-1 col-1"></div>
                                            <div class="mb-2 mt-1 col-5">
                                                <strong><i class="bi bi-globe2 fa-lg"
                                                        aria-hidden="true"></i></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label
                                                    for="firstName" class="form-label">OTRA </label>
                                                <input class="form-control" disabled type="text" id="firstName"
                                                    name="firstName" value="<?php echo $otra_op?>" autofocus />
                                            </div>
                                            <div class="mb-2 mt-1 col-5">
                                                <label for="firstName" class="form-label">CUENTA</label>
                                                <input class="form-control" disabled type="text" id="firstName"
                                                    name="firstName" value="<?php echo $otra_tx?>" autofocus />
                                            </div>
                                            <br>
                                        </div>
                                        <br>
                                        <!-- PAGINA WEB -->
                                        <h5>PAGINA WEB</h5>
                                        <div class="row">
                                            <div class="col-md-1">
                                            </div>
                                            <div class="col-md-1">
                                                <label><i class="bi bi-globe2" style="font-size: 25px;"></i></label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="input-group input-group-merge">
                                                    <input name="pagina_web" type="text" class="form-control"
                                                        id="basic-url3" value="<?php echo $pagina_w;?>" disabled
                                                        aria-describedby="basic-addon34" />
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                            </div>
                                        </div><br>
                                        <!-- CORREOS ELECTRONICOS -->
                                        <h5> CORREOS ELECTRONICOS </h5><br>
                                        <div class="row">
                                            <div class="col-md-1">
                                            </div>
                                            <div class="col-md-1">
                                                <i class="bi bi-envelope-at" style="font-size: 25px;"></i>
                                            </div>
                                            <div class="col-md-8">
                                                <div>
                                                    <input class="form-control" type="email"
                                                        value="<?php echo $mail_1;?>" disabled id="html5-email-input"
                                                        name="correo_1" />
                                                </div>
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-md-1">
                                            </div>
                                            <div class="col-md-1">
                                                <i class="bi bi-envelope-at" style="font-size: 25px;"></i>
                                            </div>
                                            <div class="col-md-8">
                                                <div>
                                                    <input class="form-control" type="email"
                                                        value="<?php echo $mail_2;?>" disabled id="html5-email-input"
                                                        name="correo_2" />
                                                </div>
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-md-1">
                                            </div>
                                            <div class="col-md-1">
                                                <i class="bi bi-envelope-at" style="font-size: 25px;"></i>
                                            </div>
                                            <div class="col-md-8">
                                                <div>
                                                    <input class="form-control" type="email"
                                                        value="<?php echo $mail_3;?>" disabled id="html5-email-input"
                                                        name="correo_3" />
                                                </div>
                                            </div>
                                        </div><br>
                                        <!-- TELEFONOS DE CONTACTO -->
                                        <h5>TELEFONOS DE CONTACTO</h5><br>
                                        <div class="row">
                                            <div class="col-md-1">
                                            </div>
                                            <div class="col-md-1">

                                                <label><i class="bi bi-telephone" style="font-size: 25px;"></i></label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" id="basic-de fault-phone" name="telefono_1"
                                                    class="form-control phone-mask" value="<?php echo $tel_1;?>"
                                                    disabled />
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-1">
                                            </div>
                                            <div class="col-md-1">

                                                <label><i class="bi bi-telephone" style="font-size: 25px;"></i></label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" id="basic-de fault-phone" name="telefono_2"
                                                    class="form-control phone-mask" value="<?php echo $tel_2;?>"
                                                    disabled />
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-1">
                                            </div>
                                            <div class="col-md-1">

                                                <label><i class="bi bi-telephone" style="font-size: 25px;"></i></label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" id="basic-de fault-phone" name="telefono_3"
                                                    class="form-control phone-mask" value="<?php echo $tel_3;?>"
                                                    disabled />
                                            </div>
                                        </div>
                                        <br>

                                        <!-- DOMICILIOS DE CAMPAÑA -->
                                        <h5>DOMICILIOS DE CAMPAÑA</h5><br>
                                        <div class="row">
                                            <div class="col-md-1">
                                            </div>
                                            <div class="col-md-1">

                                                <label><i class="bi bi-house" style="font-size: 25px;"></i></label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="input-group input-group-merge">
                                                    <textarea class="form-control" name="direccion_1"
                                                        aria-label="With textarea"
                                                        disabled><?php echo $dire_1;?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-1">
                                            </div>
                                            <div class="col-md-1">

                                                <label><i class="bi bi-house" style="font-size: 25px;"></i></label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="input-group input-group-merge">
                                                    <textarea class="form-control" name="direccion_2"
                                                        aria-label="With textarea"
                                                        disabled><?php echo $dire_2;?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-1">
                                            </div>
                                            <div class="col-md-1">

                                                <label><i class="bi bi-house" style="font-size: 25px;"></i></label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="input-group input-group-merge">
                                                    <textarea class="form-control" name="direccion_3"
                                                        aria-label="With textarea"
                                                        disabled><?php echo $dire_3;?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <hr style="border-top:1px dotted" />
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <a href="cuestionario_cur.php" class="menu-link"><button
                                                        class="btn btn-outline-danger right d-grid w-30">
                                                        Volver</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
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
        </div>
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
<?php 
} 
?>

</html>