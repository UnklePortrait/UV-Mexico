$.fn.containerBox = function() {
    return this.each(function(){
		$(this).click(showContainer);
	});
	function showContainer(e){
		e.preventDefault();
		$('body').append(
		'<div id="containerbox">'+
			'<div id="containerbox-content">'+
				'<a href="#" id="containerbox-close"><span>Cerrar</span></a>'+
			'</div>'+
			'<div id="containerbox-back"></div>'+
		'</div>'
		);
		$('#containerbox').hide().fadeIn(500);
		$('#containerbox-close').click(closeContainer);
		$('#containerbox-back').click(closeContainer);
		$('#containerbox-content').append(
			$(this).find('.preview').html()
		);
		$('#containerbox-content').css('margin-top', $(window).height()/2-$('#containerbox-content').height()/2);
		$('#containerbox-content').css('margin-left', $(window).width()/2-$('#containerbox-content').width()/2);
		$('#containerbox-close').css('left',$('#containerbox-content').width());
	}
	function closeContainer(e){
		e.preventDefault();
		$('#containerbox').fadeOut(500,removeContainer);
	}
	function removeContainer(){
		$('#containerbox').remove();
	}
};