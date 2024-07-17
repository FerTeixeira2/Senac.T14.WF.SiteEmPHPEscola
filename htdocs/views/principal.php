<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
</head>
<?php
    require_once '../models/usuarioModel.php';

    session_start();

    if ($_SESSION['esta_logado'] !== true) {
        header('Location: principal.php');
        exit();
    }
?>
<body>
    <header>
        <?php

             if ($_SESSION['id_tipo_usuario'] == 1) {
                require_once '../public/html/menuAdmin.html';
            }
            else {
                require_once '../public/html/menuAluno.html'; 
            }
        ?>

        <h1>Página Principal</h1>
    </header>
    <main>
        <p>Seja bem vindo ...</p>
    
    </main>
    
</body>
</html>