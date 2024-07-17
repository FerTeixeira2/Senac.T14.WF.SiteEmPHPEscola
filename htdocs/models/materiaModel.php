<?php
    require_once 'DAL/materiaDAO.php';

    class materiaModel {
        public ?int $idMateria;
        public ?string $descricao;

        public function __construct(?int $idMateria = null, ?string $descricao = null) {
            $this->idMateria = $idMateria;
            $this->descricao = $descricao;
        }

        public function buscarMateria() {
            $materiaDAO = new materiaDAO();

            $materias =  $materiaDAO->buscarMateria();

            foreach ($materias as $chave => $materia) {
                $materias[$chave] = new materiaModel($materia['id_materia'], $materia['descricao']);
            }

            return $materias;
        }

        public function cadastrarMateria(self $materia) {
            $materiaDAO = new materiaDAO();
    
            return $materiaDAO->cadastrarMateria($materia);
        }

        public function excluirMateria(int $idMateria) {
            $materiaDAO = new materiaDAO();

            return $materiaDAO->excluirMateria($idMateria);
        }

        public function alterarDadosMateria(self $materia) {
            $materiaDAO = new materiaDAO();

            return $materiaDAO->alterarDadosMateria($materia);

        }

        public function buscarMateriaPorId(int $idMateria) {
            $materiaDAO = new materiaDAO;

            $materia = $materiaDAO->buscarMateriaPorId($idMateria);
            $materia = new materiaModel($materia['id_materia'], $materia['descricao']);

            return $materia;
        }
    }
?>