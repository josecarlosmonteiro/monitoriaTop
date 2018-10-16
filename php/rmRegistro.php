<?php
include 'conn.php';
session_start();

$query = $conn->prepare("DELETE registro.* FROM registro INNER JOIN aluno WHERE aluno.matricula = ? AND id_registro = ?");
$query->execute([$_SESSION['matricula'], $_GET['id']]);

header('location: registros.php');