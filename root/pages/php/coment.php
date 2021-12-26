<?php
	session_start();

	if ($_POST) {
		$_SESSION['comentario'] = $_POST['q'];
		header('Location:../../index.php');
	}
	
?>