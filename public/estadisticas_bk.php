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

<div><br>
    <div class="container">
        <div class="divisor__horizontal"></div>
        <p class="titulo_1 text-c">BIENVENIDAS CANDIDATAS Y CANDIDATOS</p>
        <div class="divisor__horizontal"></div>
        <p>El sistema Candidatas y Candidatos, Conóceles, tiene como propósito brindar a la ciudadanía información 
            confiable de tu candidatura, respecto a tu trayectoria profesional, académica y política, así como tres de 
            tus principales propuestas, con el objetivo de incentivar el voto informado y refrendar tu compromiso con la 
            transparencia y la ciudadanía.</p>
        <p>En caso de tener algún problema para ingresar o capturar tu información contáctanos:</p>
        <p class="titulo_1">Actividades Recientes</p>
        <div class="divisor__horizontal"></div>
        <div class="row">
            <div class="col-6">
                <div class="row">
                    <div class="col-4 center"><span class="circle_pink"><?php echo $count['identidad'] ?></span></div>
                    <div class="col-8 texto__m">Hasta el momento se encuentran registrados <strong><?php echo $count['identidad'] ?></strong>
                        cuestionarios de identidad.
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-4 center"><span class="circle_pink"><?php echo $count['curricular'] ?></span></div>
                    <div class="col-8 texto__m">
                        Hasta el momento se encuentran registradas <strong><?php echo $count['curricular'] ?></strong> síntesis curriculares.
                    </div>
                </div>
            </div>
        </div>
        <div class="divisor__horizontal"></div>
        <p class="titulo_1">Estadísticas</p><br>
        <ul class="nav nav-pills mb-3">
            <li class="nav-item" role="presentation" style="cursor: pointer;" onclick="activarPanel(1);">
                <a class="nav-link linkbtn active" id="lnkboton1">Cuestionario curricular</a>
            </li>
            <li class="nav-item" role="presentation" style="cursor: pointer;" onclick="activarPanel(2); activarListEst(1);">
                <a class="nav-link linkbtn" id="lnkboton2">Cuestionario de identidad</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" role="tabpanel" id="panel1">
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10">
                        <div class="card">
                            <div class="card-header"></div>
                            <div class="card-body contenedorX" id="chartContainer" style="height: 310px !important;">
                            </div>
                            <br>
                            <div class="card-footer">
                                Total de registros desde el <?php echo $data_counter_foot["f_inicio"]; ?> al <?php echo $data_counter_foot["f_actual"]; ?>: 
                                <b class="rosa"> <?php echo $data_counter_foot["t_registros"]; ?> </b>
                            </div>
                        </div>
                    </div>
                    <div class="col-1"></div>
                </div><br>
                <div class="row" style="display: none;">
                <!-- div class="row" -->
                    <div class="col-1"></div>
                    <div class="col-5">
                        <div class="card">
                            <div class="card-header"></div>
                            <div class="card-body-circle contenedorX" id="chartContainer14">
                            </div>
                            <br>
                            <div class="card-footer">
                                Total de registros desde el <?php echo $data_counter_foot["f_inicio"]; ?> al <?php echo $data_counter_foot["f_actual"]; ?>: 
                                <b class="rosa"> <?php echo $data_counter_foot["t_registros"]; ?> </b>
                            </div>
                        </div>
                    </div>
                    <div class="col-5">
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
                    <div class="col-1"></div>
                </div><br>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10">
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
                    <div class="col-1"></div>
                </div>
            </div>
            <div class="tab-pane fade" role="tabpanel" id="panel2">
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10">
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
                    <div class="col-1"></div>
                </div><br><br>
                <div class="row">
                    <div class="col-3">
                        <?php echo $html_lista_charts_estad ?>

                    </div>
                    <div class="col-9">
                        <div class="tab-content">
                            <div class="tab-pane fade" role="tabpanel" id="panel3">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header"> </div>
                                            <div class="card-body contenedorX contX" id="chartContainer18" style="height: 370px !important; width: 100% !important; position: center !important">
    
                                            </div>
                                            <br>
                                            <div class="card-footer">
                                                Total de registros desde el <?php echo $data_counter_foot["f_inicio"]; ?> al <?php echo $data_counter_foot["f_actual"]; ?>: 
                                                <b class="rosa"> <?php echo $data_counter_foot["t_registros"]; ?> </b>
                                            </div>
                                        </div>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="card">
                                            <div class="card-header"> </div>
                                            <div class="card-body-circle contenedorX contX" id="chartContainer19">
                                                
                                            </div>
                                            <br>
                                            <div class="card-footer">
                                                Total de registros desde el <?php echo $data_counter_foot["f_inicio"]; ?> al <?php echo $data_counter_foot["f_actual"]; ?>: 
                                                <b class="rosa"> <?php echo $data_counter_foot["t_registros"]; ?> </b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="card">
                                            <div class="card-header"> </div>
                                            <div class="card-body-circle contenedorX contX" id="chartContainer20">
                                                
                                            </div>
                                            <br>
                                            <div class="card-footer">
                                                Total de registros desde el <?php echo $data_counter_foot["f_inicio"]; ?> al <?php echo $data_counter_foot["f_actual"]; ?>: 
                                                <b class="rosa"> <?php echo $data_counter_foot["t_registros"]; ?> </b>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="divisor__horizontal"></div>
        <a href="<?php echo RUTA_SCRIPTS ?>"><img src="<?php echo RUTA_SCRIPTS ?>assets/img/consulta.png" class="img-fluid rounded mx-auto d-block" alt="Conoceles_consulta"> </a><p>&nbsp;</p>
    </div>
</div>