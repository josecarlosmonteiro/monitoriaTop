<?php
session_start();
require_once 'conn.php';
if (!isset($_SESSION['matricula'])) {
	header('location:../index.php');
}else{

$arrayDados = filter_input_array(INPUT_POST,FILTER_DEFAULT);
$id_monitoria = $_GET['id'];
$update = $conn->prepare("UPDATE monitoria SET titulo_atividade = ?,data_monitoria = ?,inicio_monitoria = ?,termino_monitoria = ?,descricao_atividade = ? WHERE id_monitoria = ?");
$update->execute([$arrayDados['Titulo'],$arrayDados['Data'],$arrayDados['Inicio'],$arrayDados['Fim'],$arrayDados['Descricao'],$id_monitoria]);
header('location:atividadesCadeira.php?cadeira='.$_SESSION['idCadeira']);
} 

?>