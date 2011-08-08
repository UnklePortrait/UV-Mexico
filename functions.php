<?php
session_start();

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
	$user = new User();
	$user_profile = $user->profile($_SESSION['id']);

	//Back to home if not session available
	if(!$user_profile || $user_profile['tipo_usuario'] < $pass){
		header("Location:" . $relocate); 
	}else{
		return $user_profile;
	}
}
?>