<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "beta.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "3";
$MM_donotCheckaccess = "false";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && false) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "beta.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<title>Escuela Vitual Adidas </title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<link rel="stylesheet"href="style.css" type="text/css">
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.2.min.js"></script><
		<script type="text/javascript" src="js/actions.js"></script>
		<script type="text/javascript" src="js/cicle.js"></script>
		<script type="text/javascript">
			$(document).ready(function() { 

			$('.slideImages').cycle({
			   fx:   'fade', 
		        delay: -2000 
			});
			$('.slideImages2').cycle({
			   fx:   'fade', 
		        delay: -1000 
			});
			$('.slideImages3').cycle({
			   fx:   'fade', 
		        delay: -3000 
			});
			
	});
		</script>
	</head>
	<body>
	<div id="header">
				<div id="logo">
					<img src="images/logo.png" alt="Adidas/home"/>
				</div>
				<div id="user">
					<h2>Hola <?php echo $_SESSION['MM_Username']; ?></h2>
					<a href="<?php echo $logoutAction ?>">Log out</a>
				</div>
				<div id="mainmenu">
					<ul>
						<li><a href="#">Perfil</a></li>
						<li><a href="#"> Adidas</a></li>
						<li><a href="#"> Reebok</a></li>
						<li><a href="#"> Foros</a></li>
						<li><a href="#"> Premios</a></li>
	
					</ul>
				</div>
				<div id="div">
				
				</div>
			</div>
			<div class="clear"></div>
		<div id="container">
			
			<div id="content">
			
				<div id="homeSlide">
					
					
					<h3 class="titleSlide1">adiPURE VI</h3>
					<div id="homeSlideOne" class="slideImages">
						<a class="slideImg1"><img src="images/slide/Adipure_V1.png"/></a>
						<a class="slideImg1"><img src="images/slide/Adipure_V2.png"/></a>
						<a class="slideImg1"><img src="images/slide/Adipure_V3.png"/></a>
						<a class="slideImg1"><img src="images/slide/Adipure_V4.png"/></a>
						
					</div>
					
					<h3 class="titleSlide2">F50</h3>
					<div id="homeSlideTwo" class="slideImages2">
						<a class="slideImg2"><img src="images/slide/F50_V1.png"/></a>
						<a class="slideImg2"><img src="images/slide/F50_V2.png"/></a>
						<a class="slideImg2"><img src="images/slide/F50_V3.png"/></a>
						<a class="slideImg2"><img src="images/slide/F50_V4.png"/></a>
						
					</div>
					
					<h3 class="titleSlide3">Predator VI</h3>
					<div id="homeSlideThree" class="slideImages3">
						<a class="slideImg3"><img src="images/slide/Predator_V1.png"/></a>
						<a class="slideImg3"><img src="images/slide/Predator_V2.png"/></a>
						<a class="slideImg3"><img src="images/slide/Predator_V3.png"/></a>
						<a class="slideImg3"><img src="images/slide/Predator_V4.png"/></a>
						
					</div>
				</div>

			<!--
<div id="descripciones">
				<p id="uno" class="info"></p>
				<p id="dos" class="info"></p>
				<p id="tres" class="info"></p>
				<p id="cuatro" class="info"></p>
				<p id="cinco" class="info"></p>
				<p id="seis" class="info"></p>
			</div>
-->


				<div id="typical">
				<div id="close">
					<a  class="close"><img src="images/cerrar.png"></a>
				</div>
					<div id="text">
						<h2>adiPURE IV</h2>
					
						<h3>Beneficios principales</h3>
						<ul>
							<li>Mayor comodidad</li>
							<li>Mejor ajuste</li>
							<li>Control y presición</li>
						</ul>
						<h3>Clientes potenciales</h3>
						
						<p>Jugadores de futbol interesados en mayor comodidad y suavidad sin perder juego.</p>
					</div>
					<div id="image">
						
							
						<img src="images/mapAdipure_V1.png" border="0" usemap="#Map" />
<map name="Map" id="Map">
  <area shape="poly" coords="261,77,241,85,279,113,289,120,302,123,316,122,325,119,338,114,351,108,360,105,371,102,382,111,381,91,368,72,359,84,345,92,330,97,319,99,304,97,262,77"  id="clickUno" />
  <area shape="poly" coords="386,147,372,178,359,174,348,174,335,171,335,157"  id="clickDos" />
  <area shape="rect" coords="196,181,276,203"  id="clickTres" />
  <area shape="poly" coords="26,159,51,169,46,177,27,172,26,159" id="clickCuatro" />
  <area shape="poly" coords="76,111,45,115,31,120,38,125,58,123,76,119,75,111" id="clickCinco" />
  <area shape="poly" coords="221,50,232,67,134,100,132,93,220,51"  id="clickSeis" />
</map>
				
				
<p id="uno" class="info">Cuello Acolchado y blando</p>
				<p id="dos" class="info"><span class="titleInfo">Cuero de canguro</span><br/>Mejor calce y contacto con el balón</p>
				<p id="tres" class="info"><span class="titleInfo">Estabilizador de talón</span><br/>estabilidad, protección y reducción de presión en talón de aquiles. </p>
				<p id="cuatro" class="info"><span class="titleInfo">Construcción</span>  <span class="color">One touch</span><br/>más suave, menos absorción de agua, más transpirable y ligera.</p>
				<p id="cinco" class="info">Plantilla  <span class="color">adiPRENE</span><br/>Menor presión.</p>
				<p id="seis" class="info"><span class="color">Traxion</span><br/>Mayor velocidad y traxion.</p>
				
				
					</div>
					<div class="more">
					<img src="images/01-g.png" width="850" >
				</div>
				</div>

<div id="Predator">
				<div id="close">
					<a class="close"><img src="images/cerrar.png"></a>
				</div>
					<div id="text">
						<h2>adipower Predator</h2>
					
						<h3>Beneficios principales</h3>
						<ul>
							<li>Mayor potencia en tiros</li>
							<li>Mayor precisión manejando el balón</li>
							<li>Mejor ajuste y mayor comodidad</li>
						</ul>
						<h3>Clientes potenciales</h3>
						
						<p>Jugadores de futbol interesados en tiros más potentes y manejo mejor del balón</p>
					</div>
					<div id="image">
						
							
						<img src="images/mapPredator_V1.png" border="0" usemap="#Map2" />
    <map name="Map2" id="Map2">
      <area shape="poly" coords="231,74,209,82,256,128,275,118,232,75"  id="clickSiete"/>
      <area shape="poly" coords="206,59,212,68,130,106,116,99,203,59"  id="clickOcho" />
      <area shape="poly" coords="87,105,106,115,41,128,33,117,87,104"  id="clickNueve" />
      <area shape="rect" coords="61,150,93,170"   id="clickDiez"/>
      <area shape="rect" coords="187,185,217,200"   id="clickOnce"/>
      <area shape="rect" coords="284,184,318,203"  id="clickDoce"/>
      <area shape="poly" coords="364,120,362,127,379,147,382,131,363,120" id="clickTrece"/>
    </map>
				

<p id="siete" class="info">Cuero Alkantara<br/>Borde más suave</p>
				<p id="ocho" class="info"><span class="titleInfo">230 gms</span></p>
				<p id="nueve" class="info"><span class="color">SprintFrame</span><br/> mayor estabilidad en el talón. </p>
				<p id="diez" class="info"><span class="color">Zona Predator</span>  <br/>Caucho y silicon para viraje constante ya sea seco o mojado</p>
				<p id="diezuno" class="info"><span class="color">Zona Predator</span>  <br/>Caucho y silicon para viraje constante ya sea seco o mojado</p>
				<p id="once" class="info">Plantilla  <span class="color">adiPRENE</span><br/>Menor presión.</p>
				<p id="doce" class="info"><span class="color">Traxion</span><br/>Mayor velocidad y traxion.</p>

				
					</div>
					<div class="more">
					<img src="images/02-g.png" width="850">
				</div>
				</div>
				
				<div id="f50">
				<div id="close">
					<a class="close"><img src="images/cerrar.png"></a>
				</div>
					<div id="text">
						<h2>F50 adizero</h2>
					
						<h3>Beneficios principales</h3>
						<ul>
							<li>Menor peso (165 gms)</li>
							<li>Mayor velocidad</li>
							<li>Mejor soporte y estabilidad</li>
						</ul>
						<h3>Clientes potenciales</h3>
						
						<p>Jugadores de futbol interesados en mayor resistencia al jugar, velocidad y soporte. </p>
					</div>
					<div id="image">
						
							
						<img src="images/mapF50_V1.png" border="0" usemap="#Map3" />
<map name="Map3" id="Map3">
  <area shape="poly" coords="297,107,312,114,247,143,234,136"  id="clickCatorce"/>
  <area shape="poly" coords="255,64,269,75,192,109,183,103,255,65" id="clickQuince"/>
  <area shape="poly" coords="163,98,170,106,131,122,122,112,163,96"  id="clickDieseis" />
  <area shape="poly" coords="90,129,99,138,39,160,33,157,89,129"  id="clickDiesiete"/>
  <area shape="rect" coords="96,194,124,216"  id="clickDiesocho"/>
  <area shape="rect" coords="225,172,297,177"id="clickDiesnueve"/>
</map>				

				<p id="trece" class="info"><span class="color">Sprintframe</span><br/> Mayor estabilidad en el talón</p>
				<p id="catorce" class="info">Bandas internas de <span class="color">TPU</span>  Estabilidad  y soporte lateral</p>
				<p id="quince" class="info"><span class="color">Traxion</span><br/>Mayor velocidad y traxion </p>
				<p id="dieseis" class="info"><span class="titleInfo">Lazada Kevlar</span><br/>Delgada y resistente</p>
				<p id="diesiete" class="info"><span class="color">adiLine Twin</span><br/>Una sola capa sintética para mayor ligereza</p>
				<p id="diesocho" class="info">Marco lateral de <span class="color">TPU</span><br/>Estabilidad y soporte lateral</p>
				
				
					</div>
					<div class="more">
					<img src="images/03-g.png" width="850">
				</div>
				</div>


				
			</div>
			<div id="footer">
				<img src="images/adidas.jpg"/>
			</div>		
		</div>
	</body>
</html>