<?php 
session_start();
include 'conn.php';

$query_log = $conn->prepare("SELECT nome_cadeira FROM disciplina WHERE curso_cadeira = 'LOG' ORDER BY id_curso ASC");
$query_log->execute();

$query_ipi = $conn->prepare("SELECT nome_cadeira FROM disciplina WHERE curso_cadeira = 'IPI' ORDER BY id_curso ASC");
$query_ipi->execute();

$data_log = $query_log->fetchALL();
$data_ipi = $query_ipi->fetchALL();

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
						<option value="Aluno">Aluno</option>
						<option value="Monitor">Monitor</option>
					</select>
				</label>
			
				<label id="curso_m" style="display: none;">
					Curso (monitoria) <br> <select id="monitoria_curso" name="monitoria_curso" onchange="curso_monitoria()">
					<option value="">--</option>
					<option value="IPI">Informática para Internet</option>
					<option value="LOG">Logística</option>
					</select>
				</label>

				<label id="ipi_m" style="display: none;">
					Cadeira(monitoria) <br> <select name="monitor_disciplina">
						<option>--</option>
						<?php foreach ($data_ipi as $ipi) : ?>
							<option value="<?= $ipi['nome_cadeira'] ?>" ><?= $ipi['nome_cadeira'] ?></option>
						<?php endforeach ?>
					</select>
				</label>
				<label id="log_m" style="display: none;">
					Cadeira (monitoria) <br> <select name="monitor_disciplina">
						<option>--</option>
						<?php foreach ($data_log as $log) : ?>
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