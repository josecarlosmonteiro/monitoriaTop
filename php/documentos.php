<?php
include 'conn.php';
session_start();
include 'menu.php';
if (!isset($_SESSION['matricula'])) {
	header('location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registros</title>
	<link rel="stylesheet" type="text/css" href="../css/global.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>

	<div class="content">
		<h1>Registro de Atividades</h1>
		<h3>Documentação</h3>
		<hr><br><br>
		<div id="blockForm">
			<form action="addEvento.php" method="POST">
				Data da monitoria:<input required type="date" name="data_monitoria">
				Hora de início:<input required type="time" name="hora_inicio"> 
				Hora de termino:<input required type="time" name="hora_termino"> 
				Tipo da atividade (ex: reunião, aula, etc...):<input required type="text" name="tipo_atividade"> 
				Descrição da atividade:<input required type="text" name="descricao"> 
				<input id="sub" class="btnSubmit" type="submit" value="Adicionar">
			</form>
		</div>

		<div id="blockForm">
			<form action="pdf.php" method="post">
				Digite o periodo desejado: <br>
				
				Inicio:
				<input type="date" name="inicio"> 
				Termino:
				<input type="date" name="termino">
				<input type="submit" class="btnSubmit" value="Gerar PDF">
			</form>
		</div>
		
			<?php
			$query = $conn->prepare("SELECT m.id_monitoria, m.data_monitoria, m.inicio_monitoria, m.termino_monitoria, m.descricao_atividade, m.titulo_atividade FROM monitoria m WHERE m.matricula_monitor = ? AND status = 'realizada'");
			$query->execute([$_SESSION['matricula']]);

			$data = $query->fetchALL();

			?>

				<table>
					<th>Data</th>						
					<th>Hora de início</th>						
					<th>Hora de termino</th>	
					<th>Tipo da atividade</th>					
					<th>Descrição da atividade</th>						
			<?php	foreach ($data as $lista) : ?>
						<tr>
							<td><?= $lista['data_monitoria'] ?> </td>
							<td><?= $lista['inicio_monitoria'] ?> </td>
							<td><?= $lista['termino_monitoria'] ?> </td>
							<td><?= $lista['titulo_atividade'] ?></td>
							<td><?= $lista['descricao_atividade'] ?> </td>
							<td><a href="editRegistro.php?id=<?=$lista['id_monitoria']?>"> <i class="far fa-edit"></i> </a></td>
							<td><a href="rmRegistro.php?id=<?=$lista['id_monitoria']?>"> <i class="far fa-trash-alt"></i> </a></td>
						</tr>
			<?php	endforeach; ?>
				</table>
	</div>
</body>
</html>