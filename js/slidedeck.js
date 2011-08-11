$(document).ready(function(){
	var index = 0;
	$('#enviar').hide();
	$('#anterior').hide();
	$('#siguiente').click(function(e){
		e.preventDefault();
		$('#enviar').hide();
		$('#siguiente').show();
		$('#anterior').show();
		if(index < $('.slide').size() - 1){
			index++;
			$('#evaluacion').animate({top: (-452*index)+'px'});
		}else{
			$('#siguiente').hide();
			$('#enviar').show();
		}
	});
	$('#anterior').click(function(e){
		e.preventDefault();
		$('#enviar').hide();
		$('#siguiente').show();
		$('#anterior').show();
		if(index > 0){
			index--;
			$('#evaluacion').animate({top: (-452*index)+'px'});
		}else{
			$('#anterior').hide();
		}
	});
	$('#enviar').click(function(e){
		e.preventDefault();
		$('#evaluacion').submit();
	});
	$('.notification').click(function(){
		location.href='perfil.php';
	});
});