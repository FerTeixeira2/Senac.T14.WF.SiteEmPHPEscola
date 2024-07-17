<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Matéria</title>
</head>
<?php
    require_once '../models/materiaModel.php';

    session_start();

    if ($_SESSION['esta_logado'] !== true || $_SESSION['id_tipo_usuario'] !== 1) {
        header('Location: login.php');
    
        exit();
    }
    
    $idMateria = $_GET['idMateria'];

    $materiaModel = new materiaModel();
    
    $materia = $materiaModel->buscarMateriaPorId($idMateria);
?>
<body>
<header>
        <?php require_once '../public/html/menuAdmin.html'; ?>
        <h1>Editar Matéria</h1>
    </header>
    <main>
        <form action="../routers/materiaRouter.php" method="post">
        <label for="descricao">Nome Matéria</label>
        <br>
        <input type="text" name="descricao" id="descricao" value="<?= $materia->descricao; ?>">
        <br>
        <br>
        <input type="hidden" name="idMateria" id="idMateria" value="<?= $materia->idMateria; ?>">
        <input type="hidden" name="rota" id="rota" value="salvar">
        <input type="submit" value="Salvar">
        </form>
    </main>
</body>
</html>