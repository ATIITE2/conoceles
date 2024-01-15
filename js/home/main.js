$( document ).ready(function() {
    muestraGrafica(1, 'Registro candidatos',1);
});

function activarList(chl){
    $(".nav-link").removeClass('active');
    $("#"+chl).addClass('active');

}


function lmpCampos(){
    $("#grado_aca").val("0");
    $("#rango_edad").val("0");
    $("input[type=radio][id=actorPol]").prop('checked', false);
    $("input[type=radio][id=sexo]").prop('checked', false);
    $("#listado_candidatos").DataTable().clear().destroy();
    $(".tabla_elem").addClass('d-none');

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