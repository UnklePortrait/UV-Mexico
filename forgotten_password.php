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

 $to=$email;
 //$to= $row['email']; 
  $subject= "Universidad Adidas"; 
if(!$rownum  ) {
echo "<meta http-equiv='refresh' content='0;url=http://www.uv-mexico.com.mx/index.php'/>";
}
else{
    


//$message   .= "Name:" . $row['nombre']. "\n\n";

$message   .= '<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>mail</title>
</head>

<body>

	<table bgcolor="#868789">
    	<tr>
        	<td height="300px"><img src="http://www.uv-mexico.com.mx/imagesAdidas/mail/head-mail.PNG"/></td>        
        </tr>
    	
        <tr bgcolor="#868789">
        	<td align="center" height="200px">
	
					<p class="usuarioMail">Tu contrasea:<label>'. $row['password']. '</label></p>

	</td>
      </tr>
        <tr>
        	<td>
            	<img src="http://www.uv-mexico.com.mx/imagesAdidas/mail/foo.png" /></td>
        </tr>
        
    </table>


</body>
</html>';




      
 $consultas="consultas@uv-mexico.com.mx";

				$headers = 'From: ' . $consultas . " \r\n";
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";		    
     
 $sent =  mail($to,$subject,$message,$headers);
 

	if($sent)
	{

		echo "<meta http-equiv='refresh' content='0;url=http://www.uv-mexico.com.mx/solicitud.php'/>";

	}


}

mysql_free_result($usuarios);
?>

