<?php 
include 'conn.php';
session_start();

$matricula = addslashes($_SESSION['matricula']);
if (!isset($matricula)) {
	header('location: ../index.php');
}

$dataGet = filter_input_array(INPUT_GET);
$idPerg = addslashes($_SESSION['idperg']);

$queryVerif = $conn->prepare("SELECT id_voto FROM voto WHERE voto_id_pergunta = ? AND voto_matricula_aluno = ?");
$queryVerif->execute([$idPerg, $matricula]);

$dataSelect = $queryVerif->fetchALL(PDO::FETCH_ASSOC);
$sizeVotos = sizeof($dataSelect);

if (sizeof($dataSelect) == 0) {

	$queryResp = $conn->prepare("SELECT votos FROM respostas WHERE id_resposta = ? AND resp_matricula = ? AND resp_id_pergunta = ?");
	$queryResp->execute([$dataGet['id'], $matricula, $idPerg]);
	$dataResp = $queryResp->fetchALL(PDO::FETCH_ASSOC);

	$dataResp[0]['votos'] += 1;

	$queryInsert_votos = $conn->prepare("INSERT INTO voto (voto_id_pergunta, voto_id_resposta, voto_matricula_aluno) VALUES (?, ?, ?)");
	$queryInsert_votos->execute([$idPerg, $dataGet['id'], $matricula]);

	$queryInsert_respostas = $conn->prepare("UPDATE respostas SET votos = ? WHERE id_resposta = ? AND resp_matricula = ? AND resp_id_pergunta = ?");
	$queryInsert_respostas->execute([$dataResp[0]['votos'], $dataGet['id'], $matricula, $idPerg]);

}else{
	$_SESSION['erroVoto'] = "	";
}

header('location: perg.php?id='.$idPerg);
?>