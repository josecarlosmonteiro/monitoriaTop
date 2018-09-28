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
		<h3>Cadastro de Alunos</h3>
		<form action="addUser.php" method="POST">
			<input type="text" name="nome" placeholder="Nome" required>
			<input type="text" name="sobrenome" placeholder="Nome" required>
			<input type="text" name="matricula" placeholder="Matrícula" required>
			<input type="password" name="senha" placeholder="Senha" required>
			<input type="password" name="confirmSenha" placeholder="Confirmar Senha" required=""><br>
			<label>
				Curso: <select name="curso" id="curso" onchange="cursoatual()" required >
					<option></option>
					<option value="IPI">IPI</option>
					<option value="LOG">LOG</option>
				</select>
			</label><br>
			<label>
				Período(cursando) <select name="periodoCursando" required id="LOG" style="display: none">
					<option></option>
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
				</select>

				<select name="periodoCursando" required id="IPI" style="display: none">
					<option></option>
					<option>1</option>
					<option>2</option>
					<option>3</option>
				</select>
			</label>




			<input id="sub" type="submit" value="Cadastrar">
		</form>

	</fieldset>
	<script>
		// Função para definir a quantidade de periodos do curso
		function cursoatual(){
			curso = document.getElementById('curso').value;
			if (curso == "IPI") {
				document.getElementById(curso).style.display="block";
				document.getElementById("LOG").style.display="none";
			}else{
				document.getElementById(curso).style.display="block";
				document.getElementById("IPI").style.display="none";

			}
		}	


	</script>
</body>
</html>