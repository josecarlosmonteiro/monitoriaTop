<?php 
include 'conn.php';
session_start();

$matricula = addslashes($_SESSION['matricula']);
$curso = addslashes($_SESSION['curso']);

if (!isset($matricula)) {
	header('location: home.php');
}

$query = $conn->prepare("SELECT m.data_monitoria, m.inicio_monitoria, m.termino_monitoria, m.titulo_atividade, m.descricao_atividade FROM monitoria m INNER JOIN disciplina d WHERE id_curso_monitoria = d.id_disciplina AND d.curso_cadeira = ?");
$query->execute([$curso]);

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Atividades</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/micro-bootstrap.css">
</head>
<body class="inverted">

	<div class="container">
		<div class="page-header">
			<h1>Monitorias Agendadas</h1>
		</div>

		<div class="col-sm ">
			<div class="page-header">
				<h2>Observações</h2>
			</div>
			<p>	* As atividades listadas aqui são agendadas pelos próprios monitores; </p>
			<p>	* Caso uma atividade desapareça, significa que o monitor marcou como 'concluída' ou a removeu. </p>
		</div>

		<div class="col-lg">
			<div class="page-header">
				<h2>Monitorias Listadas</h2>
			</div>
			<table style="text-align: center;">
				<tr>
					<th>Data</th>
					<th>Início / Término</th>
					<th>Atividade</th>
					<th>Descrição</th>
					<th>Matéria</th>
				</tr>
				<tr>
					<td>00/00</td>
					<td>00:00 / 00:00</td>
					<td>Lorem ipsum</td>
					<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua.</td>
					<td>Cadeira</td>
				</tr>
				<tr>
					<td>00/00</td>
					<td>00:00 / 00:00</td>
					<td>Lorem ipsum</td>
					<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua.</td>
					<td>Cadeira</td>
				</tr>
				<tr>
					<td>00/00</td>
					<td>00:00 / 00:00</td>
					<td>Lorem ipsum</td>
					<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua.</td>
					<td>Cadeira</td>
				</tr>
				<tr>
					<td>00/00</td>
					<td>00:00 / 00:00</td>
					<td>Lorem ipsum</td>
					<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua.</td>
					<td>Cadeira</td>
				</tr>
				<tr>
					<td>00/00</td>
					<td>00:00 / 00:00</td>
					<td>Lorem ipsum</td>
					<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua.</td>
					<td>Cadeira</td>
				</tr>
			</table>
		</div>
	</div>

</body>
</html>