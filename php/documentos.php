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
!
<!DOCTYPE html>
<html lang="pt_BR">
<head>
	<meta charset="utf-8">
	<title>Registros</title>
	<link rel="stylesheet" type="text/css" href="../css/global.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
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
			<h1>Documentos</h1>
		</div>
		<div class="col-sm">
			<div class="page-header">
				<h2>Adicionar atividade</h2>
			</div>

			<form action="addEvento.php" method="POST">
				<label class="form-control">
					Título da atividade:
					<input type="text" name="tipo_atividade" class="form-input" placeholder="Título...">
				</label>
				<label class="form-control">
					Descrição da atividade:
					<textarea class="form-input" name="descricao" placeholder="Breve comentário sobre a atividade..."></textarea>
				</label>
				<label class="form-control">
					Data:
					<input type="date" name="data_monitoria" class="form-input">
				</label>
				<label class="form-control">
					Início:
					<input type="time" name="hora_inicio" class="form-input">
				</label>
				<label class="form-control">
					Término:
					<input type="time" name="hora_termino" class="form-input">
				</label>

				<button class="btn btn-default" type="reset">Limpar</button>
				<button class="btn btn-danger" type="submit">Adicionar</button>
			</form>

			
			<br>

			<div class="page-header">
				<h2>Gerar Documento</h2>
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

				<button type="reset" class="btn btn-default">Limpar</button>
				<button type="submit" class="btn btn-danger">Gerar</button>
			</form>

		</div>
		
					<div class="centralized">
				<table style="text-align: left;">
					<tr>
						<th>Data</th>
						<th>Início - Término</th>
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
</body>
</html>