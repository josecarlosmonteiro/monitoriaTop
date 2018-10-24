<?php

	include 'conn.php'; 
	session_start();

if (!isset($_SESSION['matricula'])) {
	header('location: login.php');
}
	$query_log = $conn->prepare("SELECT id_curso, nome_cadeira FROM disciplina WHERE curso_cadeira = 'LOG'");
	$query_log->execute();

	$query_ipi = $conn->prepare("SELECT id_curso, nome_cadeira FROM disciplina WHERE curso_cadeira = 'IPI'");
	$query_ipi->execute();

	$data_log = $query_log->fetchALL();
	$data_ipi = $query_ipi->fetchALL();

?>
<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="../css/global.css">
	<link rel="stylesheet" href="../css/menu.css">
	<?php	include 'menu.php';	?>

	<style>
		#tabelaIpi, #tabelaLog, #listaIpi, #listaLog{
			display: block;
		}
		#listaIpi:checked ~ #tabelaIpi, #listaLog:checked ~ #tabelaLog{
			display: block;
		}
	</style>

</head>
<body>
	<div class="content">

		<h1>Atividades</h1>
		<hr><br><br>

		<div style="text-align: center;">
			<input type="checkbox" id="listaIpi">
			<label for="listaIpi" id="" class="btnDrop">Cadeiras IPI &#9776;</label>

			<input type="checkbox" id="listaLog">
			<label for="listaLog" id="" class="btnDrop">Cadeiras LOG &#9776;</label>

			<table id="tabelaIpi">
				<th>Informática para Internet</th>
				<?php foreach ($data_ipi as $disc) : ?> 
					<tr>
						<td><a id="linksTable" href="atividadesCadeira.php?cadeira=<?= $disc['id_curso'] ?>"><?= $disc['nome_cadeira'] ?></a></td>
				<?php endforeach ?>
			</table>
			<table id="tabelaIpi">
				<th>Logística</th>
				<?php foreach ($data_log as $disc) : ?> 
					<tr>
						<td><a id="linksTable" href="atividadesCadeira.php?cadeira=<?= $disc['id_curso'] ?>"><?= $disc['nome_cadeira'] ?></a></td>
				<?php endforeach ?>
			</table>
		</div>
	</div>
</body>
</html>

