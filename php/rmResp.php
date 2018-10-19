<?php 
include 'conn.php';
session_start();

$id_rm = $_GET['id'];

$query = $conn->prepare("DELETE r.* FROM respostas r INNER JOIN aluno a WHERE a.matricula = ? AND r.id_resposta = ?");
$query->execute([$_SESSION['matricula'], $id_rm]);

header('location: perg.php?id='.$_SESSION['idperg']);
 ?>