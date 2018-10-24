<?php 
include 'conn.php';
session_start();

$id = $_GET['cadeira'];

//query que exibe o nome da cadeira selecionada
$query_nome = $conn->prepare("SELECT nome_cadeira FROM disciplina WHERE id_curso = ?");
$query_nome->execute([$id]);
$data_nome = $query_nome->fetchALL();

//query que exibe as monitorias
$query_monitoria = $conn->prepare("SELECT m.id_monitoria, m.matricula_monitor, m.titulo_atividade, m.descricao_atividade, m.inicio_monitoria, m.termino_monitoria, m.data_monitoria FROM monitoria m INNER JOIN disciplina d WHERE m.id_curso_monitoria = ? ORDER BY m.id_monitoria DESC");
$query_monitoria->execute([$id]);
$data_monitoria = $query_monitoria->fetchALL();

//query responsavel por listar os monitores
$query_monitor = $conn->prepare("SELECT a.nome, a.email FROM aluno a INNER JOIN monitoria m WHERE m.id_curso_monitoria = ? ORDER BY a.nome ASC");
$query_monitor->execute([$id]);
$data_monitor = $query_monitor->fetchALL();

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Lista de Atividades</title>
	<link rel="stylesheet" type="text/css" href="../css/global.css">
	<?php	include "menu.php" ?>
</head>
<body>

	<div class="content">
		<h1><?= $data_nome[0]['nome_cadeira']?></h1>

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
					</tr>
				<?php endforeach ?>
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
				<?php foreach ($data_monitor as $monitor) : ?>
					<tr>
						<td><?= $monitor['nome'] ?></td>
						<td><?= $monitor['email'] ?></td>
					</tr>
				<?php endforeach ?>
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