<?php
include("conecta.php");

$login = $_POST["login"];
$senha = $_POST["senha"];

try {
	
	$sql = "SELECT * FROM `usuarios` 
		WHERE `login` = '$login' AND `senha` = '$senha'";
	
	$res = $conn->query($sql)->fetchAll();

	if(count($res) > 0) {
        foreach ($res as $row) {
            $id = $row['id'];
        }
        
	    if(isset($_POST["salvar"])){
			setcookie("login",$login);
			setcookie("senha",$senha);
		}
		else{
			setcookie("login",$login,time()-1);
			setcookie("senha",$senha,time()-1);
		}

		if(!isset($_SESSION)) 
			session_start();
		
		$_SESSION["id_usuario"] = $id;
		
		header("Location:logado.php");
    }
  	
  	else {
      header("Location:index.php"); 
    }

} catch(PDOException $e) {
	echo $sql . "<br>" . $e->getMessage();
}
$conn = null;

?>
