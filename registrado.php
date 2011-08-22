<?php require_once('Connections/db_adidas.php'); 
if (!isset($_SESSION)) {
  session_start();
}

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
?>
<?php
// *** Validate request to login to this site.

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['usuario'])) {
  $loginUsername=$_GET['usuario'];
  $password=$_GET['password'];
  $MM_fldUserAuthorization = "id_tipo_usuario";
  $MM_redirectLoginSuccess = "home1.php";
  $MM_redirectLoginFailed = "index.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_db_adidas, $db_adidas);
  	
  $LoginRS__query=sprintf("SELECT id_usuario, email, password, id_tipo_usuario, nombre FROM usuarios WHERE email=%s AND password=%s",
  GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $db_adidas) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
    
    $loginStrGroup  = mysql_result($LoginRS,0,'id_tipo_usuario');
	$loginIdUser  = mysql_result($LoginRS,0,'id_usuario');
	$loginNombre  = mysql_result($LoginRS,0,'nombre');

    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginNombre;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;
	$_SESSION['MM_UserId'] = $loginIdUser;	
	
	switch ($loginStrGroup){
	
		case 1: 
			$MM_redirectLoginSuccess = "home1.php";
		break;
	
		case 2:
			$MM_redirectLoginSuccess = "home.php";
		break;
	
		case 3:
			$MM_redirectLoginSuccess = "home.php";
		break;			
	}


    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<?php include ("includes/header2.php") ?>
		<script type="text/javascript">
<!--
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
function MM_callJS(jsStr) { //v2.0
  return eval(jsStr)
}
//-->
        </script>

			<!--<div id="mainmenu">
				</div>-->
			<div class="clear"></div>
			<div id="content">
				<div class="top"></div>
				<div id="registroBien">
					<img src="imagesAdidas/login/registroBien.png">
					<p class="bien"></p>
										<a href="home1.php" class="salir">entrar</a>
				</div>	
	
				<div class="bottom"></div>
			</div>
			<div class="clear"></div>
			<div id="footer">
				<p>Estas imágenes e información contenidos en esta página privilegiada y confidencial destinado únicamente para el uso exclusivo de adidas. Se le notifica que cualquier divulgación, copia o uso de información dentro de ella está estrictamente prohibido. © 2010 adidas Group. adidas, el logo y las 3-tiras son marcas registradas de adidas Group. <a href="index.php">Términos y Condiciones</a></p>
			</div>
		</div>
	</body>

</html>