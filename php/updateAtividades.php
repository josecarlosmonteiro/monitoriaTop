<?php
session_start();
require_once 'conn.php';
if (!isset($_SESSION['matricula'])) {
	header('location:../index.php');
}

$arrayDados = filter_input_array(INPUT_POST,FILTER_DEFAULT);
$id_monitoria = addslashes($_SESSION['monitor']);
$matricula = addslashes($_SESSION['matricula']);
$update = $conn->prepare("UPDATE monitoria SET titulo_atividade = ?,data_monitoria = ?,inicio_monitoria = ?,termino_monitoria = ?,descricao_atividade = ? WHERE id_monitoria = ? AND matricula_monitor = ?");
$update->execute([$arrayDados['Titulo'], $arrayDados['Data'], $arrayDados['Inicio'], $arrayDados['Fim'], $arrayDados['Descricao'], $id_monitoria, $matricula]);

?>