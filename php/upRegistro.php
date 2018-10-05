<?php 
session_start();
include 'conn.php';

$id = (int) $_SESSION['id'];

$query = $conn->prepare("UPDATE registro SET data_monitoria = ?, hora_inicio = ?, hora_termino = ?, tipo_atividade = ?, atividade = ? WHERE id_registro = ?");
$query->execute([$_POST['data_monitoria'],$_POST['hora_inicio'] , $_POST['hora_termino'], $_POST['tipo_atividade'], $_POST['descricao'], $id]);

header('location: registros.php');
?>