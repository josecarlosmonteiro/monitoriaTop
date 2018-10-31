<?php 
include 'conn.php';
session_start();

$corpo = strip_tags($_POST['corpo'],);

$query = $conn->prepare("UPDATE respostas SET text_resposta = ? WHERE id_resposta = ? AND resp_matricula = ?");
$query->execute([$corpo ,$_SESSION['idResp'], $_SESSION['matricula']]);

header('location: perg.php?id='.$_SESSION['idperg']);
?>