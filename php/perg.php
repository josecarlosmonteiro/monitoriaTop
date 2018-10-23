<?php 
include 'conn.php';
session_start();

$_SESSION['idperg'] = $_GET['id'];

$query_perg = $conn->prepare("SELECT p.titulo,p.corpo, p.perg_matricula, a.nome, a.tipo, a.curso, a.periodo FROM perguntas p INNER JOIN aluno a ON p.perg_matricula = a.matricula WHERE p.id_pergunta = ?");
$query_perg->execute([$_SESSION['idperg']]);

$query_resp = $conn->prepare("SELECT r.text_resposta,r.id_resposta, r.resp_id_pergunta, r.resp_matricula, a.tipo, a.curso, a.nome FROM respostas r INNER JOIN aluno a ON r.resp_matricula = a.matricula WHERE r.resp_id_pergunta = ? ORDER BY r.id_resposta ASC");
$query_resp->execute([$_SESSION['idperg']]);


$data_perg = $query_perg->fetchALL();
$data_resp = $query_resp->fetchALL(); 

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/global.css">
	<?php include "menu.php" ?>
</head>
<body>
	<div class="content">
		<div class="card">
			<input type="hidden">
			<h3 id="topico"> <?= $data_perg[0]['titulo'] ?> - <?= $data_perg[0]['nome'] ?> ( <?=$data_perg[0]['tipo']?> <?= $data_perg[0]['curso'] ?> / <?= $data_perg[0]['periodo'] ?> ) </h3><br>
			<p><?= $data_perg[0]['corpo'] ?></p><br><hr><br>
			
		<?php foreach ($data_resp as $resp) { ?>	
			<div class="card">
				<p><span style="font-size: 18px; color: #ff3030;"><?= $resp['nome'] ?> (<?= $resp['tipo'] ?>):</span>
				<?= $resp['text_resposta'] ?></p><br>
				<?php if ($resp['resp_matricula'] == $_SESSION['matricula']) { ?>
					<a style="color: white; text-decoration: underline;" href="rmResp.php?id=<?= $resp['id_resposta'] ?>">remover</a>
				<?php } ?>
			</div>
		<?php }

			if (isset($_SESSION['matricula'])) { ?>
			<form action="addResp.php?id=<?= $_SESSION['idperg'] ?>" method="POST">
				<div class="resposta">
					<input type="text" name="resposta" required placeholder="Responder...">
					<input type="submit" value="&#10095;" id="btnResposta">
				</div>
			</form>
			<?php }else{
				echo "Faça login para responder perguntas.";
			} ?>
		</div>	
	</div>

	<div class="footer">
        <a href="#">Developers</p></a>
    </div>
</body>
</html>