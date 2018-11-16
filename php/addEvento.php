<?php
session_start();
include 'conn.php';

if (!isset($_SESSION['matricula'])) {
	header('location: home.php');
}


$data = filter_input_array(INPUT_POST);
$matricula = addslashes($_SESSION['matricula']);
$text = "realizada";

$query = $conn->prepare("INSERT INTO monitoria (matricula_monitor, titulo_atividade, descricao_atividade, inicio_monitoria, termino_monitoria, data_monitoria, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
$query->bindParam(1, $matricula);
$query->bindParam(2, $data['tipo_atividade']);
$query->bindParam(3, $data['descricao']);
$query->bindParam(4, $data['hora_inicio']);
$query->bindParam(5, $data['hora_termino']);
$query->bindParam(6, $data['data_monitoria']);
$query->bindParam(7, $text);
$query->execute();

header('location: documentos.php');