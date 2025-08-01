<?php
require_once '../database/Database.php';
session_start();

if ($_SESSION['idVendedor']) {
    $nome = $_POST['nome'];
    $imagem = $_POST['imagem'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $categoria = $_POST['categoria'];

    $db = new Database();
    $idProduto = $_POST['id'];
    $sql = "UPDATE produto SET nome = '$nome', imagem = '$imagem', preco = '$preco', descricao = '$descricao', categoria = '$categoria' WHERE id = '$idProduto'";
    $db->update($sql);

    echo 
    "
        <script>
            alert('Produto atualizado com sucesso!');
            window.location.href = '../admin/index.php';
        </script>
    ";  

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