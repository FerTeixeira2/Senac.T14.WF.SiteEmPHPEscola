<?php
    require_once 'DAL/usuarioDAO.php';

    class usuarioModel {
        public ?int $idUsuario;
        public ?int $idTipoUsuario;
        public ?string $nome;
        public ?string $email;
        public ?string $senha;

        public function __construct(?int $idUsuario = null, ?int $idTipoUsuario = null, ?string $nome = null, ?string $email = null, ?string $senha = null) {
            $this->idUsuario = $idUsuario;
            $this->idTipoUsuario = $idTipoUsuario;
            $this->nome = $nome;
            $this->email = $email;
            $this->senha = $senha;
        }

        public function buscarUsuarioPorEmailESenha(self $usuario) {
            $usuarioDAO = new usuarioDAO;

            $retorno = $usuarioDAO->buscarUsuarioPorEmailESenha($usuario);

            return $retorno;
        }

        public function alteraraDadosAluno (self $aluno) {
            $usuarioDAO = new usuarioDAO;

            $retorno = $usuarioDAO->alteraraDadosAluno($aluno);

            return $retorno;
        }

        public function buscarUsuarioPorId (int $idUsuario) {
            $usuarioDAO = new usuarioDAO;

            $usuario = $usuarioDAO->buscarUsuarioPorId($idUsuario);

            $usuario = new usuarioModel($usuario['id_usuario'],
            $usuario['id_tipo_usuario'],
            $usuario['nome'],
            $usuario['email'],
            $usuario['senha']);

            return $usuario;
        }

        public function buscarUsuarios() {
            $usuarioDAO = new usuarioDAO;

            $usuarios = $usuarioDAO->buscarUsuarios();

            foreach ($usuarios as $chave => $usuario) {
                $usuarios[$chave] = NEW usuarioModel(
                    $usuario['id_usuario'],
                    $usuario['id_tipo_usuario'],
                    $usuario['nome'],
                    $usuario['email'],
                    $usuario['senha']
                    );
                }
            return $usuarios;    
        }

        public function excluirUsuario(int $idUsuario) {
            $usuarioDAO = new usuarioDAO;

            return $usuarioDAO->excluirUsuario($idUsuario);
        }

        public function cadastrarAluno(self $usuario) {
            $usuarioDAO = new usuarioDAO;

            return $usuarioDAO->cadastrarAluno($usuario);
        }

        public function salvarUsuarioAdmin(self $usuario) {
            $usuarioDAO = new usuarioDAO;

            return $usuarioDAO->salvarUsuarioAdmin($usuario);
        }
}
?>