<?php
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
			
			return array('id_usuario'=>$user_profile['id_usuario'],'email'=>$user_profile['email'],'password'=>$user_profile['password'],'tipo_usuario'=>$user_profile['id_tipo_usuario'],'nombre'=>$user_profile['nombre'], 'image'=>$user_profile['image'], 'sucursal'=>$sucursal_nombre,'departamento'=>$departamento_nombre,'cadena'=>$cadena_nombre,'puesto'=>$puesto_nombre);
			
			
		}else{
			return false;
		}

		
	}
}
?>