<?php
include("conecta.php");

$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];

if(!isset($_SESSION)) {
	session_start();
	
	if(isset($_SESSION["id_usuario"])){
		$id = $_SESSION["id_usuario"];
		$location = "Location:logado.php";
		$sql = "UPDATE `usuarios` SET `nome`='$nome', `email`='$email', `senha`='$senha' WHERE `id`=$id";
	}
	else{
		$login = $_POST["login"];
		$location = "Location:index.php";
		$sql = "INSERT INTO usuarios (`id`, `nome`, `email`, `login`, `senha`) VALUES (NULL, '$nome', '$email', '$login', '$senha')";
	}
}

try {	
	$conn->exec($sql);		
} catch(PDOException $e) {
	echo $sql . "<br>" . $e->getMessage();
}
$conn = null;

header($location);

?>

