<?php 
require_once('Connections/db_adidas.php');
//virtual('/adidas2/Connections/db_adidas.php'); ?>
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

$email = $_POST['email'] ; 
mysql_select_db($database_db_adidas, $db_adidas);
$query_usuarios = "SELECT nombre, email, password FROM usuarios";
$usuarios = mysql_query($query_usuarios, $db_adidas) or die(mysql_error());
$row_usuarios = mysql_fetch_assoc($usuarios);
$totalRows_usuarios = mysql_num_rows($usuarios);


  
$sql = mysql_query("SELECT * FROM usuarios WHERE email = '$email'") 
or die(mysql_error());  
$row = mysql_fetch_array($sql);
$rownum = mysql_num_rows($sql);

 $to= $row['email']; 
  $subject= "Universidad Adidas"; 
if(!$rownum  ) {
echo "No existe ese correo";
}
if($rownum ==1  ){
    


//$message   .= "Name:" . $row['nombre']. "\n\n";

$message   .= "Tu contraseña es:" . $row['password']. "\n\n";
      
 $header = "";     
     
 $sent =  mail($to,$subject,$message,$header);
 

if($sent)
{
echo "Se ha enviado";
}


}

mysql_free_result($usuarios);
?>
