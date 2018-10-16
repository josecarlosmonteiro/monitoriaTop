<?php 
include 'conn.php';
session_start();

$titulo = $_POST['titulo'];
$corpo = $_POST['corpo'];
$matricula = $_SESSION['matricula'];
$nome = $_SESSION['user'];


$query = $conn->prepare("INSERT INTO perguntas (perg_matricula, perg_nome, titulo, corpo) VALUES (?, ?, ?, ?)");
$query->bindParam(1, $matricula);
$query->bindParam(2, $nome);
$query->bindParam(3, $titulo);
$query->bindParam(4, $corpo);
$query->execute();

echo $titulo. PHP_EOL;
echo $corpo. PHP_EOL;
echo $matricula.PHP_EOL;
echo $nome;
// header('location: forum.php');

 ?>