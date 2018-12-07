<?php 
session_start();
include 'conn.php';

$query_log = $conn->prepare("SELECT id_disciplina, nome_cadeira FROM disciplina WHERE curso_cadeira = 'LOG' ORDER BY id_disciplina ASC");
$query_log->execute();

$query_ipi = $conn->prepare("SELECT id_disciplina, nome_cadeira FROM disciplina WHERE curso_cadeira = 'IPI' ORDER BY id_disciplina ASC");
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
	<title>Cadastro</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/micro-bootstrap.css">
	<script type="text/javascript" src="../js/cadastro.js"></script>
</head>
<body class="inverted">
	
	<div class="container">

		<div class="page-header">
			<h1>Cadastro</h1>
		</div>

		<form action="addUser.php" method="POST" name="cadastro">
			<div class="col-sm">
					<div class="page-header">
						<h2>Dados pessoais</h2>
					</div>

					<label class="form-control">
						Nome:
						<input type="text" required name="nome" class="form-input" placeholder="Nome">
					</label>
					<label class="form-control">
						Sobrenome:
						<input type="text" required class="form-input" placeholder="Sobrenome" name="sobrenome">
					</label>

					<div class="page-header">
						<h2>Dados da conta</h2>
					</div>

					<label class="form-control">
						E-mail:
						<input type="email" required class="form-input" placeholder="user@mail.com" name="email">
					</label>
					<label class="form-control">
						Senha:
						<input type="password" required class="form-input" minlength="8" title="Mínino 8 caracteres" placeholder="Senha" name="senha">
					</label>
					<label class="form-control">
						Repita a senha:
						<input type="password" required class="form-input" minlength="8" placeholder="Repita a senha" name="confirmSenha">
					</label>
			</div>

			<div class="col-md">
				<div class="page-header">
					<h2>Dados do aluno</h2>
				</div>

				<label class="form-control">
					Matrícula:
					<input type="text" required class="form-input" placeholder="201XXXinfig0000" name="matricula">
				</label>
				<label class="form-control">
					Seu papel:
					<select class="form-input" name="tipo">
						<option>--</option>
						<option value="Monitor">monitor</option>
						<option value="Aluno">aluno</option>
					</select>
				</label>
              	<label class="form-control">
                  Curso:
                  <select class="form-input" name="curso_aluno">
                    <option>--</option>
                    <option value="IPI">IPI</option>
                    <option value="LOG">LOG</option>
                  </select>
              	</label>
				<label class="form-control">
					Período que está cursando:
					<select class="form-input" name="periodo_cursando" >
						<option> -- </option>
						<?php for ($i=1; $i <= 6; $i++) : ?> 
							<option value="<?= $i ?>"><?= $i ?></option>
					<?php	endfor ?>
					</select>
				</label>
          </div>
          <div class="col-sm">
            <div class="page-header">
					<h2>Área do monitor</h2>
				</div>
				<label class="form-control">
					<div id="ipi_m">
						Curso que é monitor:<br>
						<select name="monitoria_curso" class="form-input">
							<option>--</option>
							<option value="IPI" >IPI</option>
							<option value="LOG" >LOG</option>
						</select>
					</div><div id="ipi_m">
						Cadeira que é monitor:<br>
                      	IPI:
						<select name="monitor_disciplinaipi" class="form-input">
							<option>--</option>
							<?php foreach ($data_ipi as $ipi) : ?>
								<option value="<?= $ipi['id_disciplina'] ?>" ><?= $ipi['nome_cadeira'] ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div id="log_m">
                      	LOG:
						<select name="monitor_disciplinalog" class="form-input">
							<option>--</option>
							<?php foreach ($data_log as $log) : ?>
								<option value="<?= $log['id_disciplina'] ?>"><?= $log['nome_cadeira'] ?></option>
							<?php endforeach ?>
							<option></option>
						</select>
					</div>
				</label>

				<button type="reset" class="btn btn-default">Limpar</button>
				<button type="submit" class="btn btn-danger">Cadastrar</button>
			</div>
          </div>
		</form>
	</div><br>
  	<div class='container'>
      <div class="col-lg">
			<div class="page-header">
				<h2>Observações</h2>
			</div>
			<p>* Para acessar sua conta serão pedidos matrícula e senha.</p>
			<p>* Caso não seja um monitor e preencha informações no campo do mesmo, o cadastro será ignorado.</p>
			<p>* No caso de perda de senha, enviaremos uma mensagem ao e-mail cadastrado para alteração da mesma.</p>
			<p>* Todas as contas estão sujeitas à exclusão em caso de comportamento indevido no uso da ferramenta.</p>
       		<p>* Caso seja monitor, selecione sua cadeira no campo específico e ignore o campo de cadeiras do outro curso.</p>
		</div>
  	</div>
</body>
</html>
<?php session_destroy(); ?>