<?php 
	//include 'conn.php'; 
	session_start();
?>

<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="../css/global.css">
	<?php	include 'menu.php';	?>
</head>
<body>
	<fieldset>

		<h1>Cursos e Cadeiras</h1>
		<hr><br><br>

		<table>
			<tr>
				<th>Curso</th>
				<th>Cadeira</th>
			</tr>
			<tr>
				<td>IPI</td>
				<td><a id="linksTable" href="atividadesCadeira.php?cadeira=Lógica de Programação">Lógica de Programação</a></td>
			</tr>
			<tr>
				<td>IPI</td>
				<td><a id="linksTable" href="atividadesCadeira.php?cadeira=Redes de Computadores">Redes de Computadores</a></td>
			</tr>

			<tr>
				<td>LOG</td>
				<td><a id="linksTable" href="atividadesCadeira.php?cadeira=Contabilidade">Contabilidade</a></td>
			</tr>
		</table>		

	</fieldset>
	
</body>
</html>

