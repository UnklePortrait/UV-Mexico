<?php
session_start();
date_default_timezone_set('America/Mexico_City');
include_once('classes/user.php');

function login(){
	// *** Validate request to login to this site.
	if (isset($_GET['accesscheck'])) {
  		$prevURL = $_GET['accesscheck'];
	}
	if (isset($_POST['login'])) {
		$loginUsername=$_POST['usuario'];
		$password=$_POST['password'];
		$MM_redirectLoginSuccess = "home.php";
		$MM_redirectLoginFailed = "index.php";
		$MM_redirecttoReferrer = false;
	
		$user = new User();
		$id_user = $user->login($loginUsername, $password);
		$_SESSION['id'] = $id_user;
		if($id_user){
			if(isset($prevURL)){
				$MM_redirectLoginSuccess = $prevURL;
			}
			header("Location: " . $MM_redirectLoginSuccess );
		}else{
			header("Location: ". $MM_redirectLoginFailed );
		}
	}
}

function logout(){
	if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  		//to fully log out a visitor we need to clear the session varialbles
  		$_SESSION['id'] = NULL;
  		unset($_SESSION['id']);
  		header("Location: index.php");
  	}else{
		return $_SERVER['PHP_SELF'] . "?doLogout=true";
	}
}

function authorize($pass, $relocate){
	if(!isset($_SESSION['id'])){
	header("Location:index.php");
	}
	else{
	$user = new User();
	$user_tipo=$user->get_tipo_usuario($_SESSION['id']);

	//Back to home if not session available
	if(!isset($user_tipo) || $user_tipo < $pass){
		header("Location:" . $relocate); 
	}else{
		return true;
		}
	}
}

function upload(){
	if(isset($_FILES['image']) && !empty($_FILES['image'])){	
		$upload_dir="imagesAdidas/uploads/";
		$upload_file=$upload_dir.uniqid("fotousuario_",false).".jpg";
		if(move_uploaded_file ($_FILES['image']['tmp_name'],$upload_file)){
			$user = new User();
			$user->set_image($_SESSION['id'],$upload_file);
		}
	}
}
function postComment(){
	$user = new User();
	if(isset ($_POST['comentario']) && !empty($_POST['comentario'])){
		$comentario=$_POST['comentario'];
		$user->insertComments($_SESSION['id'],$comentario, $_GET['subcat']);
	}
	if(isset ($_POST['reply']) && !empty($_POST['reply'])){
		$comentario=$_POST['reply'];
		$user->replyComment($_SESSION['id'],$comentario, $_POST['id_comentario']);
	}
	return $user->getComments($_GET['subcat']);
}

function get_eval($tipo){
	$user=new User();
	$puntos = $user->get_evaluation_info($_SESSION['id'],$tipo);

	return $puntos;
	
}
function getCommentsFrom($id_comment){
	$user = new User();
	return $user->getCommentsFrom($id_comment);
}


function sendPHP($user){
$nombre = $user['nombre'];
$mail = $user['email'];
$consultas="consultas@uv-mexico.com.mx";
$header = 'From: ' . $consultas . " \r\n";
$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
$header .= "Mime-Version: 1.0 \r\n";
$header .= "Content-Type: text/plain";

$mensaje = "Este mensaje fue enviado por " . $nombre . "\r\n";
$mensaje .= "Su e-mail es: " . $mail . " \r\n";
$mensaje .= "Comentario: " . $_POST['comentario'] . " \r\n";
$mensaje .= "Para verlo de click en el siguiente link http://www.uv-mexico.com.mx \r\n";
$mensaje .= "Enviado el " . date('d/m/Y', time());



//$para = 'krnturcott@gmail.com';
$asunto = 'Nuevo comentario en foro de dudas';

if (isset( $_POST['comentario'])){
mail("krnturcott@gmail.com,mitsue@alucinastudio.com", $asunto, utf8_decode($mensaje), $header);
}
}
function profile(){
	$user = new User();
	$user->set_today_points($_SESSION['id']);
	return $user->profile($_SESSION['id']);
}

?>