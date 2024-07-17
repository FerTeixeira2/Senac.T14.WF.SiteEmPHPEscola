<?php
    require_once '../controllers/materiaController.php';
    
    $materiaController = new materiaController();

    $rota = $_POST['rota'];

    switch ($rota) {
        case "cadastrar":
            $idMateria = $_POST['descricao'];
    
            $materiaController->cadastrarMateria($idMateria);
    
            break;
        
            case "excluir":
                $idMateria = $_POST['idMateria'];

                $materiaController->excluirMateria($idMateria);

                break;
            
            case "salvar":
                $idMateria = intval($_POST['idMateria']);
                $descricao = $_POST['descricao'];
                
                $materiaController->alterarDadosMateria($idMateria, $descricao);

                break;
    }
?>