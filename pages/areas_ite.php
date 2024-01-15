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

    <title>Verificadores - Conoceles</title>

    <meta name="description" content="" />

    <!--Datatable plugins CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" />

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
    $nombre_cor=$_REQUEST['nombrecor'];
    $nombre_com=$_REQUEST['nombrecom'];
    
    
    $query="INSERT INTO `cat_areas_ite` (`nom_cor`,`nom_com`,`status`,`fecha_reg`) 
    VALUES ('".$nombre_cor."','".$nombre_com."','1',NOW());";
    mysqli_query($con, $query);
    echo $query;
}
?>
<?php
if(isset($_REQUEST['actualizar'])){
    $nombre_cor=$_REQUEST['nombrecor'];
    $nombre_com=$_REQUEST['nombrecom'];
    
    
    $query="UPDATE `cat_areas_ite`SET `nom_cor`='".$nombre_cor."',`nom_com`='".$nombre_com."',`status`='1',`fecha_reg`= NOW() WHERE `id` = '".$_REQUEST['id_area']."';";
    mysqli_query($con,$query); 
    //echo $query;

}
if(isset($_REQUEST['edo1'])){
    $qry=" UPDATE `cat_areas_ite` SET `status`=2 WHERE `id` = '".$_REQUEST['edo1']."';";
    mysqli_query($con,$qry); 
    //echo "<br> $qry";
}
if(isset($_REQUEST['edo2'])){
    $qry=" UPDATE `cat_areas_ite` SET `status`=1 WHERE `id` = '".$_REQUEST['edo2']."';";
    //echo "<br> $qry";
    mysqli_query($con,$qry); 
}
if(isset($_REQUEST['edo3'])){
    $qry=" UPDATE `cat_areas_ite` SET `status`=3 WHERE `id` = '".$_REQUEST['edo3']."';";
    //echo "<br> $qry";
    mysqli_query($con,$qry); 
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
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Instituto Tlaxcalteca de
                                Elecciones /</span>
                            Areas</h4>
                        <div class="row">
                            <!-- MENSAJES DE ACCIONES -->
                            <?php if(isset($_REQUEST['new_pass'])){?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                                Cambio de contraseña realizado con Exito!
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                                <?php 
                                //echo $nuevo_password;
                                //echo $id_user_new_pass;
                                ?>
                            </div>
                            <?php } if(isset($_REQUEST['edo1'])){?>
                            <div class="alert alert-warning alert-dismissible" role="alert">
                                Desactivación realizada con Exito!
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            <?php } if(isset($_REQUEST['edo2'])){?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                                Activación realizada con Exito!
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            <?php } if(isset($_REQUEST['guardar'])){?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                                Nueva area creada con Exito!
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            <?php }
                            if(isset($_REQUEST['actualizar'])){
                            ?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                                Actualización de area realizada con Exito!
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            <?php } if(isset($_REQUEST['edo3'])){?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                Eliminación de area realizada con Exito!
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            <?php } ?>
                            <div class="col-lg-1 mb-3 order-0"></div>
                            <div class="col-lg-10 mb-6 order-0">
                                <div class="card h-100">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-lg-10">
                                                <big><big><strong>Áreas</strong></big></big>&nbsp;
                                            </div>
                                            <div class="col-lg-2 text-center">
                                                <ul class="nav nav-pills">
                                                    <li class="nav-item">
                                                        <a href="crud_areas_ite.php" class="btn btn-outline-primary"
                                                            type="button"><i class="bx bx-plus me-1"></i>
                                                            <small>Agregar nueva</small>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <hr style="border-top:1px dotted" />
                                    </div>
                                    <div class="card-body">
                                        <div class="justify-content-between align-items-center mb-3">
                                            <div class="card">
                                                <div class="table-responsive text-nowrap">
                                                    <table id="datatable" class="table">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center">Area(Completo)</th>
                                                                <th class="text-center">Area(Corto)</th>
                                                                <th class="text-center">Estatus</th>
                                                                <th class="text-center">Opciones</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="table-border-bottom-0">
                                                            <?php
                                                            $query="SELECT * FROM `cat_areas_ite` WHERE '1'";
                                                            $resultados=mysqli_query($con, $query);
                                                            while($filas=mysqli_fetch_array($resultados)){
                                                                //echo  $filas['id_area'];
                                                                //echo $filas['id_user'];
                                                                $status=$filas['status'];
                                                                $id_area=$filas['id'];
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $filas['nom_com'] ?></td>
                                                                <td>
                                                                    <?php echo $filas['nom_cor'] ?>
                                                                </td>
                                                                <td class="text-center">
                                                                    <?php if($status==1){ ?>
                                                                    <a href="?edo1=<?=$filas['id']?>" type="button"
                                                                        title="Desactivar"
                                                                        class="btn btn-success btn-circle"><i
                                                                            class="bx bx-check"
                                                                            aria-hidden="true"></i></a>
                                                                    <?php }else if($status==2){ ?>
                                                                    <a href="?edo2=<?=$filas['id']?>" type="button"
                                                                        title="Activar"
                                                                        class="btn btn-warning bx bx-x btn-circle"></a>
                                                                    <?php } ?>

                                                                    <?php if($status == "1"){?>
                                                                    <span
                                                                        class="badge bg-label-success me-1">Activo</span>
                                                                    <?php } else if($status == "2"){?>
                                                                    <span
                                                                        class="badge bg-label-warning me-1">Inactivo</span>
                                                                    <?php } else if($status == "3"){?>
                                                                    <span
                                                                        class="badge bg-label-danger me-1">Eliminado</span>
                                                                    <?php }?>
                                                                </td>

                                                                <td>
                                                                    <div class="dropdown">
                                                                        <button type="button"
                                                                            class="btn p-0 dropdown-toggle hide-arrow"
                                                                            data-bs-toggle="dropdown">
                                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                                        </button>
                                                                        <?php 
                                                                        if($status!="3"){
                                                                        ?>
                                                                        <div class="dropdown-menu">
                                                                            <form action="crud_areas_ite.php"
                                                                                method="POST">
                                                                                <?php echo '<input type="hidden" name="id_edit" value="'.$id_area.'">';?>
                                                                                <input type="hidden" name="editar"
                                                                                    value="1">
                                                                                <button class="btn w-100"
                                                                                    type="submit"><i
                                                                                        class="bx bx-edit-alt me-1"></i>Editar</button>
                                                                            </form>
                                                                            <form action="?edo3=<?=$filas['id']?>"
                                                                                method="POST">
                                                                                <?php echo '<input type="hidden" name="eliminar" value="'.$id_area.'">';?>
                                                                                <input type="hidden" name="eliminar"
                                                                                    value="1">
                                                                                <button class="btn w-100"
                                                                                    type="submit"><i
                                                                                        class="bx bx-trash me-1"></i>Eliminar</button>
                                                                            </form>
                                                                        </div>
                                                                        <?php } ?>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
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
    </div>
</body>

<!--jQuery library file -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js">
</script>

<!--Datatable plugin JS library file -->
<script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js">
</script>

<script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js">
</script>

<script>
/* Initialization of datatables */
new DataTable('#datatable');
</script>

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

</html>