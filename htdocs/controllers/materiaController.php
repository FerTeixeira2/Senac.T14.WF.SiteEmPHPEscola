<?php
    require_once '../models/materiaModel.php';

    class materiaController {
        public function cadastrarMateria(string $descricao) {
            $materiaModel = new materiaModel();
            $materia = new materiaModel(null, $descricao);
    
            $materiaModel->cadastrarMateria($materia);

            header('Location: ../views/gerenciamentoMaterias.php');
    
            exit();
        }

        public function excluirMateria(int $idMateria) {
            $materiaModel = new materiaModel();

            $materiaModel->excluirMateria($idMateria);

            header('Location: ../views/gerenciamentoMaterias.php');

            exit();
        }

        public function alterarDadosMateria(int $idMateria, string $descricao) {
            $materiaModel = new materiaModel();

            $materia = new materiaModel($idMateria, $descricao);

            $materiaModel->alterarDadosMateria($materia);

            header('Location: ../views/gerenciamentoMaterias.php');

            exit();
        }

    }
?>