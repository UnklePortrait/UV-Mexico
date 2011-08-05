<?php
$nombre = $_POST['nombre'];
$mail = $_POST['mail'];
$empresa = $_POST['empresa'];
$consultas="consultas@uv-mexico.com.mx";

$header = 'From: ' . $consultas . " \r\n";
$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
$header .= "Mime-Version: 1.0 \r\n";
$header .= "Content-Type: text/plain";

$mensaje = "Este mensaje fue enviado por " . $nombre . "\r\n";
$mensaje .= "Su e-mail es: " . $mail . " \r\n";
$mensaje .= "Mensaje: " . $_POST['mensaje'] . " \r\n";
$mensaje .= "Enviado el " . date('d/m/Y', time());


//$para = 'krnturcott@gmail.com';
$asunto = 'Reporte fallas';

mail("krnturcott@gmail.com,mitsue@alucinastudio.com,claudiac@marcoconsultora.com", $asunto, utf8_decode($mensaje), $header);

echo "<meta http-equiv='refresh' content='0;url=http://www.uv-mexico.com.mx/solicitud.php'/>";

?>