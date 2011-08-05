<?php
include_once("classes/core.php");
class DataBase{
	private $conexion;
	
	public function __construct(){
		$this->conexion = mysql_connect(DATABASE_SERVER, DATABASE_USER, DATABASE_PASSWORD);
		mysql_select_db(DATABASE_DB,$this->conexion) or die(mysql_error());
	}
	public function select($table, $fields){
		$result = mysql_query("SELECT $fields FROM $table", $this->conexion) or die(mysql_error());
		if($result)
			return $result;
	}
	public function select_where($table, $fields, $condition){
		$result = mysql_query("SELECT $fields FROM $table WHERE $condition", $this->conexion) or die(mysql_error());
		if($result)
			return $result;
	}
	public function insert_into($table, $values){
		$query = "INSERT INTO $table VALUES ($values)";
		$result = mysql_query($query, $this->conexion) or die(mysql_error());
		if($result)
			$id = mysql_insert_id();
		return $id;
	}
	public function update($table, $values, $condition){
		$query = "UPDATE $table SET $values WHERE $condition";
		$result = mysql_query($query, $this->conexion) or die(mysql_error());
		if($result)
			return $result;
	}
	public function query($query)
	{
		$result = mysql_query($query, $this->conexion) or die(mysql_error());
		if($result)
			return $result;
	}
}
?>