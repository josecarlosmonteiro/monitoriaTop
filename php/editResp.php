<?php 
include 'conn.php';
session_start();

if (!isset($_SESSION['matricula'])) {
	header('location: home.php');
}

$_SESSION['idResp'] = $_GET['id'];


$query_edit = $conn->prepare("SELECT id_resposta, resp_matricula, text_resposta FROM respostas WHERE id_resposta = ? AND resp_matricula = ?");
$query_edit->execute([$_SESSION['idResp'], $_SESSION['matricula']]);

$data_edit = $query_edit->fetchALL();
 ?>

 <!DOCTYPE html>
 <html lang="PT">
 <head>
 	<meta charset="UTF-8">
 	<title>Editar Resposta</title>
 	<link rel="stylesheet" type="text/css" href="../css/global.css">
	<?php	include "menu.php" ?>
 </head>
 <body>
 <form action="upResp.php" method="POST">
 	<input type="text" name="corpo" value="<?= $data_edit[0]['text_resposta'] ?>">
 	<input type="submit" value="salvar">
 </form>
 </body>
 </html>