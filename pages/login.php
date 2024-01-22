<!DOCTYPE html>

<?php
error_reporting(E_ALL);
ini_set('display_errors','Off');
session_start();
if(isset($_SESSION)){
    session_destroy();
}
?>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Login - Conoceles</title>

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
    <!-- Page -->
    <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
</head>

<body>
    <!-- Content -->

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="btn-alert-log">
                <?php if(isset($_REQUEST['e'])){ 
                            if($_REQUEST['e']==1){?>
                        <div class="btn-war-log bs-toast toast fade show bg-primary" role="alert" aria-live="assertive"
                            aria-atomic="true">
                            <div class="toast-header">
                                <i class="bx bx-error-circle me-2"></i>
                                <div class="me-auto fw-semibold">Error!</div>
                                <!-- <small>11 mins ago</small> -->
                                <button type="button" class="btn-close" data-bs-dismiss="toast"
                                    aria-label="Close"></button>
                            </div>
                            <div class="toast-body">
                                <big>Usuario Inexistente!</big><br>
                                Revisar la clave y cuenta de acceso.
                            </div>
                        </div>
                        <?php } else if($_REQUEST['e']==2){?>
                            <div class="btn-war-log bs-toast toast fade show bg-primary" role="alert" aria-live="assertive"
                            aria-atomic="true">
                            <div class="toast-header">
                                <i class="bx bx-error-circle me-2"></i>
                                <div class="me-auto fw-semibold">Error!</div>
                                <!-- <small>11 mins ago</small> -->
                                <button type="button" class="btn-close" data-bs-dismiss="toast"
                                    aria-label="Close"></button>
                            </div>
                            <div class="toast-body">
                                <big>Contraseña Incorrecta!</big><br>
                                Revisar la clave y cuenta de acceso.
                            </div>
                        </div>
                        <?php } else if($_REQUEST['e']==3){?>
                            <div class="btn-war-log bs-toast toast fade show bg-warning">
                            <div class="toast-header">
                                <i class="bx bx-info-circle me-2"></i>
                                <div class="me-auto fw-semibold"><strong>Aviso!</strong></div>
                                <!-- <small>11 mins ago</small> -->
                                <button type="button" class="btn-close" data-bs-dismiss="toast"
                                    aria-label="Close"></button>
                            </div>
                            <div class="toast-body">
                                <big>Cuenta Desactivada.</big><br>
                                La cuenta de usuario se encuentra desactivada.
                            </div>
                        </div>
                        <?php } else if($_REQUEST['e']==4){?>
                            <div class="btn-dan-log bs-toast toast fade show bg-danger">
                            <div class="toast-header">
                                <i class="bx bx-info-circle me-2"></i>
                                <div class="me-auto fw-semibold"><strong>Aviso!</strong></div>
                                <!-- <small>11 mins ago</small> -->
                                <button type="button" class="btn-close" data-bs-dismiss="toast"
                                    aria-label="Close"></button>
                            </div>
                            <div class="toast-body">
                                <big>Cuenta Eliminada.</big><br>
                                La cuenta de usuario se encuentra Eliminada.
                            </div>
                        </div>
                        <?php } }?>
                </div>
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div style="text-align: center;">
                            <!-- <a href="index.php" class="app-brand-link"> -->
                            <img src="../assets/img/logo/logo_5.png" width="350em">
                            
                            <!--<br><br> <h6 class="mb-2 text-center">SISTEMA DE CANDIDATAS Y CANDIDATOS</h6>
                            <h5><strong>"CONOCELES"</strong></h5> -->
                        </div>
                        <!-- /Logo -->
                        <p class="mb-4 text-center">Por favor ingresa tu cuenta.</p>

                        <form id="formAuthentication" class="mb-3" action="validar.php" method="POST">
                            <div class="mb-3">
                                <label for="usuario" class="form-label">Correo o Nombre de usuario</label>
                                <input type="text" class="form-control" id="usuario" name="usuario"
                                    placeholder="Ingresa tu nombre de usuario" autofocus />
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Contraseña</label>
                                    <a>
                                        <small>Olvide la contraseña</small>
                                    </a>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="contraseña" class="form-control" name="contraseña"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <!-- <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember-me" />
                                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                                </div>
                            </div> -->
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Ingresar</button>
                            </div>
                        </form>
                        


                        <!-- <p class="text-center">
                            <span>New on our platform?</span>
                            <a href="auth-register-basic.html">
                                <span>Create an account</span>
                            </a>
                        </p> -->
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>

    <!-- / Content -->
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

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>