<?php
include("conecta.php");

$nome = $_POST["nome"];
$email = $_POST["email"];
$login = $_POST["login"];
$senha = $_POST["senha"];

try {
	$sql = "INSERT INTO usuarios (`id`, `nome`, `email`, `login`, `senha`) 
		VALUES (NULL, '$nome', '$email', '$login', '$senha')";
	$conn->exec($sql);
	echo "Cadastro realizado com sucesso!";
} catch(PDOException $e) {
	echo $sql . "<br>" . $e->getMessage();
}
$conn = null;

?>