<?php 
session_start();
include 'conn.php';

$query_log = $conn->prepare("SELECT nome_cadeira FROM disciplina WHERE curso_cadeira = 'LOG' ORDER BY id_disciplina ASC");
$query_log->execute();

$query_ipi = $conn->prepare("SELECT nome_cadeira FROM disciplina WHERE curso_cadeira = 'IPI' ORDER BY id_disciplina ASC");
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

include 'Menu2.php';
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

		<form action="addUSer.php" method="POST" name="cadastro">
			<div class="col-sm">
					<div class="page-header">
						<h2>Dados pessoais</h2>
					</div>

					<label class="form-control">
						Nome:
						<input type="text" name="nome" class="form-input" placeholder="Nome">
					</label>
					<label class="form-control">
						Sobrenome:
						<input type="text" class="form-input" placeholder="Sobrenome" name="sobrenome">
					</label>

					<div class="page-header">
						<h2>Dados da conta</h2>
					</div>

					<label class="form-control">
						E-mail:
						<input type="email" class="form-input" placeholder="user@mail.com" name="e-mail">
					</label>
					<label class="form-control">
						Senha:
						<input type="password" class="form-input" placeholder="Senha" name="senha">
					</label>
					<label class="form-control">
						Repita a senha:
						<input type="password" class="form-input" placeholder="Repita a senha" name="confirmSenha">
					</label>
			</div>

			<div class="col-md">
				<div class="page-header">
					<h2>Dados do aluno</h2>
				</div>

				<label class="form-control">
					Matrícula:
					<input type="text" class="form-input" placeholder="201XXXinfig0000" name="matricula">
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
                  <select class="form-input">
                    <option>--</option>
                    <option value="IPI">IPI</option>
                    <option value="LOG">LOG</option>
                  </select>
              	</label>
				<label class="form-control">
					Período que está cursando:
					<select class="form-input" >
						<option>--</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
					</select>
				</label>
          </div>
          <div class="col-sm">
            <div class="page-header">
					<h2>Área do monitor</h2>
				</div>
				<label class="form-control">
					<div id="ipi_m">
						Cadeira que é monitor:<br>
                      	IPI:
						<select name="monitor_disciplinaipi" class="form-input">
							<option>--</option>
							<?php foreach ($data_ipi as $ipi) : ?>
								<option value="<?= $ipi['nome_cadeira'] ?>" ><?= $ipi['nome_cadeira'] ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div id="log_m">
                      	LOG:
						<select name="monitor_disciplinalog" class="form-input">
							<option>--</option>
							<?php foreach ($data_log as $log) : ?>
								<option value="<?= $log['nome_cadeira'] ?>"><?= $log['nome_cadeira'] ?></option>
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