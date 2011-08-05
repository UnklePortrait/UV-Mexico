<?php error_reporting(E_ALL);
ini_set("display_errors","1");?>
<?php require_once('Connections/db_adidas.php');?>
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

$colname_usuarios = "-1";
if (isset($_GET['email'])) {
  $colname_usuarios = $_GET['email'];
}
else{
error('Hace falta email');
}
if(isset($_GET['password'])){
$colname_password=$_REQUEST['password'];
}
else{
error('Hace falta password');
}
mysql_select_db($database_db_adidas, $db_adidas);
$query_usuarios = sprintf("SELECT id_usuario FROM usuarios WHERE email = %s and password=%s", GetSQLValueString($colname_usuarios, "text"),GetSQLValueString($colname_password, "text"));
$usuarios = mysql_query($query_usuarios, $db_adidas) or die(mysql_error());
$row_usuarios = mysql_fetch_assoc($usuarios);
$totalRows_usuarios = mysql_num_rows($usuarios);
if($totalRows_usuarios>0){
success($row_usuarios['id_usuario']);
}
else{
	error('El usuario o la contraseña son incorrectas');
	}
function error($error){
	$result=array('success'=>'false','error'=>  utf8_encode ($error));
	header('Content-type:text/xml');
	print array2xml($result);
	
	
	exit;
}
function success($success){
	$result=array('success'=>'true','data'=>$success);
	header('Content-type:text/xml');
	print array2xml($result);
	
exit;
}
function array2xml($array,$xml=false){
if($xml===false){
	$xml=new SimpleXMLElement('<webservice/>');
	}
	foreach($array as $key=>$value){
		if(is_array($value)){
			array2xml($value,$xml->addChild($key));
		}else{
			$xml->addChild($key,$value);
	}
	}
	return $xml->asXML();
		

}

mysql_free_result($usuarios);
?>
