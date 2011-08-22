<?php
include_once('functions.php');
authorize(0, "index.php?accesscheck=" . $_SERVER['PHP_SELF']);
$comentarios=postComment();
$logoutAction = logout();
$user=profile();

sendPHP($user);
?>
<?php include ("includes/header.php") ?>
      
      <div id="user">
    	              <h2 class="user">Hola <?php echo $user['nombre'] ?> </h2>
					  <a href="<?php echo $logoutAction ?>" class="logout">cerrar sesion</a>	
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
				<div id="content-foro">
				<div class="titleForo">
				 <?php if ($_GET["subcat"]=="f50"):?>
                			<img src="imagesAdidas/foro/f50.png" class="foroTitle">
                		<?php elseif ($_GET["subcat"]=="predator"):?>
                			<img src="imagesAdidas/foro/predator.png" class="foroTitle">
                		<?php elseif ($_GET["subcat"]=="adipure"):?>
                			<img src="imagesAdidas/foro/adipure.png"class="foroTitle">
                		<?php endif;?>
                		</div>
                	<div id="comments">
                		
                					
	    	            <?php foreach($comentarios as $comentario): ?>
    	    	        <div class="comment">
    	    	        	<div class="commentText">
	                		   	<img src="<?php echo $comentario['image'] ?>" width="75" height="100" class="foroPic"/>
				                <p class="comment_comentario"><?php echo $comentario['comentario'] ?></p>
        			          	  <div class="commentFoot">
        			          	  <img src="imagesAdidas/comment.png" class="commentImg">
	            	    	    	    <p class="comment_nombre"><?php echo $comentario['nombre'] ?></p>
	                	    		<div class="time">
    	                	    		<p class="comment_fecha"><?php echo $comentario['fecha']; ?></p>
        	                			<p class="comment_hora"><?php echo $comentario['hora'] ?></p>
            	        			</div>
	                		    </div>
                		    </div>
	                    <div class="comment_replies">
    	                	<?php $replies = getCommentsFrom($comentario['id_comentario']) ?>
        	                <?php foreach($replies as $reply): ?>
            	        	
            	        	<br/>
            	        	<div class="reply">
            	        		<div class="replyImg">
                	            <img src="<?php echo $reply['image'] ?>" width="37.5" height="50" class="replyPic"/>
                	            </div>
                	            <div class="replyText">
                                	<p class="reply_comentario"><?php echo $reply['comentario'] ?></p>
                                
	                    	        <div class="replyFoot">
    	                	        	<img src="imagesAdidas/comment.png" class="commentImg">
        	                	        <p class="reply_nombre"><?php echo $reply['nombre'] ?></p>
            	                	    <div class="reply_time">
                	                	    <p class="reply_fecha"><?php echo $reply['fecha']; ?></p>
                    	                	<p class="reply_hora"><?php echo $reply['hora'] ?></p>
	                    	            </div>
    	                    		</div>
    	                        </div>
                      		</div>
                        	<?php endforeach; ?>
                       		<?php if($user['tipo_usuario']==1):?>
                            <form name="form_reply"  method="post">
                            <textarea name="reply" class="sendMail" cols="40" rows="2" id="reply" ></textarea>
                            <input type="hidden" name="id_comentario" value="<?php echo $comentario['id_comentario'] ?>" />
                            <input type="submit" value="contestar"/>
							</form>
                            <?php endif;?>

                    	</div>
              		</div>
                	<?php endforeach; ?>
                	</div>
               <div id="dudas">
                	
                    <img src="imagesAdidas/comentario.png" class="titleForo">
					
                    <form name="form1"  method="post">
                    <textarea name="comentario" class="sendForo" cols="40" rows="10" id="mensaje" ></textarea>
                     <input type="image" class="enviarForo" src="imagesAdidas/login/enviar.png" />
					</form>
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