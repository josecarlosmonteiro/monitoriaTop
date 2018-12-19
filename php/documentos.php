<?php
include 'conn.php';
session_start();
include 'Menu2.php';

$matricula = addslashes($_SESSION['matricula']);
$tipo = addslashes($_SESSION['tipo']);

if (!isset($matricula) && $tipo = "monitor") {
	header('location: index.php');
}

$matricula = addslashes($_SESSION['matricula']);

$query = $conn->prepare("SELECT m.id_monitoria, m.data_monitoria, m.inicio_monitoria, m.termino_monitoria, m.descricao_atividade, m.titulo_atividade FROM monitoria m WHERE m.matricula_monitor = ? AND status = 'realizada' ORDER BY m.id_monitoria DESC");
$query->execute([$matricula]);

$data = $query->fetchALL(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Geração de Relatório</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/micro-bootstrap.css">
	<style>
		@font-face{
			font-family: 'monitoria';
			src:url('../fonts/pn.otf');
		}
		.navbar{
			font-family: 'monitoria';
		}
	</style>
</head>
<body class="">
	<div class="container">
		<div class="page-header">
			<h1>Gerar Relatório</h1>
		</div>

		<div class="col-sm bordered" style="padding: 25px 20px;">
			<div class="page-header">
				<h2>Intervalo de Datas</h2>
			</div>
			<form action="relatorio.php" method="post">
				<label class="form-control">
					Primeiro dia:
					<input type="date" name="inicio" class="form-input">
				</label>
				<label class="form-control">
					Último dia:
					<input type="date" name="termino" class="form-input">
				</label>
				<button class="btn btn-success" type="submit">Gerar</button>
				<button class="btn btn-danger" type="reset">Limpar</button>
			</form>
			<br>
			<p>* Para gerar seu relatório, indique o primeiro e último dia válidos para o documento, o sistema listará automaticamente as atividades dentro do intervalo de dias informado.</p>
		</div>

		<div class="col-md bordered">
			<div class="container">	
				<div class="page-header">
					<h2>Registro Geral de Atividades</h2>
				</div>

				<table style="text-align: center;">
					<tr>
						<th>Data</th>
						<th>Início / Término</th>
						<th>Atividade</th>
						<th>Descrição</th>
						<th>Remover</th>

					</tr>
			<?php	foreach ($data as $lista) : ?>
						<tr>
							<td><?= $lista['data_monitoria'] ?></td>
							<td><?= $lista['inicio_monitoria'] ?> - <?= $lista['termino_monitoria'] ?></td>
							<td><?= $lista['titulo_atividade'] ?></td>
							<td><?= $lista['descricao_atividade'] ?></td>
							<td>
								<a href="rmRegistro.php?id=<?=$lista['id_monitoria']?>" style="margin: 5px 2px; padding: 5px; font-size: 26px; text-decoration: none;"">&#10799;</a>
							</td>
						</tr>
			<?php	endforeach; ?>
				</table>
			</div>
		</div>
	</div>
</body>
</html>