<?php 

	include 'database.php';
	
	
	$sql = "select * from cadastro order by id asc";
	
	$query = $mysqli->query($sql);

?>

<pre>
	<meta charset="UTF-8">
	<h1>LISTA DADOS</h1>
	<table border=1>
		<tr>
			<td>ID Instrumento</td> <td>Nome   </td> <td>Tipos</td>  <td>Numero Serial</td>  <td>Quantidade</td>  <td>Valor</td>
			<td>Editar</td> <td>Excluir</td>
		</tr>
		
		<?php
		
			while($linha = $query->fetch_assoc()){
	
				echo "<tr><td>";
				echo $linha['id'];
				echo "</td><td>";
				echo $linha['nome'];
				echo "</td><td>";
				echo $linha['tipo'];
				echo "</td><td>";
				echo $linha['numero-serial'];
				echo "</td><td>";
				echo $linha['quantidade'];
				echo "</td><td>";
				echo $linha['Valor'];
				echo "</td><td>";
				echo "<a href='editar.php?id=";
				echo $linha['id'];
				echo "'>Editar</a>";
				echo "</td><td>";
				echo "<a href='excluir.php?id=";
				echo $linha['id'];
				echo "'>Excluir</a></td>";
				echo "</tr>";
			
			}
		
		?>
	</table>

</pre>