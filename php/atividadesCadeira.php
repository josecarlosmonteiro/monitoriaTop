<!DOCTYPE html>
<html>
<head>
	<title>Lista de Atividades</title>
	<link rel="stylesheet" type="text/css" href="../css/global.css">
	<?php 
		session_start();
		include "menu.php";
		$cadeira = $_GET['cadeira'];
	?>
</head>
<body>

	<div class="content">
		<h1><?= $cadeira ?></h1>

		<fieldset class="fieldset-large">
			<table>
				<tr>
					<th>Atividade</th>
					<th>Data</th>
					<th>Início</th>
					<th>Término</th>
					<th>Descrição</th>
				</tr>

				<tr>
					<td>Nome da Atividade</td>
					<td>XX/XX</td>
					<td>00:00</td>
					<td>00:00</td>
					<td>Breve descrição da atividade</td>
				</tr>
				<tr>
					<td>Nome da Atividade</td>
					<td>XX/XX</td>
					<td>00:00</td>
					<td>00:00</td>
					<td>Breve descrição da atividade</td>
				</tr>
				<tr>
					<td>Nome da Atividade</td>
					<td>XX/XX</td>
					<td>00:00</td>
					<td>00:00</td>
					<td>Breve descrição da atividade</td>
				</tr>

			</table>
		</fieldset>

		<fieldset>
			<h3>Monitor(es)</h3>
			<hr><br><br>
			<table>
				<th>Monitor</th>
				<th>Contato</th>
				<tr>
					<td>Fulano</td>
					<td>contato@email.com</td>
				</tr>
				<tr>
					<td>Fulano</td>
					<td>contato@email.com</td>
				</tr>
				<tr>
					<td>Fulano</td>
					<td>contato@email.com</td>
				</tr>
			</table>
		</fieldset>
	</div>
</body>
</html>