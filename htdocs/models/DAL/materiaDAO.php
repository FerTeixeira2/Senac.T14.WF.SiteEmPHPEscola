<?php
    require_once 'conexao.php';

    class materiaDAO {
        public function buscarMateria() {
            $conexao = (new conexao())->getConexao();

            $sql = 'SELECT * FROM materia';

            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $retorno;
        }

        public function cadastrarMateria(materiaModel $materia) {
            $conexao = (new conexao())->getConexao();

            $sql = "INSERT INTO materia VALUES (null, :descricao);";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":descricao", $materia->descricao);
            
            return $stmt->execute();
        }

        public function excluirMateria(int $idMateria) {
            $conexao = (new conexao())->getConexao();

            $sql = "DELETE FROM materia WHERE id_materia = :idMateria";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(":idMateria", $idMateria);
            return $stmt->execute();
        }

        public function alterarDadosMateria(materiaModel $materia) {
            $conexao = (new conexao())->getConexao();

            $sql = "UPDATE materia SET descricao = :descricao WHERE id_materia = :idMateria";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':idMateria', $materia->idMateria);
            $stmt->bindValue(':descricao', $materia->descricao);

            return $stmt->execute();
        }

        public function buscarMateriaPorId( int $idMateria) {
            $conexao = (new conexao())->getConexao();

            $sql = "SELECT * FROM materia WHERE id_materia = :idMateria";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(":idMateria", $idMateria);
            $stmt->execute();
            
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
?>