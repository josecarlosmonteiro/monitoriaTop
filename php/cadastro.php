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
		<h3>Cadastro</h3>
		<form action="#" method="POST">
			<input type="text" name="nome" placeholder="Nome" required>
			<input type="text" name="nome" placeholder="Matrícula" required>
			<label>
				Curso: <select name="curso" required>
					<option></option>
					<option>IPI</option>
					<option>LOG</option>
				</select>
			</label><br>
			<label>
				Período: <select name="periodo" required>
					<option></option>
					<option>2</option>
					<option>3</option>
				</select>
			</label><br>
			<label>
				Cadeira: <select name="cadeira" required>
					<option></option>
					<option>###</option>
					<option>###</option>
					<option>###</option>
					<option>###</option>
					<option>###</option>
				</select>
			</label>
			<input id="sub" type="submit" value="Cadastrar">
		</form>
	</fieldset>
</body>
</html>