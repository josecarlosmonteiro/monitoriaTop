<?php
include 'conn.php';
session_start();
if (isset($_SESSION['user'])) { ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registros</title>
	<link rel="stylesheet" type="text/css" href="../css/global.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>

	<fieldset>
		<form action="addEvento.php" method="POST">
			Data da monitoria: <br> <input required type="date" name="data_monitoria"> <br>
			Hora de início:  <br> <input required type="time" name="hora_inicio"> <br>
			Hora de termino:  <br> <input required type="time" name="hora_termino"> <br>
			Tipo da atividade (ex: reunião, aula, etc...): <input required type="text" name="tipo_atividade"> <br>
			Descrição da atividade: <br> <input required type="text" name="descricao"> <br>
			<input id="sub" type="submit" value="Adicionar">
		</form>
	</fieldset>

		<br>
	<fieldset>
		
	<?php
		$query = $conn->prepare("SELECT registro.id_registro, registro.data_monitoria, registro.hora_inicio, registro.hora_termino, registro.atividade, registro.tipo_atividade FROM registro INNER JOIN aluno ON registro.matricula_rg = aluno.matricula WHERE registro.matricula_rg = ?");
		$query->execute([$_SESSION['matricula']]);

		$data = $query->fetchALL(PDO::FETCH_ASSOC);

		// if (sizeof($data)>1) {?>

			<table>
				<th>Data</th>						
				<th>Hora de início</th>						
				<th>Hora de termino</th>	
				<th>Tipo da atividade</th>					
				<th>Descrição da atividade</th>						
		<?php	foreach ($data as $lista) : ?>
					<tr>
						<td><?= $lista['data_monitoria'] ?> </td>
						<td><?= $lista['hora_inicio'] ?> </td>
						<td><?= $lista['hora_termino'] ?> </td>
						<td><?= $lista['tipo_atividade'] ?></td>
						<td><?= $lista['atividade'] ?> </td>
						<td><a href="editRegistro.php?id=<?=$lista['id_registro']?>"> <i class="far fa-edit"></i> </a></td>
						<td><a href="rmRegistro.php?id=<?=$lista['id_registro']?>"> <i class="far fa-trash-alt"></i> </a></td>
					</tr>
		<?php	endforeach; ?>
			</table>
		 <?php// }else{ ?>
			<!-- <h3>Nenhum registro a ser exibido</h3> -->
		 <?php// } ?>

	</fieldset>

</body>
</html>
<?php
}else{
	header('location: login.php');
} ?>