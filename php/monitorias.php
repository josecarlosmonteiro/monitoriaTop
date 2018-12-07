<?php 
include 'conn.php';
session_start();

include 'Menu2.php';
if (!isset($_SESSION['matricula'])) {
	header('location: index.php');
}

$matricula = addslashes($_SESSION['matricula']);
$tipo = addslashes($_SESSION['tipo']);
$periodo = addslashes($_SESSION['periodo']);

$query = $conn->prepare("SELECT m.id_monitoria, m.data_monitoria, m.inicio_monitoria, m.termino_monitoria, m.descricao_atividade, m.titulo_atividade FROM monitoria m WHERE m.matricula_monitor = ? AND status = 'agendada'");
$query->execute([$matricula]);

$dataMonitor = $query->fetchALL(PDO::FETCH_ASSOC);

$queryMonitoria = $conn->prepare("SELECT m.data_monitoria, m.inicio_monitoria, m.termino_monitoria, m.descricao_atividade, m.titulo_atividade FROM monitoria m INNER JOIN disciplina d ON m.id_disciplina_monitoria = d.periodo_cadeira INNER JOIN aluno a ON a.periodo = d.periodo_cadeira WHERE d.periodo_cadeira = ?");
$queryMonitoria->execute([$periodo]);
$dataMonitoria = $queryMonitoria->fetchALL(PDO::FETCH_ASSOC);

 ?>

<!DOCTYPE html>
<html lang="pt_br">
<head>
	<meta charset="UTF-8">
	<title>Monitorias</title>
	<link rel="stylesheet" href="../css/micro-bootstrap.css">
	<meta charset="utf-8">
</head>
<body class="inverted">
	<div class="container">
		
		<div class="page-header">
			<h1>Listagem de Monitorias</h1>
		</div>

		<div class="col-sm">
			<div class="page-header">
				<h2>Adicione uma atividade</h2>
			</div>
			<form action="addMonitoria.php" method="POST">
				<label class="form-control">
					Título da atividade:
					<input type="text" class="form-input" name="titulo" placeholder="Título da atividade...">
				</label>
				<label class="form-control">
					Descrição da atividade...
					<textarea class="form-input" name="descricao" placeholder="Descrição da atividade..."></textarea>
				</label>
				<label class="form-control">
					Data da atividade:
					<input type="date" name="data_monitoria" class="form-input">
				</label>
				<label class="form-control">
					Horário de início:
					<input type="time" name="hora_inicio" class="form-input">
				</label>
				<label class="form-control">
					Horário de término:
					<input type="time" name="hora_termino" class="form-input">
				</label>
				<button class="btn btn-danger" type="submit">Adicionar</button>
				<button class="btn btn-default" type="reset">Limpar</button>
			</form>
		</div>

		<div class="col-lg">
			
			<div>
				<div class="page-header">
					<h2>Suas monitorias</h2>
				</div>
				<div style="overflow: auto; min-height: 200px; max-height: 300px; padding: 10px;">
					<table>
						<tr>
							<th>Data</th>
							<th>Início / Término</th>
							<th>Título</th>
							<th>Descrição</th>
							<th>Opções</th>
						</tr>
						
						<?php foreach ($dataMonitor as $listaMonitor) : ?>
							<tr>
								<td><?= $listaMonitor['data_monitoria'] ?></td>
								<td><?= $listaMonitor['inicio_monitoria'] ?> - <?= $listaMonitor['termino_monitoria'] ?></td>
								<td><?= $listaMonitor['titulo_atividade'] ?></td>
								<td><?= $listaMonitor['descricao_atividade'] ?></td>
								<td>
									<a href="editAtividade.php?id=<?= $listaMonitor['id_monitoria'] ?>" class="link">Editar</a>
									<a href="mvRegistro.php?id=<?= $listaMonitor['id_monitoria'] ?>" class="link">Concluída</a>
								</td>
							</tr>
						<?php endforeach ?>
					</table>
				</div>
			</div>
			<br>
			<div>
				<div class="page-header">
					<h2>Atividades de seus monitores</h2>
				</div>
				<div style="overflow: auto; min-height: 200px; max-height: 300px; padding: 10px;">
					<table>
						<tr>
							<th>Data</th>
							<th>Início / Término</th>
							<th>Título</th>
							<th>Descrição</th>
							<th>Cadeira</th>
						</tr>
						<?php foreach ($dataMonitoria as $listaMonitoria): ?>
							<tr>
								<td><?= $listaMonitor['data_monitoria'] ?></td>
								<td><?= $listaMonitor['inicio_monitoria'] ?> - <?= $listaMonitor['termino_monitoria'] ?></td>
								<td><?= $listaMonitor['titulo_atividade'] ?></td>
								<td><?= $listaMonitor['descricao_atividade'] ?></td>
							</tr>
						<?php endforeach ?>
					</table>
				</div>
			</div>

		</div>

	</div>
</body>
</html>