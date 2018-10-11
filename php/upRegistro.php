<?php 
session_start();
include 'conn.php';

//só não ta pegando por conta da variavel $id, o where não ta dandoo o select na linha do registro do useer.
// $id = $_SESSION['user'];
$data_monitoria = addslashes($_POST['data_monitoria']);
$hora_inicio = addslashes($_POST['hora_inicio']);
$hora_termino = addslashes($_POST['hora_termino']);
$tipo_atividade = addslashes($_POST['tipo_atividade']);
$descricao = addslashes($_POST['descricao']);

$query = $conn->prepare("UPDATE registro SET data_monitoria = ?, hora_inicio = ?, hora_termino = ?, tipo_atividade = ?, atividade = ? WHERE id_registro = ?");
$query->bindParam(1,$data_monitoria);
$query->bindParam(2,$hora_inicio);
$query->bindParam(3,$hora_termino);
$query->bindParam(4,$tipo_atividade);
$query->bindParam(5,$descricao);
$query->bindParam(6,$id);
$query->execute();


header('location: registros.php');
?>