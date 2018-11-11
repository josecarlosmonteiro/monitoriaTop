<?php
session_start();
include 'conn.php';

$query = $conn->prepare("INSERT INTO registro (matricula_rg, data_monitoria, hora_inicio, hora_termino, atividade, tipo_atividade) VALUES (?, ?, ?, ?, ?, ?)");
$query->execute([$_SESSION['matricula'], $_POST['data_monitoria'], $_POST['hora_inicio'], $_POST['hora_termino'], $_POST['descricao'], $_POST['tipo_atividade']]);

header('location: documentos.php');