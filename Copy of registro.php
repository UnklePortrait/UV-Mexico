<?php
session_start();

require_once('Connections/db_adidas.php');
//virtual('/adidas2/Connections/db_adidas.php');
if(isset($_GET['cadena'])){
	$cadena_var = $_GET['cadena'];
}

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO usuarios (id_puesto, id_departamento, id_estado_civil, id_sucursal, nombre, apellido_paterno, apellido_materno, fecha_nacimiento, email, password, telefono, celular, nombre_jefe, id_dia_descanso) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id_puesto'], "int"),
                       GetSQLValueString($_POST['id_departamento'], "int"),
                       GetSQLValueString($_POST['id_estado_civil'], "int"),
                       GetSQLValueString($_POST['id_sucursal'], "int"),
                       GetSQLValueString($_POST['nombre'], "text"),
                       GetSQLValueString($_POST['apellido_paterno'], "text"),
                       GetSQLValueString($_POST['apellido_materno'], "text"),
                       GetSQLValueString($_POST['fecha_nacimiento'], "date"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['telefono'], "text"),
                       GetSQLValueString($_POST['celular'], "text"),
                       GetSQLValueString($_POST['nombre_jefe'], "text"),
                       GetSQLValueString($_POST['id_dia_descanso'], "int"));

  mysql_select_db($database_db_adidas, $db_adidas);
  $Result1 = mysql_query($insertSQL, $db_adidas) or die(mysql_error());
  $insertGoTo = "registrado.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $_SESSION['MM_Username'] = $_POST['nombre'];
    $_SESSION['MM_UserGroup'] = 3;
	$_SESSION['MM_UserId'] = 3;
	$insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
   echo "<script>location.href='".$insertGoTo."'</script>";
}

mysql_select_db($database_db_adidas, $db_adidas);
$query_cadena = "SELECT * FROM cadena";
$cadena = mysql_query($query_cadena, $db_adidas) or die(mysql_error());
$row_cadena = mysql_fetch_assoc($cadena);
$totalRows_cadena = mysql_num_rows($cadena);

mysql_select_db($database_db_adidas, $db_adidas);
$query_departamento = "SELECT * FROM departamento";
$departamento = mysql_query($query_departamento, $db_adidas) or die(mysql_error());
$row_departamento = mysql_fetch_assoc($departamento);
$totalRows_departamento = mysql_num_rows($departamento);

mysql_select_db($database_db_adidas, $db_adidas);
$query_dia_descanso = "SELECT * FROM dia_descanso";
$dia_descanso = mysql_query($query_dia_descanso, $db_adidas) or die(mysql_error());
$row_dia_descanso = mysql_fetch_assoc($dia_descanso);
$totalRows_dia_descanso = mysql_num_rows($dia_descanso);

mysql_select_db($database_db_adidas, $db_adidas);
$query_estado_civil = "SELECT * FROM estado_civil";
$estado_civil = mysql_query($query_estado_civil, $db_adidas) or die(mysql_error());
$row_estado_civil = mysql_fetch_assoc($estado_civil);
$totalRows_estado_civil = mysql_num_rows($estado_civil);
if(!empty($cadena_var)){
mysql_select_db($database_db_adidas, $db_adidas);
$query_sucursal = "SELECT id_sucursal, nombre FROM sucursal where id_cadena=$cadena_var";
$sucursal = mysql_query($query_sucursal, $db_adidas) or die(mysql_error());
$row_sucursal = mysql_fetch_assoc($sucursal);
$totalRows_sucursal = mysql_num_rows($sucursal);
}
mysql_select_db($database_db_adidas, $db_adidas);
$query_tipo_vendedor = "SELECT * FROM tipo_vendedor";
$tipo_vendedor = mysql_query($query_tipo_vendedor, $db_adidas) or die(mysql_error());
$row_tipo_vendedor = mysql_fetch_assoc($tipo_vendedor);
$totalRows_tipo_vendedor = mysql_num_rows($tipo_vendedor);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<title>:: Universidad Virtual::</title>
		<link rel="stylesheet" href="style.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
 <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.2.min.js"></script>
 <script type="text/javascript" src="js/actions.js"></script>
<script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
	var dataString = $('#form1').serialize();
	//console.log(targ+".location='registro.php?cadena="+selObj.options[selObj.selectedIndex].value+"&"+dataString+"'");
  	eval(targ+".location='registro.php?cadena="+selObj.options[selObj.selectedIndex].value+"&"+dataString+"'");
	//if (restore) selObj.selectedIndex=0;
}
function MM_validateForm() { //v4.0
	//console.log("validate");
	if (document.getElementById){
    	var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    	for (i=0; i<(args.length-2); i+=3) { 
    		test=args[i+2]; val=document.getElementById(args[i]);
      		if (val) { 
      			nm=val.name; 
      			if ((val=val.value)!="") {
      				if (test.indexOf('isEmail')!=-1) { 
      					p=val.indexOf('@');
        				if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
   					} else if (test!='R') { 
        				num = parseFloat(val);
          				if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          				if (test.indexOf('inRange') != -1) { 
          					p=test.indexOf(':');
            				min=test.substring(8,p); max=test.substring(p+1);
            				if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      					} 
      				} 
      			} 
				else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; 
			}
		} 
		if($("#estado_civil").val() == ""){
    		errors+= " - You must select estado civil\n";
		}
		if($("#cadena").val() == ""){
    		errors+= " - You must select cadena\n";
		}
		if($("#sucursal").val() == ""){
    		errors+= " - You must select sucursal\n";
		}
		if($("#departamento").val() == ""){
    		errors+= " - You must select departamento\n";
		}
		if($("#puesto").val() == ""){
    		errors+= " - You must select puesto\n";
		}
		if($("#dia_descanso").val() == ""){
    		errors+= " - You must select dia descanso\n";
		}
		if (errors){ 
			$("#error").html("<img src='imagesAdidas/error.png'/>");
   			$('#error img').click(function(){
				hideError();
			});
   		}else if(!errors){
   			if($("#terminos").is(":checked")){
								<?php
				
				$asunto="Registro exitoso"
				$consultas="consultas@uv-mexico.com.mx";
				$header = 'From: ' . $consultas . " \r\n";
				$header .= "Mime-Version: 1.0 \r\n";
				$header .= "Content-Type: text/html";
				$message='<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<title>:: Universidad Virtual ::</title>
		<!--<link rel="stylesheet" href="style.css" type="text/css">-->
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<style type="text/css">
			{
	margin: 0 ;
	padding: 0;
	font-family: Tahoma;
}

body {
	background-color: white;
	width: 800px;
	height: 500px;
	
}

img {
	border: 0;
	outline: none;
}
.titleRegistros {
    left: -430px;
    position: relative;
}


#container {
	width:800px;
	height: auto;
	margin: 0 auto;
	background-color: #fff;
}
#containerGray {
	width: 800px;
	height: auto;
	margin: 0 auto;
	background-image: url(imagesAdidas/gray/bgFail.png);
	background-size: 100% 100%;
}
#header {
	width: 800px;
	height: 100px;
	background-color: white;
}
.logo {
	float: left;
	margin-top: 10px;
	margin-left: 25px;
	
}
.adidas-reebok {
    float: right;
    position: relative;
    right: 25px;
    top: 55px;
}
.adidasgroup {
float: right;
    position: relative;
    right: 25px;
    top: 25px;
}
.linea {
    /*background-image: url("imagesAdidas/linea.png");
    background-position: 100% 0;
    background-repeat:no-repeat;*/
   
   border-bottom: solid thin #6e6e6e;
    width: 800px;
}
		
#content {
	
	/*border-top: thin solid black;*/

	width: 100%;
	margin-bottom: 50px;
}
.clear {
	clear: both;
}
.bottom {
    background-image: url("imagesAdidas/bottomGrid.png");
    bottom: 0;
    position: absolute;
    height: 168px;
    width: 800px;
    z-index: 1;
}
.top {
	position: relative;
	top:0px;
	z-index: 1;
	background-image: url(imagesAdidas/topGrid.png);
	background-repeat: repeat-x;
	width: 100%;
	height: 171px;
}
#footer {
	width: 800px;
	height: 50px;
	
	background-color: #fff;
	z-index: 100;
	color: #6e6e6e;
}
#footer p {
    color: #6E6E6E;
    font-size: 10px;
    margin: 0 auto;
    text-align: center;
    width: 700px;
	padding-top: 10px;
}
#footer a:visited {
	text-decoration: none;
	color:  #6e6e6e;
}
#footer a:link{
	text-decoration: none;
	color:   #6e6e6e;
}
#footer a:hover {

	text-decoration: underline;
	color:   #6e6e6e;
}
#content-bienvenido {
	width: 800px;
	height: 350px;
	margin: 0 auto;
	text-align: center;
}
.titleGray {
    margin-bottom: 40px;
    text-align: right;
}
.usuarioMail {
	color: #fff;
	font-size: 14px;
	margin-top: 30px;
}

		</style>
		
	</head>
	<body>
		<div id="containerGray">
			<div id="header">
				<div id="logo">
					<img src="imagesAdidas/logo.png" class="logo"/>
					<img src="imagesAdidas/adidasgroup.png" class="adidasgroup"/>
				</div>				
			</div>
			<!--<div id="mainmenu">
				</div>-->
			<div class="clear"></div>
			<div id="content">
				<div class="top"></div>
				<div id="content-bienvenido">
					<img src="imagesAdidas/bienvenido.png" class="titleGray">
					<p class="usuarioMail">Éste es tu usuario: <label>$email_var </label></p>
					<p class="usuarioMail">Ésta es tu contraseña:<label>$password_var</label></p>
                  
				</div>
				 
				</div>
						
			
			<div class="clear"></div>
			<div class="bottom"></div>
			<div id="footer">
				<p>Estas imágenes e información contenidos en esta página privilegiada y confidencial destinado únicamente para el uso exclusivo de adidas. Se le notifica que cualquier divulgación, copia o uso de información dentro de ella está estrictamente prohibido. © 2010 adidas Group. adidas, el logo y las 3-tiras son marcas registradas de adidas Group. <a href="#">Términos y Condiciones</a></p>
			</div>
			</div>	
		</div>
	</body>

</html>'
				mail($email_var, $asunto, utf8_decode($message), $header);

				
				?>
				$("#form1").submit();

			}else{ 
				alert ("Acepta los terminos y condiciones por favor")
			}
			document.MM_returnValue = (errors == '');
		}
	}
}

function hideError(){
	$('#error').html("");
}


function TyC() {
		window.open( "tyc.html", "myWindow", 
		" fullscreen=0, toolbar=0, location=0, status=0, menubar=0, scrollbars=0, resizable=0, width=900, height=900",1)
		}
//-->
</script>
	</head>
<body>
<div id="container">
			<div id="header">
				<div id="logo">
					<a href="index.php"><img src="imagesAdidas/logo.png" class="logo"/></a>
					<img src="imagesAdidas/adidasgroup.png" class="adidasgroup"/>
				</div>				
			</div>
			<!--<div id="mainmenu">
				</div>-->
			<div class="clear"></div>
			<div class="linea"></div>
			<div id="content">
				<div class="top"></div>
				<div id="registro">
                <div id="error"></div>
                
                <img src="imagesAdidas/login/registro.png" class="titleRegistros"/>
                
<form action="<?php echo $editFormAction; ?>"  id="form1" name="form1" method="post">
                           
                           
                                        
                      <table id="reg">
                     
                     	<tbody class="body">
                      
                       <tr valign="baseline" class="long">
                      <?php if(isset($_GET['nombre'])):
			$nombre_var=$_GET['nombre'];
			?> 
          <tr class="long">
          <td align="right">Nombre Completo:</td>
          <td><input name="nombre" type="text" id="nombre" value="<?php echo $nombre_var?>" size="32" class="required" minlength="2" /></td></tr>
		 <?php else: ?>
          <tr class="long">
          <td align="right">Nombre Completo:</td>
          <td><input name="nombre" type="text" id="nombre" value="" size="32" class="required" minlength="2" /></td></tr>
        <?php endif;?>
        
        
        <tr valign="baseline "class="short">
        <?php if(isset($_GET['fecha_nacimiento'])):
			$fecha_nacimiento_var=$_GET['fecha_nacimiento'];
			?>
                          <td align="right">Fecha de nacimiento:</td>
                          <td><input name="fecha_nacimiento" value="<?php echo $fecha_nacimiento_var?>" type="text" id="fecha_nacimiento" value="" size="32" class="required" /></td>
                          <?php else: ?>
                          <td align="right">Fecha de nacimiento:</td>
                          <td><input name="fecha_nacimiento" value="AAAA-MM-DD" type="text" id="fecha_nacimiento" value="" size="32" onclick="if(this.value == 'AAAA-MM-DD')this.value=''" onblur="if(this.value == '')this.value='AAAA-MM-DD' " class="required"/></td>
                      <?php endif;?>
                          <td align="right" class="dos">Estado Civil:</td>
                          <td><select name="id_estado_civil" id="estado_civil" class="tres required">
                           <option value="" class="tres">--.--</option>
						   <?php
								do { 
								if($row_estado_civil['id_estado_civil']==$_GET['id_estado_civil']):?>
											<option selected value="<?php echo $row_estado_civil['id_estado_civil']?>"><?php echo $row_estado_civil['nombre']?></option>
								<?php
											else:?>
								
                                <option class="tres" value="<?php echo $row_estado_civil['id_estado_civil']?>"><?php echo $row_estado_civil['nombre']?></option>
								
											
											<?php
								endif;
								} while ($row_estado_civil = mysql_fetch_assoc($estado_civil));
								  $rows = mysql_num_rows($estado_civil);
								  if($rows > 0) {
									  mysql_data_seek($estado_civil, 0);
									  $row_estado_civil = mysql_fetch_assoc($estado_civil);
								  }
								?>
                          </select></td>
                          </tr>
                        
                        <tr class="short">
                         <td align="right">Cadena:</td>
                        <td><select name="id_cadena" id="cadena" onchange="MM_jumpMenu('parent',this,0)" class="required">
                        <option value="">--.--</option>
           
            				<?php
								do {  
								
										   if($row_cadena['id_cadena']==$_GET['cadena']):?>
											<option selected value="<?php echo $row_cadena['id_cadena']?>"><?php echo $row_cadena['nombre']?></option>
								<?php
											else:?>
								
                                <option value="<?php echo $row_cadena['id_cadena']?>"><?php echo $row_cadena['nombre']?></option>
								<?php
								endif;
								} while ($row_cadena = mysql_fetch_assoc($cadena));
								  $rows = mysql_num_rows($cadena);
								  if($rows > 0) {
									  mysql_data_seek($cadena, 0);
									  $row_cadena = mysql_fetch_assoc($cadena);
								  }
								?>
          						</select></td>
        
                       
                          <td align="left" class="dos">Sucursal:</td>
                          <td><select name="id_sucursal" id="sucursal" class="tres required">
                          <option value="">--.--</option>
                            <?php
                            if(isset($_GET['cadena'])){
							do {  
							?>
							<option class="tres" value="<?php echo $row_sucursal['id_sucursal']?>"><?php echo $row_sucursal['nombre']?></option>
										<?php
							} while ($row_sucursal = mysql_fetch_assoc($sucursal));
							  $rows = mysql_num_rows($sucursal);
							 	if($rows > 0) {
									mysql_data_seek($sucursal, 0);
								  	$row_sucursal = mysql_fetch_assoc($sucursal);
							  	}
							}
							?>
                          </select></td>
                        </tr>


                        <tr valign="baseline" class="short">
                        
                        <td align="right">Departamento:</td>
                          <td><select name="id_departamento" id="departamento" class="required">
                          <option value="">--.--</option>
						  <?php
							do {  
							if($row_departamento['id_departamento']==$_GET['id_departamento']):?>
										<option selected value="<?php echo $row_departamento['id_departamento']?>"><?php echo $row_departamento['nombre']?></option>
							<?php
										else:?>
							
                            <option  value="<?php echo $row_departamento['id_departamento']?>"><?php echo $row_departamento['nombre']?></option>
							
										
										<?php
										endif;
							} while ($row_departamento = mysql_fetch_assoc($departamento));
							  $rows = mysql_num_rows($departamento);
							  if($rows > 0) {
								  mysql_data_seek($departamento, 0);
								  $row_departamento = mysql_fetch_assoc($departamento);
							  }
							?>
                          </select></td>
                          <td align="left" class="dos">Puesto:</td>
                          <td><select name="id_puesto" id="puesto" class="tres required">
                          <option value="">--.--</option>
						  <?php
							do {  
							
										if($row_tipo_vendedor['id_puesto']==$_GET['id_puesto']):?>
										<option class="tres" selected value="<?php echo $row_tipo_vendedor['id_puesto']?>"><?php echo $row_tipo_vendedor['nombre']?></option>
							<?php
										else:?>
										
                                        <option  class="tres" value="<?php echo $row_tipo_vendedor['id_puesto']?>"><?php echo $row_tipo_vendedor['nombre']?></option>
										<?php
										endif;
							} while ($row_tipo_vendedor = mysql_fetch_assoc($tipo_vendedor));
							  $rows = mysql_num_rows($tipo_vendedor);
							  if($rows > 0) {
								  mysql_data_seek($tipo_vendedor, 0);
								  $row_tipo_vendedor = mysql_fetch_assoc($tipo_vendedor);
							  }
							?>

                          </select></td>
                       
                          
                        </tr>
                    
                    
                    <tr valign="baseline" class="short">
                      <td align="right">Dia descanso:</td>
                      <td><select name="id_dia_descanso" id="dia_descanso" class="required">
                        <option value="">--.--</option>
						<?php 
						do {  
							if($row_dia_descanso['id_dia_descanso']==$_GET['id_dia_descanso']):?>
										<option selected value="<?php echo $row_dia_descanso['id_dia_descanso']?>"><?php echo $row_dia_descanso['nombre']?></option>
										<?php
										else:?>
										
                                        <option value="<?php echo $row_dia_descanso['id_dia_descanso']?>"><?php echo $row_dia_descanso['nombre']?></option>
										<?php
										endif;?>
               
                        <?php
					} while ($row_dia_descanso = mysql_fetch_assoc($dia_descanso));
						?>
                      </select></td>
                    </tr>

						<tr valign="baseline" class="long">
                          <td align="right">Nombre jefe:</td>
                        <?php if(isset($_GET['nombre_jefe'])):
			$nombre_jefe_var=$_GET['nombre_jefe'];
			?>
          <td><input name="nombre_jefe" type="text" id="nombre_jefe" value="<?php echo $nombre_jefe_var?>" size="32" class="required" minlength="2"/></td>
          <?php else:?>
         <td><input name="nombre_jefe" type="text" id="nombre_jefe" value="" size="32" class="required" minlength="2"/></td>
          <?php endif;?>
                        </tr>
                       
         
          
                                                <tr valign="baseline" class="short">
                          <td align="right">Email:</td>
                          <?php if(isset($_GET['email'])):
			$email_var=$_GET['email'];
			?>
        
                    <td><input name="email" type="text" id="email" value="<?php echo $email_var?>" size="32" class="required email" /></td>
       
          
          <?php else:?>
          <td><input name="email" type="text" id="email" value="" size="32"class="required email" /></td>
        
     
        <?php endif;?>
 
                       
                          <td align="left" class="dos" >Password:</td>
                          <?php if(isset($_GET['password'])):
							$password_var=$_GET['password'];
								?>
					<td><input class="tres required" name="password" type="password" id="password" value="<?php echo $password_var?>" size="32"/></td>
                    <?php else:?>
            <td><input class="tres required" name="password" type="password" id="password" value="" size="32"/></td>
                    <?php endif;?>
        
                        </tr>
                        <tr valign="baseline" class="short">
                          <td align="right">Telefono:</td>
                         <?php if(isset($_GET['telefono'])):
			$telefono_var=$_GET['telefono'];
			?>
          <td><input name="telefono" type="text" id="telefono" value="<?php echo $telefono_var?>" size="32"class="required" minlength="2" /></td>
          <?php else:?>
                  <td><input name="telefono" type="text" id="telefono" value="" size="32" class="required" /></td>
     <?php endif;?>
                       
                          <td align="left" class="dos">Celular:</td>
                           <?php if(isset($_GET['celular'])):
			$celular_var=$_GET['celular'];
			?>
          
          <td><input class="tres" name="celular" type="text" id="celular" value="<?php echo $celular_var?>" size="32"class="required" minlength="2"/></td>
        </tr>
        <tr valign="baseline">
        <?php else:?>
        <td><input class="tres" name="celular" type="text" id="celular" value="" size="32" class="required" /></td>
        </tr>
        <tr valign="baseline">
           <?php endif;?>
                        </tr>
                        
                        <tr valign="baseline">
                          <td align="right">&nbsp;</td>
                        
                         
                        
						
                 
                                        <tr> </tr>
                    </tbody>
                  </table>
                  <tr valign="baseline">
                      <td align="right">&nbsp;</td>
                    
                       <td><input type="image" id="botonEnvio" src="imagesAdidas/login/sol.png" class="enviarRegistro" /></td>
                       
                      
                    </tr>
                     
                  <input type="hidden" name="MM_insert" value="form1" />
                  <div class="aTyC">
                       <p class="acepto">Acepto  <a href="#" onclick="TyC()">Términos y Condiciones</a></p>
                       <input name="terminos" id="terminos" type="checkbox" value="" />
                       </div>
                </form>
                <p>&nbsp;</p>
<p>&nbsp;</p>
</div>
				
			</div>
			
			<div class="clear"></div>
            <div class="bottom"></div>
            
			<div id="footer">
			<div class="linea"></div>
				<p>Estas imágenes e información contenidos en esta página privilegiada y confidencial destinado únicamente para el uso exclusivo de adidas. Se le notifica que cualquier divulgación, copia o uso de información dentro de ella está estrictamente prohibido. © 2010 adidas Group. adidas, el logo y las 3-tiras son marcas registradas de adidas Group. <a href="#" onclick="TyC()">Términos y Condiciones</a></p>
			</div>
	</div>
	<script>
	$("#botonEnvio").click(function(e){
	e.preventDefault();
	MM_validateForm('nombre','','R','nombre','','R','apellido_paterno','','R','apellido_paterno','','R','apellido_materno','','R','apellido_materno','','R','email','','RisEmail','email','','RisEmail','password','','R','password','','R','telefono','','RisNum','telefono','','RisNum','celular','','RisNum','celular','','RisNum','nombre_jefe','','R','nombre_jefe','','R');return document.MM_returnValue;
});
	</script>
</body>

</html>
<?php
mysql_free_result($cadena);

mysql_free_result($departamento);

mysql_free_result($dia_descanso);

mysql_free_result($estado_civil);

//mysql_free_result($sucursal);

mysql_free_result($tipo_vendedor);
?>
