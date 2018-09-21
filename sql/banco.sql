-- criar banco
CREATE DATABASE relatoriodigital;

-- criar primeira tabela
CREATE TABLE monitor(
	matricula VARCHAR(50) NOT NULL,
	nome VARCHAR(255) NOT NULL,
	curso VARCHAR(50) NOT NULL,
	periodo VARCHAR(3) NOT NULL,
	PRIMARY KEY(matricula)
);

-- criar tabela registro: irá armazenar os registros das aulas/CH semanal das bolsas
CREATE TABLE registro(
	id_registro INT NOT NULL AUTO_INCREMENT,
    matricula_rg INT(50),
    curso_monitoria VARCHAR(50) NOT NULL,
    periodo_monitoria VARCHAR(50) NOT NULL,
    data_monitoria DATE NOT NULL,
    hora_inicio TIME NOT NULL,
    hora_termino TIME NOT NULL,
    atividade VARCHAR(500),
    data_registro DATE NOT NULL,
    PRIMARY KEY (id_registro),
    FOREIGN KEY (matricula_rg) REFERENCES monitor(matricula)
);

-- criar tabela para senhas
CREATE TABLE senha(
	id_senha INT NOT NULL,
	matricula_s INT,
	senha VARCHAR(255) NOT NULL,
	PRIMARY KEY(id_senha),
	FOREIGN KEY (matricula_s) REFERENCES monitor(matricula)	
);