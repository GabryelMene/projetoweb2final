<?php
require_once '../database/Database.php';
session_start();

if ($_SESSION['idCliente']) {
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $db = new Database();
      $id = $_POST['idProduto'];
      $idCliente = $_SESSION['idCliente'];
      $quant = $_POST['quant']; 
    
      $sqlAddCarrinho = "INSERT INTO carrinho (idProduto, idCliente, quantidade) VALUES ($id, $idCliente, $quant)";
      $db->insert($sqlAddCarrinho);

      echo 
      "
            <script>
                alert('Produto adicionado ao carrinho com sucesso!');
                window.location.href = '../carrinho/index.php';
            </script>
      ";

  } else {
        echo 
        "
            <script>
                alert('Por favor, use o método POST para enviar os dados.');
                window.location.href = '../compra/index.php?id=$id';
            </script>
        ";
        exit;
  }

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