<?php

ini_set('default_charset', 'UTF-8');

define("RUTA_SCRIPTS", "../");
require(RUTA_SCRIPTS. "comm/getDBEnlace.php");

$result= "";

$num = (isset($_POST['num'])) ? $_POST['num'] : 0 ;

if($num == 1) {
   $filt_busqueda = [];
    $filt_busqueda[0]="";
    $filt_busqueda[1]="";
    $filt_busqueda[2]="";
    $ua="UNION ALL";
    $a=" AND ";
    

    $grado = (isset($_POST['grado'])) ? $_POST['grado'] : 0 ;
    $rango_edad = (isset($_POST['rango_edad'])) ? $_POST['rango_edad'] : 0 ;
    $sexo = (isset($_POST['sexo'])) ? $_POST['sexo'] : 0 ;
    $actorPol = (isset($_POST['actorPol'])) ? $_POST['actorPol'] : 0 ;

    if ($grado>0) {
        $filt_busqueda[0].=$a."cga0.id=".$grado;
        $filt_busqueda[1].=$a."cga1.id=".$grado;
        $filt_busqueda[2].=$a."cga2.id=".$grado;
    }

    $edad[0]="TIMESTAMPDIFF(YEAR, cca.f_nacimiento,NOW())";
    $edad[1]="TIMESTAMPDIFF(YEAR, ccdmr.f_nacimiento,NOW())";
    $edad[2]="TIMESTAMPDIFF(YEAR, ccdrp.f_nacimiento,NOW())";

    if($rango_edad>0) {
        $filt_busqueda[0].=$a;
        $filt_busqueda[1].=$a;
        $filt_busqueda[2].=$a;

        if($rango_edad==1){
            $filt_busqueda[0].="(".$edad[0]." >= 21 AND ".$edad[0]." <= 29)";
            $filt_busqueda[1].="(".$edad[1]." >= 21 AND ".$edad[1]." <= 29)";
            $filt_busqueda[2].="(".$edad[2]." >= 21 AND ".$edad[2]." <= 29)";
        }
        if($rango_edad==2) {
            $filt_busqueda[0].="(".$edad[0]." >= 30 AND ".$edad[0]." <= 40)";
            $filt_busqueda[1].="(".$edad[1]." >= 30 AND ".$edad[1]." <= 40)";
            $filt_busqueda[2].="(".$edad[2]." >= 30 AND ".$edad[2]." <= 40)";
        }
        if($rango_edad==3) {
            $filt_busqueda[0].="(".$edad[0]." >= 41 AND ".$edad[0]." <= 49)";
            $filt_busqueda[1].="(".$edad[1]." >= 41 AND ".$edad[1]." <= 49)";
            $filt_busqueda[2].="(".$edad[2]." >= 41 AND ".$edad[2]." <= 49)";
        }
        if($rango_edad==4) {
            $filt_busqueda[0].="(".$edad[0]." >= 50 AND ".$edad[0]." <= 59)";
            $filt_busqueda[1].="(".$edad[1]." >= 50 AND ".$edad[1]." <= 59)";
            $filt_busqueda[2].="(".$edad[2]." >= 50 AND ".$edad[2]." <= 59)";
        }
        if($rango_edad==5) {
            $filt_busqueda[0].=$edad[0]." >= 60";
            $filt_busqueda[1].=$edad[1]." >= 60";
            $filt_busqueda[2].=$edad[2]." >= 60";
        }
        
    }

    if($sexo>0) {
        $filt_busqueda[0].=$a."cca.sexo=".$sexo;
        $filt_busqueda[1].=$a."ccdmr.sexo=".$sexo;
        $filt_busqueda[2].=$a."ccdrp.sexo=".$sexo;
        
    }

    if($actorPol>0) {
        $filt_busqueda[0].=$a."pp0.id=".$actorPol;
        $filt_busqueda[1].=$a."pp1.id=".$actorPol;
        $filt_busqueda[2].=$a."pp2.id=".$actorPol;
    }

    $q[0] = "SELECT cca.id_user, CONCAT(cca.nombre, ' ', cca.a_pate, ' ',cca.a_mate) nombres, ctc0.nombre cargo, pp0.nom_com afiliacion, ".$edad[0]." edad, cga0.nombre_com grad_academ, cca.id_user url_perfil
          FROM c_cand_ayun cca, c_candidatos c0, cat_tipo_cand ctc0, cat_pp pp0, cuest_identidad cid0, cuest_curricular ccu0, cat_grad_academ cga0
          WHERE cca.id_user=c0.id_user
          AND c0.id_tipo_cand=ctc0.id
          AND cca.pp=pp0.id
          AND cid0.id_user_cand=cca.id_user
          AND ccu0.id_user_cand=cca.id_user
          AND cid0.status=1
          AND ccu0.status=1
          AND cga0.id=ccu0.id_grad_acad ".$filt_busqueda[0]." ";

    $q[1] = " SELECT ccdmr.id_user, CONCAT(ccdmr.nombre, ' ', ccdmr.a_pate, ' ',ccdmr.a_mate) nombres, ctc1.nombre cargo, pp1.nom_com afiliacion, ".$edad[1]." edad, cga1.nombre_com grad_academ, ccdmr.id_user url_perfil
          FROM c_cand_dip_mr ccdmr, c_candidatos c1, cat_tipo_cand ctc1, cat_pp pp1, cuest_identidad cid1, cuest_curricular ccu1, cat_grad_academ cga1
          WHERE ccdmr.id_user=c1.id_user
          AND c1.id_tipo_cand=ctc1.id
          AND ccdmr.pp=pp1.id
          AND cid1.id_user_cand=ccdmr.id_user
          AND ccu1.id_user_cand=ccdmr.id_user
          AND cid1.status=1
          AND ccu1.status=1
          AND cga1.id=ccu1.id_grad_acad ".$filt_busqueda[1]." ";

    $q[2] = " SELECT ccdrp.id_user, CONCAT(ccdrp.nombre, ' ', ccdrp.a_pate, ' ',ccdrp.a_mate) nombres, ctc2.nombre cargo, pp2.nom_com afiliacion, ".$edad[2]." edad, cga2.nombre_com grad_academ, ccdrp.id_user url_perfil
          FROM c_cand_dip_rp ccdrp, c_candidatos c2, cat_tipo_cand ctc2, cat_pp pp2, cuest_identidad cid2, cuest_curricular ccu2, cat_grad_academ cga2
          WHERE ccdrp.id_user=c2.id_user
          AND c2.id_tipo_cand=ctc2.id
          AND ccdrp.pp=pp2.id
          AND cid2.id_user_cand=ccdrp.id_user
          AND ccu2.id_user_cand=ccdrp.id_user
          AND cid2.status=1
          AND ccu2.status=1
          AND cga2.id=ccu2.id_grad_acad ".$filt_busqueda[2]." ";


          
    $q_m=$q[0].$ua.$q[1].$ua.$q[2]." ORDER BY id_user";

    $result = json_encode(["data"=>dbConexion($q_m)]);
}

echo (!empty($result)) ? $result : "Sin resultados";

?>