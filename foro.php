<?php
include_once('functions.php');
authorize(0, "index.php?accesscheck=" . $_SERVER['PHP_SELF']);
$comentario=postComment();
$logoutAction = logout();
$user=profile();
?>
<?php include ("includes/header.php") ?>
      
      <div id="user">
    	              <h2 class="user">Hola <?php echo $user['nombre'] ?> </h2>
					  <a href="<?php echo $logoutAction ?>" class="logout">Log out</a>	
					  </div>
			<div id="menu">
			<ul>
				<li><a href="#" id="menuPerfil" class="menu"  onclick="MM_goToURL('parent','perfilO.php');return document.MM_returnValue"></a></li>
				<li><a href="#" id="menuForoDudas" class="menu"></a></li>
                <li><a href="#" id="menuVentas" class="menu"></a></li>
				<li><a href="#" id="menuCatalogo" class="menu"></a></li>
			</ul>
				</div>
			<div class="linea"></div>
			<div id="content">
				<div class="top"></div>
				<div id="content-home">
                <div id="comments">
                <?php 
				foreach($comentario in $comentarios):
				?>
                <div class="comment">
                <img src="<?php $comentario['image']?>"/>
                <p class="comment_comentario">
                <?php
                echo $comentario['comentario'];
				?>
                </p>
                <div class="commentFoot">
                <p class="comment_nombre">
                <?php
				echo $comentario['nombre'];
				?>
                </p>
                <div class="time">
                <p class="comment_fecha">
				<?php
                echo $comentario['fecha'];
				?>
				</p>
                <p class="comment_hora">
                <?php
                echo $comentario['hora'];
				?>
                </p>
				</div>
                </div>
                
                </div>
                </div>
                <p class="olvide-text">Ingresa tu duda y/o problematica</p>
					<form name="form1" action="sendForo.php" method="post">
                    <textarea name="comentario" class="sendMail" cols="40" rows="10" id="mensaje" ></textarea>
                     <input type="image" class="enviar" src="imagesAdidas/login/enviar.png" />
					</form>

					
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