<?php
    require_once '../controllers/usuarioController.php';

    $usuarioController = new usuarioController();

    $rota = $_POST['rota'];

    switch ($rota) {
        case "entrar":
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $usuarioController->validarAluno($email, $senha); 

        case "alterar":
            $idUsuario = intval($_POST['idUsuario']);
            $nome = $_POST['nome'];
            $email = $_POST['email'];

            $usuarioController->alteraraDadosAluno($idUsuario, $nome, $email);

        case "excluir":
            $idUsuario = $_POST['idUsuario'];

            $usuarioController->excluirUsuario($idUsuario);

            break;

        case "cadastrar":
            $idTipoUsuario = intval($_POST['id_tipo_usuario']);
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            
            $usuarioController->cadastrarAluno( $idTipoUsuario ,$nome, $email, $senha);
    
            break;

        case "salvar":
            $idUsuario = intval($_POST['idUsuario']);
            $nome = $_POST['nome'];
            $email = $_POST['email'];

            $usuarioController->salvarUsuarioAdmin($idUsuario, $nome, $email);
    }
?>