<?php
require_once '../database/Database.php';
session_start();

if ($_SESSION['idCliente']) {
    $idProduto = $_GET['id'];
    $idCarrinho = $_GET['idCarrinho'];
    $idCliente = $_SESSION['idCliente'];
    $total =  $_GET['total'];


    $db = new Database();
    $sqlVendedor = "SELECT vendedor FROM produto WHERE id = $idProduto"; 
    $vendedor = $db->select($sqlVendedor);


    foreach ($vendedor as $vend) {
        $id = $vend->vendedor;
        $sqlIdVendedor = "SELECT id FROM vendedor WHERE nome = '$vend->vendedor'";
        $idVendedor = $db->select($sqlIdVendedor);

        foreach ($idVendedor as $idVend) {
            $sqlCompra = "INSERT INTO compra (idProduto, idCliente, idVendedor, total)
            VALUES ($idProduto, $idCliente, $idVend->id, $total)
            "; 

            $db->insert($sqlCompra); 


            $sqlRemoverItem = "DELETE FROM carrinho WHERE idCarrinho = $idCarrinho AND idProduto = $idProduto AND idCliente = $idCliente"; 
            $db->delete($sqlRemoverItem);

            echo 
            "
              <script>
                    alert('Compra realizada com sucesso!');
                    window.location.href = '../carrinho/index.php';
              </script>
            ";
        }

    }



} else {
    echo 
    "
        <script>
            alert('Você precisa estar logado como cliente.');
            window.location.href = '../login/index.php';
        </script>
    "; 
}
?>