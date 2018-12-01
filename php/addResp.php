<?php 
include 'conn.php';
session_start();

$matricula = addslashes($_SESSION['matricula'])
$idperg = addslashes($_SESSION['idperg']);
$data = filter_input_array(INPUT_POST);

$query = $conn->prepare("INSERT INTO respostas (resp_id_pergunta, resp_matricula, text_resposta) VALUES (?, ?, ?)");
$query->execute([$idperg, $matricula, $data['resposta']]);

header('location: perg.php?id='.$_SESSION['idperg']);
 ?>