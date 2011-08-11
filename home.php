<?php
include_once('functions.php');
$logoutAction = logout();
authorize(0, "index.php?accesscheck=" . $_SERVER['PHP_SELF']);
$user=profile();

?>
<?php include ("includes/header.php") ?>
      <div id="user">
    	              <h2 class="user">Hola <?php echo $user['nombre'] ?> </h2>
					  <a href="<?php echo $logoutAction ?>" class="logout">Cerrar sesi&oacute;n</a>	
					  </div>
			<div id="menu">
			<ul>
				<li><a href="home.php" id="menuInicio" class="menu"></a></li>

				<li><a href="#" id="menuPerfil" class="menu"  onclick="MM_goToURL('parent','perfil.php');return document.MM_returnValue"></a></li>
				<li class="menu_categoria">
                	<a href="#" id="menuForoDudas" class="menu"></a>
                    <ul>
                    	<li class="menu_subcategoria">
                        	<a href="#">F&uacute;tbol</a>
                        	<ul>
                            	<li><a href="foro.php?cat=futbol&subcat=f50">F50</a></li>
                                <li><a href="foro.php?cat=futbol&subcat=predator">Predator</a></li>
                                <li><a href="foro.php?cat=futbol&subcat=adipure">Adipure</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Running</a></li>
                        <li><a href="#">Training</a></li>
                        <li><a href="#">NEO</a></li>
                    </ul>
                </li>

				<li><a href="#" id="menuVentas" class="menu"></a></li>
				<li><a href="#" id="menuCatalogo" class="menu"></a></li>
			</ul>
			</div>
			<div class="linea"></div>
			<div id="content">
				<div class="top"></div>
				<div id="content-home">
                <div id='bannerHome'>
		<img src="imagesAdidas/bannerHome/photo1.jpg" />
		<img src="imagesAdidas/bannerHome/photo2.jpg" />
		<img src="imagesAdidas/bannerHome/photo3.jpg" />
		<img src="imagesAdidas/bannerHome/photo4.jpg" />
		
	</div>
					<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="1000" height="480" id="Vid" title="video">
        	  	<param name="movie" value="swf/Adidas_.swf" />
        	  	<param name="quality" value="high" />
        	  	<param name="wmode" value="transparent" />
        	  	<param name="swfversion" value="6.0.65.0" />
        	  	<!-- Esta etiqueta param indica a los usuarios de Flash Player 6.0 r65 o posterior que descarguen la versión más reciente de Flash Player. Elimínela si no desea que los usuarios vean el mensaje. -->
        	  	<param name="expressinstall" value="Scripts/expressInstall.swf" />
        	  	<!-- La siguiente etiqueta object es para navegadores distintos de IE. Ocúltela a IE mediante IECC. -->
        	  	<!--[if !IE]>-->
              	<object type="application/x-shockwave-flash" data="swf/Adidas_.swf" width="1000" height="480">
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
				<p>Estas imágenes e información contenidos en esta página privilegiada y confidencial destinado únicamente para el uso exclusivo de adidas. Se le notifica que cualquier divulgación, copia o uso de información dentro de ella está estrictamente prohibido. © 2010 adidas Group. adidas, el logo y las 3-tiras son marcas registradas de adidas Group. <a href="#" onClick="TyC()">Términos y Condiciones</a></p>
			</div>
		</div>
	</body>

</html>