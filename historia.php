<?php
include_once('functions.php');
$logoutAction = logout();
authorize(0, "index.php?accesscheck=" . $_SERVER['PHP_SELF']);
$user=profile();

?>
<?php include ("includes/header.php") ?>
      <div id="user">
    	              <h2 class="user">Hola <?php echo $user['nombre'] ?> </h2>
					 <a href="perfil.php" >Cerrar</a>	
					  
                      </div>

			<div class="linea"></div>
			<div id="content">
				<div class="top"></div> 
                <div id="content-home">
                	


					</div>
				</div>					
			</div>
			<div class="clear"></div>
			<div class="bottom3"></div>
			<div id="footer">
			<div class="linea"></div>
				<p>Estas imágenes e información contenidos en esta página privilegiada y confidencial destinado únicamente para el uso exclusivo de adidas. Se le notifica que cualquier divulgación, copia o uso de información dentro de ella está estrictamente prohibido. © 2010 adidas Group. adidas, el logo y las 3-tiras son marcas registradas de adidas Group. <a href="#" onClick="TyC()">Términos y Condiciones</a></p>
			</div>
		</div>
	</body>

</html>