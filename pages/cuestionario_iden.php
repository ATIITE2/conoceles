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

    <title>Cuestionario Identidad - Conoceles</title>

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
            <!-- / Menu -->

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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Cuestionarios /</span>
                            Cuestionario de identidad</h4>

                        <?php   
                            $query="SELECT * FROM `c_usuarios` WHERE `user_name` = '$usuario'";
                            $resultados=mysqli_query($con, $query);
                            $filas=mysqli_fetch_array($resultados);
                            /* echo $query;*/
                            //echo $filas["id_user"]; 

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

                        <?php if(isset($_REQUEST['guardar'])){?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            Exito!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php 
                        }   
                            if(isset($_REQUEST['guardar'])){
                                $indigena_1 = $_REQUEST['indigena_1'];
                                $indigena_2 = $_REQUEST['indigena_2'];
                                $discapacidad_1 = $_REQUEST['discapacidad_1']; 
                                $discapacidad_2 = $_REQUEST['discapacidad_2'];
                                $discapacidad_3 = $_REQUEST['dis_1'];
                                if(!isset($_REQUEST['dis_1_input'])){
                                   $discapacidad_4 = "0";
                                }else{
                                    $discapacidad_4 = $_REQUEST['dis_1_input'];
                                }
                                $discapacidad_5 = $_REQUEST['dis_2'];
                                if(!isset($_REQUEST['dis_2_input'])){
                                    $discapacidad_6 = "0";
                                 }else{
                                     $discapacidad_6 = $_REQUEST['dis_2_input'];
                                 }
                                $afromex_1 = $_REQUEST['afromexicano_1'];
                                $lgbt_1 = $_REQUEST['lgbt_1'];
                                $lgbt_2 = $_REQUEST['divsex_1'];
                                if(!isset($_REQUEST['divsex_1_input'])){
                                    $lgbt_3 = "0";
                                 }else{
                                    $lgbt_3 = $_REQUEST['divsex_1_input'];
                                }
                                $migrante_1 = $_REQUEST['migrante_1'];
                                $migrante_2 = $_REQUEST['migrante_selector'];                         
                                if($_REQUEST['migrante_pais']==Null){
                                    $migrante_3 = "0";
                                 }else{
                                    $migrante_3 = $_REQUEST['migrante_pais'];
                                }
                                $migrante_4 = $_REQUEST['migrante_2'];
                                $migrante_5 = $_REQUEST['mig_1'];
                                if(!isset($_REQUEST['mig_1_input'])){
                                    $migrante_6 = "0";
                                 }else{
                                     $migrante_6 = $_REQUEST['mig_1_input'];
                                 }
                                $migrante_7 = $_REQUEST['migrante_3'];                 

                                /* echo "<br>";
                                echo $indigena_1;
                                echo $indigena_2;
                                echo "<br>";
                                echo $discapacidad_1;
                                echo $discapacidad_2;
                                echo $discapacidad_3;
                                echo $discapacidad_4;
                                echo $discapacidad_5;
                                echo $discapacidad_6;
                                echo "<br>";
                                echo $afromex_1;
                                echo "<br>";
                                echo $lgbt_1;
                                echo $lgbt_2;
                                echo $lgbt_3;
                                echo "<br>";
                                echo $migrante_1;
                                echo $migrante_2;
                                echo $migrante_3;
                                echo $migrante_4;
                                echo $migrante_5;
                                echo $migrante_6;
                                echo $migrante_7;
                                echo "<br>"; */
                                
                                $query="SELECT * FROM `cuest_identidad` WHERE `id_user_cand` = '$id_user' AND `status` = '3'";
                                $resultado=mysqli_query($con, $query);
                                $fila=mysqli_fetch_array($resultado);
                                //echo $query; 

                                $query="UPDATE `cuest_identidad` SET `indigena_p1`='".$indigena_1."',`indigena_p2`='".$indigena_2."',
                                `discapacidad_p1`='".$discapacidad_1."',`discapacidad_p2`='".$discapacidad_2."',`discapacidad_p3`='".$discapacidad_3."',
                                `discapacidad_p4`='".$discapacidad_4."',`discapacidad_p5`='".$discapacidad_5."',`discapacidad_p6`='".$discapacidad_6."',
                                `afromexicano_p1`='".$afromex_1."',`lgbt_p1`='".$lgbt_1."',`lgbt_p2`='".$lgbt_2."',
                                `lgbt_p3`='".$lgbt_3."',`migrante_p1`='".$migrante_1."',`migrante_p2`='".$migrante_2."',
                                `migrante_p3`='".$migrante_3."',`migrante_p4`='".$migrante_4."',`migrante_p5`='".$migrante_5."',
                                `migrante_p6`='".$migrante_6."',`migrante_p7`='".$migrante_7."',`fecha_reg`= NOW(), `status` = '3' WHERE `id_user_cand` = '".$id_user."';";
                                mysqli_query($con,$query); 
                                //echo $query;                           
                            } 
                            ?>
                        <?php 
                                $query="SELECT * FROM `cuest_identidad` WHERE  `id_user_cand` = '$id_user'";
                                $resultados_3=mysqli_query($con, $query);
                                $filas_3=mysqli_fetch_array($resultados_3);
                                $status_cuest = $filas_3['status'];
                            ?>

                        <?php if($status_cuest =='3'){ ?>
                        <div class="row">
                            <div class="col-xl-1"></div>
                            <div class="col-xl-10">
                                <?php 
                                    $rol = 3;
                                    if($rol == 3){
                                    $query="SELECT * FROM `cuest_identidad` WHERE `id_user_cand` = '$id_user'";
                                    $respuestas_cuestionarios_identidad=mysqli_query($con, $query);
                                    $respuestas=mysqli_fetch_array($respuestas_cuestionarios_identidad);
                                    //echo $query;
                                    /* INDIGENA */
                                    if($respuestas['indigena_p1']==1){
                                        $respuesta_ind_p1 = 'Si';
                                    } else if($respuestas['indigena_p1']==2){
                                        $respuesta_ind_p1 = 'No';
                                    } else if($respuestas['indigena_p1']==3){
                                        $respuesta_ind_p1 = 'Prefiero no responder';
                                    } 

                                    if($respuestas['indigena_p2']==1){
                                        $respuesta_ind_p2 = 'Si';
                                    } else if($respuestas['indigena_p2']==2){
                                        $respuesta_ind_p2 = 'No';
                                    } else if($respuestas['indigena_p2']==3){
                                        $respuesta_ind_p2 = 'Prefiero no responder';
                                    } 
                                    /* DISCAPACIDAD */
                                    if($respuestas['discapacidad_p1']==1){
                                        $respuesta_dis_p1 = 'Si';
                                    } else if($respuestas['discapacidad_p1']==2){
                                        $respuesta_dis_p1 = 'No';
                                    } else if($respuestas['discapacidad_p1']==3){
                                        $respuesta_dis_p1 = 'Prefiero no responder';
                                    } 

                                    if($respuestas['discapacidad_p2']==1){
                                        $respuesta_dis_p2 = 'Permanente';
                                    } else if($respuestas['discapacidad_p2']==2){
                                        $respuesta_dis_p2 = 'Temporal';
                                    } else if($respuestas['discapacidad_p2']==0){
                                        $respuesta_dis_p2 = 'No existe respuesta.';
                                    }

                                    if($respuestas['discapacidad_p3']==1){
                                        $respuesta_dis_p3 = 'Fisica';
                                    } else if($respuestas['discapacidad_p3']==2){
                                        $respuesta_dis_p3 = 'Sensorial';
                                    } else if($respuestas['discapacidad_p3']==3){
                                        $respuesta_dis_p3 = 'Mental';
                                    } else if($respuestas['discapacidad_p3']==4){
                                        $respuesta_dis_p3 = 'Intelectual';
                                    } else if($respuestas['discapacidad_p3']==5){
                                        $respuesta_dis_p3 = 'Otra';
                                    }else if($respuestas['discapacidad_p3']==6){
                                        $respuesta_dis_p3 = 'Prefiero no contestar';
                                    } else if($respuestas['discapacidad_p3']==0){
                                        $respuesta_dis_p3 = 'No existe respuesta.';
                                    }

                                    if($respuestas['discapacidad_p4']!= 0 ){
                                        $respuesta_dis_p4 = $respuestas['discapacidad_p4'];
                                    } else {
                                        $respuesta_dis_p4 = 'No existe respuesta.';
                                    }

                                    if($respuestas['discapacidad_p5']==1){
                                        $respuesta_dis_p5 = 'Caminar, subir y bajar escaleras con sus piernas';
                                    } else if($respuestas['discapacidad_p5']==2){
                                        $respuesta_dis_p5 = 'Mover o usar brazos y/o manos';
                                    } else if($respuestas['discapacidad_p5']==3){
                                        $respuesta_dis_p5 = 'Ver (aunque use lentes)';
                                    } else if($respuestas['discapacidad_p5']==4){
                                        $respuesta_dis_p5 = 'Hablar o comunicarse';
                                    } else if($respuestas['discapacidad_p5']==5){
                                        $respuesta_dis_p5 = 'Aprender, recordad y/o concentrarse';
                                    } else if($respuestas['discapacidad_p5']==6){
                                        $respuesta_dis_p5 = 'Interactuar emocional y/o Intelectualmente en un entorno
                                        social';
                                    } else if($respuestas['discapacidad_p5']==7){
                                        $respuesta_dis_p5 = 'Otra';
                                    } else if($respuestas['discapacidad_p5']==8){
                                        $respuesta_dis_p5 = 'Prefiero no contestar';
                                    } else if($respuestas['discapacidad_p5']==0){
                                        $respuesta_dis_p5 = 'No existe respuesta.';
                                    }


                                    if($respuestas['discapacidad_p6']!= 0 ){
                                        $respuesta_dis_p6 = $respuestas['discapacidad_p6'];
                                    } else {
                                        $respuesta_dis_p6 = 'No existe respuesta.';
                                    }
                                    
                                    /* AFROMEXICANO */
                                    if($respuestas['afromexicano_p1']==1){
                                        $respuesta_afr_p1 = 'Si';
                                    } else if($respuestas['afromexicano_p1']==2){
                                        $respuesta_afr_p1 = 'No';
                                    } else if($respuestas['afromexicano_p1']==3){
                                        $respuesta_afr_p1 = 'Prefiero no responder';
                                    } 
                                    /* LGBT */
                                    if($respuestas['lgbt_p1']==1){
                                        $respuesta_lgb_p1 = 'Si';
                                    } else if($respuestas['lgbt_p1']==2){
                                        $respuesta_lgb_p1 = 'No';
                                    } else if($respuestas['lgbt_p1']==3){
                                        $respuesta_lgb_p1 = 'Prefiero no responder';
                                    } 

                                    if($respuestas['lgbt_p2']==1){
                                        $respuesta_lgb_p2 = 'Hombre gay';
                                    } else if($respuestas['lgbt_p2']==2){
                                        $respuesta_lgb_p2 = 'Mujer lesbiana';
                                    } else if($respuestas['lgbt_p2']==3){
                                        $respuesta_lgb_p2 = 'Persona bisexual';
                                    } else if($respuestas['lgbt_p2']==4){
                                        $respuesta_lgb_p2 = 'Mujer trans';
                                    } else if($respuestas['lgbt_p2']==5){
                                        $respuesta_lgb_p2 = 'Hombre trans';
                                    } else if($respuestas['lgbt_p2']==6){
                                        $respuesta_lgb_p2 = 'Persona intersexual';
                                    } else if($respuestas['lgbt_p2']==7){
                                        $respuesta_lgb_p2 = 'Persona queer o de genero no binario';
                                    } else if($respuestas['lgbt_p2']==8){
                                        $respuesta_lgb_p2 = 'Otra';
                                    } else if($respuestas['lgbt_p2']==9){
                                        $respuesta_lgb_p2 = 'Prefiero no contestar';
                                    } else if($respuestas['lgbt_p2']==0){
                                        $respuesta_lgb_p2 = 'No existe respuesta.';
                                    }

                                    if($respuestas['lgbt_p3']!= 0 ){
                                        $respuesta_lgb_p3 = $respuestas['lgbt_p3'];
                                    } else {
                                        $respuesta_lgb_p3 = 'No existe respuesta.';
                                    }

                                    /* MIGRANTE */
                                    if($respuestas['migrante_p1']==1){
                                        $respuesta_mig_p1 = 'Si';
                                    } else if($respuestas['migrante_p1']==2){
                                        $respuesta_mig_p1 = 'No';
                                    } else if($respuestas['migrante_p1']==3){
                                        $respuesta_mig_p1 = 'Prefiero no responder';
                                    }

                                    if($respuestas['migrante_p2']!= 0 ){
                                        $respuesta_mig_p2_opc = $respuestas['migrante_p2'];
                                        $query="SELECT * FROM `cat_estados` WHERE `id_edo` = '$respuesta_mig_p2_opc'";;
                                        $respuestas_catalogo_edo=mysqli_query($con, $query);
                                        $edo_no=mysqli_fetch_array($respuestas_catalogo_edo); 
                                        $respuesta_mig_p2 = $edo_no['nombre'];
                                    } else {
                                        $respuesta_mig_p2 = 'No existe respuesta.';
                                    }

                                    
                                    if($respuestas['migrante_p3']!= 0 ){
                                        $respuesta_mig_p3 = $respuestas['migrante_p3'];
                                    } else {
                                        $respuesta_mig_p3 = 'No existe respuesta.';
                                    }
                                    
                                    if($respuestas['migrante_p4']==1){
                                        $respuesta_mig_p4 = 'De 0 a 5 años';
                                    } else if($respuestas['migrante_p4']==2){
                                        $respuesta_mig_p4 = 'De 6 a 15 años';
                                    } else if($respuestas['migrante_p4']==3){
                                        $respuesta_mig_p4 = 'Más de 15 años';
                                    } else if($respuestas['migrante_p4']==0){
                                        $respuesta_mig_p4 = 'No existe respuesta.';
                                    }

                                    if($respuestas['migrante_p5']==1){
                                        $respuesta_mig_p5 = 'Familia';
                                    } else if($respuestas['migrante_p5']==2){
                                        $respuesta_mig_p5 = 'Estudio';
                                    } else if($respuestas['migrante_p5']==3){
                                        $respuesta_mig_p5 = 'Trabajo';
                                    } else if($respuestas['migrante_p5']==4){
                                        $respuesta_mig_p5 = 'Otro';
                                    } else if($respuestas['migrante_p5']==5){
                                        $respuesta_mig_p5 = 'Prefiero no contestar';
                                    } else if($respuestas['migrante_p5']==0){
                                        $respuesta_mig_p5 = 'No existe respuesta.';
                                    }

                                    if($respuestas['migrante_p6']!= 0 ){
                                        $respuesta_mig_p6 = $respuestas['migrante_p6'];
                                    } else {
                                        $respuesta_mig_p6 = 'No existe respuesta.';
                                    }
                                    
                                    if($respuestas['migrante_p7']==1){
                                        $respuesta_mig_p7 = 'Si';
                                    } else if($respuestas['migrante_p7']==2){
                                        $respuesta_mig_p7 = 'No';
                                    } else if($respuestas['migrante_p7']==0){
                                        $respuesta_mig_p7 = 'No existe respuesta.';
                                    }

                                ?>
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-12">
                                                <h5>Respuestas al cuestionario de Identidad</h5>
                                                <hr style="border-top:1px dotted #ccc;" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="mb-3 col-md-12">
                                                <label for="firstName" class="form-label">¿Se identifica como una
                                                    persona Indígena o como parte de
                                                    algún
                                                    pueblo o comundad indígena? </label>
                                                <input class="form-control" disabled type="text" id="firstName"
                                                    name="firstName" value="<?php echo $respuesta_ind_p1?>" autofocus />
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="firstName" class="form-label"> ¿Habla y/o entiende
                                                    alguna lengua indígena nacional? </label>
                                                <input class="form-control" disabled type="text" id="firstName"
                                                    name="firstName" value="<?php echo $respuesta_ind_p2?>" autofocus />
                                            </div>
                                        </div>
                                        <hr style="border-top:1px dotted #ccc;" />
                                        <div class="row">
                                            <div class="mb-3 col-md-12">
                                                <label for="firstName" class="form-label">¿Tiene alguna
                                                    discapacidad?</label>
                                                <input class="form-control" disabled type="text" id="firstName"
                                                    name="firstName" value="<?php echo $respuesta_dis_p1?>" autofocus />
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="firstName" class="form-label"> En caso de haber respondido
                                                    afirmativamente la pregunta
                                                    anterior, el tipo de discapacidad con el que vive es:</label>
                                                <input class="form-control" disabled type="text" id="firstName"
                                                    name="firstName" value="<?php echo $respuesta_dis_p2?>" autofocus />
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="firstName" class="form-label">En caso afirmativo ¿De qué
                                                    tipo?</label>
                                                <input class="form-control" disabled type="text" id="firstName"
                                                    name="firstName" value="<?php echo $respuesta_dis_p3?>" autofocus />
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="firstName" class="form-label"> La opción seleccionada fue
                                                    "Otra", favor de especificar
                                                    cual:</label>
                                                <input class="form-control" disabled type="text" id="firstName"
                                                    name="firstName" value="<?php echo $respuesta_dis_p4?>" autofocus />
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="firstName" class="form-label">Su discapacidad le dificulta o
                                                    impide: </label>
                                                <input class="form-control" disabled type="text" id="firstName"
                                                    name="firstName" value="<?php echo $respuesta_dis_p5?>" autofocus />
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="firstName" class="form-label"> La opción seleccionada fue
                                                    "Otra", favor de especificar
                                                    cual:</label>
                                                <input class="form-control" disabled type="text" id="firstName"
                                                    name="firstName" value="<?php echo $respuesta_dis_p6?>" autofocus />
                                            </div>
                                        </div>
                                        <hr style="border-top:1px dotted #ccc;" />
                                        <div class="row">
                                            <div class="mb-3 col-md-12">
                                                <label for="firstName" class="form-label">¿Se considera como una persona
                                                    afromexicana o que forma
                                                    parte de
                                                    alguna comunidad afrodecendiente?</label>
                                                <input class="form-control" disabled type="text" id="firstName"
                                                    name="firstName" value="<?php echo $respuesta_afr_p1 ?>"
                                                    autofocus />
                                            </div>
                                        </div>
                                        <hr style="border-top:1px dotted #ccc;" />
                                        <div class="row">
                                            <div class="mb-3 col-md-12">
                                                <label for="firstName" class="form-label">¿Es usted una persona de la
                                                    población LGBTTTIQ+ (Lesbiana,
                                                    Gay,
                                                    Bisexual, Transgenero, Travesti, Transexual, Intersexual, Queer
                                                    u
                                                    otra)?</label>
                                                <input class="form-control" disabled type="text" id="firstName"
                                                    name="firstName" value="<?php echo $respuesta_lgb_p1?>" autofocus />
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="firstName" class="form-label"> En caso de haber respondido
                                                    afirmativamente a la pregunta
                                                    anterior, usted se identifica como:</label>
                                                <input class="form-control" disabled type="text" id="firstName"
                                                    name="firstName" value="<?php echo $respuesta_lgb_p2?>" autofocus />
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="firstName" class="form-label">La opción seleccionada fue
                                                    "Otra", favor de especificar
                                                    cual:</label>
                                                <input class="form-control" disabled type="text" id="firstName"
                                                    name="firstName" value="<?php echo $respuesta_lgb_p3?>" autofocus />
                                            </div>
                                        </div>
                                        <hr style="border-top:1px dotted #ccc;" />
                                        <div class="row">
                                            <div class="mb-3 col-md-12">
                                                <label for="firstName" class="form-label">¿Es usted migrante?</label>
                                                <input class="form-control" disabled type="text" id="firstName"
                                                    name="firstName" value="<?php echo $respuesta_mig_p1?>" autofocus />
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="firstName" class="form-label"> Entidad federativa de
                                                    nacimiento:</label>
                                                <input class="form-control" disabled type="text" id="firstName"
                                                    name="firstName" value="<?php echo $respuesta_mig_p2?>" autofocus />
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="firstName" class="form-label">¿En qué país reside?</label>
                                                <input class="form-control" disabled type="text" id="firstName"
                                                    name="firstName" value="<?php echo $respuesta_mig_p3?>" autofocus />
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="firstName" class="form-label">¿Cuanto tiempo ha vivido en el
                                                    extranjero?</label>
                                                <input class="form-control" disabled type="text" id="firstName"
                                                    name="firstName" value="<?php echo $respuesta_mig_p4?>" autofocus />
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="firstName" class="form-label"> ¿Cual fue el motivo de la
                                                    residencia en el extranjero?</label>
                                                <input class="form-control" disabled type="text" id="firstName"
                                                    name="firstName" value="<?php echo $respuesta_mig_p5?>" autofocus />
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="firstName" class="form-label">La opción seleccionada fue
                                                    "Otro", favor de especificar
                                                    cual:</label>
                                                <input class="form-control" disabled type="text" id="firstName"
                                                    name="firstName" value="<?php echo $respuesta_mig_p6?>" autofocus />
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="firstName" class="form-label">¿Cuando emigró se encontraba
                                                    con una situación regular de
                                                    trabajo o con un lugar asegurado en alguna institución educativa
                                                    del
                                                    país extranjero?</label>
                                                <input class="form-control" disabled type="text" id="firstName"
                                                    name="firstName" value="<?php echo $respuesta_mig_p7?>" autofocus />
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
                                    <!-- /Account -->
                                </div>
                                <?php }?>
                            </div>
                        </div>
                        <?php } else if($status_cuest =='4'){ ?>
                        <div class="row">
                            <div class="col-xl-1"></div>
                            <div class="col-xl-10">
                                <div class="card">
                                    <div class="card-header"></div>
                                    <form action="cuestionario_iden.php" method="POST">
                                        <div class="card-body">
                                            <form action="cuestionario_iden.php" method="POST">
                                                <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
                                                    <li class="nav-item">
                                                        <button type="button" class="nav-link active" role="tab"
                                                            data-bs-toggle="tab"
                                                            data-bs-target="#navs-pills-justified-AI"
                                                            aria-controls="navs-pills-justified-AI"
                                                            aria-selected="true">
                                                            <i class="tf-icons bx bx-user"></i> Autoadscripción indigena
                                                        </button>
                                                    </li>
                                                    <li class="nav-item">
                                                        <button type="button" class="nav-link" role="tab"
                                                            data-bs-toggle="tab"
                                                            data-bs-target="#navs-pills-justified-PD"
                                                            aria-controls="navs-pills-justified-PD"
                                                            aria-selected="false">
                                                            <i class="tf-icons bx bx-handicap"></i> Población con
                                                            discapacidad
                                                        </button>
                                                    </li>
                                                    <li class="nav-item">
                                                        <button type="button" class="nav-link" role="tab"
                                                            data-bs-toggle="tab"
                                                            data-bs-target="#navs-pills-justified-PA"
                                                            aria-controls="navs-pills-justified-PA"
                                                            aria-selected="false">
                                                            <i class="tf-icons bx bx-user"></i> Población Afromexicana
                                                        </button>
                                                    </li>
                                                    <li class="nav-item">
                                                        <button type="button" class="nav-link" role="tab"
                                                            data-bs-toggle="tab"
                                                            data-bs-target="#navs-pills-justified-DS"
                                                            aria-controls="navs-pills-justified-DS"
                                                            aria-selected="false">
                                                            <i class="tf-icons bx bx-female-sign"></i><i
                                                                class="tf-icons bx bx-male-sign"></i> Diversidad Sexual
                                                        </button>
                                                    </li>
                                                    <li class="nav-item">
                                                        <button type="button" class="nav-link" role="tab"
                                                            data-bs-toggle="tab"
                                                            data-bs-target="#navs-pills-justified-PM"
                                                            aria-controls="navs-pills-justified-PM"
                                                            aria-selected="false">
                                                            <i class="tf-icons bx bx-flag"></i> Persona Mexicana
                                                            Migrante
                                                        </button>
                                                    </li>
                                                </ul>
                                                <div class="tab-content">
                                                    <!-- AUTOADSCRIPCION INDIGENA -->
                                                    <div class="tab-pane fade show active" id="navs-pills-justified-AI"
                                                        role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-lg-10"></div>
                                                            <div class="col">
                                                                <div>
                                                                    <button type="button" class="btn btn-primary"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#modalToggle">
                                                                        Información
                                                                    </button>
                                                                    <!-- Modal 1-->
                                                                    <div class="modal fade" id="modalToggle"
                                                                        aria-labelledby="modalToggleLabel" tabindex="-1"
                                                                        style="display: none" aria-hidden="true">
                                                                        <div class="modal-dialog modal-dialog-centered">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title"
                                                                                        id="modalToggleLabel">
                                                                                        Autoadscripción Indigena
                                                                                    </h5>
                                                                                    <button type="button"
                                                                                        class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <strong>Autoadscripción
                                                                                        indígena</strong>:
                                                                                    De la
                                                                                    interpretación
                                                                                    sistemática de los artículos 2º,
                                                                                    párrafo
                                                                                    quinto
                                                                                    de la Constitución
                                                                                    Política de los Estados Unidos
                                                                                    Mexicanos;{"
                                                                                    "}
                                                                                    <a target="_blank"
                                                                                        href="https://www.te.gob.mx/IUSEapp/tesisjur.aspx?idtesis=12/2013&tpoBusqueda=S&sWord=12/2013">
                                                                                        1, apartado 2 del Convenio
                                                                                        número
                                                                                        169 de
                                                                                        la
                                                                                        Organización
                                                                                        Internacional del Trabajo sobre
                                                                                        Pueblos
                                                                                        Indígenas y Tribales en
                                                                                        Países Independientes; 3, 4, 9 y
                                                                                        32
                                                                                        de
                                                                                        la
                                                                                        Declaración de las
                                                                                        Naciones Unidas sobre los
                                                                                        Derechos
                                                                                        de
                                                                                        los
                                                                                        Pueblos Indígenas
                                                                                    </a>
                                                                                    , se desprende que las comunidades
                                                                                    indígenas
                                                                                    tienen el derecho
                                                                                    individual y colectivo a mantener y
                                                                                    desarrollar
                                                                                    sus propias
                                                                                    características e identidades, así
                                                                                    como
                                                                                    a
                                                                                    reconocer a sus
                                                                                    integrantes como indígenas y a ser
                                                                                    reconocidas
                                                                                    como tales. Por
                                                                                    tanto, el hecho de que una persona o
                                                                                    grupo
                                                                                    de
                                                                                    personas se
                                                                                    identifiquen y autoadscriban con el
                                                                                    carácter
                                                                                    de
                                                                                    indígenas, es
                                                                                    suficiente para considerar que
                                                                                    existe un
                                                                                    vínculo
                                                                                    cultural,
                                                                                    histórico, político, lingüístico o
                                                                                    de
                                                                                    otra
                                                                                    índole con su comunidad y
                                                                                    que, por tanto, deben regirse por
                                                                                    las
                                                                                    normas
                                                                                    especiales que las
                                                                                    regulan. Por ello, la
                                                                                    autoadscripción
                                                                                    constituye
                                                                                    el criterio que
                                                                                    permite reconocer la identidad
                                                                                    indígena
                                                                                    de
                                                                                    los
                                                                                    integrantes de las
                                                                                    comunidades y así gozar de los
                                                                                    derechos
                                                                                    que
                                                                                    de
                                                                                    esa pertenencia se
                                                                                    derivan. (Jurisprudencia 12/2013)
                                                                                    <br />
                                                                                    <a target="_blank"
                                                                                        href="https://www.te.gob.mx/IUSEapp/tesisjur.aspx?idtesis=12/2013&tpoBusqueda=S&sWord=12/2013">
                                                                                        https://www.te.gob.mx/IUSEapp/tesisjur.aspx?idtesis=12/2013&tpoBusqueda=S&sWord=12/2013
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p>
                                                            <strong>¿Se identifica como una persona Indígena o como
                                                                parte de
                                                                algún
                                                                pueblo o comundad indígena? <text
                                                                    style="color:#ff0000; font-size:1.2vw;">*</text></strong>
                                                        </p>
                                                        <p class="mb-0">
                                                        <div class="col-md">
                                                            <!-- /VALOR DEFAULT -->
                                                            <input name="indigena_1" class="form-check-input"
                                                                type="hidden" value="0" />
                                                            <!-- VALOR DEFAULT/ -->
                                                            <div class="form-check mt-3">
                                                                <input name="indigena_1" class="form-check-input"
                                                                    type="radio" value="1" id="indigena_p1_1"
                                                                    required />
                                                                <label class="form-check-label" for="defaultCheck2"> Si
                                                                </label>
                                                            </div>
                                                            <div class="form-check mt-3">
                                                                <input name="indigena_1" class="form-check-input"
                                                                    type="radio" value="2" id="indigena_p1_3" />
                                                                <label class="form-check-label" for="defaultCheck2"> No
                                                                </label>
                                                            </div>
                                                            <div class="form-check mt-3">
                                                                <input name="indigena_1" class="form-check-input"
                                                                    type="radio" value="3" id="indigena_p1_3" />
                                                                <label class="form-check-label" for="defaultCheck2">
                                                                    Prefiero no
                                                                    contestar </label>
                                                            </div>
                                                        </div>
                                                        </p>
                                                        <p>
                                                            <strong> ¿Habla y/o entiende alguna lengua indígena
                                                                nacional?
                                                                <text
                                                                    style="color:#ff0000; font-size:1.2vw;">*</text></strong>
                                                        </p>
                                                        <p class="mb-0">
                                                        <div class="col-md">
                                                            <!-- /VALOR DEFAULT -->
                                                            <input name="indigena_2" class="form-check-input"
                                                                type="hidden" value="0" />
                                                            <!-- VALOR DEFAULT/ -->
                                                            <div class="form-check mt-3">
                                                                <input name="indigena_2" class="form-check-input"
                                                                    type="radio" value="1" id="indigena_p2_1"
                                                                    required />
                                                                <label class="form-check-label" for="defaultCheck2"> Si
                                                                </label>
                                                            </div>
                                                            <div class="form-check mt-3">
                                                                <input name="indigena_2" class="form-check-input"
                                                                    type="radio" value="2" id="indigena_p2_2" />
                                                                <label class="form-check-label" for="defaultCheck2"> No
                                                                </label>
                                                            </div>
                                                            <div class="form-check mt-3">
                                                                <input name="indigena_2" class="form-check-input"
                                                                    type="radio" value="3" id="indigena_p2_3" />
                                                                <label class="form-check-label" for="defaultCheck2">
                                                                    Prefiero no
                                                                    contestar </label>
                                                            </div>
                                                        </div>
                                                        </p>
                                                    </div>
                                                    <!-- POBLACION DISCAPACIDAD -->
                                                    <div class="tab-pane fade" id="navs-pills-justified-PD"
                                                        role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-lg-10"></div>
                                                            <div class="col">
                                                                <div>
                                                                    <button type="button" class="btn btn-primary"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#modalToggle2">
                                                                        Información
                                                                    </button>

                                                                    <!-- Modal 1-->
                                                                    <div class="modal fade" id="modalToggle2"
                                                                        aria-labelledby="modalToggleLabel" tabindex="-1"
                                                                        style="display: none" aria-hidden="true">
                                                                        <div class="modal-dialog modal-dialog-centered">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title"
                                                                                        id="modalToggleLabel">
                                                                                        Definición Discapacidad</h5>
                                                                                    <button type="button"
                                                                                        class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <strong>Discapacidad</strong>: Es la
                                                                                    consecuencia de la presencia de
                                                                                    una deficiencia o limitación en una
                                                                                    persona,
                                                                                    que
                                                                                    al interactuar con
                                                                                    las barreras que le impone el
                                                                                    entorno
                                                                                    social,
                                                                                    pueda impedir su
                                                                                    inclusión plena y efectiva en la
                                                                                    sociedad,
                                                                                    en
                                                                                    igualdad de
                                                                                    condiciones con los demás.
                                                                                    <br />
                                                                                    <br /> <strong>Fuente</strong>: Ley
                                                                                    General
                                                                                    para
                                                                                    la Inclusión de las
                                                                                    Personas con Discapacidad.
                                                                                    Disponible
                                                                                    en:
                                                                                    <br />
                                                                                    <a target="_blank"
                                                                                        href="https://www.diputados.gob.mx/LeyesBiblio/pdf/LGIPD.pdf">
                                                                                        https://www.diputados.gob.mx/LeyesBiblio/pdf/LGIPD.pdf
                                                                                    </a>
                                                                                    <br />
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button class="btn btn-primary"
                                                                                        data-bs-target="#modalToggle21"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-dismiss="modal">
                                                                                        <strong>Tipos de
                                                                                            Discapacidad</strong>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- Modal 2-->
                                                                    <div class="modal fade" id="modalToggle21"
                                                                        aria-hidden="true"
                                                                        aria-labelledby="modalToggleLabel2"
                                                                        tabindex="-1">
                                                                        <div class="modal-dialog modal-dialog-centered">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title"
                                                                                        id="modalToggleLabel2">
                                                                                        <strong>Tipos de
                                                                                            Discapacidad</strong>
                                                                                    </h5>
                                                                                    <button type="button"
                                                                                        class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <strong>Discapacidad
                                                                                        Física.</strong> Es
                                                                                    la
                                                                                    secuela o malformación
                                                                                    que deriva de una afección en el
                                                                                    sistema
                                                                                    neuromuscular a nivel
                                                                                    central o periférico, dando como
                                                                                    resultado
                                                                                    alteraciones en el
                                                                                    control del movimiento y la postura,
                                                                                    y
                                                                                    que
                                                                                    al
                                                                                    interactuar con las
                                                                                    barreras que le impone el entorno
                                                                                    social,
                                                                                    pueda
                                                                                    impedir su inclusión
                                                                                    plena y efectiva en la sociedad, en
                                                                                    igualdad
                                                                                    de
                                                                                    condiciones con los
                                                                                    demás.
                                                                                    <br />
                                                                                    <strong>Discapacidad
                                                                                        Sensorial.</strong>
                                                                                    Es
                                                                                    la
                                                                                    deficiencia
                                                                                    estructural o funcional de los
                                                                                    órganos
                                                                                    de la
                                                                                    visión, audición,
                                                                                    tacto, olfato y gusto, así como de
                                                                                    las
                                                                                    estructuras y funciones
                                                                                    asociadas a cada uno de ellos, y que
                                                                                    al
                                                                                    interactuar con las barreras
                                                                                    que le impone el entorno social,
                                                                                    pueda
                                                                                    impedir
                                                                                    su inclusión plena y
                                                                                    efectiva en la sociedad, en igualdad
                                                                                    de
                                                                                    condiciones con los demás.
                                                                                    <br />
                                                                                    <strong>Discapacidad
                                                                                        Intelectual.</strong>
                                                                                    Se
                                                                                    caracteriza por
                                                                                    limitaciones significativas tanto en
                                                                                    la
                                                                                    estructura del pensamiento
                                                                                    razonado, como en la conducta
                                                                                    adaptativa
                                                                                    de
                                                                                    la
                                                                                    persona, y que al
                                                                                    interactuar con las barreras que le
                                                                                    impone
                                                                                    el
                                                                                    entorno social, pueda
                                                                                    impedir su inclusión plena y
                                                                                    efectiva en
                                                                                    la
                                                                                    sociedad, en igualdad de
                                                                                    condiciones con los demás.
                                                                                    <br />
                                                                                    <strong>Discapacidad
                                                                                        Mental.</strong> Es
                                                                                    la
                                                                                    alteración o deficiencia
                                                                                    en el sistema neuronal de una
                                                                                    persona,
                                                                                    que
                                                                                    aunado a una sucesión de
                                                                                    hechos que no puede manejar, detona
                                                                                    un
                                                                                    cambio en
                                                                                    su comportamiento
                                                                                    que dificulta su pleno desarrollo y
                                                                                    convivencia
                                                                                    social, y que al
                                                                                    interactuar con las barreras que le
                                                                                    impone
                                                                                    el
                                                                                    entorno social, pueda
                                                                                    impedir su inclusión plena y
                                                                                    efectiva en
                                                                                    la
                                                                                    sociedad, en igualdad de
                                                                                    condiciones con los demás.
                                                                                    <br />
                                                                                    <br />
                                                                                    <strong>Fuente</strong>:
                                                                                    <br /> Ley General para la Inclusión
                                                                                    de
                                                                                    las
                                                                                    Personas con
                                                                                    Discapacidad.
                                                                                    <br /> Disponible en:
                                                                                    <br />
                                                                                    <a target="_blank"
                                                                                        href="https://www.diputados.gob.mx/LeyesBiblio/pdf/LGIPD.pdf">
                                                                                        https://www.diputados.gob.mx/LeyesBiblio/pdf/LGIPD.pdf
                                                                                    </a>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button class="btn btn-primary"
                                                                                        data-bs-target="#modalToggle2"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-dismiss="modal">
                                                                                        <strong>Definición
                                                                                            Discapacidad</strong>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <p>
                                                            <strong>¿Tiene alguna discapacidad?
                                                                <text
                                                                    style="color:#ff0000; font-size:1.2vw;">*</text></strong>
                                                        </p>
                                                        <p class="mb-0">
                                                        <div class="col-md">
                                                            <!-- /VALOR DEFAULT -->
                                                            <input name="discapacidad_1" class="form-check-input"
                                                                type="hidden" value="0" />
                                                            <!-- VALOR DEFAULT/ -->
                                                            <div class="form-check mt-3">
                                                                <input name="discapacidad_1" class="form-check-input"
                                                                    type="radio" value="1" id="discapacidad_p1_1"
                                                                    required />
                                                                <label class="form-check-label" for="defaultCheck2"> Si
                                                                </label>
                                                            </div>
                                                            <div class="form-check mt-3">
                                                                <input name="discapacidad_1" class="form-check-input"
                                                                    type="radio" value="2" id="discapacidad_p1_2" />
                                                                <label class="form-check-label" for="defaultCheck2"> No
                                                                </label>
                                                            </div>
                                                            <div class="form-check mt-3">
                                                                <input name="discapacidad_1" class="form-check-input"
                                                                    type="radio" value="3" id="discapacidad_p1_3" />
                                                                <label class="form-check-label" for="defaultCheck2">
                                                                    Prefiero no
                                                                    contestar </label>
                                                            </div>
                                                        </div>
                                                        </p>
                                                        <p>
                                                            <strong> En caso de haber respondido afirmativamente la
                                                                pregunta
                                                                anterior, el tipo de discapacidad con el que vive es:
                                                            </strong>
                                                        </p>
                                                        <p class="mb-0">
                                                        <div class="col-md">
                                                            <!-- /VALOR DEFAULT -->
                                                            <input name="discapacidad_2" class="form-check-input"
                                                                type="hidden" value="0" />
                                                            <!-- VALOR DEFAULT/ -->
                                                            <div class="form-check mt-3">
                                                                <input name="discapacidad_2" class="form-check-input"
                                                                    type="radio" value="1" id="discapacidad_p2_1" />
                                                                <label class="form-check-label" for="defaultCheck2">
                                                                    Permanente
                                                                </label>
                                                            </div>
                                                            <div class="form-check mt-3">
                                                                <input name="discapacidad_2" class="form-check-input"
                                                                    type="radio" value="2" id="discapacidad_p2_2" />
                                                                <label class="form-check-label" for="defaultCheck2">
                                                                    Temporal
                                                                </label>
                                                            </div>
                                                        </div>
                                                        </p>

                                                        <p>
                                                            <strong> En caso afirmativo ¿De qué tipo? </strong>
                                                        </p>
                                                        <p class="mb-0">
                                                        <div class="col-md">
                                                            <select class="form-select" name="dis_1" id="dis_1">
                                                                <option value="0" selected="true" hidden>
                                                                    Selecciona una opción
                                                                </option>
                                                                <option value="1">Fisica</option>
                                                                <option value="2">Sensorial</option>
                                                                <option value="3">Mental</option>
                                                                <option value="4">Intelectual</option>
                                                                <option value="5">Otra</option>
                                                                <option value="6">Prefiero no contestar</option>
                                                            </select>
                                                        </div>
                                                        </p>

                                                        <p>
                                                            <small> La opción seleccionada fue "Otra", favor de
                                                                especificar
                                                                cual:
                                                            </small>
                                                        </p>
                                                        <p class="mb-0">
                                                        <div class="col-md-10">
                                                            <div class="mb-1">

                                                                <input name="dis_1_input" id="dis_1_input"
                                                                    class="form-control" type="text" disabled
                                                                    placeholder="Escribe tu respuesta..." />
                                                            </div>
                                                        </div>
                                                        </p>
                                                        <p>
                                                            <strong> Su discapacidad le dificulta o impide: </strong>
                                                        </p>
                                                        <p class="mb-0">
                                                        <div class="col-md">
                                                            <select class="form-select" name="dis_2" id="dis_2">
                                                                <option value="0" selected="true" hidden>
                                                                    Selecciona una opción
                                                                </option>
                                                                <option value="1">
                                                                    Caminar, subir y bajar escaleras con sus piernas
                                                                </option>
                                                                <option value="2">Mover o usar brazos y/o manos</option>
                                                                <option value="3">Ver (aunque use lentes)</option>
                                                                <option value="4">Hablar o comunicarse</option>
                                                                <option value="5">Aprender, recordad y/o concentrarse
                                                                </option>
                                                                <option value="6">
                                                                    Interactuar emocional y/o Intelectualmente en un
                                                                    entorno
                                                                    social
                                                                </option>
                                                                <option value="7">Otra</option>
                                                                <option value="8">Prefiero no contestar</option>
                                                            </select>
                                                        </div>
                                                        </p>
                                                        <p>
                                                            <small> La opción seleccionada fue "Otra", favor de
                                                                especificar
                                                                cual:
                                                            </small>
                                                        </p>
                                                        <p class="mb-0">
                                                        <div class="col-md-10">
                                                            <div class="mb-1">
                                                                <input name="dis_2_input" id="dis_2_input"
                                                                    class="form-control" type="text" disabled
                                                                    placeholder="Escribe tu respuesta..." />
                                                            </div>
                                                        </div>
                                                        </p>
                                                    </div>
                                                    <!-- POBLACION AFROMEXICANA -->
                                                    <div class="tab-pane fade" id="navs-pills-justified-PA"
                                                        role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-lg-10"></div>
                                                            <div class="col">
                                                                <div>
                                                                    <button type="button" class="btn btn-primary"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#modalToggle3">
                                                                        Información
                                                                    </button>

                                                                    <!-- Modal 1-->
                                                                    <div class="modal fade" id="modalToggle3"
                                                                        aria-labelledby="modalToggleLabel" tabindex="-1"
                                                                        style="display: none" aria-hidden="true">
                                                                        <div class="modal-dialog modal-dialog-centered">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title"
                                                                                        id="modalToggleLabel">
                                                                                        Población Afromexicana
                                                                                    </h5>
                                                                                    <button type="button"
                                                                                        class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    La Constitución Política de los
                                                                                    Estados
                                                                                    Unidos
                                                                                    Mexicanos reconoce en
                                                                                    su Artículo 2. Apartado C., a los
                                                                                    pueblos y
                                                                                    comunidades
                                                                                    afromexicanas, cualquiera que sea su
                                                                                    autodenominación, como parte de
                                                                                    la composición pluricultural de la
                                                                                    Nación.
                                                                                    (Artículo reformado DOF
                                                                                    14-08-2001)
                                                                                    <br />
                                                                                    <a target="_blank"
                                                                                        href="http://www.diputados.gob.mx/LeyesBiblio/pdf_mov/Constitucion_Politica.pdf">
                                                                                        <small>http://www.diputados.gob.mx/LeyesBiblio/pdf_mov/Constitucion_Politica.pdf</small>
                                                                                    </a>
                                                                                    <br />
                                                                                    <br />
                                                                                    <strong>La población
                                                                                        afromexicana</strong>
                                                                                    desciende de personas
                                                                                    africanas y que tienen nacionalidad
                                                                                    mexicana.
                                                                                    <br />
                                                                                    <br />
                                                                                    <strong>Fuente</strong>: Encuesta
                                                                                    Intercensal
                                                                                    2015. Instituto
                                                                                    Nacional de Estadística y Geografía
                                                                                    (INEGI).
                                                                                    Disponible en:
                                                                                    <br />
                                                                                    <a target="_blank"
                                                                                        href=" https://www.inegi.org.mx/app/glosario/default.html?p=eic2015">
                                                                                        https://www.inegi.org.mx/app/glosario/default.html?p=eic2015
                                                                                    </a>
                                                                                    <br />
                                                                                    De acuerdo con la Encuesta
                                                                                    Intercensal
                                                                                    de
                                                                                    2015,
                                                                                    cuando por primera
                                                                                    vez se incorporó una pregunta en
                                                                                    torno a
                                                                                    la
                                                                                    identificación de la
                                                                                    población afrodescendiente en
                                                                                    México,
                                                                                    casi
                                                                                    1.4
                                                                                    millones de personas
                                                                                    (1.16% del total de la población) se
                                                                                    autoidentifican como
                                                                                    afromexicanas. De ellas, 705 mil son
                                                                                    mujeres
                                                                                    y
                                                                                    677 mil son hombres.
                                                                                    Cabe notar que casi 600 mil
                                                                                    habitantes
                                                                                    más
                                                                                    (0.5%
                                                                                    del total de
                                                                                    mexicanos) consideran ser
                                                                                    afrodescendientes
                                                                                    “en
                                                                                    parte” (INEGI
                                                                                    2015).”
                                                                                    <br />
                                                                                    <a target="_blank"
                                                                                        href="http://www.conapred.org.mx/userfiles/files/FichaTematicaAfrodescendientes%20%281%29.pdf">
                                                                                        <small>http://www.conapred.org.mx/userfiles/files/FichaTematicaAfrodescendientes.pdf</small>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <p>
                                                            <strong>¿Se considera como una persona afromexicana o que
                                                                forma
                                                                parte de
                                                                alguna comunidad afrodecendiente? <text
                                                                    style="color:#ff0000; font-size:1.2vw;">*</text></strong>
                                                        </p>
                                                        <p class="mb-0">
                                                        <div class="col-md">
                                                            <!-- /VALOR DEFAULT -->
                                                            <input name="afromexicano_1" class="form-check-input"
                                                                type="hidden" value="0" />
                                                            <!-- VALOR DEFAULT/ -->
                                                            <div class="form-check mt-3">
                                                                <input name="afromexicano_1" class="form-check-input"
                                                                    type="radio" value="1" id="afromexicano_p1_1"
                                                                    required />
                                                                <label class="form-check-label" for="defaultCheck2"> Si
                                                                </label>
                                                            </div>
                                                            <div class="form-check mt-3">
                                                                <input name="afromexicano_1" class="form-check-input"
                                                                    type="radio" value="2" id="afromexicano_p1_2" />
                                                                <label class="form-check-label" for="defaultCheck2"> No
                                                                </label>
                                                            </div>
                                                            <div class="form-check mt-3">
                                                                <input name="afromexicano_1" class="form-check-input"
                                                                    type="radio" value="3" id="afromexicano_p1_3" />
                                                                <label class="form-check-label" for="defaultCheck2">
                                                                    Prefiero no
                                                                    contestar </label>
                                                            </div>
                                                        </div>
                                                        </p>

                                                    </div>
                                                    <!-- POBLACION DIVERSIDAD SEXUAL -->
                                                    <div class="tab-pane fade" id="navs-pills-justified-DS"
                                                        role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-lg-10"></div>
                                                            <div class="col">
                                                                <div>
                                                                    <button type="button" class="btn btn-primary"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#modalToggle4">
                                                                        Información
                                                                    </button>

                                                                    <!-- Modal 1-->
                                                                    <div class="modal fade" id="modalToggle4"
                                                                        aria-labelledby="modalToggleLabel" tabindex="-1"
                                                                        style="display: none" aria-hidden="true">
                                                                        <div class="modal-dialog modal-dialog-centered">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title"
                                                                                        id="modalToggleLabel">
                                                                                        Diversidad Sexual
                                                                                    </h5>
                                                                                    <button type="button"
                                                                                        class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <strong>Gay:</strong> Hombre que se
                                                                                    siente
                                                                                    atraído erótico
                                                                                    afectivamente hacia otro hombre. Es
                                                                                    una
                                                                                    expresión alternativa a
                                                                                    “homosexual” (de origen médico).
                                                                                    Algunos
                                                                                    hombres
                                                                                    y mujeres,
                                                                                    homosexuales o lesbianas, prefieren
                                                                                    el
                                                                                    término
                                                                                    gay, por su contenido
                                                                                    político y uso popular
                                                                                    <br />
                                                                                    <strong>Lesbiana:</strong> Mujer que
                                                                                    se
                                                                                    siente
                                                                                    atraída erótica y
                                                                                    afectivamente por mujeres. Es una
                                                                                    expresión
                                                                                    alternativa a la
                                                                                    “homosexual”, que puede ser
                                                                                    utilizada
                                                                                    por
                                                                                    las
                                                                                    mujeres para enunciar
                                                                                    o reivindicar su orientación sexual.
                                                                                    <br />
                                                                                    <strong>Bisexualidad:</strong>
                                                                                    Capacidad
                                                                                    de
                                                                                    una
                                                                                    persona de sentir
                                                                                    una atracción erótica afectiva por
                                                                                    personas
                                                                                    de
                                                                                    un género diferente
                                                                                    al suyo y de su mismo género, así
                                                                                    como
                                                                                    la
                                                                                    capacidad de mantener
                                                                                    relaciones íntimas y sexuales con
                                                                                    ellas.
                                                                                    Esto no
                                                                                    implica que sea con
                                                                                    la misma intensidad, al mismo
                                                                                    tiempo, de
                                                                                    la
                                                                                    misma forma, ni que
                                                                                    sienta atracción por todas las
                                                                                    personas
                                                                                    de
                                                                                    su
                                                                                    mismo género o del
                                                                                    otro.
                                                                                    <br />
                                                                                    <strong>Intersexualidad:</strong>
                                                                                    Todas
                                                                                    aquellas
                                                                                    situaciones en las
                                                                                    que la anatomía o fisiología sexual
                                                                                    de
                                                                                    una
                                                                                    persona no se ajusta
                                                                                    completamente a los estándares
                                                                                    definidos
                                                                                    para
                                                                                    los dos sexos que
                                                                                    culturalmente han sido asignados
                                                                                    como
                                                                                    masculinos
                                                                                    y femeninos.
                                                                                    Existen diferentes estados y
                                                                                    variaciones
                                                                                    de
                                                                                    intersexualidad. Es un
                                                                                    término genérico, en lugar de una
                                                                                    sola
                                                                                    categoría. De esta manera,
                                                                                    las características sexuales innatas
                                                                                    en
                                                                                    las
                                                                                    personas con variaciones
                                                                                    intersexuales podrían corresponder
                                                                                    en
                                                                                    diferente
                                                                                    grado a ambos sexos.
                                                                                    La intersexualidad no siempre es
                                                                                    inmediatamente
                                                                                    evidente al momento
                                                                                    de nacer, algunas variaciones lo son
                                                                                    hasta
                                                                                    la
                                                                                    pubertad o la
                                                                                    adolescencia y otras no se pueden
                                                                                    conocer
                                                                                    sin
                                                                                    exámenes médicos
                                                                                    adicionales, pero pueden
                                                                                    manifestarse en
                                                                                    la
                                                                                    anatomía sexual primaria
                                                                                    o secundaria que es visible.
                                                                                    <br />
                                                                                    <strong>Trans:</strong> Término
                                                                                    paraguas
                                                                                    utilizado para describir
                                                                                    diferentes variantes de
                                                                                    transgresión/transición/reafirmación
                                                                                    de
                                                                                    la
                                                                                    identidad y/o expresiones de
                                                                                    género48
                                                                                    (incluyendo personas
                                                                                    transexuales, transgénero,
                                                                                    travestis,
                                                                                    drags,
                                                                                    entre otras), cuyo
                                                                                    denominador común es que el sexo
                                                                                    asignado al
                                                                                    nacer no concuerda con
                                                                                    la identidad y/o expresiones de
                                                                                    género
                                                                                    de la
                                                                                    persona. Las personas
                                                                                    trans construyen su identidad de
                                                                                    género
                                                                                    independientemente de
                                                                                    intervenciones quirúrgicas o
                                                                                    tratamientos
                                                                                    médicos. Sin embargo,
                                                                                    estas intervenciones pueden ser
                                                                                    necesarias
                                                                                    para
                                                                                    la construcción de
                                                                                    la identidad de género de las
                                                                                    personas
                                                                                    trans
                                                                                    y
                                                                                    de su bienestar.
                                                                                    <br />
                                                                                    <strong>Queer:</strong> Las personas
                                                                                    queer,
                                                                                    o
                                                                                    quienes no se
                                                                                    identifican con el binarismo de
                                                                                    género,
                                                                                    son
                                                                                    aquellas que además de
                                                                                    no identificarse y rechazar el
                                                                                    género
                                                                                    socialmente asignado a su sexo
                                                                                    de nacimiento, tampoco se
                                                                                    identifican
                                                                                    con el
                                                                                    otro género o con
                                                                                    alguno en particular.
                                                                                    <br />
                                                                                    <br />
                                                                                    <strong>Fuente:</strong>:
                                                                                    <br /> Consejo Nacional para
                                                                                    Prevenir la
                                                                                    Discriminación (CONAPRED)
                                                                                    (2016). Glosario de la Diversidad
                                                                                    Sexual, de
                                                                                    género y
                                                                                    características sexuales.
                                                                                    <br /> Disponible en:
                                                                                    <br />
                                                                                    <a target="_blank"
                                                                                        href="https://www.gob.mx/cms/uploads/attachment/file/225271/glosario-TDSyG.pdf">
                                                                                        https://www.gob.mx/cms/uploads/attachment/file/225271/glosario-TDSyG.pdf
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p>
                                                            <strong>¿Es usted una persona de la población LGBTTTIQ+
                                                                (Lesbiana,
                                                                Gay,
                                                                Bisexual, Transgenero, Travesti, Transexual,
                                                                Intersexual,
                                                                Queer
                                                                u
                                                                otra)? <text
                                                                    style="color:#ff0000; font-size:1.2vw;">*</text></strong>
                                                        </p>
                                                        <p class="mb-0">
                                                        <div class="col-md">
                                                            <!-- /VALOR DEFAULT -->
                                                            <input name="lgbt_1" class="form-check-input" type="hidden"
                                                                value="0" />
                                                            <!-- VALOR DEFAULT/ -->
                                                            <div class="form-check mt-3">
                                                                <input name="lgbt_1" class="form-check-input"
                                                                    type="radio" value="1" id="lgbt_p1_1" required />
                                                                <label class="form-check-label" for="defaultCheck2"> Si
                                                                </label>
                                                            </div>
                                                            <div class="form-check mt-3">
                                                                <input name="lgbt_1" class="form-check-input"
                                                                    type="radio" value="2" id="lgbt_p1_2" />
                                                                <label class="form-check-label" for="defaultCheck2"> No
                                                                </label>
                                                            </div>
                                                            <div class="form-check mt-3">
                                                                <input name="lgbt_1" class="form-check-input"
                                                                    type="radio" value="3" id="lgbt_p1_3" />
                                                                <label class="form-check-label" for="defaultCheck2">
                                                                    Prefiero no
                                                                    contestar </label>
                                                            </div>
                                                        </div>
                                                        </p>
                                                        <p>
                                                            <strong> En caso de haber respondido afirmativamente a la
                                                                pregunta
                                                                anterior, usted se identifica como: </strong>
                                                        </p>
                                                        <p class="mb-0">
                                                        <div class="col-md">

                                                            <select class="form-select" name="divsex_1" id="divsex_1">
                                                                <option value="0" selected="true" hidden>
                                                                    Selecciona una opción
                                                                </option>
                                                                <option value="1">Hombre gay</option>
                                                                <option value="2">Mujer lesbiana</option>
                                                                <option value="3">Persona bisexual</option>
                                                                <option value="4">Mujer trans</option>
                                                                <option value="5">Hombre trans</option>
                                                                <option value="6">Persona intersexual</option>
                                                                <option value="7">
                                                                    Persona queer o de género no binario
                                                                </option>
                                                                <option value="8">Otra</option>
                                                                <option value="9">Prefiero no contestar</option>
                                                            </select>


                                                        </div>
                                                        </p>
                                                        <p>
                                                            <small> La opción seleccionada fue "Otra", favor de
                                                                especificar
                                                                cual:
                                                            </small>
                                                        </p>
                                                        <p class="mb-0">
                                                        <div class="col-md-10">
                                                            <div class="mb-1">
                                                                <input name="divsex_1_input" id="divsex_1_input"
                                                                    class="form-control" type="text" disabled
                                                                    placeholder="Escribe tu respuesta..." />
                                                            </div>
                                                        </div>
                                                        </p>
                                                    </div>
                                                    <!-- POBLACION MIGRANTE -->
                                                    <div class="tab-pane fade" id="navs-pills-justified-PM"
                                                        role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-lg-10"></div>
                                                            <div class="col">
                                                                <div>
                                                                    <button type="button" class="btn btn-primary"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#modalToggle5">
                                                                        Información
                                                                    </button>
                                                                    <!-- Modal 1-->
                                                                    <div class="modal fade" id="modalToggle5"
                                                                        aria-labelledby="modalToggleLabel" tabindex="-1"
                                                                        style="display: none" aria-hidden="true">
                                                                        <div class="modal-dialog modal-dialog-centered">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title"
                                                                                        id="modalToggleLabel">
                                                                                        Población Mexicana Migrante
                                                                                    </h5>
                                                                                    <button type="button"
                                                                                        class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <strong>Migrante:</strong> Término
                                                                                    genérico
                                                                                    no
                                                                                    definido en el
                                                                                    derecho internacional que, por uso
                                                                                    común,
                                                                                    designa a toda persona que
                                                                                    se traslada fuera de su lugar de
                                                                                    residencia
                                                                                    habitual, ya sea dentro
                                                                                    de un país o a través de una
                                                                                    frontera
                                                                                    internacional, de manera
                                                                                    temporal o permanente, y por
                                                                                    diversas
                                                                                    razones.
                                                                                    Este término
                                                                                    comprende una serie de categorías
                                                                                    jurídicas
                                                                                    bien
                                                                                    definidas de
                                                                                    personas, como los trabajadores
                                                                                    migrantes;
                                                                                    las
                                                                                    personas cuya forma
                                                                                    particular de traslado está
                                                                                    jurídicamente
                                                                                    definida, como los
                                                                                    migrantes objeto de tráfico; así
                                                                                    como
                                                                                    las
                                                                                    personas cuya situación o
                                                                                    medio de traslado no estén
                                                                                    expresamente
                                                                                    definidos en el derecho
                                                                                    internacional, como los estudiantes
                                                                                    internacionales.
                                                                                    <br />
                                                                                    <br /> <strong>Fuente</strong>:
                                                                                    Definición
                                                                                    propuesta con base en el
                                                                                    concepto de migrante establecido por
                                                                                    la
                                                                                    OIM.
                                                                                    <br />
                                                                                    <a target="_blank"
                                                                                        href="https://www.iom.int/es/definicion-de-la-oim-del-termino-migrante">
                                                                                        https://www.iom.int/es/definicion-de-la-oim-del-termino-migrante
                                                                                    </a>
                                                                                    <br />
                                                                                    <br />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p>
                                                            <strong>¿Es usted migrante? <text
                                                                    style="color:#ff0000; font-size:1.2vw;">*</text></strong>
                                                        </p>
                                                        <p class="mb-0">
                                                        <div class="col-md">
                                                            <!-- /VALOR DEFAULT -->
                                                            <input name="migrante_1" class="form-check-input"
                                                                type="hidden" value="0" />
                                                            <!-- VALOR DEFAULT/ -->
                                                            <div class="form-check mt-3">
                                                                <input name="migrante_1" class="form-check-input"
                                                                    type="radio" value="1" id="migrante_p1_1"
                                                                    required />
                                                                <label class="form-check-label" for="defaultCheck2"> Si
                                                                </label>
                                                            </div>
                                                            <div class="form-check mt-3">
                                                                <input name="migrante_1" class="form-check-input"
                                                                    type="radio" value="2" id="migrante_p1_2" />
                                                                <label class="form-check-label" for="defaultCheck2"> No
                                                                </label>
                                                            </div>
                                                            <div class="form-check mt-3">
                                                                <input name="migrante_1" class="form-check-input"
                                                                    type="radio" value="3" id="migrante_p1_3" />
                                                                <label class="form-check-label" for="defaultCheck2">
                                                                    Prefiero no
                                                                    contestar </label>
                                                            </div>
                                                        </div>
                                                        </p>
                                                        <p>
                                                            <strong> Entidad federativa de nacimiento: </strong>
                                                        </p>
                                                        <p class="mb-0">
                                                        <div class="col-md">
                                                            <select name="migrante_selector" id="migrante_selector"
                                                                class="form-select">
                                                                <option value="0" selected="true" hidden>
                                                                    Selecciona una opción
                                                                </option>
                                                                <option value="1">Aguascalientes</option>
                                                                <option value="2">Baja California</option>
                                                                <option value="3">
                                                                    Baja California Sur
                                                                </option>
                                                                <option value="4">Campeche</option>
                                                                <option value="5">Chiapas</option>
                                                                <option value="6">Chihuahua</option>
                                                                <option value="7">Ciudad de México</option>
                                                                <option value="8">Coahuila</option>
                                                                <option value="9">Colima</option>
                                                                <option value="10">Durango</option>
                                                                <option value="11">Estado de México</option>
                                                                <option value="12">Guanajuato</option>
                                                                <option value="13">Guerrero</option>
                                                                <option value="14">Hidalgo</option>
                                                                <option value="15">Jalisco</option>
                                                                <option value="16">Michoacán</option>
                                                                <option value="17">Morelos</option>
                                                                <option value="18">Nayarit</option>
                                                                <option value="19">Nuevo León</option>
                                                                <option value="20">Oaxaca</option>
                                                                <option value="21">Puebla</option>
                                                                <option value="22">Querétaro</option>
                                                                <option value="23">Quintana Roo</option>
                                                                <option value="24">San Luis Potosí</option>
                                                                <option value="25">Sinaloa</option>
                                                                <option value="26">Sonora</option>
                                                                <option value="27">Tabasco</option>
                                                                <option value="28">Tamaulipas</option>
                                                                <option value="29">Tlaxcala</option>
                                                                <option value="30">Veracruz</option>
                                                                <option value="31">Yucatán</option>
                                                                <option value="32">Zacatecas</option>
                                                            </select>
                                                        </div>
                                                        </p>
                                                        <p>
                                                            <strong> ¿En qué país reside? </strong>
                                                        </p>
                                                        <p class="mb-0">
                                                        <div class="col-md-10">
                                                            <div class="mb-1">
                                                                <input name="migrante_pais" id="migrante_pais"
                                                                    class="form-control" type="text"
                                                                    placeholder="Escribe tu respuesta..." />
                                                            </div>
                                                        </div>
                                                        </p>
                                                        <p>
                                                            <strong> ¿Cuanto tiempo ha vivido en el extranjero?
                                                            </strong>
                                                        </p>
                                                        <p class="mb-0">
                                                        <div class="col-md">
                                                            <!-- /VALOR DEFAULT -->
                                                            <input name="migrante_2" class="form-check-input"
                                                                type="hidden" value="0" />
                                                            <!-- VALOR DEFAULT/ -->
                                                            <div class="form-check mt-3">
                                                                <input name="migrante_2" class="form-check-input"
                                                                    type="radio" value="1" id="migrante_p2_1" />
                                                                <label class="form-check-label" for="defaultCheck2"> De
                                                                    0 a
                                                                    5
                                                                    años </label>
                                                            </div>
                                                            <div class="form-check mt-3">
                                                                <input name="migrante_2" class="form-check-input"
                                                                    type="radio" value="2" id="migrante_p2_2" />
                                                                <label class="form-check-label" for="defaultCheck2"> De
                                                                    6 a
                                                                    15
                                                                    años </label>
                                                            </div>
                                                            <div class="form-check mt-3">
                                                                <input name="migrante_2" class="form-check-input"
                                                                    type="radio" value="3" id="migrante_p2_3" />
                                                                <label class="form-check-label" for="defaultCheck2"> Más
                                                                    de
                                                                    15
                                                                    años</label>
                                                            </div>
                                                        </div>
                                                        </p>
                                                        <p>
                                                            <strong> ¿Cual fue el motivo de la residencia en el
                                                                extranjero?
                                                            </strong>
                                                        </p>
                                                        <p class="mb-0">
                                                        <div class="col-md">
                                                            <select class="form-select" name="mig_1" id="mig_1">
                                                                <option value="0" selected="true" hidden>
                                                                    Selecciona una opción
                                                                </option>
                                                                <option value="1">Familiar</option>
                                                                <option value="2">Estudio</option>
                                                                <option value="3">Trabajo</option>
                                                                <option value="4">Otro</option>
                                                                <option value="5">Prefiero no contestar</option>
                                                            </select>
                                                        </div>
                                                        </p>
                                                        <p>
                                                            <small> La opción seleccionada fue "Otro", favor de
                                                                especificar
                                                                cual:
                                                            </small>
                                                        </p>
                                                        <p class="mb-0">
                                                        <div class="col-md-10">
                                                            <div class="mb-1">
                                                                <input name="mig_1_input" id="mig_1_input"
                                                                    class="form-control" type="text" disabled
                                                                    placeholder="Escribe tu respuesta..." />
                                                            </div>
                                                        </div>
                                                        </p>
                                                        <p>
                                                            <strong> ¿Cuando emigró se encontraba con una situación
                                                                regular
                                                                de
                                                                trabajo o con un lugar asegurado en alguna institución
                                                                educativa
                                                                del
                                                                país extranjero? </strong>
                                                        </p>
                                                        <p class="mb-0">
                                                        <div class="col-md">
                                                            <!-- /VALOR DEFAULT -->
                                                            <input name="migrante_3" class="form-check-input"
                                                                type="hidden" value="0" />
                                                            <!-- VALOR DEFAULT/ -->
                                                            <div class="form-check mt-3">
                                                                <input name="migrante_3" class="form-check-input"
                                                                    type="radio" value="1" id="migrante_p3_1" />
                                                                <label class="form-check-label"
                                                                    for="defaultCheck2">Si</label>
                                                            </div>
                                                            <div class="form-check mt-3">
                                                                <input name="migrante_3" class="form-check-input"
                                                                    type="radio" value="2" id="migrante_p3_2" />
                                                                <label class="form-check-label" for="defaultCheck2"> No
                                                                </label>
                                                            </div>
                                                        </div>
                                                        </p>
                                                    </div>
                                                </div>


                                        </div>
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-lg-10"></div>
                                                <div class="col-lg-2">
                                                    <input type="hidden" name="guardar" value="1">
                                                    <button class="btn btn-outline-primary right d-grid w-100"
                                                        type="submit">Guardar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="card-footer">
                                        <hr style="border-top:1px dotted" />
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <a href="index.php" class="menu-link"><button
                                                        class="btn btn-outline-danger right d-grid w-30">
                                                        Volver</button></a>
                                            </div>
                                            <div class="col-lg-8">
                                            <div class="text-center">
                                                <button id="refresh" class="btn btn-outline-warning btn-lg center w-30">
                                                    Borrar selecciones / Volver a comenzar</button>
                                            </div>
                                        </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                        <?php } ?>
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
            $filas_1['aviso_2'];
            $validacion_av1 = $filas_1['aviso_2'];
            if($validacion_av1 == 0){
                //echo $validacion_av1;
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
                //echo $validacion_av1;  
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

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- DISCAPACIDAD -->
    <script>
    let refresh = document.getElementById('refresh');
    refresh.addEventListener('click', _ => {
        location.reload();
    })
    </script>
    <script>
    $(document).ready(function() {
        $('#dis_1').change(function(e) {
            if ($(this).val() === "5") {
                $('#dis_1_input').prop("disabled", false);
            } else {
                $('#dis_1_input').prop("disabled", true);
            }
        })
    });
    $(document).ready(function() {
        $('#dis_2').change(function(e) {
            if ($(this).val() === "7") {
                $('#dis_2_input').prop("disabled", false);
            } else {
                $('#dis_2_input').prop("disabled", true);
            }
        })
    });
    </script>
    <!-- DIVERSIDAD SEXUAL -->
    <script>
    $(document).ready(function() {
        $('#divsex_1').change(function(e) {
            if ($(this).val() === "8") {
                $('#divsex_1_input').prop("disabled", false);
            } else {
                $('#divsex_1_input').prop("disabled", true);
            }
        })
    });
    </script>
    <!-- MIGRANTE -->
    <script>
    $(document).ready(function() {
        $('#mig_1').change(function(e) {
            if ($(this).val() === "4") {
                $('#mig_1_input').prop("disabled", false);
            } else {
                $('#mig_1_input').prop("disabled", true);
            }
        })
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
    <!-- validacion de checkbox -->
    <script>
    $('#indigena_p1_1').change(function() {
        if (this.checked) {
            $('#dis_1_input').prop("disabled", false);
        } else {
            $('#dis_1_input').prop("disabled", true);
        } else {

        }
    });
    $('#indigena_p1_2').change(function() {
        if (this.checked) {
            $('#dis_1_input').prop("disabled", true);
        } else {
            $('#dis_1_input').prop("disabled", false);
        }
    });
    $('#indigena_p1_3').change(function() {
        if (this.checked) {
            $('#dis_1_input').prop("disabled", true);
        } else {
            $('#dis_1_input').prop("disabled", false);
        }
    });
    </script>
</body>

</html>

<?php
}
?>