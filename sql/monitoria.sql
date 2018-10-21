CREATE TABLE monitoria(
	id_monitoria INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nome_cadeira VARCHAR(255),
	curso_cadeira VARCHAR(255),
	matricula_rg VARCHAR(50),
	PRIMARY KEY (id_monitoria),
	FOREIGN KEY (aluno) REFERENCES aluno(matricula)
);	
  