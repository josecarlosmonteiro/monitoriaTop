-- criar banco
CREATE DATABASE relatoriodigital

-- criar primeira tabela
CREATE TABLE aluno(
	matricula varchar(50) PRIMARY KEY NOT NULL,
    nome varchar(250) NOT NULL,
    sobrenome varchar(250) NOT NULL,
    tipo enum('aluno','monitor') NOT NULL,
    curso varchar(50) NOT NULL,
    periodo int NOT NULL
);

-- criar tabela registro: irá armazenar os registros das aulas/CH semanal das bolsas
CREATE TABLE registro(
	id_registro INT NOT NULL AUTO_INCREMENT,
    matricula_rg VARCHAR(50),
    curso_monitoria VARCHAR(50) NOT NULL,
    periodo_monitoria VARCHAR(50) NOT NULL,
    data_monitoria DATE NOT NULL,
    hora_inicio TIME NOT NULL,
    hora_termino TIME NOT NULL,
    atividade VARCHAR(500),
    data_registro DATE NOT NULL,
    PRIMARY KEY (id_registro),
    FOREIGN KEY (matricula_rg) REFERENCES aluno(matricula)
);

-- criar tabela para senhas
CREATE TABLE senha(
	matricula_s VARCHAR(25),
	senha VARCHAR(255) NOT NULL,
	PRIMARY KEY(matricula_s),
	FOREIGN KEY (matricula_s) REFERENCES aluno(matricula)	
);