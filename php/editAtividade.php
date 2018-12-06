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
	</head>
	<body>
		<br><br><br><br><br>
		<form action="updateAtividades.php" method="post">
			<input type="text" placeholder="Nome da atividade" value="<?= $dadosForm['titulo_atividade']?>" name="Titulo">
			<input type="date" placeholder="Data" value="<?=$dadosForm ['data_monitoria']?>" name="Data">
			<input type="time" placeholder="Hora de inicio" value="<?=$dadosForm['inicio_monitoria']?>" name="Inicio">
			<input type="time" placeholder="Hora de termino" value="<?=$dadosForm['termino_monitoria']?>" name="Fim">
			<input type="text" placeholder="Descrição" value="<?=$dadosForm['descricao_atividade']?>" name="Descricao">
			<input type="submit" value="salvar">
		</form>		
	</body>
</html>