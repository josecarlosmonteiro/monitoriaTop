<?php
session_start();
include 'conn.php';

$matricula = strip_tags($_POST['matricula']);
$senha = addslashes(md5($_POST['senha']));
$status = 1;

$query = $conn->prepare("SELECT nome, sobrenome, curso, id_cadeira_monitoria_al, periodo, tipo, matricula, password FROM aluno WHERE matricula = ? AND password = ? AND status = ?");

$query->execute([$matricula, $senha, $status]);

$data = $query->fetchALL();

if (sizeof($data[0])>1) {
	$_SESSION['matricula'] = $matricula;
	$_SESSION['user'] = $data[0]['nome'];
	$_SESSION['curso'] = $data[0]['curso'];
	$_SESSION['periodo'] = $data[0]['periodo'];
	$_SESSION['tipo'] = $data[0]['tipo'];
	$_SESSION['matricula'] = $data[0]['matricula'];
	$_SESSION['sobrenome'] = $data[0]['sobrenome'];
	if ($_SESSION['tipo'] == "monitor") {
		$_SESSION['cadeira_monitor'] = $data[0]['id_cadeira_monitoria_al'];
	}
	header('location: home.php');
}else{
	$_SESSION['erroLogin'] = "Dados incorretos";
	header('location: ../index.php');
}