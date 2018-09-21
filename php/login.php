<?php session_destroy();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../css/global.css">
	<link rel="stylesheet" href="../css/login.css">
	<title>Login - Relatório Digital</title>
</head>
<body>
	<fieldset>
		<h3>Relatório digital</h3>
		<h4>Login</h4>
		<form action="home.php" method="POST">
			<input type="text" placeholder="Matrícula" required>
			<input type="password" placeholder="Senha" required>
			Acesso: <select name="tipoLogin" required>
				<option></option>
				<option>Aluno</option>
				<option>Monitor</option>
			</select>
			<input type="submit" value="Login" id="sub">
		</form>
	</fieldset>
</body>
</html>