<?php 
include 'conn.php';
session_start();
//çoshfpokjh
$dataP = filter_input_array(INPUT_POST);
$matricula = addslashes($_SESSION['matricula']);
if (!isset($_SESSION['matricula'])) {
	header('location: ../index.php');
}
ob_start();
$query = $conn->prepare("SELECT m.titulo_atividade, m.data_monitoria, m.inicio_monitoria, m.termino_monitoria FROM monitoria m INNER JOIN aluno a ON m.matricula_monitor = a.matricula WHERE a.matricula = ? AND a.tipo = 'monitor' AND m.data_monitoria > ? AND m.data_monitoria < ?");
$query->bindParam(1, $matricula);
$query->bindParam(2, $dataP['inicio']);
$query->bindParam(3, $dataP['termino']);
$query->execute();
$data = $query->fetchALL(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Relatório</title>
	<style>
		.centro, .centro2{
			width: 100%;	
			height: auto;
			display: flex;
			justify-content: center;
			text-align: left;
		}
		table tr td{
			border: 1px solid black;
		}
		.dados tr th, .dados2 tr th{
			border: 1px solid black;
		}
		.dados2 tr td{
			padding:5px;


		}
	</style>
</head>
<body>
<br><br><br>

<strong><center><p>INSTITUTO FEDERAL DE EDUCAÇÃO, CIÊNCIA E TECNOLOGIA DE PERNAMBUCO</p></center></strong>
<strong><center><p>CAMPUS IGARASSU</p></center></strong>
<strong><center><p>DIRETORIA DE ENSINO</p></center></strong>
<strong><center><p>DIVISÃO DE APOIO AO ENSINO E AO ESTUDANTE</p></center></strong>
<strong><center><p>PROGRAMA DE MONITORIA</p></center></strong>
<strong><center><p>Edital nº 04/2018 - DGCIGR</p></center></strong>

<br><br><br>

<strong><center><p>RELATÓRIO MENSAL DE FREQUÊNCIA</p></center></strong>
<br>
<center><p>Frequencia Mensal:			Mês/Ano:____/_______</p></center>
<br>
<div class="centro">  
	<table class="dados" style="width: 1000%"> 	
			<tr>
				<th>Nome Orientador:</th>
			</tr>
			<tr>
				<th>Nome Estudante:</th>
			</tr>
			<tr>
				<th>Componente Curricular:</th>
			</tr>
			<tr>
				<th>Monitor: Bolsista ( ) Voluntário ( )</th>
			</tr>		
	</table>
</div> <p>
<div class="centro2">
	<table class="dados2" style="width: 1000%">
		<tr>
		<th>Data</th>
		<th>Horário</th>
		<th>Atividade</th>
		<th>Assinatura</th>
		</tr>
	</table>
</div>	
	<?php
	$html = ob_get_clean();
	?>

</body>
</html>
<?php
require_once '../pdf/vendor/autoload.php';
use Dompdf\Dompdf;

//instancia o DOMPDF
$dompdf = new Dompdf();

//inserindo o HTML no PDF;
$dompdf->loadHtml ($html);

//definindo papel e orientação
$dompdf->setPaper('A4', 'landscape');

//renderizando HTML no PDF
$dompdf->render();

//enviando o PDF pro navegador
$dompdf->stream('relatorio.pdf', array('Attachment' => false));

 ?>