<?php
session_start();
include('classes/user.php');
// *** Validate request to login to this site.

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['usuario'])) {
	$loginUsername=$_POST['usuario'];
	$password=$_POST['password'];
	$MM_fldUserAuthorization = "id_tipo_usuario";
	$MM_redirectLoginSuccess = "home.php";
	$MM_redirectLoginFailed = "index.php";
	$MM_redirecttoReferrer = false;
	
	$user = new User();
	$id_user = $user->login($loginUsername, $password);
	$profile = $user->profile($id_user);
	
	mysql_select_db($database_db_adidas, $db_adidas);
  	
  $LoginRS__query=sprintf("SELECT id_usuario, email, password, id_tipo_usuario, nombre,id_sucursal,id_departamento,id_puesto FROM usuarios WHERE email=%s AND password=%s",
  GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $db_adidas) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
    
    $loginStrGroup  = mysql_result($LoginRS,0,'id_tipo_usuario');
	$loginIdUser  = mysql_result($LoginRS,0,'id_usuario');
	$loginNombre  = mysql_result($LoginRS,0,'nombre');
	$sucursal= mysql_result($LoginRS,0,'id_sucursal');
	$departamento= mysql_result($LoginRS,0,'id_departamento');
	$puesto= mysql_result($LoginRS,0,'id_puesto');


    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginNombre;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;
	$_SESSION['MM_UserId'] = $loginIdUser;	
	$_SESSION['MM_UserPuesto'] =$puesto;
	$_SESSION['MM_UserDepartamento'] =$departamento;
	$_SESSION['MM_UserSucursal'] = $sucursal;
	
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
		<title>::Universidad Virtual::</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<link rel="stylesheet"href="style.css" type="text/css">
		<script type="text/javascript" src="js/dwfunctions.js">
	</head>
	<div id="container">
			<div id="header">
				<div id="logo">
					<a href="index.php"><img src="imagesAdidas/logo.png" class="logo"/></a>
					<img src="imagesAdidas/adidasgroup.png" class="adidasgroup"/>
				</div>				
			</div>
			<!--<div id="mainmenu">
				</div>-->
			<div class="clear"></div>
			<div class="linea"></div>
			<div id="content">
				<div class="top"></div>
				<div id="log">
				  <div id="registrate">
					<p>¿No tienes cuenta?</p>
					  <a href="#"><img src="imagesAdidas/login/registrate.png" onclick="MM_goToURL('parent','/registro.php');return document.MM_returnValue"></a>
					</div>
					<div id="login">
						<div class="title"><img src="imagesAdidas/login/title.png"></div>
						<div class="form">
						  <form ACTION="<?php echo $loginFormAction; ?>" METHOD="POST" class="log" name="login">
                            
                            e-mail
                            
						    <input type="text"  name="usuario" onclick="if(this.value == 'correo electronico')this.value=''" onblur="if(this.value == '')this.value='correo electronico'"/></br>
							contraseña
                            <input type="password"  name="password"  class="password"/></br>
						
                       <input type="image" class="entrar" src="imagesAdidas/login/entrar.png" />
                              <!--<input type="submit" value="Iniciar sesion"name="submit"/>-->

							</form>
						
						
                        
                        

                            
						<div class="userOptions">
									<a href="registroFalla.php">No puedo entrar a mi cuenta</a><br/>
									<a href="olvide_contrasena.php">Olvidé mi contraseña</a><br/>
									
						  </div>

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