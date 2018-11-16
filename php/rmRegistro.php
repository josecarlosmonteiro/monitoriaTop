<?php
include 'conn.php';
session_start();

if (!isset($_SESSION['matricula'])) {
	header('location: home.php');
}

$id = filter_input_array(INPUT_GET);
$matricula = addslashes($_SESSION['matricula']);

$query = $conn->prepare("DELETE FROM monitoria WHERE matricula_monitor = ? AND id_monitoria = ?");
$query->execute([$matricula, $id['id']]);

header('location: documentos.php');