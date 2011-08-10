<?php
include_once('functions.php');
$logoutAction = logout();
if(isset($_GET['evaluacion'])){
$aciertos=0;	
$errores=0;
	$_GET['eval'] = $_GET['evaluacion'];
	$error=false;
	$error=(isset($_GET['p1']))?false:true;
	$error=(isset($_GET['p2']))?false:true;
	$error=(isset($_GET['p3']))?false:true;
	$error=(isset($_GET['p4']))?false:true;
	$error=(isset($_GET['p5']))?false:true;
	$error=(isset($_GET['p6']))?false:true;
	$error=(isset($_GET['p7']))?false:true;
	$error=(isset($_GET['p8']))?false:true;
	$error=(isset($_GET['p9']))?false:true;
	
	if(!$error){
		switch($_GET['evaluacion'])
{
	case 'f50':
	$respuestas=array('a','a','a','a','a','true','true','true','true');
	break;
	case'adipower':
	$respuestas=array('b','b','b','b','b','false','false','false','false');
	break;
	case'adipure':
	$respuestas=array('c','c','c','c','c','true','true','true','true',);
	break;
}
for($i=1;$i<10;i++)
{
	if($_GET['p'.$i]==$respuestas[$i-1]){
		$aciertos++;
								  }	
	else{
	$errores++;
	}
}
  $resultado=$aciertos-$errores;
	}
}

//authorize(0, "index.php?accesscheck=" . $_SERVER['PHP_SELF']);
//$user=profile();
$all_answers = true;
include ("includes/header.php");
?>
			<div id="user">
    	    	<h2 class="user">Hola <?php //echo $user['nombre'] ?> </h2>
				<a href="<?php echo $logoutAction ?>" class="logout">Log out</a>	
			</div>
			<div class="linea"></div>
			<div id="content">
            	<div class="slidedeck">
                	<script type="text/javascript">
						$(document).ready(function(){
							var index = 0;
							$('#siguiente').click(function(e){
								e.preventDefault();
								if(index < $('.slide').size() - 1){
									index++;
									$('#evaluacion').animate({top: (-452*index)+'px'});
								}
							});
							$('#anterior').click(function(e){
								e.preventDefault();
								if(index > 0){
									index--;
									$('#evaluacion').animate({top: (-452*index)+'px'});
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
                    </script>
                    <?php if(isset($_GET['evaluacion'])): ?>
                    <div class="notification">
                    	<?php if(!$error): ?>
                    	<div class="notification_success">
                        	<img src="imagesAdidas/evaluaciones/success.png" />
                        </div>
                        <?php else: ?>
                        <div class="notification_error">
                        	<img src="imagesAdidas/evaluaciones/error.png" />
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                	<div class="slidedeck_buttons">
                        <a href="home.php" id="salir"><img src="imagesAdidas/evaluaciones/salir_btn.png" /></a>
                        <a href="#" id="anterior"><img src="imagesAdidas/evaluaciones/anterior_btn.png" /></a>
                        <a href="#" id="siguiente"><img src="imagesAdidas/evaluaciones/siguiente_btn.png" /></a>
                        <a href="#" id="enviar"><img src="imagesAdidas/evaluaciones/enviar_btn.png" /></a>
                   	</div>
                    <form id="evaluacion" method="get">
                    <input type="hidden" name="evaluacion" value="<?php echo $_GET['eval'] ?>" />
                	<div class="slide">
                		<img src="imagesAdidas/evaluaciones/<?php echo $_GET['eval'] ?>/slide0.jpg" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/<?php echo $_GET['eval'] ?>/slide1.jpg" />
                        <input type="radio" class="slidedeck_op1" name="p1" value="a" />
                        <input type="radio" class="slidedeck_op2" name="p1" value="b" />
                        <input type="radio" class="slidedeck_op3" name="p1" value="c" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/<?php echo $_GET['eval'] ?>/slide2.jpg" />
                        <input type="radio" class="slidedeck_op1" name="p2" value="a" />
                        <input type="radio" class="slidedeck_op2" name="p2" value="b" />
                        <input type="radio" class="slidedeck_op3" name="p2" value="c" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/<?php echo $_GET['eval'] ?>/slide3.jpg" />
                        <input type="radio" class="slidedeck_op1" name="p3" value="a" />
                        <input type="radio" class="slidedeck_op2" name="p3" value="b" />
                        <input type="radio" class="slidedeck_op3" name="p3" value="c" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/<?php echo $_GET['eval'] ?>/slide4.jpg" />
                        <input type="radio" class="slidedeck_op1" name="p4" value="a" />
                        <input type="radio" class="slidedeck_op2" name="p4" value="b" />
                        <input type="radio" class="slidedeck_op3" name="p4" value="c" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/<?php echo $_GET['eval'] ?>/slide5.jpg" />
                        <input type="radio" class="slidedeck_true" name="p5" value="true" />
                        <input type="radio" class="slidedeck_false" name="p5" value="false" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/<?php echo $_GET['eval'] ?>/slide6.jpg" />
                        <input type="radio" class="slidedeck_true" name="p6" value="true" />
                        <input type="radio" class="slidedeck_false" name="p6" value="false" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/<?php echo $_GET['eval'] ?>/slide7.jpg" />
                        <input type="radio" class="slidedeck_true" name="p7" value="true" />
                        <input type="radio" class="slidedeck_false" name="p7" value="false" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/<?php echo $_GET['eval'] ?>/slide8.jpg" />
                        <input type="radio" class="slidedeck_true" name="p8" value="true" />
                        <input type="radio" class="slidedeck_false" name="p8" value="false" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/<?php echo $_GET['eval'] ?>/slide9.jpg" />
                        <input type="radio" class="slidedeck_true" name="p9" value="true" />
                        <input type="radio" class="slidedeck_false" name="p9" value="false" />
                    </div>
                    </form>
                </div>
			</div>
			<div id="footer">
			<div class="linea"></div>
				<p>Estas imágenes e información contenidos en esta página privilegiada y confidencial destinado únicamente para el uso exclusivo de adidas. Se le notifica que cualquier divulgación, copia o uso de información dentro de ella está estrictamente prohibido. © 2010 adidas Group. adidas, el logo y las 3-tiras son marcas registradas de adidas Group. <a href="#" onClick="TyC()">Términos y Condiciones</a></p>
			</div>
		</div>
	</body>

</html>