    <?php 
    require_once '../database/Database.php';
    session_start();

    if ($_SESSION['idVendedor']) {
        $idProduto = $_GET['id'];
        $db = new Database();
        $sql = "SELECT * FROM produto WHERE id = '$idProduto'";
        $resultado = $db->select($sql);


        if ($resultado) {
            $produto = $resultado[0];
        } else {
            echo 
            "
                <script>
                    alert('Produto não encontrado.');
                    window.location.href = '../admin/index.php';
                </script>
            ";
            exit;
        }
    } else {
        echo 
        "
            <script>
                alert('Acesso negado. Você precisa estar logado como vendedor.');
                window.location.href = '../login/index.php';
            </script>
        ";
        exit;
    }


    ?>

    <?php if ($_SESSION['idVendedor']) { ?> 
        <!DOCTYPE html>
        <html lang="pt-BR">
        <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <meta http-equiv="X-UA-Compatible" content="IE=7" />
            <meta http-equiv="X-UA-Compatible" content="ie=edge" />
            <meta name="description" content="BuzzDrop - compre online com segurança e privacidade!" />
            <meta name="keywords"
                content="loja online, segurança, privacidade, compras, dropshipping, tenis, sneaker, estilo, roupas" />
            <link rel="shortcut icon" href="./assets/favicon.ico" type="image/x-icon">
            <link rel="stylesheet" href="./style/login-style.css">
            <link rel="stylesheet" href="./style/reset.css">
            <link rel="stylesheet" href="./style/main-content.css">
            <link rel="stylesheet" href="./style/main-content-2.css">
            <link rel="stylesheet" href="./style/header-mobile.css">
            <link rel="stylesheet" href="./style/header-tablet-pc.css">
            <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
                integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
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
                <li class="header-list-item header-list-item-2">
                <a class="text-item" href="../cadastro/index.php"> Cadastrar-se </a>
                </li>
                <li class="header-list-item header-list-item-3">
                <a class="text-item" href="../carrinho/index.php"> Meu Carrinho </a>
                </li>
                <li class="header-list-item header-list-item-4">
                <a class="text-item" href="../admin/index.php"> Meus produtos </a>
                </li>
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
                <li class="header-list-item header-list-item-6">
                <a class="text-item" href="../login/index.php"> Log-in </a>
                <span class="material-symbols-outlined">login</span>
                </li>
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
                <a href="../home/index.html">
                    <img src="./icons/home.png" alt="Home" class="home-icon" />
                </a>
                </li>
                <li class="list-option-2">
                <a href="../login/index.php" class="list-span">Fazer Login</a>
                </li>
                <li class="list-option-3">
                <a href="../cadastro/index.php" class="list-span">Cadastrar-se</a>
                </li>
                <li class="list-option-4">
                <a href="../carrinho/index.php" class="list-span">Meu carrinho</a>
                </li>
                <li class="list-option-4">
                <a href="../admin/index.php" class="list-span">Meu produtos</a>
                </li>
            </ul>
            </nav>
        </header> 
        <main class="form-container" style="background-color: white; padding: 20px; border-radius: 10px; margin-top: 150px; text-align: center;">
            <h1 class="form-title">Editar Produto</h1>
            <form id="formProduto" action="./edit.php" method="post" enctype="multipart/form-data" style="display: flex; flex-direction: column; align-items: center; gap: 20px; justify-content: center;"> 
                <input type="hidden" name="id" value="<?= $produto->id ?>" />
                <div class="field-group">
                    <label for="nome">Nome do Produto</label>
                    <input type="text" id="nome" name="nome" placeholder="Digite o nome" style="border: 1px solid black; border-radius: 5px; width: 100%;" value="<?= $produto->nome ?>" required/>
                </div>

                <div class="field-group">
                    <label for="imagem">Imagem</label>
                    <input type="text" id="imagem" name="imagem" style="border: 1px solid black; border-radius: 5px;" required/>
                </div>

                <div class="field-group">
                    <label for="preco">Preço</label>
                    <input type="number" id="preco" name="preco" placeholder="0.00" step="0.01" min="1" style="border: 1px solid black; border-radius: 5px;" value="<?= $produto->preco ?>" required/>
                </div>

                <div class="field-group" style="display: flex; align-items: center; gap: 10px;">
                    <label for="descricao">Descrição</label>
                    <textarea id="descricao" name="descricao" rows="4" placeholder="Descreva o produto..." style="border: 1px solid black; border-radius: 5px;" required></textarea>
                </div>

                <div class="field-group">
                    <label for="categoria">Categoria</label>
                    <select id="categoria" name="categoria" style="padding: 10px; border-radius: 10px;" required>
                    <option value="">Selecione…</option>
                    <option value="tenis">Sneaker</option>
                    <option value="camisas">Camisas</option>
                    <option value="cards">Cards</option>
                    <option value="skincs">Skin de CS</option>
                    <option value="outros">Outros</option>
                    </select>
                </div>

                <button type="submit" class="btn-submit" style="padding: 10px; border-radius: 10px; background-color: #ebe5ac; font-weight: bolder;">Editar Produto</button>
            </form>
            </main>
            <script src="./scripts/validacao.js"></script> 
            <script>
                let textarea = document.getElementById('descricao');
                descricao.value = "<?= $produto->descricao ?? '' ?>";
            </script>
    </body>
    </html>    
        
        
    <?php } else {
        echo "<script>alert('Acesso negado. Você precisa estar logado como vendedor.'); window.location.href = '../login/index.php';</script>";
        exit();
    } ?>