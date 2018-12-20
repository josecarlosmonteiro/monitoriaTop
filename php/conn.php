<?php
/*$dbname = "epiz_22976507_monitoriadigital";
$usuario="epiz_22976507";
$senha = "monitoriaTop69";*/
$dbname = "relatoriodigital";
$usuario = "root";
$senha = "edu";

try {
	$conn = new PDO("mysql:host=localhost;dbname=$dbname", $usuario, $senha);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
	echo 'ERROR: ' . $e->getMessage();
}

// try {
// 	$conn = new PDO("mysql:host=sql201.epizy.com;dbname=$dbname", $usuario, $senha);
// 	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch(PDOException $e) {
// 	echo 'ERROR: ' . $e->getMessage();
// }
?>