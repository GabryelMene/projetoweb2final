<?php 
require_once '../database/database.php';
session_start();

$email = $_POST['email']; 
$senha = hash('sha256', $_POST['senha']); 
$tipoConta = $_POST['tipoconta']; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($email && $senha) {

        if ($tipoConta == 'cliente') {
            session_destroy(); 

            $db = new Database(); 
            $sql = "SELECT * FROM cliente WHERE email = '$email' AND senha = '$senha'";
            $resultado = $db->select($sql);

            if ($resultado) {
                session_start();
                $_SESSION['idCliente'] = $resultado[0]->id;
                $_SESSION['nomeCliente'] = $resultado[0]->nome;

                echo 
                "
                    <script>
                        window.location.href = '../home/index.php';
                    </script>
                ";



            } else {
                echo 
                "
                    <script>
                        alert('E-mail ou senha ou tipo de conta incorretos. Por favor, tente novamente.');
                        window.location.href = '../login/index.php';
                    </script>
                ";
                exit;   
            }
        }

        if ($tipoConta == 'vendedor') {
            session_destroy(); 

            $db = new Database(); 
            $sql = "SELECT * FROM vendedor WHERE email = '$email' AND senha = '$senha'";
            $resultado = $db->select($sql);

            if ($resultado) {

                session_start();

                $_SESSION['idVendedor'] = $resultado[0]->id;
                $_SESSION['nomeVendedor'] = $resultado[0]->nome;

                echo 
                "
                <script>
                    window.location.href = '../admin/index.php';
                </script>
                ";


            } else {
                echo 
                "
                    <script>
                        alert('E-mail ou senha ou tipo de conta incorretos. Por favor, tente novamente.');
                        window.location.href = '../login/index.php';
                    </script>
                ";
                exit;
            } 
        }


    } else {
        echo 
        "
            <script>
                alert('Por favor, preencha todos os campos.');
                window.location.href = '../login/index.php';
            </script>
        "; 
        exit;
    }

} else {
    echo 
    "
        <script>
            window.location.href = '../login/index.php';
        </script>
    ";
    exit;
}
 
?> 