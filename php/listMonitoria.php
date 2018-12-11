<?php 
include 'conn.php';
session_start();

include 'Menu2.php';
if (!isset($_SESSION['matricula'])) {
	header('location: index.php');
}

$matricula = addslashes($_SESSION['matricula']);
$tipo = addslashes($_SESSION['tipo']);
$periodo = addslashes($_SESSION['periodo']);

$query = $conn->prepare("SELECT m.id_monitoria, m.data_monitoria, m.inicio_monitoria, m.termino_monitoria, m.descricao_atividade, m.titulo_atividade FROM monitoria m WHERE m.matricula_monitor = ? AND status = 'agendada' ORDER BY id_monitoria DESC");
$query->execute([$matricula]);

$dataMonitor = $query->fetchALL(PDO::FETCH_ASSOC);
echo json_decode($dataMonitor);
 ?>