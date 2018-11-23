<?php 
/*include 'conn.php';
session_start();

if (!isset($_SESSION['matricula'])) {
	header('location: ../index.php');
}

$dataP = filter_input_array(INPUT_POST);
$matricula = addslashes($_SESSION['matricula']);

require_once '../pdf/vendor/autoload.php';

//referencia o namespase do DOMPDF
use Dompdf\Dompdf;

//instancia o DOMPDF
$dompdf = new Dompdf();

// $html = file_get_contents('relatorio.php')
include('relatorio.php');
//$html = getData();

//inserindo o HTML no PDF;
$dompdf->loadHtml ($html);

//definindo papel e orientação
$dompdf->setPaper('A4', 'landscape');

//renderizando HTML no PDF
$dompdf->render();

//enviando o PDF pro navegador
$dompdf->stream('relatorio.pdf', array('Attachment' => false));
 ?>