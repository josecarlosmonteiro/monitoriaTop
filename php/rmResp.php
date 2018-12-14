<?php 
include 'conn.php';
session_start();

$id_rm = addslashes($_GET['id']);
$matricula = addslashes($_SESSION['matricula']);

$queryDelete = $conn->prepare("DELETE FROM voto WHERE voto_matricula_aluno = ? AND voto_id_resposta = ?");
$queryDelete->execute([$matricula, $id_rm]);

$query = $conn->prepare("DELETE r.* FROM respostas r WHERE r.resp_matricula = ? AND r.id_resposta = ?");
$query->execute([$_SESSION['matricula'], $id_rm]);



header('location: perg.php?id='.$_SESSION['idperg']);
 ?>