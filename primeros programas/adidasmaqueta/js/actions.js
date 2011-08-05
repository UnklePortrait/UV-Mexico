$(document).ready(function(){
		
	
	
	$('#clickUno').click(function(){		
		$('#cuatro').fadeIn(900);
		$('#uno').fadeOut(900);
		$('#dos').fadeOut(900);
		$('#tres').fadeOut(900);
		$('#cinco').fadeOut(900);
		$('#seis').fadeOut(900);
		$('#siete').fadeOut(900);
	});
	$('#clickSeis').click(function(){		
		$('#dos').fadeIn(900);
		$('#uno').fadeOut(900);
		$('#tres').fadeOut(900);
		$('#cuatro').fadeOut(900);		
		$('#cinco').fadeOut(900);
		$('#seis').fadeOut(900);
		$('#siete').fadeOut(900);
	});
	$('#clickDos').click(function(){
		$('#cinco').fadeIn(900);
		$('#uno').fadeOut(900);
		$('#dos').fadeOut(900);
		$('#tres').fadeOut(900);
		$('#cuatro').fadeOut(900);
		$('#seis').fadeOut(900);
		$('#siete').fadeOut(900);
	});
	$('#clickTres').click(function(){
		$('#seis').fadeIn(900);
		$('#uno').fadeOut(900);
		$('#dos').fadeOut(900);
		$('#tres').fadeOut(900);
		$('#cuatro').fadeOut(900);
		$('#cinco').fadeOut(900);
		$('#siete').fadeOut(900);
		
	});
	$('#clickCuatro').click(function(){
		$('#tres').fadeIn(900);
		$('#uno').fadeOut(900);
		$('#dos').fadeOut(900);
		$('#cuatro').fadeOut(900);
		$('#cinco').fadeOut(900);
		$('#seis').fadeOut(900);
		$('#siete').fadeOut(900);
	});
	$('#clickCinco').click(function(){
		$('#uno').fadeIn(900);
		$('#dos').fadeOut(900);
		$('#tres').fadeOut(900);
		$('#cuatro').fadeOut(900);
		$('#cinco').fadeOut(900);
		$('#seis').fadeOut(900);
		$('#siete').fadeOut(900);
	});
	$('#clickSiete').click(function(){
		
	});
	
	$('.slideImg1').click(function(){
		
		$('#homeSlide').css('display', 'none');
		$('#typical').css('display', 'block');
		
	});
	$('.slideImg2').click(function(){
	
		$('#homeSlide').css('display', 'none');
		$('#f50').css('display', 'block');
	});
	$('.slideImg3').click(function(){
	
		$('#homeSlide').css('display', 'none');
		$('#Predator').css('display', 'block');
	});
	$('.close').click(function(){
		$('#homeSlide').css('display', 'block');
		$('#typical').css('display', 'none');
		$('#f50').css('display', 'none');
		$('#Predator').css('display', 'none');
		$('#cuatro').fadeOut(900);
		$('#uno').fadeOut(900);
		$('#dos').fadeOut(900);
		$('#tres').fadeOut(900);
		$('#cinco').fadeOut(900);
		$('#seis').fadeOut(900);
		$('#siete').fadeOut(900);
	});

});