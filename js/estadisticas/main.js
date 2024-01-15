$( document ).ready(function() {
    activarchartsPanel(1);
});

function activarPanel(n){
    $(".contenedorX").html('');
    $(".tab-pane").removeClass('show active');
    $("#panel"+n).addClass('show active');
    if(n === 2) $("#panel3").addClass('show active');

    $(".linkbtn").removeClass('active');
    $("#lnkboton"+n).addClass('active');

    activarchartsPanel(n);
}

function activarListEst(n){
    $(".chrtlink").removeClass('active');
    $("#chrt_link"+n).addClass('active');

}

function activarchartsPanel(num_panel){
    if(num_panel === 1) { 
        muestraGrafica(13,'REGISTROS DE CAPTURA DEL CUESTIONARIO CURRICULAR POR ACTOR POLITICO',1);
        muestraGrafica(14,'REMOVER',2);
        muestraGrafica(15,'REMOVER',1);
        muestraGrafica(16,'REGISTROS DE CAPTURA DEL CUESTIONARIO CURRICULAR POR GÉNERO',3);
        
    }

    if(num_panel === 2) {
        muestraGrafica(17,'REGISTROS DE CAPTURA DEL CUESTIONARIO DE IDENTIDAD POR GÉNERO',3);
        cargaListaGraficas(1,"Candidaturas Indígenas"); 

    }

}

function cargaListaGraficas(n,titulo){
    $(".contX").html('');
    if(n === 1) {  muestraGrafica(18,"Registro de "+titulo+" por Género y Actor Político",5); muestraGrafica(19,"Porcentaje de "+titulo+" por Actor Político",4); muestraGrafica(20,"Porcentaje de "+titulo+" por Grado de Estudios",4); }
    if(n === 2) {  muestraGrafica(21,"Registro de "+titulo+" por Género y Actor Político",5); muestraGrafica(22,"Porcentaje de "+titulo+" por Actor Político",4); muestraGrafica(23,"Porcentaje de "+titulo+" por Grado de Estudios",4); }
    if(n === 3) {  muestraGrafica(24,"Registro de "+titulo+" por Género y Actor Político",5); muestraGrafica(25,"Porcentaje de "+titulo+" por Actor Político",4); muestraGrafica(26,"Porcentaje de "+titulo+" por Grado de Estudios",4); }
    if(n === 4) {  muestraGrafica(27,"Registro de "+titulo+" por Género y Actor Político",5); muestraGrafica(28,"Porcentaje de "+titulo+" por Actor Político",4); muestraGrafica(29,"Porcentaje de "+titulo+" por Grado de Estudios",4); }
    if(n === 5) {  muestraGrafica(30,"Registro de "+titulo+" por Género y Actor Político",5); muestraGrafica(31,"Porcentaje de "+titulo+" por Actor Político",4); muestraGrafica(32,"Porcentaje de "+titulo+" por Grado de Estudios",4); }
    if(n === 6) {  muestraGrafica(33,"Registro de "+titulo+" por Género y Actor Político",5); muestraGrafica(34,"Porcentaje de "+titulo+" por Actor Político",4); muestraGrafica(35,"Porcentaje de "+titulo+" por Grado de Estudios",4); }
    if(n === 7) {  muestraGrafica(36,"Registro de "+titulo+" por Género y Actor Político",5); muestraGrafica(37,"Porcentaje de "+titulo+" por Actor Político",4); muestraGrafica(38,"Porcentaje de "+titulo+" por Grado de Estudios",4); }


}


