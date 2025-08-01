<?php  
    require_once '../database/Database.php';
    session_start();

    if ($_SESSION['idVendedor']) {
        $idProduto = $_GET['id'];
        $db = new Database();
        $sql = "DELETE FROM produto WHERE id = '$idProduto'";
        $db->delete($sql);

        echo 
        "
            <script>
                alert('Produto excluído com sucesso!');
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
    }



?>