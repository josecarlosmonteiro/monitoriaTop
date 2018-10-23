<?php
session_start();
require_once 'conn.php';

if ($_POST['monitoria_curso'] == "IPI") {
	$monitoria_curso = $_POST['monitor_disciplinaipi'];
}elseif ($_POST['monitoria_curso'] == "LOG") {
	$monitoria_curso = $_POST['monitoria_disciplinalog'];
}else{
	$monitoria_curso = null;
}

if ($_POST['curso_aluno'] == "IPI") {
	$curso = $_POST['periodoCursandoipi'];
}elseif ($_POST['curso_aluno'] == "LOG") {
	$curso = $_POST['periodoCursandolog'];
}else{
	$curso = null;
}

/*if ($_POST['senha'] != $_POST['confirmSenha']) {
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
			$aluno = $conn->prepare('INSERT INTO aluno (nome, sobrenome, matricula, tipo, curso, periodo, password, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
			$aluno->execute([$_POST['nome'], $_POST['sobrenome'], $_POST['matricula'], $_POST['tipo'], $curso, $_POST['periodoCursando'], $_POST['senha'], $_POST['email']]);
			header('location:../index.php');
		}else{
			$monitor = $conn->prepare('INSERT INTO aluno (nome, sobrenome, matricula, tipo, curso, periodo, curso_monitoria, password, cadeira_monitoria, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
			$monitor->execute([$_POST['nome'], $_POST['sobrenome'], $_POST['matricula'], $_POST['tipo'], $curso, $_POST['periodoCursando'], $_POST['monitoria_curso'], $_POST['senha'], $monitoria_curso, $_POST['email']]);
			header('location: ../index.php');
		}
	}
}
?>