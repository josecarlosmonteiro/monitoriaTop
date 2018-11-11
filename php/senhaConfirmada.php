<?php 
require_once 'conn.php';
session_start();
 if ($_SESSION['ativo'] == false){
	header('location:senhaForm.php');
}
$senhas = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if($senhas['senha'] == $senhas['senhaConfirm']) {
	$matricula = $_SESSION['mat'];
	$senhaFim = md5($senhas['senha']);
	$conn->query("UPDATE aluno SET password = '$senhaFim' WHERE matricula = '$matricula'");
	header('location:senhaMudada.php');
}else{
	header('location:alterarSenha.php?m='.md5($_SESSION['mat'])."&&"."error=2");
}


 ?>