<?php
include_once('functions.php');
$logoutAction = logout();
$eval = $_GET['eval'];
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
	$error=(isset($_GET['p10']))?false:true;
    $error=(isset($_GET['tp1']))?false:true;
	$error=(isset($_GET['tp2']))?false:true;
	$error=(isset($_GET['tp3']))?false:true;
	$error=(isset($_GET['tp4']))?false:true;
	$error=(isset($_GET['tp5']))?false:true;

	
	if(!$error){
		switch($_GET['evaluacion']){
			case 'f50':
			$respuestas=array('b','c','b','c','true','true','true','false','true','a');
			break;
			case'predator':
			$respuestas=array('b','c','a','true','a','a','b','c','b','c');
			break;
			case'adipure':
			$respuestas=array('c','c','b','true','false','false','a','a','a','b');
			break;
			case'predator':
			$respuestas=array('c','c','b','true','false','false','a','a','a','b');
			break;
			case'powerspine':
			$respuestas=array('c','c','b','true','false','false','a','a','a','b');
			break;
			case'tpu':
			$respuestas=array('c','c','b','true','false','false','a','a','a','b');
			break;
			case'adilite':
			$respuestas=array('c','c','b','true','false','false','a','a','a','b');
			break;
			case'traxion':
			$respuestas=array('c','c','b','true','false','false','a','a','a','b');
			break;
			case'sprintframe':
			$respuestas=array('c','c','b','true','false','false','a','a','a','b');
			break;
		}

		if(isset($_GET['p1'])){
			for($i=1;$i<10;$i++){
				if($_GET['p'.$i]==$respuestas[$i-1]){
					$aciertos++;
				}else{
					$errores++;
				}
			}
		}
        if(isset($_GET['tp1'])){
			for($i=1;$i<5;$i++){
				if($_GET['tp'.$i]==$respuestas[$i-1]){
					$aciertos++;
				}else{
					$errores++;
				}
			}
        }
  		$resultado=$aciertos-$errores;
  		if($resultado<0){
	  		$resultado=0;
		}
  		$user= new User();
  		$user->set_evaluation($_SESSION['id'],$resultado*10,$_GET['evaluacion']);
	}
}
authorize(0, "index.php?accesscheck=" . $_SERVER['PHP_SELF']);
$user=profile();
include ("includes/header.php");
?>
			<div id="containerGray">
			
			
			<div class="top"></div>
			<div id="content">
            	<div class="slidedeck">
                	<?php if(isset($_GET['evaluacion'])): ?>
                    <div class="notification">
                    	<?php if(!$error): ?>
                    	<div class="notification_success"><img src="imagesAdidas/evaluaciones/success.png" /></div>
                        <?php else: ?>
                        <div class="notification_error">
                        	<img src="imagesAdidas/evaluaciones/error.png" />
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                	<div class="slidedeck_buttons">
                        <a href="#" id="anterior"><img src="imagesAdidas/evaluaciones/anterior_btn.png" /></a>
                        <a href="#" id="siguiente"><img src="imagesAdidas/evaluaciones/siguiente_btn.png" /></a>
                        <a href="#" id="enviar"><img src="imagesAdidas/evaluaciones/enviar_btn.png" /></a>
                   		<a href="home1.php" id="salir"><img src="imagesAdidas/evaluaciones/salir_btn.png" /></a>
                    </div>
                    <?php switch($_GET['eval']){ 
					case "predator":?>
                    <form id="evaluacion" method="get">
                    <input type="hidden" name="evaluacion" value="<?php echo $_GET['eval'] ?>" />
                	<div class="slide">
                		<img src="imagesAdidas/evaluaciones/<?php echo $_GET['eval'] ?>/slide0.png" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/<?php echo $_GET['eval'] ?>/slide1.png" />
                        <input type="radio" class="slidedeck_op1" name="p1" value="a" />
                        <input type="radio" class="slidedeck_op2" name="p1" value="b" />
                        <input type="radio" class="slidedeck_op3" name="p1" value="c" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/<?php echo $_GET['eval'] ?>/slide2.png" />
                        <input type="radio" class="slidedeck_op1" name="p2" value="a" />
                        <input type="radio" class="slidedeck_op2" name="p2" value="b" />
                        <input type="radio" class="slidedeck_op3" name="p2" value="c" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/<?php echo $_GET['eval'] ?>/slide3.png" />
                        <input type="radio" class="slidedeck_op1" name="p3" value="a" />
                        <input type="radio" class="slidedeck_op2" name="p3" value="b" />
                        <input type="radio" class="slidedeck_op3" name="p3" value="c" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/<?php echo $_GET['eval'] ?>/slide4.png" />
                        <input type="radio" class="slidedeck_true" name="p4" value="true" />
                        <input type="radio" class="slidedeck_false" name="p4" value="false" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/<?php echo $_GET['eval'] ?>/slide5.png" />
                        <input type="radio" class="slidedeck_op1" name="p5" value="a" />
                        <input type="radio" class="slidedeck_op2" name="p5" value="b" />
                        <input type="radio" class="slidedeck_op3" name="p5" value="c" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/<?php echo $_GET['eval'] ?>/slide6.png" />
                        <input type="radio" class="slidedeck_op1" name="p6" value="a" />
                        <input type="radio" class="slidedeck_op2" name="p6" value="b" />
                        <input type="radio" class="slidedeck_op3" name="p6" value="c" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/<?php echo $_GET['eval'] ?>/slide7.png" />
                        <input type="radio" class="slidedeck_op1" name="p7" value="a" />
                        <input type="radio" class="slidedeck_op2" name="p7" value="b" />
                        <input type="radio" class="slidedeck_op3" name="p7" value="c" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/<?php echo $_GET['eval'] ?>/slide8.png" />
                        <input type="radio" class="slidedeck_op1" name="p8" value="a" />
                        <input type="radio" class="slidedeck_op2" name="p8" value="b" />
                        <input type="radio" class="slidedeck_op3" name="p8" value="c" />
                    </div>
                         <div class="slide">
                        <img src="imagesAdidas/evaluaciones/<?php echo $_GET['eval'] ?>/slide9.png" />
                        <input type="radio" class="slidedeck_op1" name="p9" value="a" />
                        <input type="radio" class="slidedeck_op2" name="p9" value="b" />
                        <input type="radio" class="slidedeck_op3" name="p9" value="c" />
                    </div>
                         <div class="slide">
                        <img src="imagesAdidas/evaluaciones/<?php echo $_GET['eval'] ?>/slide10.png" />
                        <input type="radio" class="slidedeck_op1" name="p10" value="a" />
                        <input type="radio" class="slidedeck_op2" name="p10" value="b" />
                        <input type="radio" class="slidedeck_op3" name="p10" value="c" />
                    </div>
					<?php break;
					case "f50":?>
                    <form id="evaluacion" method="get">
                    <input type="hidden" name="evaluacion" value="<?php echo $_GET['eval'] ?>" />
                	<div class="slide">
                		<img src="imagesAdidas/evaluaciones/<?php echo $_GET['eval'] ?>/slide0.png" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/<?php echo $_GET['eval'] ?>/slide1.png" />
                        <input type="radio" class="slidedeck_op1" name="p1" value="a" />
                        <input type="radio" class="slidedeck_op2" name="p1" value="b" />
                        <input type="radio" class="slidedeck_op3" name="p1" value="c" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/<?php echo $_GET['eval'] ?>/slide2.png" />
                        <input type="radio" class="slidedeck_op1" name="p2" value="a" />
                        <input type="radio" class="slidedeck_op2" name="p2" value="b" />
                        <input type="radio" class="slidedeck_op3" name="p2" value="c" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/<?php echo $_GET['eval'] ?>/slide3.png" />
                        <input type="radio" class="slidedeck_op1" name="p3" value="a" />
                        <input type="radio" class="slidedeck_op2" name="p3" value="b" />
                        <input type="radio" class="slidedeck_op3" name="p3" value="c" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/<?php echo $_GET['eval'] ?>/slide4.png" />
                        <input type="radio" class="slidedeck_op1" name="p4" value="a" />
                        <input type="radio" class="slidedeck_op2" name="p4" value="b" />
                        <input type="radio" class="slidedeck_op3" name="p4" value="c" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/<?php echo $_GET['eval'] ?>/slide5.png" />
                        <input type="radio" class="slidedeck_true" name="p5" value="true" />
                        <input type="radio" class="slidedeck_false" name="p5" value="false" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/<?php echo $_GET['eval'] ?>/slide6.png" />
                        <input type="radio" class="slidedeck_true" name="p6" value="true" />
                        <input type="radio" class="slidedeck_false" name="p6" value="false" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/<?php echo $_GET['eval'] ?>/slide7.png" />
                        <input type="radio" class="slidedeck_true" name="p7" value="true" />
                        <input type="radio" class="slidedeck_false" name="p7" value="false" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/<?php echo $_GET['eval'] ?>/slide8.png" />
                        <input type="radio" class="slidedeck_true" name="p8" value="true" />
                        <input type="radio" class="slidedeck_false" name="p8" value="false" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/<?php echo $_GET['eval'] ?>/slide9.png" />
                        <input type="radio" class="slidedeck_true" name="p9" value="true" />
                        <input type="radio" class="slidedeck_false" name="p9" value="false" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/<?php echo $_GET['eval'] ?>/slide10.png" />
                        <input type="radio" class="slidedeck_op1" name="p10" value="a" />
                        <input type="radio" class="slidedeck_op2" name="p10" value="b" />
                        <input type="radio" class="slidedeck_op3" name="p10" value="c" />
                    </div>
                    </form>
                    <?php break;
					case "adipure":?>
                    <form id="evaluacion" method="get">
                    <input type="hidden" name="evaluacion" value="<?php echo $_GET['eval'] ?>" />
                	<div class="slide">
                		<img src="imagesAdidas/evaluaciones/<?php echo $_GET['eval'] ?>/slide0.png" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/<?php echo $_GET['eval'] ?>/slide1.png" />
                        <input type="radio" class="slidedeck_op1" name="p1" value="a" />
                        <input type="radio" class="slidedeck_op2" name="p1" value="b" />
                        <input type="radio" class="slidedeck_op3" name="p1" value="c" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/<?php echo $_GET['eval'] ?>/slide2.png" />
                        <input type="radio" class="slidedeck_op1" name="p2" value="a" />
                        <input type="radio" class="slidedeck_op2" name="p2" value="b" />
                        <input type="radio" class="slidedeck_op3" name="p2" value="c" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/<?php echo $_GET['eval'] ?>/slide3.png" />
                        <input type="radio" class="slidedeck_op1" name="p3" value="a" />
                        <input type="radio" class="slidedeck_op2" name="p3" value="b" />
                        <input type="radio" class="slidedeck_op3" name="p3" value="c" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/<?php echo $_GET['eval'] ?>/slide4.png" />
                        <input type="radio" class="slidedeck_true" name="p4" value="true" />
                        <input type="radio" class="slidedeck_false" name="p4" value="false" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/<?php echo $_GET['eval'] ?>/slide5.png" />
                        <input type="radio" class="slidedeck_true" name="p5" value="true" />
                        <input type="radio" class="slidedeck_false" name="p5" value="false" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/<?php echo $_GET['eval'] ?>/slide6.png" />
                        <input type="radio" class="slidedeck_true" name="p6" value="true" />
                        <input type="radio" class="slidedeck_false" name="p6" value="false" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/<?php echo $_GET['eval'] ?>/slide7.png" />
                        <input type="radio" class="slidedeck_op1" name="p7" value="a" />
                        <input type="radio" class="slidedeck_op2" name="p7" value="b" />
                        <input type="radio" class="slidedeck_op3" name="p7" value="c" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/<?php echo $_GET['eval'] ?>/slide8.png" />
                        <input type="radio" class="slidedeck_op1" name="p8" value="a" />
                        <input type="radio" class="slidedeck_op2" name="p8" value="b" />
                        <input type="radio" class="slidedeck_op3" name="p8" value="c" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/<?php echo $_GET['eval'] ?>/slide9.png" />
                        <input type="radio" class="slidedeck_op1" name="p9" value="a" />
                        <input type="radio" class="slidedeck_op2" name="p9" value="b" />
                        <input type="radio" class="slidedeck_op3" name="p9" value="c" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/<?php echo $_GET['eval'] ?>/slide10.png" />
                        <input type="radio" class="slidedeck_op1" name="p10" value="a" />
                        <input type="radio" class="slidedeck_op2" name="p10" value="b" />
                        <input type="radio" class="slidedeck_op3" name="p10" value="c" />
                    </div>
                    </form>
                    <?php break;?>
                    <?php case "zona_predator":?>
                    <form id="evaluacion" method="get">
                    <input type="hidden" name="evaluacion" value="<?php echo $_GET['eval'] ?>" />
                  	<div class="slide">
                	<img src="imagesAdidas/evaluaciones/tecnologias/<?php echo $_GET['eval'] ?>/slide0.png" />
                    </div>
 
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/tecnologias/<?php echo $_GET['eval'] ?>/slide1.png" />
                        <input type="radio" class="slidedeck_op1" name="tp1" value="a" />
                        <input type="radio" class="slidedeck_op2" name="tp1" value="b" />
                        <input type="radio" class="slidedeck_op3" name="tp1" value="c" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/tecnologias/<?php echo $_GET['eval'] ?>/slide2.png" />
                        <input type="radio" class="slidedeck_op1" name="tp2" value="a" />
                        <input type="radio" class="slidedeck_op2" name="tp2" value="b" />
                        <input type="radio" class="slidedeck_op3" name="tp2" value="c" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/tecnologias/<?php echo $_GET['eval'] ?>/slide3.png" />
                        <input type="radio" class="slidedeck_op1" name="tp3" value="a" />
                        <input type="radio" class="slidedeck_op2" name="tp3" value="b" />
                        <input type="radio" class="slidedeck_op3" name="tp3" value="c" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/tecnologias/<?php echo $_GET['eval'] ?>/slide4.png" />
                        <input type="radio" class="slidedeck_op1" name="tp4" value="a" />
                        <input type="radio" class="slidedeck_op2" name="tp4" value="b" />
                        <input type="radio" class="slidedeck_op3" name="tp4" value="c" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/tecnologias/<?php echo $_GET['eval'] ?>/slide5.png" />
                        <input type="radio" class="slidedeck_op1" name="tp5" value="a" />
                        <input type="radio" class="slidedeck_op2" name="tp5" value="b" />
                        <input type="radio" class="slidedeck_op3" name="tp5" value="c" />
                    </div>
                         </form>
                    <?php break;?>

                    <?php case "powerspine":?>
                    <form id="evaluacion" method="get">
                    <input type="hidden" name="evaluacion" value="<?php echo $_GET['eval'] ?>" />
                	<div class="slide">
                		<img src="imagesAdidas/evaluaciones/tecnologias/<?php echo $_GET['eval'] ?>/slide0.png" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/tecnologias/<?php echo $_GET['eval'] ?>/slide1.png" />
                        <input type="radio" class="slidedeck_true" name="tp1" value="true" />
                        <input type="radio" class="slidedeck_false" name="tp1" value="false" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/tecnologias/<?php echo $_GET['eval'] ?>/slide2.png" />
                        <input type="radio" class="slidedeck_op1" name="tp2" value="a" />
                        <input type="radio" class="slidedeck_op2" name="tp2" value="b" />
                        <input type="radio" class="slidedeck_op3" name="tp2" value="c" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/tecnologias/<?php echo $_GET['eval'] ?>/slide3.png" />
                        <input type="radio" class="slidedeck_op1" name="tp3" value="a" />
                        <input type="radio" class="slidedeck_op2" name="tp3" value="b" />
                        <input type="radio" class="slidedeck_op3" name="tp3" value="c" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/tecnologias/<?php echo $_GET['eval'] ?>/slide4.png" />
                        <input type="radio" class="slidedeck_op1" name="tp4" value="a" />
                        <input type="radio" class="slidedeck_op2" name="tp4" value="b" />
                        <input type="radio" class="slidedeck_op3" name="tp4" value="c" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/tecnologias/<?php echo $_GET['eval'] ?>/slide5.png"/>
                        <input type="radio" class="slidedeck_op1" name="tp5" value="a" />
                        <input type="radio" class="slidedeck_op2" name="tp5" value="b" />
                        <input type="radio" class="slidedeck_op3" name="tp5" value="c" />
                    </div>
                         </form>
                    <?php break;?>
                    <?php case "tpu":?>
                    <form id="evaluacion" method="get">
                    <input type="hidden" name="evaluacion" value="<?php echo $_GET['eval'] ?>" />
                	<div class="slide">
                		<img src="imagesAdidas/evaluaciones/tecnologias/<?php echo $_GET['eval'] ?>/slide0.png" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/tecnologias/<?php echo $_GET['eval'] ?>/slide1.png" />
                        <input type="radio" class="slidedeck_op1" name="tp1" value="a" />
                        <input type="radio" class="slidedeck_op2" name="tp1" value="b" />
                        <input type="radio" class="slidedeck_op3" name="tp1" value="c" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/tecnologias/<?php echo $_GET['eval'] ?>/slide2.png"/>
                        <input type="radio" class="slidedeck_op1" name="tp2" value="a" />
                        <input type="radio" class="slidedeck_op2" name="tp2" value="b" />
                        <input type="radio" class="slidedeck_op3" name="tp2" value="c" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/tecnologias/<?php echo $_GET['eval'] ?>/slide3.png" />
                        <input type="radio" class="slidedeck_op1" name="tp3" value="a" />
                        <input type="radio" class="slidedeck_op2" name="tp3" value="b" />
                        <input type="radio" class="slidedeck_op3" name="tp3" value="c" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/tecnologias/<?php echo $_GET['eval'] ?>/slide4.png" />
                        <input type="radio" class="slidedeck_true" name="tp4" value="true" />
                        <input type="radio" class="slidedeck_false" name="tp4" value="false" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/tecnologias/<?php echo $_GET['eval'] ?>/slide5.png" />
                        <input type="radio" class="slidedeck_op1" name="tp5" value="a" />
                        <input type="radio" class="slidedeck_op2" name="tp5" value="b" />
                        <input type="radio" class="slidedeck_op3" name="tp5" value="c" />
                    </div>
                         </form>
                    <?php break;?>

                    <?php case "adilite":?>
                    <form id="evaluacion" method="get">
                    <input type="hidden" name="evaluacion" value="<?php echo $_GET['eval'] ?>" />
                	<div class="slide">
                		<img src="imagesAdidas/evaluaciones/tecnologias/<?php echo $_GET['eval'] ?>/slide0.png"/>
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/tecnologias/<?php echo $_GET['eval'] ?>/slide1.png" />
                        <input type="radio" class="slidedeck_op1" name="tp1" value="a" />
                        <input type="radio" class="slidedeck_op2" name="tp1" value="b" />
                        <input type="radio" class="slidedeck_op3" name="tp1" value="c" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/tecnologias/<?php echo $_GET['eval'] ?>/slide2.png" />
                        <input type="radio" class="slidedeck_op1" name="tp2" value="a" />
                        <input type="radio" class="slidedeck_op2" name="tp2" value="b" />
                        <input type="radio" class="slidedeck_op3" name="tp2" value="c" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/tecnologias/<?php echo $_GET['eval'] ?>/slide3.png" />
                        <input type="radio" class="slidedeck_true" name="tp3" value="true" />
                        <input type="radio" class="slidedeck_false" name="tp3" value="false" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/tecnologias/<?php echo $_GET['eval'] ?>/slide4.png" />
                        <input type="radio" class="slidedeck_op1" name="tp4" value="a" />
                        <input type="radio" class="slidedeck_op2" name="tp4" value="b" />
                        <input type="radio" class="slidedeck_op3" name="tp4" value="c" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/tecnologias/<?php echo $_GET['eval'] ?>/slide5.png" />
                        <input type="radio" class="slidedeck_op1" name="tp5" value="a" />
                        <input type="radio" class="slidedeck_op2" name="tp5" value="b" />
                        <input type="radio" class="slidedeck_op3" name="tp5" value="c" />
                    </div>
                         </form>
                    <?php break;?>
                    <?php case "traxion":?>
                    <form id="evaluacion" method="get">
                    <input type="hidden" name="evaluacion" value="<?php echo $_GET['eval'] ?>" />
                	<div class="slide">
                		<img src="imagesAdidas/evaluaciones/tecnologias/<?php echo $_GET['eval'] ?>/slide0.png" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/tecnologias/<?php echo $_GET['eval'] ?>/slide1.png" />
                        <input type="radio" class="slidedeck_op1" name="tp1" value="a" />
                        <input type="radio" class="slidedeck_op2" name="tp1" value="b" />
                        <input type="radio" class="slidedeck_op3" name="tp1" value="c" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/tecnologias/<?php echo $_GET['eval'] ?>/slide2.png"/>
                        <input type="radio" class="slidedeck_op1" name="tp2" value="a" />
                        <input type="radio" class="slidedeck_op2" name="tp2" value="b" />
                        <input type="radio" class="slidedeck_op3" name="tp2" value="c" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/tecnologias/<?php echo $_GET['eval'] ?>/slide3.png" />
                        <input type="radio" class="slidedeck_op1" name="tp3" value="a" />
                        <input type="radio" class="slidedeck_op2" name="tp3" value="b" />
                        <input type="radio" class="slidedeck_op3" name="tp3" value="c" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/tecnologias/<?php echo $_GET['eval'] ?>/slide4.png" />
                        <input type="radio" class="slidedeck_op1" name="tp4" value="a" />
                        <input type="radio" class="slidedeck_op2" name="tp4" value="b" />
                        <input type="radio" class="slidedeck_op3" name="tp4" value="c" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/tecnologias/<?php echo $_GET['eval'] ?>/slide5.png"/>
                        <input type="radio" class="slidedeck_op1" name="tp5" value="a" />
                        <input type="radio" class="slidedeck_op2" name="tp5" value="b" />
                        <input type="radio" class="slidedeck_op3" name="tp5" value="c" />
                    </div>
                         </form>
                    <?php break;?>
                    <?php case "sprintframe":?>
                    <form id="evaluacion" method="get">
                    <input type="hidden" name="evaluacion" value="<?php echo $_GET['eval'] ?>" />
                	<div class="slide">
                		<img src="imagesAdidas/evaluaciones/tecnologias/<?php echo $_GET['eval'] ?>/slide0.png"/>
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/tecnologias/<?php echo $_GET['eval'] ?>/slide1.png" />
                        <input type="radio" class="slidedeck_op1" name="tp1" value="a" />
                        <input type="radio" class="slidedeck_op2" name="tp1" value="b" />
                        <input type="radio" class="slidedeck_op3" name="tp1" value="c" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/tecnologias/<?php echo $_GET['eval'] ?>/slide2.png" />
                        <input type="radio" class="slidedeck_op1" name="tp2" value="a" />
                        <input type="radio" class="slidedeck_op2" name="tp2" value="b" />
                        <input type="radio" class="slidedeck_op3" name="tp2" value="c" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/tecnologias/<?php echo $_GET['eval'] ?>/slide3.png" />
                        <input type="radio" class="slidedeck_op1" name="tp3" value="a" />
                        <input type="radio" class="slidedeck_op2" name="tp3" value="b" />
                        <input type="radio" class="slidedeck_op3" name="tp3" value="c" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/tecnologias/<?php echo $_GET['eval'] ?>/slide4.png"/>
   		      <input type="radio" class="slidedeck_op1" name="tp4" value="a" />
                        <input type="radio" class="slidedeck_op2" name="tp4" value="b" />
                        <input type="radio" class="slidedeck_op3" name="tp4" value="c" />
                    </div>
                    <div class="slide">
                        <img src="imagesAdidas/evaluaciones/tecnologias/<?php echo $_GET['eval'] ?>/slide5.png" />
                       <input type="radio" class="slidedeck_op1" name="tp5" value="a" />
                        <input type="radio" class="slidedeck_op2" name="tp5" value="b" />
                        <input type="radio" class="slidedeck_op3" name="tp5" value="c" />
                    </div>
                         </form>
                    <?php break;?>
					<?php } ?>
                </div>
                <div class="bottom1"></div>
			</div>
			<div id="footer">
			<div class="linea"></div>
				<p>Estas imágenes e información contenidos en esta página privilegiada y confidencial destinado únicamente para el uso exclusivo de adidas. Se le notifica que cualquier divulgación, copia o uso de información dentro de ella está estrictamente prohibido. © 2010 adidas Group. adidas, el logo y las 3-tiras son marcas registradas de adidas Group. <a href="#" onClick="TyC()">Términos y Condiciones</a></p>
			</div>
		</div>
		</div>
	</body>

</html>