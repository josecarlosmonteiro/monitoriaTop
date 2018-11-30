<?php

	include 'conn.php'; 
	session_start();

if (!isset($_SESSION['matricula'])) {
	header('location: index.php');
}
	$query_log = $conn->prepare("SELECT id_disciplina, nome_cadeira FROM disciplina WHERE curso_cadeira = 'LOG'");
	$query_log->execute();

	$query_ipi = $conn->prepare("SELECT id_disciplina, nome_cadeira FROM disciplina WHERE curso_cadeira = 'IPI'");
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
	<?php	include 'Menu2.php';	?>

	<style>
		#tabelaIpi, #tabelaLog, #listaIpi, #listaLog{
			display: none;
			margin: 25px auto;
		}
		#listaIpi:checked ~ #tabelaIpi, #listaLog:checked ~ #tabelaLog{
			display: block;
		}
	</style>

</head>
<body>
	<br><br><br>
	<div class="content">

		<h1>Atividades</h1>
		<hr><br><br>

		<div style="text-align: center;">
			<input type="checkbox" id="listaIpi">
			<label for="listaIpi" id="btnList" class="btn">Cadeiras IPI &#9776;</label>

			<input type="checkbox" id="listaLog">
			<label for="listaLog" id="btnList" class="btn">Cadeiras LOG &#9776;</label>

			<div id="tabelaIpi">
				<table>
					<h3>Informática para Internet</h3>
					<hr><br>
					<?php foreach ($data_ipi as $disc) : ?> 
						<tr>
							<td><a id="linksTable" href="atividadesCadeira.php?cadeira=<?= $disc['id_disciplina'] ?>"><?= $disc['nome_cadeira'] ?></a></td>
					<?php endforeach ?>
				</table>
			</div>

			<div id="tabelaLog">
				<table>
					<h3>Logística</h3>
					<hr><br>
					<?php foreach ($data_log as $disc) : ?> 
						<tr>
							<td><a id="linksTable" href="atividadesCadeira.php?cadeira=<?= $disc['id_disciplina'] ?>"><?= $disc['nome_cadeira'] ?></a></td>
					<?php endforeach ?>
				</table>
			</div>
		</div>
	</div>
	 <div class="footer">
        <a href="developers.php" style="color: white;">Developers</a>
    </div>
</body>
</html>

