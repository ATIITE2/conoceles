<?php 
ini_set('default_charset', 'UTF-8');

// CONSTRUCTORES HTML DE LISTAS Y CATÁLOGOS

require("gets/datos.php");

/* Se obtienen los catálogos de charts, de grados de estudios y de partidos políticos, estos se guardan en sus respectivos arrays */

$data_counter_foot=getDataCounterFooter();
$cat_grados=getCatList(1);
$cat_partidos=getCatList(2);
$cat_chrt=getCatList(3);
$cat_gen=getCatList(4);


// Se genera el html del catálogo de grados de estudios y se guarda en su variable correspondiente
$html_cat_grados='<select class="form-select form-select-sm" aria-label=".form-select-sm grado" id="grado_aca">
                    <option value="0">Selecciona grado academico</option>'.PHP_EOL;

foreach ($cat_grados as $row) {
    $html_cat_grados.='<option value="'.$row['id'].'">'.$row['nombre_com'].'</option>'.PHP_EOL;

}

$html_cat_grados.='</select>'.PHP_EOL;


// Se genera el html del catálogo de partidos políticos y se guarda en su variable correspondiente
$html_cat_partidos='<div class="col-9 ">
                        <div class="col-xs-12 col-sm-6 col-md-12"><br>';

$html_cat_partidos='';

foreach ($cat_partidos as $row) {
    $html_cat_partidos.='<div class="form-check">
                            <input class="form-check-input" type="radio" name="actorPol" id="actorPol" value="'.$row['id'].'">
                            <img src="'.$row['url_img'].'" class="img-fluid" alt="Conoceles_'.$row['nom_cor'].'" width="50px">
                            <label class="form-check-label" for="actorPol"><strong>&nbsp;'.$row['nom_cor'].'</strong></label>
                        </div>'.PHP_EOL;
}


// Se genera el html de la lista charts y se guarda en su variable correspondiente
$html_lista_charts='<ul class="nav nav-pills flex-column text-justify">'.PHP_EOL;

$a='active';
foreach ($cat_chrt as $row) {
    if($row['status'] == 1) {
        $html_lista_charts.='<li class="nav-item" role="presentation" style="cursor: pointer;" onclick="muestraGrafica('. $row['id'] .', \''. $row['nom_com'] .'\','. $row['tipo'] .'); activarList(\'chrt_link'.$row['id'].'\');">
                                <a class="nav-link '. $a .'" id="chrt_link'.$row['id'].'">'. $row['nom_cor'] .'</a>
                            </li>'.PHP_EOL;
    }
    $a='';
}

$html_lista_charts.='</ul>'.PHP_EOL;

$html_lista_charts_resp='<ul class="nav nav-tabs justify-content-center justify-content-md-center nav-pills">'.PHP_EOL;

$a='active';
foreach ($cat_chrt as $row) {
    if($row['status'] == 1) {
        $html_lista_charts_resp.='<li class="nav-item" role="presentation" onclick="muestraGrafica('. $row['id'] .', \''. $row['nom_com'] .'\','. $row['tipo'] .'); activarList(\'chrt_link'.$row['id'].'_resp\');">
                                    <a class="nav-link '. $a .'" id="chrt_link'.$row['id'].'_resp">'. $row['nom_resp'] .'</a>
                                </li>'.PHP_EOL;
    }
    $a='';
}

$html_lista_charts_resp.='</ul>'.PHP_EOL;


$html_cat_generos='';

foreach ($cat_gen as $row) {
    if($row['status'] == 1) {
        $html_cat_generos.='<div class="form-check col-md">
                                <input class="form-check-input" type="radio" name="sexo" id="sexo" value="'.$row['id'].'">
                                <label class="form-check-label" for="sexo">'.$row['nombre'].'</label>
                            </div>'.PHP_EOL;
    }
}
                   
?>


<script>
    const chart_datos = [];

    <?php 
    
    for($i = 1; $i <= 12; $i++) {
        $jsData=getjsData($i);

        $arreglo= 'chart_datos['.$i.'] = '.$jsData[0].';';  // Si jsData solo lleva un resultado, entonces solo se guarda el mismo en un casillero en el array chart_datos general

        if(count($jsData)>1) { /* Aqui se va a crear una nueva variable array en javascript en el caso de que jsData lleve más de un resultado JSon y
                                  cada resultado los guardará en una casilla enumerada de la nueva variable */

            $arreglo='const chart_datos'.$i.'=[];';
            $k=1;
            foreach($jsData as $js){
                $arreglo.=PHP_EOL.'  chart_datos'.$i.'['.$k.']= '.$js.';';
                $k++;
            }
        }
        
        echo $arreglo. PHP_EOL;
    }
     ?>
    
</script>

<script src="<?php echo RUTA_SCRIPTS ?>js/home/main.js"></script>
<script src="<?php echo RUTA_SCRIPTS ?>js/home/dtable.js"></script>

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
                    <?php echo $html_cat_grados; ?>
                
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
                <strong class="texto__forms">Género:</strong><br>

                <table class="table table-responsive table-borderless">
                    <tbody>
                        <tr>
                            <td>
                                <div class="d-flex flex-wrap justify-content-center justify-content-md-center">
                                    <?php echo $html_cat_generos; ?>
                                
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
                                <input class="form-check-input" type="radio" name="actorPol" id="actorPol" value="0" checked>
                                <img src="assets/img/pp/todos.png" class="img-fluid" alt="Conoceles_todos" width="50px">
                                <label class="form-check-label" for="actorPol"><strong>&nbsp;TODOS</strong></label>
                            </div>

                            <?php echo $html_cat_partidos; ?>
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

    
    <div class="w-10 d-flex flex-wrap justify-content-center justify-content-md-center d-none tabla_elem">
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
            </table>
        </div>
    </div>

    <div class="d-none tabla_elem">
        <br>
        <div class="border-top mt-10"></div>
        <br>
    </div>



    <div class="container flex-wrap justify-content-center justify-content-md-center">
        <div class="row flex-column flex-md-row">
            <div class="col-md-3" id="lista_chrts1">
                <?php echo $html_lista_charts; ?>
            </div>
            <div class="col-md-9" id="conten_graf1">
                <div class="tab-content">
                    <div class="tab-pane fade show active" role="tabpanel">
                        <div class="card">
                            <div class="card-header"></div>
                            <div class="card-body" id="chartContainer" style="height: 370px; width: 100%;"></div>
                            <div style="margin-top:16px;color:dimgrey;font-size:9px;font-family: Verdana, Arial, Helvetica, sans-serif;text-decoration:none;"></div>
                            <div class="card-footer">
                                Total de registros desde el <?php echo $data_counter_foot["f_inicio"]; ?> al <?php echo $data_counter_foot["f_actual"]; ?>: 
                                <b class="rosa"> <?php echo $data_counter_foot["t_registros"]; ?> </b>
                            </div>
                        </div>
                        <div class="col-12 d-none" id="lista_chrts2">
                            <?php echo $html_lista_charts_resp; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <br>
    <div class="border-top mt-10"></div>
    <br>


    <link rel="stylesheet" href="<?php echo RUTA_SCRIPTS ?>css/counter.css">
    <?php include RUTA_SCRIPTS."layout/counter.php"; ?>
    <a href="estadisticas/"><img src="assets/img/consulta.png" class="img-fluid rounded mx-auto d-block" alt="Conoceles_consulta"></a>
    <p>&nbsp;</p>



