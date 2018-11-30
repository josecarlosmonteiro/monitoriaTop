<?php
session_start();
require_once 'conn.php';

$nome = addslashes($_POST['nome']);
$sobrenome = addslashes($_POST['sobrenome']);
$matricula = addslashes($_POST['matricula']);
$tipo = addslashes($_POST['tipo']);
$curso_aluno = addslashes($_POST['curso_aluno']);
$monitoria_curso = addslashes($_POST['monitoria_curso']);
$senha = md5(addslashes($_POST['senha']));
$email = addslashes($_POST['email']);

var_dump($curso_aluno);


if ($monitoria_curso == "IPI") {
	$monitoria_cursoP = $_POST['monitor_disciplinaipi'];
}elseif ($monitoria_curso == "LOG") {
	$monitoria_cursoP = $_POST['monitor_disciplinalog'];
}else{
	$monitoria_cursoP = null;
}

if ($curso_aluno == "IPI") {
	$curso_periodo = $_POST['periodoCursandoipi'];
}elseif ($curso_aluno == "LOG") {
	$curso_periodo = $_POST['periodoCursandolog'];
}else{
	$curso_periodo = null;
}

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
			$aluno = $conn->prepare('INSERT INTO aluno (nome, sobrenome, matricula, tipo, curso, periodo, password, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
			$aluno->execute([$_POST['nome'], $_POST['sobrenome'], $_POST['matricula'], $_POST['tipo'], $curso, $_POST['periodoCursando'], $_POST['senha'], $_POST['email']]);
			$_SESSION['emailCadastrado'] = $_POST['email'];
		}else{
			$monitor = $conn->prepare("INSERT INTO aluno(nome, sobrenome, email, matricula, curso, periodo, tipo, curso_monitoria, cadeira_monitoria, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
			$monitor->execute([$nome, $sobrenome, $email, $matricula, $curso_aluno, $curso_periodo, $tipo, $monitoria_curso, $monitoria_cursoP, $senha]);
			
		}
	}
	$_SESSION['emailCadastrado'] = $email;
	$_SESSION['nomeCadastrado'] = $nome;
	header('location:email.php');
}
?>