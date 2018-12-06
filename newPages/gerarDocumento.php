<?php
include 'conn.php';
session_start();
include 'Menu2.php';
if (!isset($_SESSION['matricula'])) {
	header('location: index.php');
}

$matricula = addslashes($_SESSION['matricula']);

$query = $conn->prepare("SELECT m.id_monitoria, m.data_monitoria, m.inicio_monitoria, m.termino_monitoria, m.descricao_atividade, m.titulo_atividade FROM monitoria m WHERE m.matricula_monitor = ? AND status = 'realizada'");
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
		tr:hover{
			background-color: #e22424;
		}
	</style>
</head>
<body class="inverted">
	<div class="container">
		<div class="page-header">
			<h1>Gerar Relatório</h1>
		</div>

		<div class="col-sm bordered">
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
				<button class="btn btn-default" type="reset">Limpar</button>
				<button class="btn btn-danger" type="submit">Gerar</button>
			</form>
			<p>* Para gerar seu relatório, indique o primeiro e último dia válidos para o documento, o sistema listará automaticamente as atividades dentro do intervalo de dias informado.</p>
		</div>

		<div class="col-lg">
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
						<th>Opções</th>
					</tr>
			<?php	foreach ($data as $lista) : ?>
						<tr>
							<td><?= $lista['data_monitoria'] ?></td>
							<td><?= $lista['inicio_monitoria'] ?> - <?= $lista['termino_monitoria'] ?></td>
							<td><?= $lista['titulo_atividade'] ?></td>
							<td><?= $lista['descricao_atividade'] ?></td>
							<td>
								<a href="editRegistro.php?id=<?=$lista['id_monitoria']?>" class="link">Editar</a>
								<a href="rmRegistro.php?id=<?=$lista['id_monitoria']?>" class="link">Remover</a>
							</td>
						</tr>
			<?php	endforeach; ?>
				</table>
			</div>
		</div>
	</div>
</body>
</html>