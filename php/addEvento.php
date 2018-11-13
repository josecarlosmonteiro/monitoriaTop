<?php
session_start();
include 'conn.php';
$data = filter_input_array(INPUT_POST,FILTER_DEFAULT);
$matricula = addslashes($_SESSION['matricula']);

var_dump($data);
$query = $conn->prepare("INSERT INTO monitoria (matricula_monitor, titulo_atividade, descricao_atividade, inicio_monitoria, termino_monitoria, data_monitoria, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
$query->bindParam(1, $matricula);
$query->bindParam(2, $data['tipo_atividade']);
$query->bindParam(3, $data['descricao']);
$query->bindParam(4, $data['hora_inicio']);
$query->bindParam(5, $data['hora_termino']);
$query->bindParam(6, $data['data_monitoria']);
$query->bindParam(7, "realizada");

header('location: documentos.php');