<?php
ini_set('default_charset', 'UTF-8');

require(RUTA_SCRIPTS. "gets/datos.php");

$data_counter_foot=getDataCounterFooter();
$datacount=getCatListEst(1);
$count=$datacount[0];

$cat_chrt=getCatListEst(2);

// Se genera el html de la lista charts estadísticas y se guarda en su variable correspondiente
$html_lista_charts_estad='<ul class="nav nav-pills flex-column text-center">'.PHP_EOL;

$a='active';
foreach ($cat_chrt as $row) {
    if($row['status'] == 1){
        $html_lista_charts_estad.='<li class="nav-item" role="presentation" style="cursor: pointer;" onclick="cargaListaGraficas('. $row['id'] .', \''. $row['nom_com'] .'\'); activarListEst('.$row['id'].');">
                                        <a class="nav-link chrtlink '. $a .'" id="chrt_link'.$row['id'].'">'. $row['nom_cor'] .'</a>
                                    </li>'.PHP_EOL;
    }
    $a='';
}

$html_lista_charts_estad.='</ul>'.PHP_EOL;


$html_lista_charts_estad_resp='';

$a='active';
foreach ($cat_chrt as $row) {
    if($row['status'] == 1){
        $html_lista_charts_estad_resp.='<li class="nav-item" role="presentation" onclick="cargaListaGraficas('. $row['id'] .', \''. $row['nom_com'] .'\'); activarListEst(\''.$row['id'].'_resp\');">
                                        <a class="nav-link chrtlink '. $a .'" id="chrt_link'.$row['id'].'_resp">'. $row['nom_cor'] .'</a>
                                    </li>'.PHP_EOL;
    }
    $a='';
}

?>

<script>
    const chart_datos = [];

    <?php 
    
    for($i = 13; $i <= 38; $i++) {
        $jsData=getjsDataEst($i);

        $arreglo= 'chart_datos['.$i.'] = '.$jsData[0].';';  // Si jsData solo lleva un resultado, entonces solo se guarda el mismo en un casillero en el array chart_datos general

        if(count($jsData)>1) { /* Aqui se va a crear una nueva variable array en javascript en el caso de que jsData lleve más de un resultado JSon y
                                  cada resultado los guardará en una casilla enumerada (conforme al contador $i) de la nueva variable */

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

<script src="<?php echo RUTA_SCRIPTS ?>js/estadisticas/main.js"></script>

<div class="justify-content-center">
    <br>
    <p class="titulo_1 text-c">BIENVENIDAS CANDIDATAS Y CANDIDATOS</p>
    <div class="border-2 border-top"></div>
</div>
<br>
<div class="p-3 d-flex flex-column align-items-center col-12">
    <p>El sistema Candidatas y Candidatos, Conóceles, tiene como propósito brindar a la ciudadanía información 
        confiable de tu candidatura, respecto a tu trayectoria profesional, académica y política, así como tres de tus principales propuestas, con el objetivo de incentivar el voto informado y refrendar tu compromiso con la 
        transparencia y la ciudadanía. <br><br>
        En caso de tener algún problema para ingresar o capturar tu información contáctanos:</p> 
</div>
<div class="p-3 d-flex flex-column align-items-center col-12">
    <p class="titulo_1">Actividades Recientes</p>

</div>

<div class="w-10 d-flex justify-content-center">
    <div class="row col-11 col-lg-7">
        <div class="col-md-6 d-flex justify-content-between">
            <div class="col-3"><span class="circle_pink"><?php echo $count['identidad'] ?></span></div>
            <p>Hasta el momento se encuentran registrados <strong><?php echo $count['identidad'] ?></strong> 
            cuestionarios de identidad.</p>
         </div>
        <div class="col-md-6 d-flex justify-content-between">
            <div class="col-3"><span class="circle_pink"><?php echo $count['curricular'] ?></span></div>
                <p>Hasta el momento se encuentran registradas <strong><?php echo $count['curricular'] ?></strong> 
                síntesis curriculares.</p>
            </div>
        </div>
    </div>
</div>
<br>

<div class="border-2 border-top"></div>

<div class="p-3 d-flex flex-column align-items-center col-12">
    <p class="titulo_1">Estadísticas</p>
</div>

<div class="p-3 d-flex flex-column align-items-center justify-content-center col-12"><!-- modificar tamaño de letra a menor cuando esta en responsive -->
    <ul class="nav nav-pills mb-3 d-flex justify-content-between">
        <li class="nav-item" role="presentation" style="cursor: pointer;" onclick="activarPanel(1);">
            <a class="nav-link linkbtn text-smaller active" id="lnkboton1">Cuestionario curricular</a>
        </li>
        <li class="nav-item" role="presentation" style="cursor: pointer;" onclick="activarPanel(2); activarListEst(1);">
            <a class="nav-link linkbtn text-smaller" id="lnkboton2">Cuestionario de identidad</a>
        </li>
    </ul>
</div>

<div class="tab-content">
    <div class="container tab-pane fade show active flex-wrap justify-content-center justify-content-md-center" role="tabpanel" id="panel1">
        <div class="row flex-column flex-md-row">
            
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body contenedorX" id="chartContainer" style="height: 310px !important;"></div>
                    <br>
                    <div class="card-footer">
                        Total de registros desde el <?php echo $data_counter_foot["f_inicio"]; ?> al <?php echo $data_counter_foot["f_actual"]; ?>: 
                        <b class="rosa"> <?php echo $data_counter_foot["t_registros"]; ?> </b>
                    </div>
                </div>
            </div>
        </div><br>
        <div class="row flex-column flex-md-row d-none">
            <ul class="nav nav-tabs d-none justify-content-center justify-content-md-center nav-pills" id="tab_resp1">
                <li class="nav-item" role="presentation" onclick="swch_grafica(14); muestraGrafica(14,'REMOVER resp 1',2); activarListEst('_1');">
                    <a class="nav-link chrtlink active" id="chrt_link_1">rem 1</a>
                </li>
                <li class="nav-item" role="presentation" onclick="swch_grafica(15); muestraGrafica(15,'REMOVER resp 2',1); activarListEst('_2');">
                    <a class="nav-link chrtlink" id="chrt_link_2">rem 2</a>
                </li>
            </ul>

            <div class="col-md-6 graf_con" id="graf_14">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body-circle contenedorX" id="chartContainer14" style="height: 250px !important; width: 100% !important;">
                    </div>
                    <br>
                    <div class="card-footer">
                        Total de registros desde el <?php echo $data_counter_foot["f_inicio"]; ?> al <?php echo $data_counter_foot["f_actual"]; ?>: 
                        <b class="rosa"> <?php echo $data_counter_foot["t_registros"]; ?> </b>
                    </div>
                </div>
            </div>
            <div class="col-md-6 graf_con" id="graf_15">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body contenedorX" id="chartContainer15" style="height: 250px !important; width: 100% !important;">
                    </div>
                    <br>
                    <div class="card-footer">
                        Total de registros desde el <?php echo $data_counter_foot["f_inicio"]; ?> al <?php echo $data_counter_foot["f_actual"]; ?>: 
                        <b class="rosa"> <?php echo $data_counter_foot["t_registros"]; ?> </b>
                    </div>
                </div>
            </div>
        </div><br>

        <div class="row flex-column flex-md-row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body contenedorX" id="chartContainer16"  style="height: 350px !important; width: 100% !important;">
                    </div>
                    <br>
                    <div class="card-footer">
                        Total de registros desde el <?php echo $data_counter_foot["f_inicio"]; ?> al <?php echo $data_counter_foot["f_actual"]; ?>: 
                        <b class="rosa"> <?php echo $data_counter_foot["t_registros"]; ?> </b>
                    </div>
                </div>
            </div>
        </div>
    </div><br>

    <div class="container tab-pane fade active flex-wrap justify-content-center justify-content-md-center" role="tabpanel" id="panel2">
        
        <div class="row flex-column flex-md-row">
                
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body contenedorX" id="chartContainer17" style="height: 350px !important; width: 100% !important;">
                    </div>
                    <br>
                    <div class="card-footer">
                        Total de registros desde el <?php echo $data_counter_foot["f_inicio"]; ?> al <?php echo $data_counter_foot["f_actual"]; ?>: 
                        <b class="rosa"> <?php echo $data_counter_foot["t_registros"]; ?> </b>
                    </div>
                </div>
            </div>
        </div><br>

        

        <div class="col-md-11 d-none" id="lista_chrts2">
            <ul class="nav nav-tabs justify-content-center justify-content-md-center nav-pills">    
                
                <?php echo $html_lista_charts_estad_resp ?>
            </ul>
        </div>
        

        <div class="row flex-column flex-md-row">
            <div class="col-md-3" id="lista_chrts1">
                <?php echo $html_lista_charts_estad ?>
            </div>
                
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body contenedorX contX" id="chartContainer18" style="height: 250px !important; width: 100% !important; position: center !important">
                    </div><br>
                    <div class="card-footer">
                        Total de registros desde el <?php echo $data_counter_foot["f_inicio"]; ?> al <?php echo $data_counter_foot["f_actual"]; ?>: 
                        <b class="rosa"> <?php echo $data_counter_foot["t_registros"]; ?> </b>
                    </div>
                </div>
            </div>
        </div><br>

        <div class="row flex-column flex-md-row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body-circle contenedorX contX" id="chartContainer19" style="height: 270px !important; width: 100% !important; position: center !important">  
                    </div><br>
                    <div class="card-footer">
                        Total de registros desde el <?php echo $data_counter_foot["f_inicio"]; ?> al <?php echo $data_counter_foot["f_actual"]; ?>: 
                        <b class="rosa"> <?php echo $data_counter_foot["t_registros"]; ?> </b>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body-circle contenedorX contX" id="chartContainer20" style="height: 270px !important; width: 100% !important; position: center !important">
                    </div><br>
                    <div class="card-footer">
                        Total de registros desde el <?php echo $data_counter_foot["f_inicio"]; ?> al <?php echo $data_counter_foot["f_actual"]; ?>: 
                        <b class="rosa"> <?php echo $data_counter_foot["t_registros"]; ?> </b>
                    </div>
                </div>
            </div>
        </div>    
    </div>
</div>

<br>
<div class="border-2 border-top"></div>
<br>

<a href="<?php echo RUTA_SCRIPTS ?>"><img src="<?php echo RUTA_SCRIPTS ?>assets/img/consulta.png" class="img-fluid rounded mx-auto d-block" alt="Conoceles_consulta"> </a><p>&nbsp;</p>
