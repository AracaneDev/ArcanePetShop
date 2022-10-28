<?php
require_once "../controladorDB.php";

$db = db::getDBConnection();


$auth = false;
if(isset($_POST['email']) && isset($_POST['pass'])){
	$usuario = $db->getUser($_POST['email'], $_POST['pass']);
    
	//if (mysqli_num_rows($usuario)>0){
    if($usuario){
		$auth = true;
	}
    else{
        
    }
} 

if($auth){
	session_start();
    $_SESSION['id'] = $usuario['id'];
    $_SESSION['email'] = $usuario['email'];
    $_SESSION['nombre'] = $usuario['nombre'];
	//$_SESSION['email'] = $_POST['email'];
	$_SESSION['auth'] = true;
	header("Location: ./panel.php");
}else{
    
	header("Location: ./index.php?error=1");
  
}


/*     $dbHost= "localhost:3307";
    $dbUser= "root";
    $dbPass= "";
    $dbName = "arcanepetshop";

    $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
    if (!$conn){
        die("No hay conexion: ".mysqli_connect_error());
    }

    $user = $_POST["user"];
    $pass = $_POST["pass"];

    $query = mysqli_query($conn,"SELECT * FROM users WHERE user = '".$user."' and password ='".$pass."'");
    $nr = mysqli_num_rows($query);

    if($nr == 1){
        echo "Bienvenido" .$user;
    }
    else if ($nr == 0){
        echo"No ingreso";
    } */
?>