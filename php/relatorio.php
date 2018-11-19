<?php 
include 'conn.php';
session_start();
//çoshfpokjh
$dataP = filter_input_array(INPUT_POST);
$matricula = addslashes($_SESSION['matricula']);

$query = $conn->prepare("SELECT m.titulo_atividade, m.data_monitoria, m.inicio_monitoria, m.termino_monitoria FROM monitoria m INNER JOIN aluno a ON m.matricula_monitor = a.matricula WHERE a.matricula = ? AND a.tipo = 'monitor' AND m.data_monitoria > ? AND m.data_monitoria < ?");
$query->bindParam(1, $matricula);
$query->bindParam(2, $dataP['inicio']);
$query->bindParam(3, $dataP['termino']);
$query->execute();
$data = $query->fetchALL(PDO::FETCH_ASSOC);
$html = "";

foreach ($data as $lista) {
	$html .= $lista['titulo_atividade'];
	$html .= $lista['data_monitoria'];
	$html .= $lista['inicio_monitoria'];
	$html .= $lista['termino_monitoria'];
}

// header('location: pdf.php');
// echo $html;



use Dompdf\Dompdf;

//instancia o DOMPDF
$dompdf = new Dompdf();

// $html = file_get_contents('relatorio.php')
// include('relatorio.php');
// $html = getData();

//inserindo o HTML no PDF;
$dompdf->loadHtml ($html);

//definindo papel e orientação
$dompdf->setPaper('A4', 'landscape');

//renderizando HTML no PDF
$dompdf->render();

//enviando o PDF pro navegador
$dompdf->stream('relatorio.pdf', array('Attachment' => false));

 ?>