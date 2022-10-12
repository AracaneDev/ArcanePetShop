<?php
define("HOST","localhost");
define("USER","root");
define("PASS","");
define("DBNAME","arcanepetshop");
define("PORT","3307");

class DB extends mysqli{
    protected static $instance;

	public function __constructor($host,$user,$pass,$dbname,$port){
		@parent::__construct($host,$user,$pass,$dbname,$port);
		if(mysqli_connect_errno()){
			throw new Exception("error de conexion", 1);
		}
	}

	public static function getDBConnection(){
		if(!self::$instance){
			self::$instance = new self(HOST,USER,PASS,DBNAME,PORT);
			$consulta = "SET CHARACTER SET UTF8";
			self::$instance->query($consulta);
		}
		return self::$instance;
	}

	public function getUser($email, $pass){
		$consulta = "SELECT id,email,nombre FROM usuarios WHERE email='".$email."' AND pass='".$pass."'";
		$res = mysqli_query(self::$instance,$consulta);
		$row = mysqli_fetch_assoc($res);
		return $row;
		//return $this->query($consulta);
	}

	public function getUsers(){
		$consulta = "SELECT id,email,nombre FROM usuarios;  ";
		$res = mysqli_query(self::$instance,$consulta);
		return $res;
		//return $this->query($consulta);
	}

	public function buscarUsuario($id){
		$consulta = "SELECT id,email,pass,nombre FROM usuarios WHERE id='".$id."'; ";
		$res = mysqli_query(self::$instance,$consulta);
		$row = mysqli_fetch_assoc($res);
		return $row;
	}

	public function crearUsuario($email, $pass, $nombre){
		$consulta = "INSERT INTO usuarios
		(email       ,pass,nombre) VALUES 
		('".$email."','".$pass."','".$nombre."');
		";
		$res =mysqli_query(self::$instance,$consulta);
		return $res;
		//return $this->query($consulta);
	}

	public function actualizarUsuario($email, $pass, $nombre, $id){
/* 		$consulta = "UPDATE usuarios SET"
			."nombre='".$name."',"
			."descripcion='".$desc."',"
			."precio='".$precio."',"
			."imagen='".$imagen."'"
		."WHERE nombre='".$producto."'";
		print($consulta);
		return $this->query($consulta); */
		$consulta = "UPDATE usuarios SET
		email='".$email."',pass='".$pass."',nombre='".$nombre."'
		WHERE id='".$id."';
		";
		$res =mysqli_query(self::$instance,$consulta);
		return $res;
	}

	public function borrarUsuario($id){
		$consulta = "DELETE FROM usuarios WHERE id='".$id."';";
		$res =mysqli_query(self::$instance,$consulta);
		return $res;
	}
}


?>