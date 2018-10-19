<?php session_start() ?>
<!DOCTYPE html>
<html lang="pt_BR">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../css/global.css">
	<title>Login - Monitoria Digital</title>
</head>
<body>
	<fieldset>
		<h3>Monitoria digital</h3>
		<h4>Login</h4>
<?php
if (isset($_SESSION['erroLogin'])) {
	echo $_SESSION['erroLogin'];	
}
if (isset($_SESSION['user'])) {
	header('location:home.php');
}
?>
		<form action="verifLogin.php" method="POST">
			<input id="inputAcess" type="text" placeholder="matricula" name="matricula" required>
			<input id="inputAcess" type="password" placeholder="senha" name="senha" required>
			<a id="links" href="cadastro.php">Cadastrar-se</a>
			<input class="btnSubmit" type="submit" value="Login" id="sub">
			<a class="btnSubmit" href="../">Retornar</a>
		</form>
	</fieldset>
</body>
</html>