<!DOCTYPE html>
<html lang="es">

<head>

    <link rel="icon" href="/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#000000">

    <title>Candidatas y Candidatos Conóceles</title>
    <!-- script defer="" src="/static/js/bundle.js"></script -->

    <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Raleway" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <style>
        /** HEADER */
        .navbar-icons {
            align-items: center;
            display: flex;
            justify-content: flex-end;
            height: 55px;

        }

        .soc_media {
            margin-right: 30px;
            color: #6d004e;
            transform: scale(2);
        }

        .Header__logoITE {
            /* width: 12rem; */
        }

        .menu-opciones {
            float: right;
        }




        @media screen and (max-width: 760px) {

            .Header__logoITE {
                width: 9rem !important;
                margin-bottom: !important;
                display: none !important;
            }

        }

        /** TERMINA HEADER */

        /** HOME */

        .color__span {
            color: grey;
            font-weight: 700;
            font-size: 16px;
        }

        .color__span2 {
            color: #000;
            font-weight: 700;
            font-size: 16px;
        }

        .color__span3 {
            color: #d5007f;
            font-weight: 700;
            font-size: 16px;
        }


        /* nuevo tema area */
    .tema-area {
        background: #f2f2f2;
        /* border: 1px solid #ddd; */
        padding: 15px;
        color: #8c8c8c;
    }


        /** termina HOME */

        /** FOOTER */

        .Footer {
            margin-top: 5px;
            color: #ffffff;
            background-color: #ba1678;

        }



        /** TERMINA FOOTER */
    </style>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

</head>

<body>

    <div class="d-flex justify-content-center w-100 Header__logoITE">
        <div class="w-25 ps-5 pt-3 pb-3"><a href="/"><img src="https://itetlax.org.mx/assets/img/logoite.png"
                    alt="Instituto Tlaxcalteca de Elecciones" class="navbar-brand w-25"></a></div>
        <div class="w-75 d-flex align-items-center justify-content-end">
            <a href="https://es-la.facebook.com/InstitutoTlaxcaltecadeElecciones/"><i
                    class="fab fa-facebook soc_media"></i></a>
            <a href="https://twitter.com/share?url=http%3A%2F%2Fitetlax.org.mx%2F"><i
                    class="fab fa-twitter soc_media"></i></a>
            <a href="https://www.youtube.com/channel/UCUBfUX_c54NfhhvZRzK0k1w"><i
                    class="fab fa-youtube soc_media"></i></a>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand w-24" href="#">INSTITUTO TLAXCALTECA DE ELECCIONES</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="menu-opciones navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <!-- agregar la variable de rutas a la url de inicio de sesión -->
                        <a class="nav-link active" aria-current="page" href="pages/login.php">Inicio de Sesión</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Opción 1</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Desplegable
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Opción 2</a></li>
                            <li><a class="dropdown-item" href="#">Opción 3</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Opción 4</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Opción 5
                            deshabilitada</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto d-none">
                    <li class="nav-item"> <a class="nav-link" href="#"><i class="fab fa-facebook-f"
                                style="color: #6d004e;"></i></a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="#"><i class="fab fa-twitter"
                                style="color: #6d004e;"></i></a></li>
                    <li class="nav-item"> <a class="nav-link" href="#"><i class="fab fa-instagram"
                                style="color: #6d004e;"></i></a></li>
                </ul>

            </div>
        </div>
    </nav>

    <div class="w-10 d-flex justify-content-center">
        <div class="p-4 d-flex flex-column align-items-center col-12">
            <img src="assets/img/conoceles.jpg" class="img-fluid rounded w-100 mx-auto d-block" alt="Conoceles_banner">
        </div>
    </div>
    
    <div class="w-10 d-flex justify-content-center">
        <div class="p-2 d-flex flex-column align-items-center col-11">
            <div class="row tema-area text-center">
                <div class="col-6">
                    <p class="color__span">CANDIDATAS Y CANDIDATOS</p>
                </div>
                <div class="col-6">
                    <a class="color__span2" href="https://candidaturas.ine.mx/preguntasFrecuentes" target="_blank">Preguntas Frecuentes</a>
                </div>
            </div>
        </div>
    </div>

    <div class="w-10 d-flex justify-content-center">
        <div class="p-3 d-flex flex-column align-items-center col-13">
            <div class="tema-area text-justify">
                <span class="color__span"> La información es proporcionada por las personas candidatas y candidatos a las diputaciones, ayuntamientos y 
                    presidencias de comunidad del estado de Tlaxcala, por lo tanto, 
                    <span class="color__span2">es responsabilidad de los actores políticos dicho contenido.</span> 
                </span>
            </div>
        </div>
    </div>

    <div class="w-10 d-flex justify-content-center">
        <div class="p-3 d-flex flex-column align-items-center col-12">
            <div class="tema-area text-justify">
            <span class="color__span">
                    El sistema permite hacer búsquedas por tipo de candidatura, actor político, o bien 
                    <a class="link__text" href="./" target="_blank">Exportar la base de datos</a>
                </span>
            </div>
        </div>
    </div>

    <div class="border-top mt-10"></div>
    
    <div class="w-10 d-flex">
        <div class="p-4 d-flex flex-column justify-content-center">
            <p class="text-secondary">* La opción de búsqueda Grado académico solamente presenta los datos capturados
                por las y los candidatos. </p>
        </div>
    </div>

    <div class="w-10 d-flex flex-wrap justify-content-center justify-content-md-center">
        <div class="d-inline-flex mt-2">
            <div class="mr-2 text-justify">
                <strong class="texto__forms">Grado académico:</strong>
                <select class="form-select form-select-sm" aria-label=".form-select-sm grado" id="grado_aca">
                    <option value="0">Selecciona grado academico</option>
                    <option value="1">Sin registro</option>
                    <option value="2">Primaria</option>
                    <option value="3">Secundaria</option>
                    <option value="4">Preparatoria</option>
                    <option value="5">Tec Superior Universitario</option>
                    <option value="6">Licenciatura</option>
                    <option value="7">Maestria</option>
                    <option value="8">Doctorado</option>
                    <option value="9">Post Doctorado</option>
                </select>
            </div>
            <div class="mr-2 text-justify">
                <strong class="texto__forms">Rango de edad:</strong>
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="rango_edad">
                    <option value="0">Selecciona edad:</option>
                    <option value="1">21 a 29 años de edad</option>
                    <option value="2">30 a 40 años de edad</option>
                    <option value="3">41 a 49 años de edad</option>
                    <option value="4">50 a 59 años de edad</option>
                    <option value="5">60 años en adelante</option>
                </select>
            </div>

            <div class="mr-2 text-justify">
                <strong class="texto__forms">Sexo:</strong><br>

                <table class="table table-responsive table-borderless">
                    <tbody>
                        <tr>
                            <td>
                                <div class="d-flex flex-wrap justify-content-center justify-content-md-center">
                                    <div class="form-check col">
                                        <input class="form-check-input" type="radio" name="sexo" id="sexo" value="1">
                                        <label class="form-check-label" for="sexo">Mujer</label>
                                    </div>

                                    <div class="form-check col">
                                        <input class="form-check-input" type="radio" name="sexo" id="sexo" value="2">
                                        <label class="form-check-label" for="sexo">Hombre</label>

                                    </div>

                                    <div class="form-check col">
                                        <input class="form-check-input" type="radio" name="sexo" id="sexo" value="3">
                                        <label class="form-check-label" for="sexo">No Binario</label>
                                    </div>

                                    <div class="form-check col">
                                        <input class="form-check-input" type="radio" name="sexo" id="sexo" value="4">
                                        <label class="form-check-label" for="sexo">Otro Género</label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="w-10 d-flex flex-wrap justify-content-center justify-content-md-center">
        <div class="d-inline-flex col-11">
            <strong class="texto__forms">Actor político:</strong>    
        </div>

        <table class="table table-responsive table-borderless">
            <tbody>
                <tr>
                    <td>
                        <div class="d-flex flex-wrap justify-content-center justify-content-md-center">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="actorPol" id="actorPol" value="0" checked="">
                                <img src="assets/img/pp/todos.png" class="img-fluid" alt="Conoceles_todos" width="50px">
                                <label class="form-check-label" for="actorPol"><strong>&nbsp;TODOS</strong></label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="actorPol" id="actorPol" value="1">
                                <img src="assets/img/pp/pan.png" class="img-fluid " alt="Conoceles_PAN" width="50px">
                                <label class="form-check-label" for="actorPol"><strong>&nbsp;PAN</strong></label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="actorPol" id="actorPol" value="2">
                                <img src="assets/img/pp/pri.png" class="img-fluid " alt="Conoceles_PRI" width="50px">
                                <label class="form-check-label" for="actorPol"><strong>&nbsp;PRI</strong></label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="actorPol" id="actorPol" value="3">
                                <img src="assets/img/pp/prd.png" class="img-fluid " alt="Conoceles_PRD" width="50px">
                                <label class="form-check-label" for="actorPol"><strong>&nbsp;PRD</strong></label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="actorPol" id="actorPol" value="4">
                                <img src="assets/img/pp/pt.png" class="img-fluid " alt="Conoceles_PT" width="50px">
                                <label class="form-check-label" for="actorPol"><strong>&nbsp;PT</strong></label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="actorPol" id="actorPol" value="5">
                                <img src="assets/img/pp/pvem.png" class="img-fluid " alt="Conoceles_PVEM" width="50px">
                                <label class="form-check-label" for="actorPol"><strong>&nbsp;PVEM</strong></label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="actorPol" id="actorPol" value="6">
                                <img src="assets/img/pp/mc.png" class="img-fluid " alt="Conoceles_MC" width="50px">
                                <label class="form-check-label" for="actorPol"><strong>&nbsp;MC</strong></label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="actorPol" id="actorPol" value="7">
                                <img src="assets/img/pp/pac.png" class="img-fluid " alt="Conoceles_PAC" width="50px">
                                <label class="form-check-label" for="actorPol"><strong>&nbsp;PAC</strong></label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="actorPol" id="actorPol" value="8">
                                <img src="assets/img/pp/morena.png" class="img-fluid " alt="Conoceles_MORENA" width="50px">
                                <label class="form-check-label" for="actorPol"><strong>&nbsp;MORENA</strong></label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="actorPol" id="actorPol" value="9">
                                <img src="assets/img/pp/na.png" class="img-fluid " alt="Conoceles_NA" width="50px">
                                <label class="form-check-label" for="actorPol"><strong>&nbsp;NA</strong></label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="actorPol" id="actorPol" value="10">
                                <img src="assets/img/pp/rsp.png" class="img-fluid " alt="Conoceles_RSP" width="50px">
                                <label class="form-check-label" for="actorPol"><strong>&nbsp;RSP</strong></label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="actorPol" id="actorPol" value="11">
                                <img src="assets/img/pp/fxm.png" class="img-fluid " alt="Conoceles_FxM" width="50px">
                                <label class="form-check-label" for="actorPol"><strong>&nbsp;FxM</strong></label>
                            </div>

                        </div>
                    </td>
                </tr>
            </tbody>
        </table> 
    </div>
    
    <div class="w-10 d-flex flex-wrap justify-content-center justify-content-md-center">

        <table class="table table-responsive table-borderless">
            <tbody>
                <tr>
                    <td>
                        <div class="d-flex flex-wrap justify-content-center justify-content-md-center">
                            <div class="text-justify">
                                <button class="btn btn-primary me-md-5" type="button" onclick="lmpCampos();">Limpiar Campos</button>
                            </div>

                            <div class="text-justify">
                                <button class="btn btn-danger" type="button" onclick="obtenDataTable(1);">Consultar</button>
                            </div>


                        </div>
                    </td>
                </tr>
            </tbody>
        </table>        
        
    </div>

    <br>
    <div class="border-top mt-10"></div>
    <br>

    
    <div class="w-10 d-flex flex-wrap justify-content-center justify-content-md-center d-show tabla_elem">
        <div class="col-10">
            <table id="listado_candidatos" style="width:100%" class="display nowrap table table-responsive table-borderless">
                <thead>
                    <tr class="fw-semibold fs-6 text-gray-800">
                        <th class="min-w-100px">Id</th>
                        <th class="min-w-150px">Nombre completo</th>
                        <th class="min-w-150px">Cargo</th>
                        <th class="min-w-150px">Afiliación</th>
                        <th class="min-w-150px">Edad</th>
                        <th class="min-w-150px">Grado Académico</th>
                        <th class="min-w-150px">Ver perfil</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Tiger</td>
                    <td>Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011-04-25</td>
                    <td>$320,800</td>
                </tr>
                <tr>
                    <td>Tiger</td>
                    <td>Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011-04-25</td>
                    <td>$320,800</td>
                </tr>
                <tr>
                    <td>Tiger</td>
                    <td>Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011-04-25</td>
                    <td>$320,800</td>
                </tr>
                <tr>
                    <td>Tiger</td>
                    <td>Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011-04-25</td>
                    <td>$320,800</td>
                </tr>
                <tr>
                    <td>Tiger</td>
                    <td>Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011-04-25</td>
                    <td>$320,800</td>
                </tr>
                <tr>
                    <td>Tiger</td>
                    <td>Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011-04-25</td>
                    <td>$320,800</td>
                </tr>
                <tr>
                    <td>Tiger</td>
                    <td>Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011-04-25</td>
                    <td>$320,800</td>
                </tr>
                <tr>
                    <td>Tiger</td>
                    <td>Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011-04-25</td>
                    <td>$320,800</td>
                </tr>
                <tr>
                    <td>Tiger</td>
                    <td>Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011-04-25</td>
                    <td>$320,800</td>
                </tr>
                <tr>
                    <td>Tiger</td>
                    <td>Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011-04-25</td>
                    <td>$320,800</td>
                </tr>
                <tr>
                    <td>Tiger</td>
                    <td>Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011-04-25</td>
                    <td>$320,800</td>
                </tr>
                <tr>
                    <td>Tiger</td>
                    <td>Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011-04-25</td>
                    <td>$320,800</td>
                </tr>
                <tr>
                    <td>Tiger</td>
                    <td>Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011-04-25</td>
                    <td>$320,800</td>
                </tr>
                <tr>
                    <td>Tiger</td>
                    <td>Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011-04-25</td>
                    <td>$320,800</td>
                </tr>
                <tr>
                    <td>Tiger</td>
                    <td>Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011-04-25</td>
                    <td>$320,800</td>
                </tr>
                <tr>
                    <td>Tiger</td>
                    <td>Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011-04-25</td>
                    <td>$320,800</td>
                </tr>
                <tr>
                    <td>Tiger</td>
                    <td>Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011-04-25</td>
                    <td>$320,800</td>
                </tr>
                <tr>
                    <td>Tiger</td>
                    <td>Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011-04-25</td>
                    <td>$320,800</td>
                </tr>
                <tr>
                    <td>Tiger</td>
                    <td>Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011-04-25</td>
                    <td>$320,800</td>
                </tr>
                <tr>
                    <td>Tiger</td>
                    <td>Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011-04-25</td>
                    <td>$320,800</td>
                </tr>
                <tr>
                    <td>Tiger</td>
                    <td>Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011-04-25</td>
                    <td>$320,800</td>
                </tr>
                <tr>
                    <td>Tiger</td>
                    <td>Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011-04-25</td>
                    <td>$320,800</td>
                </tr>
                <tr>
                    <td>Tiger</td>
                    <td>Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011-04-25</td>
                    <td>$320,800</td>
                </tr>
                <tr>
                    <td>Tiger</td>
                    <td>Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011-04-25</td>
                    <td>$320,800</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>



    <div class="d-none tabla_elem">
        <br>
        <div class="border-top mt-10"></div>
        <br>
    </div>


    <br>
    <div class="border-top mt-10"></div>
    <br>

    <div class="w-100 d-flex flex-wrap justify-content-between align-items-center Footer">
        <div class="container p-3 col-md-4">
            <div class="text-center">
                <label><strong> Ubicación:</strong></label>
                <p> Ex-Fábrica San Manuel S/N <br>Barrio Nuevo C.P. 90640 San Miguel Contla, Tlaxcala. </p>
            </div>
        </div>
        

        <div class="container p-4 col-md-4">
            <div class="text-center">
                <label><strong> ITE</strong></label>
                <p> © Derechos Reservados. <br>Instituto Tlaxcalteca de Elecciones </p>
            </div>
        </div>

        <div class="container p-4 col-md-4">
            <div class="text-center">
                <label> <strong>Contacto:</strong></label>
                <p>Teléfono: <strong>(246)4650340 ext. 111</strong><br> Email: <strong>transparencia@itetlax.org.mx</strong>
                </p>
            </div>
        </div>
    </div>

</body>

<script>
new DataTable('#example', {
        responsive: true,

        scrollY:        200,
        scrollX:        200,
        deferRender:    true,
        scroller:       true
    });

    new DataTable('#listado_candidatos', {
        responsive: true,

        scrollY:        500,
        scrollX:        300,
        deferRender:    true,
        scroller:       true
    });

</script>

</html>