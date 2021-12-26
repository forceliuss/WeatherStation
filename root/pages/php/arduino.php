<?php
	include 'database.php';
	
	$numero_arduino = $_SESSION['numero'];
	$sql = "select * from arduino where numeroserial = '$numero_arduino'";
	
	$query = $mysqli->query($sql);

	while($linha = $query->fetch_assoc()){

		$tempfora = $linha['temp_fora'];
		$tempdentro = $linha['temp_dentro'];
		$umdfora = $linha['umd_fora'];
		$umddentro = $linha['umd_dentro'];
		$chuva = $linha['chuva'];

		if($chuva == '1'){
			$stschuva = "Sim";
			$frasechuva = "Está Chovendo!!";
		}else{
			$stschuva = "Não";
			$frasechuva = "Não Está Chovendo!!";
		}	
	}

?>