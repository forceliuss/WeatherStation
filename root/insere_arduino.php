<?php
	include('pages/php/database.php');
	//require('function.php');
		
		$numero = 1;
		$temp_fora = $_GET['z'];
		$temp_dentro = $_GET['t'];
		$umd_fora = $_GET['e'];
		$umd_dentro = $_GET['h'];
		$chuva = $_GET['c'];
		
		$sql = "UPDATE arduino SET numeroserial = $numero,temp_fora = $temp_fora,temp_dentro = $temp_dentro,umd_fora = $umd_fora,umd_dentro = $umd_dentro,chuva = $chuva WHERE numeroserial = $numero";
		if($mysqli->query($sql)){
			echo "FOI";
		}else{
			echo "Tente Novamente :/";
		}
		//CONEXAO 1.0
		//echo "Temp Fora:".$temp_fora;
		//echo "Temp Dentro:".$temp_dentro;
		//echo "umd fora:".$umd_fora;
		//echo "umd dentro".$umd_dentro;
		//echo "chuva:".$chuva;
		
		
		//echo insere($temp_fora,$temp_dentro,$umd_fora,$umd_dentro,$chuva);
?>