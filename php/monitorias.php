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



$queryMonitoria = $conn->prepare("SELECT m.data_monitoria, m.inicio_monitoria, m.termino_monitoria, m.descricao_atividade, m.titulo_atividade FROM monitoria m INNER JOIN disciplina d ON m.id_disciplina_monitoria = d.id_disciplina INNER JOIN aluno a ON a.periodo = d.periodo_cadeira WHERE a.periodo = ? AND m.status = 'agendada' ORDER BY m.id_monitoria DESC");
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
	<script src="../js/jquery-3.3.1.min.js"></script>
</head>
<body class="">
	<div class="container">
		<?php if ($tipo == "monitor"): ?>
				<div class="page-header">
					<h1>Listagem de Monitorias</h1>
				</div>

				<div class="col-sm bordered" style="padding: 25px;">
					<div class="page-header">
						<h2>Adicione uma atividade</h2>
					</div>
					<form action="addMonitoria.php" method="POST" id="add_monitoria">
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
						<button class="btn btn-success" type="submit" >Adicionar</button>
						<button class="btn btn-danger" type="reset">Limpar</button>
					</form>
				</div>

				<div class="col-md bordered" style="padding: 25px 40px;">
					
					<div>
						<div class="page-header">
							<h2>Suas monitorias</h2>
						</div>
						<div style="overflow: auto; min-height: 200px; max-height: 300px; padding: 10px;">
							<table width="100%">
								<tr>
									<th>Data</th>
									<th>Início / Término</th>
									<th>Título</th>
									<th>Descrição</th>
									<th>Opções</th>
								</tr>
								<tbody id="listagem">
									
								</tbody>

							</table>
						</div>
					</div>
		<?php endif ?>
			<br>
			<div class="" style="padding: 10px 30px;">
				<div class="page-header">
					<h2>Atividades de seus monitores</h2>
				</div>
				<div class="bordered" style="overflow: auto; min-height: 200px; max-height: 300px; padding: 10px;">
					<table width="100%">
						<tr>
							<th>Data</th>
							<th>Início / Término</th>
							<th>Título</th>
							<th>Descrição</th>
							<th>Cadeira</th>
						</tr>
						<?php foreach ($dataMonitoria as $listaMonitoria): ?>
							<tr>
								<td><?= $listaMonitoria['data_monitoria'] ?></td>
								<td><?= $listaMonitoria['inicio_monitoria'] ?> - <?= $listaMonitoria['termino_monitoria'] ?></td>
								<td><?= $listaMonitoria['titulo_atividade'] ?></td>
								<td><?= $listaMonitoria['descricao_atividade'] ?></td>
							</tr>
						<?php endforeach ?>
					</table>
				</div>
			</div>

		</div>

	</div>
	<script>
		function addMonitoria(){
			$('#add_monitoria').on('submit', function(e){
				e.preventDefault();
				$.ajax({
					type: "POST",
					url: $(this).attr('action'),
					data: $(this).serialize(),
					success: function(row){
						$('#add_monitoria').trigger("reset");
						alert("Monitoria agendada com sucesso");
						listagemMonitoria();
					}
				});
			});
		};

		function listagemMonitoria(){
			$(document).ready(function() {
				$('#listagem').empty();
				$.ajax({
					type: 'POST',
					dataType: 'json',
					url: 'listMonitoria.php',
					success: function(dados){
						for (var i = 0; dados.length>i; i++) {
							$('#listagem').append(`
								<tr>
									<td>
										${dados[i].data_monitoria}
									</td>
									<td>
										${dados[i].inicio_monitoria}-${dados[i].termino_monitoria}
									</td>
									<td>
										${dados[i].titulo_atividade}</td>
									<td>
										${dados[i].descricao_atividade}
									</td>
									<td>
										<a href="mvRegistro.php?id=${dados[i].id_monitoria}" style="margin: 5px 2px; padding: 5px; font-size: 26px; text-decoration: none;">&#10003;</a>
										<a href="editAtividade.php?id=<?= $listaMonitor['id_monitoria'] ?>" style="margin: 5px 2px; padding: 5px; font-size: 26px; text-decoration: none;">&#9998;</a>

									</td>
									</tr>
							`);
						}
					}
				});
			});
		}
		listagemMonitoria();
		addMonitoria();
	</script>

</body>
</html>