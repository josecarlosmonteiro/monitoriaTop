-- cria banco
CREATE DATABASE relatoriodigital;

USE relatoriodigital;

-- cria primeira tabela

CREATE TABLE aluno(
	matricula VARCHAR(50) PRIMARY KEY,
    nome VARCHAR(250) NOT NULL,
    sobrenome VARCHAR(250) NOT NULL,
    tipo enum('aluno','monitor') NOT NULL,
    curso VARCHAR(50) NOT NULL,
    periodo_monitoria VARCHAR(50),
    periodo int NOT NULL,
    password VARCHAR(32)
);

-- Cria a tabela de cursos

CREATE TABLE cadeira(
    id_curso INT  PRIMARY KEY AUTO_INCREMENT,
    nome_cadeira VARCHAR(255),
    curso_cadeira VARCHAR(255) 
); 

-- cria tabela registro: irá armazenar os registros das aulas/CH semanal das bolsas

CREATE TABLE registro(
    id_registro INT  AUTO_INCREMENT,
    matricula_rg VARCHAR(50),
    data_monitoria DATE NOT NULL,
    hora_inicio TIME NOT NULL,
    hora_termino TIME NOT NULL,
    atividade VARCHAR(500),
    tipo_atividade VARCHAR(100),
    data_registro DATE NOT NULL,
    PRIMARY KEY (id_registro),
    FOREIGN KEY (matricula_rg) REFERENCES aluno(matricula)
);

CREATE TABLE perguntas(
    id_pergunta int(20) PRIMARY KEY AUTO_INCREMENT,
    perg_matricula VARCHAR(50),
    titulo VARCHAR(50) NOT NULL,
    corpo VARCHAR(500) NOT NULL,
    FOREIGN KEY (perg_matricula) REFERENCES aluno(matricula)
);

CREATE TABLE respostas(
    id_resposta int PRIMARY KEY AUTO_INCREMENT,
    resp_id_pergunta INT NOT NULL,
    resp_matricula VARCHAR(50) NOT NULL,
    text_resposta VARCHAR(500) NOT NULL,
    FOREIGN KEY (resp_id_pergunta) REFERENCES perguntas(id_pergunta),
    FOREIGN KEY (resp_matricula) REFERENCES aluno(matricula)
);
