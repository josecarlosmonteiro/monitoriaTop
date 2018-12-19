<?php 
	include 'conn.php';
	session_start();

	if (!isset($_SESSION['matricula'])) {
		header('location: home.php');
	}

	$_SESSION['idResp'] = addslashes($_GET['id']);


	$query_edit = $conn->prepare("SELECT id_resposta, resp_matricula, text_resposta FROM respostas WHERE id_resposta = ? AND resp_matricula = ?");
	$query_edit->execute([$_SESSION['idResp'], $_SESSION['matricula']]);

	$data_edit = $query_edit->fetchALL();
?>

 <!DOCTYPE html>
 <html lang="PT">
 <head>
 	<meta charset="UTF-8">
 	<title>Editar Resposta</title>
 	<link rel="stylesheet" type="text/css" href="../css/micro-bootstrap.css">
	<?php	include "Menu2.php"; ?>
 </head>
 <body class="">
	<div class="container">
	 		
	 	<div class="page-header">
	 		<h1>Editar resposta</h1>
	 	</div>
	 	<div class="col-lg bordered" style="text-align: left;">
	 		<h2>Edite seu comentário</h2>
		 <form action="upResp.php" method="POST">
		 	<label class="form-control">
			 	<input type="text" name="corpo" value="<?= $data_edit[0]['text_resposta'] ?>" class="form-input" >
		 	</label>
		 	<button type="submit" class="btn btn-danger">Editar</button>
		 	<button type="reset" class="btn btn-default">Limpar</button>
		 </form>
	 	</div>
 	</div>
 </body>
 </html>