<?php 
include '../php/conn.php';
$ipi1 = ["Lógica de Programação e Estrutura de Dados", "Redes de Computadores", "Fundamentos da Informática", "Inglês Instrumental", "Segurança do Trabalho", "Português Instrumental", "Matemática Aplicada"];

foreach ($ipi1 as $disc_ipi) {
	$queryCond = $conn->prepare("SELECT nome_cadeira FROM disciplina WHERE nome_cadeira = ? AND curso_cadeira = 'IPI' AND periodo_cadeira = '1'");
	$queryCond->execute([$disc_ipi]);
	$dataCond = $queryCond->fetchALL();

	if (sizeof($dataCond)<=0) {
		$query = $conn->prepare('INSERT INTO disciplina (nome_cadeira, curso_cadeira, periodo_cadeira) VALUES (?, "IPI", "1")');
		$query->execute([$disc_ipi]);
	}
}


$ipi2 = ["POO(Progamação Orientada a Objetos)", "Desenvolvimento para Web", "Projeto e Pratica I", "Banco de Dados", "Ética Profisssional e Cidadania", "Sistemas Operacionais", "Segurança de Sistemas para Internet"];

foreach ($ipi2 as $disc_ipi) {
	$queryCond = $conn->prepare("SELECT nome_cadeira FROM disciplina WHERE nome_cadeira = ? AND curso_cadeira = 'IPI' AND periodo_cadeira = '2'");
	$queryCond->execute([$disc_ipi]);
	$dataCond = $queryCond->fetchALL();

	if (sizeof($dataCond)<=0) {
		$query = $conn->prepare('INSERT INTO disciplina (nome_cadeira, curso_cadeira, periodo_cadeira) VALUES (?, "IPI", "2")');
		$query->execute([$disc_ipi]);
	}
}




$log1 = ["Logística Reversa e Meio Abiente", "Matemática Básica", "Introdução à Administrção", "Informática Básica", "Português Aplicado", "Metodologia Cientifica", "Introdução à Logística", "Ética Profissional"]; 

foreach ($log1 as $disc_log) {
	$queryCond = $conn->prepare("SELECT nome_cadeira FROM disciplina WHERE nome_cadeira = ? AND curso_cadeira = 'LOG' AND periodo_cadeira = '1'");
	$queryCond->execute([$disc_log]);
	$dataCond = $queryCond->fetchALL();

	if (sizeof($dataCond)<=0) {
		$query = $conn->prepare('INSERT INTO disciplina (nome_cadeira, curso_cadeira, periodo_cadeira) VALUES (?, "LOG", "1")');
		$query->execute([$disc_log]);
	}
}

$log2 = ["Gerenciamento e Economia de Sistemas Logísticos", "Gestão de Pessoas", "Estatística Básica", "Logística de Transporte e Destribuição", "Logística de Armazenagem", "Comércio e Relações Internacionais", "Legislção e Tributação em Logística", "Inglês Instrumental", "Gestão da Cadeia de Suprimento"];


foreach ($log2 as $disc_log) {
	$queryCond = $conn->prepare("SELECT nome_cadeira FROM disciplina WHERE nome_cadeira = ? AND curso_cadeira = 'LOG' AND periodo_cadeira = '2'");
	$queryCond->execute([$disc_log]);
	$dataCond = $queryCond->fetchALL();

	if (sizeof($dataCond)<=0) {
		$query = $conn->prepare('INSERT INTO disciplina (nome_cadeira, curso_cadeira, periodo_cadeira) VALUES (?, "LOG", "2")');
		$query->execute([$disc_log]);
	}
}


header("location: ../index.php");
?>