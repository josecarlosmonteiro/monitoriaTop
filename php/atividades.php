<?php 
	//include 'conn.php'; 
	session_start();
?>
<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="../css/global.css">
	<link rel="stylesheet" href="../css/menu.css">
	<?php	include 'menu.php';	?>

	<style>
		#tabelaIpi, #tabelaLog, #listaIpi, #listaLog{
			display: none;
		}
		#listaIpi:checked ~ #tabelaIpi, #listaLog:checked ~ #tabelaLog{
			display: block;
		}
	</style>

</head>
<body>
	<div class="content">

		<h1>Atividades</h1>
		<hr><br><br>

		<div style="text-align: center;">
			<input type="checkbox" id="listaIpi">
			<label for="listaIpi" id="" class="btnDrop">Cadeiras IPI &#9776;</label>

			<input type="checkbox" id="listaLog">
			<label for="listaLog" id="" class="btnDrop">Cadeiras LOG &#9776;</label>

			<table id="tabelaIpi">
				<tr>
					<td><a id="linksTable" href="atividadesCadeira.php?cadeira=Lógica de Programação">Lógica de Programação</a></td>
				</tr>
				<tr>
					<td><a id="linksTable" href="atividadesCadeira.php?cadeira=Redes de Computadores">Redes de Computadores</a></td>
				</tr>
			</table>
			<table class="tabelaCadeiras" id="tabelaLog">
				<tr>
					<td><a id="linksTable" href="atividadesCadeira.php?cadeira=Contabilidade">Matemática</a></td>
					<td><a id="linksTable" href="atividadesCadeira.php?cadeira=Contabilidade">Ética</a></td>
				</tr>
			</table>
		</div>
	</div>
</body>
</html>

