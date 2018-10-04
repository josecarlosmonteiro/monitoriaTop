<?php
session_start();
include 'conn.php';
date_default_timezone_set('America/Sao_Paulo');
$date = date('d-m-Y H:i');

$query = $conn->prepare("INSERT INTO registro (matricula_rg, data_monitoria, hora_inicio, hora_termino, atividade, data_registro, tipo_atividade) VALUES (?, ?, ?, ?, ?, ?, ?)");
$query->execute([$_SESSION['matricula'], $_POST['data_monitoria'], $_POST['hora_inicio'], $_POST['hora_termino'], $_POST['descricao'], $date, $_POST['tipo_atividade']]);

header('location: registros.php');