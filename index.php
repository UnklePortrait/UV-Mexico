<?php
include_once('functions.php');

login();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<title>::Universidad Virtual::</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<link rel="stylesheet"href="style.css" type="text/css">
		<script type="text/javascript" src="js/dwfunctions.js"></script>
	</head>
	<div id="container">
		<div id="header">
			<div id="logo">
				<a href="index.php"><img src="imagesAdidas/logo.png" class="logo"/></a>
				<img src="imagesAdidas/adidasgroup.png" class="adidasgroup"/>
			</div>				
		</div>
		<!--<div id="mainmenu"></div>-->
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
							<form method="post" class="log">
                            	<input type="hidden" name="login" />
                                usuario
                                <input type="text"  name="usuario" onblur="if(this.value == '')this.value='correo electrónico'" onclick="if(this.value == 'correo electrónico')this.value=''" /></br>
                                contraseña
                                <input type="password"  name="password"  class="password"/></br>
                                <input type="image" class="entrar" src="imagesAdidas/login/entrar.png" />
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