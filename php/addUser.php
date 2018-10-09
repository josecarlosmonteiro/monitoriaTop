<?php
session_start();
include 'conn.php';
if ($_POST['senha'] != $_POST['confirmSenha']) {
	header('location:cadastro.php');
	$_SESSION['nao'] = "Senhas não conferem, Por favor repita";
}else{	
	$query = $conn->prepare('SELECT matricula FROM aluno WHERE matricula=?');
	$query->execute([$_POST['matricula']]);
	$data = $query->fetchAll();

if(sizeof($data)>=1){
	$_SESSION['erroMat'] = "Matrícula já cadastrada";
	header('location: cadastro.php');

}else{
		if ($_POST['tipo']=="aluno") {
			$aluno = $conn->prepare('INSERT INTO aluno (nome, sobrenome, matricula, tipo, curso, periodo) VALUES (?, ?, ?, ?, ?, ?)');
			$aluno->execute([$_POST['nome'], $_POST['sobrenome'], $_POST['matricula'], $_POST['tipo'], $_POST['curso'], $_POST['periodoCursando']]);
			$senha = $conn->prepare('INSERT INTO senha (matricula_s, senha) VALUES (?, ?)');
			$senha->execute([$_POST['matricula'], $_POST['senha']]);
			// header('location: login.php');
		}else{
			$monitor = $conn->prepare('INSERT INTO aluno (nome, sobrenome, matricula, tipo, curso, periodo, periodo_monitoria) VALUES (?, ?, ?, ?, ?, ?, ?)');
			$monitor->execute([$_POST['nome'], $_POST['sobrenome'], $_POST['matricula'], $_POST['tipo'], $_POST['curso'], $_POST['periodoCursando'], $_POST['monitor_periodo']]);
			$senha = $conn->prepare('INSERT INTO senha (matricula_s, senha) VALUES (?, ?)');
			$senha->execute([$_POST['matricula'], $_POST['senha']]);
			// header('location: login.php');
		}
	}
}
?>