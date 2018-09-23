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
			<input type="password" name="senha" placeholder="Confirmar Senha" required><br>
			<label>
				Monitor: <select name="tipoMonitor">
					<option></option>
					<option>Bolsista</option>
					<option>Voluntário</option>
				</select>
			</label>
			<label>
				Curso: <select name="curso" required>
					<option></option>
					<option>IPI</option>
					<option>LOG</option>
				</select>
			</label><br>
			<label>
				Período(cursando):
				<input type="number" name="periodoCursando" required>
			</label>
			<label>
				Período(monitoria):
				<input type="number" name="periodoMonitoria" required>
			</label>
			<input id="sub" type="submit" value="Cadastrar">
		</form>
	</fieldset>
</body>
</html>