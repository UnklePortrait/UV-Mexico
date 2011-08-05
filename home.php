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
	
  $logoutGoTo = "index.php";
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
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

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
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "index.php";
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
		<title>:: Universidad Virtual  ::</title>
		<link rel="stylesheet" href="style.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.2.min.js"></script>		
		<script type="text/javascript" src="js/jquery.carouFredSel-4.3.3-packed.js"></script>	
		<script src="js/swfobject_modified.js" type="text/javascript"></script>	
		<script type="text/javascript" src="js/actions.js"></script>
		<script type="text/javascript">
<!--
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
function TyC() {
		window.open( "tyc.html", "myWindow", 
		" fullscreen=0, toolbar=0, location=0, status=0, menubar=0, scrollbars=0, resizable=0, width=900, height=900",1)
		}



//-->
        </script>
	</head>
	<body>
		<div id="container">
			<div id="header">
				<div id="logo">
					<img src="imagesAdidas/logo.png" class="logo"/>
					<img src="imagesAdidas/reebok-adidas.png" class="adidas-reebok"/>
					
					
			  </div>	
			  
               <!--<h2 onclick="MM_goToURL('parent','perfil.php');return document.MM_returnValue">Perfil</h2>-->
      </div>
      <div id="user">
    	              <h2 class="user">Hola <?php echo $_SESSION['MM_Username']; ?> </h2>
					  <a href="<?php echo $logoutAction ?>" class="logout">Log out</a>	
					  </div>
			<div id="menu">
			<ul>
				<li><a href="#" id="menuPerfil" class="menu"  onclick="MM_goToURL('parent','perfil.php');return document.MM_returnValue"></a></li>
				<li><a href="#" id="menuForoDudas" class="menu"></a></li>
				<li><a href="#" id="menuVentas" class="menu"></a></li>
				<li><a href="#" id="menuCatalogo" class="menu"></a></li>
			</ul>
				</div>
			<div class="linea"></div>
			<div id="content">
				<div class="top"></div>
				<div id="content-home">
					<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="1000" height="600" id="Vid" title="video">
        	  	<param name="movie" value="swf/Adidas_.swf" />
        	  	<param name="quality" value="high" />
        	  	<param name="wmode" value="transparent" />
        	  	<param name="swfversion" value="6.0.65.0" />
        	  	<!-- Esta etiqueta param indica a los usuarios de Flash Player 6.0 r65 o posterior que descarguen la versión más reciente de Flash Player. Elimínela si no desea que los usuarios vean el mensaje. -->
        	  	<param name="expressinstall" value="Scripts/expressInstall.swf" />
        	  	<!-- La siguiente etiqueta object es para navegadores distintos de IE. Ocúltela a IE mediante IECC. -->
        	  	<!--[if !IE]>-->
              	<object type="application/x-shockwave-flash" data="swf/Adidas_.swf" width="1000" height="600">
        	    <!--<![endif]-->
        	    <param name="quality" value="high" />
        	    <param name="wmode" value="transparent" />
        	    <param name="swfversion" value="6.0.65.0" />
        	    <param name="expressinstall" value="Scripts/expressInstall.swf" />
        	    <!-- El navegador muestra el siguiente contenido alternativo para usuarios con Flash Player 6.0 o versiones anteriores. -->
        	    <div>
        	      <h4>El contenido de esta página requiere una versión más reciente de Adobe Flash Player.</h4>
        	      <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Obtener Adobe Flash Player" width="112" height="33" /></a></p>
      	      </div>
        	    <!--[if !IE]>-->
      	    	</object>
        	 	<!--<![endif]-->
      	  		</object>

					
				</div>					
			</div>
			<div class="clear"></div>
			<div class="bottom"></div>
			<div id="footer">
			<div class="linea"></div>
				<p>Estas imágenes e información contenidos en esta página privilegiada y confidencial destinado únicamente para el uso exclusivo de adidas. Se le notifica que cualquier divulgación, copia o uso de información dentro de ella está estrictamente prohibido. © 2010 adidas Group. adidas, el logo y las 3-tiras son marcas registradas de adidas Group. <a href="#" onclick="TyC()">Términos y Condiciones</a></p>
			</div>
		</div>
	</body>

</html>