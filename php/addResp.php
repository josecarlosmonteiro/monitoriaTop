<?php 
include 'conn.php';
session_start();

$

$query = $conn->prepare("INSERT INTO respostas (resp_id_pergunta, resp_nome, text_resposta) VALUES (?, ?, ?)");
$query->bindParam(1,)

 ?>