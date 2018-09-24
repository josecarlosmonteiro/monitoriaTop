<?php
session_start();
include 'conn.php';

$matricula = mysqli_real_escape_string($conn, $_POST['matricula']);
$senha = mysqli_real_escape_string($conn, $_POST['senha']);

$query = "SELECT monitor.nome, monitor.curso FROM monitor INNER JOIN senha ON monitor.matricula = senha.matricula_s WHERE monitor.matricula = '{$matricula}' AND senha.senha = '$pw'";

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
}