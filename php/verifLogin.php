<?php
session_start();
include 'conn.php';

$matricula = $_POST['matricula'];
$senha = $_POST['senha'];

$query = $conn->prepare("SELECT monitor.nome, monitor.curso, monitor.periodo, monitor.tipo FROM monitor INNER JOIN senha ON monitor.matricula = senha.matricula_s WHERE monitor.matricula = ? AND senha.senha = ?");

$query->execute([$matricula, $senha]);

$data = $query->fetchALL();

if (sizeof($data[0])>1) {
	$_SESSION['user'] = $data[0]['nome'];
	$_SESSION['curso'] = $data[0]['curso'];
	$_SESSION['periodo'] = $data[0]['periodo'];
	$_SESSION['tipo'] = $data[0]['tipo'];
	header('location: home.php');

}else{
	$_SESSION['erro'] = "Dados incorretos";
	header('location: login.php');
}


// print_r($data);
// echo $data[0]['curso'];



//echo sizeof($row);
// $_SESSION['user'] = $row->nome;
// $_SESSION['curso'] = $row->curso;
// $_SESSION['periodo'] = $row->periodo;
// $_SESSION['tipo'] = $row->tipo;


/*
while ($row = $query->fetch(PDO::FETCH_OBJ)) {
	$_SESSION['user'] = $row->nome;
	$_SESSION['curso'] = $row->
}

// var_dump($row);






/*$matricula = mysqli_real_escape_string($conn, $_POST['matricula']);
$senha = mysqli_real_escape_string($conn, $_POST['senha']);

$query = "SELECT monitor.nome, monitor.curso FROM monitor INNER JOIN senha ON monitor.matricula = senha.matricula_s WHERE monitor.matricula = '{$matricula}' AND senha.senha = '$senha'";

$result = mysqli_query($conn, $query);

$row = mysqli_num_rows($result);

$dados = mysqli_fetch_assoc($result);

if ($row==1) {
	$_SESSION['user'] = $dados['nome'];
	$_SESSION['curso'] = $dados['curso'];
	header('location: home.php');
}else{
	$_SESSION['erro'] = "Dados incorretos";
	header('location: login.php');
}*/