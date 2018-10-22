<?php 
session_start();
include 'conn.php';

$query = $conn->prepare("SELECT nome_cadeira, curso_cadeira FROM cadeira ORDER BY id_curso ASC");
$query->execute();

$data = $query->fetchALL();

if (isset($_SESSION['nm'])) {
	$nomeForm = $_SESSION['nm'];
}else{
	$nomeForm = "";
}
if (isset($_SESSION['sn'])) {
	$sobreNomeForm = $_SESSION['sn'];
}else{
	$sobreNomeForm = "";
}
if (isset($_SESSION['mt'])) {
	$matForm = $_SESSION['mt'];
}else{
	$matForm = "";
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Teste</title>
	<link rel="stylesheet" href="../css/global.css">
	<link rel="stylesheet" href="../css/cadastro.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
	<script type="text/javascript" src="../js/cadastro.js"></script>

</head>
<body>
	<fieldset>
		<h3>Cadastro de Alunos</h3>

			<?php if (isset($_SESSION['erroMat'])) {
				echo $_SESSION['erroMat'];
			}?>
		<form action="addUser.php" method="POST" name="cadastro">
			<input id="inputAcess" type="text" name="nome" placeholder="Nome" required value="<?= $nomeForm; ?>">
 			<input id="inputAcess" type="text" name="sobrenome" placeholder="Sobrenome" required value="<?= $sobreNomeForm; ?>">
			<input id="inputAcess" type="text" name="matricula" placeholder="Matrícula" required value="<?= $matForm; ?>">
			<?php 
			if (isset($_SESSION['nao'])) {
					echo "<br><br><font color=red><h3 class= 'animated shake' >".$_SESSION['nao']."</h3></font>";
			}

			 ?>
			<input id="inputAcess" type="password" name="senha" placeholder="Senha"  required="">
			<input id="inputAcess" type="password" name="confirmSenha" placeholder="Confirmar Senha" required="">
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
					Qual o seu papel? <br> <select id="tipoaluno" name="tipo" onchange="tipoAluno()">
						<option></option>
						<option >--</option>
						<option value="aluno">Aluno</option>
						<option value="monitor">Monitor</option>
					</select>
				</label>
			
				<label id="monitor" style="display: none">
						Curso(monitoria)<br> <select name="monitor_periodo">
						<option></option>
							<option>--</option>
							<option value="IPI">Informática para Internet</option>
							<option value="LOG">Logistica</option>
							<br>
						</select>

				</label>
				<label id="monitor_ipi" style="display: block;">
					Cadeira(monitoria) <br> <select name="monitor_ipi">
						<option>--</option>
						<?php foreach ($data as $ipi) : ?>
							<option value="" ><?= $ipi['nome_cadeira'] ?></option>
						<?php endforeach ?>
				</select>
				<label id="monitor_log" style="display: block;">
					Cadeira (monitoria) <br> <select name="monitor_log">
						<option>--</option>
						<?php foreach ($data_LOG as $log) : ?>
							<option value="<?= $log['nome_cadeira'] ?>"><?= $log['nome_cadeira'] ?></option>
						<?php endforeach ?>
						<option></option>
					</select>
					
				</label>
				
			</label>

				<br>
			</label>
		<input class="btnSubmit" id="sub" type="submit" value="Cadastrar" style="display: none">

		</form>
		<a class="btnSubmit" href="../">Retornar</a>
	</fieldset>
</body>
</html>
<?php session_destroy(); ?>