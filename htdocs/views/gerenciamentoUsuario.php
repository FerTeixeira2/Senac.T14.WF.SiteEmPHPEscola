<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Usuarios</title>
</head>
<?php
    require_once '../models/usuarioModel.php';

    session_start();
    
    if ($_SESSION['esta_logado'] !== true || $_SESSION['id_tipo_usuario'] !== 1) {
        header('Location: login.php');
    
        exit();
    }
    
    $usuarioModel = new usuarioModel();
    
    $usuarios = $usuarioModel->buscarUsuarios();
?>
<body>
    <header>
        <?php
            require_once '../public/html/menuAdmin.html';
        ?>
        <h1>Gerenciamento Usuarios</h1>
    </header>
    <main>
    <form action="../routers/usuarioRouter.php" method="post"></form>
    <a href="cadastrarUsuario.php">Cadastrar Usuario</a>
      <table>
        <thead>
                <tr>
                    <br>
                    <br>
                    <th>Usuario</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($usuarios as $usuario) :?>
                    <tr>
                        <td><?= $usuario->nome; ?></td>
                        <td>
                            <a href="editarUsuario.php?idUsuario=<?= $usuario->idUsuario; ?>">Editar</a>
                            <form action="../routers/usuarioRouter.php" method="post">
                                <input type="hidden" name="idUsuario" id="idUsuario" value="<?= $usuario->idUsuario; ?>">
                                <input type="hidden" name="rota" id="rota" value="excluir">
                                <input type="submit" value="Excluir">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
      </table>
    </main>
</body>
</html>