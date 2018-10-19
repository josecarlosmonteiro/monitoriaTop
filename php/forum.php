<?php
session_start();
include 'conn.php';

$query = $conn->prepare("SELECT p.id_pergunta, p.titulo, a.nome, a.tipo, a.periodo, a.curso FROM perguntas p INNER JOIN aluno a ON a.matricula = p.perg_matricula ORDER BY p.id_pergunta DESC");
$query->execute();
$data = $query->fetchALL(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
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
		<h1>Feed de Dúvidas</h1>
		<a href="home.php">Inicio</a>
		<?php 
			if (isset($_SESSION['matricula'])) { ?>
				<form action="addPerg.php" method="POST">
					<input type="text" required name="titulo" placeholder="Digite o título da pergunta">
					<input type="text" required name="corpo" placeholder="Digite sua pergunta">
					<input type="submit" value="Enviar">
				</form>
			<?php 
				}else{
					echo "Faça login para realizar perguntas.";
				}
			 ?>	
		<?php foreach ($data as $forum) { ?>	
		<div class="notice">
			<a href="perg.php?id=<?= $forum['id_pergunta'] ?>"> <h3> <?= $forum['titulo'] ?> - <a href="#"><?= $forum['nome'] ?> (<?=$forum['tipo']?>) <?= $forum['curso'] ?>/<?= $forum['periodo'] ?></a></h3> </a>
		</div>
		<?php } ?>
	</div>
</body>
</html>