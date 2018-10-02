-- cria banco
CREATE DATABASE relatoriodigital

-- cria primeira tabela
CREATE TABLE aluno(
	matricula VARCHAR(50) PRIMARY KEY NOT NULL,
    nome VARCHAR(250) NOT NULL,
    sobrenome VARCHAR(250) NOT NULL,
    tipo enum('aluno','monitor') NOT NULL,
    curso VARCHAR(50) NOT NULL,
    periodo_monitoria VARCHAR(50) NOT NULL,
    periodo int NOT NULL
);

-- cria tabela registro: irá armazenar os registros das aulas/CH semanal das bolsas
CREATE TABLE registro(
    id_registro INT NOT NULL AUTO_INCREMENT,
    matricula_rg VARCHAR(50),
    curso_monitoria VARCHAR(50) NOT NULL,
    data_monitoria DATE NOT NULL,
    hora_inicio TIME NOT NULL,
    hora_termino TIME NOT NULL,
    atividade VARCHAR(500),
    data_registro DATE NOT NULL,
    PRIMARY KEY (id_registro),
    FOREIGN KEY (matricula_rg) REFERENCES aluno(matricula)
);

-- cria tabela para senhas
CREATE TABLE senha(
	matricula_s VARCHAR(25),
	senha VARCHAR(255) NOT NULL,
	PRIMARY KEY(matricula_s),
	FOREIGN KEY (matricula_s) REFERENCES aluno(matricula)	
);

-- cria tabela de cadeira dos cursos

CREATE TABLE curso_cadeira(
    id_cadeira INT PRIMARY KEY NOT NULL,
    cadeira VARCHAR(255),
    curso VARCHAR(255),
    periodo VARCHAR(255)

)