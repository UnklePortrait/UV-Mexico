<?php 
//initialize the session
session_start();

require_once('Connections/db_adidas.php'); ?>
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
  header(sprintf("Location: %s", $insertGoTo));
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
$query_estado = "SELECT * FROM estado";
$estado = mysql_query($query_estado, $db_adidas) or die(mysql_error());
$row_estado = mysql_fetch_assoc($estado);
$totalRows_estado = mysql_num_rows($estado);

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

mysql_select_db($database_db_adidas, $db_adidas);
$query_tipo_usuario = "SELECT * FROM tipo_usuario";
$tipo_usuario = mysql_query($query_tipo_usuario, $db_adidas) or die(mysql_error());
$row_tipo_usuario = mysql_fetch_assoc($tipo_usuario);
$totalRows_tipo_usuario = mysql_num_rows($tipo_usuario);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<title>Escuela Vitual Adidas </title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<link rel="stylesheet"href="style.css" type="text/css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.2.min.js"></script>
	<script type="text/javascript">
<!--
function MM_validateForm() { //v4.0
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
	if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
  }
}
        
function MM_jumpMenu(targ,selObj,restore){ //v3.0
	var dataString = $('#form1').serialize();
	console.log(targ+".location='registro.php?cadena="+selObj.options[selObj.selectedIndex].value+"&"+dataString+"'");
  	eval(targ+".location='registro.php?cadena="+selObj.options[selObj.selectedIndex].value+"&"+dataString+"'");
	//if (restore) selObj.selectedIndex=0;
}
//-->
</script>
</head>








	<body>
 
<div id="container">
			<div id="header">
				<div id="logo">
					<img src="images/logo.png" alt="Adidas/home"/>
				</div>
			<div id="div">
				
			  </div>	

	</div>
			
			<div id="content">
			<div id="Registro">
			  <h1>Registro</h1>
              <form action="<?php echo $editFormAction; ?>" method="post" id="form1">
      <table>
        
        <tr valign="baseline">
         
          <td><select name="id_puesto">
           <option value="">Tipo Vendedor</option>
			<?php
do {  

            if($row_tipo_vendedor['id_puesto']==$_GET['id_puesto']):?>
            <option selected value="<?php echo $row_tipo_vendedor['id_puesto']?>"><?php echo $row_tipo_vendedor['nombre']?></option>
<?php
			else:?>
            <option value="<?php echo $row_tipo_vendedor['id_puesto']?>"><?php echo $row_tipo_vendedor['nombre']?></option>
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
        
          
          <td><select name="id_sucursal">
            <option value="Sucursal" selected >Sucursal</option>
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
        
        
        <tr valign="baseline">
          
          <?php if(isset($_GET['nombre'])):
			$nombre_var=$_GET['nombre'];
			?> 
            <td><input name="nombre" type="text" id="nombre" value="<?php echo $nombre_var?>" size="32" onclick="if(this.value == 'Nombre')this.value=''" onblur="if(this.value == '')this.value='Nombre'" /></td>
		 <?php else: ?>
          <td><input name="nombre" type="text" id="nombre" value="Nombre" size="32" onclick="if(this.value == 'Nombre')this.value=''" onblur="if(this.value == '')this.value='Nombre'" /></td>
        <?php endif;?>
         
          <?php if(isset($_GET['apellido_paterno'])):
			$apellido_paterno_var=$_GET['apellido_paterno'];
			?> 
          <td><input name="apellido_paterno" type="text" id="apellido_paterno" value="<?php echo $apellido_paterno_var?>" size="32" onclick="if(this.value == 'Apellido paterno')this.value=''" onblur="if(this.value == '')this.value='Apellido paterno'"/></td>
          <?php else: ?>
           <td><input name="apellido_paterno" type="text" id="apellido_paterno" value="Apellido Paterno" size="32" onclick="if(this.value == 'Apellido paterno')this.value=''" onblur="if(this.value == '')this.value='Apellido paterno'"/></td>
           <?php endif;?>

               
          <?php if(isset($_GET['apellido_materno'])):
			$apellido_materno_var=$_GET['apellido_materno'];
			?> 
          <td><input type="text" name="apellido_materno" value="<?php echo $apellido_materno_var?>" size="32" onclick="if(this.value == 'Apellido materno')this.value=''" onblur="if(this.value == '')this.value='Apellido materno'"/></td>
          <?php else: ?>
          <td><input type="text" name="apellido_materno" value="Apellido Materno" size="32" onclick="if(this.value == 'Apellido materno')this.value=''" onblur="if(this.value == '')this.value='Apellido materno'"/></td>
       <?php endif;?>
        <tr valign="baseline">
          <tr valign="baseline">
      
  
   <tr valign="baseline">
     <td>
    <select name="Dia" class="fecha">
      <option value="D&iacute;a" selected >D&iacute;a</option>
     <?php for($i=1; $i<=31;$i++){?>
      <option value="<?php echo $i?>" ><?php echo $i?></option>
    <?php
	 }
	 ?>
    </select>
    
  <select name="Mes" class="fecha">
  <option value="0">Mes</option>
    <option value="1">Enero</option>
    <option value="2">Febrero</option>
    <option value="3">Marzo</option>
    <option value="4">Abril</option>
    <option value="5">Mayo</option>
    <option value="6">Junio</option>
    <option value="7">Julio</option>
    <option value="8">Agosto</option>
    <option value="9">Septiembre</option>
    <option value="10">Octubre</option>
    <option value="11">Noviembre</option>
    <option value="12">Diciembre</option>
  </select>
    <select name="Ano" class="fecha">
      <option value="A&ntilde;o" selected >A&ntilde;o</option>
     <?php for($i=1930; $i<=1995;$i++){?>
      <option value="<?php echo $i?>" ><?php echo $i?></option>
    <?php
	 
	 }
	 ?>
    </select>
   
            <td><select name="id_estado_civil">
            <option value="">Estado Civil</option>
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
        <?php if(isset($_GET['email'])):
			$email_var=$_GET['email'];
			?>
        
                    <td><input name="email" type="text" id="email" value="<?php echo $email_var?>" size="32" onclick="MM_validateForm('nombre','','R','apellido_paterno','','R','email','','RisEmail','password','','R','telefono','','NisNum','celular','','NisNum','nombre_jefe','','R');return document.MM_returnValue" /></td>
        </tr>
        <tr valign="baseline">
          
          <?php else:?>
          <td><input name="email" type="text" id="email" value="E-mail" size="32" onclick="MM_validateForm('nombre','','R','apellido_paterno','','R','email','','RisEmail','password','','R','telefono','','NisNum','celular','','NisNum','nombre_jefe','','R');return document.MM_returnValue" /></td>
        </tr>
        <tr valign="baseline">
        <?php endif;?>
         <?php if(isset($_GET['password'])):
			$password_var=$_GET['password'];
			?>
                    <td><input name="password" type="text" id="password" value="<?php echo $password_var?>" size="32"onclick="if(this.value == 'Password')this.value=''" onblur="if(this.value == '')this.value='Password'" /></td>
                    <?php else:?>
            <td><input name="password" type="text" id="password" value="Password" size="32"onclick="if(this.value == 'Password')this.value=''" onblur="if(this.value == '')this.value='Password'" /></td>
                    <?php endif;?>
        
         
          
          <?php if(isset($_GET['telefono'])):
			$telefono_var=$_GET['telefono'];
			?>
          <td><input name="telefono" type="text" id="telefono" value="<?php echo $telefono_var?>" size="32" onclick="if(this.value == 'Telefono')this.value='';if(this.value == '')this.value='Telefono'"/></td>
          <?php else:?>
                  <td><input name="telefono" type="text" id="telefono" value="Telefono" size="32" onclick="if(this.value == 'Telefono')this.value='';if(this.value == '')this.value='Telefono'"/></td>
     <?php endif;?>
       <?php if(isset($_GET['celular'])):
			$celular_var=$_GET['celular'];
			?>
          
          <td><input name="celular" type="text" id="celular" value="<?php echo $celular_var?>" size="32" onclick="if(this.value == 'Celular')this.value=''" onblur="if(this.value == '')this.value='Celular'"/></td>
        </tr>
        <tr valign="baseline">
        <?php else:?>
        <td><input name="celular" type="text" id="celular" value="Celular" size="32" onclick="if(this.value == 'Celular')this.value=''" onblur="if(this.value == '')this.value='Celular'"/></td>
        </tr>
        <tr valign="baseline">
           <?php endif;?>
          <?php if(isset($_GET['nombre_jefe'])):
			$nombre_jefe_var=$_GET['nombre_jefe'];
			?>
          <td><input name="nombre_jefe" type="text" id="nombre_jefe" value="<?php echo $nombre_jefe_var?>" size="32" onclick="if(this.value == 'Nombre Jefe')this.value=''" onblur="if(this.value == '')this.value='Nombre Jefe'"/></td>
          <?php else:?>
         <td><input name="nombre_jefe" type="text" id="nombre_jefe" value="Nombre Jefe" size="32" onclick="if(this.value == 'Nombre Jefe')this.value=''" onblur="if(this.value == '')this.value='Nombre Jefe'"/></td>
          <?php endif;?>
          <td><select name="id_departamento">
            <option value="">Departamento</option>
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
          <td><input type="submit" value="Enviar" class="send" /></td>
        </tr>
      </table>
      <input type="hidden" name="MM_insert" value="form1" />
    </form>
    
    <p>&nbsp;</p>
    </div>
    </div>
    </div>
</body>
<!---------------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------------->
<?php
mysql_free_result($departamento);

mysql_free_result($cadena);

mysql_free_result($dia_descanso);

mysql_free_result($estado);

mysql_free_result($estado_civil);

mysql_free_result($sucursal);

mysql_free_result($tipo_vendedor);

mysql_free_result($tipo_usuario);
?>
