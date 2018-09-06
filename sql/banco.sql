-- criar banco
CREATE DATABASE monitoriatop;

-- criar primeira tabela
CREATE TABLE monitor(
	id_monitor INT NOT NULL AUTO_INCREMENT,
	matricula VARCHAR(50) NOT NULL,
	nome VARCHAR(255) NOT NULL,
	curso VARCHAR(50) NOT NULL,

	-- tipo da coluna periodo ainda não definida
	periodo VARCHAR(3) NOT NULL,
	PRIMARY KEY(id_registro)
);

-- criar tabela registro: irá armazenar os registros das aulas/CH semanal das bolsas
CREATE TABLE registro(
	id_registro INT NOT NULL AUTO_INCREMENT,
    matricula VARCHAR,
    curso_monitoria VARCHAR(50) NOT NULL,
    data_monitoria DATE NOT NULL,
    hora_inicio TIME NOT NULL,
    hora_termino TIME NOT NULL,
    data_registro VARCHAR NOT NULL,
    FOREIGN KEY matricula REFERENCES monitor(matricula)
);

-- criar tabela para senhas
CREATE TABLE senha(
	id_senha INT NOT NULL,
	matricula VARCHAR,
	senha VARCHAR(255) NOT NULL,
	PRIMARY KEY(id_senha),
	FOREIGN KEY matricula REFERENCES monitor(matricula)	
);