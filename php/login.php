<?php session_start();
?>
<!DOCTYPE html>
<html lang="pt_BR">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../css/global.css">
	<link rel="stylesheet" href="../css/login.css">
	<title>Login - Monitoria Digital</title>
</head>
<body>
	<fieldset>
		<h3>Monitoria digital</h3>
		<h4>Login</h4>
<?php
if (isset($_SESSION['erro'])) {
	echo $_SESSION['erro'];	
}
?>
		<form action="verifLogin.php" method="POST">
			<input type="text" placeholder="matricula" name="matricula" required>
			<input type="password" placeholder="senha" name="senha" required><br>
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