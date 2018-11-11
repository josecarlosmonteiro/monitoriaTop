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
			<label for="btnMenu" id="btnDrop" class="btn">&#9776;</label>
			<a id="user" href="#"><?=$_SESSION['user']?> - CRS-1</a>
			<li><a href="home.php">Início</a></li>

			<?php 
			if ($_SESSION['tipo'] == "monitor") : ?>
				<li><a href="documentos.php">Documentos</a></li>
			<?php endif ?>
				<li><a href="atividades.php">Atividades</a></li>
			<li><a href="logout.php">Sair</a></li>
		</ul>
	</nav>
</body>
</html>
