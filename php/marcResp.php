<?php 
include 'conn.php';
session_start();
if (!isset($_SESSION['matricula'])) {
	header('location: index.php');
}

$data = filter_input_array(INPUT_GET);
$perg = addslashes($_SESSION['idperg']);

$queryRespI = $conn->prepare("UPDATE respostas SET status = 0 WHERE resp_id_pergunta = ?");
$queryRespI->execute([$perg]);

$queryRespC = $conn->prepare("UPDATE respostas SET status = 1 WHERE id_resposta = ? AND resp_id_pergunta = ?");
$queryRespC->execute([$data['id'], $perg]);

header('location: perg.php?id='.$perg);
 ?>