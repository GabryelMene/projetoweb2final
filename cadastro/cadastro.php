<?php
require_once '../database/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = hash('sha256', $_POST['senha']);
    $telefone = $_POST['telefone'];
    $tipoConta = $_POST['tipoconta'];

    if ($nome && $email && $senha && $telefone && $tipoConta) {
        if ($tipoConta == 'cliente') {
            
            $sql = "INSERT INTO cliente (nome, email, senha, telefone) VALUES ('$nome', '$email', '$senha', '$telefone')";
            $db = new Database();
            $db->insert($sql);
            
            

            echo 
            "
               <script> 
                    alert('Seu usuário foi cadastrado como cliente com sucesso!');
                    window.location.href = '../login/index.php';
               </script> 
            ";
        }

        if ($tipoConta == 'vendedor') {
            $db = new Database();

            $sqlConsulta = "SELECT * FROM vendedor WHERE nome = '$nome'";
            $resultado = $db->select($sqlConsulta);

            if ($resultado) {
                echo 
                "
                    <script>
                        alert('Já existe um vendedor cadastrado com esse nome. Por favor, escolha outro nome.');
                        window.location.href = '../cadastro/index.php';
                    </script>
                ";
                exit;
            }
            
            
            $sql = "INSERT INTO vendedor (nome, email, senha, telefone) VALUES ('$nome', '$email', '$senha', '$telefone')";
            $db = new Database();
            $db->insert($sql);
            
            echo 
            "
                <script>
                    alert('Seu usuário foi cadastrado como vendedor com sucesso!'); 
                    window.location.href = '../login/index.php';
                </script> 
            ";
        }
    
    } else {
        echo "Por favor, preencha todos os campos.";
    }
} else {
    echo "Método não permitido.";

}



?>