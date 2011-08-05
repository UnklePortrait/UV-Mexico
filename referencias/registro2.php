<?php virtual('/adidas2/Connections/db_adidas.php');
?>
<?php

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
  $insertSQL = sprintf("INSERT INTO usuarios (id_puesto, id_departamento, id_estado_civil, id_sucursal, nombre, apellido_paterno, apellido_materno, email, password, telefono, celular, nombre_jefe) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id_puesto'], "int"),
                       GetSQLValueString($_POST['id_departamento'], "int"),
                       GetSQLValueString($_POST['id_estado_civil'], "int"),
                       GetSQLValueString($_POST['id_sucursal'], "int"),
                       GetSQLValueString($_POST['nombre'], "text"),
                       GetSQLValueString($_POST['apellido_paterno'], "text"),
                       GetSQLValueString($_POST['apellido_materno'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['telefono'], "text"),
                       GetSQLValueString($_POST['celular'], "text"),
                       GetSQLValueString($_POST['nombre_jefe'], "text"));

  mysql_select_db($database_db_adidas, $db_adidas);
  $Result1 = mysql_query($insertSQL, $db_adidas) or die(mysql_error());

  $insertGoTo = "home.php";
  if (isset($_SERVER['QUERY_STRING'])) {
	  
	 //declare two session variables and assign them 	
	
    $_SESSION['MM_Username'] = $_POST['nombre'];
    $_SESSION['MM_UserGroup'] = 3;;
	$_SESSION['MM_UserId'] = 3;
	  
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  //header(sprintf("Location: %s", $insertGoTo));
  echo "<script>location.href='".$insertGoTo."'</script>";
}

mysql_select_db($database_db_adidas, $db_adidas);
$query_departamento = "SELECT * FROM departamento";
$departamento = mysql_query($query_departamento, $db_adidas) or die(mysql_error());
$row_departamento = mysql_fetch_assoc($departamento);
$totalRows_departamento = mysql_num_rows($departamento);

mysql_select_db($database_db_adidas, $db_adidas);
$query_cadena = "SELECT * FROM cadena";
$cadena = mysql_query($query_cadena, $db_adidas) or die(mysql_error());
$row_cadena = mysql_fetch_assoc($cadena);
$totalRows_cadena = mysql_num_rows($cadena);

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
$row_puesto = mysql_fetch_assoc($tipo_vendedor);
$totalRows_tipo_vendedor = mysql_num_rows($tipo_vendedor);

mysql_select_db($database_db_adidas, $db_adidas);
$query_tipo_usuario = "SELECT * FROM tipo_usuario";
$tipo_usuario = mysql_query($query_tipo_usuario, $db_adidas) or die(mysql_error());
$row_tipo_usuario = mysql_fetch_assoc($tipo_usuario);
$totalRows_tipo_usuario = mysql_num_rows($tipo_usuario);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<title>Escuela Virtual Adidas </title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<link rel="stylesheet"href="style.css" type="text/css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.2.min.js"></script>
	<script type="text/javascript">
<!--

function MM_jumpMenu(targ,selObj,restore){ //v3.0
	var dataString = $('#form1').serialize();
	console.log(targ+".location='registro.php?cadena="+selObj.options[selObj.selectedIndex].value+"&"+dataString+"'");
  	eval(targ+".location='registro.php?cadena="+selObj.options[selObj.selectedIndex].value+"&"+dataString+"'");
	//if (restore) selObj.selectedIndex=0;
}
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- Debe de ser un correo valido.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' Debe ser un numero.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) $("#error").text('Por favor ingresa correctamente todos tus datos:\n');
	document.MM_returnValue = (errors == '');
} }
//-->
    </script>
</head>


	<body>
		<div id="container">
			<div id="header">
				<div id="logo">
					<img src="imagesAdidas/logo.png" class="logo"/>
					<img src="imagesAdidas/adidas-reebok.png" class="adidas-reebok"/>
				</div>				
			</div>
			<!--<div id="mainmenu">
				</div>-->
			<div class="clear"></div>
			<div id="content">
				<img src="imagesAdidas/grid.png" class="top">
				<div id="registro">
				<div id="error"></div>
                    <form action="<?php echo $editFormAction; ?>" method="post" id="form1" >
                      
                      <table>
                        <tr valign="baseline">
                          <td align="right">Puesto:</td>
                          <td><select name="id_puesto">
                          <?php
							do {  
							
										if($row_puesto['id_puesto']==$_GET['id_puesto']):?>
										<option selected value="<?php echo $row_puesto['id_puesto']?>"><?php echo $row_puesto['nombre']?></option>
							<?php
										else:?>
										<option value="<?php echo $row_puesto['id_puesto']?>"><?php echo $row_puesto['nombre']?></option>
										<?php
										endif;
							} while ($row_puesto = mysql_fetch_assoc($tipo_vendedor));
							  $rows = mysql_num_rows($tipo_vendedor);
							  if($rows > 0) {
								  mysql_data_seek($tipo_vendedor, 0);
								  $row_puesto = mysql_fetch_assoc($tipo_vendedor);
							  }
							?>

                          </select></td>
                        </tr>
                        <tr> </tr>
                        <tr valign="baseline">
                          <td align="right">Departamento:</td>
                          <td><select name="id_departamento">
                          <?php
							do {  
							if($row_cadena['id_departamento']==$_GET['id_departamento']):?>
										<option selected value="<?php echo $row_departamento['id_departamento']?>"><?php echo $row_departamento['nombre']?></option>
							<?php
										else:?>
							<option value="<?php echo $row_departamento['id_departamento']?>"><?php echo $row_departamento['nombre']?></option>
							
										<option value="<?php echo $row_departamento['id_departamento']?>"><?php echo $row_departamento['nombre']?></option>
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
                        </tr>
                        <tr> </tr>
                        <tr valign="baseline">
                          <td align="right">Estado Civil:</td>
                          <td><select name="id_estado_civil">
                           <?php
								do { 
								if($row_cadena['id_estado_civil']==$_GET['id_estado_civil']):?>
											<option selected value="<?php echo $row_estado_civil['id_estado_civil']?>"><?php echo $row_estado_civil['nombre']?></option>
								<?php
											else:?>
								<option value="<?php echo $row_estado_civil['id_estado_civil']?>"><?php echo $row_estado_civil['nombre']?></option>
								
											<option value="<?php echo $row_estado_civil['id_estado_civil']?>"><?php echo $row_estado_civil['nombre']?></option>
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
                         <td align="right">Cadena:</td>
                        <td><select name="id_cadena" onchange="MM_jumpMenu('parent',this,0)">
           
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
        
                        </tr>
                        
                        <tr> </tr>
                        <tr valign="baseline">
                          <td align="right">Sucursal:</td>
                          <td><select name="id_sucursal">
                            <?php
										if(isset($_GET['cadena'])){
							do {  
							?>
										<option value="<?php echo $row_sucursal['id_sucursal']?>"><?php echo $row_sucursal['nombre']?></option>
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
                        <tr> </tr>
                        <tr valign="baseline">
                      <?php if(isset($_GET['nombre'])):
			$nombre_var=$_GET['nombre'];
			?> 
          <tr>
          <td align="right">Nombre:</td>
          <td><input name="nombre" type="text" id="nombre" value="<?php echo $nombre_var?>" size="32" class="required" minlength="2" /></td></tr>
		 <?php else: ?>
          <tr>
          <td align="right">Nombre:</td>
          <td><input name="nombre" type="text" id="nombre" value="" size="32" class="required" minlength="2" /></td></tr>
        <?php endif;?>
         
          <?php if(isset($_GET['apellido_paterno'])):
			$apellido_paterno_var=$_GET['apellido_paterno'];
			?> 
         <tr> 
         <td align="right">Apellido Paterno:</td>
         <td><input name="apellido_paterno" type="text" id="apellido_paterno" value="<?php echo $apellido_paterno_var?>" size="32" class="required" minlength="2"/></td></tr>
          <?php else: ?>
           <tr>
           <td align="right">Apellido Paterno:</td>
           <td><input name="apellido_paterno" type="text" id="apellido_paterno" value="" size="32" class="required" minlength="2"/></td></tr>
           <?php endif;?>

               
          <?php if(isset($_GET['apellido_materno'])):
			$apellido_materno_var=$_GET['apellido_materno'];
			?> 
         <tr>
         <td align="right">Apellido Materno:</td>
         <td><input name="apellido_materno" type="text" class="required" id="apellido_materno" value="<?php echo $apellido_materno_var?>" size="32" minlength="2"/></td></tr>
          <?php else: ?>
          <tr><td align="right">Apellido Materno:</td>
          <td><input name="apellido_materno" type="text" class="required" id="apellido_materno" value="" size="32" minlength="2"/></td></tr>
       <?php endif;?>
                        </tr>
                        <tr valign="baseline">
                          <td align="right">Fecha_nacimiento:</td>
                          <td><input name="fecha_nacimiento" type="text" id="fecha_nacimiento" value="" size="32" /></td>
                        </tr>
                        <tr valign="baseline">
                          <td align="right">Email:</td>
                          <?php if(isset($_GET['email'])):
			$email_var=$_GET['email'];
			?>
        
                    <td><input name="email" type="text" id="email" value="<?php echo $email_var?>" size="32" class="required email" /></td>
        </tr>
        <tr valign="baseline">
          
          <?php else:?>
          <td><input name="email" type="text" id="email" value="" size="32"class="required email" /></td>
        </tr>
        <tr valign="baseline">
        <?php endif;?>
 
                        </tr>
                        <tr valign="baseline">
                          <td align="right">Password:</td>
                          <?php if(isset($_GET['password'])):
							$password_var=$_GET['password'];
								?>
                    <td><input name="password" type="text" id="password" value="<?php echo $password_var?>" size="32"class="required" minlength="2"/></td>
                    <?php else:?>
            <td><input name="password" type="text" id="password" value="" size="32"/></td>
                    <?php endif;?>
        
                        </tr>
                        <tr valign="baseline">
                          <td align="right">Telefono:</td>
                         <?php if(isset($_GET['telefono'])):
			$telefono_var=$_GET['telefono'];
			?>
          <td><input name="telefono" type="text" id="telefono" value="<?php echo $telefono_var?>" size="32"class="required" minlength="2" /></td>
          <?php else:?>
                  <td><input name="telefono" type="text" id="telefono" value="" size="32" /></td>
     <?php endif;?>
                        </tr>
                        <tr valign="baseline">
                          <td align="right">Celular:</td>
                           <?php if(isset($_GET['celular'])):
			$celular_var=$_GET['celular'];
			?>
          
          <td><input name="celular" type="text" id="celular" value="<?php echo $celular_var?>" size="32"class="required" minlength="2"/></td>
        </tr>
        <tr valign="baseline">
        <?php else:?>
        <td><input name="celular" type="text" id="celular" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
           <?php endif;?>
                        </tr>
                        <tr valign="baseline">
                          <td align="right">Nombre jefe:</td>
                        <?php if(isset($_GET['nombre_jefe'])):
			$nombre_jefe_var=$_GET['nombre_jefe'];
			?>
          <td><input name="nombre_jefe" type="text" id="nombre_jefe" value="<?php echo $nombre_jefe_var?>" size="32" class="required" minlength="2"/></td>
          <?php else:?>
         <td><input name="nombre_jefe" type="text" id="nombre_jefe" value="" size="32"class="required" minlength="2"/></td>
          <?php endif;?>
                        </tr>
                        <tr valign="baseline">
                          <td align="right">&nbsp;</td>
                        
                          <td><input type="submit"  value="Enviar" onclick="MM_validateForm('nombre','','R','nombre','','R','apellido_paterno','','R','apellido_paterno','','R','apellido_materno','','R','apellido_materno','','R','fecha_nacimiento','','R','email','','RisEmail','email','','RisEmail','password','','R','password','','R','telefono','','RisNum','telefono','','RisNum','celular','','RisNum','celular','','RisNum','nombre_jefe','','R','nombre_jefe','','R');return document.MM_returnValue" /></td>
                        
						
						  
                        </tr>
                      </table>
                      <input type="hidden" name="MM_insert" value="form1" />
                  </form>
                    <p>&nbsp;</p>
                </div>
				<img src="imagesAdidas/grid.png" class="bottom">		
			</div>
			<div class="clear"></div>
			<div id="footer">
				<p>Estas imágenes e información contenidos en esta página privilegiada y confidencial destinado únicamente para el uso exclusivo de adidas. Se le notifica que cualquier divulgación, copia o uso de información dentro de ella está estrictamente prohibido. © 2010 adidas Group. adidas, el logo y las 3-tiras son marcas registradas de adidas Group. <a href="#">Términos y Condiciones</a></p>
			</div>
		</div>
	</body>

</html><?php
mysql_free_result($cadena);

mysql_free_result($departamento);

mysql_free_result($dia_descanso);

mysql_free_result($estado_civil);

mysql_free_result($sucursal);

mysql_free_result($puesto);
?>

>	
