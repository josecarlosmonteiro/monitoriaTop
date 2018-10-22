<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="../css/menu.css">
</head>
<body>
	<nav class="menu">
		<ul>
			<input type="checkbox" id="btnMenu" style="display: none;">
			<label for="btnMenu" id="btn">&#9776;</label>
			<a id="user" href="#"><?=$_SESSION['user']?> - CRS-1</a>
			<li><a href="../index.php">Início</a></li>

			<?php 
			if ($_SESSION['tipo'] == "monitor") : ?>
				<li><a href="#">Documentos</a></li>
			<?php endif ?>
<<<<<<< HEAD
			<li><a href="tabelaM.php">Monitores</a></li>
			<li><a href="#">Avisos</a></li>
=======
				<li><a href="#">Atividades</a></li>
>>>>>>> 726969ac23e9a751ea36743db70fae8d9c2e82ca
			<li><a href="logout.php">Sair</a></li>
		</ul>
	</nav>
</body>
</html>
