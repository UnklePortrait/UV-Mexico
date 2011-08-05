
<?php
virtual('/adidas2/Connections/db_adidas.php'); 
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
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['usuario'])) {
  $loginUsername=$_POST['usuario'];
  $password=$_POST['name'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "/adidas2/new/home.php";
  $MM_redirectLoginFailed = "/adidas2/new/inicioant.php";
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
			$MM_redirectLoginSuccess = "/adidas2/new/home.php";
		break;
	
		case 2:
			$MM_redirectLoginSuccess = "/adidas2/new/home.php";
		break;
	
		case 3:
			$MM_redirectLoginSuccess = "/adidas2/new/home.php";
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<title>:: Escuela Virtual Adidas-Reebok ::</title>
		<link rel="stylesheet" href="style.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />		
</head>
	<body>
		<div id="container">
			<div id="header">
				<div id="logo">
					<img src="imagesAdidas/logo.png" class="logo"/>
					<img src="imagesAdidas/adidas-reebok.png" class="adidas-reebok"/>
				</div>				
			</div>
			<!--<div id="mainmenu">
				</div>-->
			<div class="clear"></div>
			<div id="content">
				<img src="imagesAdidas/grid.png" class="top">
				<div id="log">
				  <div id="registrate">
						<p>¿No tienes cuenta?</p>
						<a href="#"><img src="imagesAdidas/login/enviarRegistro.png"></a>
			    </div>
					<div id="login">
						<div class="title"><img src="imagesAdidas/login/title.png"></div>
					  <div class="form">
                  <form ACTION="<?php echo $loginFormAction; ?>" METHOD="POST">
				  
                            Usuario:
							<input type="text" name="usuario"><br/>
							Password:
							<input type="text" name="name"><br/>
                            <input type="submit" name="enviar" value="enviar"><br/>
							
                    </form>
                            <a href="#"><img src="imagesAdidas/login/entrar.png" class="entrar"></a>
					
                        <div class="userOptions">
									<a href="#">No puedo entrar a mi cuenta</a><br/>
									<a href="#">Olvidé mi contraseña</a><br/>
									
						</div>

					  </div>
					</div>	
				</div>	
				<img src="imagesAdidas/grid.png" class="bottom">		
			</div>
			<div class="clear"></div>
			<div id="footer">
				<p>Estas imágenes e información contenidos en esta página privilegiada y confidencial destinado únicamente para el uso exclusivo de adidas. Se le notifica que cualquier divulgación, copia o uso de información dentro de ella está estrictamente prohibido. © 2010 adidas Group. adidas, el logo y las 3-tiras son marcas registradas de adidas Group. <a href="#">Términos y Condiciones</a></p>
			</div>
		</div>
	</body>

</html>