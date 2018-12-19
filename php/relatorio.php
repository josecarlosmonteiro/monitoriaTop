<?php 
include 'conn.php';
session_start();
$dataP = filter_input_array(INPUT_POST);
$matricula = addslashes($_SESSION['matricula']);
$tipo = "monitor";

if (!isset($_SESSION['matricula']) && $tipo == "monitor") {
	header('location: ../index.php');
}

$queryAluno = $conn->prepare("SELECT nome, matricula, sobrenome FROM aluno WHERE matricula = ? AND tipo = ?");
$queryAluno->bindParam(1, $matricula);
$queryAluno->bindParam(2, $tipo);
$queryAluno->execute();
$dataAluno = $queryAluno->fetchALL(PDO::FETCH_ASSOC);

$queryList = $conn->prepare("SELECT m.titulo_atividade, m.data_monitoria, m.inicio_monitoria, m.termino_monitoria FROM monitoria m INNER JOIN aluno a ON m.matricula_monitor = a.matricula WHERE m.matricula_monitor = ? AND m.data_monitoria >= ? AND m.data_monitoria <= ? AND m.status = 'realizada'");
$queryList->bindParam(1, $matricula);
$queryList->bindParam(2, $dataP['inicio']);
$queryList->bindParam(3, $dataP['termino']);
$queryList->execute();
$dataList = $queryList->fetchALL(PDO::FETCH_ASSOC);

ob_start();
?>

<!DOCTYPE html>
<html lang="pt_BR">
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

		h3{
			text-align: center;
		}

		td{
			text-align: center;
		}
	</style>
</head>
<body>
<br><br><br>

<strong><center><p>INSTITUTO FEDERAL DE EDUCAÇÃO, CIÊNCIA E TECNOLOGIA DE PERNAMBUCO</p></center></strong>
<strong><center><p>CAMPUS IGARASSU</p></center></strong>
<strong><center><p>DIRETORIA DE ENSINO</p></center></strong>
<strong><center><p>DIVISÃO DE APOIO AO ENSINO E AO ESTUDANTE</p></center></strong>

<strong><center>Edital nº: ___ /_____</center></strong>

<br><br><br>

<strong><center><p>RELATÓRIO MENSAL DE FREQUÊNCIA</p></center></strong>
<br>
<center><p>Frequencia Mensal:_______________ Mês/Ano:____/_______</p></center>
<br>
<div class="centro">  
	<table class="dados" style="width: 100%"> 	
			<tr>
				<th>Nome Orientador:</th>
			</tr>
			<tr>
				<th>Nome Estudante: <?= $dataAluno[0]['nome'] ?> <?= $dataAluno[0]['sobrenome'] ?></th>
			</tr>
			<tr>
				<th>Componente Curricular:</th>
			</tr>
			<tr>
				<th>Monitor: Bolsista ( ) Voluntário ( )</th>
			</tr>		
	</table>
</div> 
<p>
<div class="centro2">
	<table class="dados2" style="width: 100%">
		<tr>
		<th>Data</th>
		<th>Horário</th>
		<th>Atividade</th>
		<th>Assinatura</th>
		</tr>
		<?php foreach ($dataList as $list) : ?>
		<tr>
			<td> <?= $list['data_monitoria'] ?> </td>
			<td> <?= $list['inicio_monitoria'] ?> | <?= $list['termino_monitoria'] ?> </td>
			<td> <?= $list['titulo_atividade'] ?> </td>
			<td>                   </td>
		</tr>
		<?php endforeach ?>
	</table>

</div>

</div>	
<h3>
	_______________________________________________ <br>
				Assinatura do Orientador
</h3>
</body>
</html>
<?php
$html = ob_get_clean();

require_once '../pdf/vendor/autoload.php';
use Dompdf\Dompdf;

//instancia o DOMPDF
$dompdf = new Dompdf();

//inserindo o HTML no PDF;
$dompdf->loadHtml ($html);

//definindo papel e orientação
$dompdf->set_paper(array(0, 0, 595, 841), 'portrait');
//$dompdf->setPaper('A4', 'attachment');

//renderizando HTML no PDF
$dompdf->render();

//enviando o PDF pro navegador
$dompdf->stream('relatorio.pdf', array('Attachment' => false));

?>