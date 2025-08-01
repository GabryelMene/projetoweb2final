USE buzzdrop_database;

CREATE TABLE vendedor 
(
	id INT PRIMARY KEY auto_increment NOT NULL, 
    nome VARCHAR(30) NOT NULL,
    email VARCHAR(100) NOT NULL,
	senha VARCHAR(255) NOT NULL,
    telefone VARCHAR(17) NOT NULL
);

INSERT INTO vendedor (nome, email, senha, telefone) 
VALUES ("fortnite", "fortnite@gmail.com", "fortnite", "9999999");

INSERT INTO vendedor (nome, email, senha, telefone) 
VALUES ("jorjinho", "jorjinho@gmail.com", "jorjinho", "9999999");

INSERT INTO vendedor (nome, email, senha, telefone) 
VALUES ("uranio", "uranio@gmail.com", "uranio", "9999999");