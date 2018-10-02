<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../css/global.css">
	<link rel="stylesheet" href="../css/cadastro.css">

	<script type="text/javascript" src="../js/cadastro.js"></script>

</head>
<body>
	<fieldset>
		<h3>Cadastro de Alunos</h3>

			<?php if (isset($_SESSION['erroMat'])) {
				echo $_SESSION['erroMat'];
			}?>
		<form action="addUser.php" method="POST">
			<input type="text" name="nome" placeholder="Nome" required>
			<input type="text" name="sobrenome" placeholder="Sobrenome" required>
			<input type="text" name="matricula" placeholder="Matrícula" required>
			<br>
			<input type="password" name="senha" placeholder="Senha" required>
			<input type="password" name="confirmSenha" placeholder="Confirmar Senha" required>
			<br>
			<label>
				Curso: <br> <select name="curso" id="curso" onchange="cursoatual()" required >
					<option>--</option>
					<option value="IPI">IPI</option>
					<option value="LOG">LOG</option>
				</select>
			</label><br>
			<label name="periodoCursando" id="LOG" style="display: none">
				Período(cursando)<br> <select id="cursoLOG" name="periodoCursando" onchange="tipoAluno()">
					<option></option>
					<option>--</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
				</select>
			</label>

			<label id="IPI" style="display: none">
				Período(cursando)<br> <select id="cursoIPI" name="periodoCursando" onchange="tipoAluno()">
					<option></option>
					<option>--</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
				</select>
			</label>

			<label id="tipo" style="display: none">
				Oque você é: <br> <select id="tipoaluno" name="tipo" onchange="tipoAluno()">
					<option></option>
					<option >--</option>
					<option value="aluno">Aluno</option>
					<option value="monitor">Monitor</option>
				</select>
			</label>
		
			<label id="monitor" style="display: none">
					Período(Monitoria)<br> <select name="monitor_periodo">
					<option></option>
						<option>--</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<br>

					<input type="text" name="cadeira_monitor" placeholder="Digite a cadeira em que é monitor">
				</label>
				<br>

			</label>
		<input id="sub" type="submit" value="Cadastrar" style="display: none">

		</form>
	</fieldset>
</body>
</html>
<?php session_destroy(); ?>