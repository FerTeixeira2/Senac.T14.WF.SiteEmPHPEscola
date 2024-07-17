<?php
    require_once 'conexao.php';

    class usuarioDAO {
        public function buscarUsuarioPorEmailESenha(usuarioModel $usuario) {
            $conexao = (new conexao())->getConexao();

            $sql = "SELECT * FROM usuario WHERE email = :email AND senha = :senha;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':email', $usuario->email);
            $stmt->bindValue(':senha', $usuario->senha);
            $stmt->execute();
            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
            
            return $retorno;
        }

        public function alteraraDadosAluno(usuarioModel $aluno) {
            $conexao = (new conexao())->getConexao();

            $sql = "UPDATE usuario set nome = :nome, email = :email WHERE id_usuario = :idUsuario ";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':nome', $aluno->nome);
            $stmt->bindValue(':email', $aluno->email);
            $stmt->bindValue(':idUsuario', $aluno->idUsuario);

            return $stmt->execute();
        }

        public function buscarUsuarioPorId(int $idUsuario) {
            $conexao = (new conexao())->getConexao();

            $sql = 'SELECT * FROM usuario WHERE id_usuario = :idUsuario';

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':idUsuario', $idUsuario);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function buscarUsuarios() {
            $conexao = (new conexao())->getConexao();

            $sql = 'SELECT * FROM usuario';
            
            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        }

        public function excluirUsuario(int $idUsuario) {
            $conexao = (new conexao())->getConexao();

            $sql = "DELETE  FROM usuario WHERE id_usuario = :idUsuario";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(":idUsuario", $idUsuario);
            return $stmt->execute();
        }

        public function cadastrarAluno(usuarioModel $usuario) {
            $conexao = (new conexao())->getConexao();

            $sql = "INSERT INTO usuario VALUES (null , :idTipoUsuario ,:nome, :email, :senha);";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":idTipoUsuario", $usuario->idTipoUsuario);
            $stmt->bindValue(":nome", $usuario->nome);
            $stmt->bindValue(":email", $usuario->email);
            $stmt->bindValue(":senha", $usuario->senha);
            
            return $stmt->execute();
        }

        public function salvarUsuarioAdmin(usuarioModel $usuario) {
            $conexao = (new conexao())->getConexao();

            $sql = "UPDATE usuario SET nome = :nome, email = :email WHERE id_usuario = :idUsuario";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':nome', $usuario->nome);
            $stmt->bindValue(':email', $usuario->email);
            $stmt->bindValue(':idUsuario', $usuario->idUsuario);

            return $stmt->execute();
        }
    }

?>