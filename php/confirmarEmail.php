<?php 
require_once 'conn.php';
session_start();
$erro = "Email não recebido";
if (!isset($_SESSION['recebido'])) {
	header('../index.php?error='.$erro);
}
$dados = filter_input_array(INPUT_GET,FILTER_DEFAULT);
$nome = $dados['nome'];

if (isset($dados['email'])) {
	$conn->query("UPDATE aluno SET status = '1' WHERE nome = '$nome'");
	header('location:emailConfirmado.php');
}else{
	header('../index.php?erro=Pan');
}


 ?>