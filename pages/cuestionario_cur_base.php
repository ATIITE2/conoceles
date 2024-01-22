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
                        <?php
                            $query="SELECT * FROM `c_usuarios` WHERE `user_name` = '$usuario'";
                            $resultados=mysqli_query($con, $query);
                            $filas=mysqli_fetch_array($resultados);
                            /* echo $query;
                            echo $filas["id_rol"]; */

                            $id_user = $_SESSION['id_user'];
                            $query="SELECT * FROM `c_candidatos` WHERE  `id_user` = '$id_user'";
                            $resultados=mysqli_query($con, $query);
                            $filas=mysqli_fetch_array($resultados);
                            $id_t_candidaturas = $filas['id_tipo_cand'];

                            if($id_t_candidaturas == 1){
                                $tabla = "c_cand_gob";
                            } elseif($id_t_candidaturas == 2){
                                $tabla = "c_cand_ayun";
                            }elseif($id_t_candidaturas == 3){
                                $tabla = "c_cand_com";
                            }elseif($id_t_candidaturas == 4){
                                $tabla = "c_cand_dip_mr";
                            }elseif($id_t_candidaturas == 5){
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
                        <div class="row">
                            <div class="col-xl-1"></div>
                            <div class="col-xl-10">
                                <!-- <h6 class="text-muted">Filled Pills</h6> -->
                                <div class="nav-align-top mb-4">
                                    <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
                                        <li class="nav-item">
                                            <button type="button" class="nav-link active" role="tab"
                                                data-bs-toggle="tab" data-bs-target="#navs-pills-justified-AI"
                                                aria-controls="navs-pills-justified-AI" aria-selected="true">
                                                <i class="tf-icons bx bx-camera"></i> FOTOGRAFIA
                                                <!-- <span
                                                    class="badge rounded-pill badge-center h-px-20 w-px-20 bg-danger">2</span> -->
                                            </button>
                                        </li>
                                        <li class="nav-item">
                                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                                data-bs-target="#navs-pills-justified-PD"
                                                aria-controls="navs-pills-justified-PD" aria-selected="false">
                                                <i class="tf-icons bx bx-network-chart"></i> MEDIOS DE CONTACTO
                                            </button>
                                        </li>
                                        <li class="nav-item">
                                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                                data-bs-target="#navs-pills-justified-PA"
                                                aria-controls="navs-pills-justified-PA" aria-selected="false">
                                                <i class="tf-icons bx bx-briefcase-alt"></i> HISTORIA PROFESIONAL
                                            </button>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <!-- FOTOGRAFIA -->
                                        <div class="tab-pane fade show active" id="navs-pills-justified-AI"
                                            role="tabpanel">
                                            <div class="row">
                                                <div class="col-lg-10"></div>
                                                <div class="col">
                                                    <div>
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-toggle="modal" data-bs-target="#modalToggle">
                                                            Información
                                                        </button>
                                                        <!-- Modal 1-->
                                                        <div class="modal fade" id="modalToggle"
                                                            aria-labelledby="modalToggleLabel" tabindex="-1"
                                                            style="display: none" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="modalToggleLabel">
                                                                            INFORMACION SOBRE LA CARGA DE FOTOGRAFIA
                                                                        </h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <strong>1</strong>: La fotografia no deberá
                                                                        tener una antigüedad
                                                                        mayor a 3 meses previos a su publicación.
                                                                        <br /><br />
                                                                        <strong
                                                                            class="card-title text-danger">PROHIBIDO</strong>
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
                                                </div>
                                            </div>
                                            <p>
                                                <strong>FOTOGRAFIA</strong>
                                            </p>
                                            <p class="mb-0">
                                            <div class="card-body">
                                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                    <img src="../assets/img/avatars/2.png" alt="user-avatar"
                                                        class="d-block rounded" height="200" width="230"
                                                        id="uploadedAvatar" />
                                                    <div class="button-wrapper">
                                                        <label for="upload" class="btn btn-primary me-2 mb-4"
                                                            tabindex="0">
                                                            <span class="d-none d-sm-block">Selecciona una
                                                                fotografia</span>
                                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                                            <input type="file" id="upload" class="account-file-input"
                                                                hidden accept="image/png, image/jpeg" />
                                                        </label>
                                                        <button type="button"
                                                            class="btn btn-outline-secondary account-image-reset mb-4">
                                                            <i class="bx bx-reset d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Elimina selección</span>
                                                        </button>

                                                        <p class="text-muted mb-0">Se permiten <strong>jpg</strong> o
                                                            <strong>jpeg</strong> tamaño maximo
                                                            <strong>700Kb</strong>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            </p>
                                        </div>
                                        <!-- MEDIOS DE CONTACTO -->
                                        <div class="tab-pane fade" id="navs-pills-justified-PD" role="tabpanel">
                                            <p>
                                                <!-- REDES SOCIALES -->
                                            <h3>REDES SOCIALES</h3><br>
                                            <div class="row">
                                                <div class="col-md-1">
                                                </div>
                                                <div class="col-md-10">
                                                    <p>
                                                        <strong><i class="fa fa-facebook-official"
                                                                aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FACEBOOK</strong>
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
                                                        <input name="dis_1_input" id="dis_1_input" type="text"
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
                                                        <input name="dis_2_input" id="dis_2_input" type="text"
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
                                                        <input name="dis_3_input" id="dis_3_input" type="text"
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
                                                        <input name="dis_4_input" id="dis_4_input" type="text"
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
                                                        <input name="dis_5_input" id="dis_5_input" type="text"
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
                                                            <input name="dis_6_input" id="dis_6_input"
                                                                class="form-control" type="text" disabled
                                                                placeholder="Escribe tu respuesta..." />
                                                        </div>
                                                    </div>
                                                    </p>
                                                    </p>
                                                </div>
                                            </div>
                                            <!-- PAGINA WEB -->
                                            <h3>PAGINA WEB</h3><br>
                                            <div class="row">
                                                <div class="col-md-1">
                                                </div>
                                                <div class="col-md-1">

                                                    <label><i class="bi bi-globe2" style="font-size: 25px;"></i></label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="input-group input-group-merge">
                                                        <input type="text" class="form-control" id="basic-url3"
                                                            aria-describedby="basic-addon34" />
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                </div>
                                            </div><br>
                                            <!-- CORREOS ELECTRONICOS -->
                                            <h3> CORREOS ELECTRONICOS </h3><br>
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
                                                            id="html5-email-input" />
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
                                                            id="html5-email-input" />
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
                                                            id="html5-email-input" />
                                                    </div>
                                                </div>
                                            </div><br>
                                            <!-- TELEFONOS DE CONTACTO -->
                                            <h3>TELEFONOS DE CONTACTO</h3><br>
                                            <div class="row">
                                                <div class="col-md-1">
                                                </div>
                                                <div class="col-md-1">

                                                    <label><i class="bi bi-telephone"
                                                            style="font-size: 25px;"></i></label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" id="basic-de fault-phone"
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
                                                    <input type="text" id="basic-de fault-phone"
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
                                                    <input type="text" id="basic-de fault-phone"
                                                        class="form-control phone-mask" placeholder="000 123 4567" />
                                                </div>
                                            </div>
                                            <br>

                                            <!-- DOMICILIOS DE CAMPAÑA -->
                                            <h3>DOMICILIOS DE CAMPAÑA</h3><br>
                                            <div class="row">
                                                <div class="col-md-1">
                                                </div>
                                                <div class="col-md-1">

                                                    <label><i class="bi bi-house" style="font-size: 25px;"></i></label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="input-group input-group-merge">
                                                        <textarea class="form-control"
                                                            aria-label="With textarea"></textarea>
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
                                                        <textarea class="form-control"
                                                            aria-label="With textarea"></textarea>
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
                                                        <textarea class="form-control"
                                                            aria-label="With textarea"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                        <!-- HISTORIA PROFESIONAL Y/O LABORAL -->
                                        <div class="tab-pane fade" id="navs-pills-justified-PA" role="tabpanel">
                                            <p>
                                                <!-- REDES SOCIALES -->
                                            <h4>HISTORIA PROFESIONAL Y/O LABORAL</h4><br>
                                            <div class="row">
                                                <div class="col-md-1">
                                                </div>
                                                <div class="col-md-10">
                                                    <div>
                                                        <label for="exampleFormControlTextarea1"
                                                            class="form-label fs-5">Grado Maximo de estudios y su
                                                            estatus</label>
                                                    </div>
                                                    <p>
                                                    <div class="input-group">
                                                        <label class="input-group-text"
                                                            for="inputGroupSelect01">Opciones</label>
                                                        <select class="form-select" id="inputGroupSelect01">
                                                            <option selected>Selecciona...</option>
                                                            <option value="1">Educación Basica</option>
                                                            <option value="2">Educación Media Superior</option>
                                                            <option value="3">Primaria</option>
                                                            <option value="4">Secundaria</option>
                                                            <option value="5">Técnica</option>
                                                            <option value="6">Preparatoria</option>
                                                            <option value="7">Licenciatura</option>
                                                            <option value="8">Especialidad</option>
                                                            <option value="9">Maestría</option>
                                                            <option value="10">Doctorado</option>
                                                            <option value="11">Ninguno</option>
                                                        </select>
                                                    </div>
                                                    </p>
                                                    <div class="input-group">
                                                        <span class="input-group-text"
                                                            id="basic-addon14">Estatus:</span>
                                                        <input name="estatus_e" id="estatus_e" type="text"
                                                            class="form-control" placeholder="Eje. Titulado"
                                                            aria-describedby="basic-addon14" />
                                                    </div>
                                                    <br><br><br>
                                                    <div>
                                                        <div>
                                                            <label for="exampleFormControlTextarea1"
                                                                class="form-label fs-5">Otra Formacion Academica</label>
                                                            <textarea class="form-control"
                                                                placeholder="Cursos, Diplomados, Seminarios, etc"
                                                                id="exampleFormControlTextarea1" rows="3"></textarea>
                                                        </div>
                                                        <p class="text-muted mb-0 fa-pull-right">
                                                            <small>Máximo <strong>250</strong> caracteres por cada
                                                                registro.</small>
                                                        </p>
                                                    </div>
                                                    <br><br><br>
                                                    <div>
                                                        <div>
                                                            <label for="exampleFormControlTextarea1"
                                                                class="form-label fs-5">Historia Profesional y/o
                                                                laboral</label>
                                                            <textarea class="form-control"
                                                                placeholder="Describa la experiencia, los años y las actividades realizadas en esta"
                                                                id="exampleFormControlTextarea1" rows="3"></textarea>
                                                        </div>
                                                        <p class="text-muted mb-0 fa-pull-right">
                                                            <small>Mínimo <strong>280</strong> y Máximo
                                                                <strong>5,000</strong> caracteres,
                                                                <strong>sin espacios en blanco</strong>
                                                            </small>
                                                        </p>
                                                    </div>
                                                    <br><br><br>
                                                    <div>
                                                        <div>
                                                            <label for="exampleFormControlTextarea1"
                                                                class="form-label fs-5">Trayectoria politica y/o
                                                                participación social en organizaciones ciudadanas o de
                                                                la sociedad civil</label>
                                                            <textarea class="form-control"
                                                                placeholder="Describa la trayectoria, los años y las actividades realizadas en esta"
                                                                id="exampleFormControlTextarea1" rows="3"></textarea>
                                                        </div>
                                                        <p class="text-muted mb-0 fa-pull-right">
                                                            <small>Mínimo <strong>280</strong> y Máximo
                                                                <strong>5,000</strong> caracteres,
                                                                <strong>sin espacios en blanco</strong>
                                                            </small>
                                                        </p>
                                                    </div>
                                                    <br><br><br>
                                                    <div>
                                                        <div>
                                                            <label for="exampleFormControlTextarea1"
                                                                class="form-label fs-5">¿Por qué quiere ocupar un cargo
                                                                público?</label>
                                                            <textarea class="form-control"
                                                                placeholder="Describa las motivaciones de ocupar un cargo publico"
                                                                id="exampleFormControlTextarea1" rows="3"></textarea>
                                                        </div>
                                                        <p class="text-muted mb-0 fa-pull-right">
                                                            <small>
                                                                Mínimo <strong>280</strong> y Máximo
                                                                <strong>5,000</strong> caracteres,
                                                                <strong>sin espacios en blanco</strong>
                                                            </small>
                                                        </p>
                                                    </div>
                                                    <br><br><br>
                                                    <div>
                                                        <div>
                                                            <label for="exampleFormControlTextarea1"
                                                                class="form-label fs-5">¿Cuales son las sus 2
                                                                principales
                                                                propuestas?</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text">Propuesta 1</span>
                                                                <textarea class="form-control"
                                                                    aria-label="With textarea"
                                                                    placeholder="Comment"></textarea>
                                                            </div>
                                                            <br>
                                                            <div class="input-group">
                                                                <span class="input-group-text">Propuesta 2</span>
                                                                <textarea class="form-control"
                                                                    aria-label="With textarea"
                                                                    placeholder="Comment"></textarea>
                                                            </div>
                                                        </div>
                                                        <p class="text-muted mb-0 fa-pull-right">
                                                            <small>
                                                                Mínimo <strong>280</strong> y Máximo
                                                                <strong>1,600</strong> caracteres,
                                                                <strong>sin espacios en blanco</strong>
                                                            </small>
                                                        </p>
                                                    </div>
                                                    <br><br><br>
                                                    <div>
                                                        <div>
                                                            <label for="exampleFormControlTextarea1"
                                                                class="form-label fs-5">Propuesta en materia de género
                                                                o, en
                                                                su caso, del grupo en situación de descriminación que
                                                                representa</label>
                                                            <textarea class="form-control"
                                                                placeholder="Describa la población, objetivos, metas y plazos, para su promoción como iniciativa de ley o politica pública"
                                                                id="exampleFormControlTextarea1" rows="3"></textarea>
                                                        </div>
                                                        <p class="text-muted mb-0 fa-pull-right">
                                                            <small>
                                                                Mínimo <strong>280</strong> y Máximo
                                                                <strong>1,600</strong> caracteres,
                                                                <strong>sin espacios en blanco</strong>
                                                            </small>
                                                        </p>
                                                    </div>
                                                    <br><br><br>
                                                    <div>
                                                        <div>
                                                            <label for="exampleFormControlTextarea1"
                                                                class="form-label fs-5">Propuesta en materia de género
                                                                o, en
                                                                su caso, del grupo en situación de descriminación que
                                                                representa</label>
                                                            <textarea class="form-control"
                                                                placeholder="Describa la población, objetivos, metas y plazos, para su promoción como iniciativa de ley o politica pública"
                                                                id="exampleFormControlTextarea1" rows="3"></textarea>
                                                        </div>
                                                        <p class="text-muted mb-0 fa-pull-right">
                                                            <small>
                                                                Mínimo <strong>280</strong> y Máximo
                                                                <strong>1,600</strong> caracteres,
                                                                <strong>sin espacios en blanco</strong>
                                                            </small>
                                                        </p>
                                                    </div>

                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Pills -->
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
    <?php 
    $query="SELECT * FROM `v_avisopriv` WHERE `id_user_cand` = '$id_user'";
    $resultados_1=mysqli_query($con, $query);
    $filas_1=mysqli_fetch_array($resultados_1);
    $filas_1['aviso_1'];
    $validacion_av1 = $filas_1['aviso_1'];
    if($validacion_av1 == 0){
        echo $validacion_av1;
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
    } else {
        echo $validacion_av1;  
    }
    /*echo $filas["id_rol"]; */
    ?>

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- FACEBOOK -->
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

</html>
<?php
}
//echo $usuario_ses;
?>