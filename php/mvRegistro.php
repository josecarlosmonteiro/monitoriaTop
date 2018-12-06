<?php 
include 'conn.php';
session_start();

$id_monitoria = filter_input_array(INPUT_GET);
$matricula = addslashes($_SESSION['matricula']);

if (!isset($_SESSION['matricula'])) {
	header('location: home.php');
}

$query_select = $conn->prepare("SELECT matricula FROM aluno WHERE matricula = ?");
$query_select->execute([$matricula]);
$data_select = $query_select->fetchALL();

$query_up = $conn->prepare("UPDATE monitoria SET status = 'realizada' WHERE id_monitoria = ? AND matricula_monitor = ?");
$query_up->execute([$id_monitoria['id'], $matricula]);

header('location: monitorias.php');


 ?>