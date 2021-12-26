<?php
function insere($temp_fora,$temp_dentro,$umd_fora,$umd_dentro,$chuva){
	
	$sql = "INSERT INTO arduino (numeroserial,temp_fora,temp_dentro,umd_fora,umd_dentro,chuva) VALUES ('$numero','$temp_fora','$temp_dentro','$umd_fora','$umd_dentro','$chuva')";
	if($query = $mysqli->query($sql)){
		$resp = "Inserção Feita!";
	}else{
		$resp = "Erro Ao Inserir Dados";
	}
	
	return $resp;
};

function login($email_login,$senha_login){
	
	$sql = "select * from usuarios where email = '$email_login'";
			
			$query = $mysqli->query($sql);
			while($linha = $query->fetch_assoc()){
				$result = $linha->num_rows;
				
				if($result != '0'){
					
					if($email_login == $linha['email'] && $senha_login == $linha['senha']){
									

						$_SESSION['id'] = $linha['id_usuario'];
						$_SESSION['nome'] = $linha['nome'];
						$_SESSION['email'] = $linha['email'];
						$_SESSION['telefone'] = $linha['telefone'];
						$_SESSION['numero'] = $linha['numero_serial'];
						$_SESSION['cidade'] = $linha['local'];
						

						$resp_login = "header('Location:../../index.php');";

					}else{
						$resp_login = "header('Location:../examples/login-error.html');";
					}
				}else{
					$resp_login = "header('Location:../examples/404.html');";
				}
			}
			return $resp_login;
};

function logout(){
	session_start();
	
	session_destroy();
	
	$resp_logout = "header('Location:../examples/login.html');"
	
	return $resp_logout;
};

function register($nome,$email,$fone,$senha,$numero,$local){
		
		
		$sql = "INSERT INTO usuarios (nome,email,senha,telefone,numero_serial,local) VALUES ('$nome','$email','$senha','$fone','$numero','$local')";
		
		if($mysqli->query($sql)){
			$resp_register = "header('Location:../../index.php');";
		}else{
			$resp_register = "header('Location:../examples/404.html');";
		}
		
		return $resp_register;
};
?>