<?php 

include 'conn.php';
include 'Menu2.php';
session_start();
if (!isset($_SESSION ['matricula'])){
	header('location:../index.php');
}

$idMonitoria = filter_input_array(INPUT_GET);

$matricula = addslashes($_SESSION['matricula']);
$id_monitoria = filter_input_array(INPUT_GET,FILTER_DEFAULT);
$_SESSION['monitor'] = $id_monitoria['id'];
$banco = $conn->prepare("SELECT titulo_atividade,data_monitoria,inicio_monitoria,termino_monitoria,descricao_atividade FROM monitoria WHERE id_monitoria = ? AND matricula_monitor = ?");
$banco->execute([$id_monitoria['id'], $matricula]);
$dadosForm = $banco->fetch(PDO::FETCH_ASSOC);

?>
<html>
	<head>
		<link rel="stylesheet" href="../css/micro-bootstrap.css">
		<meta charset="utf-8">
	</head>
	<body class="inverted">
		<div class="container">
			<div class="page-header">
				<h1>Editar Monitoria</h1>
			</div>
			<div class="col-md bordered">
				<form action="updateAtividades.php" method="post">
					<label class="form-control">
						Título da atividade:
						<input type="text" placeholder="Nome da atividade" value="<?= $dadosForm['titulo_atividade']?>" name="Titulo" class="form-input">
					</label>
					<label class="form-control">
						Data:
						<input type="date" placeholder="Data" value="<?=$dadosForm ['data_monitoria']?>" name="Data" class="form-input">
					</label>
					<label class="form-control">
						Horário de início:
						<input type="time" placeholder="Hora de inicio" value="<?=$dadosForm['inicio_monitoria']?>" name="Inicio" class="form-input">
					</label>
					<label class="form-control">
						Horário de término:
						<input type="time" placeholder="Hora de termino" value="<?=$dadosForm['termino_monitoria']?>" name="Fim" class="form-input">
					</label>
					<label class="form-control">
						Descrição:
						<input type="text" placeholder="Descrição" value="<?=$dadosForm['descricao_atividade']?>" name="Descricao" class="form-input">
					</label>

						<button type="submit" class="btn btn-success">Salvar</button>
						<button type="reset" class="btn btn-danger">Limpar</button>
				</form>
			</div>
		</div>
	</body>
</html>