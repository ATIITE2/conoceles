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
    $nombres_req=$_REQUEST['nombre'];
    $appp=$_REQUEST['appp'];
    $appm=$_REQUEST['appm'];
    $area_n = $_REQUEST['area'];
    $puesto_n=$_REQUEST['puesto'];
    $usr_nme=$_REQUEST['user_name_n'];
    $password=$_REQUEST['password_new'];
    $password_hash=hash("crc32",$password);

    $query="INSERT INTO `c_usuarios` (`user_name`,`password`,`status`,`id_rol`,`fecha_reg`) 
    VALUES ('".$usr_nme."','".$password_hash."','1','5',NOW());";
    mysqli_query($con, $query);
    $last_id = mysqli_insert_id($con);
    //echo $query;
    //echo $password;

    $query="INSERT INTO `c_verificadores` (`id_user`,`nombre`,`a_pate`,`a_mate`,`id_area`,`id_puesto`) 
    VALUES ('".$last_id."','".$nombres_req."','".$appp."','".$appm."','".$area_n."','".$puesto_n."');";
    mysqli_query($con, $query);
    //echo $query;
}
?>
<?php
if(isset($_REQUEST['new_pass'])){
    $nuevo_password=$_REQUEST['password_new'];
    $id_user_new_pass=$_REQUEST['id_user_new_pass'];
    $nuevo_password_hash =hash("crc32",$nuevo_password);

    $qry=" UPDATE `c_usuarios` SET `password`='".$nuevo_password_hash."' WHERE `id_user` = '".$id_user_new_pass."';";
    //echo "<br> $qry";
    mysqli_query($con,$qry); 

}

if(isset($_REQUEST['actualizar'])){
    $nombres_req_e=$_REQUEST['nombre_e'];
    $appp_e=$_REQUEST['appp_e'];
    $appm_e=$_REQUEST['appm_e'];
    $area_e = $_REQUEST['area_e'];
    $puesto_e=$_REQUEST['puesto_e'];
    
    $usr_nme_e=$_REQUEST['user_name_e'];
    $id_user_e = $_REQUEST['id_user_e'];

    $query="UPDATE `c_usuarios` SET `user_name` = '".$usr_nme_e."'
    WHERE `id_user` = ".$id_user_e.";";
    mysqli_query($con, $query);
    //echo $query;

    $query="UPDATE `c_verificadores` SET `nombre` = '".$nombres_req_e."',`a_pate` = '". $appp_e."',
    `a_mate` = '". $appm_e."',`id_area` = '".$area_e."',`id_puesto` = '".$puesto_e."' 
    WHERE `id_user` = ".$id_user_e.";";
    mysqli_query($con, $query);
    //echo $query;

}
if(isset($_REQUEST['edo1'])){
    $qry=" UPDATE `c_usuarios` SET `status`=2 WHERE `id_user` = '".$_REQUEST['edo1']."';";
    //echo "<br> $qry";
    mysqli_query($con,$qry); 
}
if(isset($_REQUEST['edo2'])){
    $qry=" UPDATE `c_usuarios` SET `status`=1 WHERE `id_user` = '".$_REQUEST['edo2']."';";
    //echo "<br> $qry";
    mysqli_query($con,$qry); 
}
if(isset($_REQUEST['edo3'])){
    $qry=" UPDATE `c_usuarios` SET `status`=3 WHERE `id_user` = '".$_REQUEST['edo3']."';";
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
                <?php
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
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Verificadores /</span>
                            Verificadores</h4>
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
                                Desactivación realizada con Exito! <?php echo $_REQUEST['edo1'];?>
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
                                Nuevo usuario creado con Exito!
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            <?php }
                            if(isset($_REQUEST['actualizar'])){
                            ?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                                Actualización de usuario realizada con Exito!
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            <?php } if(isset($_REQUEST['edo3'])){?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                Eliminación de usuario realizada con Exito!
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
                                                <big><big><strong>Verificadores</strong></big></big>&nbsp;
                                            </div>
                                            <div class="col-lg-2 text-center">
                                                <ul class="nav nav-pills">
                                                    <li class="nav-item">
                                                        <a href="crud_verificador.php" class="btn btn-outline-primary"
                                                            type="button"><i class="bx bx-plus me-1"></i>
                                                            <small>Agregar nuevo</small>
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
                                                                <th class="text-center">Nombre</th>
                                                                <th class="text-center">Area(Completo)</th>
                                                                <th class="text-center">Area(Corto)</th>
                                                                <th class="text-center">Estatus</th>
                                                                <th class="text-center">Opciones</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="table-border-bottom-0">
                                                            <?php
                                                            $query="SELECT * FROM `c_verificadores` WHERE `id_user` != '1'";
                                                            $resultados=mysqli_query($con, $query);
                                                            while($filas=mysqli_fetch_array($resultados)){
                                                                //echo  $filas['id_area'];
                                                                //echo $filas['id_user'];
                                                                
                                                                
                                                                $query="SELECT * FROM `c_usuarios` WHERE `id_user` = ".$filas['id_user']."";
                                                                $resultados_1=mysqli_query($con, $query);
                                                                $filas_1=mysqli_fetch_array($resultados_1);
                                                                //echo $filas_1['status'];
                                                                $estatus = $filas_1['status'];
                                                                $id_user_edit = $filas['id_user'];

                                                                $query="SELECT * FROM `cat_areas_ite` WHERE `id` = ".$filas['id_area']."";
                                                                $resultados_2=mysqli_query($con, $query);
                                                                $filas_2=mysqli_fetch_array($resultados_2);
                                                                //echo $filas_2['nom_cor'];
                                                            ?>
                                                            <tr>
                                                                <td><i class="fab fa-angular text-danger me-3"></i>
                                                                    <strong><?php echo $filas['nombre'];?>&nbsp;<?php echo $filas['a_pate'];?>&nbsp;<?php echo $filas['a_mate']; ?></strong>
                                                                </td>
                                                                <td><small><?php echo $filas_2['nom_com'] ?></small>
                                                                </td>
                                                                <td>
                                                                    <small><?php echo $filas_2['nom_cor'] ?></small>
                                                                </td>
                                                                <td class="text-center">
                                                                    <?php if($estatus==1){ ?>
                                                                    <a href="?edo1=<?=$filas['id_user']?>" type="button"
                                                                        title="Desactivar"
                                                                        class="btn btn-success btn-circle"><i
                                                                            class="bx bx-check"
                                                                            aria-hidden="true"></i></a>
                                                                    <?php }else if($estatus==2){ ?>
                                                                    <a href="?edo2=<?=$filas['id_user']?>" type="button"
                                                                        title="Activar"
                                                                        class="btn btn-warning bx bx-x btn-circle"></a>
                                                                    <?php } ?>

                                                                    <?php if($estatus == "1"){?>
                                                                    <span
                                                                        class="badge bg-label-success me-1">Activo</span>
                                                                    <?php } else if($estatus == "2"){?>
                                                                    <span
                                                                        class="badge bg-label-warning me-1">Inactivo</span>
                                                                    <?php } else if($estatus == "3"){?>
                                                                    <span
                                                                        class="badge bg-label-danger me-1">Eliminado</span>
                                                                    <?php }?>
                                                                </td>
                                                                <?php 
                                                                if($estatus!="3"){
                                                                ?>
                                                                <td>
                                                                    <div class="dropdown">
                                                                        <button type="button"
                                                                            class="btn p-0 dropdown-toggle hide-arrow"
                                                                            data-bs-toggle="dropdown">
                                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                                        </button>
                                                                        <div class="dropdown-menu">
                                                                            <form action="crud_verificador.php"
                                                                                method="POST">
                                                                                <?php echo '<input type="hidden" name="id_user_edit" value="'.$id_user_edit.'">';?>
                                                                                <input type="hidden" name="editar"
                                                                                    value="1">
                                                                                <button class="btn w-100"
                                                                                    type="submit"><i
                                                                                        class="bx bx-edit-alt me-1"></i>Editar</button>
                                                                            </form>
                                                                            <form action="password_edit_veri.php"
                                                                                method="POST">
                                                                                <?php echo '<input type="hidden" name="id_user_new_pass" value="'.$id_user_edit.'">';?>
                                                                                <input type="hidden" name="gen_new_pass"
                                                                                    value="1">
                                                                                <button class="btn w-100"
                                                                                    type="submit"><i
                                                                                        class="bx bx-edit-alt me-1"></i>Nueva
                                                                                    Contraseña</button>
                                                                            </form>
                                                                            <form action="?edo3=<?=$filas['id_user']?>"
                                                                                method="POST">
                                                                                <?php echo '<input type="hidden" name="eliminar" value="'.$id_user_edit.'">';?>
                                                                                <input type="hidden" name="eliminar"
                                                                                    value="1">
                                                                                <button class="btn w-100"
                                                                                    type="submit"><i
                                                                                        class="bx bx-trash me-1"></i>Eliminar</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <?php } ?>
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