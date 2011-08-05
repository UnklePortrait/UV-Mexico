
<?php require_once('Connections/db_adidas.php'); ?>
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
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}


if (isset($_POST['usuario'])) {
  $loginUsername=$_POST['usuario'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "id_tipo_usuario";
  $MM_redirectLoginSuccess = "home.php";
  $MM_redirectLoginFailed = "referencias/index1.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_db_adidas, $db_adidas);
  	
  $LoginRS__query=sprintf("SELECT id_usuario, email, password, id_tipo_usuario, nombre FROM usuarios WHERE email=%s AND password=%s",
  GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $db_adidas) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
    
    $loginStrGroup  = mysql_result($LoginRS,0,'id_tipo_usuario');
	$loginIdUser  = mysql_result($LoginRS,0,'id_usuario');
	$loginNombre  = mysql_result($LoginRS,0,'nombre');
	$loginPassword=mysql_result($LoginRS,0,'password');
	$loginEmail=mysql_result($LoginRS,0,'email');

    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginNombre;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;
	$_SESSION['MM_UserId'] = $loginIdUser;	
	$_SESSION['MM_UserPsw'] = $loginPassword;	
	$_SESSION['MM_UserEmail'] = $loginEmail;	
	


    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}

  
// value sent from form 
$email_to=$loginEmail;

// table name 
//$tbl_name=members; 

// retrieve password from table where e-mail = $email_to(mark@phpeasystep.com) 
$sql="SELECT password FROM usuarios WHERE email='$email_to'";
$result=mysql_query($sql);

// if found this e-mail address, row must be 1 row 
// keep value in variable name "$count" 
$count=mysql_num_rows($result);

// compare if $count =1 row
if($count==1){

$row_usuarios=mysql_fetch_array($result);

// keep password in $your_password
$your_password=$_SESSION['MM_UserPsw'] ;
// ---------------- SEND MAIL FORM ---------------- 

// send e-mail to ...
$to=$email_to; 

// Your subject 
$subject="Universidad Adidas"; 

// From 
$header="from: your name <your email>"; 

// Your message 
$messages= "Your password for login to our website \r\n";
$messages.="Tu contraseña es: $your_password \r\n";
$messages.="more message... \r\n";

// send email 
$sentmail=mail($to,$subject,$messages,$header); 

}

// else if $count not equal 1 
else {
echo "No encontramos tu correo en nuestra base de datos";
}

// if your email succesfully sent 
if($sentmail){
echo "Tu contraseña ha sido enviada";
}
else {
echo "No se pudo enviar tu contraseña";
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>