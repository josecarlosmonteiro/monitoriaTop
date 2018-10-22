<?php require_once 'conn.php' ?>
<form action="" method="POST">
	<input type="text" name="cadeira" placeholder="cadeira">
	<input type="text" name="curso" placeholder="curso">
	<input type="submit">
</form>
<?php 
	if (isset($_POST['cadeira'])) {
		$cadeira = $_POST['cadeira'];
		$curso = $_POST['curso'];
		$query = $conn->prepare('INSERT INTO cadeira (nome_cadeira, curso_cadeira) VALUES (?, ?)');
		$query->execute([$cadeira, $curso]);

	}
?>