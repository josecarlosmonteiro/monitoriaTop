<?php
session_start();
include 'conn.php';

$query = $conn->prepare("SELECT id_pergunta, perg_nome, titulo, corpo FROM perguntas ORDER BY id_pergunta DESC");
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
			<input type="hidden">
			<h3> <?= $forum['titulo'] ?> - <a href="#"><?= $forum['perg_nome'] ?> - IPI/1</a></h3>
			<hr>
			<p><?= $forum['corpo'] ?></p>
			<a href="#">Responder</a>

			<div class="resposta">
				<h3><a href="#">Fulano</a> - Monitor Lógica (IPI/2)</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum recusandae beatae in perspiciatis ratione minus iure eligendi!</p>
				<form action="addResp.php" method="POST">
					<input type="hidden" name="id" value="<?= $forum['id_pergunta'] ?>">
					<input type="text" placeholder="Digite uma resposta" name="resposta">
					<input type="submit" value="responder">
				</form>
			</div>
		</div>
		<?php echo $forum['id_pergunta']; 
		} ?>

		
	</div>
</body>
</html>