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
	<title>Document</title>
	<style>
		* {
			color: blue;
		}
		h1 {
			color: red;
			background: #20fe20;
		}
	</style>
</head>
<body>
	<h1>Hello World</h1>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus voluptate, odio, expedita tempore cupiditate blanditiis ipsam non explicabo molestias accusantium voluptas consectetur. Commodi assumenda iure accusamus reiciendis doloremque, esse nisi?</p>{{$matricula}}

	<table>
		<tr>
			<th>Atividade</th>
			<th>Data</th>
			<th>Horári</th>
		</tr>

	<?php
	foreach ($data as $lista) : ?>
		<tr>
			<td> <?= $lista['titulo_atividade'] ?> </td>
			<td> <?= $lista['data_monitoria'] ?> </td>
			<td> <?= $lista['inicio_monitoria'] ?> / <?= $lista['termino_monitoria'] ?> </td>
		</tr>
	<?php 
	endforeach;
	?>
	</table>
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