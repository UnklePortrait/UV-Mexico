<?php
include_once('functions.php');
$logoutAction = logout();
authorize(0, "index.php?accesscheck=" . $_SERVER['PHP_SELF']);
$user=profile();

?>
<?php include ("includes/header.php") ?>
      <div id="user">
    	              <h2 class="user">Hola <?php echo $user['nombre'] ?> </h2>
		 <a href="perfil.php" ><img src="imagesAdidas/cerrar.png"></a>	

					  
                      </div>

			<div class="linea"></div>
			<div id="content">
				<div class="top"></div> 

                <div id="content-history">
                	<div class="historyPhoto">
                		<img src="imagesAdidas/historia/photoAdidas.png">
                	</div>
					<div class="historyText">
						<img src="imagesAdidas/historia/title.png" class="titleHis">
						
						<p class="historia">La historia comienza en 1920 cuando Adolf Dassler  hace su primer par de zapatos hechos a mano en el pequeño cuarto de lavado de su madre en Herzo-genaurach – Alemania. Al poco tiempo junto con la ayuda de su hermano Rudolf fundó la llamada en ese entonces “Gebrüder Dassler Schuhfabrik” (fábrica de zapatos hermanos Dassler)</p>
						<p class="historia">Quienes por diferencias personales se separan y en 1948 Rudolf fundó lo que hoy en día es Puma y Adolf por su parte en 1949 rebautiza y patenta a su empresa bajo el nombre de adidas. Nombre que procede del nombre de su fundador, “Adi” es el diminutivo y apodo de Adolf, y “das” la primera sílaba de su apellido.</p>
						<p class="historia">Desde ese momento “Adi” movido por su pasión por el deporte y con el afán de poder entregar a los atletas el mejor equipamiento posible comenzó a trabajar bajo 3 principios básicos en la fabricación de todos sus productos:
							<ul class="his">
								<li>- Proteger al deportista de lesiones</li>
								<li>- Fabricar un producto que sea duradero</li>
								<li>- Ayudar al deportista a alcanzar su máximo rendimiento posible.</li>
							</ul>
						</p>
						<p class="historia">
El talento de “Adi” para fabricar zapatos deportivos al poco tiempo comenzó a resaltar del resto revolucionando el mercado de esa época teniendo como su gran característica  el desarrollar y mejorar sus productos trabajando bajo estos  3 principios y haciéndolo siempre en conjunto directo con los deportistas de todas las disciplinas deportivas aprendiendo de sus experiencias, comentarios y probando sus productos.
Característica y principios que se mantienen hasta el día de hoy en la fabricación y desarrollo de todos nuestros productos…</p>
						<p class="historia"><span>adidas es más que una simple marca deportiva…Es historia…<br/>
Valores…Y compromiso para hacer de este mundo un mundo mejor en base al deporte.</span></p>
					</div>


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