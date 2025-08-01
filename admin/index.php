<?php
require_once '../database/Database.php'; 
session_start();
if ($_SESSION['idVendedor']) {  
  $db = new Database();
  $nomeVendedor = $_SESSION['nomeVendedor'];
  $sql = "SELECT * FROM produto WHERE vendedor = '$nomeVendedor'"; 
  $list = $db->select($sql);
  
?> 
  <!DOCTYPE html>
  <html lang="pt-BR">
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta http-equiv="X-UA-Compatible" content="IE=7" />
      <meta http-equiv="X-UA-Compatible" content="ie=edge" />
      <meta
        name="description"
        content="BuzzDrop - compre online com segurança e privacidade!"
      />
      <meta
        name="keywords"
        content="loja online, segurança, privacidade, compras, dropshipping, tenis, sneaker, estilo, roupas"
      />
      <link rel="shortcut icon" href="./assets/favicon.ico" type="image/x-icon" />
      <link rel="stylesheet" href="./style/login-style.css" />
      <link rel="stylesheet" href="./style/reset.css" />
      <link rel="stylesheet" href="./style/main-content.css" />
      <link rel="stylesheet" href="./style/header-mobile.css" />
      <link rel="stylesheet" href="./style/header-tablet-pc.css" />
      <link rel="stylesheet" href="./style/footer-content.css" />
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
      <title>Meus produtos - BuzzDrop</title>
    </head>
    <body>
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
            <?php if (isset($_SESSION['idCliente']) ) { ?>
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
        <a href="#">
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
      <main class="dashboard" style="margin-top: 900px;">
        <a href="../cadastro_item/index.php" class="new-item-button">Novo item</a>
        <a href="./exit.php" class="exit-button" style="background-color: red; padding: 10px; border-radius: 5px;">Sair da conta</a>
        <div class="table-wrapper">
          <table class="produtos-table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Imagem</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Descrição</th>
                <th>Categoria</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($list as $item) : ?>
                <tr>
                  <td><?= $item->id ?></td>
                  <td>
                    <img src="<?= $item->imagem ?>" alt="imagem do produto" class="image-product"/> 
                  </td>
                  <td><?= $item->nome ?></td>
                  <td><?= $item->preco ?></td>
                  <td><?= $item->descricao ?></td>
                  <td><?= $item->categoria ?></td>
                  <td>
                    <a href="./edit-product.php?id=<?= $item->id ?>" class="btn edit">Editar</a>
                    <a href="./delete-product.php?id=<?= $item->id ?>" class="btn delete">Excluir</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </main>
    </body>
  </html>
<?php } else {
    echo "<script>alert('Acesso negado. Você precisa estar logado como vendedor.'); window.location.href = '../login/index.php';</script>";
    exit();
} ?>