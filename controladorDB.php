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

	public function getProductos($where,$limite){
		$consulta = "SELECT 
		p.id,
		p.nombre,
		p.precio,
		p.existencia,
		f.web_path
		FROM
		productos AS p
		INNER JOIN productos_files AS pf ON pf.producto_id=p.id
		INNER JOIN files AS f ON f.id=pf.file_id
		$where
		GROUP BY p.id
		$limite
		";
		$res = mysqli_query(self::$instance,$consulta);
		return $res;
		//return $this->query($consulta);
	}

	public function totalProductos($where1){
		$consulta =  'SELECT COUNT(*) as cuenta FROM productos  $where1 ;';
		$res = mysqli_query(self::$instance,$consulta);
		$row = mysqli_fetch_assoc($res);
		return $row['cuenta'];
	}

	public function detalleProducto($id){
		$consulta = "SELECT id,nombre,precio,existencia FROM productos WHERE id='$id';";
		$res = mysqli_query(self::$instance,$consulta);
		$row = mysqli_fetch_assoc($res);
		return $row;
	}

	public function detalleProductoImg($id){
		$consulta = "SELECT 
					f.web_path
					FROM
					productos AS p
					INNER JOIN productos_files AS pf ON pf.producto_id=p.id
					INNER JOIN files AS f ON f.id=pf.file_id
					WHERE p.id='$id';
					";
		$res = mysqli_query(self::$instance,$consulta);
		//$row = mysqli_fetch_assoc($res);
		return $res;
	}





}


?>