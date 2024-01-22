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

                        <?php if(isset($_REQUEST['guardar'])){ 
                            $query="UPDATE `cuest_curricular` SET `status` = '4',`fecha_reg` = 'NOW()' WHERE `id_user_cand` = ".$user_ses.";";
                            //mysqli_query($con, $query);
                            
                            $esc_sel = $_REQUEST['esc_sel'];
                            $estatus_e = $_REQUEST['estatus_e'];
                            $otra_info = $_REQUEST['otra_info'];
                            $hist_prof = $_REQUEST['hist_prof'];
                            $tray_poli = $_REQUEST['tray_poli'];
                            $por_que = $_REQUEST['por_que'];
                            $prop_uno = $_REQUEST['prop_uno'];
                            $prop_dos = $_REQUEST['prop_dos'];
                            $prop_gen = $_REQUEST['prop_gene'];

                            $query="UPDATE `cuest_curricular` SET `id_grad_acad` = '".$esc_sel."', `status_grad_acad` = '".$estatus_e."', `otra_form_acad` = '".$otra_info."', `historia_prof` = '".$hist_prof."',
                            `tray_politica` = '".$tray_poli."', `por_que_ocupar` = '".$por_que."', `prop_1` = '".$prop_uno."', `prop_2` = '".$prop_dos."', `prop_gen` = '".$prop_gen."',
                            `status` = '3',`fecha_reg` = 'NOW()' WHERE `id_user_cand` = ".$user_ses.";";
                            mysqli_query($con, $query);
                            //echo $query;

                            
                        }
                            $query="SELECT * FROM `cuest_curricular` WHERE  `id_user_cand` = '$user_ses'";
                            $resultados_2=mysqli_query($con, $query);
                            $filas_2=mysqli_fetch_array($resultados_2);
                            $status_cuest = $filas_2['status'];
                        ?>


                        <?php if($status_cuest =='4'){?>

                        <div class="row">
                            <!-- MENSAJES DE ACCIONES -->
                            <div class="col-lg-1 mb-3 order-0"></div>
                            <div class="col-lg-10 mb-6 order-0">
                                <div class="card h-100">
                                    <form action="cuestionario_cur_3.php" method="POST">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <h5>Apartados de cuestionario curricular</h5>
                                                    <hr style="border-top:1px dotted" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <h5>HISTORIA PROFESIONAL Y/O LABORAL</h5><br>
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
                                                        <select required class="form-select" id="esc_sel"
                                                            name="esc_sel">
                                                            <option value="" selected disabled>Selecciona...</option>
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
                                                            aria-describedby="basic-addon14" required />
                                                    </div>
                                                    <br><br><br>
                                                    <div>
                                                        <div>
                                                            <label for="otra_info" class="form-label fs-5">Otra
                                                                Formacion Academica</label>
                                                            <textarea class="form-control" maxlength="250"
                                                                placeholder="Cursos, Diplomados, Seminarios, etc"
                                                                id="otra_info" name="otra_info" required
                                                                rows="3"></textarea>
                                                        </div>
                                                        <p class="text-muted mb-0 fa-pull-right">
                                                            <small>Máximo <strong>250</strong> caracteres por cada
                                                                registro.</small>
                                                        </p>
                                                    </div>
                                                    <br><br><br>
                                                    <div>
                                                        <div>
                                                            <label for="hist_prof" class="form-label fs-5">Historia
                                                                Profesional y/o
                                                                laboral</label>
                                                            <textarea class="form-control" maxlength="5000"
                                                                placeholder="Describa la experiencia, los años y las actividades realizadas en esta"
                                                                id="hist_prof" name="hist_prof" required
                                                                rows="3"></textarea>
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
                                                            <label for="tray_poli" class="form-label fs-5">Trayectoria
                                                                politica y/o
                                                                participación social en organizaciones ciudadanas o de
                                                                la sociedad civil</label>
                                                            <textarea class="form-control" maxlength="5000"
                                                                placeholder="Describa la trayectoria, los años y las actividades realizadas en esta"
                                                                id="tray_poli" name="tray_poli" required
                                                                rows="3"></textarea>
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
                                                            <label for="por_que" class="form-label fs-5">¿Por qué quiere
                                                                ocupar un cargo
                                                                público?</label>
                                                            <textarea class="form-control" maxlength="5000"
                                                                placeholder="Describa las motivaciones de ocupar un cargo publico"
                                                                id="por_que" name="por_que" required
                                                                rows="3"></textarea>
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
                                                            <label for="dos_prop" class="form-label fs-5">¿Cuales son
                                                                las
                                                                sus 2 principales propuestas?</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text">Propuesta 1</span>
                                                                <textarea class="form-control" id="dos_prop"
                                                                    maxlength="1600" name="prop_uno"
                                                                    aria-label="With textarea" required
                                                                    placeholder="Comment"></textarea>
                                                            </div>
                                                            <br>
                                                            <div class="input-group">
                                                                <span class="input-group-text">Propuesta 2</span>
                                                                <textarea class="form-control" id="dos_prop"
                                                                    maxlength="1600" name="prop_dos"
                                                                    aria-label="With textarea" required
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
                                                            <label for="prop_gene" class="form-label fs-5">Propuesta en
                                                                materia de género
                                                                o, en su caso, del grupo en situación de descriminación
                                                                que representa</label>
                                                            <textarea class="form-control" maxlength="1600"
                                                                placeholder="Describa la población, objetivos, metas y plazos, para su promoción como iniciativa de ley o politica pública"
                                                                id="prop_gene" name="prop_gene" required
                                                                rows="3"></textarea>
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
                                        <div class="row">
                                            <div class="col-12">
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
                            </div>
                            <div div class="col-lg-2 mb-4 order-0"></div>
                        </div>

                        <?php } else if($status_cuest =='3'){; 
                        $id_grad_r = $filas_2['id_grad_acad'];
                        if($filas_2['id_grad_acad']=='1'){
                            $id_grad_r = "Educación Basica";
                        } else if($filas_2['id_grad_acad']=='2'){
                            $id_grad_r = "Educación Media Superior";
                        } else if($filas_2['id_grad_acad']=='3'){
                            $id_grad_r = "Primaria";
                        } else if($filas_2['id_grad_acad']=='4'){
                            $id_grad_r = "Secundaria";
                        } else if($filas_2['id_grad_acad']=='5'){
                            $id_grad_r = "Técnica";
                        } else if($filas_2['id_grad_acad']=='6'){
                            $id_grad_r = "Preparatoria";
                        } else if($filas_2['id_grad_acad']=='7'){
                            $id_grad_r = "Licenciatura";
                        } else if($filas_2['id_grad_acad']=='8'){
                            $id_grad_r = "Especialidad";
                        } else if($filas_2['id_grad_acad']=='9'){
                            $id_grad_r = "Maestría";
                        } else if($filas_2['id_grad_acad']=='10'){
                            $id_grad_r = "Doctorado";
                        } else if($filas_2['id_grad_acad']=='11'){
                            $id_grad_r = "Ninguno";
                        } 
                        $st_grad_r = $filas_2['status_grad_acad'];
                        $otra_acad_r = $filas_2['otra_form_acad'];
                        $hist_prof_r = $filas_2['historia_prof'];
                        $tray_poli_r = $filas_2['tray_politica'];
                        $por_que_r = $filas_2['por_que_ocupar'];
                        $prop_1_r = $filas_2['prop_1'];
                        $prop_2_r = $filas_2['prop_2'];
                        $prop_gen_r = $filas_2['prop_gen'];
                        ?>
                        <div class="row">
                            <!-- MENSAJES DE ACCIONES -->
                            <div class="col-lg-1 mb-3 order-0"></div>
                            <div class="col-lg-10 mb-6 order-0">
                                <div class="card h-100">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h5>RESPUESTAS AL CUESTIONARIO CURRICULAR (INFORMACION CURRICULAR)</h5>
                                                <hr style="border-top:1px dotted" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h5>HISTORIA PROFESIONAL Y/O LABORAL</h5><br>
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
                                                    <span class="input-group-text" for="inputGroupSelect01">Opción
                                                        seleccionada:</span>
                                                    <input name="estatus_e" id="estatus_e" type="text"
                                                        class="form-control" disabled value="<?php echo $id_grad_r ?>"
                                                        aria-describedby="basic-addon14" />
                                                </div>
                                                </p>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon14">Estatus:</span>
                                                    <input name="estatus_e" id="estatus_e" type="text"
                                                        class="form-control" disabled value="<?php echo $st_grad_r ?>"
                                                        aria-describedby="basic-addon14" />
                                                </div>
                                                <br><br><br>
                                                <div>
                                                    <div>
                                                        <label for="exampleFormControlTextarea1"
                                                            class="form-label fs-5">Otra Formacion Academica</label>
                                                        <textarea class="form-control"
                                                            placeholder="Cursos, Diplomados, Seminarios, etc"
                                                            id="exampleFormControlTextarea1" rows="3"
                                                            disabled><?php echo $otra_acad_r ?></textarea>
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
                                                            id="exampleFormControlTextarea1" rows="3"
                                                            disabled><?php echo $hist_prof_r ?></textarea>
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
                                                            id="exampleFormControlTextarea1" rows="3"
                                                            disabled><?php echo $tray_poli_r ?></textarea>
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
                                                            id="exampleFormControlTextarea1" rows="3"
                                                            disabled><?php echo $por_que_r ?></textarea>
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
                                                            <textarea class="form-control" aria-label="With textarea"
                                                                placeholder="Comment"
                                                                disabled><?php echo $prop_1_r ?></textarea>
                                                        </div>
                                                        <br>
                                                        <div class="input-group">
                                                            <span class="input-group-text">Propuesta 2</span>
                                                            <textarea class="form-control" aria-label="With textarea"
                                                                placeholder="Comment"
                                                                disabled><?php echo $prop_2_r ?></textarea>
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
                                                            id="exampleFormControlTextarea1" rows="3"
                                                            disabled><?php echo $prop_gen_r ?></textarea>
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
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-12">
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
                            </div>
                            <div div class="col-lg-2 mb-4 order-0"></div>
                        </div>
                        <?php } ?>
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
    </div>
</body>

<?php 
} }
?>

    <
    /html>