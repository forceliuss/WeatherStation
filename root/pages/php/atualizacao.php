<?php
	
	include('database.php');
	session_start();

	$id = $_SESSION['id'];

	if($_POST){
		
		if($_POST['n']){
			
			$nome = $_POST['n'];
			$sql = "UPDATE usuarios SET nome = '$nome' WHERE id_usuario = '$id'";
			
			if($mysqli->query($sql)){
				header("Location:../../index.php");
				$_SESSION['nome'] = $nome;
				
			}else{
				header("Location:../examples/404.html");
			}
		
		}elseif($_POST['e']){
			
			$email = $_POST['e'];
			$sql = "UPDATE usuarios SET email = '$email' WHERE id_usuario = '$id'";
			
			if($mysqli->query($sql)){
				header("Location:../../index.php");
				$_SESSION['email'] = $email;

			}else{
				header("Location:../examples/404.html");
			}
		
		}elseif($_POST['t']){
			
			$telefone = $_POST['t'];
			$sql = "UPDATE usuarios SET telefone = '$telefone' WHERE id_usuario = '$id'";
			
			if($mysqli->query($sql)){
				header("Location:../../index.php");
				$_SESSION['telefone'] = $telefone;

			}else{
				header("Location:../examples/404.html");
			}
		
		}elseif($_POST['s']){
			
			$numero = $_POST['s'];
			$sql = "UPDATE usuarios SET numero_serial = '$numero' WHERE id_usuario = '$id'";
			
			if($mysqli->query($sql)){
				header("Location:../../index.php");
				$_SESSION['numero_serial'] = $numero;

			}else{
				header("Location:../examples/404.html");
			}
		
		}elseif($_POST['l']){
			
			$cidade = $_POST['l'];
			$sql = "UPDATE usuarios SET local = '$cidade' WHERE id_usuario = '$id'";
			
			if($mysqli->query($sql)){
				header("Location:../../index.php");
				$_SESSION['cidade'] = $cidade;

			}else{
				header("Location:../examples/404.html");
			}
		}elseif($_POST['se']){
			
			$senha = $_POST['se'];
			$sql = "UPDATE usuarios SET senha = '$senha' WHERE id_usuario = '$id'";
			
			if($mysqli->query($sql)){
				header("Location:../../index.php");
				$_SESSION['senha'] = $senha;

			}else{
				header("Location:../examples/404.html");
			}
		}
	}

?>
