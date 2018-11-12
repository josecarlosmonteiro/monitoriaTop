<?php
include 'conn.php';
session_start();

if (!isset($_SESSION['matricula'])) {
	header('location: home.php');
}

$query = $conn->prepare("DELETE r.* FROM registro r INNER JOIN aluno WHERE aluno.matricula = ? AND id_registro = ?");
$query->execute([$_SESSION['matricula'], $_GET['id']]);

header('location: documentos.php');