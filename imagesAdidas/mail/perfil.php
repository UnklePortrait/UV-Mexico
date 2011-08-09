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
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }
  }
$LoginRS__query=sprintf("SELECT id_usuario, email, password, id_tipo_usuario, nombre,departamento,cadena,sucursal,puesto FROM usuarios WHERE email=%s AND password=%s",
 GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 

 $LoginRS = mysql_query($LoginRS__query, $db_adidas) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  
  //test
  print_r(mysql_fetch_array($loginFoundUser));
  echo "LoginFoundUser";
  //testfin
  
  
  if ($loginFoundUser) {
    
    $loginStrGroup  = mysql_result($LoginRS,0,'id_tipo_usuario');
	$loginIdUser  = mysql_result($LoginRS,0,'id_usuario');
	$loginNombre  = mysql_result($LoginRS,0,'nombre');
	$loginCadena  = mysql_result($LoginRS,0,'cadena');
	$loginSucursal  = mysql_result($LoginRS,0,'sucursal');
	$loginPuesto  = mysql_result($LoginRS,0,'puesto');
	$loginDepartamento  = mysql_result($LoginRS,0,'departamento');

    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginNombre;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;
	$_SESSION['MM_UserId'] = $loginIdUser;	
	$_SESSION['MM_UserCadena'] = $loginCadena;
	$_SESSION['MM_UserSucursal'] = $loginSucursal;
	$_SESSION['MM_UserPuesto'] = $loginPuesto;
	$_SESSION['MM_UserDepartamento'] = $loginDepartamento;
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
		<title>:: Escuela Virtual::</title>
		<link rel="stylesheet" href="../style.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />		
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
					<a href="home.php"><img src="imagesAdidas/logo.png" class="logo"/></a>
					<img src="imagesAdidas/reebok-adidas.png" class="adidas-reebok"/>
					
					
			  </div>	
			  
               <!--<h2 onclick="MM_goToURL('parent','perfil.php');return document.MM_returnValue">Perfil</h2>-->
      </div>
      <div id="user">
    	              <h2 class="user">Hola <?php echo $_SESSION['MM_Username']; ?> </h2>
					  <a href="<?php echo $logoutAction ?>" class="logout">cerrar sesion</a>	
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
				<div id="content-perfil">
				
					<div id="infoModulos">
					<table id="perfil">
						<tr class="titleModulos">
							<td>Módulos</td>
							<td>Completado</td>
							<td>Calificación</td>
							<td>Puntos</td>
						</tr>
						<tr>
							<td>Adiprene+</td>
							<td>Sí</td>
							<td>85</td>
							<td>95</td>
						</tr>
						<tr>
							<td>Adizero F50</td>
							<td>No</td>
							<td></td>
							<td>95</td>
						</tr>
						<tr>
							<td>Predator</td>
							<td>No</td>
							<td>65</td>
							<td>75</td>
						</tr>
					</table>
				  </div>
					<div id="miPerfil">
					  <img src="imagesAdidas/perfil/title.png" class="titlePerfil">
						
						<h2>Datos Personales</h2>
						<table id="datosP">
							<tr>
								<td class="titleTD">Nombre:</td>
								<td class="ans"><?php echo $_SESSION['MM_Username']; ?></td>
							</tr>
							<tr>
								<td class="titleTD">Cadena</td>
								<td class="ans"><?php echo $_SESSION['MM_UserCadena']; ?></td>
								<td class="titleTD">Sucursal</td>
								<td class="ans"><?php echo $_SESSION['MM_UserSucursal'];?></td>
							</tr>
							<tr>
								<td class="titleTD">Departamento</td>
								<td class="ans"><?php echo $_SESSION['MM_UserDepartamento']; ?></td>
								<td class="titleTD">Puesto</td>
								<td class="ans"><?php echo $_SESSION['MM_UserPuesto']; ?></td>
							</tr>
						
						</table>
					  <h2>Mis puntos</h2>
						<table id="puntos">
							<tr>
								<td class="titleTD">Total</td>
								<td class="ans">3320</td>
							</tr>
							<tr>
								<td class="titleTD">Por ingresos</td>
								<td class="ans">120 (12 ingresos)</td>
								<td class="titleTD">Por módulos</td>
								<td class="ans">300 (30 módulos)</td>
							</tr>
							<tr>
								<td class="titleTD">Por calificaciones</td>
								<td class="ans">2550 <span>Ver tabla</span></td>
								<td class="titleTD">Puntos adicionales</td>
								<td class="ans">350</td>
							</tr>
						
						</table>
					</div>
					
			  </div>
			
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