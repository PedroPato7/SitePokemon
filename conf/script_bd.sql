CREATE SCHEMA IF NOT EXISTS ligaPokemon;

USE ligaPokemon;

CREATE TABLE IF NOT EXISTS liga( 
    id INT NOT NULL AUTO_INCREMENT,
	UNIQUE (id),
	nome VARCHAR(45) NOT NULL,
	sede VARCHAR(45) NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS treinador( 
	id INT NOT NULL AUTO_INCREMENT,
	UNIQUE (id),
	nome VARCHAR(45) NOT NULL,
	dataNascimento DATE NOT NULL,
	id_liga INT NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (id_liga) REFERENCES liga (id)
);

CREATE TABLE IF NOT EXISTS tipoPokemon(
	id INT NOT NULL AUTO_INCREMENT,
	UNIQUE (id),
	nome VARCHAR(45) NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS pokemon( 
	id INT NOT NULL AUTO_INCREMENT,
	UNIQUE (id),
	nome VARCHAR(45) NOT NULL,
	tipo1 INT NOT NULL,
	tipo2 INT,
	PRIMARY KEY (id),
	FOREIGN KEY (tipo1, tipo2) REFERENCES tipoPokemon (id)
);

CREATE TABLE IF NOT EXISTS treinador_pokemon(
	id_treinador INT NOT NULL,
	id_pokemon INT NOT NULL,
	PRIMARY KEY (id_treinador, id_pokemon),
	FOREIGN KEY (id_treinador) REFERENCES treinador (id),
	FOREIGN KEY (id_pokemon) REFERENCES pokemon (id)
);