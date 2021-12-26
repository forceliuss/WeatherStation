<?php
		include 'database.php';
		
		session_start();
		
		if(isset($_SESSION['id'])){
			
				$id = $_SESSION['id'];
				
				$sql = "delete from usuarios where id_usuario = '$id'";
				
				if ($mysqli->query($sql)){
					
					header('Location:../examples/login.html');
					session_destroy();
					
				}else{
					header("Location:../examples/402.html");
				}
		}
?>