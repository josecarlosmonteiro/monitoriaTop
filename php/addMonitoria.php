<?php 
include 'conn.php';
session_start();

$idCadeira = addslashes($_SESSION['cadeira_monitor']);
$matricula = addslashes($_SESSION['matricula']);

$data = filter_input_array(INPUT_POST);
$status = "agendada";

$query = $conn->prepare("INSERT INTO monitoria (id_disciplina_monitoria, matricula_monitor, titulo_atividade, descricao_atividade, inicio_monitoria, termino_monitoria, data_monitoria, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$query->execute([$idCadeira, $matricula, $data['titulo'], $data['descricao'], $data['hora_inicio'], $data['hora_termino'], $data['data_monitoria'], $status]);

header('location: monitorias.php');
 ?>