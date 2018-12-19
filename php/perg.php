<?php 
include 'conn.php';
session_start();

if (!isset($_SESSION['matricula'])) {
	header('location: index.php');
}

$matricula = addslashes($_SESSION['matricula']);

$_SESSION['idperg'] = addslashes($_GET['id']);

$query_perg = $conn->prepare("SELECT p.titulo,p.corpo, p.perg_matricula,p.perg_hora, a.nome, a.tipo, a.curso, a.periodo FROM perguntas p INNER JOIN aluno a ON p.perg_matricula = a.matricula WHERE p.id_pergunta = ?");
$query_perg->execute([$_SESSION['idperg']]);


$query_resp = $conn->prepare("SELECT r.text_resposta, r.id_resposta, r.status, r.votos, r.resp_id_pergunta, r.resp_matricula, r.resp_hora, a.tipo, a.curso, a.nome FROM respostas r INNER JOIN aluno a ON r.resp_matricula = a.matricula WHERE r.resp_id_pergunta = ? AND r.status IS NULL OR r.status = 0 ORDER BY r.votos DESC");
$query_resp->execute([$_SESSION['idperg']]);


$query_resp_ok = $conn->prepare("SELECT r.text_resposta, r.id_resposta, r.status, r.votos, r.resp_id_pergunta, r.resp_matricula, r.resp_hora, a.tipo, a.curso, a.nome FROM respostas r INNER JOIN aluno a ON r.resp_matricula = a.matricula WHERE r.resp_id_pergunta = ? AND r.status IS NOT NULL AND r.status = 1 ORDER BY r.status DESC");
$query_resp_ok->execute([$_SESSION['idperg']]);

$data_perg = $query_perg->fetchALL(PDO::FETCH_ASSOC);
$data_resp = $query_resp->fetchALL(PDO::FETCH_ASSOC); 
$data_resp_ok = $query_resp_ok->fetchALL(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/micro-bootstrap.css">
	<?php include "Menu2.php" ?>
</head>
<body class="">
	<div class="container">
		<div class="page-header">
			<h1>Comentários</h1>
		</div>

		<div class="col-lg bordered">
			<div class="container">
				<div class="page-header">
					<h2><?= $data_perg[0]['titulo'] ?> - <?= $data_perg[0]['perg_hora'] ?></h2>				
				</div>
				<h3><?= $data_perg[0]['nome'] ?> - (<?=$data_perg[0]['tipo']?>)</h3>
				<p><?= $data_perg[0]['corpo'] ?></p>
			</div>
			<br><br><br><br>
			<div class="container" style="font-size: 14px;">
				<!-- Div de título do bloco -->
				<div class="page-header">
					<h2>Respostas</h2>
				</div>
				<br>
				<!-- Container contendo informação de quem respondeu, data e corpo do comentário -->
				<?php if (sizeof($data_resp_ok)>0): ?>
					<div class="col-lg bordered">
            			<div style=" width: 50px; margin: 0px 20px 0px 0px; text-align: center;">
					    	<div style="font-size: 16px;">
							<?php if ($data_resp_ok[0]['status'] == 1): ?>
							  <h2 style="margin-bottom: 10px;">&#9989;</h2>
							<?php else: ?>
								<br><br>
					    	<?php endif ?>
						    <h1><a href="addVoto.php?id=<?= $data_resp_ok[0]['id_resposta'] ?>" style="text-decoration: none;">&#9651;</a></h1>
						    <h4 style="text-align: center;"><?= $data_resp_ok[0]['votos'] ?></h4>
						    <h1><a href="rmVoto.php?id=<?= $data_resp_ok[0]['id_resposta'] ?>" style="text-decoration: none;">&#9661;</a></h1>
					    </div>

            		</div>
            		<div style="display: inline; width: 90%; display: none;">
							<?php if ($data_resp_ok[0]['resp_matricula'] == $_SESSION['matricula']) : ?>
								<h2><?= $data_resp_ok[0]['nome'] ?> - (<?= $data_resp_ok[0]['tipo'] ?>) - <?= $data_resp_ok[0]['resp_hora'] ?> <a style="color: white; text-decoration: underline; float: right; text-decoration: none; font-size: 26px;" href="rmResp.php?id=<?= $data_resp_ok[0]['id_resposta'] ?>">&#10005;</a> </h2>
							<?php endif ?>
							<br><br>
							<p style="margin-bottom: 15px;">
	              				<?= $data_resp_ok[0]['text_resposta'] ?>
	            			</p>
	            			<?php if ($data_perg[0]['perg_matricula'] == $matricula): ?>
								<a href="marcResp.php?id=<?= $data_resp_ok[0]['id_resposta'] ?>" class="btn btn-sucess" style="font-size: 11.9px" >Marcar como correta</a>
							<?php endif ?>
							<?php if ($data_resp_ok[0]['resp_matricula'] == $_SESSION['matricula']) : ?>
								<a href="editResp.php?id=<?=$data_resp_ok[0]['id_resposta']?>" class="btn btn-danger">editar</a>
							<?php endif ?>
            			</div>
					</div>
	        		<br>
				<?php endif ?>
				<?php foreach ($data_resp as $resp) : ?>
					<div class="col-lg bordered" style="margin-top: 15px; text-align: left;">
            			<div style="width: 60px; ">
					    	<div style="font-size: 16px; float: left; margin: 0px 20px 0px 0px; padding: 0px 10px 0px 0px; display: inline-block;">
								<?php if ($resp['status'] == 1): ?>
								 	<h2 style="margin-bottom: 10px;">&#9989;</h2>
								<?php else: ?>
									<br><br>
						    	<?php endif ?>
						    	<h1><a href="addVoto.php?id=<?= $resp['id_resposta'] ?>" style="text-decoration: none;">&#9651;</a></h1>
						    	<h4 style="text-align: center;"><?= $resp['votos'] ?></h4>
						    	<h1><a href="rmVoto.php?id=<?= $resp['id_resposta'] ?>" style="text-decoration: none;">&#9661;</a></h1>
					    	</div>
            			</div>
            			<div class="col-lg" style="text-align: left;">
							<h2><?= $resp['nome'] ?> - (<?= $resp['tipo'] ?>) - <?= $resp['resp_hora'] ?> <a style="color: white; text-decoration: underline; float: right; text-decoration: none; font-size: 26px;" href="rmResp.php?id=<?= $resp['id_resposta'] ?>">&#10005;</a></h2>
							<br><br>
							<p style="margin-bottom: 15px;">
	              				<?= $resp['text_resposta'] ?>
	            			</p>
	            			<?php if ($data_perg[0]['perg_matricula'] == $matricula): ?>
								<a href="marcResp.php?id=<?= $resp['id_resposta'] ?>" class="btn btn-success" style="font-size: 11.9px" >Marcar como correta</a>
							<?php endif ?>
							<?php if ($resp['resp_matricula'] == $_SESSION['matricula']) : ?>
								<a href="editResp.php?id=<?=$resp['id_resposta']?>" class="btn btn-danger">editar</a>
							<?php endif ?>
            			</div>
					</div>
          			<br>
				<?php endforeach ?>
			</div>
		</div>
			
		<div class="col-sm bordered">
			<h2 style="text-align: left;">Adicione um comentário</h2>
			<br><br>
			<form action="addResp.php?id=<?= $_SESSION['idperg'] ?>" method="POST">
				<label class="form-control">
					Digite um comentário:
					<textarea class="form-input" required name="resposta" placeholder="Deixe seu comentário..."></textarea>
				</label>
				<button type="submit" class="btn btn-success">Comentar</button>
				<button type="reset" class="btn btn-danger">Limpar</button>
			</form>
		</div>
	</div>

	<div class="footer">
	    <a href="#">Developers</p></a>
	  </div>
	<?php if (isset($_SESSION['erroVoto'])): ?>
		<script>alert('Você só pode votar 1 vez por pergunta')</script>
	<?php endif;

	unset($_SESSION['erroVoto']);
?>

</body>
</html>