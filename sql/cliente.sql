USE buzzdrop_database;

CREATE TABLE cliente 
(
	id INT PRIMARY KEY auto_increment NOT NULL,
    nome VARCHAR(30) NOT NULL,   
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    telefone VARCHAR(17) NOT NULL
); 



SELECT * FROM cliente; 