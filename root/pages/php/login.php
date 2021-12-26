<?php
	include 'database.php';
	
	//REQUERE O ARQUIVO DAS FUNÇÕES
	//require('../../function.php');
	
	//INCIALIZA A SEÇÃO
	session_start();
	
	//VERIFICA SE O FORMULARIO FOI POSTADO
	if($_POST){
		
		$email_login = $_POST['email'];
		$senha_login = $_POST['senha'];
		
			//FAZ O LOGIN
			$sql = "select * from usuarios where email = '$email_login'";
			
			$query = $mysqli->query($sql);
			while($linha = $query->fetch_assoc()){
				//$result = $linha->num_rows;
				
				//if($result != 0){
					
					if($email_login == $linha['email'] && $senha_login == $linha['senha']){

						$_SESSION['id'] = $linha['id_usuario'];
						$_SESSION['nome'] = $linha['nome'];
						$_SESSION['email'] = $linha['email'];
						$_SESSION['telefone'] = $linha['telefone'];
						$_SESSION['numero'] = $linha['numero_serial'];
						$_SESSION['cidade'] = $linha['local'];

						header('Location:../../index.php');

					}else{
						header('Location:../examples/login-error.html');
					}
				//}else{
					//header('Location:../examples/404.html');
				//}
			}

			
	}

?>