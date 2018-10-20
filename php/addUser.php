<?php
session_start();
require_once 'conn.php';
if ($_POST['senha'] != $_POST['confirmSenha']) {
	header('location:cadastro.php');
	$_SESSION['nao'] = "Senhas não conferem, Por favor repita";
	$_SESSION['mt'] = $_POST['matricula'];
	$_SESSION['nm'] = $_POST['nome'];
	$_SESSION['sn'] = $_POST['sobrenome'];
}else{	
	$query = $conn->prepare('SELECT matricula FROM aluno WHERE matricula=?');
	$query->execute([$_POST['matricula']]);
	$data = $query->fetchAll();

if(sizeof($data)>=1){
	$_SESSION['erroMat'] = "Matrícula já cadastrada";
	$_SESSION['mt'] = $_POST['matricula'];
	$_SESSION['nm'] = $_POST['nome'];
	$_SESSION['sn'] = $_POST['sobrenome'];
	header('location: cadastro.php');

}else{
		if ($_POST['tipo']=="aluno") {
			$aluno = $conn->prepare('INSERT INTO aluno (nome, sobrenome, matricula, tipo, curso, periodo, password) VALUES (?, ?, ?, ?, ?, ?, ?)');
			$aluno->execute([$_POST['nome'], $_POST['sobrenome'], $_POST['matricula'], $_POST['tipo'], $_POST['curso'], $_POST['periodoCursando'], $_POST['senha']]);
			header('location:../index.php');
		}else{
			$monitor = $conn->prepare('INSERT INTO aluno (nome, sobrenome, matricula, tipo, curso, periodo, periodo_monitoria, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
			$monitor->execute([$_POST['nome'], $_POST['sobrenome'], $_POST['matricula'], $_POST['tipo'], $_POST['curso'], $_POST['periodoCursando'], $_POST['monitor_periodo'], $_POST['senha']]);
			header('location: ../index.php');
		}
	}
}
?>