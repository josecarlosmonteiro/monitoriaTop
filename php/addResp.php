<?php 
include 'conn.php';
session_start();

$text_resposta = $_POST['resposta'];

$query = $conn->prepare("INSERT INTO respostas (resp_id_pergunta, resp_matricula, text_resposta) VALUES (?, ?, ?)");
$query->execute([$_SESSION['idperg'], $_SESSION['matricula'], $text_resposta]);

header('location: perg.php?id='.$_SESSION['idperg']);
 ?>