<?php

ini_set('default_charset', 'UTF-8');

if(!isset($dbOn)) { $dbOn=true; require(RUTA_SCRIPTS. "comm/getDBEnlace.php"); }

// contador de pie de gráficas
function getDataCounterFooter(){
    $resp="";
    $q="SELECT DATE_FORMAT(MIN(cu.fecha_reg),'%e de %M de %Y') f_inicio, DATE_FORMAT(MAX(cu.fecha_reg),'%e de %M de %Y') f_actual, Count(cc.id_user) t_registros
        FROM c_candidatos cc, c_usuarios cu
        WHERE cu.id_user=cc.id_user;";
    
    $result=dbConexion($q);
    
    return isset($result[0]) ? $result[0] : ["f_inicio"=>null, "f_actual"=>null, "t_registros"=>null];
}

// lista de catálogos
function getCatList($n){
    if($n == 1) $q = "SELECT * FROM cat_grad_academ ORDER BY id";
    if($n == 2) $q = "SELECT * FROM cat_pp ORDER BY id";
    if($n == 3) $q = "SELECT * FROM cat_charts ORDER BY id";
    if($n == 4) $q = "SELECT * FROM cat_sexo ORDER BY id";
    
    $result = dbConexion($q);

    return $result;
}

// lista de catálogos de la página estadísticas
function getCatListEst($n){
    if($n == 1) $q = "SELECT(SELECT Count(cc.id) FROM cuest_curricular cc WHERE cc.status=1) curricular, (SELECT Count(ci.id) FROM cuest_identidad ci WHERE ci.status=1) identidad";
    if($n == 2) $q = "SELECT * FROM cat_charts_estad ORDER BY id";

    $result = dbConexion($q);

    return $result;
}

// se generan consultas para obtener datos json para cada gráfica para la página principal
function getjsData($chart_num){
    $datos= array();

    $ua="UNION ALL";
    $t="(SELECT COUNT(px.id) FROM c_candidatos px)"; // listo
    $t1="(SELECT COUNT(p1.id) FROM c_candidatos p1, cuest_curricular ccu1 WHERE ccu1.status=1 AND p1.id_user=ccu1.id_user_cand AND ccu1.id_grad_acad=ga.id)"; // listo

    // listo
    if($chart_num==1) $q[] = "SELECT c_pp.nom_cor label, (SELECT COUNT(cca.id) FROM c_cand_ayun cca WHERE cca.pp=c_pp.id)+
                             (SELECT COUNT(ccdmr.id) FROM c_cand_dip_mr ccdmr WHERE ccdmr.pp=c_pp.id)+
                             (SELECT COUNT(ccdrp.id) FROM c_cand_dip_rp ccdrp WHERE ccdrp.pp=c_pp.id) y
                             FROM cat_pp c_pp ORDER BY c_pp.id";
    
    // listo
    if($chart_num==2) $q[] = "SELECT ".$t1." y, ga.nombre_cor legendText, CONCAT(ROUND((".$t1."*100)/".$t.",2),'% ',ga.nombre_com) indexLabel FROM cat_grad_academ ga ORDER BY ga.id";

    // listo
    if($chart_num==3) {
        $q_cca="SELECT COUNT(cca.id) FROM c_cand_ayun cca WHERE ((TIMESTAMPDIFF(YEAR,cca.f_nacimiento,NOW()))";
        $q_ccdmr="SELECT COUNT(ccdmr.id) FROM c_cand_dip_mr ccdmr WHERE ((TIMESTAMPDIFF(YEAR,ccdmr.f_nacimiento,NOW()))";
        $q_ccdrp="SELECT COUNT(ccdrp.id) FROM c_cand_dip_rp ccdrp WHERE ((TIMESTAMPDIFF(YEAR,ccdrp.f_nacimiento,NOW()))";

        $rango[0]=" BETWEEN 21 AND 29";
        $rango[1]=" BETWEEN 30 AND 39";
        $rango[2]=" BETWEEN 40 AND 49";
        $rango[3]=" BETWEEN 50 AND 59";
        $rango[4]=" >= 60";

        $rango_ti[0]="De 21 a 29 años";
        $rango_ti[1]="De 30 a 39 años";
        $rango_ti[2]="De 40 a 49 años";
        $rango_ti[3]="De 50 a 59 años";
        $rango_ti[4]="De 60 años o más";

        for($i=0;$i<=4;$i++){
            $query[$i]="SELECT(".$q_cca.$rango[$i]."))+(".$q_ccdmr.$rango[$i]."))+(".$q_ccdrp.$rango[$i].")) y, CONCAT('".$rango_ti[$i]."') label";
        }

        $q_m="";
        for($j=0;$j<=4;$j++){
            if($j>0) $q_m.=" ".$ua." ";
            $q_m.=$query[$j];
        }
                
        $q[]=$q_m;
    }
    
    // listo
    if($chart_num==4) {
        $q_cca="SELECT COUNT(cca.id) FROM c_cand_ayun cca WHERE cca.pp=pp.id AND cca.sexo=";
        $q_ccdmr="SELECT COUNT(ccdmr.id) FROM c_cand_dip_mr ccdmr WHERE ccdmr.pp=pp.id AND ccdmr.sexo=";
        $q_ccdrp="SELECT COUNT(ccdrp.id) FROM c_cand_dip_rp ccdrp WHERE ccdrp.pp=pp.id AND ccdrp.sexo=";
        $q_cond=" y, pp.nom_cor label FROM cat_pp pp ORDER BY pp.id";

        // Para sexo femenino sexo=1
        $q[]="SELECT (".$q_cca."1)+(".$q_ccdmr."1)+(".$q_ccdrp."1)".$q_cond;

        // Para sexo masculino sexo=2
        $q[]="SELECT (".$q_cca."2)+(".$q_ccdmr."2)+(".$q_ccdrp."2)".$q_cond;
        
        // Para sexo no binario sexo=3
        $q[]="SELECT (".$q_cca."3)+(".$q_ccdmr."3)+(".$q_ccdrp."3)".$q_cond;

        // Para sexo otro género sexo=4
        $q[]="SELECT (".$q_cca."4)+(".$q_ccdmr."4)+(".$q_ccdrp."4)".$q_cond;
    }
    
    // Queries reciben respuesta afirmativa  LISTO
    $sel1[0]="SELECT (COUNT(p0.id)) y, CONCAT('Sí') legendText, CONCAT(ROUND((COUNT(p0.id)*100)/".$t.",2),'% Personas dijeron sí') indexLabel FROM c_candidatos p0, cuest_identidad cid0 WHERE cid0.status=1 AND p0.id_user=cid0.id_user_cand AND cid0.";
    $sel1[1]="SELECT (COUNT(p0.id)) y, CONCAT('Jóvenes') legendText, CONCAT(ROUND((COUNT(p0.id)*100)/".$t.",2),'% Personas se consideran jóvenes') indexLabel FROM c_candidatos p0, cuest_identidad cid0 WHERE cid0.status=1 AND p0.id_user=cid0.id_user_cand AND cid0.";
    $sel1[2]="SELECT (COUNT(p0.id)) y, CONCAT('Mayores') legendText, CONCAT(ROUND((COUNT(p0.id)*100)/".$t.",2),'% Personas se consideran mayores') indexLabel FROM c_candidatos p0, cuest_identidad cid0 WHERE cid0.status=1 AND p0.id_user=cid0.id_user_cand AND cid0.";

    // Queries reciben respuesta negativa  LISTO
    $sel2[0]="SELECT (COUNT(p1.id)) y, CONCAT('No') legendText, CONCAT(ROUND((COUNT(p1.id)*100)/".$t.",2),'% Personas dijeron no') indexLabel FROM c_candidatos p1, cuest_identidad cid1 WHERE cid1.status=1 AND p1.id_user=cid1.id_user_cand AND cid1.";
    $sel2[1]="SELECT (COUNT(p1.id)) y, CONCAT('No jóvenes') legendText, CONCAT(ROUND((COUNT(p1.id)*100)/".$t.",2),'% Personas no se consideran jóvenes') indexLabel FROM c_candidatos p1, cuest_identidad cid1 WHERE cid1.status=1 AND p1.id_user=cid1.id_user_cand AND cid1.";
    $sel2[2]="SELECT (COUNT(p1.id)) y, CONCAT('No mayores') legendText, CONCAT(ROUND((COUNT(p1.id)*100)/".$t.",2),'% Personas no se consideran mayores') indexLabel FROM c_candidatos p1, cuest_identidad cid1 WHERE cid1.status=1 AND p1.id_user=cid1.id_user_cand AND cid1.";

    // Query recibe sin respuesta  LISTO
    $sel3="SELECT (COUNT(p2.id)) y, CONCAT('Sin respuesta') legendText, CONCAT(ROUND((COUNT(p2.id)*100)/".$t.",2),'% Personas no respondieron') indexLabel FROM c_candidatos p2, cuest_identidad cid2 WHERE cid2.status=1 AND p2.id_user=cid2.id_user_cand AND cid2.";

    // listo
    if($chart_num==5) $q[] = "SELECT CASE WHEN (ccu.ing_mensual < 5000) THEN 'Menos de $5,000' ELSE CASE WHEN (ccu.ing_mensual BETWEEN 5000 AND 10000) THEN 'De $5,000 a $10,000' ELSE CASE WHEN (ccu.ing_mensual BETWEEN 10000.01 AND 20000) THEN 'De más de $10,000 a $20,000' ELSE CASE WHEN (ccu.ing_mensual > 20000) THEN 'Más de $20,000' END END END END label, ROUND((COUNT(ccu.ing_mensual)*100)/".$t.",2) y FROM cuest_curricular ccu WHERE ccu.status=1 GROUP BY label";
    
    // listo  SI=1 NO=2 SIN_RESPUESTA=3
    if($chart_num==6) $q[] = $sel1[0]."indigena_p1=1 ".$ua." ".$sel2[0]."indigena_p1=2 ".$ua." ".$sel3."indigena_p1=3";
    if($chart_num==7) $q[] = $sel1[0]."discapacidad_p1=1 ".$ua." ".$sel2[0]."discapacidad_p1=2 ".$ua." ".$sel3."discapacidad_p1=3";
    if($chart_num==8) $q[] = $sel1[0]."afromexicano_p1=1 ".$ua." ".$sel2[0]."afromexicano_p1=2 ".$ua." ".$sel3."afromexicano_p1=3";
    if($chart_num==9) $q[] = $sel1[0]."lgbt_p1=1 ".$ua." ".$sel2[0]."lgbt_p1=2 ".$ua." ".$sel3."lgbt_p1=3";
    if($chart_num==10) $q[] = $sel1[0]."migrante_p1=1 ".$ua." ".$sel2[0]."migrante_p1=2 ".$ua." ".$sel3."migrante_p1=3";
    
    // listo
    // JOVEN=1  MAYOR=2  SIN_RESPUESTA=3
    if($chart_num==11) $q[] = $sel1[1]."joven_mayor=1 ".$ua." ".$sel2[1]."joven_mayor=2 ".$ua." ".$sel3."joven_mayor=3";
    if($chart_num==12) $q[] = $sel1[2]."joven_mayor=2 ".$ua." ".$sel2[2]."joven_mayor=1 ".$ua." ".$sel3."joven_mayor=3";

    foreach($q as $n){
        $r=dbConexion($n);
        $datos[]=json_encode($r, JSON_NUMERIC_CHECK);
    }

    return $datos;

}

// se generan consultas para obtener datos json para cada gráfica para la página de estadísticas
function getjsDataEst($chart_num){
    $datos= array();

    $ua="UNION ALL";
    $t="(SELECT COUNT(px.id) FROM c_candidatos px)";  // listo
    $t1="SELECT count(ccu1.id) FROM cuest_curricular ccu1 WHERE ccu1.status=1 AND ccu1.id_grad_acad=ga.id";  // listo

    
    // POR AHORA SON DATOS DE PRUEBA, SE VA A REQUERIR ANALIZAR QUE DATOS SON LOS QUE CONVENDRÁN MOSTRARSE PARA CADA
    // OPCIÓN DE LA LISTA DE ESTADÍSITCAS
    // listo
    if($chart_num==13) $q[] = "SELECT c_pp.nom_cor label, (SELECT COUNT(cca.id) FROM c_cand_ayun cca, cuest_curricular cc0 WHERE cc0.status=1 AND cca.id_user=cc0.id_user_cand AND cca.pp=c_pp.id)+
                              (SELECT COUNT(ccdmr.id) FROM c_cand_dip_mr ccdmr, cuest_curricular cc1 WHERE cc1.status=1 AND ccdmr.id_user=cc1.id_user_cand AND ccdmr.pp=c_pp.id)+
                              (SELECT COUNT(ccdrp.id) FROM c_cand_dip_rp ccdrp, cuest_curricular cc2 WHERE cc2.status=1 AND ccdrp.id_user=cc2.id_user_cand AND ccdrp.pp=c_pp.id) y
                              FROM cat_pp c_pp ORDER BY c_pp.id";
    
    // listo
    if($chart_num==14) $q[] = "SELECT CASE WHEN (ccu.ing_mensual < 5000) THEN 'Menos de $5,000' ELSE CASE WHEN (ccu.ing_mensual BETWEEN 5000 AND 10000) THEN 'De $5,000 a $10,000' ELSE CASE WHEN (ccu.ing_mensual BETWEEN 10000.01 AND 20000) THEN 'De más de $10,000 a $20,000' ELSE CASE WHEN (ccu.ing_mensual > 20000) THEN 'Más de $20,000' END END END END label, ROUND((COUNT(ccu.ing_mensual)*100)/".$t.",2) y FROM cuest_curricular ccu WHERE ccu.status=1 GROUP BY label";

    // listo
    if($chart_num==15) $q[] = "SELECT c_pp.nom_cor label, (SELECT COUNT(cca.id) FROM c_cand_ayun cca WHERE cca.pp=c_pp.id)+
                              (SELECT COUNT(ccdmr.id) FROM c_cand_dip_mr ccdmr WHERE ccdmr.pp=c_pp.id)+
                              (SELECT COUNT(ccdrp.id) FROM c_cand_dip_rp ccdrp WHERE ccdrp.pp=c_pp.id) y
                              FROM cat_pp c_pp ORDER BY c_pp.id";

    // listo
    if($chart_num==16) {
        $q_cca="SELECT COUNT(cca.id) FROM c_cand_ayun cca, cuest_curricular cc0 WHERE cc0.status=1 AND cca.id_user=cc0.id_user_cand AND cca.pp=pp.id AND cca.sexo=";
        $q_ccdmr="SELECT COUNT(ccdmr.id) FROM c_cand_dip_mr ccdmr, cuest_curricular cc1 WHERE cc1.status=1 AND ccdmr.id_user=cc1.id_user_cand AND ccdmr.pp=pp.id AND ccdmr.sexo=";
        $q_ccdrp="SELECT COUNT(ccdrp.id) FROM c_cand_dip_rp ccdrp, cuest_curricular cc2 WHERE cc2.status=1 AND ccdrp.id_user=cc2.id_user_cand AND ccdrp.pp=pp.id AND ccdrp.sexo=";
        $q_cond=" y, pp.nom_cor label FROM cat_pp pp ORDER BY pp.id";

        // Para sexo femenino sexo=1
        $q[]="SELECT (".$q_cca."1)+(".$q_ccdmr."1)+(".$q_ccdrp."1)".$q_cond;

        // Para sexo masculino sexo=2
        $q[]="SELECT (".$q_cca."2)+(".$q_ccdmr."2)+(".$q_ccdrp."2)".$q_cond;
        
        // Para sexo no binario sexo=3
        $q[]="SELECT (".$q_cca."3)+(".$q_ccdmr."3)+(".$q_ccdrp."3)".$q_cond;

        // Para sexo otro género sexo=4
        $q[]="SELECT (".$q_cca."4)+(".$q_ccdmr."4)+(".$q_ccdrp."4)".$q_cond;
    }

    // listo
    if($chart_num==17) {
        $q_cca="SELECT COUNT(cca.id) FROM c_cand_ayun cca, cuest_identidad ci0 WHERE ci0.status=1 AND cca.id_user=ci0.id_user_cand AND cca.pp=pp.id AND cca.sexo=";
        $q_ccdmr="SELECT COUNT(ccdmr.id) FROM c_cand_dip_mr ccdmr, cuest_identidad ci1 WHERE ci1.status=1 AND ccdmr.id_user=ci1.id_user_cand AND ccdmr.pp=pp.id AND ccdmr.sexo=";
        $q_ccdrp="SELECT COUNT(ccdrp.id) FROM c_cand_dip_rp ccdrp, cuest_identidad ci2 WHERE ci2.status=1 AND ccdrp.id_user=ci2.id_user_cand AND ccdrp.pp=pp.id AND ccdrp.sexo=";
        $q_cond=" y, pp.nom_cor label FROM cat_pp pp ORDER BY pp.id";

        // Para sexo femenino sexo=1
        $q[]="SELECT (".$q_cca."1)+(".$q_ccdmr."1)+(".$q_ccdrp."1)".$q_cond;

        // Para sexo masculino sexo=2
        $q[]="SELECT (".$q_cca."2)+(".$q_ccdmr."2)+(".$q_ccdrp."2)".$q_cond;
        
        // Para sexo no binario sexo=3
        $q[]="SELECT (".$q_cca."3)+(".$q_ccdmr."3)+(".$q_ccdrp."3)".$q_cond;

        // Para sexo otro género sexo=4
        $q[]="SELECT (".$q_cca."4)+(".$q_ccdmr."4)+(".$q_ccdrp."4)".$q_cond;
    }

    // listo
    if($chart_num==18) {
        $q_cca="SELECT COUNT(cca.id) FROM c_cand_ayun cca, cuest_identidad ci0 WHERE ci0.status=1 AND ci0.indigena_p1=1 AND cca.id_user=ci0.id_user_cand AND cca.pp=pp.id AND cca.sexo=";
        $q_ccdmr="SELECT COUNT(ccdmr.id) FROM c_cand_dip_mr ccdmr, cuest_identidad ci1 WHERE ci1.status=1 AND ci1.indigena_p1=1 AND ccdmr.id_user=ci1.id_user_cand AND ccdmr.pp=pp.id AND ccdmr.sexo=";
        $q_ccdrp="SELECT COUNT(ccdrp.id) FROM c_cand_dip_rp ccdrp, cuest_identidad ci2 WHERE ci2.status=1 AND ci2.indigena_p1=1 AND ccdrp.id_user=ci2.id_user_cand AND ccdrp.pp=pp.id AND ccdrp.sexo=";
        $q_cond=" y, pp.nom_cor label FROM cat_pp pp ORDER BY pp.id";

        // Para sexo femenino sexo=1
        $q[]="SELECT (".$q_cca."1)+(".$q_ccdmr."1)+(".$q_ccdrp."1)".$q_cond;

        // Para sexo masculino sexo=2
        $q[]="SELECT (".$q_cca."2)+(".$q_ccdmr."2)+(".$q_ccdrp."2)".$q_cond;
        
        // Para sexo no binario sexo=3
        $q[]="SELECT (".$q_cca."3)+(".$q_ccdmr."3)+(".$q_ccdrp."3)".$q_cond;

        // Para sexo otro género sexo=4
        $q[]="SELECT (".$q_cca."4)+(".$q_ccdmr."4)+(".$q_ccdrp."4)".$q_cond;
    }

    //Nuevos queries
    $q_cca_ini="SELECT count(cca.id) FROM c_cand_ayun cca, cuest_identidad ci WHERE ci.status=1 AND cca.pp=pp.id AND cca.id_user=ci.id_user_cand";
    $q_ccdmr_ini="SELECT count(ccdmr.id) FROM c_cand_dip_mr ccdmr, cuest_identidad ci WHERE ci.status=1 AND ccdmr.pp=pp.id AND ccdmr.id_user=ci.id_user_cand";
    $q_ccdrp_ini="SELECT count(ccdrp.id) FROM c_cand_dip_rp ccdrp, cuest_identidad ci WHERE ci.status=1 AND ccdrp.pp=pp.id AND ccdrp.id_user=ci.id_user_cand";
    $q_cond_ini=" indexLabel FROM cat_pp pp ORDER BY pp.id";
    $t1_ini="SELECT count(ccu1.id) FROM cuest_curricular ccu1, cuest_identidad ci1 WHERE ccu1.id_user_cand=ci1.id_user_cand AND ccu1.id_grad_acad=ga.id AND ccu1.status=1 AND ci1.status=1 AND ci1.";


    if($chart_num==19) {
        $q_cca=$q_cca_ini." AND ci.indigena_p1=1";
        $q_ccdmr=$q_ccdmr_ini." AND ci.indigena_p1=1";
        $q_ccdrp=$q_ccdrp_ini." AND ci.indigena_p1=1";
        
        $q[]="SELECT (".$q_cca.")+(".$q_ccdmr.")+(".$q_ccdrp.") y, pp.nom_cor legendText, CONCAT(ROUND(((".$q_cca.")*100)/(".$t."),2)+ROUND(((".$q_ccdmr.")*100)/(".$t."),2)+ROUND(((".$q_ccdrp.")*100)/(".$t."),2),'% ',pp.nom_com)".$q_cond_ini;
    }
    if($chart_num==20) $q[] = "SELECT (".$t1_ini."indigena_p1=1) y, ga.nombre_cor legendText, CONCAT(ROUND(((".$t1_ini."indigena_p1=1)*100)/".$t.",2),'% ',ga.nombre_com) indexLabel FROM cat_grad_academ ga ORDER BY ga.id";

    // listo
    if($chart_num==21) {
        $q_cca="SELECT COUNT(cca.id) FROM c_cand_ayun cca, cuest_identidad ci0 WHERE ci0.status=1 AND ci0.discapacidad_p1=1 AND cca.id_user=ci0.id_user_cand AND cca.pp=pp.id AND cca.sexo=";
        $q_ccdmr="SELECT COUNT(ccdmr.id) FROM c_cand_dip_mr ccdmr, cuest_identidad ci1 WHERE ci1.status=1 AND ci1.discapacidad_p1=1 AND ccdmr.id_user=ci1.id_user_cand AND ccdmr.pp=pp.id AND ccdmr.sexo=";
        $q_ccdrp="SELECT COUNT(ccdrp.id) FROM c_cand_dip_rp ccdrp, cuest_identidad ci2 WHERE ci2.status=1 AND ci2.discapacidad_p1=1 AND ccdrp.id_user=ci2.id_user_cand AND ccdrp.pp=pp.id AND ccdrp.sexo=";
        $q_cond=" y, pp.nom_cor label FROM cat_pp pp ORDER BY pp.id";

        // Para sexo femenino sexo=1
        $q[]="SELECT (".$q_cca."1)+(".$q_ccdmr."1)+(".$q_ccdrp."1)".$q_cond;

        // Para sexo masculino sexo=2
        $q[]="SELECT (".$q_cca."2)+(".$q_ccdmr."2)+(".$q_ccdrp."2)".$q_cond;
        
        // Para sexo no binario sexo=3
        $q[]="SELECT (".$q_cca."3)+(".$q_ccdmr."3)+(".$q_ccdrp."3)".$q_cond;

        // Para sexo otro género sexo=4
        $q[]="SELECT (".$q_cca."4)+(".$q_ccdmr."4)+(".$q_ccdrp."4)".$q_cond;
    }

    if($chart_num==22) {
        $q_cca=$q_cca_ini." AND ci.discapacidad_p1=1";
        $q_ccdmr=$q_ccdmr_ini." AND ci.discapacidad_p1=1";
        $q_ccdrp=$q_ccdrp_ini." AND ci.discapacidad_p1=1";
        
        $q[]="SELECT (".$q_cca.")+(".$q_ccdmr.")+(".$q_ccdrp.") y, pp.nom_cor legendText, CONCAT(ROUND(((".$q_cca.")*100)/(".$t."),2)+ROUND(((".$q_ccdmr.")*100)/(".$t."),2)+ROUND(((".$q_ccdrp.")*100)/(".$t."),2),'% ',pp.nom_com)".$q_cond_ini;
    }
    if($chart_num==23) $q[] = "SELECT (".$t1_ini."discapacidad_p1=1) y, ga.nombre_cor legendText, CONCAT(ROUND(((".$t1_ini."discapacidad_p1=1)*100)/".$t.",2),'% ',ga.nombre_com) indexLabel FROM cat_grad_academ ga ORDER BY ga.id";

    // listo
    if($chart_num==24) {
        $q_cca="SELECT COUNT(cca.id) FROM c_cand_ayun cca, cuest_identidad ci0 WHERE ci0.status=1 AND ci0.afromexicano_p1=1 AND cca.id_user=ci0.id_user_cand AND cca.pp=pp.id AND cca.sexo=";
        $q_ccdmr="SELECT COUNT(ccdmr.id) FROM c_cand_dip_mr ccdmr, cuest_identidad ci1 WHERE ci1.status=1 AND ci1.afromexicano_p1=1 AND ccdmr.id_user=ci1.id_user_cand AND ccdmr.pp=pp.id AND ccdmr.sexo=";
        $q_ccdrp="SELECT COUNT(ccdrp.id) FROM c_cand_dip_rp ccdrp, cuest_identidad ci2 WHERE ci2.status=1 AND ci2.afromexicano_p1=1 AND ccdrp.id_user=ci2.id_user_cand AND ccdrp.pp=pp.id AND ccdrp.sexo=";
        $q_cond=" y, pp.nom_cor label FROM cat_pp pp ORDER BY pp.id";

        // Para sexo femenino sexo=1
        $q[]="SELECT (".$q_cca."1)+(".$q_ccdmr."1)+(".$q_ccdrp."1)".$q_cond;

        // Para sexo masculino sexo=2
        $q[]="SELECT (".$q_cca."2)+(".$q_ccdmr."2)+(".$q_ccdrp."2)".$q_cond;
        
        // Para sexo no binario sexo=3
        $q[]="SELECT (".$q_cca."3)+(".$q_ccdmr."3)+(".$q_ccdrp."3)".$q_cond;

        // Para sexo otro género sexo=4
        $q[]="SELECT (".$q_cca."4)+(".$q_ccdmr."4)+(".$q_ccdrp."4)".$q_cond;
    }

    if($chart_num==25) {
        $q_cca=$q_cca_ini." AND ci.afromexicano_p1=1";
        $q_ccdmr=$q_ccdmr_ini." AND ci.afromexicano_p1=1";
        $q_ccdrp=$q_ccdrp_ini." AND ci.afromexicano_p1=1";
        
        $q[]="SELECT (".$q_cca.")+(".$q_ccdmr.")+(".$q_ccdrp.") y, pp.nom_cor legendText, CONCAT(ROUND(((".$q_cca.")*100)/(".$t."),2)+ROUND(((".$q_ccdmr.")*100)/(".$t."),2)+ROUND(((".$q_ccdrp.")*100)/(".$t."),2),'% ',pp.nom_com)".$q_cond_ini;
    }
    if($chart_num==26) $q[] = "SELECT (".$t1_ini."afromexicano_p1=1) y, ga.nombre_cor legendText, CONCAT(ROUND(((".$t1_ini."afromexicano_p1=1)*100)/".$t.",2),'% ',ga.nombre_com) indexLabel FROM cat_grad_academ ga ORDER BY ga.id";

    // listo
    if($chart_num==27) {
        $q_cca="SELECT COUNT(cca.id) FROM c_cand_ayun cca, cuest_identidad ci0 WHERE ci0.status=1 AND ci0.lgbt_p1=1 AND cca.id_user=ci0.id_user_cand AND cca.pp=pp.id AND cca.sexo=";
        $q_ccdmr="SELECT COUNT(ccdmr.id) FROM c_cand_dip_mr ccdmr, cuest_identidad ci1 WHERE ci1.status=1 AND ci1.lgbt_p1=1 AND ccdmr.id_user=ci1.id_user_cand AND ccdmr.pp=pp.id AND ccdmr.sexo=";
        $q_ccdrp="SELECT COUNT(ccdrp.id) FROM c_cand_dip_rp ccdrp, cuest_identidad ci2 WHERE ci2.status=1 AND ci2.lgbt_p1=1 AND ccdrp.id_user=ci2.id_user_cand AND ccdrp.pp=pp.id AND ccdrp.sexo=";
        $q_cond=" y, pp.nom_cor label FROM cat_pp pp ORDER BY pp.id";

        // Para sexo femenino sexo=1
        $q[]="SELECT (".$q_cca."1)+(".$q_ccdmr."1)+(".$q_ccdrp."1)".$q_cond;

        // Para sexo masculino sexo=2
        $q[]="SELECT (".$q_cca."2)+(".$q_ccdmr."2)+(".$q_ccdrp."2)".$q_cond;
        
        // Para sexo no binario sexo=3
        $q[]="SELECT (".$q_cca."3)+(".$q_ccdmr."3)+(".$q_ccdrp."3)".$q_cond;

        // Para sexo otro género sexo=4
        $q[]="SELECT (".$q_cca."4)+(".$q_ccdmr."4)+(".$q_ccdrp."4)".$q_cond;
    }

    if($chart_num==28) {
        $q_cca=$q_cca_ini." AND ci.lgbt_p1=1";
        $q_ccdmr=$q_ccdmr_ini." AND ci.lgbt_p1=1";
        $q_ccdrp=$q_ccdrp_ini." AND ci.lgbt_p1=1";
        
        $q[]="SELECT (".$q_cca.")+(".$q_ccdmr.")+(".$q_ccdrp.") y, pp.nom_cor legendText, CONCAT(ROUND(((".$q_cca.")*100)/(".$t."),2)+ROUND(((".$q_ccdmr.")*100)/(".$t."),2)+ROUND(((".$q_ccdrp.")*100)/(".$t."),2),'% ',pp.nom_com)".$q_cond_ini;
    }
    if($chart_num==29) $q[] = "SELECT (".$t1_ini."lgbt_p1=1) y, ga.nombre_cor legendText, CONCAT(ROUND(((".$t1_ini."lgbt_p1=1)*100)/".$t.",2),'% ',ga.nombre_com) indexLabel FROM cat_grad_academ ga ORDER BY ga.id";

    // listo
    if($chart_num==30) {
        $q_cca="SELECT COUNT(cca.id) FROM c_cand_ayun cca, cuest_identidad ci0 WHERE ci0.status=1 AND ci0.migrante_p1=1 AND cca.id_user=ci0.id_user_cand AND cca.pp=pp.id AND cca.sexo=";
        $q_ccdmr="SELECT COUNT(ccdmr.id) FROM c_cand_dip_mr ccdmr, cuest_identidad ci1 WHERE ci1.status=1 AND ci1.migrante_p1=1 AND ccdmr.id_user=ci1.id_user_cand AND ccdmr.pp=pp.id AND ccdmr.sexo=";
        $q_ccdrp="SELECT COUNT(ccdrp.id) FROM c_cand_dip_rp ccdrp, cuest_identidad ci2 WHERE ci2.status=1 AND ci2.migrante_p1=1 AND ccdrp.id_user=ci2.id_user_cand AND ccdrp.pp=pp.id AND ccdrp.sexo=";
        $q_cond=" y, pp.nom_cor label FROM cat_pp pp ORDER BY pp.id";

        // Para sexo femenino sexo=1
        $q[]="SELECT (".$q_cca."1)+(".$q_ccdmr."1)+(".$q_ccdrp."1)".$q_cond;

        // Para sexo masculino sexo=2
        $q[]="SELECT (".$q_cca."2)+(".$q_ccdmr."2)+(".$q_ccdrp."2)".$q_cond;
        
        // Para sexo no binario sexo=3
        $q[]="SELECT (".$q_cca."3)+(".$q_ccdmr."3)+(".$q_ccdrp."3)".$q_cond;

        // Para sexo otro género sexo=4
        $q[]="SELECT (".$q_cca."4)+(".$q_ccdmr."4)+(".$q_ccdrp."4)".$q_cond;
    }

    if($chart_num==31) {
        $q_cca=$q_cca_ini." AND ci.migrante_p1=1";
        $q_ccdmr=$q_ccdmr_ini." AND ci.migrante_p1=1";
        $q_ccdrp=$q_ccdrp_ini." AND ci.migrante_p1=1";
        
        $q[]="SELECT (".$q_cca.")+(".$q_ccdmr.")+(".$q_ccdrp.") y, pp.nom_cor legendText, CONCAT(ROUND(((".$q_cca.")*100)/(".$t."),2)+ROUND(((".$q_ccdmr.")*100)/(".$t."),2)+ROUND(((".$q_ccdrp.")*100)/(".$t."),2),'% ',pp.nom_com)".$q_cond_ini;
    }
    if($chart_num==32) $q[] = "SELECT (".$t1_ini."migrante_p1=1) y, ga.nombre_cor legendText, CONCAT(ROUND(((".$t1_ini."migrante_p1=1)*100)/".$t.",2),'% ',ga.nombre_com) indexLabel FROM cat_grad_academ ga ORDER BY ga.id";
    
    // listo
    if($chart_num==33) {
        $q_cca="SELECT COUNT(cca.id) FROM c_cand_ayun cca, cuest_identidad ci0 WHERE ci0.status=1 AND ci0.joven_mayor=1 AND cca.id_user=ci0.id_user_cand AND cca.pp=pp.id AND cca.sexo=";
        $q_ccdmr="SELECT COUNT(ccdmr.id) FROM c_cand_dip_mr ccdmr, cuest_identidad ci1 WHERE ci1.status=1 AND ci1.joven_mayor=1 AND ccdmr.id_user=ci1.id_user_cand AND ccdmr.pp=pp.id AND ccdmr.sexo=";
        $q_ccdrp="SELECT COUNT(ccdrp.id) FROM c_cand_dip_rp ccdrp, cuest_identidad ci2 WHERE ci2.status=1 AND ci2.joven_mayor=1 AND ccdrp.id_user=ci2.id_user_cand AND ccdrp.pp=pp.id AND ccdrp.sexo=";
        $q_cond=" y, pp.nom_cor label FROM cat_pp pp ORDER BY pp.id";

        // Para sexo femenino sexo=1
        $q[]="SELECT (".$q_cca."1)+(".$q_ccdmr."1)+(".$q_ccdrp."1)".$q_cond;

        // Para sexo masculino sexo=2
        $q[]="SELECT (".$q_cca."2)+(".$q_ccdmr."2)+(".$q_ccdrp."2)".$q_cond;
        
        // Para sexo no binario sexo=3
        $q[]="SELECT (".$q_cca."3)+(".$q_ccdmr."3)+(".$q_ccdrp."3)".$q_cond;

        // Para sexo otro género sexo=4
        $q[]="SELECT (".$q_cca."4)+(".$q_ccdmr."4)+(".$q_ccdrp."4)".$q_cond;
    }

    if($chart_num==34) {
        $q_cca=$q_cca_ini." AND ci.joven_mayor=1";
        $q_ccdmr=$q_ccdmr_ini." AND ci.joven_mayor=1";
        $q_ccdrp=$q_ccdrp_ini." AND ci.joven_mayor=1";
        
        $q[]="SELECT (".$q_cca.")+(".$q_ccdmr.")+(".$q_ccdrp.") y, pp.nom_cor legendText, CONCAT(ROUND(((".$q_cca.")*100)/(".$t."),2)+ROUND(((".$q_ccdmr.")*100)/(".$t."),2)+ROUND(((".$q_ccdrp.")*100)/(".$t."),2),'% ',pp.nom_com)".$q_cond_ini;
    }
    if($chart_num==35) $q[] = "SELECT (".$t1_ini."joven_mayor=1) y, ga.nombre_cor legendText, CONCAT(ROUND(((".$t1_ini."joven_mayor=1)*100)/".$t.",2),'% ',ga.nombre_com) indexLabel FROM cat_grad_academ ga ORDER BY ga.id";

    // listo
    if($chart_num==36) {
        $q_cca="SELECT COUNT(cca.id) FROM c_cand_ayun cca, cuest_identidad ci0 WHERE ci0.status=1 AND ci0.joven_mayor=2 AND cca.id_user=ci0.id_user_cand AND cca.pp=pp.id AND cca.sexo=";
        $q_ccdmr="SELECT COUNT(ccdmr.id) FROM c_cand_dip_mr ccdmr, cuest_identidad ci1 WHERE ci1.status=1 AND ci1.joven_mayor=2 AND ccdmr.id_user=ci1.id_user_cand AND ccdmr.pp=pp.id AND ccdmr.sexo=";
        $q_ccdrp="SELECT COUNT(ccdrp.id) FROM c_cand_dip_rp ccdrp, cuest_identidad ci2 WHERE ci2.status=1 AND ci2.joven_mayor=2 AND ccdrp.id_user=ci2.id_user_cand AND ccdrp.pp=pp.id AND ccdrp.sexo=";
        $q_cond=" y, pp.nom_cor label FROM cat_pp pp ORDER BY pp.id";

        // Para sexo femenino sexo=1
        $q[]="SELECT (".$q_cca."1)+(".$q_ccdmr."1)+(".$q_ccdrp."1)".$q_cond;

        // Para sexo masculino sexo=2
        $q[]="SELECT (".$q_cca."2)+(".$q_ccdmr."2)+(".$q_ccdrp."2)".$q_cond;
        
        // Para sexo no binario sexo=3
        $q[]="SELECT (".$q_cca."3)+(".$q_ccdmr."3)+(".$q_ccdrp."3)".$q_cond;

        // Para sexo otro género sexo=4
        $q[]="SELECT (".$q_cca."4)+(".$q_ccdmr."4)+(".$q_ccdrp."4)".$q_cond;
    }

    if($chart_num==37) {
        $q_cca=$q_cca_ini." AND ci.joven_mayor=2";
        $q_ccdmr=$q_ccdmr_ini." AND ci.joven_mayor=2";
        $q_ccdrp=$q_ccdrp_ini." AND ci.joven_mayor=2";
        
        $q[]="SELECT (".$q_cca.")+(".$q_ccdmr.")+(".$q_ccdrp.") y, pp.nom_cor legendText, CONCAT(ROUND(((".$q_cca.")*100)/(".$t."),2)+ROUND(((".$q_ccdmr.")*100)/(".$t."),2)+ROUND(((".$q_ccdrp.")*100)/(".$t."),2),'% ',pp.nom_com)".$q_cond_ini;
    }
    if($chart_num==38) $q[] = "SELECT (".$t1_ini."joven_mayor=2) y, ga.nombre_cor legendText, CONCAT(ROUND(((".$t1_ini."joven_mayor=2)*100)/".$t.",2),'% ',ga.nombre_com) indexLabel FROM cat_grad_academ ga ORDER BY ga.id";

    foreach($q as $n){
        $r=dbConexion($n);
        $datos[]=json_encode($r, JSON_NUMERIC_CHECK);
    }

    return $datos;

}

function dataCandExiste($id){
    $q="SELECT count(p.id) cont FROM c_candidatos p WHERE p.id_user=".$id;

    $result=dbConexion($q);

    return $result[0];
}

function getDataCandidato($id){
    $ua="UNION ALL";

    // tabla c_cand_ayun cca
    $q[0]=construirQDataCandidato(0).$id;

    // tabla c_cand_dip_mr ccdmr
    $q[1]=construirQDataCandidato(1).$id;

    // tabla c_cand_dip_rp ccdrp
    $q[2]=construirQDataCandidato(2).$id;


    $q_m=$q[0]." ".$ua." ".$q[1]." ".$ua." ".$q[2]." LIMIT 1";

    $result = dbConexion($q_m);

    return $result[0];
}

function construirQDataCandidato($n){
    	
    // Arreglo declaracion de tablas
    $tabla=[];
    
    $tabla[0]="c_cand_ayun";
    $tabla[1]="c_cand_dip_mr";
    $tabla[2]="c_cand_dip_rp";
    
    // Arreglo declaracion de tablas abreviadas
    $ta=[];
    
    $ta[0]="cca";
    $ta[1]="ccdmr";
    $ta[2]="ccdrp";
    
    
    $query="SELECT CONCAT(".$ta[$n].".nombre, ' ', ".$ta[$n].".a_pate, ' ', ".$ta[$n].".a_mate) nom_comp,
           TIMESTAMPDIFF(YEAR, ".$ta[$n].".f_nacimiento,NOW()) edad,
           cs".$n.".nombre sexo,
           ctc".$n.".nombre cargo,
           ctc".$n.".nombre candidatura,

           IFNULL(ccf".$n.".ruta, '-') cand_img,

           IFNULL(pp".$n.".url_img, 'sin definir') pp_img,

           IF(ccmc".$n.".face_op=1, ccmc".$n.".face_tx, '-') face,
           IF(ccmc".$n.".twit_op=1, ccmc".$n.".twit_tx, '-') twit,
           IF(ccmc".$n.".yout_op=1, ccmc".$n.".yout_tx, '-') yout,
           IF(ccmc".$n.".inst_op=1, ccmc".$n.".inst_tx, '-') inst,
           IF(ccmc".$n.".tikt_op=1, ccmc".$n.".tikt_tx, '-') tikt,
           IF(ccmc".$n.".otra_op=1, ccmc".$n.".otra_tx, '-') otrat,
           IFNULL(ccmc".$n.".pagina_w, '-') pagina_w,
           IFNULL(ccmc".$n.".mail_1, '-') mail_1,
           IFNULL(ccmc".$n.".mail_2, '-') mail_2,
           IFNULL(ccmc".$n.".mail_3, '-') mail_3,
           IFNULL(ccmc".$n.".tel_1, '-') tel_1,
           IFNULL(ccmc".$n.".tel_2, '-') tel_2,
           IFNULL(ccmc".$n.".tel_3, '-') tel_3,
           IFNULL(ccmc".$n.".dire_1, '-') dire_1,
           IFNULL(ccmc".$n.".dire_2, '-') dire_2,
           IFNULL(ccmc".$n.".dire_3, '-') dire_3,

           cga".$n.".nombre_com grado,
           ccu".$n.".historia_prof,
           ccu".$n.".otra_form_acad,
           ccu".$n.".por_que_ocupar,
           ccu".$n.".prop_1,
           ccu".$n.".prop_2,
           ccu".$n.".prop_gen,
           ccu".$n.".tray_politica,

           cid".$n.".indigena_p1,
           cid".$n.".discapacidad_p1,
           cid".$n.".afromexicano_p1,
           cid".$n.".lgbt_p1,
           cid".$n.".joven_mayor
    FROM ".$tabla[$n]." ".$ta[$n]."
        JOIN c_candidatos c".$n." ON ".$ta[$n].".id_user=c".$n.".id_user
        JOIN cat_tipo_cand ctc".$n." ON c".$n.".id_tipo_cand=ctc".$n.".id
        JOIN cat_pp pp".$n." ON ".$ta[$n].".pp=pp".$n.".id

        JOIN cuest_identidad cid".$n." ON ".$ta[$n].".id_user=cid".$n.".id_user_cand
        JOIN cuest_curricular ccu".$n." ON ".$ta[$n].".id_user=ccu".$n.".id_user_cand

        JOIN cuest_curricular_foto ccf".$n." ON ".$ta[$n].".id_user=ccf".$n.".id_user_cand
        JOIN cuest_curricular_mc ccmc".$n." ON ".$ta[$n].".id_user=ccmc".$n.".id_user_cand

        JOIN cat_grad_academ cga".$n." ON ccu".$n.".id_grad_acad=cga".$n.".id
        JOIN cat_sexo cs".$n." ON ".$ta[$n].".sexo=cs".$n.".id
    WHERE cid".$n.".status=1
    AND ccu".$n.".status=1
    AND ".$ta[$n].".id_user=";

    return $query;
}

?>