<?php

include_once("conexion.php");
$usuario=$_SESSION['usuario'];
?>
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

    <div class="app-brand demo">
        <div style="text-align: center;">
        <br>
            <!-- <a href="index.php" class="app-brand-link"> -->
            <img src="logoite.png" width="100em">
            <br><br>
            <span class="mb-2 text-center">SISTEMA DE CANDIDATAS Y CANDIDATOS</span>
            <p><strong>"CONOCELES"</strong></p>
        </div>
        <br>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <?php  
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   
    
    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];    
      
   //echo $url;  
  ?>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <?php 
            if($url == "http://localhost/Sistemas/dashboard/pages/index.php"){
            ?>
        <li class="menu-item active">
            <?php 
            } else {
            ?>
        <li class="menu-item ">
            <?php 
            }
            ?>
            <a href="index.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Inicio</div>
            </a>
        </li>
        <?php 
            if($url == "http://localhost/Sistemas/dashboard/pages/cuenta.php"){
            ?>
        <li class="menu-item active">
            <?php 
            } else {
            ?>
        <li class="menu-item ">
            <?php 
            }
            ?>
            <a href="cuenta.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Account">Cuenta de Usuario</div>
            </a>
        </li>
        <!-- Layouts -->
        <?php
            $query="SELECT * FROM `c_usuarios` WHERE `user_name` = '$usuario'";
            $resultados=mysqli_query($con, $query);
            $filas=mysqli_fetch_array($resultados);
            /* echo $query;
            echo $filas["id_rol"]; */
            if($filas["id_rol"]==1 || $filas["id_rol"]==2 ){
        ?>

        <?php 
        
        if($filas["id_rol"]==1){
        ?>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">OPCIONES ITE</span>
        </li>
        <?php 
            if($url == "http://localhost/Sistemas/dashboard/pages/areas_ite.php" or $url == "http://localhost/Sistemas/dashboard/pages/cargos_ite.php" ){
            ?>
        <li class="menu-item active">
            <?php 
            } else {
            ?>
        <li class="menu-item ">
            <?php 
            }
            ?>
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-institution"></i>
                <div data-i18n="Layouts">ITE</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="areas_ite.php" class="menu-link">
                        <div data-i18n="new_admin">Áreas</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="cargos_ite.php" class="menu-link">
                        <div data-i18n="search_reg">Cargos</div>
                    </a>
                </li>

                <!-- <li class="menu-item">
                    <a href="layouts-blank.html" class="menu-link">
                        <div data-i18n="Blank">Pagina en Blanco</div>
                    </a>
                </li> -->
            </ul>
        </li>

        <?php 
            if($url == "http://localhost/Sistemas/dashboard/pages/administradores.php" OR $url == "http://localhost/Sistemas/dashboard/pages/crud_administrador.php" OR $url == "http://localhost/Sistemas/dashboard/pages/password_edit_admin.php"){
            ?>
        <li class="menu-item active">
            <?php 
            } else {
            ?>
        <li class="menu-item ">
            <?php 
            }
            ?>
            <a href="administradores.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-body"></i>
                <div data-i18n="Layouts">Administradores</div>
            </a>
        </li>
        <?php 
            if($url == "http://localhost/Sistemas/dashboard/pages/verificadores.php" OR $url == "http://localhost/Sistemas/dashboard/pages/crud_verificador.php" OR $url == "http://localhost/Sistemas/dashboard/pages/password_edit_veri.php"){
            ?>
        <li class="menu-item active">
            <?php 
            } else {
            ?>
        <li class="menu-item ">
            <?php 
            }
            ?>
            <a href="verificadores.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-search"></i>
                <div data-i18n="Layouts">Verificadores</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">OPCIONES CANDIDATOS</span>
        </li>

        <?php 
            if($url == "http://localhost/Sistemas/dashboard/pages/candidatos.php" ){
            ?>
        <li class="menu-item active">
            <?php 
            } else {
            ?>
        <li class="menu-item ">
            <?php 
            }
            ?>
            <a href="candidatos.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-body"></i>
                <div data-i18n="Layouts">Candidatos</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">OPCIONES AVISOS DE PRIVACIDAD</span>
        </li>

        <?php 
            if($url == "http://localhost/Sistemas/dashboard/pages/aviso_privacidad.php"){
            ?>
        <li class="menu-item active">
            <?php 
            } else {
            ?>
        <li class="menu-item ">
            <?php 
            }
            ?>
            <a href="aviso_privacidad.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-fingerprint"></i>
                <div data-i18n="Account">Aviso de Privacidad</div>
            </a>
        </li>
        <?php 
        }?>
        <?php 
        if($filas["id_rol"]==2){
        ?>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Opciones</span>
        </li>
        <?php 
            if($url == "http://localhost/Sistemas/dashboard/pages/candidatos.php" OR $url == "http://localhost/Sistemas/dashboard/pages/crud_administrador.php" OR $url == "http://localhost/Sistemas/dashboard/pages/password_edit_admin.php"){
            ?>
        <li class="menu-item active">
            <?php 
            } else {
            ?>
        <li class="menu-item ">
            <?php 
            }
            ?>
            <a href="candidatos.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-body"></i>
                <div data-i18n="Layouts">Candidatos</div>
            </a>
        </li>
        <!-- <?php 
            if($url == "http://localhost/Sistemas/dashboard/pages/verificadores.php" OR $url == "http://localhost/Sistemas/dashboard/pages/crud_verificador.php" OR $url == "http://localhost/Sistemas/dashboard/pages/password_edit_veri.php"){
            ?>
        <li class="menu-item active">
            <?php 
            } else {
            ?>
        <li class="menu-item ">
            <?php 
            }
            ?>
            <a href="verificadores.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-search"></i>
                <div data-i18n="Layouts">Verificadores</div>
            </a>
        </li> -->

        <?php 
        }?>

        <?php 
        }
        ?>
        <?php 
        if($filas["id_rol"]==3){
        ?>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Cuestionarios</span>
        </li>
        <?php 
            if($url == "http://localhost/Sistemas/dashboard/pages/cuestionario_iden.php"   ){
            ?>
        <li class="menu-item active">
            <?php 
            } else if($url == "http://localhost/Sistemas/dashboard/pages/cuestionario_cur.php"){
            ?>
        <li class="menu-item active">
            <?php 
            } else {
            ?>
        <li class="menu-item">
            <?php 
            }
            ?>
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-list-ol"></i>
                <div data-i18n="Layouts">Cuestionarios</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="construccion_index.php" class="menu-link">
                        <div data-i18n="search_reg">Curricular</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="cuestionario_iden.php" class="menu-link">
                        <div data-i18n="new_reg">Identidad</div>
                    </a>
                </li>


                <!-- <li class="menu-item">
                    <a href="layouts-blank.html" class="menu-link">
                        <div data-i18n="Blank">Pagina en Blanco</div>
                    </a>
                </li> -->
            </ul>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Avisos de Privacidad</span>
        </li>
        <?php 
            if($url == "http://localhost/Sistemas/dashboard/pages/aviso_privacidad.php"){
            ?>
        <li class="menu-item active">
            <?php 
            } else {
            ?>
        <li class="menu-item ">
            <?php 
            }
            ?>
            <a href="aviso_privacidad.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-fingerprint"></i>
                <div data-i18n="Account">Aviso de Privacidad</div>
            </a>
        </li>
        <?php
        }
        ?>

</aside>