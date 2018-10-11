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
if (isset($_SESSION['erroLogin'])) {
	echo $_SESSION['erroLogin'];	
}
if (isset($_SESSION['user'])) {
	header('location:home.php');
}
?>
		<form action="verifLogin.php" method="POST">
			<input type="text" placeholder="matricula" name="matricula" required>
			<input type="password" placeholder="senha" name="senha" required><br>
			<input type="submit" value="Login" id="sub">
		</form>
	</fieldset>
</body>
</html>