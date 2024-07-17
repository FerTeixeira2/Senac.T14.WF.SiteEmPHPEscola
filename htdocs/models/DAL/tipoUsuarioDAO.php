<?php
    require_once 'conexao.php';

    class tipoUsuarioDAO {
        public function buscarTiposUsuario() {
            $conexao = (new conexao())->getConexao();

            $sql = 'SELECT * FROM tipo_usuario';

            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $retorno;
        }
    }
?>