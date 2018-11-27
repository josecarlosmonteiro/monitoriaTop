-- cria banco
DROP DATABASE IF EXISTS relatoriodigital;

CREATE DATABASE relatoriodigital;

USE relatoriodigital;

-- cria primeira tabela

CREATE TABLE aluno(
    matricula VARCHAR(50) PRIMARY KEY,
    nome VARCHAR(250) ,
    sobrenome VARCHAR(250) ,
    email VARCHAR(250),
    tipo enum('aluno','monitor') ,
    curso VARCHAR(50) ,
    periodo INT ,
    curso_monitoria VARCHAR(50),
    cadeira_monitoria VARCHAR(50),
    status TINYINT,
    cadastro timestamp default current_timestamp,
    password VARCHAR(32)
);

-- Cria a tabela de cursos

CREATE TABLE disciplina(
    id_curso INT  PRIMARY KEY AUTO_INCREMENT,
    nome_cadeira VARCHAR(255),
    curso_cadeira VARCHAR(255) 
); 

-- Cria tabela de agendamento das monitorias 

CREATE TABLE monitoria(
    id_monitoria INT  PRIMARY KEY AUTO_INCREMENT,
    id_curso_monitoria INT,
    matricula_monitor VARCHAR(50),
    titulo_atividade VARCHAR(50),
    descricao_atividade TEXT,
    inicio_monitoria TIME,
    termino_monitoria TIME,
    data_monitoria DATE,
    status enum('agendada', 'realizada'),
    FOREIGN KEY (matricula_monitor) REFERENCES aluno(matricula),
    FOREIGN KEY (id_curso_monitoria) REFERENCES disciplina(id_curso)
);  

-- Cria a tabela de perguntas do forum

CREATE TABLE perguntas(
    id_pergunta int(20) PRIMARY KEY AUTO_INCREMENT,
    perg_matricula VARCHAR(50),
    titulo VARCHAR(100),
    corpo TEXT,
    perg_hora timestamp default current_timestamp,
    FOREIGN KEY (perg_matricula) REFERENCES aluno(matricula)
);

-- cria a tabela de respostas do forum

CREATE TABLE respostas(
    id_resposta int PRIMARY KEY AUTO_INCREMENT,
    resp_id_pergunta INT,
    resp_matricula VARCHAR(50),
    text_resposta TEXT,
    resp_hora timestamp default current_timestamp,
    FOREIGN KEY (resp_id_pergunta) REFERENCES perguntas(id_pergunta),
    FOREIGN KEY (resp_matricula) REFERENCES aluno(matricula)
);

