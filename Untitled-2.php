<?php virtual('/adidas2/Connections/db_adidas.php'); ?>
<?php
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

  $insertGoTo = "/adidas2/home.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Id_puesto:</td>
      <td><input type="text" name="id_puesto" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Id_departamento:</td>
      <td><input type="text" name="id_departamento" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Id_estado_civil:</td>
      <td><input type="text" name="id_estado_civil" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Id_sucursal:</td>
      <td><input type="text" name="id_sucursal" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nombre:</td>
      <td><input type="text" name="nombre" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Apellido_paterno:</td>
      <td><input type="text" name="apellido_paterno" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Apellido_materno:</td>
      <td><input type="text" name="apellido_materno" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Fecha_nacimiento:</td>
      <td><input type="text" name="fecha_nacimiento" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Email:</td>
      <td><input type="text" name="email" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Password:</td>
      <td><input type="text" name="password" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Telefono:</td>
      <td><input type="text" name="telefono" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Celular:</td>
      <td><input type="text" name="celular" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nombre_jefe:</td>
      <td><input type="text" name="nombre_jefe" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Id_dia_descanso:</td>
      <td><input type="text" name="id_dia_descanso" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Insert record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
</body>
</html>