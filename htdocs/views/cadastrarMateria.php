<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Matéria</title>
</head>
<?php
require_once '../models/materiaModel.php';

    session_start();

    if ($_SESSION['esta_logado'] !== true || $_SESSION['id_tipo_usuario'] !== 1) {
        header('Location: login.php');
        exit();
    }

    $materiaModel = new materiaModel();

    $materias = $materiaModel->buscarMateria();
?>
<body>
    <header>
        <?php require_once '../public/html/menuAdmin.html'; ?>
        <h1>Cadastrar Matéria</h1>
    </header>
    <main>
        <form action="../routers/materiaRouter.php" method="post" onsubmit="return validarCamposCadastrarAutor(event);">
            <br>
            <label for="descricao">Nome Matéria</label>
            <br>
            <input type="text" name="descricao" id="descricao" required>
            <br>
            <input type="hidden" name="rota" id="rota" value="cadastrar">
            <input type="submit" value="Cadastrar">
        </form>
    </main>
</body>
</html>