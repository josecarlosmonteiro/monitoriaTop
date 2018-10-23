<?php 
include '../php/conn.php';
$ipi = ["Lógica de Programação e Estrutura de Dados", "Redes de Computadores", "Fundamentos da Informática", "Inglês Instrumental", "Segurança do Trabalho", "Português Instrumental", "Matemática Aplicada", "POO(Progamação Orientada a Objetos)", "Desenvolvimento para Web", "Projeto e Pratica I", "Banco de Dados", "Ética Profisssional e Cidadania", "Sistemas Operacionais", "Segurança de Sistemas para Internet", "Interação Humano Computador", "Desenvolvimento para Web II", "Projeto e Prática II", "Empreendedorismo", "Engenharia de Software", "Implantação e Administração de Serviçoes Web"];

$log = ["Logística Reversa e Meio Abiente", "Matemática Básica", "Introdução à Administrção", "Informática Básica", "Português Aplicado", "Metodologia Cientifica", "Introdução à Logística", "Ética Profissional", "Gerenciamento e Economia de Sistemas Logísticos", "Gestão de Pessoas", "Estatística Básica", "Logística de Transporte e Destribuição", "Logística de Armazenagem", "Comércio e Relações Internacionais", "Legislção e Tributação em Logística", "Inglês Instrumental", "Gestão da Cadeia de Suprimento", "Gestão da Qualidade", "Higiene e Segurança do Trabalho", "Gestão da Produção", "Gestão de Materiais, Estoque e Compras", "Custos Logísticos", "Inglês Instrumental II", "Tópicos especiais em Logística", "Tecnologia e Sistemas de Informção Logística"];

foreach ($ipi as $disc_ipi) {
	$query = $conn->prepare('INSERT INTO disciplina (nome_cadeira, curso_cadeira) VALUES (?, "IPI")');
	$query->execute([$disc_ipi]);
}

foreach ($log as $disc_log) {
	$query = $conn->prepare('INSERT INTO disciplina (nome_cadeira, curso_cadeira) VALUES (?, "LOG")');
	$query->execute([$disc_log]);
}

?>