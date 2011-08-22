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
				<li><a href="home1.php" id="menuInicio" class="menu"></a></li>
				<li><a href="#" id="menuPerfil" class="menu"  onclick="MM_goToURL('parent','perfil.php');return document.MM_returnValue"></a></li>
				<li class="menu_categoria">
                	<a href="#" id="menuForoDudas" class="menu"></a>
                    <ul>
                    	<li class="menu_subcategoria">
                        	<a href="#">F&uacute;tbol</a>
                        	<ul>
                            	<li><a href="foro1.php?cat=futbol&amp;subcat=f50">F50</a></li>
                                <li><a href="foro1.php?cat=futbol&amp;subcat=predator">Predator</a></li>
                                <li><a href="foro1.php?cat=futbol&amp;subcat=adipure">Adipure</a></li>
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
							<?php $tipo="adipure"; 
							$eval=get_eval($tipo);?>
                            <td>Adipure</td>
                            <td><?php echo ($eval['success'])?"Si":"No" ;?></td>
							<td><?php echo ($eval['success'])?$eval['puntos']/10:"0";?></td>
							<td><?php echo ($eval['success'])?$eval['puntos']:"0";?> </td>
                           
 
						</tr>
						<tr>
							<?php $tipo="f50"; 
							$eval=get_eval($tipo);?>
                            <td>Adizero F50</td>
 							<td><?php echo ($eval['success'])?"Si":"No" ;?></td>
							<td><?php echo ($eval['success'])?$eval['puntos']/10:"0";?></td>
							<td><?php echo ($eval['success'])?$eval['puntos']:"0";?> </td>
						</tr>
						<tr>
							<?php $tipo="predator"; 
							$eval=get_eval($tipo);?>
                            <td>Predator</td>
							 <td><?php echo ($eval['success'])?"Si":"No" ;?></td>
							<td><?php echo ($eval['success'])?$eval['puntos']/10:"0";?></td>
							<td><?php echo ($eval['success'])?$eval['puntos']:"0";?> </td>
						</tr>
					</table>
				  </div>
					<div id="miPerfil">
					  <img src="imagesAdidas/perfil/title.png" class="titlePerfil">
						<?php if(isset($user['image']) && !empty($user['image'])):?>
						<img src="<?php echo $user['image']?>" width="85" height="93" >
                        <?php else:?>
                       <img id="default_foto" src="imagesAdidas/perfil/default.png" width="85" height="93" >
						<form id="profileImage"  method="post" enctype="multipart/form-data">
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
			<div class="bottom3"></div>	
			<div id="footer">
			<div class="linea"></div>
				<p>Estas imágenes e información contenidos en esta página privilegiada y confidencial destinado únicamente para el uso exclusivo de adidas. Se le notifica que cualquier divulgación, copia o uso de información dentro de ella está estrictamente prohibido. © 2010 adidas Group. adidas, el logo y las 3-tiras son marcas registradas de adidas Group. <a href="#" onclick="TyC()">Términos y Condiciones</a></p>
			</div>
		</div>
	</body>
</html>