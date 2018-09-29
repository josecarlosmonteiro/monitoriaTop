<?php
header('location: home.php');
	
$dbname = "id7135993_monitoria";
$usuario="id7135993_monitoriatop";
$senha = "monitoriatop";
try {
	$conn = new PDO("mysql:host=localhost;dbname=$dbname", $usuario, $senha);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
	echo 'ERROR: ' . $e->getMessage();
}
?>