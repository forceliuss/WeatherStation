<?php
	session_start();
	
	session_destroy();
	
	header('Location:../examples/login.html');
	
?>