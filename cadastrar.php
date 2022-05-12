<?php
include("conecta.php");

if(!isset($_SESSION)) session_start();

if(isset($_SESSION["id_usuario"])){

	$aux = "disabled";

	$id = $_SESSION["id_usuario"];

	try {
	
		$sql = "SELECT * FROM `usuarios`WHERE `id` = '$id'";
		
		$res = $conn->query($sql)->fetchAll();

		if(count($res) > 0) {
	        foreach ($res as $row) {
	            $nome = $row['nome'];
	            $email = $row['email'];
	            $login = $row['login'];
	            $senha = $row['senha'];
	        }
	       
    	}	
	} catch(PDOException $e) {
		echo $sql . "<br>" . $e->getMessage();
	}
	$conn = null;

	echo ("<p><a href='excluir.php?id=$id'>Excluir a conta</a>");
}
else{
	$nome = "";
	$email = "";
	$login = "";
	$senha = "";
	$aux = "";
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Meu primeiro PHP</title>
</head>
<body>
	<form action="process_cadastrar.php" method="post">
		<label>
			Nome:
			<input type="text" name="nome" id="nome" value="<?=$nome?>">
		</label><br>
		<label>
			E-mail:
			<input type="email" name="email" id="email" value="<?=$email?>">
		</label><br>
		<label>
			Login:
			<input type="text" name="login" id="login" value="<?=$login?>" <?=$aux?> >
		</label><br>
		<label>
			Senha:
			<input type="password" name="senha" id="senha" value="<?=$senha?>">
		</label><br>
		<label>
			Confirme a Senha:
			<input type="password" name="senha2" id="senha2" value="<?=$senha?>">
		</label><br>
		<input type="submit">
	</form>

</body>
</html>




