<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Monitorias</title>
	<link rel="stylesheet" href="../micro-bootstrap.css">
	<meta charset="utf-8">
</head>
<body class="inverted">
	<div class="container">
		
		<div class="page-header">
			<h1>Listagem de Monitorias</h1>
		</div>

		<div class="col-sm">
			<div class="page-header">
				<h2>Adicione uma atividade</h2>
			</div>
			<form>
				<label class="form-control">
					Título da atividade:
					<input type="text" class="form-input" placeholder="Título da atividade...">
				</label>
				<label class="form-control">
					Descrição da atividade...
					<textarea class="form-input" placeholder="Descrição da atividade..."></textarea>
				</label>
				<label class="form-control">
					Data da atividade:
					<input type="date" class="form-input">
				</label>
				<label class="form-control">
					Horário de início:
					<input type="time" class="form-input">
				</label>
				<label class="form-control">
					Horário de término:
					<input type="time" class="form-input">
				</label>
				<button class="btn btn-danger" type="submit">Adicionar</button>
				<button class="btn btn-default" type="reset">Limpar</button>
			</form>
		</div>

		<div class="col-lg">
			
			<div>
				<div class="page-header">
					<h2>Suas monitorias</h2>
				</div>
				<div style="overflow: auto; min-height: 200px; max-height: 300px;">
					<table>
						<tr>
							<th>Data</th>
							<th>Início / Término</th>
							<th>Título</th>
							<th>Descrição</th>
							<th>Opções</th>
						</tr>
						
						<?php for ($i=0; $i < 8; $i++): ?>
							<tr>
								<td>00/00</td>
								<td>00:00 / 00:00</td>
								<td>Lorem ipsum</td>
								<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam sit consequatur tenetur molestiae qui doloribus.</td>
								<td>
									<a href="#" class="link">Editar</a>
									<a href="#" class="link">Concluída</a>
								</td>
							</tr>
						<?php endfor; ?>
					</table>
				</div>
			</div>
			<br>
			<div>
				<div class="page-header">
					<h2>Atividades de seus monitores</h2>
				</div>
				<div style="overflow: auto; min-height: 200px; max-height: 300px;"">
					<table>
						<tr>
							<th>Data</th>
							<th>Início / Término</th>
							<th>Título</th>
							<th>Descrição</th>
						</tr>
						<?php for ($i=0; $i < 8; $i++): ?>
							<tr>
								<td>00/00</td>
								<td>00:00 / 00:00</td>
								<td>Lorem ipsum</td>
								<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam sit consequatur tenetur molestiae qui doloribus.</td>
							</tr>
						<?php endfor; ?>
					</table>
				</div>
			</div>

		</div>

	</div>
</body>
</html>