<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Notas</title>
</head>
<?php
    require_once '../models/notaModel.php';

    session_start();
    
    if ($_SESSION['esta_logado'] !== true) {
        header('Location: login.php');
    
        exit();
    }
    
    $notaModel = new notaModel();
    $idUsuario = $_SESSION['id_usuario'];
    $notas = $notaModel->buscarNotasPorId($idUsuario);
    
?>
<body>
    <header>
        <?php
            require_once '../public/html/menuAluno.html';
        ?>
        <h1>Notas Aluno</h1>
    </header>
    <main>
      <table>
        <thead>
                <tr>
                    <br>
                    <br>
                    <th>Materia</th>
                    <th>Notas</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($notas as $nota) :?>
                    <tr>
                        <td><?= $nota->materia->descricao; ?></td>
                        <td><?= $nota->valor; ?></td>   
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
      </table>
    </main>
</body>
</html>