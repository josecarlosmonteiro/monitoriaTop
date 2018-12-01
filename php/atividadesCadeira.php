<?php 
include 'conn.php';
session_start();

if (!isset($_SESSION['matricula'])) {
	header('location: index.php');
}

$_SESSION['idCadeira'] = addslashes($_GET['cadeira']);

//query que exibe o nome da cadeira selecionada
$query_nome = $conn->prepare("SELECT nome_cadeira FROM disciplina WHERE id_disciplina = ?");
$query_nome->execute([$_SESSION['idCadeira']]);
$data_nome = $query_nome->fetchALL();

//query que exibe as monitorias
$query_monitoria = $conn->prepare("SELECT id_monitoria, matricula_monitor, titulo_atividade, descricao_atividade, inicio_monitoria, termino_monitoria, data_monitoria FROM monitoria WHERE id_disciplina_monitoria = ? AND status = 'agendada'");
$query_monitoria->execute([$_SESSION['idCadeira']]);
$data_monitoria = $query_monitoria->fetchALL();

//query responsavel por listar os monitores
$query_monitor = $conn->prepare("SELECT nome, email FROM aluno WHERE cadeira_monitoria = ?");
$query_monitor->execute([$data_nome[0]['nome_cadeira']]);
$data_monitor = $query_monitor->fetchALL();

 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Lista de Atividades</title>
	<link rel="stylesheet" type="text/css" href="../css/global.css">
	<?php	include "Menu2.php" ?>
</head>
<body>
	<br><br><Br>
	<div class="content">
		<h1><?= $data_nome[0]['nome_cadeira']?></h1>
		<?php if ($_SESSION['tipo'] == "monitor" && $_SESSION['cadeira_monitor'] == $data_nome[0]['nome_cadeira']): ?>
			<form action="addMonitoria.php" method="POST">
				Nome da atividade:
				<input type="text" name="titulo" placeholder="Nome da atividade">
				Data:
				<input type="date" name="data_monitoria">
				Hora de início:
				<input type="time" name="hora_inicio">
				Hora de término:
				<input type="time" name="hora_termino">
				Descrição:
				<input type="text" name="descricao">
				<input type="submit" value="Adicionar">
			</form>
		<?php endif ?>

		<fieldset class="fieldset-large">
			<table>
				<tr>
					<th>Atividade</th>
					<th>Data</th>
					<th>Início</th>
					<th>Término</th>
					<th>Descrição</th>
				</tr>
				<?php foreach ($data_monitoria as $monitoria) : ?>
					<tr>
						<td><?= $monitoria['titulo_atividade'] ?></td>
						<td><?= $monitoria['data_monitoria'] ?></td>
						<td><?= $monitoria['inicio_monitoria'] ?></td>
						<td><?= $monitoria['termino_monitoria'] ?></td>
						<td><?= $monitoria['descricao_atividade'] ?></td>
						<?php if ($monitoria['matricula_monitor'] == $_SESSION['matricula']) : ?>
							<td><a href="editAtividade.php?id=<?= $monitoria['id_monitoria'] ?>">Editar</a></td>
							<td><a href="mvRegistro.php?id=<?= $monitoria['id_monitoria'] ?>">marcar como realizada</a></td>
						<?php endif ?>
					</tr>
				<?php endforeach ?>
		
			</table>
		</fieldset>

		<fieldset>
			<h3>Monitor(es)</h3>
			<hr><br><br>
			<table>
				<th>Monitor</th>
				<th>Contato</th>
				<?php foreach ($data_monitor as $monitor) : ?>
					<tr>
						<td><?= $monitor['nome'] ?></td>
						<td><?= $monitor['email'] ?></td>
					</tr>
				<?php endforeach ?>
			</table>
		</fieldset>
	</div>
</body>
</html>