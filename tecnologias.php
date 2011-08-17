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
				<div id="content-tecnologia">
                	<?php if($_GET['tech'] == "1"): ?>                    
                    <a href="evaluacion.php?eval=zona_predator" id="prueba" class="evaluacion"><img src="imagesAdidas/evaluaciones/contestar_evaluacion.png" /></a>
                    <div id="slideTec1">                    
                        <div class="descriptionTec">
                			<img src="imagesAdidas/tecnologias/predator/title1.png">
	                		<p class="desTec">Viraje</p>
    	            		<p class="textTec">El elemento PREDATOR ha sido diseñado de una mezcla de caucho de silicona. </p>
        	        		<p class="textTec">Situado en una posición óptima,  este compuesto blando ofrece el VIRAJE, CONTROL y PRECISIÓN a través de un mayor tiempo de contacto con el balón y una Tasa alta fricción en un área con mayor contacto. </p>
            	    		<p class="textTec">El reposicionamiento del elemento PREDATOR se basa en la información brindada por los jugadores profesionales y extensas pruebas. El nuevo elemento PREDATOR muestra una perfecta y absoluta constancia en las condiciones húmedas y secas.</p>
                		</div>
                		<div class="imgTec">
                			<img src="imagesAdidas/tecnologias/predator/img1.png">
	                	</div>
					</div>
                    <?php elseif($_GET['tech'] == "2"): ?>
					<a href="evaluacion.php?eval=powerspine" id="prueba" class="evaluacion"><img src="imagesAdidas/evaluaciones/contestar_evaluacion.png" /></a>
                    <div id="slideTec2">
                        <div class="descriptionTec">
        	        		<img src="imagesAdidas/tecnologias/predator/title2.png">
            	    		<p class="desTec">Poder</p>
                			<p class="textTec">La tecnología POWERSPINE esta inspirada en el sistema FINGERSAVE. Diseñadas específicamente para minimizar la pérdida de energía durante el pateo a través de una reducción de la  “flexión de pateo” en el área del empeine.</p>
                			<p class="textTec">De esta manera, la energía “adicional” es transferida directamente hacia el balón y lejos de los frágiles ligamentos y huesos del pie y automáticamente da como resultado un impacto mucho mas PODEROSO. Adicionalmente la energía dañina en el área del empeine es reducida, minimizando el riesgo de lesiones.</p>
                			<p class="textTec">Garantiza un cómodo movimiento al correr.</p>
	                	</div>
    	            	<div class="imgTec">
        	        		<img src="imagesAdidas/tecnologias/predator/img2.png">
            	    	</div>
					</div>	
                    <?php elseif($_GET['tech'] == "3"): ?>
					 <img src="imagesAdidas/tecnologias/predator/title3.png">
                    <div id="slideTec3">	
                        <div class="descriptionTec">
            	    		<p class="desTec"></p>
                			<p class="textTec">Lazada asimétrica para dar una zona de pateo mas amplia y un  mejor contacto con el balón.</p>
                		
                		</div>
	                	<div class="imgTec">
    	            		<img src="imagesAdidas/tecnologias/predator/img3.png">
        	        	</div>
					
					</div>
                    <?php elseif($_GET['tech'] == "4"): ?>
					<a href="evaluacion.php?eval=tpu" id="prueba" class="evaluacion"><img src="imagesAdidas/evaluaciones/contestar_evaluacion.png" /></a>
                    <div id="slideTec4">
                        <div class="descriptionTec" >
        	        		<img src="imagesAdidas/tecnologias/predator/title4.png">
            	    		<p class="desTec"></p>
                			<p class="textTec">El marco inferior de TPU es uno de los elementos mas icónicos del nuevo F50 adizero. Su función es la de Reforzar la capa de material transfiriendo las fuerzas desde la capellada a la resistente suela; y proveer una Estabilidad mejorada en la zona media y lateral.</p>
                			<p class="textTec">También funciona en contra de la abrasión (protege la capellada) y crea un enlace fantástico entre la Capellada y la suela.</p>
                			<p class="textTec">Funciones principales:
								<ul>
									<li>- Transfiere las fuerzas de la capellada a la suela</li>
									<li>- Estabilidad y refuerzo</li>
									<li>- Protección contra la abrasión de la capellada</li>
									<li>- Mejor unión entre la capellada y la suela</li>
								</ul></p>
                		</div>
                		<div class="imgTec">
                			<img src="imagesAdidas/tecnologias/predator/img4.png">
	                	</div>
					
					</div>
                    <?php elseif($_GET['tech'] == "5"): ?>
					<a href="evaluacion.php?eval=tpu" id="prueba" class="evaluacion"><img src="imagesAdidas/evaluaciones/contestar_evaluacion.png" /></a>
                    <div id="slideTec5">
                        <div class="descriptionTec">
        	        		<img src="imagesAdidas/tecnologias/predator/title5.png">
            	    		<p class="desTec">Estructura interna de TPU en el calzado que refuerza las paredes laterales.</p>
                			<p class="textTec"><ul>
                					<li>- Ofrecen mayor soporte y estabilidad</li>
									<li>- Refuerzan la capellada de una sola capa</li>
									<li>- Ayudan a ahorrar energía de los movimientos laterales</li>
								</ul>
							</p>
        	        	</div>
            	    	<div class="imgTec">
                			<img src="imagesAdidas/tecnologias/predator/img5.png">
                		</div>
					</div>
                    <?php elseif($_GET['tech'] == "6"): ?>
					<a href="evaluacion.php?eval=adilite" id="prueba" class="evaluacion"><img src="imagesAdidas/evaluaciones/contestar_evaluacion.png" /></a>
                    <div id="slideTec6">
                        <div class="descriptionTec">
                			<img src="imagesAdidas/tecnologias/predator/title6.png">
	                		<p class="desTec">Para el calzado más ligero del planeta</p>
    	            		<p class="textTec">
        	        			<ul>
            	    				<li>- Revolucionaria capa única de PU sintético </li>
									<li>- Más delgado y liviano pero de la mismas resistencia y durabilidad que los materiales tradicionales</li>
									<li>- No hay necesidad de revestimiento de foam adicional</li>
									<li>- Reduce la acumulación de agua en comparación con el cuero</li>
									<li>- Ofrece un contacto excepcional con el balón, gracias a la reducción de las capas</li>
									<li>- Nueva fibra de carbón para mejor manejo del balón</li>
									<li>- Fácil de mantener y limpiar</li>                			
    	            			</ul>
	                		</p>
    	            	</div>
        	        	<div class="imgTec">
            	    		<img src="imagesAdidas/tecnologias/predator/img6.png">
                		</div>					
					</div>
                    <?php elseif($_GET['tech'] == "7"): ?>
					<a href="evaluacion.php?eval=traxion" id="prueba" class="evaluacion"><img src="imagesAdidas/evaluaciones/contestar_evaluacion.png" /></a>
                    <div id="slideTec7">                    
						<div class="descriptionTec" >
                			<img src="imagesAdidas/tecnologias/predator/title7.png">
	                		<p class="desTec">Desempeño funcional con cada tache</p>
    	            		<p class="textTec">
Para máxima aceleración, frenado y giros. Los nuevos taches con forma triangular con posiciones y orientaciones específicas brindan máxima aceleración y giros rápidos. 
<b>¡El jugador reacciona más rápido que nunca!</b></p>
							<p class="textTec"><img src="imagesAdidas/tecnologias/predator/a.png">Los taches destacados en verde (A) ayudan al jugador para empujar, despegar el pie y acelerar con máxima eficiencia. </p>
							<p class="textTec"><img src="imagesAdidas/tecnologias/predator/b.png">Los taches marcados en celeste (B) tienen la importante labor de distribuir la presión y ofrecer máxima tracción durante los movimientos laterales.  </p>
							<p class="textTec"><img src="imagesAdidas/tecnologias/predator/c.png">Los taches marcados en rojo (C) estabilizan al jugador durante el contacto con el suelo mientras no restringen su agilidad.</p>
							<p class="textTec"><img src="imagesAdidas/tecnologias/predator/d.png">Los taches destacados en amarillo (D) desacelera al jugador cuando hace el contacto inicial con el suelo.</p>
	                	</div>
    	            	<div class="imgTec">
        	        		<img src="imagesAdidas/tecnologias/predator/img7.png">
            	    	</div>					
					</div>
                    <?php elseif($_GET['tech'] == "8"): ?>
					<a href="evaluacion.php?eval=sprintframe" id="prueba" class="evaluacion" src="imagesAdidas/evaluaciones/contestar_evaluacion.png">
                    <div id="slideTec9">
                        <div class="descriptionTec" >
                			<img src="imagesAdidas/tecnologias/predator/title8.png">
            	    		<p class="desTec">Estabilidad a través de la geometría</p>
        	        		<p class="textTec">Usando el revolucionario material de la suela y los estoperoles geométricos, la suela crea la estabilidad necesaria al formar 3 puentes-dimensionales y una forma de 3-D la cual le quita peso pero mantiene la importante integridad de la parte central del pie. </p>
                			<p class="textTec">
                				<ul>
                					<li>- Material de suela revolucionario</li>
									<li>- 50% más liviano que las suelas estándar</li>
									<li>- Puente 3-d en la zona media para mayor estabilidad</li>
									<li>- Barras 3-d a los lados para un mejor movimiento de torsión</li>
									<li>- Contra fuerte de talón para mayor seguridad y ajuste del talón</li>                		
	                			</ul>            		
	                		</p>                		
	                	</div>
        	        	<div class="imgTec">
    	            		<img src="imagesAdidas/tecnologias/predator/img8.png">
            	    	</div>					
					</div>
                    <?php endif; ?>			
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