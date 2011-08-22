
//---------- Show player/technologies lightbox ----------------//
	var image, loader;
	function showPlayer(player){
		image = new Image();
		image.src = 'imagesAdidas/jugadores/'+player+'.jpg'; 
		loader = setTimeout('loaded()',100);
	}
	function showTech(tech){
		image = new Image();
		image.src = 'imagesAdidas/tecnologias/'+tech+'.jpg';
		loader = setTimeout('loaded()',100);
	}
	function loaded(){
		if(image.complete){
			clearTimeout(loader);
			$('body').append(
			'<div id="containerbox">'+
				'<div id="containerbox-content">'+
					'<a href="#" id="containerbox-close"><span>Cerrar</span></a>'+
				'</div>'+
				'<div id="containerbox-back"></div>'+
			'</div>'
			);
			$('#containerbox-content').append(image);
			$('#containerbox-content').css('margin-top', $(window).height()/2-image.height/2);
			$('#containerbox-content').css('margin-left', $(window).width()/2-image.width/2);
			$('#containerbox-close').css('left',image.width);
			$('#containerbox').hide().fadeIn(500);
			$('#containerbox-close').click(closeContainer);
			$('#containerbox-back').click(closeContainer);
		}
	}
	function closeContainer(e){
		e.preventDefault();
		$('#containerbox').fadeOut(500,removeContainer);
	}
	function removeContainer(){
		$('#containerbox').remove();
	}
	
$(document).ready(function(){
	//---------- Perfil show imageupload form ----------------//
	$('#profileImage').hide();
	$('#default_foto').click(function(e){
		e.preventDefault();
		$('#profileImage').slideDown();
	});

	//---------- Fin Perfil show imageupload form ----------------//

$( "#bannerHome" ).imageScroller( {loading:'Wait please...'} );
$('#homeC').carouFredSel();
	$('.hideHome').click(function(){
		
		$('#mainHome').fadeOut(200);
		$('#Product').fadeIn(1000);
	
	
	});
	
	
	function hideClose(){
		$('.cerrar').hide();
	}
	
	/**/
	
	
	$('.superiorPredator').click(function(){
		$('#vistaLateral').fadeOut(200);
		$('#vistaInferior').fadeOut(200);
		$('#vistaTrasera').fadeOut(200);


		$('#vistaSuperior').fadeIn(2000);
		
	
	});
	
	$('.inferiorPredator').click(function(){
		$('#vistaLateral').fadeOut(200);
		$('#vistaSuperior').fadeOut(200);
		$('#vistaTrasera').fadeOut(200);


		$('#vistaInferior').fadeIn(2000);
	});
	
	$('.traseraPredator').click(function(){
		$('#vistaLateral').fadeOut(200);
		$('#vistaInferior').fadeOut(200);
		$('#vistaSuperior').fadeOut(200);


		$('#vistaTrasera').fadeIn(2000);
	
	});
	
	$('.lateralPredator').click(function(){
	$('#vistaSuperior').fadeOut(200);
		$('#vistaInferior').fadeOut(200);
		$('#vistaTrasera').fadeOut(200);


		$('#vistaLateral').fadeIn(2000);
	});
	
	
	
	$('#volverLateral').click(function(){
		
		$('.vistaTaurus').fadeOut(200);
		$('.vistaTraxion').fadeOut(200);
		$('.vistaSprint').fadeOut(200);
		$('.vistaZona').fadeOut(200);
		
		$('.vistaCuero').fadeOut(200);
		
		$('.vistaUno').fadeIn(2000);
		
		hideClose();
	});
	
	$('.areaAlcantara').click(function(){
		$('.vistaUno').fadeOut(200);
		$('.vistaTaurus').fadeOut(200);
		$('.vistaTraxion').fadeOut(200);
		$('.vistaSprint').fadeOut(200);
		$('.vistaZona').fadeOut(200);
		
		
		$('.cerrar').fadeIn(2000);
		
		$('.vistaCuero').fadeIn(2000);
	
	});
	
	$('.areaTaurus').click(function(){
		$('.vistaUno').fadeOut(200);
		$('.vistaCuero').fadeOut(200);
		$('.vistaTraxion').fadeOut(200);
		$('.vistaSprint').fadeOut(200);
		$('.vistaZona').fadeOut(200);
		
		
		$('.cerrar').fadeIn(2000);
		$('.vistaTaurus').fadeIn(2000);
	});
	
	$('.areaTraxion').click(function(){
		$('.vistaUno').fadeOut(200);
		$('.vistaCuero').fadeOut(200);
		$('.vistaTaurus').fadeOut(200);
		$('.vistaSprint').fadeOut(200);
		$('.vistaZona').fadeOut(200);
		
		
		$('.cerrar').fadeIn(2000);
		$('.vistaTraxion').fadeIn(2000);
	});
	
	$('.areaZona').click(function(){
	$('.vistaUno').fadeOut(200);
		$('.vistaCuero').fadeOut(200);
		$('.vistaTraxion').fadeOut(200);
		$('.vistaSprint').fadeOut(200);
		$('.vistaTaurus').fadeOut(200);
		
		
		$('.cerrar').fadeIn(2000);
		$('.vistaZona').fadeIn(2000);
	});
	
	$('.areaSprint').click(function(){
	$('.vistaUno').fadeOut(200);
		$('.vistaCuero').fadeOut(200);
		$('.vistaTraxion').fadeOut(200);
		$('.vistaTaurus').fadeOut(200);
		$('.vistaZona').fadeOut(200);
		
		
		$('.cerrar').fadeIn(2000);
		$('.vistaSprint').fadeIn(2000);
	});
	
	$('#volverSuperior').click(function(){
		
		$('.superiorTaurus').fadeOut(200);
		$('.superiorZona').fadeOut(200);
		
		$('.superiorCuero').fadeOut(200);
		$('.superior').fadeIn(2000);
		hideClose();
	});
	
	
	$('.areaSupCuero').click(function(){
		$('.superior').fadeOut(200);
		$('.superiorTaurus').fadeOut(200);
		$('.superiorZona').fadeOut(200);
		
		$('.superiorCuero').fadeIn(2000);
		$('.cerrar').fadeIn(2000);
	});
	
	$('.areaSupTaurus').click(function(){
		$('.superior').fadeOut(200);
		$('.superiorCuero').fadeOut(200);
		$('.superiorZona').fadeOut(200);
		
		$('.superiorTaurus').fadeIn(2000);
		$('.cerrar').fadeIn(2000);
	});
	$('.areaSupZona').click(function(){
		$('.superior').fadeOut(200);
		$('.superiorTaurus').fadeOut(200);
		$('.superiorCuero').fadeOut(200);
		
		$('.superiorZona').fadeIn(2000);
		$('.cerrar').fadeIn(2000);
	});
	
	
	$('#volverInferior').click(function(){
		$('.inferior').fadeIn(2000);
		$('.vistaTraxionInferior').fadeOut(200);
		$('.vistaSprintInferior').fadeOut(200);
		
		$('.vistaSpineInferior').fadeOut(200);
		hideClose();
	});
	
	$('.areaMedioInferior').click(function(){
		$('.inferior').fadeOut(200);
		$('.vistaTraxionInferior').fadeOut(200);
		$('.vistaSprintInferior').fadeOut(200);
		
		$('.vistaSpineInferior').fadeIn(2000);
		$('.cerrar').fadeIn(2000);
		
	
	});
	
	$('.areaSprintInferior').click(function(){
	$('.inferior').fadeOut(200);
		$('.vistaSpineInferior').fadeOut(200);
		$('.vistaTraxionInferior').fadeOut(200);
		
		$('.vistaSprintInferior').fadeIn(2000);
		$('.cerrar').fadeIn(2000);
	
	});
	
	$('.areaTaxionInferior').click(function(){
	$('.inferior').fadeOut(200);
		$('.vistaSpineInferior').fadeOut(200);
		$('.vistaSprintInferior').fadeOut(200);
		
		$('.vistaTraxionInferior').fadeIn(2000);
		$('.cerrar').fadeIn(2000);
	});
	$('.areaTraxionInferior').click(function(){
	$('.inferior').fadeOut(200);
		$('.vistaSpineInferior').fadeOut(200);
		$('.vistaSprintInferior').fadeOut(200);
		
		$('.vistaTraxionInferior').fadeIn(2000);
		$('.cerrar').fadeIn(2000);
	});
	
	$('#volverTrasera').click(function(){
		$('.traseraSprint').fadeOut(200);
		$('.traseraTraxion').fadeOut(200);
		$('.traseraCuero').fadeOut(200);
		$('.trasera').fadeIn(2000);
		hideClose();
	});
	
	
	$('.areaTraseraSprint').click(function(){
		$('.trasera').fadeOut(200);
		$('.traseraTraxion').fadeOut(200);
		$('.traseraCuero').fadeOut(200);
		
		$('.traseraSprint').fadeIn(2000);
		$('.cerrar').fadeIn(2000);
		
	});
	
	$('.areaTraseraTraxion').click(function(){
	$('.trasera').fadeOut(200);
		$('.traseraSprint').fadeOut(200);
		$('.traseraCuero').fadeOut(200);
		
		$('.traseraTraxion').fadeIn(2000);
		$('.cerrar').fadeIn(2000);
	});
	
	$('.areaTraseraCuero').click(function(){
	$('.trasera').fadeOut(200);
		$('.traseraSprint').fadeOut(200);
		$('.traseraTraxion').fadeOut(200);
		
		$('.traseraCuero').fadeIn(2000);
		$('.cerrar').fadeIn(2000);
	});
	
	
	$('.moreInfo').click(function(){
		
		hideMore();
		
		$('.clientes').fadeIn(500);
		$('.jugadores').fadeIn(500);
		
	});

	$('.jugador1').click(function(){
		$('.Beneficios').fadeOut(200);
		$('.imagePlayer').fadeIn(1000);
	});
	
	function hideMore(){
		$('.moreInfo').hide(500);
	}
});