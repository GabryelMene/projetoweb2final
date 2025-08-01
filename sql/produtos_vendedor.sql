USE buzzdrop_database;

CREATE TABLE produtos_vendedor 
(
	idProdutoVendedor INT PRIMARY KEY NOT NULL auto_increment,
    idProduto INT NOT NULL, 
    idVendedor INT NOT NULL,
    nomeProduto VARCHAR(30) NOT NULL,
    descricaoProduto TEXT, 
    categoriaProduto VARCHAR(30) NOT NULL, 
    imagemProduto TEXT NOT NULL, 
    
    CONSTRAINT `idProduto` FOREIGN KEY (`idProduto`) REFERENCES `produto` (`id`),
    CONSTRAINT `idVendedor` FOREIGN KEY (`idVendedor`) REFERENCES `vendedor` (`id`)
)