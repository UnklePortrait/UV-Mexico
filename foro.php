<?php
include_once('functions.php');

$logoutAction = logout();
//$user = authorize(0, "index.php?accesscheck=" . $_SERVER['PHP_SELF']);
?>
<?php include ("includes/header.php") ?>
      
      <div id="user">
    	              <h2 class="user">Hola <?php echo $user['nombre'] ?> </h2>
					  <a href="<?php echo $logoutAction ?>" class="logout">Log out</a>	
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
                <p class="olvide-text">Escribe la problemática</p>
					<textarea name="mensaje" class="sendMail" cols="40" rows="10" id="mensaje" ></textarea>
					

					
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