<?php
include '/../php/database.php';
session_start();
//Script desenvolvido por Victor Mangia em 23/08/2010 22:04
//Twitter: @mangiavictor
//entre abaixo com o numero da cidade
//busque o numero da cidade em http://tempo.cptec.inpe.br/

//configuração de conexão com o banco de dados
if(!mysql_connect('localhost','root','usbw')){
	die("Erro ao Conectar ao PHPMyADMIN");
}

if(!mysql_select_db('test')){
	die("Erro ao Conectar com Banco de Dados");
}
			
			$prev_cidade = $_SESSION['cidade'];	
			//Numero da CIDADE
			$sql = "select * from cidades where nome = '$prev_cidade'";
			
			$query = $mysqli->query($sql);
			while($linha = $query->fetch_assoc()){
				$numerocidade = $linha['id'];
			}
//verifica as datas e as previsoes
        
     	


//verificar se ja tem o registro no banco
$sqlPrevisao=mysql_num_rows(mysql_query("select * from previsao_brasmid where dt_atualizacao = now()"));
if($sqlPrevisao < 1)
{
	$obj = simplexml_load_file("http://servicos.cptec.inpe.br/XML/cidade/".$numerocidade."/previsao.xml");
	$contaReg = count($obj) - 1;
	for($i=0; $i <=$contaReg; $i++)
	{
		//evitando gravacao de registros invalidos
		if(isset($obj->previsao[$i]->dia))
		{ 
			//gravando as previsoes
			$sqlGravar=mysql_query("insert into previsao_brasmid set 
			dia='".$obj->previsao[$i]->dia."',
			icone='".$obj->previsao[$i]->tempo."',
			maxima='".$obj->previsao[$i]->maxima."',
			minima='".$obj->previsao[$i]->minima."',
			dt_atualizacao=now()
			");

			//Gravando os dados dos sensores
			



		}

		//grafico e suas datas
		$aux_data = 16;
		while ($aux_data >= 16 && $aux_data <= 22) {

			$data = "2017-10-".$aux_data;
			$linha=mysql_fetch_array(mysql_query("select minima, maxima, dia from previsao_brasmid where dia = '$data' limit 1"));

			if($data == "2017-10-16"){
				$max_segunda=$linha['maxima'];
				$min_segunda=$linha['minima'];
				$data_segunda=$data;

			}elseif($data == "2017-10-17"){
				$max_terca=$linha['maxima'];
				$min_terca=$linha['minima'];
				$data_terca=$data;

			}elseif($data == "2017-10-18"){
				$max_quarta=$linha['maxima'];
				$min_quarta=$linha['minima'];
				$data_quarta=$data;

			}elseif ($data == "2017-10-19") {
				$max_quinta=$linha['maxima'];
				$min_quinta=$linha['minima'];
				$data_quinta=$data;

			}elseif($data == "2017-10-20"){
				$max_sexta=$linha['maxima'];
				$min_sexta=$linha['minima'];
				$data_sexta=$data;

			}elseif($data == "2017-10-21"){
				$max_sabado=$linha['maxima'];
				$min_sabado=$linha['minima'];
				$data_sabado=$data;

			}elseif($data == "2017-10-22"){
				$max_domingo=$linha['maxima'];
				$min_domingo=$linha['minima'];
				$data_domingo=$data;

			}
			$aux_data++;
		}

		//buscar a previsao do dia
		$sqlDia=mysql_fetch_array(mysql_query("select minima, maxima, icone from previsao_brasmid order by dia desc limit 1"));
		$icone="<img src='icones_tempo/".$sqlDia['icone'].".png' alt=''>";
		
		$maxima=$sqlDia['maxima'];
		$minima=$sqlDia['minima'];	

		if ($sqlDia['icone'] == 'cl') {
			$icon_prev = 'Classe do icone de SOL';
		}elseif ($sqlDia['icone'] == 'n') {
			$icon_prev = 'Classe do icone de NUBLADO';
		}elseif ($sqlDia['icone'] == 'c') {
			$icon_prev = 'Classe do icone de CHUVA';
		}else{
			$icon_prev = 'cloud';
		}
		
	}	
} else {
		//buscar a previsao do dia
		$sqlDia=mysql_fetch_array(mysql_query("select minima, maxima, icone from previsao_brasmid order by dia desc limit 1"));
		$icone="<img src='icones_tempo/".$sqlDia['icone'].".png' alt=''>";
		
		$maxima=$sqlDia['maxima'];
		$minima=$sqlDia['minima'];
}
?>