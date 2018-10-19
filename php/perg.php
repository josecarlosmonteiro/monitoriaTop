<?php 
include 'conn.php';
session_start();

$_SESSION['idperg'] = $_GET['id'];

$query_perg = $conn->prepare("SELECT p.titulo,p.corpo, p.perg_matricula, a.nome, a.tipo, a.curso, a.periodo FROM perguntas p INNER JOIN aluno a ON p.perg_matricula = a.matricula WHERE p.id_pergunta = ?");
$query_perg->execute([$_SESSION['idperg']]);

$query_resp = $conn->prepare("SELECT r.text_resposta,r.id_resposta, r.resp_id_pergunta, r.resp_matricula, a.tipo, a.curso, a.nome FROM respostas r INNER JOIN aluno a ON r.resp_matricula = a.matricula WHERE r.resp_id_pergunta = ? ");
$query_resp->execute([$_SESSION['idperg']]);


$data_perg = $query_perg->fetchALL();
$data_resp = $query_resp->fetchALL(); 

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<style>
		body{
			background-color: #ddd;
			text-align: center;
		}
		.feed{
			width: 1080px;
			margin: auto;
			background-color: white;
			padding: 20px;
		}
		.notice{
			width: auto;
			max-width: 5000px;
			margin: 20px auto;
			text-align: left;
			border: 2px solid gray;
			border-radius: 8px;
			padding: 10px;
		}
		.resposta{
			width: 70%;
			margin: 15px;
		}
	</style>
</head>
<body>
	<div class="feed">
		<h1>Forum TOP</h1>
		<a href="forum.php">Voltar</a>
		<div class="notice">
			<input type="hidden">
			<h3> <?= $data_perg[0]['titulo'] ?> - <?= $data_perg[0]['nome'] ?> / <?=$data_perg[0]['tipo']?> - <?= $data_perg[0]['curso'] ?> / <?= $data_perg[0]['periodo'] ?></h3>
			<p><?= $data_perg[0]['corpo'] ?></p>
		<?php foreach ($data_resp as $resp) { ?>	
			<div class="resposta">
				<h4><?= $resp['nome'] ?> - <?= $resp['tipo'] ?> <?= $resp['curso'] ?> </h4>
				<p><?= $resp['text_resposta'] ?></p> <?php if ($resp['resp_matricula'] == $_SESSION['matricula']) { ?>
					<a href="rmResp.php?id=<?= $resp['id_resposta'] ?>">remover</a>
				<?php } ?>
		<?php }
				if (isset($_SESSION['matricula'])) { ?>
				<form action="addResp.php?id=<?= $_SESSION['idperg'] ?>" method="POST">
					<input required="" type="text" placeholder="Digite uma resposta" name="resposta">
					<input type="submit" value="responder">
				</form>
				<?php }else{
					echo "Faça login para responder perguntas.";
				} ?>

			</div>
		</div>
		
	</div>


</body>
</html>