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
	<div class="content">

		<h1>Atividades</h1>
		<hr><br><br>

		<p style="font-size: 10px">Ainda adicionar os botões de dropdown mostrando cursos diferentes</p>

		<table>
			<tr>
				<td><a id="linksTable" href="atividadesCadeira.php?cadeira=Lógica de Programação">Lógica de Programação</a></td>
			</tr>
			<tr>
				<td><a id="linksTable" href="atividadesCadeira.php?cadeira=Redes de Computadores">Redes de Computadores</a></td>
			</tr>
			<tr>
				<td><a id="linksTable" href="atividadesCadeira.php?cadeira=Contabilidade">Contabilidade</a></td>
			</tr>
		</table>		

	</div>
	
</body>
</html>

