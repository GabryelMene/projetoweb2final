USE buzzdrop_database;

CREATE TABLE compra
(
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL, 
    idProduto INT NOT NULL,
    idCliente INT NOT NULL, 
    idVendedor INT NOT NULL, 
    total FLOAT NOT NULL, 
    
    CONSTRAINT `idProdutoCompra` FOREIGN KEY (`idProduto`) REFERENCES `produto` (`id`),
    CONSTRAINT `idClienteCompra` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`id`),
    CONSTRAINT `idVendedorCompra` FOREIGN KEY (`idVendedor`) REFERENCES `vendedor` (`id`)   
);

SELECT * FROM compra;
