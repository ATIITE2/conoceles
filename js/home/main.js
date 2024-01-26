$(document).ready(function() {
	let reld=0;

	// Agregar clase "d-none" (ocultar) al div cuando se carga la página al modo responsive por primera vez
	$(window).on("load", function() {
		reld=cambia_responsive(window);
		muestraGrafica(1, 'Registro candidatos',1);
	  });
	  
	// Agregar clase "d-none" (ocultar) al div cuando se ingresa al modo responsive
    $(window).on("resize", function() {
      reld=cambia_responsive(window);
    });

	if(reld === 0){
		reld=cambia_responsive(window);
		muestraGrafica(1, 'Registro candidatos',1);
	}
	
});


function cambia_responsive(w){
	if ($(w).width() < 1000) {

		// Modifica el tamaño del lienzo de la gráfica
		$("#conten_graf1").removeClass("col-md-9");
		$("#conten_graf1").addClass("col-md-12");
		
		// Agrega y quita la clase d-none en la lista correspondiente segun su responsive
        $("#lista_chrts1").addClass("d-none");
		$("#lista_chrts2").removeClass("d-none");
      } else {

		// Modifica el tamaño del lienzo de la gráfica
		$("#conten_graf1").removeClass("col-md-12");
		$("#conten_graf1").addClass("col-md-9");

		// Agrega y quita la clase d-none en la lista correspondiente segun su responsive
        $("#lista_chrts2").addClass("d-none");
		$("#lista_chrts1").removeClass("d-none");
      }
	  
	return 1;
}

function activarList(chl){
    $(".nav-link").removeClass('active');
    $("#"+chl).addClass('active');

}

function lmpCampos(){

	$("#ayuntamiento").val("0");
    $("#distrito").val("0");

    $("#grado_aca").val("0");
    $("#rango_edad").val("0");
    $("input[type=radio][name=actorPol]").prop('checked', false);
    
	$("#sexo").val("0");
    $("#listado_candidatos").DataTable().clear().destroy();
    $(".tabla_elem").addClass('d-none');

	if(! $(".ayun_dist").hasClass("d-none")) $(".ayun_dist").addClass('d-none');

}


(function($) { "use strict";

	$(function() {
		var header = $(".start-style");
		$(window).scroll(function() {    
			var scroll = $(window).scrollTop();
		
			if (scroll >= 10) {
				header.removeClass('start-style').addClass("scroll-on");
			} else {
				header.removeClass("scroll-on").addClass('start-style');
			}
		});
	});		
		
	//Animation
	
	$(document).ready(function() {
		$('div.hero-anime').removeClass('hero-anime');
	});

	//Menu On Hover
		
	$('#barranav').on('mouseenter mouseleave','.nav-item',function(e){
			if ($(window).width() > 750) {
				var _d=$(e.target).closest('.nav-item');_d.addClass('show');
				setTimeout(function(){
				_d[_d.is(':hover')?'addClass':'removeClass']('show');
				},1);
			}
	});	
		
  })(jQuery);