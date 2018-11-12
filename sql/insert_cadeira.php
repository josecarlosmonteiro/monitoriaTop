<?php 
include '../php/conn.php';
$ipi = ["Lógica de Programação e Estrutura de Dados", "Redes de Computadores", "Fundamentos da Informática", "Inglês Instrumental", "Segurança do Trabalho", "Português Instrumental", "Matemática Aplicada", "POO(Progamação Orientada a Objetos)", "Desenvolvimento para Web", "Projeto e Pratica I", "Banco de Dados", "Ética Profisssional e Cidadania", "Sistemas Operacionais", "Segurança de Sistemas para Internet"];

$log = ["Logística Reversa e Meio Abiente", "Matemática Básica", "Introdução à Administrção", "Informática Básica", "Português Aplicado", "Metodologia Cientifica", "Introdução à Logística", "Ética Profissional", "Gerenciamento e Economia de Sistemas Logísticos", "Gestão de Pessoas", "Estatística Básica", "Logística de Transporte e Destribuição", "Logística de Armazenagem", "Comércio e Relações Internacionais", "Legislção e Tributação em Logística", "Inglês Instrumental", "Gestão da Cadeia de Suprimento"];

foreach ($ipi as $disc_ipi) {
	$queryCond = $conn->prepare("SELECT nome_cadeira FROM disciplina WHERE nome_cadeira = ? AND curso_cadeira = 'IPI'");
	$queryCond->execute([$disc_ipi]);
	$dataCond = $queryCond->fetchALL();

	if (sizeof($dataCond)<=0) {
		$query = $conn->prepare('INSERT INTO disciplina (nome_cadeira, curso_cadeira) VALUES (?, "IPI")');
		$query->execute([$disc_ipi]);
	}
}

foreach ($log as $disc_log) {
	$queryCond = $conn->prepare("SELECT nome_cadeira FROM disciplina WHERE nome_cadeira = ? AND curso_cadeira = 'IPI'");
	$queryCond->execute([$disc_ipi]);
	$dataCond = $queryCond->fetchALL();

	if (sizeof($dataCond)<=0) {
		$query = $conn->prepare('INSERT INTO disciplina (nome_cadeira, curso_cadeira) VALUES (?, "LOG")');
		$query->execute([$disc_log]);
	}
}


header("location: ../index.php");
?>