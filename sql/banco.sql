-- criar banco
CREATE DATABASE monitoriatop;

-- criar primeira tabela
CREATE TABLE monitor(
	id_monitor INT NOT NULL AUTO_INCREMENT,
	matricula VARCHAR(50) NOT NULL,
	nome VARCHAR(255) NOT NULL,
	curso VARCHAR(50) NOT NULL,
	periodo VARCHAR(3) NOT NULL,
	PRIMARY KEY(id_monitor)
);

-- criar tabela registro: irá armazenar os registros das aulas/CH semanal das bolsas
CREATE TABLE registro(
	id_registro INT NOT NULL AUTO_INCREMENT,
    id_monitor_rg INT(50),
    curso_monitoria VARCHAR(50) NOT NULL,
    periodo_monitoria VARCHAR(50) NOT NULL,
    data_monitoria DATE NOT NULL,
    hora_inicio TIME NOT NULL,
    hora_termino TIME NOT NULL,
    atividade VARCHAR(500),
    data_registro DATE NOT NULL,
    PRIMARY KEY (id_registro),
    FOREIGN KEY (id_monitor_rg) REFERENCES monitor(id_monitor)
);

-- criar tabela para senhas
CREATE TABLE senha(
	id_senha INT NOT NULL,
	id_monitor_s INT,
	senha VARCHAR(255) NOT NULL,
	PRIMARY KEY(id_senha),
	FOREIGN KEY (id_monitor_s) REFERENCES monitor(id_monitor)	
);