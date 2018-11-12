<?php 
include 'conn.php';
session_start();

$data = filter_input_array(INPUT_GET,FILTER_DEFAULT);
$matricula = addslashes($_SESSION['matricula']);


if (!isset($_SESSION['matricula'])) {
	header('location: home.php');
}

$queryResp = $conn->prepare("DELETE r.* FROM respostas r INNER JOIN perguntas p WHERE r.resp_id_pergunta = ? AND p.perg_matricula = ?");
$queryResp->execute([$data['id'], $matricula]);

$queryPerg = $conn->prepare("DELETE p.* FROM perguntas p INNER JOIN aluno a WHERE a.matricula = ? AND p.id_pergunta = ?");
$queryPerg->execute([$matricula, $data['id']]);

header('location: home.php');

 ?>