<?php 
include 'conn.php';
session_start();

$titulo = $_POST['titulo'];
$corpo = $_POST['corpo'];
$matricula = $_SESSION['matricula'];

$query = $conn->prepare("INSERT INTO perguntas (perg_matricula, titulo, corpo) VALUES (?, ?, ?)");
$query->execute([$matricula, $titulo, $corpo]);

header('location: forum.php');

 ?>