<?php
session_start();
include 'conn.php';

$_SESSION['matricula'] = $_POST['matricula'];
$senha = $_POST['senha'];

$query = $conn->prepare("SELECT aluno.nome, aluno.curso, aluno.periodo, aluno.tipo, aluno.matricula FROM aluno INNER JOIN senha ON aluno.matricula = senha.matricula_s WHERE aluno.matricula = ? AND senha.senha = ?");

$query->execute([$_SESSION['matricula'], $senha]);

$data = $query->fetchALL();

if (sizeof($data[0])>1) {
	$_SESSION['user'] = $data[0]['nome'];
	$_SESSION['curso'] = $data[0]['curso'];
	$_SESSION['periodo'] = $data[0]['periodo'];
	$_SESSION['tipo'] = $data[0]['tipo'];
	$_SESSION['matricula'] = $data[0]['matricula'];
	header('location: home.php');
}else{
	$_SESSION['erroLogin'] = "Dados incorretos";
	header('location: login.php');
}