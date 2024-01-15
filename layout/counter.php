<?php
ini_set('default_charset', 'UTF-8');

date_default_timezone_set("America/Mexico_City");

require(RUTA_SCRIPTS."gets/contador.php");

function getCountVisitas($min_max){
    $ip=getClientIP();
    $visit_info=getVisitInfo();
    $r=revisaVisita($ip,0);

    $dias=0;
    if(!is_null($r['fechahora'])) {
        $fecha_hoy = date_create(date("Y-m-d H:i:s", time())); 
        $fecha_reg = date_create($r['fechahora']); 
        $inter = date_diff($fecha_hoy, $fecha_reg);

        $min = $inter->days * 24 * 60;
        $min += $inter->h * 60;
        $min += $inter->i;

        $fecha_hoy_red=date_create(date('Y-m-d', time()));
        $fecha_reg_red=date_create(date_format($fecha_reg,"Y-m-d"));
        $inter_red=date_diff($fecha_hoy_red, $fecha_reg_red);

        $dias= $inter_red->days; 
    }

    if(is_null($r['conteo']) || ($dias>0)){
        $msj=cuentaVisita($ip, 0);

        if(!is_numeric($msj)) $resp=$msj;
        else $resp=cuentaVisita2($msj,$visit_info,0);

        $resp.="Se agrega nueva dirección IP.";

        $c= "Conteo: 1";
    }
    else {
        $dif=" La diferencia en minutos es: ".$min;

        if($min>=$min_max) {
            $msj=cuentaVisita($r['id'], 1);
            if(!is_numeric($msj)) $resp=$msj;
            else $resp=cuentaVisita2($r['id'],$visit_info,1);

            $resp.="Se incrementa contador.";
            $c= "Conteo: ".($r['conteo'] + 1);
        }
        else {    
            $resp="No se incrementa conteo.";
            $c= "Conteo: ".$r['conteo'];
        }
        
        $resp.=$dif." Diferencia en días: ".$dias;
    }

    $t=revisaVisita('',1);
    $t_visitas="Total de visitas al portal: ".$t['total'];

    $fr=(isset($r['fechahora'])) ? $r['fechahora'] : "nuevo registro";

    $result = array();

    $result[0]="La ip del cliente es: ". $ip;
    $result[1]="Última fecha de registro: ".$fr;
    $result[2]=$c;
    $result[3]=$resp;
    $result[4]=$t_visitas;
    $result[5]=$t['total'];

    // return $result;
    return $result[5];

}

?>

<div id="timer" data-animated="FadeIn" class="animated FadeIn">
    <p id="message">TOTAL DE VISITAS</p>
    <div id="days">
        <div class="timer_box col-6">
            <h1><?php echo getCountVisitas(5); ?></h1><p>Visitas</p>
        </div>
    </div>
</div>
<br>
<div class="border-top mt-10"></div>
<br>