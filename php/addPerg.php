<?php 
include 'conn.php';
session_start();

try {
	$matricula = addslashes($_SESSION['matricula']);
	$data = filter_input_array(INPUT_POST);

	$query = $conn->prepare("INSERT INTO perguntas (perg_matricula, titulo, corpo) VALUES (?, ?, ?)");
	$query->execute([$matricula, $data['titulo'], $data['corpo']]);

	header('location: home.php');
} catch (Exception $e) {
	echo "ERRO: ", $e->getMessage();
}

 ?>