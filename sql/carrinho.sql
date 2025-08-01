USE buzzdrop_database;

CREATE TABLE carrinho 
(
	idCarrinho INT PRIMARY KEY AUTO_INCREMENT NOT NULL, 
    idProduto INT NOT NULL,
    idCliente INT NOT NULL,
    quantidade INT DEFAULT 0,
    
    CONSTRAINT `idProdutoCarrinho` FOREIGN KEY (`idProduto`) REFERENCES `produto` (`id`),
    CONSTRAINT `idClienteCarrinho` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`id`)
);

SELECT * FROM carrinho;
