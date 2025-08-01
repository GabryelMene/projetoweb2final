<?php 
require_once '../database/Database.php';
session_start();

if ($_SESSION['idCliente']) {
    $id = $_GET['id'];
    $idCarrinho = $_GET['idCarrinho'];
    $idCliente = $_SESSION['idCliente'];
    
    $db = new Database();
    $sql = "DELETE FROM carrinho WHERE idProduto = $id AND idCliente = $idCliente AND idCarrinho = $idCarrinho";
    $db->delete($sql);

    echo 
    "
        <script>
            alert('Produto removido do carrinho com sucesso!');
            window.location.href = '../carrinho/index.php';
        </script>
    ";


} else {
    echo 
    "
        <script>
            alert('Você precisa estar logado como cliente.');
            window.location.href = '../login/index.php';
        </script>
    ";
    exit;
}

?>