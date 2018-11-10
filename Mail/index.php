<html>
	<body>
		<form action="../php/email.php" method="post">
			<input type="text" name="nome">
			<input type="email" name="email">
			<input type="submit">
		</form>
	</body>
<? echo $_GET['email']; ?>
</html>