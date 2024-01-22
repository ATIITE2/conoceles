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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                                <div class="justify-content-between align-items-center mb-3">
                                <div class="card h-100">
                                    <div class="card-header">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-10">
                                                    <h5>Apartados de cuestionario curricular</h5>
                                                </div>
                                                <div class="col-lg-2">
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#modalToggle">
                                                        Información
                                                    </button>
                                                </div>
                                                <br><br>
                                                <hr style="border-top:1px dotted" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                                            <img src="../assets/img/avatars/2.png" alt="user-avatar"
                                                class="d-block rounded" height="200" width="230" id="uploadedAvatar" />
                                            <div class="button-wrapper">
                                                <form id="uploadForm" method="post" enctype="multipart/form-data">
                                                    <label for="file" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                        <span class="d-none d-sm-block">Selecciona una
                                                            fotografia</span>
                                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                                        <input type="file" id="file" name="file"
                                                             accept="image/*" onchange="validarImagen()" class="account-file-input" hidden />
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
                                                    <input type="submit" value="Subir archivo" id="submit"
                                                        name="submit">
                                                        <p id="mensajeError"></p>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="response"></div>
                                    <div class="card-footer">
                                        <hr style="border-top:1px dotted" />
                                        <div class="col-lg-2">
                                            <a href="cuestionario_cur.php" class="menu-link"><button
                                                    class="btn btn-outline-danger right d-grid w-30">
                                                    Volver</button></a>
                                        </div>
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
        <div class="modal fade" id="modalToggle" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none"
            aria-hidden="true">
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
        <script>
        function validarImagen() {
            var input = document.getElementById('file');
            var mensajeError = document.getElementById('mensajeError');
            var maxSize = 700 * 1024; // Tamaño máximo en bytes (700 KB)

            if (input.files.length > 0) {
                var fileSize = input.files[0].size;

                if (fileSize > maxSize) {
                    mensajeError.innerHTML = 'La imagen seleccionada supera el tamaño máximo permitido (700 KB).';
                    document.getElementById('submit').disabled = true; // Deshabilitar el botón de enviar
                } else {
                    mensajeError.innerHTML = '';
                    document.getElementById('submit').disabled = false; // Habilitar el botón de enviar
                }
            }
        }
        </script>

</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#uploadForm').on('submit', function(e) {
        e.preventDefault();
        var file = $('#file').prop('files')[0];
        var formData = new FormData();
        formData.append('file', file);
        $.ajax({
            url: 'componentes/upload.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                $('#response').html(data);
            }
        });
    });
});
</script>
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
<?php 
} }
?>

</html>