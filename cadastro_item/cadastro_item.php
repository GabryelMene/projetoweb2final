<?php 
require_once '../database/Database.php';
session_start();

if ($_SESSION['idVendedor']) { 
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nomeProduto = $_POST['nome'];
        $imagemProduto = $_POST['imagem'];
        $precoProduto = $_POST['preco'];
        $descricaoProduto = $_POST['descricao'];
        $categoriaProduto = $_POST['categoria'];

        $db = new Database();
        $sql = "INSERT INTO produto (nome, imagem, preco, descricao, categoria, vendedor) VALUES 
                ('$nomeProduto', '$imagemProduto', '$precoProduto', '$descricaoProduto', '$categoriaProduto', '{$_SESSION['nomeVendedor']}')";
        $db->insert($sql);

        echo 
        "
            <script>
                alert('Produto cadastrado com sucesso!');
                window.location.href = '../admin/index.php';
            </script>
        "; 

    } else {
        echo 
        "
            <script>
                alert('Por favor, use o método POST para enviar os dados.');
                window.location.href = '../cadastro_item/index.php';
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