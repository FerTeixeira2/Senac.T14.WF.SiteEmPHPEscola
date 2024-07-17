<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
</head>
<?php
    require_once '../models/usuarioModel.php';

    session_start();

    if ($_SESSION['esta_logado'] !== true || $_SESSION['id_tipo_usuario'] !== 1) {
        header('Location: login.php');
    
        exit();
    }

    $usuarioModel = new usuarioModel();
    $idUsuario = $_GET['idUsuario'];
    $usuario = $usuarioModel->buscarUsuarioPorId($idUsuario);
?>
<body>
    <header>
        <?php require_once '../public/html/menuAdmin.html'; ?>
        <h1>Editar Usuario</h1>
    </header>
    <main>
        <form action="../routers/usuarioRouter.php" method="post">
        <label for="nome">Nome Usuario</label>
        <br>
        <input type="text" name="nome" id="nome" value="<?= $usuario->nome; ?>">
        <br>
        <label for="email">E-mail</label>
        <br>
        <input type="text" name="email" id="email" value="<?= $usuario->email ?>">
        <br>
        <br>
        <input type="hidden" name="idUsuario" id="idUsuario" value="<?= $usuario->idUsuario; ?>">
        <input type="hidden" name="rota" id="rota" value="salvar">
        <input type="submit" value="Salvar">
        </form>
</body>
</html>