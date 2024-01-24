<script src="<?php echo RUTA_SCRIPTS ?>js/perfiles/main.js"></script>

<?php
ini_set('default_charset', 'UTF-8');

$id = (isset($_GET['id']) and is_numeric($_GET['id'])) ? $_GET['id'] : 0 ;

$msj_redir="<script>redir('".RUTA_SCRIPTS."index.php',3);</script>
            <p>Se va a redireccionar a la página principal.</p>";

if($id<=0) { echo "$msj_redir"; die(); }

require(RUTA_SCRIPTS. "gets/datos.php");

$existe=dataCandExiste($id);

if($existe['cont']==0) { echo "$msj_redir"; die(); }


$datosCandidato=getDataCandidato($id);

function getInterpDato($n, $dato){
    $r_dato="Sin definir";
    
    if($n==0){
        if((! is_null($dato)) && (! empty($dato)) && (! ctype_space($dato))) $r_dato=$dato;
    }

    if($n==1){
        if((! is_null($dato)) && (! empty($dato)) && ($dato != '-')) $r_dato=$dato;
    }


    if($n==2){
        $r_dato="Sin responder";
        if($dato==1) $r_dato="Sí";
        if($dato==2) $r_dato="No";
    }

    if($n==3){
        $r_dato="Sin responder";
        if($dato==1) $r_dato="Joven";
        if($dato==2) $r_dato="Mayor";
    }

    return $r_dato;
}


?>

<div><br>
    <div class="container">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn_back_rosa btn-rounded" type="button" onclick="location.href='../'">Regresar</button>
        </div>
        
        <div class="divisor__horizontal"></div>
        <div class="row">
            <div class="tema-area">
                <span class="color__span text-justify">Consulta la información <b>proporcionada de manera obligatoria</b> 
                por las candidaturas que participan en las contiendas electorales locales 2023. 
                <b>La información es responsabilidad de las mismas.</b>  El Instituto únicamente apoya para su difusión.</span>
            </div>
        </div>
        <div class="divisor__horizontal"></div>
        <div class="row">
            <div class="col-md-4">
                <!-- inicio -->
                <div class="a_gris" style="border-radius:30px; margin-right: 10px">
                    <div class="cent">
                        <img src="<?php if($datosCandidato['cand_img'] != "-") echo ".."."/assets/img".$datosCandidato['cand_img']; ?>" alt="Foto Candidatura" class="img-cand img-responsive">
                    </div>
                    <div>
                        <p class="text-c text-xl"><?php echo $datosCandidato['nom_comp']; ?></p>
                        <div class="cent">
                            <img class="img-pp-coal" src="<?php if($datosCandidato['pp_img'] !="-") echo RUTA_SCRIPTS.$datosCandidato['pp_img']; ?>" alt="COALICION">
                        </div>
                    </div><br>
                    <div>
                        <p class="text-c text-med">Direcciones de casa de campaña:</p>
                        <?php if($datosCandidato['dire_1'] !== "-") { ?>
                            <p class="text-c"><?php echo $datosCandidato['dire_1']; ?></p>
                        <?php } 

                        if($datosCandidato['dire_2'] !== "-") { ?>
                            <p class="text-c"><?php echo $datosCandidato['dire_2']; ?></p>
                        <?php }

                        if($datosCandidato['dire_3'] !== "-") { ?>
                            <p class="text-c"><?php echo $datosCandidato['dire_3']; ?></p>
                        <?php } ?>
                        
                    </div>
                    <br>
                    <div>
                        <p class="text-c text-med">Teléfonos: </p>
                        <?php if($datosCandidato['tel_1'] !== "-" && $datosCandidato['tel_1'] != 0) { ?>
                            <p class="text-c"><?php echo $datosCandidato['tel_1']; ?></p>
                        <?php } 

                        if($datosCandidato['tel_2'] !== "-" && $datosCandidato['tel_2'] != 0) { ?>
                            <p class="text-c"><?php echo $datosCandidato['tel_2']; ?></p>
                        <?php }

                        if($datosCandidato['tel_3'] !== "-" && $datosCandidato['tel_3'] != 0) { ?>
                            <p class="text-c"><?php echo $datosCandidato['tel_3']; ?></p>
                        <?php } ?>
                    </div>
                    <div><br>
                        <p class="text-c text-med">Correo electrónico: </p>
                        <?php if($datosCandidato['mail_1'] !== "-") { ?>
                            <p class="text-c"><?php echo $datosCandidato['mail_1']; ?></p>
                        <?php } 

                        if($datosCandidato['mail_2'] !== "-") { ?>
                            <p class="text-c"><?php echo $datosCandidato['mail_2']; ?></p>
                        <?php }

                        if($datosCandidato['mail_3'] !== "-") { ?>
                            <p class="text-c"><?php echo $datosCandidato['mail_3']; ?></p>
                        <?php } ?>

                    </div>
                    <div class="red_social">
                        <!-- <ul class="red_social">
                            <li>
                                <a class="btn btn-primary" style="background-color: #3b5998;" href="#!" role="button">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                        </ul> -->

                        <!-- principio -->

                        <!-- <ul>
                            <li>
                                <a class="red_social-facebook" href="#">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li>
                                <a class="red_social-twitter" href="#">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li>
                                <a class="red_social-instagram" href="#">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li>
                                <a class="red_social-google" href="#">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <i class="fa fa-google-plus" aria-hidden="true"></i>
                                </a>
                            </li>
                        </ul> -->

                        <!-- fin -->

                    </div>
                    <div class="row cent">
                        <div class="col-md-12 cent text-c"></div>
                        <div class="col-md-12 text-c">
                            <img src="tmp/img/compromiso.png" alt="compromiso 1" class="img-compr">
                        </div>
                        <div class="col-md-12 text-c">
                            <img src="tmp/img/compniad.png" alt="compromiso 2" class="img-compr">
                        </div>
                    </div>
                </div>
                <!-- fin -->
                
            </div>
            <div class="col-md-8">
                <div class="col-md-12 info-gen">
                    <img src="tmp/img/infoGen.png" class="igicon" alt=""> <label > <i class="fa-solid fa-clipboard-user"></i> Información general</label>
                </div>
                <div class="col-md-12 a_gris flexible">
                    <div class="col-md-2">
                        <label  class="form-control transparente">Propietario(a): </label>   
                    </div>
                    <div class="col-md-8">
                        <input type="text" value="<?php echo $datosCandidato['nom_comp']; ?>" disabled="true" class="form-control dato">
                    </div>
                </div>  
                <div class="col-md-12 a_gris flexible">
                    <div class="col-md-2 bloque">
                        <label  class="form-control transparente">Candidatura:</label>   
                    </div>
                    <div class="col-md-3">
                        <input type="text" value="<?php echo $datosCandidato['candidatura']; ?>" disabled="true" class="form-control dato">
                    </div>            
                    <div class="col-md-2 bloque">
                        <label  class="form-control transparente">Cargo:</label>   
                    </div>
                    <div class="col-md-3">
                        <input type="text" value="<?php echo $datosCandidato['cargo']; ?>" disabled="true" class="form-control dato">
                    </div>
                </div>
                <div class="col-md-12 a_gris flexible">
                    <div class="col-md-2 bloque">
                        <label  class="form-control transparente">Edad:</label>   
                    </div>
                    <div class="col-md-3">
                        <input type="text" value="<?php echo $datosCandidato['edad']; ?>" disabled="true" class="form-control dato">
                    </div>            
                    <div class="col-md-2 bloque">
                        <label  class="form-control transparente">Sexo:</label>   
                    </div>
                    <div class="col-md-3">
                        <input type="text" value="<?php echo $datosCandidato['sexo']; ?>" disabled="true" class="form-control dato">
                    </div>
                    <!-- 
                    <div class="col-md-2 text-center;">
                        <span><a href="?c=Candidatura&amp;a=ficha&amp;id=11" class="btn btn-secondary" title="Descargar Ficha en PDF" target="_blank"> 
                        <img src="tmp/img/pdf.png" width="25" height="25" alt="">
                        <span style="padding-left:5px;text-align:center;"> Descarga la ficha aquí</span></a> </span>
                    </div> -->
                </div>
                <!-- 
                <div class="col-md-12 a_gris flexible">
                    <div class="col-md-2 bloque">
                        <label  class="form-control transparente">Distrito:</label>   
                    </div>
                    <div class="col-md-8">
                        <input type="text" value="DEFINIR DISTRITO" disabled="true" class="form-control dato">
                    </div>
                </div> -->
                <div class="col-md-12 info-hist">
                    <img src="tmp/img/infoHist.png" class="igicon" alt=""> <i class="fa-solid fa-file-lines"></i> <label >  Información de Identidad</label>
                </div>
                <div class="col-md-12 a_gris flexible">
                    <div class="col-md-2 bloque">
                        <label  class="form-control transparente">Es persona Indígena:</label>   
                    </div>
                    <div class="col-md-2">
                        <input type="text" value="<?php echo getInterpDato(2, $datosCandidato['indigena_p1']); ?>" disabled="true" class="form-control dato">
                    </div>            
                    <div class="col-md-2 bloque">
                        <label  class="form-control transparente">Es persona Discapacitada:</label>   
                    </div>
                    <div class="col-md-2">
                        <input type="text" value="<?php echo getInterpDato(2, $datosCandidato['discapacidad_p1']); ?>" disabled="true" class="form-control dato">
                    </div>
                    <div class="col-md-2 bloque">
                        <label  class="form-control transparente">Es persona Afromexicana:</label>   
                    </div>
                    <div class="col-md-2">
                        <input type="text" value="<?php echo getInterpDato(2, $datosCandidato['afromexicano_p1']); ?>" disabled="true" class="form-control dato">
                    </div>
                </div>
                <div class="col-md-12 a_gris flexible">
                    <div class="col-md-2 ">
                        <label  class="form-control transparente">Está vinculado a LGBTTT+:</label>   
                    </div>
                    <div class="col-md-2">
                        <input type="text" value="<?php echo getInterpDato(2, $datosCandidato['lgbt_p1']); ?>" disabled="true" class="form-control dato">
                    </div>
                    <div class="col-md-2 bloque">
                        <label  class="form-control transparente">Se considera joven o mayor:</label>   
                    </div>
                    <div class="col-md-2">
                        <input type="text" value="<?php echo getInterpDato(3, $datosCandidato['joven_mayor']); ?>" disabled="true" class="form-control dato">
                    </div>                
                    
                </div>
                <div class="col-md-12 info-hist">
                    <img src="tmp/img/infoHist.png" class="igicon" alt=""> <i class="fa-solid fa-file-lines"></i> <label >  Información  curricular</label>
                </div>
                <div class="col-md-12 a_gris">
                    <div class="col-md-2 bloque"></div>
                    <div class="col-md-10"></div>            
                </div>
                <div class="col-md-12 info-cur">
                    <img src="tmp/img/infoCur.png" class="igicon" alt=""> <i class="fa fa-folder-open"></i>  <label >  Historia profesional y/o  laboral</label>
                </div>
                <div class="col-md-12 a_gris">
                    <div class="col-md-12" style="background-color:white;">
                        <div class="form-group solid rounded">
                            <!--<div class="etcent"><i class="fa fa-folder-open"></i> <label >Historia Profesiosonal y/o Laboral:</label><br></div>-->
                            <div class="col-md-12">
                                <textarea class="form-control" id="historia_prof" cols="30" rows="10" readonly="readonly"><?php echo getInterpDato(0, $datosCandidato['historia_prof']); ?></textarea>
                            </div>                             
                        </div>
                        <div class="form-group solid rounded">
                            <div class="etcent"><i class="fa fa-user-graduate"></i> <label >Estudios:</label><br></div>
                            <div class="col-md-12">
                                <!--<textarea name="" id="" cols="30" rows="2" readonly="readonly"> Licenciatura   </textarea>-->
                                <input type="text" id="grado" value="<?php echo $datosCandidato['grado']; ?>" disabled="true" class="form-control dato">
                            </div>                                
                        </div>
                        <div class="form-group solid rounded">
                            <div class="etcent"> <i class="fa-solid fa-chalkboard-user"></i> <label >Cursos:</label><br></div>
                            <div class="col-md-12">
                                <textarea class="form-control" id="otra_form_acad" cols="30" rows="10" readonly="readonly"><?php echo getInterpDato(0, $datosCandidato['otra_form_acad']); ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 info-hist">
                    <img src="tmp/img/infoHist.png" class="igicon" alt=""> <label > <i class="fa-regular fa-comment-dots fa-flip-horizontal"></i> ¿ Por qué quiero ocupar un cargo público ?</label>
                </div>
                <div class="col-md-12 a_gris">
                    <div class="col-md-12" style="background-color:white;">
                        <textarea class="form-control" id="por_que_ocupar" cols="30" rows="10" readonly="readonly"><?php echo getInterpDato(0, $datosCandidato['por_que_ocupar']); ?></textarea>
                    </div>
                </div>
                <div class="col-md-12 info-prop">
                    <img src="tmp/img/infoProp.png" class="igicon" alt=""> <label > <i class="fa-solid fa-person-chalkboard"></i> Propuestas electorales</label>
                </div>
                <div class="flexible">
                    <div class="col-md-6 a_gris marder">
                        <div class="col-md-12 a_gris text-center font-weight-bold" style="font-weight:bold;">Propuesta 1</div>
                        <div class="col-md-12" style="background-color:white;">
                            <textarea class="form-control" id="prop_1" cols="30" rows="10" readonly="readonly" style="height: 207px;"><?php echo getInterpDato(0, $datosCandidato['prop_1']); ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6 a_gris marizq">
                        <div class="col-md-12 a_gris text-center font-weight-bold" style="font-weight:bold;">Propuesta 2</div>
                        <div class="col-md-12" style="background-color:white;">
                            <textarea class="form-control" id="prop_2" cols="30" rows="10" readonly="readonly" style="height: 210px;"><?php echo getInterpDato(0, $datosCandidato['prop_2']); ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 info-gen salto">
                    <img src="tmp/img/infoGen.png" class="igicon" alt=""> <label  style="font-size: small;">
                    <i class="fa-solid fa-street-view"></i>Propuesta en materia de género o del grupo en situación de discriminación que representa</label>
                </div>
                <div class="col-md-12 a_gris ">
                    <div class="col-md-12" style="background-color:white;text-align:justify">
                        <textarea class="form-control" id="prop_gen" cols="30" rows="10" readonly="readonly"><?php echo getInterpDato(0, $datosCandidato['prop_gen']); ?></textarea>
                    </div>
                </div>
                <div class="col-md-12 info-hist">
                    <img src="tmp/img/infoHist.png" class="igicon" alt="">
                    <label ><i class="fa fa-arrow-trend-up"></i>  Trayectoria política y/o de participación social.</label>
                </div>
                <div class="col-md-12 a_gris ">
                    <div class="col-md-12" style="background-color:white;text-align:justify">
                        <textarea class="form-control" id="tray_politica" style="text-align:justify" cols="30" rows="10" readonly="readonly"><?php echo getInterpDato(0, $datosCandidato['tray_politica']); ?></textarea>
                    </div>
                </div>
                <div class="col-md-12 info-dec">
                    <img src="tmp/img/infoDec.png" class="igicon" alt=""> <label ><i class="fa-solid fa-file-pdf"></i>  Declaraciones.</label>
                </div>
                <div class="col-md-12 a_gris">
                    <div class="col-md-12 text-center" style="background-color:white;color:black">
                        <a href="tmp/pdf/DEFINIR RUTA ARCHIVO PDF.pdf" target="_blank">DEFINIR RUTA ARCHIVO.pdf
                            <img src="tmp/img/pdf.png" alt="PDFdeclaraciones" width="40" height="50">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- FIN -->
        <div class="divisor__horizontal"></div>
    </div>
</div>