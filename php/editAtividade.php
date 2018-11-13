<?php 
include 'conn.php';
session_start();
if (!isset($_SESSION ['matricula'])){
	header('location:../index.php');
}else{
	$matricula = addslashes($_SESSION['matricula']);
	$id_monitoria = $_GET['id'];
	$banco = $conn->prepare("SELECT titulo_atividade,data_monitoria,inicio_monitoria,termino_monitoria,descricao_atividade FROM monitoria WHERE id_monitoria = ? AND matricula_monitor = ?");
	$banco->execute([$id_monitoria, $matricula]);
	$dadosForm = $banco->fetch(PDO::FETCH_ASSOC);
}
 ?>
<html>
	<head>
	</head>
	<body>
		<form action="updateAtividades.php?id=<?= $id_monitoria?>" method="post">
			<input type="text" placeholder="Nome da atividade" value="<?= $dadosForm['titulo_atividade']?>" name="Titulo">
			<input type="date" placeholder="Data" value="<?=$dadosForm ['data_monitoria']?>" name="Data">
			<input type="time" placeholder="Hora de inicio" value="<?=$dadosForm['inicio_monitoria']?>" name="Inicio">
			<input type="time" placeholder="Hora de termino" value="<?=$dadosForm['termino_monitoria']?>" name="Fim">
			<input type="text" placeholder="Descrição" value="<?=$dadosForm['descricao_atividade']?>" name="Descricao">
			<input type="submit">
		</form>		
	</body>
</html>