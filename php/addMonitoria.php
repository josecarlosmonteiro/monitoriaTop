<?php 
include 'conn.php';
session_start();

$idCadeira = $_SESSION['idCadeira'];
$matricula = $_SESSION['matricula'];
$titulo = $_POST['titulo'];
$data = $_POST['data_monitoria'];
$hora_inicio = $_POST['hora_inicio'];
$hora_termino = $_POST['hora_termino'];
$descricao = $_POST['descricao'];
$status = "agendada";

$query = $conn->prepare("INSERT INTO monitoria (id_curso_monitoria, matricula_monitor, titulo_atividade, descricao_atividade, inicio_monitoria, termino_monitoria, data_monitoria, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$query->execute([$idCadeira, $matricula, $titulo, $descricao, $hora_inicio, $hora_termino, $data, $status]);

header('location: atividadesCadeira.php?cadeira='.$idCadeira);
 ?>