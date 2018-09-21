<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../css/global.css">
	<link rel="stylesheet" href="../css/cadastro.css">
</head>
<body>
	<fieldset>
		<h3>Cadastro de Monitores</h3>
		<form action="addUser.php" method="POST">
			<input type="text" name="nome" placeholder="Nome" required>
			<input type="text" name="nome" placeholder="Matrícula" required>
			<input type="password" name="senha" placeholder="Senha" required>
			<input type="password" name="senha" placeholder="Confirmar Senha" required>
			<label>
				Curso: <select name="curso" required>
					<option></option>
					<option>IPI</option>
					<option>LOG</option>
				</select>
			</label><br>
			<label>
				Período(cursando): <select name="periodoCursando" required>
					<option></option>
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
				</select>
			</label>
			<label>
				Período(monitoria): <select name="periodoMonitoria">
					<option></option>
					<option>1</option>
					<option>2</option>
					<option>3</option>
				</select>
			</label>
			<input id="sub" type="submit" value="Cadastrar">
		</form>
	</fieldset>
</body>
</html>