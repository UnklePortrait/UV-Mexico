<?php
include_once('functions.php');

$logoutAction = logout();
authorize(0, "index.php?accesscheck=" . $_SERVER['PHP_SELF']);
upload();
$user=profile();
?>
		
<?php include ("includes/header.php") ?>


	
      <div id="user">
    	              <h2 class="user">Hola <?php echo $user['nombre']; ?> </h2>
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
							<td>No</td>
							<td>0</td>
							<td>0</td>
						</tr>
						<tr>
							<td>Adizero F50</td>
							<td>No</td>
							<td>0</td>
							<td>0</td>
						</tr>
						<tr>
							<td>Predator</td>
							<td>No</td>
							<td>0</td>
							<td>0</td>
						</tr>
					</table>
				  </div>
					<div id="miPerfil">
					  <img src="imagesAdidas/perfil/title.png" class="titlePerfil">
						<?php if(isset($user['image']) && !empty($user['image'])):?>
						<img src="<?php echo $user['image']?>" width="150" height="200" >
                        <?php else:?>
                       <img src="imagesAdidas/perfil/undefined.png" width="150" height="200" >
						<form  method="post" enctype="multipart/form-data">
                        <input type="file" name="image" id="image" />
                        <input type= "submit" value="Subir imagen"/>
                        </form>
                        <?php endif;?>
                        <h2>Datos Personales</h2>
						<table id="datosP">
							<tr>
								<td class="titleTD">Nombre:</td>
								<td class="ans"><?php echo $user['nombre']; ?></td>
							</tr>
							<tr>
								<td class="titleTD">Cadena:</td>
								<td class="ans"><?php echo $user['cadena']; ?></td>
								<td class="titleTD">Sucursal:</td>
								<td class="ans"><?php echo $user['sucursal'];?></td>
							</tr>
							<tr>
								<td class="titleTD">Departamento:</td>
								<td class="ans"><?php echo $user['departamento']; ?></td>
								<td class="titleTD">Puesto</td>
								<td class="ans"><?php echo $user['puesto']; ?></td>
							</tr>
						
						</table>
					  <h2>Mis puntos</h2>
						<table id="puntos">
							<tr>
								<td class="titleTD">Total</td>
								<td class="ans"><?php echo $user['puntos'];?></td>
							</tr>
							<tr>
								<td class="titleTD">Por ingresos</td>
								<td class="ans"><?php echo $user['visitas'];?> </td>
								<td class="titleTD">Por módulos</td>
								<td class="ans">0 (0 módulos)</td>
							</tr>
							<tr>
								<td class="titleTD">Por calificaciones</td>
								<td class="ans"><?php echo $user['evaluaciones'];?><span>Ver tabla</span></td>
								<td class="titleTD">Puntos adicionales</td>
								<td class="ans">0</td>
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