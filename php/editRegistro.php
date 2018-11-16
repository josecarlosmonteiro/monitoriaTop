<?php 
session_start();
include 'conn.php';
if (!isset($_SESSION['matricula'])) {
	header('location: index.php');
}
$_SESSION['id'] = filter_input_array(INPUT_GET);
$matricula = addslashes($_SESSION['matricula']);

$query = $conn->prepare("SELECT m.titulo_atividade, m.descricao_atividade, m.inicio_monitoria, m.termino_monitoria, m.data_monitoria FROM monitoria m INNER JOIN aluno a ON m.matricula_monitor = a.matricula WHERE m.matricula_monitor = ? AND m.id_monitoria = ?");
$query->execute([$matricula, $_SESSION['id']['id']]);

$data = $query->fetchALL(PDO::FETCH_ASSOC);

$data_monitoria = $data[0]['data_monitoria'];
$hora_inicio = $data[0]['inicio_monitoria'];
$hora_termino = $data[0]['termino_monitoria'];
$descricao_atividade = $data[0]['descricao_atividade'];
$tipo_atividade = $data[0]['titulo_atividade'];

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
			Descrição da atividade: <br> <input required type="text" name="descricao" value="<?= $descricao_atividade ?>"> <br>
			<input id="sub" type="submit" value="Salvar">
		</form>
	</fieldset>
</body>
</html>