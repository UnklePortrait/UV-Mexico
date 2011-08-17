$(document).ready(function(){
$('a.item').containerBox();
	$('a.personaje').containerBox();
	$('a.game').click(popGame);


function popGame(e){
	e.preventDefault();
	var url = $(e.currentTarget).attr('href');
	window.open(url, "Juegos_Chuck","fullscreen=0, toolbar=0, location=0, status=0, menubar=0, scrollbars=0, resizable=0, width=700, height=500", 1);
}

/*-------------------------Inicio------------------------------*/

   


/*-------------------Descargas----------------------------------*/


	


$(".imgWall01").hover( function(){

   $("#Description").show();

  }, 
  function () {
  	$('#Description').hide();

  }
);

$(".imgWall").hover( function(){

   $("#Description01").show();

  }, 
  function () {
  	$('#Description01').hide();

  }
);
$(".imgWall03").hover( function(){

   $("#Description02").show();

  }, 
  function () {
  	$('#Description02').hide();

  }
);
});