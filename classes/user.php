<?php
date_default_timezone_set('America/Mexico_City');
include_once("classes/database.php");
class User{
	private $db;
	
	public function __construct(){
		$this->db=new DataBase();
	}
	
	public function login($email, $password){
		$user_result = $this->db->select_where("usuarios", "id_usuario", "email='$email' AND password='$password'");
		if(mysql_num_rows($user_result )>0){
			$user_profile = mysql_fetch_array($user_result);
			return $user_profile['id_usuario'];
		}else{
			return false;
		}
	}
	
	public function registro($puesto, $departamento, $estado_civil, $sucursal, $nombre, $fecha_nacimiento, $email, $password, $telefono, $celular, $nombre_jefe, $dia_descanso){
		if($this->exist($email)){
			return false;
		}else{
			$user_registro = $this->db->insert_into("usuarios(id_puesto, id_departamento, id_estado_civil, id_sucursal, nombre, fecha_nacimiento, email, password, telefono, celular, nombre_jefe, id_dia_descanso)", "'$puesto', '$departamento', '$estado_civil', '$sucursal', '$nombre', '$fecha_nacimiento', '$email', '$password', '$telefono', '$celular', '$nombre_jefe', '$dia_descanso'");
			if($user_registro){
				return $user_registro;
			}else{
				return false;
			}
		}
	}
	
	public function exist($email){
		$user_result = $this->db->select_where("usuarios", "id_usuario", "email='$email'");
		if(mysql_num_rows($user_result) > 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function get_tipo_usuario($id_user){
		$user_result = $this->db->select_where("usuarios", "id_tipo_usuario", "id_usuario='$id_user'");
		if(mysql_num_rows($user_result) > 0){
			$user_tipo = mysql_fetch_array($user_result);
			return $user_tipo['id_tipo_usuario'];
		}else{
			return false;
		}
	}
	
	public function set_image($id_user, $url_image){
		$user_result = $this->db->update("usuarios", "image='$url_image'", "id_usuario='$id_user'");
		return $user_result;
	}
	
	public function set_today_points($id_user){
		$fecha = date('Y-m-d', time());
		$time = date('G:i:s', time());
		$last_visit = $this->db->select_where("visitas", "id_visita", "id_usuario='$id_user' AND fecha='$fecha'");
		if(mysql_num_rows($last_visit) > 0){
			return false;
		}else{
			$user_visit = $this->db->insert_into("visitas(id_usuario, fecha, hora_entrada)", "'$id_user','$fecha','$time'");
		}
	}
	
	
	public function set_evaluation($id_user, $resultado, $tipo_examen){
		$fecha = date('Y-m-d', time());
		$time = date('G:i:s', time());
		$exam_search = $this->db->select_where("examen", "id_examen", "nombre='$tipo_examen'");
		$exam_array = mysql_fetch_array($exam_search);
		$exam = $exam_array['id_examen'];
		$last_evaluation_search = $this->db->select_where("evaluaciones", "id_evaluacion, puntos", "id_usuario='$id_user' AND tipo_examen='$exam'");
		if(mysql_num_rows($last_evaluation_search) > 0){
			$last_evaluation_array = mysql_fetch_array( $last_evaluation_search);
			$last_evaluation_id = $last_evaluation_array['id_evaluacion'];
			$last_evaluation_puntos = $last_evaluation_array['puntos'];
			if($resultado > $last_evaluation_puntos){
				$this->db->update("evaluaciones", "puntos='$resultado', fecha='$fecha', hora='$time'", "id_evaluacion='$last_evaluation_id'");
			}
		}else{
			$this->db->insert_into("evaluaciones(id_usuario, tipo_examen, puntos, fecha, hora)", "'$id_user', '$exam', '$resultado', '$fecha', '$time'");
		}
	}
	
	public function insertComments($id_user,$comentario, $subcategoria){
		$fecha = date('Y-m-d', time());
		$time = date('G:i:s', time());
		$subcategoria_result=$this->db->select_where("subcategoria","id_subcategoria", "nombre='$subcategoria'");
		$subcategoria_array = mysql_fetch_array($subcategoria_result);
		$subcat = $subcategoria_array['id_subcategoria'];
		$insert=$this->db->insert_into("comentarios(id_usuario,comentario,fecha,hora,id_comentario_respuesta, id_subcategoria)","'$id_user','$comentario','$fecha','$time','0', '$subcat'");
		if($insert){
		return $insert;
		}
		else{
		return false;
		}	
	}
	
	public function replyComment($id_user, $comentario, $id_comentario ){
		$fecha = date('Y-m-d', time());
		$time = date('G:i:s', time());
		$insert=$this->db->insert_into("comentarios(id_usuario,comentario,fecha,hora,id_comentario_respuesta,id_subcategoria)","'$id_user','$comentario','$fecha','$time','$id_comentario','0'");
		if($insert){
		return $insert;
		}
		else{
		return false;
		}
		
	}
	
	public function getComments($subcategoria){
		$commentsArray=array();
		$subcategoria_result=$this->db->select_where("subcategoria","id_subcategoria", "nombre='$subcategoria'");
		$subcategoria_array = mysql_fetch_array($subcategoria_result);
		$id_subcategoria = $subcategoria_array['id_subcategoria'];
		$user_result = $this->db->select_where("comentarios", "id_usuario,id_comentario,comentario, fecha,hora", "id_subcategoria='$id_subcategoria'");
		if(mysql_num_rows($user_result )>0){
			while($user_row=mysql_fetch_array($user_result)){
				$id_user=$user_row['id_usuario'];
				$user= $this->db->select_where("usuarios", "image,nombre", "id_usuario='$id_user'");
				$result=mysql_fetch_array($user);
				$result_array=array("nombre"=>$result['nombre'],"image"=>$result['image'],"comentario"=>$user_row['comentario'],"fecha"=>$user_row['fecha'],"hora"=>$user_row['hora'		],"id_comentario"=>$user_row['id_comentario']);
				array_push($commentsArray,$result_array);			
			}
		}
		return $commentsArray;
	}
	
	public function getCommentsFrom($id_comentario){
		$commentsArray=array();
		$user_result = $this->db->select_where("comentarios", "id_usuario,comentario, fecha,hora", "id_comentario_respuesta='$id_comentario'");
		if(mysql_num_rows($user_result )>0){
			while($user_row=mysql_fetch_array($user_result)){
				$id_user=$user_row['id_usuario'];
				$user= $this->db->select_where("usuarios", "nombre,image", "id_usuario='$id_user'");
				$result=mysql_fetch_array($user);
				$result_array=array("nombre"=>$result['nombre'],"image"=>$result['image'],"comentario"=>$user_row['comentario'],"fecha"=>$user_row['fecha'],"hora"=>$user_row['hora']);
				array_push($commentsArray,$result_array);
			}
		}

		return $commentsArray;
	}
	
	public function profile($id_user){
		$user_result = $this->db->select_where("usuarios", "id_usuario, email, password, id_tipo_usuario, nombre, id_sucursal, id_departamento, id_puesto, image", "id_usuario='$id_user'");
		if(mysql_num_rows($user_result )>0){
			$user_profile = mysql_fetch_array($user_result);
			$id_sucursal = $user_profile['id_sucursal'];
			$id_puesto=$user_profile['id_puesto'];
			$id_departamento = $user_profile['id_departamento'];
			
			$sucursal_result= $this->db->select_where("sucursal", "nombre, id_cadena", "id_sucursal='$id_sucursal'");
			$sucursal_array= mysql_fetch_array($sucursal_result);
			$sucursal_nombre=$sucursal_array['nombre'];
			$sucursal_cadena=$sucursal_array['id_cadena'];
			
			$departamento_result= $this->db->select_where("departamento", "nombre", "id_departamento='$id_departamento'");
			$departamento_array=mysql_fetch_array($departamento_result);
			$departamento_nombre=$departamento_array['nombre'];
			
			$cadena_result= $this->db->select_where("cadena", "nombre", "id_cadena='$sucursal_cadena'");
			$cadena_array=mysql_fetch_array($cadena_result);
			$cadena_nombre=$cadena_array['nombre'];
			
			$puesto_result= $this->db->select_where("tipo_vendedor", "nombre", "id_puesto='$id_puesto'");
			$puesto_array=mysql_fetch_array($puesto_result);
			$puesto_nombre=$puesto_array['nombre'];
			
			$visitas_result = $this->db->select_where("visitas", "id_visita", "id_usuario='$id_user'");
			$evaluaciones_result = $this->db->select_where("evaluaciones", "puntos", "id_usuario='$id_user'");
			if(mysql_num_rows($evaluaciones_result) > 0){
				while($evaluaciones_row = mysql_fetch_array($evaluaciones_result)){
					$puntos_evaluaciones += $evaluaciones_row['puntos'];
				}
			}else{
				$puntos_evaluaciones = 0;
			}
			
			$puntos = 10;
			$puntos_visitas = 10 * mysql_num_rows($visitas_result);
			
			$puntos += $puntos_visitas;
			$puntos += $puntos_evaluaciones;
			
			$this->db->update("usuarios", "puntos='$puntos'", "id_usuario='$id_user'");
			
			return array('id_usuario'=>$user_profile['id_usuario'],'email'=>$user_profile['email'],'password'=>$user_profile['password'],'tipo_usuario'=>$user_profile['id_tipo_usuario'],'nombre'=>$user_profile['nombre'], 'image'=>$user_profile['image'], 'sucursal'=>$sucursal_nombre,'departamento'=>$departamento_nombre,'cadena'=>$cadena_nombre,'puesto'=>$puesto_nombre, 'puntos'=>$puntos, 'visitas'=>$puntos_visitas, 'evaluaciones'=>$puntos_evaluaciones,);		
		}else{
			return false;
		}

		
	}
}
?>