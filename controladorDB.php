<?php
define("HOST","localhost");
define("USER","root");
define("PASS","");
define("DBNAME","arcanepetshop");
define("PORT","3307");

class DB extends mysqli{
    protected static $instance;

	public function __constructor($host,$user,$pass,$dbname,$port){
		@parent::__constructor($host,$user,$pass,$dbname,$port);
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

	public function getUser($name, $pass){
		$consulta = "SELECT * FROM users WHERE user='".$name."' AND password='".$pass."'";
		return $this->query($consulta);
	}
}

?>