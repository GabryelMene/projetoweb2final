USE buzzdrop_database;

CREATE TABLE produto 
(
	id INT UNIQUE AUTO_INCREMENT PRIMARY KEY NOT NULL, 
    nome VARCHAR(30) NOT NULL,
    preco FLOAT NOT NULL,
    descricao TEXT, 
    categoria VARCHAR(30) NOT NULL,  
    vendedor VARCHAR(30) NOT NULL,
    imagem TEXT NOT NULL
);

INSERT INTO produto (nome, preco, descricao, categoria, vendedor, imagem)
VALUES 
("Off-White x Nike Blazer Mid Grim Reaper", 3999, "Tenis Off-white da Nike" ,"tenis", "fortnite", "https://droper-lapse.us-southeast-1.linodeobjects.com/20241204140638434-134.webp"),
("Off-White x Nike Air Force 1 Mid SP Grim Reaper", 2990,"Tenis Off-white Air Force Nike" , "tenis", "jorjinho", "https://droper-lapse.us-southeast-1.linodeobjects.com/20250124155158374-300.webp"),
("Nike KD17 Slim Reaper", 2090, "Tenis ideal para basquete", "tenis", "uranio", "https://droper-lapse.us-southeast-1.linodeobjects.com/20250207200958253-856.webp"), 
("Nike Air Force 1 Low LE GS White", 600, "Tenis casual para dominar a sua rua" ,"tenis", "fortnite", "https://droper-lapse.us-southeast-1.linodeobjects.com/20250313183845804-721.webp"),
("MSCHF Big Red Boot Black", 500, "Tênis ou botas (considere o que você acha) altamente utilizado por famosos" ,"tenis", "jorjinho", "https://droper-lapse.us-southeast-1.linodeobjects.com/20250421213153245-201.webp"); 

INSERT INTO produto (nome, preco, descricao, categoria, vendedor, imagem)
VALUES 
("Camisa adidas Juventus I 20/21 White Black Gold", 180, "Camisa Juventus", "camisas", "fortnite", "https://droper-lapse.us-southeast-1.linodeobjects.com/20250721190611279-493.webp"),
("Camisa Manga Longa New Balance 1/2 Zíper Treino SPFC 2024 Marinho", 500, "Corta Vento São Paulo", "camisas", "jorjinho", "https://droper-lapse.us-southeast-1.linodeobjects.com/20250728181918912-137.webp"),
("KidSuper x Puma Camisa Palmeiras Torcedor Masculina Red", 900, "Camisa Palmeiras", "camisas", "uranio", "https://droper-lapse.us-southeast-1.linodeobjects.com/20250611173904949-923.webp"),
("KidSuper x Puma Camisa Borussia Dortmund Authentic Masculina", 1200 ,"Camisa Dortmund", "camisas", "jorjinho", "https://droper-lapse.us-southeast-1.linodeobjects.com/20250612175521263-922.webp"),
("Camisa Supreme Gucci Mane", 1500, "Camisa Gucci", "camisas", "fortnite", "https://droper-media.us-southeast-1.linodeobjects.com/3062023141833457.jpeg"); 

INSERT INTO produto (nome, preco, descricao, categoria, vendedor, imagem)
VALUES 
("Lillipup 2025 Pokémon TCG (154/086)", 90, "Carta TCG Pokémon Lillipup", "cards", "uranio", "https://droper-lapse.us-southeast-1.linodeobjects.com/20250728143954437-701.webp"),
("Giovanni da Equipe Rocket 2025 Pokémon TCG (238/182)", 190, "Carta Pokémon TCG Giovanni", "cards", "jorjinho", "https://droper-lapse.us-southeast-1.linodeobjects.com/2025060317514838-989.webp"),
("Mewtwo ex da Equipe Rocket 2025 Pokémon TCG (240/182)", 60, "Mewtwo ex da Equipe Rocket 2025 Pokémon TCG", "cards" , "fortnite", "https://droper-lapse.us-southeast-1.linodeobjects.com/20250603175706955-119.webp"),
("Mewtwo ex da Equipe Rocket 2025 Pokémon TCG (231/182)", 950, "Mewtwo ex da Equipe Rocket 2025 Pokémon TCG (231/182)","cards" , "jorjinho", "https://droper-lapse.us-southeast-1.linodeobjects.com/20250603183223909-573.webp"),
("Zacian ex do Lupo 2025 Pokémon TCG (111/159)", 24, "Zacian ex do Lupo 2025 Pokémon TCG (111/159)","cards", "fortnite", "https://droper-lapse.us-southeast-1.linodeobjects.com/20250327185323799-807.webp"); 


SELECT * FROM produto;  

SELECT vendedor FROM produto WHERE id = 23;