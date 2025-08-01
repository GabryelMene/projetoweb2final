<?php 
session_start();
session_destroy();
echo 
"
    <script>
        alert('Você foi desconectado com sucesso!');
        window.location.href = '../home/index.php';
    </script>
"
?>