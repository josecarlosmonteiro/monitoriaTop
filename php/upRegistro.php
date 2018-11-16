<?php 
session_start();
include 'conn.php';

if (!isset($_SESSION['matricula'])) {
	header('location: home.php');
}

$data_form = filter_input_array(INPUT_POST);
$matricula = addslashes($_SESSION['matricula']);

$id = addslashes($_SESSION['id']['id']);
$matricula = addslashes($_SESSION['matricula']);
$data_monitoria = $data_form['data_monitoria'];
$hora_inicio = $data_form['hora_inicio'];
$hora_termino = $data_form['hora_termino'];
$tipo_atividade = $data_form['tipo_atividade'];
$descricao = $data_form['descricao'];

$query = $conn->prepare("UPDATE monitoria SET data_monitoria = ?, inicio_monitoria = ?, termino_monitoria = ?, titulo_atividade = ?, descricao_atividade = ? WHERE id_monitoria = ? AND matricula_monitor = ?");
$query->bindParam(1,$data_monitoria);
$query->bindParam(2,$hora_inicio);
$query->bindParam(3,$hora_termino);
$query->bindParam(4,$tipo_atividade);
$query->bindParam(5,$descricao);
$query->bindParam(6,$id);
$query->bindParam(7,$matricula);
$query->execute();


header('location: documentos.php');
?>