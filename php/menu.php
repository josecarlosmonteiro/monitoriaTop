<!DOCTYPE html>
<html lang="en">
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
			<a id="user" href="#"><?=$_SESSION['user']?>- CRS-1</a>
			<li><a href="#">Documentos</a></li>
			<li><a href="#">Atividades</a></li>
			<li><a href="#">Avisos</a></li>
			<li><a href="logout.php">Sair</a></li>
		</ul>
	</nav>
</body>
</html>
