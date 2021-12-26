<?php

	if($_POST){
		
		include 'database.php';
		
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$fone = $_POST['fone'];
		$senha = $_POST['senha'];
		$numero = $_POST['numero'];
		$local = $_POST['local'];
		
		$sql = "INSERT INTO usuarios (nome,email,senha,telefone,numero_serial,local) VALUES ('$nome','$email','$senha','$fone','$numero','$local')";
		
		if($mysqli->query($sql)){
			header("Location:../../index.php");
		}else{
			header("Location:../examples/404.html");
		}
	}

?>
