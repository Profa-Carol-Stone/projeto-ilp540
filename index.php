<?php
	$login = $senha = $check = "";
	if(isset($_COOKIE["login"])){
		$login = $_COOKIE["login"];
		$check = "checked";
	}
	if(isset($_COOKIE["senha"]))
		$senha = $_COOKIE["senha"];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Meu primeiro PHP</title>
</head>
<body>
	<form action="process_login.php" method="post">
		<label>
			Login:
			<input type="text" name="login" id="login" value="<?= $login ?>">
		</label><br>
		<label>
			Senha:
			<input type="password" name="senha" id="senha" value="<?= $senha ?>">
		</label><br>
		<label>
			<input type="checkbox" name="salvar" <?= $check ?>>
			Salvar dados de acesso
		</label><br>
		<input type="submit">
	</form>
	<a href="cadastrar.php">Realizar cadastro</a>
</body>
</html>




