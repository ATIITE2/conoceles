<?php
session_start();
$usuario_ses=$_SESSION['usuario'];
if(!isset($_SESSION['usuario'])){
  header("location:login.php");
}else{
    include_once("./componentes/edad.php");
    include_once("./componentes/conexion.php");
    $user_ses = $_SESSION['id_user'];
    $query="SELECT * FROM `v_avisopriv` WHERE `id_user_cand` = '$user_ses'";
    $resultados_1=mysqli_query($con, $query);
    $filas_1=mysqli_fetch_array($resultados_1);
    $filas_1['aviso_2'];
    $validacion_av1 = $filas_1['aviso_2'];
    if($validacion_av1 == 0){
        header('Location:cuestionario_cur.php');
    } else {
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
                                    if(isset($_REQUEST['guardar'])){
                                        $face_opti=$_REQUEST['facebook-radio-1'];
                                        if(!isset($_REQUEST['dis_1_input'])){
                                            $face_text=0;
                                        } else {
                                            $face_text=$_REQUEST['dis_1_input'];
                                        }
                                        $twit_opti=$_REQUEST['twitter-radio-1'];
                                        if(!isset($_REQUEST['dis_2_input'])){
                                            $twit_text=0;
                                        } else {
                                            $twit_text=$_REQUEST['dis_2_input'];
                                        }
                                        $yout_opti=$_REQUEST['youtube-radio-1'];
                                        if(!isset($_REQUEST['dis_3_input'])){
                                            $yout_text=0;
                                        } else {
                                            $yout_text=$_REQUEST['dis_3_input'];
                                        }
                                        $inst_opti=$_REQUEST['instagram-radio-1'];
                                        if(!isset($_REQUEST['dis_4_input'])){
                                            $inst_text=0;
                                        } else {
                                            $inst_text=$_REQUEST['dis_4_input'];
                                        }
                                        $tikt_opti=$_REQUEST['tiktok-radio-1'];
                                        if(!isset($_REQUEST['dis_5_input'])){
                                            $tikt_text=0;
                                        } else {
                                            $tikt_text=$_REQUEST['dis_5_input'];
                                        }
                                        $otra_opti=$_REQUEST['otras-radio-1'];
                                        if(!isset($_REQUEST['dis_6_input'])){
                                            $otra_text=0;
                                        } else {
                                            $otra_text=$_REQUEST['dis_6_input'];
                                        }
                                        if($_REQUEST['pagina_web']==null){
                                            $pagina_web="No existe respuesta.";
                                        } else {
                                            $pagina_web=$_REQUEST['pagina_web'];
                                        }
                                        if($_REQUEST['correo_1']==null){
                                            $mail_1="No existe respuesta.";
                                        } else {
                                            $mail_1=$_REQUEST['correo_1'];
                                        }
                                        if($_REQUEST['correo_2']==null){
                                            $mail_2="No existe respuesta.";
                                        } else {
                                            $mail_2=$_REQUEST['correo_2'];
                                        }
                                        if($_REQUEST['correo_3']==null){
                                            $mail_3="No existe respuesta.";
                                        } else {
                                            $mail_3=$_REQUEST['correo_3'];
                                        }
                                        if($_REQUEST['telefono_1']==null){
                                            $tel_1="No existe respuesta.";
                                        } else {
                                            $tel_1=$_REQUEST['telefono_1'];
                                        }
                                        if($_REQUEST['telefono_2']==null){
                                            $tel_2="No existe respuesta.";
                                        } else {
                                            $tel_2=$_REQUEST['telefono_2'];
                                        }
                                        if($_REQUEST['telefono_3']==null){
                                            $tel_3="No existe respuesta.";
                                        } else {
                                            $tel_3=$_REQUEST['telefono_3'];
                                        }
                                        if($_REQUEST['direccion_1']==null){
                                            $dire_1="No existe respuesta.";
                                        } else {
                                            $dire_1=$_REQUEST['direccion_1'];
                                        }
                                        if($_REQUEST['direccion_2']==null){
                                            $dire_2="No existe respuesta.";
                                        } else {
                                            $dire_2=$_REQUEST['direccion_2'];
                                        }
                                        if($_REQUEST['direccion_3']==null){
                                            $dire_3="No existe respuesta.";
                                        } else {
                                            $dire_3=$_REQUEST['direccion_3'];
                                        }

                                        /* echo $face_opti;
                                        echo $face_text;
                                        echo $twit_opti;
                                        echo $twit_text;
                                        echo $yout_opti;
                                        echo $yout_text;
                                        echo $inst_opti;
                                        echo $inst_text;
                                        echo $tikt_opti;
                                        echo $tikt_text;
                                        echo $otra_opti;
                                        echo $otra_text;
                                        echo $pagina_web;
                                        echo $mail_1;
                                        echo $mail_2;
                                        echo $mail_3;
                                        echo $dire_1;
                                        echo $dire_2;
                                        echo $dire_3;
                                        echo $tel_1;
                                        echo $tel_2;
                                        echo $tel_3; */

                                        $query="UPDATE `cuest_curricular_mc` SET `face_op` = '".$face_opti."', `face_tx` = '".$face_text."', `twit_op` = '".$twit_opti."', `twit_tx` = '".$twit_text."',
                                        `yout_op` = '".$yout_opti."', `yout_tx` = '".$yout_text."', `inst_op` = '".$inst_opti."', `inst_tx` = '".$inst_text."', `tikt_op` = '".$tikt_opti."', `tikt_tx` = '".$tikt_text."', 
                                        `otra_op` = '".$otra_opti."', `otra_tx` = '".$otra_text."', `pagina_w` = '".$pagina_web."', `mail_1` = '".$mail_1."',`mail_2` = '".$mail_2."',
                                        `mail_3` = '".$mail_3."',`tel_1` = '".$tel_1."',`tel_2` = '".$tel_2."',`tel_3` = '".$tel_3."',`dire_1` = '".$dire_1."', `dire_2` = '".$dire_2."',`dire_3` = '".$dire_3."',
                                        `status` = '3',`fecha` = 'NOW()' WHERE `id_user_cand` = ".$user_ses.";";
                                        mysqli_query($con, $query);
                                        //echo $query;
                                    }
                                    $query="SELECT * FROM `cuest_curricular_mc` WHERE  `id_user_cand` = '$user_ses'";
                                    $resultados_2=mysqli_query($con, $query);
                                    $filas_2=mysqli_fetch_array($resultados_2);
                                    $status_cuest = $filas_2['status'];
                                ?>

                                <?php 
                                if($status_cuest =='4'){ 
                                ?>

                                <div class="card h-100">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h5>Apartados de cuestionario curricular</h5>
                                                <hr style="border-top:1px dotted" />
                                            </div>
                                        </div>
                                    </div>
                                    <form action="cuestionario_cur_2.php" method="POST">
                                        <div class="card-body">
                                            <!-- REDES SOCIALES -->
                                            <h5>REDES SOCIALES</h5><br>
                                            <div class="row">
                                                <div class="col-md-1">
                                                </div>
                                                <div class="col-md-10">
                                                    <p>
                                                        <strong>
                                                            <i class="fa fa-facebook-official" aria-hidden="true">
                                                            </i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FACEBOOK
                                                        </strong>
                                                    </p>
                                                    <div class="form-check mt-3">
                                                        <input name="facebook-radio-1" class="form-check-input"
                                                            type="radio" value="1" id="facebookRadio1" />
                                                        <label class="form-check-label" for="facebookRadio1"> Si
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input name="facebook-radio-1" class="form-check-input"
                                                            type="radio" value="2" id="facebookRadio2" checked />
                                                        <label class="form-check-label" for="facebookRadio2"> No
                                                        </label>
                                                    </div>
                                                    <p>
                                                        <small> La opción seleccionada fue "Si", favor de especificar
                                                            cual:
                                                        </small>
                                                    </p>
                                                    <p class="mb-0">
                                                    <div class="input-group">
                                                        <span class="input-group-text"
                                                            id="basic-addon14">facebook.com/</span>
                                                        <input name="dis_1_input" id="dis_1_input" type="text" required
                                                            class="form-control" placeholder="URL" disabled
                                                            aria-describedby="basic-addon14" />
                                                    </div>
                                                    </p>
                                                    <br>
                                                    <!-- TWITTER -->
                                                    <p>
                                                        <strong><i class="fa fa-twitter"
                                                                aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TWITTER</strong>
                                                    </p>
                                                    <div class="form-check mt-3">
                                                        <input name="twitter-radio-1" class="form-check-input"
                                                            type="radio" value="1" id="twitterRadio1" />
                                                        <label class="form-check-label" for="twitterRadio1"> Si </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input name="twitter-radio-1" class="form-check-input"
                                                            type="radio" value="2" id="twitterRadio2" checked />
                                                        <label class="form-check-label" for="twitterRadio2"> No </label>
                                                    </div>
                                                    <p>
                                                        <small> La opción seleccionada fue "Si", favor de especificar
                                                            cual:
                                                        </small>
                                                    </p>
                                                    <p class="mb-0">
                                                    <div class="input-group">
                                                        <span class="input-group-text"
                                                            id="basic-addon14">twitter.com/</span>
                                                        <input name="dis_2_input" id="dis_2_input" type="text" required
                                                            class="form-control" placeholder="URL" disabled
                                                            aria-describedby="basic-addon14" />
                                                    </div>
                                                    </p>
                                                    <br>
                                                    <!-- YOUTUBE -->
                                                    <p>
                                                        <strong><i class="fa fa-youtube"
                                                                aria-hidden="true"></i></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;YOUTUBE</strong>
                                                    </p>
                                                    <div class="form-check mt-3">
                                                        <input name="youtube-radio-1" class="form-check-input"
                                                            type="radio" value="1" id="youtubeRadio1" />
                                                        <label class="form-check-label" for="youtubeRadio1"> Si </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input name="youtube-radio-1" class="form-check-input"
                                                            type="radio" value="2" id="youtubeRadio2" checked />
                                                        <label class="form-check-label" for="youtubeRadio2"> No </label>
                                                    </div>
                                                    <br>
                                                    <p>
                                                        <small> La opción seleccionada fue "Si", favor de especificar
                                                            cual:
                                                        </small>
                                                    </p>
                                                    <p class="mb-0">
                                                    <div class="input-group">
                                                        <span class="input-group-text"
                                                            id="basic-addon14">youtube.com/</span>
                                                        <input name="dis_3_input" id="dis_3_input" type="text" required
                                                            class="form-control" placeholder="URL" disabled
                                                            aria-describedby="basic-addon14" />
                                                    </div>
                                                    </p>
                                                    <!-- INSTAGRAM -->
                                                    <p>
                                                        <strong><i class="fa fa-instagram"
                                                                aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;INSTAGRAM</strong>
                                                    </p>
                                                    <div class="form-check mt-3">
                                                        <input name="instagram-radio-1" class="form-check-input"
                                                            type="radio" value="1" id="instagramRadio1" />
                                                        <label class="form-check-label" for="instagramRadio1"> Si
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input name="instagram-radio-1" class="form-check-input"
                                                            type="radio" value="2" id="instagramRadio2" checked />
                                                        <label class="form-check-label" for="instagramRadio2"> No
                                                        </label>
                                                    </div>
                                                    <p>
                                                        <small> La opción seleccionada fue "Si", favor de especificar
                                                            cual:
                                                        </small>
                                                    </p>
                                                    <p class="mb-0">
                                                    <div class="input-group">
                                                        <span class="input-group-text"
                                                            id="basic-addon14">twitter.com/</span>
                                                        <input name="dis_4_input" id="dis_4_input" type="text" required
                                                            class="form-control" placeholder="URL" disabled
                                                            aria-describedby="basic-addon14" />
                                                    </div>
                                                    </p>
                                                    <!-- TIKTOK -->
                                                    <br>
                                                    <p>
                                                        <strong><i
                                                                class="bi bi-tiktok"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TIKTOK</strong>
                                                    </p>
                                                    <div class="form-check mt-3">
                                                        <input name="tiktok-radio-1" class="form-check-input"
                                                            type="radio" value="1" id="tiktokRadio1" />
                                                        <label class="form-check-label" for="tiktokRadio1"> Si </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input name="tiktok-radio-1" class="form-check-input"
                                                            type="radio" value="2" id="tiktokRadio2" checked />
                                                        <label class="form-check-label" for="tiktokRadio2"> No </label>
                                                    </div>
                                                    <p>
                                                        <small> La opción seleccionada fue "Si", favor de especificar
                                                            cual:
                                                        </small>
                                                    </p>
                                                    <p class="mb-0">
                                                    <div class="input-group">
                                                        <span class="input-group-text"
                                                            id="basic-addon14">tiktok.com/</span>
                                                        <input name="dis_5_input" id="dis_5_input" type="text" required
                                                            class="form-control" placeholder="URL" disabled
                                                            aria-describedby="basic-addon14" />
                                                    </div>
                                                    </p>
                                                    <br>
                                                    <!-- OTRA -->
                                                    <p>
                                                        <strong><i
                                                                class="bi bi-globe2"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OTRA</strong>
                                                    </p>
                                                    <div class="form-check mt-3">
                                                        <input name="otras-radio-1" class="form-check-input"
                                                            type="radio" value="1" id="otrasRadio1" />
                                                        <label class="form-check-label" for="otrasRadio1"> Si </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input name="otras-radio-1" class="form-check-input"
                                                            type="radio" value="2" id="otrasRadio2" checked />
                                                        <label class="form-check-label" for="otrasRadio2"> No </label>
                                                    </div>
                                                    <p>
                                                        <small> La opción seleccionada fue "Si", favor de especificar
                                                            cual:
                                                        </small>
                                                    </p>
                                                    <p class="mb-0">
                                                    <div class="col-md-12">
                                                        <div class="mb-1">
                                                            <input name="dis_6_input" id="dis_6_input" required
                                                                class="form-control" type="text" disabled
                                                                placeholder="Escribe tu respuesta..." />
                                                        </div>
                                                    </div>
                                                    </p>
                                                    </p>
                                                </div>
                                            </div>
                                            <!-- PAGINA WEB -->
                                            <h5>PAGINA WEB</h5><br>
                                            <div class="row">
                                                <div class="col-md-1">
                                                </div>
                                                <div class="col-md-1">

                                                    <label><i class="bi bi-globe2" style="font-size: 25px;"></i></label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="input-group input-group-merge">
                                                        <input name="pagina_web" type="text" class="form-control"
                                                            id="basic-url3" placeholder="https//www.pagina.com.mx/"
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
                                                            placeholder="usuario@mail.com" value=""
                                                            id="html5-email-input" name="correo_1" />
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
                                                            placeholder="usuario@mail.com" value=""
                                                            id="html5-email-input" name="correo_2" />
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
                                                            placeholder="usuario@mail.com" value=""
                                                            id="html5-email-input" name="correo_3" />
                                                    </div>
                                                </div>
                                            </div><br>
                                            <!-- TELEFONOS DE CONTACTO -->
                                            <h5>TELEFONOS DE CONTACTO</h5><br>
                                            <div class="row">
                                                <div class="col-md-1">
                                                </div>
                                                <div class="col-md-1">

                                                    <label><i class="bi bi-telephone"
                                                            style="font-size: 25px;"></i></label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" id="basic-de fault-phone" name="telefono_1"
                                                        class="form-control phone-mask" placeholder="000 123 4567" />
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-1">
                                                </div>
                                                <div class="col-md-1">

                                                    <label><i class="bi bi-telephone"
                                                            style="font-size: 25px;"></i></label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" id="basic-de fault-phone" name="telefono_2"
                                                        class="form-control phone-mask" placeholder="000 123 4567" />
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-1">
                                                </div>
                                                <div class="col-md-1">

                                                    <label><i class="bi bi-telephone"
                                                            style="font-size: 25px;"></i></label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" id="basic-de fault-phone" name="telefono_3"
                                                        class="form-control phone-mask" placeholder="000 123 4567" />
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
                                                            placeholder="Dirección 1"></textarea>
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
                                                            placeholder="Dirección 2"></textarea>
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
                                                            placeholder="Dirección 3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-lg-10"></div>
                                                <div class="col-lg-2">
                                                    <input type="hidden" name="guardar" value="1">
                                                    <button class="btn btn-outline-primary right d-grid w-100"
                                                        type="submit">Crear</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="card-footer">
                                        <hr style="border-top:1px dotted" />
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <a href="cuestionario_cur.php" class="menu-link"><button
                                                        class="btn btn-outline-danger right d-grid w-30">
                                                        Volver</button></a>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="text-center">
                                                    <button id="refresh"
                                                        class="btn btn-outline-warning btn-lg center w-30">
                                                        Borrar selecciones / Volver a comenzar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                } else if($status_cuest =='3'){
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
                                                    class="form-control phone-mask" value="<?php echo $tel_1;?>" disabled />
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
                                                    class="form-control phone-mask" value="<?php echo $tel_2;?>" disabled/>
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
                                                    class="form-control phone-mask" value="<?php echo $tel_3;?>" disabled />
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
                                                        aria-label="With textarea" disabled><?php echo $dire_1;?></textarea>
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
                                                        aria-label="With textarea" disabled><?php echo $dire_2;?></textarea>
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
                                                        aria-label="With textarea" disabled><?php echo $dire_3;?></textarea>
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
            <div class="modal fade" id="modalToggle" aria-labelledby="modalToggleLabel" tabindex="-1"
                style="display: none" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalToggleLabel">
                                INFORMACION SOBRE LA CARGA DE FOTOGRAFIA
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <strong>1</strong>: La fotografia no deberá
                            tener una antigüedad
                            mayor a 3 meses previos a su publicación.
                            <br /><br />
                            <strong class="card-title text-danger">PROHIBIDO</strong>
                            <br>Imágenes de los logotipos de los PP,
                            Coaliciones o Candidatura Común.
                            <br />
                            <br>Imágenes provenientes de documentos
                            oficiales y/o académicos.
                            <br />
                            <br>Imágenes con lemas de campaña.
                            <br />
                            <br>Imágenes de otras Candidaturas o personajes
                            políticos.
                            <br />
                            <br>Imágenes religiosas.
                            <br />
                            <br>Imágenes que integren expresiones de
                            denostación o de discriminación de cualquier
                            índole.
                            <br />
                            <br>Imágenes que contengan lenguaje sexista,
                            ofensivo o discriminatorio.
                            <br />
                        </div>
                    </div>
                </div>
            </div>
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
        <script>
        let refresh = document.getElementById('refresh');
        refresh.addEventListener('click', _ => {
            location.reload();
        })
        </script>
        <script>
        $('#facebookRadio1').change(function() {
            if (this.checked) {
                $('#dis_1_input').prop("disabled", false);
            } else {
                $('#dis_1_input').prop("disabled", true);
            }
        });
        $('#facebookRadio2').change(function() {
            if (this.checked) {
                $('#dis_1_input').prop("disabled", true);
            } else {
                $('#dis_1_input').prop("disabled", false);
            }
        });
        </script>
        <!-- TWITTER -->
        <script>
        $('#twitterRadio1').change(function() {
            if (this.checked) {
                $('#dis_2_input').prop("disabled", false);
            } else {
                $('#dis_2_input').prop("disabled", true);
            }
        });
        $('#twitterRadio2').change(function() {
            if (this.checked) {
                $('#dis_2_input').prop("disabled", true);
            } else {
                $('#dis_2_input').prop("disabled", false);
            }
        });
        </script>
        <!-- YOUTUBE -->
        <script>
        $('#youtubeRadio1').change(function() {
            if (this.checked) {
                $('#dis_3_input').prop("disabled", false);
            } else {
                $('#dis_3_input').prop("disabled", true);
            }
        });
        $('#youtubeRadio2').change(function() {
            if (this.checked) {
                $('#dis_3_input').prop("disabled", true);
            } else {
                $('#dis_3_input').prop("disabled", false);
            }
        });
        </script>
        <!-- INSTAGRAM -->
        <script>
        $('#instagramRadio1').change(function() {
            if (this.checked) {
                $('#dis_4_input').prop("disabled", false);
            } else {
                $('#dis_4_input').prop("disabled", true);
            }
        });
        $('#instagramRadio2').change(function() {
            if (this.checked) {
                $('#dis_4_input').prop("disabled", true);
            } else {
                $('#dis_4_input').prop("disabled", false);
            }
        });
        </script>
        <!-- TIKTOK -->
        <script>
        $('#tiktokRadio1').change(function() {
            if (this.checked) {
                $('#dis_5_input').prop("disabled", false);
            } else {
                $('#dis_5_input').prop("disabled", true);
            }
        });
        $('#tiktokRadio2').change(function() {
            if (this.checked) {
                $('#dis_5_input').prop("disabled", true);
            } else {
                $('#dis_5_input').prop("disabled", false);
            }
        });
        </script>
        <!-- OTRAS -->
        <script>
        $('#otrasRadio1').change(function() {
            if (this.checked) {
                $('#dis_6_input').prop("disabled", false);
            } else {
                $('#dis_6_input').prop("disabled", true);
            }
        });
        $('#otrasRadio2').change(function() {
            if (this.checked) {
                $('#dis_6_input').prop("disabled", true);
            } else {
                $('#dis_6_input').prop("disabled", false);
            }
        });

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
<?php 
} }
?>

</html>