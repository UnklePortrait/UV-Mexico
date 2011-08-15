<?php
include_once('functions.php');
$user=profile();
postComment();

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

mail("krnturcott@gmail.com,mitsue@alucinastudio.com", $asunto, utf8_decode($mensaje), $header);

$subcat = $_GET['subcat'];
$cat = $_GET['cat'];

echo "<meta http-equiv='refresh' content='0;url=http://www.uv-mexico.com.mx/foro.php?cat=$cat&subcat=$subcat'/>";

?>