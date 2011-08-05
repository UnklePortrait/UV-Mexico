<?php require_once('Connections/db_adidas.php'); ?>
<?php
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
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "id_tipo_usuario";
  $MM_redirectLoginSuccess = "home.php";
  $MM_redirectLoginFailed = "beta.php";
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
			$MM_redirectLoginSuccess = "home.php";
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<title>Escuela Virtual Adidas </title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<link rel="stylesheet"href="style.css" type="text/css">
		<script type="text/javascript">
<!--
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
//-->
        </script>
	</head>
	<body>
		<div id="container">
			<div id="header">
				<div id="logo">
					<img src="images/logo.png" alt="Adidas/home"/>
				</div>
				
	    </div>
			<img src="images/barras.png">
			<div id="content">
				<div id="wrapper">
					<div id="panelOne">
					<img src="images/slide/Adipure_V1.png" >

					</div>	
					<div id="panelTwo">
					<img src="images/slide/Predator_V1.png" >

					</div>	
				</div>
				<div id="logIn">
						<div id="Ingresar">
							<form ACTION="<?php echo $loginFormAction; ?>" METHOD="POST" class="log" name="login">
                            
						    <input type="text" value="usuario" name="usuario" onclick="if(this.value == 'usuario')this.value=''" onblur="if(this.value == '')this.value='usuario'"/>
								<input type="text" value="contraseña" name="password" onclick="if(this.value == 'contraseña')this.value=''" onblur="if(this.value == '')this.value='contraseña'"/>
								<input type="submit" value="Iniciar sesion"name="submit"/>
							</form>
						</div>
						<div id="homeRegistro">
							<form class="registro">
								<input type="submit" value="Registrarse" onclick="MM_goToURL('parent','registro1.php?cadena=0');return document.MM_returnValue"/>
							</form>
						</div>
					</div>	

			</div>		
		</div>
	</body>
</html>