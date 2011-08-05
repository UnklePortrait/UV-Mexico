<?php
include_once("classes/database.php");
class User{
	private $db;
	
	public function __construct(){
		$this->db=new DataBase();
	}
	public function login($email, $password){
		$user_result = $this->db->select_where("usuarios", "id_usuario, email, password, id_tipo_usuario, nombre, id_sucursal, id_departamento, id_puesto", "email='$email' AND password='$password'");
		if($user_result){
			return true;
		}else{
			return false;
		}
	}
	public function registro($puesto, $departamento, $estado_civil, $sucursal, $nombre, $fecha_nacimiento, $email, $password, $telefono, $celular, $nombre_jefe, $dia_descanso){
		$user_registro = $this->db->insert_into("usuarios(id_puesto, id_departamento, id_estado_civil, id_sucursal, nombre, fecha_nacimiento, email, password, telefono, celular, nombre_jefe, id_dia_descanso)", "'$puesto', '$departamento', '$estado_civil', '$sucursal', '$nombre', '$fecha_nacimiento', '$email', '$password', '$telefono', '$celular', '$nombre_jefe', '$dia_descanso'");
		if($user_registro){
		}else{
		}
	}
	public function profile($id_user){
		//select_where(id_user)
	}
}
?>