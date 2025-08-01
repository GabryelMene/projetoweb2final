<?php
require_once '../database/Database.php'; 
session_start(); 
$db = new Database();
$sqlSneakers = "SELECT * FROM produto WHERE categoria = 'tenis'";
$sqlShirts = "SELECT * FROM produto WHERE categoria = 'camisas'";
$sqlCards = "SELECT * FROM produto WHERE categoria = 'cards'";

$sneakers = $db->select($sqlSneakers); 
$shirts = $db->select($sqlShirts);
$cards = $db->select($sqlCards);


?> 

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta
      name="description"
      content="BuzzDrop - compre online com segurança e privacidade!"
    />
    <meta
      name="keywords"
      content="loja online, segurança, privacidade, compras, dropshipping, tenis, sneaker, estilo, roupas"
    />
    <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style/reset.css" />
    <link rel="stylesheet" href="style/header-mobile.css" />
    <link rel="stylesheet" href="style/header-tablet-pc.css" />
    <link rel="stylesheet" href="style/main-content.css" />
    <link rel="stylesheet" href="style/footer-content.css">
    <link
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
      integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
      integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
      crossorigin="anonymous"
    ></script>
    <title>BuzzDrop - Home</title>
  </head>
  <body>
    <!--Header tablet e pc-->
    <header class="header-tablet-pc">
      <nav class="header-items">
        <ul class="header-items-list">
          <li class="header-list-item header-list-item-1">
            <a href="../home/index.php">
              <img
                src="./assets/buzzdrop-logo.png"
                alt="BuzzDrop logo"
                class="buzzdrop-logo"
              />
            </a>
          </li>
          <?php if (!isset($_SESSION['idCliente'])  && !isset($_SESSION['idVendedor']) ) { ?>
            <li class="header-list-item header-list-item-2">
              <a class="text-item" href="../cadastro/index.php"> Cadastrar-se </a>
            </li>
          <?php } ?> 
          <?php if (isset($_SESSION['idCliente'])) { ?>
            <li class="header-list-item header-list-item-3">
              <a class="text-item" href="../carrinho/index.php"> Meu Carrinho </a>
            </li>
          <?php } ?>
          <?php if (isset($_SESSION['idVendedor']) ) { ?>
            <li class="header-list-item header-list-item-4">
              <a class="text-item" href="../admin/index.php"> Meus produtos </a>
            </li>
          <?php } ?>
          <li class="header-list-item header-list-item-5">
            <div class="header-search-items">
              <span class="material-symbols-outlined search-icon">search</span>
              <input
                type="search"
                name="search"
                id="searchId"
                placeholder="Pesquisar produto..."
                required
              />
            </div>
          </li>
          <?php
          if (!isset($_SESSION['idCliente']) && !isset($_SESSION['idVendedor']) ) { ?>
            <li class="header-list-item header-list-item-6">
              <a class="text-item" href="../login/index.php"> Log-in </a>
              <span class="material-symbols-outlined">login</span>
            </li>
          <?php } else { ?>
            <li class="header-list-item header-list-item-6">
              <a href="./exit.php" class="button">Sair</a>
            </li>
          <?php } ?>
        </ul>
      </nav>
    </header>
    <!--Header mobile-->
    <header class="header-mobile">
      <div class="header-items">
        <a href="../home/index.php">
          <h2 class="buzzdrop-logo"><span class="buzz">Buzz</span>Drop</h2></a
        >
        <div class="header-search-items">
          <span class="material-symbols-outlined search-icon">search</span>
          <input
            type="search"
            name="search"
            id="searchId"
            placeholder="Pesquisar produto..."
            required
          />
        </div>
      </div>
      <nav class="header-options">
        <ul class="header-list-options">
          <li class="list-option-1">
            <a href="./home/index.php">
               <img src="./icons/home.png" alt="Home" class="home-icon" />
            </a>
          </li>
          <?php
          if (!isset($_SESSION['idCliente']) && !isset($_SESSION['idVendedor']) ) { ?>
            <li class="list-option-2">
              <a href="../login/index.php" class="list-span">Fazer Login</a>
            </li>
          <?php } else { ?>
              <li class="list-option-5">
                <a href="./exit.php" class="button">Sair</a>
              </li>
          <?php } ?>
          <?php if (!isset($_SESSION['idCliente'])  && !isset($_SESSION['idVendedor']) ) { ?>
            <li class="list-option-3">
              <a href="../cadastro/index.php" class="list-span">Cadastrar-se</a>
            </li>
          <?php } ?>
          <?php if (isset($_SESSION['idCliente'])) { ?>
            <li class="list-option-4">
              <a href="../carrinho/index.php" class="list-span">Meu carrinho</a>
            </li>
          <?php } ?>
          <?php if (isset($_SESSION['idVendedor'])) { ?>
            <li class="list-option-4">
              <a href="../admin/index.php" class="list-span">Meus produtos</a>
            </li>
          <?php } ?>
        </ul>
      </nav>
    </header>
    <main class="main-content">
          <section class="div-slides"> 
                <div
                    id="carouselExampleControls"
                    class="carousel slide div-slide-mobile"
                    data-ride="carousel"
                >
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                          <img
                          class="d-block w-100 slide slide-nike"
                          src="./images/stock/nike.png"
                          alt="Primeiro Slide"
                          />
                      </div>
                      <div class="carousel-item slide">
                          <img
                          class="d-block w-100 slide"
                          src="./images/stock/pokemon.png"
                          alt="Segundo Slide"
                          />
                      </div>
                      <div class="carousel-item">
                          <img
                          class="d-block w-100 slide"
                          src="./images/stock/mschf.png"
                          alt="Terceiro Slide"
                          />
                      </div>
                      </div>
                      <a
                      class="carousel-control-prev"
                      href="#carouselExampleControls"
                      role="button"
                      data-slide="prev"
                      >
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Anterior</span>
                      </a>
                      <a
                      class="carousel-control-next"
                      href="#carouselExampleControls"
                      role="button"
                      data-slide="next"
                      >
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Próximo</span>
                      </a>
                      </div>
                      <div
                          id="carouselExampleIndicators"
                          class="carousel slide div-slide-tablet-pc"
                          data-ride="carousel"
                      >
                          <ol class="carousel-indicators">
                          <li
                              data-target="#carouselExampleIndicators"
                              data-slide-to="0"
                              class="active"
                          ></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                          </ol>
                          <div class="carousel-inner">
                          <div class="carousel-item active">
                              <img
                              class="d-block w-100 slide"
                              src="./images/stock/public.png"
                              alt="Primeiro Slide"
                              />
                        </div>
                        <div class="carousel-item">
                            <img
                            class="d-block w-100 slide"
                            src="./images/stock/public-2.png"
                            alt="Segundo Slide"
                            />
                        </div>
                        <div class="carousel-item">
                            <img
                            class="d-block w-100 slide"
                            src="./images/stock/public-3.png"
                            alt="Terceiro Slide"
                            />
                        </div>
                      </div>
                      <a
                      class="carousel-control-prev"
                      href="#carouselExampleIndicators"
                      role="button"
                      data-slide="prev"
                      >
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Anterior</span>
                      </a>
                      <a
                      class="carousel-control-next"
                      href="#carouselExampleIndicators"
                      role="button"
                      data-slide="next"
                      >
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Próximo</span>
                      </a>
                  </div>
          </section>
        <section class="section-products section-sneakers">
            <h2 class="title-product">Sneakers</h2>
            <div class="div-products" style="flex-wrap: wrap;">
                <?php foreach ($sneakers as $sneaker) : ?>
                  <div class="div-product">
                      <a href="../compra/index.php?id=<?= $sneaker->id ?>" class="link-product">
                        <img src="<?= $sneaker->imagem ?>" alt="imagem do sneaker" class="image-product">
                      </a>
                      <h2 class="inside-title-product"><?= $sneaker->nome ?></h2>
                      <span class="inside-value-product">R$ <?= $sneaker->preco ?></span>
                  </div>
                <?php endforeach; ?>
            </div>
        </section>
        <section class="section-brands">
            <h2 class="title-brand">
                Nossas marcas
            </h2>
            <div class="div-brands">
                <div class="div-brand">
                    <img src="./images/logo/MSCHF_logo.png" alt="marca MSCHF" class="logo-brand">
                </div>
                <div class="div-brand">
                    <img src="./images/logo/nike_logo.jpg" alt="marca nike" class="logo-brand">
                </div>
                <div class="div-brand">
                    <img src="./images/logo/traviscott.webp" alt="marca travis scott" class="logo-brand">
                </div>
                <div class="div-brand">
                    <img src="./images/logo/Louis_Vuitton-Logo.wine.png" alt="marca Louis Vuitton" class="logo-brand">
                </div>
                <div class="div-brand">
                    <img src="./images/logo/adidas_logo.jpg" alt="Marca Adidas" class="logo-brand">
                </div> 
                <div class="div-brand">
                    <img src="./images/logo/fila_logo.jpg" alt="Marca Fila" class="logo-brand">
                </div> 
            </div>
        </section>
        <div class="div-security">
            <div class="div-content-security">
                <div class="security-text-content">
                    <h2 class="security-title">Segurança e Autenticidade</h2>
                    <h3 class="security-title-2">Sua compra é 100% garantida pela BuzzDrop</h3>
                </div>
                <div class="security-image">
                    <img src="./images/stock/produtos.webp" alt="Imagem de produtos" class="image-security">
                </div>
            </div>
        </div>
        <section class="section-products">
            <h2 class="title-product">Shirts</h2>
            <div class="div-products">
                <?php foreach ($shirts as $shirt) : ?>
                  <div class="div-product">
                      <a href="../compra/index.php?id=<?= $shirt->id ?>" class="link-product">
                        <img src="<?= $shirt->imagem ?>" alt="imagem da camisa" class="image-product">
                      </a>
                      <h2 class="inside-title-product"><?= $shirt->nome ?></h2>
                      <span class="inside-value-product">R$ <?= $shirt->preco ?> </span>
                  </div>
                <?php endforeach; ?>
            </div>
        </section>
        <section class="section-products">
            <h2 class="title-product">Pokemon Cards</h2>
            <div class="div-products">
                <?php foreach($cards as $card) : ?>
                <div class="div-product">
                    <a href="../compra/index.php?id=<?= $card->id ?>" class="link-product">
                      <img style="width: 70%;" src="<?= $card->imagem ?>" alt="imagem da carta" class="image-product">
                    </a>  
                    <h2 class="inside-title-product"><?= $card->nome ?></h2>
                    
                    <span class="inside-value-product">R$ <?= $card->preco ?></span>
                </div>
                <?php endforeach; ?> 
            </div>
        </section>
    </main>
    <footer class="footer-content">
        <h3> 🏳️‍⚧️ Português - BR</h3>
        <hr>
        <h3>Entre em contato</h3>
        <ul>
            <li>© 2023 BuzzDrop</li>
            <li>Todos os direitos reservados</li>
            <li>buzzdrop.app@gmail.com</li>
            <li>Instragram: @buzzdrop</li>
        </ul>
    </footer>
  </body>
</html>
