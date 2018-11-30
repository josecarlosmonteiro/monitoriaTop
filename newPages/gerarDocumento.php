<!DOCTYPE html>
<html>
<head>
	<title>Geração de Relatório</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../micro-bootstrap.css">
</head>
<body class="inverted">
	<div class="container">
		<div class="page-header">
			<h1>Gerar Relatório</h1>
		</div>

		<div class="col-sm bordered">
			<div class="page-header">
				<h2>Intervalo de Datas</h2>
			</div>
			<form>
				<label class="form-control">
					Primeiro dia:
					<input type="date" name="" class="form-input">
				</label>
				<label class="form-control">
					Último dia:
					<input type="date" name="" class="form-input">
				</label>
				<button class="btn btn-default" type="reset">Limpar</button>
				<button class="btn btn-danger" type="submit">Gerar</button>
			</form>
			<p>* Para gerar seu relatório, indique o primeiro e último dia válidos para o documento, o sistema listará automaticamente as atividades dentro do intervalo de dias informado.</p>
		</div>

		<div class="col-lg">
			<div class="container">	
				<div class="page-header">
					<h2>Registro Geral de Atividades</h2>
				</div>

				<table style="text-align: center;">
					<tr>
						<th>Data</th>
						<th>Início / Término</th>
						<th>Atividade</th>
						<th>Descrição</th>
						<th>Opções</th>
					</tr>
					<tr>
						<td>00/00</td>
						<td>00:00 / 00:00</td>
						<td>Lorem ipsum</td>
						<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua.</td>
						<td><a href="#">Excluir</a></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</body>
</html>