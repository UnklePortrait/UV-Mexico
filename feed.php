<?php 
require_once('classes/database.php');
$database=new DataBase();
$subcat_name = $_REQUEST['subcat'];
$subcat_result = $database->select_where("subcategoria", "id_subcategoria", "nombre='$subcat_name'");
$subcat_array = mysql_fetch_array($subcat_result);
$subcat_id = $subcat_array['id_subcategoria'];
$comentarios_result = $database->select_where("comentarios", "id_comentario, id_usuario, comentario, fecha, hora", "id_subcategoria='$subcat_id'");
$comentarios = array();
$replies = array();

if( mysql_num_rows( $comentarios_result ) ){
	while( $comentarios_row = mysql_fetch_array( $comentarios_result ) ){
		$user_id = $comentarios_row['id_usuario'];
		$user_result = $database->select_where("usuarios", "nombre", "id_usuario='$user_id'");
		$user_array = mysql_fetch_array( $user_result );
		$comentario_id = $comentarios_row['id_comentario'];
		$replies_result = $database->select_where("comentarios", "id_usuario, comentario, fecha, hora", "id_comentario_respuesta='$comentario_id'");
		if( mysql_num_rows( $replies_result ) ){
			while( $replies_row = mysql_fetch_array( $replies_result ) ){
				$reply_user_id = $replies_row['id_usuario'];
				$reply_user_result = $database->select_where("usuarios", "nombre", "id_usuario='$reply_user_id'");
				$reply_user_array = mysql_fetch_array( $reply_user_result );
				$nombre = empty($reply_user_array['nombre'])?'undefined':$reply_user_array['nombre'];
 				$reply = array('nombre'=>$nombre, 'texto'=>$replies_row['comentario'], 'fecha'=>$replies_row['fecha'], 'hora'=>$replies_row['hora']);
				array_push($replies, $reply);
			}
		}
		$nombre = empty($user_array['nombre'])?'undefined':$user_array['nombre'];
		$comment = array('nombre'=>$nombre, 'texto'=>$comentarios_row['comentario'], 'fecha'=>$comentarios_row['fecha'], 'hora'=>$comentarios_row['hora'],'replies'=>$replies);
		array_push($comentarios, $comment);
	}
	success($comentarios);
}else{
	error('No hay comentarios en el foro');
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
function array2xml($array){
	$xml=new SimpleXMLElement('<webservice/>');
	$xml->addChild('success',$array['success']);
	if($array['success'] == 'true'){
		$comentarios_xml = $xml->addChild('comentarios');
		$comentarios = $array['data'];
		foreach($comentarios as $comentario){
			$comentario_xml = $comentarios_xml->addChild('comentario');
			foreach($comentario as $key=>$value){
				if($key == 'replies'){
					$replies_xml = $comentario_xml->addChild('replies');
					foreach($value as $reply){
						$reply_xml = $replies_xml->addChild('reply');
						foreach($reply as $key=>$value){
							$reply_xml->addChild($key,$value);
						}
					}
				}else{
					$comentario_xml->addChild($key,$value);
				}
			}
		}
	}else{
		$xml->addChild('error',$array['error']);
	}
	return $xml->asXML();
}
?>