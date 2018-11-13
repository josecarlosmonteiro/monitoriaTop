<?php 
session_start();
include 'conn.php';
if (!isset($_SESSION['matricula'])) {
	header('location: index.php');
}
$_SESSION['id'] = addslashes($_GET['id']);

$query = $conn->prepare("SELECT registro.data_monitoria, registro.hora_inicio, registro.hora_termino, registro.atividade, registro.tipo_atividade FROM registro INNER JOIN aluno ON registro.matricula_rg = aluno.matricula WHERE registro.matricula_rg = ? AND registro.id_registro = ?");
$query->execute([$_SESSION['matricula'], $_GET['id']]);

$data = $query->fetchALL();

$data_monitoria = $data[0]['data_monitoria'];
$hora_inicio = $data[0]['hora_inicio'];
$hora_termino = $data[0]['hora_termino'];
$atividade = $data[0]['atividade'];
$tipo_atividade = $data[0]['tipo_atividade'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Editar Registros</title>
	<link rel="stylesheet" type="text/css" href="../CSS/global.css">
	<meta charset="utf-8">
</head>
<body>
	<fieldset>
		<form action="upRegistro.php" method="POST">
			Data da monitoria: <br> <input required type="date" name="data_monitoria" value="<?= $data_monitoria ?>"> <br>
			Hora de início:  <br> <input required type="time" name="hora_inicio" value="<?= $hora_inicio ?>"> <br>
			Hora de termino:  <br> <input required type="time" name="hora_termino" value="<?= $hora_termino ?>"> <br>
			Tipo da atividade (ex: reunião, aula, etc...): <input required type="text" name="tipo_atividade" value="<?= $tipo_atividade ?>"> <br>
			Descrição da atividade: <br> <input required type="text" name="descricao" value="<?= $atividade ?>"> <br>
			<input id="sub" type="submit" value="Salvar">
		</form>
	</fieldset>
</body>
</html>